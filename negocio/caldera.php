<?php
        require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/caldera.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/flama.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/gas_propano.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/nivel_agua.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/presion_bunker.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/presion_vapor.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/temperatura_agua.php');
        require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/temperatura_chimenea.php');

	$calderaId = $_GET["caldera"];
	$calderaObj = new Caldera();
	$calderaObj->buscar($calderaId);
        
        //$nivel_agua_alto = new NivelAguaAlto();
        $flamaObj = new Flama();
        $flamaObj->getUltimaMedicion($calderaId);
        $datosFlama = $flamaObj->getValor() . " " . $flamaObj->getFechaGrabacion();
        
        $gasPropanoObj = new GasPropano();
        $gasPropanoObj->getUltimaMedicion($calderaId);
        $datosGasPropano = $gasPropanoObj->getValor() . " " . $gasPropanoObj->getFechaGrabacion();

        $nivelAguaObj = new NivelAgua();
        $nivelAguaObj->getUltimaMedicion($calderaId);
        $datosNivelAguaBajo = $nivelAguaObj->getValorBajo() . " " . $nivelAguaObj->getFechaGrabacionValorBajo();
        $datosNivelAguaAlto = $nivelAguaObj->getValorAlto() . " " . $nivelAguaObj->getFechaGrabacionValorAlto();

        $presionBunkerObj = new PresionBunker();
        $presionBunkerObj->getUltimaMedicion($calderaId);
        $datosPresionBunker = $presionBunkerObj->getValor() . " " .$presionBunkerObj->getFechaGrabacion();

        $presionVaporObj = new PresionVapor();
        $presionVaporObj->getUltimaMedicion($calderaId);
        $datoPresionBajaVapor = $presionVaporObj->getValorBajo() . " " .$presionVaporObj->getFechaGrabacionValorBajo();
        $datosPresionAltaVapor = $presionVaporObj->getValorAlto() . " " .$presionVaporObj->getFechaGrabacionValorAlto();

        $temperaturaAguaObj = new TemperaturaAgua();
        $temperaturaAguaObj->getUltimaMedicion($calderaId);
        $datosTemperaturaAgua = $temperaturaAguaObj->getValor() . " " .$temperaturaAguaObj->getFechaGrabacion();

	$temperaturaChimeneaObj = new TemperaturaChimenea();
        $temperaturaChimeneaObj->getUltimaMedicion($calderaId);
        $datosTemperaturaChimenea = $temperaturaChimeneaObj->getValor() . " " .$temperaturaChimeneaObj->getFechaGrabacion();
?>
