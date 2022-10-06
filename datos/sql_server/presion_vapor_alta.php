<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/db_sql_server_connection.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/caldera.php');
    
    class PresionVaporAltaDatos {

        private $table_name = "pr_altovapor";

        function getUltimoRegistro($calderaId) {
            $conexion = new Conexion();
            $conn = $conexion->get_conn();

            $sql = "SELECT TOP 1 id, PrAlto as valor, FORMAT(fecha, 'dd/MM/yyyy HH:mm:ss') as fechaPretty FROM ". $this->table_name ." WHERE id_caldera = ? ORDER BY id DESC";

            $params = array(&$calderaId);
            $stmt = sqlsrv_query($conn, $sql, $params);
			
            $rows = array();
            if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						error_log( "SQLSTATE: ".$error[ 'SQLSTATE']."<br />");
						error_log( "code: ".$error[ 'code']."<br />");
						error_log( "message[presion_vapor_alta.php-getUltimoRegistro]: ".$error[ 'message']."<br />");
					}
				}
			}
			else {
				if (sqlsrv_has_rows($stmt)) {
                    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
				}
                else {
                    $row = null;
                }
				sqlsrv_free_stmt($stmt);
			}

            return $row;
        }

        public function getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, $calderaId) {
            $conexion = new Conexion();
			$conn = $conexion->get_conn();
            /*
            $calderaObj = new CalderaDatos();
            $calderaObj->buscar($calderaId);
            $this->table_name = $calderaObj->get_tabla_datos();
            */
            $sql = "SELECT t1.fechaPretty,
                           COUNT(1) AS cantidadAlertas
                    FROM (
                        SELECT FORMAT(Fecha, 'dd/MM/yyyy') AS fechaPretty
                        FROM " . $this->table_name . " 
                        WHERE Fecha BETWEEN ? AND ?
                            AND id_caldera = ?
                    ) t1
                    GROUP BY t1.fechaPretty
                    ORDER BY t1.fechaPretty ASC";

            $fechaInicio = $fechaInicioObj->format('Y-m-d H:i:s');
            $fechaFin = $fechaFinObj->format('Y-m-d H:i:s');

            $params = array(&$fechaInicio, &$fechaFin, &$calderaId);
            $stmt = sqlsrv_query($conn, $sql, $params);

            $rows = array();
            if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						error_log( "SQLSTATE: ".$error[ 'SQLSTATE']."<br />");
						error_log( "code: ".$error[ 'code']."<br />");
						error_log( "message[presion_vapor_alta.php-getCantidadAlertasPorFechaPorCaldera]: ".$error[ 'message']."<br />");
					}
				}
			}
			else {
				if (sqlsrv_has_rows($stmt)) {
					while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
						$rows[$row["fechaPretty"]] = $row["cantidadAlertas"];
					}
				}
				sqlsrv_free_stmt($stmt);
			}

            $conexion->cerrar_conn();	
            return $rows;
        }
    }
?>