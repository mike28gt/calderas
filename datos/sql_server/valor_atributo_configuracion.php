<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/db_sql_server_connection.php');

	class ValorAtributoConfiguracion {

		function getByAtributoConfiguracionId($atributoConfiguracionId, $calderaId) {
			$conexion = new Conexion();
            $conn = $conexion->get_conn();

			if ($calderaId == null) {
				$sql = "SELECT * FROM valor_atributo_configuracion WHERE atributo_configuracion_id = ? AND caldera_id IS NULL";
				$params = array(&$atributoConfiguracionId);
				$stmt = sqlsrv_query($conn, $sql, $params);

				//$stmt = $conn->prepare("SELECT * FROM valor_atributo_configuracion WHERE atributo_configuracion_id = ? AND caldera_id IS NULL");
				//$stmt->bind_param('i', $atributoConfiguracionId);
			}
			else {
			        $stmt = $conn->prepare("SELECT * FROM valor_atributo_configuracion WHERE atributo_configuracion_id = ? AND caldera_id = ?");
                                $stmt->bind_param('ii', $atributoConfiguracionId, $calderaId);
			}

			if ($stmt == false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message: ".$error[ 'message']."<br />";
					}
				}

				$row = null;
			} 
			else {
				$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
			}

			sqlsrv_free_stmt($stmt);
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
