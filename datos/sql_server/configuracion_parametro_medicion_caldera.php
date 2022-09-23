<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/db_sql_server_connection.php');

    class ConfiguracionParametroMedicionCaldera {

		public function buscarValorParametroConfiguracion($calderaId, $nombreMedicion, $nombreParametroMedicion) {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();

			$sql = "SELECT cpmc.*
			             , pm.nombre as nombreParametroMedicion
						 , pm.nombre_pretty as nombrePretty
						 , cpmc.valor as valor
					FROM dbo.medicion m
					INNER JOIN dbo.caldera_medicion cm ON (m.medicion_id = cm.medicion_id)
					INNER JOIN dbo.parametro_medicion pm ON (m.medicion_id = pm.medicion_id)
					INNER JOIN dbo.configuracion_parametro_medicion_caldera cpmc ON (cm.caldera_medicion_id = cpmc.caldera_medicion_id AND pm.parametro_medicion_id = cpmc.parametro_medicion_id)
					WHERE m.nombre = ?
						AND m.activo_p = 't'
						AND cm.caldera_id = ?
						AND pm.nombre = ?
						AND pm.activo_p = 't'";
			$params = array(&$nombreMedicion, &$calderaId, &$nombreParametroMedicion);
			$stmt = sqlsrv_query($conn, $sql, $params);

			$row = null;

			if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message[configuracion_parametro_medicion_caldera.php-seleccionarActivo]: ".$error[ 'message']."<br />";
					}
				}
			}
			else {
				if (sqlsrv_has_rows($stmt)) {
					$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
				}
				sqlsrv_free_stmt($stmt);
			}

			$conexion->cerrar_conn();
			return $row;
		}

		public function seleccionarActivo($calderaId, $nombreMedicion, $nombreParametroMedicion) {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();

			$sql = "SELECT cpmc.*
			             , pm.nombre as nombreParametroMedicion
						 , pm.nombre_pretty as nombrePretty
						 , cpmc.valor as valor
					FROM dbo.medicion m
					INNER JOIN dbo.caldera_medicion cm ON (m.medicion_id = cm.medicion_id)
					INNER JOIN dbo.parametro_medicion pm ON (m.medicion_id = pm.medicion_id)
					LEFT OUTER JOIN dbo.configuracion_parametro_medicion_caldera cpmc ON (cm.caldera_medicion_id = cpmc.caldera_medicion_id AND pm.parametro_medicion_id = cpmc.parametro_medicion_id)
					WHERE m.nombre = ?
						AND m.activo_p = 't'
						AND cm.caldera_id = ?
						AND pm.nombre = ?
						AND pm.activo_p = 't'";
			$params = array(&$nombreMedicion, &$calderaId, &$nombreParametroMedicion);
			$stmt = sqlsrv_query($conn, $sql, $params);

			$row = null;

			if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message[configuracion_parametro_medicion_caldera.php-seleccionarActivo]: ".$error[ 'message']."<br />";
					}
				}
			}
			else {
				if (sqlsrv_has_rows($stmt)) {
					$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
				}
				sqlsrv_free_stmt($stmt);
			}

			$conexion->cerrar_conn();
			return $row;
		}

		public function seleccionarConfiguracionParametrosActivos($calderaId, $nombreMedicion) {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();

			$sql = "SELECT pm.nombre as nombreParametroMedicion
						 , cpmc.valor as valor
					FROM dbo.medicion m
					INNER JOIN dbo.caldera_medicion cm ON (m.medicion_id = cm.medicion_id)
					INNER JOIN dbo.parametro_medicion pm ON (m.medicion_id = pm.medicion_id)
					LEFT OUTER JOIN configuracion_parametro_medicion_caldera cpmc ON (cm.caldera_medicion_id = cpmc.caldera_medicion_id AND pm.parametro_medicion_id = cpmc.parametro_medicion_id)
					WHERE m.nombre = ?
					  AND m.activo_p = 't'
					  AND cm.caldera_id = ?
					  AND pm.activo_p = 't'";
			
			$params = array(&$nombreMedicion, &$calderaId);
			$stmt = sqlsrv_query($conn, $sql, $params);

			$rows = array();
			if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message[configuracion_parametro_medicion_caldera.php-seleccionarConfiguracionParametrosActivos]: ".$error[ 'message']."<br />";
					}
				}
			}
			else {
				if (sqlsrv_has_rows($stmt)) {
					while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
						array_push($rows, $row);
					}
				}
				sqlsrv_free_stmt($stmt);
			}

			$conexion->cerrar_conn();
			return $rows;
		}

		public function actualizar($row, $valor) {
			$conexion = new Conexion();
            $conn = $conexion->get_conn();
			
			$sql = "UPDATE dbo.configuracion_parametro_medicion_caldera 
					SET valor = ?, fecha_actualizacion = GETDATE() 
					WHERE caldera_medicion_id = ? 
					  AND parametro_medicion_id = ?";
			
			$params = array(&$valor, &$row["caldera_medicion_id"], &$row["parametro_medicion_id"]);
			$stmt = sqlsrv_query($conn, $sql, $params);

			if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message[configuracion_parametro_medicion_caldera.php-actualizar]: ".$error[ 'message']."<br />";
					}
				}
				$resultado = $stmt;
			}
			else {
				if (sqlsrv_rows_affected($stmt) > 0) {
					$resultado = true;
				}
				else {
					$resultado = false;
				}
				sqlsrv_free_stmt($stmt);
			}

            $conexion->cerrar_conn();
			return $resultado;
		}

		public function insertar($calderaId, $nombreMedicion, $nombreParametroMedicion, $valor) {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();

			$sql = "INSERT INTO dbo.configuracion_parametro_medicion_caldera (caldera_medicion_id, parametro_medicion_id, valor)
					VALUES (
							(SELECT cm.caldera_medicion_id 
								FROM dbo.caldera_medicion cm
								INNER JOIN dbo.medicion m ON (cm.medicion_id = m.medicion_id)
								WHERE m.nombre = ?
								  AND m.activo_p = 't' 
								  AND cm.caldera_id = ?),
							(SELECT parametro_medicion_id 
								FROM dbo.parametro_medicion pm
								INNER JOIN dbo.medicion m ON (pm.medicion_id = m.medicion_id)
							WHERE m.nombre = ?
							  AND m.activo_p = 't'
							  AND pm.nombre = ?),
						?)";

			$params = array(&$nombreMedicion, &$calderaId, &$nombreMedicion, &$nombreParametroMedicion, &$valor);
			$stmt = sqlsrv_query($conn, $sql, $params);

			if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message[configuracion_parametro_medicion_caldera.php-insertar]: ".$error[ 'message']."<br />";
					}
				}
				$resultado = $stmt;
			}
			else {
				if (sqlsrv_rows_affected($stmt) > 0) {
					$resultado = true;
				}
				else {
					$resultado = false;
				}
				sqlsrv_free_stmt($stmt);
			}

			$conexion->cerrar_conn();
			return $resultado;
		}
	}
