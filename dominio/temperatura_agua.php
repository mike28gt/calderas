<?php

use TemperaturaAgua as GlobalTemperaturaAgua;

require($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/temperatura_agua.php');

    class TemperaturaAgua {
    
        public function getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, $tipoAlerta, $valorAlerta) {
            $temperaturaAguaDatosObj = new TemperaturaAguaDatos();

            $partesFecha = explode("/", $fechaInicio);
            $fechaInicioObj = new DateTime($partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." 00:00:00");
            $partesFecha = explode("/", $fechaFin);
            $fechaFinObj = new DateTime($partesFecha[2]."-".$partesFecha[1]."-".$partesFecha[0]." 23:59:59");
            
            $rows = $temperaturaAguaDatosObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, $calderaId, $tipoAlerta, $valorAlerta);
            
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