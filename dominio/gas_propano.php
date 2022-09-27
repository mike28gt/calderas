<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/gas_propano.php');

    class GasPropano {
    
        private $valor;
        private $fechaGrabacion;

        public function __construct() {
            $this->valor = 0;
            $this->fechaGrabacion = "No hay registros grabados";
        }

        public function getValor() {
            return $this->valor;
        }

        public function getFechaGrabacion() {
            return $this->fechaGrabacion;
        }

        public function getUltimaMedicion($calderaId) {
            $gasPropanoDatosObj = new GasPropanoDatos();
            $row = $gasPropanoDatosObj->getUltimoRegistro($calderaId);
            error_log("getUltimaMedicion" . $row);
            if ($row !== null) {
                $this->valor = $row["valor"];
                $this->fechaGrabacion = $row["fechaPretty"];
                error_log("getUltimaMedicion" . $this->fechaGrabacion);
            }
        }

        public function getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId) {

            $gasPropanoObj = new GasPropanoDatos();
            
            $partesFecha = explode("/", $fechaInicio);
            $fechaInicioObj = new DateTime($partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." 00:00:00");
            $partesFecha = explode("/", $fechaFin);
            $fechaFinObj = new DateTime($partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." 23:59:59");
            
            $rows = $gasPropanoObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, $calderaId);
            
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