<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/db_connection.php');

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
			
			$stmt = $conn->prepare("SELECT id as calderaId, num_caldera as numeroCaldera FROM caldera");
			$stmt->execute();
			$resultado = $stmt->get_result();
			$rows = array();

			if ($resultado->num_rows > 0) {
				while ($row = $resultado->fetch_assoc()) {
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
