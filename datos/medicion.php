<?php
	class DatosMedicion {

		public function selectMedicionByName($nombreMedicion) {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();
			$stmt = $conn->prepare("SELECT medicion_id as medicionId, nombre, nombre_pretty as nombrePretty from medicion where nombre = ?");
			$stmt->bind_param('s', $nombreMedicion);
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
	}
?>
