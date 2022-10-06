<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/presion_vapor_alta.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/presion_vapor_baja.php');

    class PresionVapor {
        private $idAlto;
        private $idBajo;
        private $valorAlto;
        private $valorBajo;
        private $fechaGrabacionValorAlto;
        private $fechaGrabacionValorBajo;

        public function __construct() {
            $this->idAlto = 0;
            $this->idBajo = 0;
            $this->valorAlto = 0;
            $this->valorBajo = 0;
            $this->fechaGrabacionValorAlto = "No hay registros grabados";
            $this->fechaGrabacionValorBajo = "No hay registros grabados";
        }

        public function getIdAlto() {
            return $this->idAlto;
        }

        public function getIdBajo() {
            return $this->idBajo;
        }

        public function getValorAlto() {
            return $this->valorAlto;
        }

        public function getFechaGrabacionValorAlto() {
            return $this->fechaGrabacionValorAlto;
        }

        public function getValorBajo() {
            return $this->valorBajo;
        }

        public function getFechaGrabacionValorBajo() {
            return $this->fechaGrabacionValorBajo;
        }

        public function getUltimaMedicion($calderaId) {
            $presionVaporAltaDatosObj = new PresionVaporAltaDatos();
            $presionVaporBajaDatosObj = new PresionVaporBajaDatos();

            $row = $presionVaporAltaDatosObj->getUltimoRegistro($calderaId);
            if ($row !== null) {
                $this->idAlto = $row["id"];
                $this->valorAlto = $row["valor"];
                $this->fechaGrabacionValorAlto = $row["fechaPretty"];
            }

            $row = $presionVaporBajaDatosObj->getUltimoRegistro($calderaId);
            if ($row !== null) {
                $this->idBajo = $row["id"];
                $this->valorBajo = $row["valor"];
                $this->fechaGrabacionValorBajo = $row["fechaPretty"];
            }
        }

        public function getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, $tipoAlerta) {

            if ($tipoAlerta == "mayor") {
                $presionVaporDatosObj = new PresionVaporAltaDatos();
            } else {
                $presionVaporDatosObj = new PresionVaporBajaDatos();
            }
            
            $partesFecha = explode("/", $fechaInicio);
            $fechaInicioObj = new DateTime($partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." 00:00:00");
            $partesFecha = explode("/", $fechaFin);
            $fechaFinObj = new DateTime($partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." 23:59:59");
            
            $rows = $presionVaporDatosObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, $calderaId);
            
            $series = array();
            $serieX = array();
            $serieY = array();

            $periodoFecha = new DateInterval('P1D');
            
            while ($fechaInicioObj <= $fechaFinObj) {
                $fechaInicioStr = $fechaInicioObj->format("d/m/Y");
                array_push($serieX, $fechaInicioStr);
                if (array_key_exists($fechaInicioStr, $rows)) {
                    array_push($serieY, $rows[$fechaInicioStr]);    
                }
                else {
                    array_push($serieY, "0");
                }

                $fechaInicioObj = $fechaInicioObj->add($periodoFecha);
            }
            
            $series["serieX"] = $serieX;
            $series["serieY"] = $serieY;

            return $series;
        }
    }
?>