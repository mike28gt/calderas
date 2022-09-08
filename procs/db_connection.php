<?php

	class Conexion { 

		private $conn;

		function __construct() {
        		$dbhost = "localhost";
        		$dbuser = "calderas_user";
        		$dbpass = "Calderas123$";
        		$db = "calderas_ina";
        		$this->conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n". $conn -> error);
		}

		function get_conn() {
			return $this->conn;
		}

		function cerrar_conn() {
        		$this->conn->close();
		}
	}
?>
