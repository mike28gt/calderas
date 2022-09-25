<?php
	include($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/caldera.php');

	class Caldera {
		private $calderasObj;

		function __construct() {
			$this->calderasObj = new CalderaDatos();
		}

		public function getCalderasActivas() {
			$resultados = $this->calderasObj->selectCalderasActivas();
			$arrayResultado = array();

			if (!is_null($resultados)) {
				foreach ($resultados as $row) {
					$arrayResultado[$row["numeroCaldera"]] = $row["calderaId"];
				}
			}

			return $arrayResultado;
		}

		public function buscar($calderaId) {
			return null;
		}
	}

?>
