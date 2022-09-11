<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/db_connection.php');
    
    class TemperaturaChimeneaDatos {

        private $table_name = "temchimenea";

        public function getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, $calderaId, $tipoAlerta, $valorAlerta) {
            $conexion = new Conexion();
			$conn = $conexion->get_conn();
            $relacionAlerta = ">";

            if ($tipoAlerta == "menor") {
                $relacionAlerta = "<";
            }

            $sqlString = "SELECT DATE_FORMAT(fecha, '%d/%m/%Y') AS fechaPretty,
                                 COUNT(1) AS cantidadAlertas
                         FROM " . $this->table_name . " 
                         WHERE fecha BETWEEN ? AND ?
                         AND id_caldera = ? 
                         AND temchimenea " . $relacionAlerta . " ?
                         GROUP BY fecha
                         ORDER BY fecha ASC";

			$stmt = $conn->prepare($sqlString);

            $fechaInicio = $fechaInicioObj->format('Y-m-d H:i:s');
            $fechaFin = $fechaFinObj->format('Y-m-d H:i:s');

			$stmt->bind_param('ssid', $fechaInicio, $fechaFin, $calderaId, $valorAlerta);
			$stmt->execute();
			$resultado = $stmt->get_result();
            $rows = array();

			if ($resultado->num_rows > 0) {
                while ($row = $resultado->fetch_assoc()) {
					//array_push($rows, $row);
                    $rows[$row["fechaPretty"]] = $row["cantidadAlertas"];
				}
            }
            else {
				$row = NULL;
            }
            
            $stmt->close();
            $conexion->cerrar_conn();
			
            return $rows;
        }
    }
?>