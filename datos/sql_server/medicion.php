<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/db_sql_server_connection.php');

	class DatosMedicion {

		public function selectMedicionByName($nombreMedicion) {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();

			$sql = "SELECT medicion_id as medicionId, nombre, nombre_pretty as nombrePretty from medicion where nombre = ?";
			$parameters = array(&$nombreMedicion);
			$options = array("Scrollable"=>"keyset");
			$stmt = sqlsrv_query($conn, $sql, $parameters, $options);

			$row = null;
			if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message[medicion.php-selectMedicionByName]: ".$error[ 'message']."<br />";
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
	}
?>
