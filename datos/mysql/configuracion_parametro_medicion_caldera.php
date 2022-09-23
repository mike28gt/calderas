<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/db_connection.php');

        class ConfiguracionParametroMedicionCaldera {

		public function seleccionarActivo($calderaId, $nombreMedicion, $nombreParametroMedicion) {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();
			$stmt = $conn->prepare("SELECT cpmc.*
						     , pm.nombre as nombreParametroMedicion
						     , pm.nombre_pretty as nombrePretty
						     , cpmc.valor as valor
						FROM medicion m
						INNER JOIN caldera_medicion cm ON (m.medicion_id = cm.medicion_id)
						INNER JOIN parametro_medicion pm ON (m.medicion_id = pm.medicion_id)
						LEFT OUTER JOIN configuracion_parametro_medicion_caldera cpmc ON (cm.caldera_medicion_id = cpmc.caldera_medicion_id AND pm.parametro_medicion_id = cpmc.parametro_medicion_id)
						WHERE m.nombre = ?
						  AND m.activo_p = 1
						  AND cm.caldera_id = ?
						  AND pm.nombre = ?
						  AND pm.activo_p = 1");
                        $stmt->bind_param('sis', $nombreMedicion, $calderaId, $nombreParametroMedicion);
                        $stmt->execute();
                        $resultado = $stmt->get_result();

			if ($resultado->num_rows > 0) {
                                $row = $resultado->fetch_assoc();
                        }
                        else {
                                $row = NULL;

			}

			$stmt->close();
			$conexion->cerrar_conn();
			return $row;
		}

		public function seleccionarConfiguracionParametrosActivos($calderaId, $nombreMedicion) {
                        $conexion = new Conexion();
                        $conn = $conexion->get_conn();
                        $stmt = $conn->prepare("SELECT pm.nombre as nombreParametroMedicion
                                                     , cpmc.valor as valor
                                                FROM medicion m
                                                INNER JOIN caldera_medicion cm ON (m.medicion_id = cm.medicion_id)
                                                INNER JOIN parametro_medicion pm ON (m.medicion_id = pm.medicion_id)
                                                LEFT OUTER JOIN configuracion_parametro_medicion_caldera cpmc ON (cm.caldera_medicion_id = cpmc.caldera_medicion_id AND pm.parametro_medicion_id = cpmc.parametro_medicion_id)
						WHERE m.nombre = ?
                                                  AND m.activo_p = 1
                                                  AND cm.caldera_id = ?
                                                  AND pm.activo_p = 1");
                        $stmt->bind_param('si', $nombreMedicion, $calderaId);
                        $stmt->execute();
                        $resultado = $stmt->get_result();
			$rows = array();

                        if ($resultado->num_rows > 0) {
				while($row = $resultado->fetch_assoc()) {
					array_push($rows, $row);
				}
                        }
                       else {
                                $rows = NULL;
                        }

                        $stmt->close();
                        $conexion->cerrar_conn();
                        return $rows;
		}

		public function actualizar($row, $valor) {
			$conexion = new Conexion();
                        $conn = $conexion->get_conn();
			$stmt = $conn->prepare("UPDATE configuracion_parametro_medicion_caldera 
						SET valor = ?, fecha_actualizacion = NOW() 
						WHERE caldera_medicion_id = ? 
						  AND parametro_medicion_id = ?");
                        $stmt->bind_param('dii', $valor, $row["caldera_medicion_id"], $row["parametro_medicion_id"]);
                        $resultado = $stmt->execute();
                        
			$stmt->close();
                        $conexion->cerrar_conn();
			
			return $resultado;
		}

		public function insertar($calderaId, $nombreMedicion, $nombreParametroMedicion, $valor) {
			$conexion = new Conexion();
                        $conn = $conexion->get_conn();
                        $stmt = $conn->prepare("INSERT INTO configuracion_parametro_medicion_caldera (caldera_medicion_id, parametro_medicion_id, valor)
						VALUES (
						        (SELECT cm.caldera_medicion_id 
						         FROM caldera_medicion cm
						         INNER JOIN medicion m ON (cm.medicion_id = m.medicion_id)
						         WHERE m.nombre = ?
						           AND m.activo_p = 1 
						           AND cm.caldera_id = ?),
						        (SELECT parametro_medicion_id 
						         FROM parametro_medicion pm
						         INNER JOIN medicion m ON (pm.medicion_id = m.medicion_id)
							 WHERE m.nombre = ?
							   AND m.activo_p = 1
							   AND pm.nombre = ?),
							?)");
			$stmt->bind_param("sissd", $nombreMedicion, $calderaId, $nombreMedicion, $nombreParametroMedicion, $valor);
                        $resultado = $stmt->execute();

                        $stmt->close();
                        $conexion->cerrar_conn();

                        return $resultado;
		}
	}
