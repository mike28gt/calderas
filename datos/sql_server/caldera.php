<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/db_sql_server_connection.php');

	class CalderaDatos {

		private $id;
		private $num_caldera;
		private $fecha;
		private $nombre_pretty;
        private $tabla_datos;
        private $activo_p;
        private $fecha_actualizacion;

		function __construct() {
			$this->id = 0;
			$this->num_caldera = 0;
			$this->fecha = null;
			$this->nombre_pretty = "";
			$this->tabla_datos = "";
			$this->activo_p = "";
			$this->fecha_actualizacion = null;
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

		function set_tabla_datos($tabla_datos) {
			$this->tabla_datos = $tabla_datos;
		}

		function get_id() {
			return $this->id;
		}

		function getNumCaldera() {
			return $this->num_caldera;
		}

		function get_fecha() {
			return $this->fecha;
		}

		function get_tabla_datos() {
			return $this->tabla_datos;
		}

		public function selectCalderasActivas() {
			$conexion = new Conexion();
			$conn = $conexion->get_conn();
			
			$sql = "SELECT caldera_id AS calderaId, nombre AS numeroCaldera FROM caldera WHERE activo_p = 't'";
			$stmt = sqlsrv_query($conn, $sql);

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
			$resultado = false;

			$sql = "SELECT caldera_id AS id, nombre AS num_caldera, fecha_grabacion AS fecha, tabla_datos FROM dbo.caldera WHERE caldera_id = ? AND activo_p = 't'";
			$params = array(&$id_caldera);
			$stmt = sqlsrv_query($conn, $sql, $params);

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
					$row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
					$this->id = $row["id"];
					$this->num_caldera = $row["num_caldera"];
					$this->fecha = $row["fecha"];
					$this->tabla_datos = $row["tabla_datos"];
					$resultado = true;
				}
				sqlsrv_free_stmt($stmt);
			}

			$conexion->cerrar_conn();
			return $resultado;
		}
	}
?>
