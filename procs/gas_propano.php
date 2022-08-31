<?php

	class GasPropano {
		
		function get_ultimo_registro($id_caldera) {
                        $conexion = new Conexion();
			$conn = $conexion->get_conn();

			$stmt = $conn->prepare("SELECT gpropano, fecha FROM gaspropano WHERE id_caldera = ? ORDER BY id DESC LIMIT 1");
			$stmt->bind_param('i', $id_caldera);
			$stmt->execute();
			$resultado = $stmt->get_result();

			if ($resultado->num_rows > 0) {
				$row = $resultado->fetch_assoc();
				$data = $row["gpropano"] . " " . $row["fecha"];	
			}
			else {
				$data = "No hay datos";
			}

			$conexion->cerrar_conn();

			return $data;
		}
	}
?>
