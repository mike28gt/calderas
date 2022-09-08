<?php
	namespace Datos;

	class ValorAtributoConfiguracion {

		function getByAtributoConfiguracionId($atributoConfiguracionId, $calderaId) {
			$conexion = new Conexion();
                        $conn = $conexion->get_conn();

			if ($calderaId == null) {
                        	$stmt = $conn->prepare("SELECT * FROM valor_atributo_configuracion WHERE atributo_configuracion_id = ? AND caldera_id IS NULL");
                        	$stmt->bind_param('i', $atributoConfiguracionId);
			}
			else {
			        $stmt = $conn->prepare("SELECT * FROM valor_atributo_configuracion WHERE atributo_configuracion_id = ? AND caldera_id = ?");
                                $stmt->bind_param('ii', $atributoConfiguracionId, $calderaId);
			}
                        $stmt->execute();
                        $resultado = $stmt->get_result();

                        if ($resultado->num_rows > 0) {
                                $row = $resultado->fetch_assoc();
                        }
                        else {
                                $row = null;
                        }

			$stmt->close();
                        $conexion->cerrar_conn();
                        return $row;	
		}

		function agregarRegistro($valorAtributoConfiguracionObj) {
			$conexion = new Conexion();
                        $conn = $conexion->get_conn();

			try { 
                        	$stmt = $conn->prepare("INSERT INTO valor_atributo_configuracion(atributo_configuracion_id, caldera_id, valor_maximo, valor_minimo) VALUES (?, ?, ?, ?)");
				$stmt->bind_param('iidd', $valorAtributoConfiguracionObj->getAtributoConfiguracionId()
							, $valorAtributoConfiguracionObj->getCalderaId()
							, $valorAtributoConfiguracionObj->getValorMaximo()
							, $valorAtributoConfiguracionObj->getValorMinimo()
						 );
                        	$result = $stmt->execute();
			} catch (Exception $e) {
				echo "Error al insertar valor de atributos: ", $e->getMessage(), "\n";
			}

			$stmt->close();
                        $conexion->cerrar_conn();

			return $result;
		}

                function actualizarRegistro($valorAtributoConfiguracionObj) {
                        $conexion = new Conexion();
                        $conn = $conexion->get_conn();
                
                        try {
                                $stmt = $conn->prepare("UPDATE valor_atributo_configuracion SET valor_maximo = ?, valor_minimo = ?, fecha_actualizacion = NOW() WHERE valor_parametro_configuracion_id = ?");
                                $stmt->bind_param('ddi', $valorAtributoConfiguracionObj->getAtributoConfiguracionId()
						       , $valorAtributoConfiguracionObj->getCalderaId()
						       , $valorAtributoConfiguracionObj->getValorMaximo()
						 );
                                $result = $stmt->execute();
                        } catch (Exception $e) {
                                echo "Error al actualizar valor de atributos: ", $e->getMessage(), "\n";
                        }

                        $stmt->close();
                        $conexion->cerrar_conn();

                        return $result;
                }
	}	
?>
