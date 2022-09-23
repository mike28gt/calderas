<?php

	class Conexion { 

		private $conn;

		function __construct() {
			$serverName = "localhost";
			/*
			** Se agrega el atributo "TrustServerCertificate"=>1 para evitar error de openssl en cuanto al certificado.
			** Debido a esto los datos se estan enviando sin ser encriptados.
			*/
			$connectionInfo = array("Database"=>"Calderas", "UID"=>"calderas_user", "PWD"=>"Calderas123$", "TrustServerCertificate"=>1);
			$this->conn = sqlsrv_connect($serverName, $connectionInfo);

			if ($this->conn === false) {
				die(print_r(sqlsrv_errors(), true));
			}
		}

		function get_conn() {
			return $this->conn;
		}

		function cerrar_conn() {
			sqlsrv_close($this->conn);
		}
	}
?>
