<?php
	//namespace Dominio;

	include($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/configuracion_parametro_medicion_caldera.php');
	include($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/medicion.php');

	class Medicion {
		private $medicionId;
		private $atributoConfiguracionId;
		private $nombre;
		private $nombrePretty;
		private $activo;
		private $fechaGrabacion;
		private $fechaActualizacion;
		private $valorAtributoConfiguracionObj;
		private $valorAtributoConfiguracionId;
		private $calderaId;
		private $valorMaximo;
		private $valorMinimo;
		private $fechaGrabacionValores;
		private $fechaActualizacionValores;

		private $configuracionParametroMedicionCalderaObj;
		private $medicionObj;

		function __construct() {
			$this->configuracionParametroMedicionCalderaObj = new ConfiguracionParametroMedicionCaldera();
			$this->medicionObj = new DatosMedicion();
		}

		function setNombre($nombre) {
			$this->nombre = $nombre;
		}

                function setNombrePretty($nombrePretty) {
                        $this->nombrePretty = $nombrePretty;
		}

		function setCaldera($caldera) {
			if (is_a($caldera, 'Caldera')) {
				$this->calderaId = $caldera->calderaId();
			} 
		}

		function setValorMaximo($valorMaximo) {
			if (is_numeric($valorMaximo)) {
				$this->valorMaximo = $valorMaximo;
			}
		}

		function setValorMinimo($valorMinimo) {
			if (is_numeric($valorMinimo)) {
				$this->valorMinimo = $valorMinimo;
			}
		}

		public function getNombrePretty() {
			return $this->nombrePretty;
		}

		public function obtenerConfiguracionParametros($calderaId) {
			$arrayResultado = array();
			
			$resultados = $this->configuracionParametroMedicionCalderaObj->seleccionarConfiguracionParametrosActivos($calderaId, $this->nombre);
			if (!is_null($resultados)) { 
				foreach ($resultados as $row) {
					$arrayResultado[$row["nombreParametroMedicion"]] = $row["valor"];
				}
			}

			return $arrayResultado;
		}

		private function agregarConfiguracionParametros() {
		}

		public function getConfiguracionParametroMedicionNombrePretty($calderaId, $nombreParametroMedicion) {
			$resultado = $this->configuracionParametroMedicionCalderaObj->seleccionarActivo($calderaId, $this->nombre, $nombreParametroMedicion);
			if (!is_null($resultado)) {
				return $resultado["nombrePretty"];
			}
		}

		public function getByName() {
			$result =  $this->medicionObj->selectMedicionByName($this->nombre);
			if (!is_null($result)) {
				$this->medicionId = $result["medicionId"];
				//$this->nombre = $result["nombre"];
				$this->nombrePretty = $result["nombrePretty"];
			}
		}
/*
		private function existeConfiguracionParametros() {
			$configuracionParametroMedicionCalderaObj = new ConfiguracionParametroMedicionCaldera();
			return $configuracionParametroMedicionCalderaObj->get(1, $this->nombre);
		}
 */
		public function actualizarConfiguracionParametros($calderaId, $parametrosDict) {

			foreach ($parametrosDict as $nombreParametroMedicion => $valor) {
				//$resultado =  $this->configuracionParametroMedicionCalderaObj->seleccionarActivo($calderaId, $this->nombre, $nombreParametroMedicion);
				$resultado =  $this->configuracionParametroMedicionCalderaObj->buscarValorParametroConfiguracion($calderaId, $this->nombre, $nombreParametroMedicion);
				if (is_null($resultado)) {
					$this->configuracionParametroMedicionCalderaObj->insertar($calderaId, $this->nombre, $nombreParametroMedicion, $valor);
				} else {
					$this->configuracionParametroMedicionCalderaObj->actualizar($resultado, $valor);
				}
			}
		}	
	}
?>
