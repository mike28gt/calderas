<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/db_sql_server_connection.php');

	class CalderaDatos {

		private $id;
		private $num_caldera;
		private $fecha;

		function __construct() {
			$this->id = 0;
			$this->num_caldera = 0;
			$this->fecha = null;
		}

		function set_id($id) {
			$this->id = $id;
		}

		function set_num_caldera($num_caldera) {
			$this->num_caldera = $num_caldera;
		}

		function set_fecha($fecha) {
			$this->fecha = $fecha;
		}

		function get_id() {
			return $this->id;
                }

		function get_num_caldera() {
			return $this->num_caldera;
                }

		function get_fecha() {
			return $this->fecha;
                }

		public function selectCalderasActivas() {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();
			
			$sql = "SELECT caldera_id as calderaId, nombre as numeroCaldera FROM caldera WHERE activo_p = 't'";
			$options = array("Scrollable"=>"keyset");
			$stmt = sqlsrv_query($conn, $sql, null, $options);

			$rows = array();
			if ($stmt === false) {
				if (($errors = sqlsrv_errors()) != null) {
					foreach ($errors as $error) {
						echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
						echo "code: ".$error[ 'code']."<br />";
						echo "message[caldera.php-selectCalderasActivas]: ".$error[ 'message']."<br />";
					}
				}
			}
			else {
				if (sqlsrv_has_rows($stmt)) {
					while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
						array_push($rows, $row);
					}
				}
				sqlsrv_free_stmt($stmt);
			}

			$conexion->cerrar_conn();
			
			return $rows;
		}

		public function buscar($id_caldera) {
                        $conexion = new Conexion();
                        $conn = $conexion->get_conn();	
			
			$stmt = $conn->prepare("SELECT id, num_caldera, fecha FROM caldera WHERE id = ?");
			$stmt->bind_param('i', $id_caldera);
			$stmt->execute();
			$resultado = $stmt->get_result();

			//$caldera = new Caldera();

			if ($resultado->num_rows > 0) {
				$row = $resultado->fetch_assoc();
				$this->id = $row["id"];
				$this->num_caldera = $row["num_caldera"];
				$this->fecha = $row["fecha"];
			}

			$conexion->cerrar_conn();
		}
	}
?>
