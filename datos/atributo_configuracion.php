<?php
	namespace Datos;

	class AtributoConfiguracion() {

		function getByName($nombre) {
			$conexion = new Conexion();
                        $conn = $conexion->get_conn();

                        $stmt = $conn->prepare("SELECT * FROM atributo_configuracion WHERE nombre = ? AND activo_p = 1");
                        $stmt->bind_param('s', $nombre);
                        $stmt->execute();
                        $resultado = $stmt->get_result();

                        if ($resultado->num_rows > 0) {
                                $row = $resultado->fetch_assoc();
                        }
                        else {
                                $row = null;
                        }

                        $conexion->cerrar_conn();
                        return $row;
		}

		function getById($id) {
                        $conexion = new Conexion();
                        $conn = $conexion->get_conn();

                        $stmt = $conn->prepare("SELECT * FROM atributo_configuracion WHERE id = ? AND activo_p = 1");
                        $stmt->bind_param('i', $id);
                        $stmt->execute();
                        $resultado = $stmt->get_result();

                        if ($resultado->num_rows > 0) {
                                $row = $resultado->fetch_assoc();
                        }
                        else {
                                $row = null;
                        }

                        $conexion->cerrar_conn();
                        return $row;
		}
        }
?>
