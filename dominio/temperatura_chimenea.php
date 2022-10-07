<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/temperatura_chimenea.php');

    class TemperaturaChimenea {
    
        private $id;
        private $valor;
        private $fechaGrabacion;

        public function __construct() {
            $this->id = 0;
            $this->valor = 0;
            $this->fechaGrabacion = "No hay registros grabados";
        }

        public function getId() {
            return $this->id;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getFechaGrabacion() {
            return $this->fechaGrabacion;
        }
        
        public function getUltimaMedicion($calderaId) {
            $temperaturaChimeneaDatosObj = new TemperaturaChimeneaDatos();
            $row = $temperaturaChimeneaDatosObj->getUltimoRegistro($calderaId);
            if ($row !== null) {
                $this->id = $row["id"];
                $this->valor = $row["valor"];
                $this->fechaGrabacion = $row["fechaPretty"];
            }
        }

        public function getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, $tipoAlerta, $valorAlerta) {
            $temperaturaChimeneaDatosObj = new TemperaturaChimeneaDatos();

            $partesFecha = explode("/", $fechaInicio);
            $fechaInicioObj = new DateTime($partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." 00:00:00");
            $partesFecha = explode("/", $fechaFin);
            $fechaFinObj = new DateTime($partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." 23:59:59");
            
            $rows = $temperaturaChimeneaDatosObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, $calderaId, $tipoAlerta, $valorAlerta);
            
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