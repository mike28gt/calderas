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
        
        $calderaImgSrc = "";
        $isDisplayed = true;
        if ($calderaId == 1 || $calderaId == 2) {
                $calderaImgSrc = "./img/caldera1.jpeg";
        }
        else if ($calderaId == 3 || $calderaId == 4) {
                $calderaImgSrc = "./img/caldera3.jpeg";
                $isDisplayed = false;
        }

        //$nivel_agua_alto = new NivelAguaAlto();
        $flamaObj = new Flama();
        $flamaObj->getUltimaMedicion($calderaId);
        $datosFlama = $flamaObj->getId() . " " . $flamaObj->getFechaGrabacion();
        
        $gasPropanoObj = new GasPropano();
        $gasPropanoObj->getUltimaMedicion($calderaId);
        $datosGasPropano = $gasPropanoObj->getId() . " " . $gasPropanoObj->getFechaGrabacion();

        $nivelAguaObj = new NivelAgua();
        $nivelAguaObj->getUltimaMedicion($calderaId);
        $datosNivelAguaBajo = $nivelAguaObj->getIdBajo() . " " . $nivelAguaObj->getFechaGrabacionValorBajo();
        $datosNivelAguaAlto = $nivelAguaObj->getIdAlto() . " " . $nivelAguaObj->getFechaGrabacionValorAlto();

        $presionBunkerObj = new PresionBunker();
        $presionBunkerObj->getUltimaMedicion($calderaId);
        $datosPresionBunker = $presionBunkerObj->getId() . " " .$presionBunkerObj->getFechaGrabacion();

        $presionVaporObj = new PresionVapor();
        $presionVaporObj->getUltimaMedicion($calderaId);
        $datoPresionBajaVapor = $presionVaporObj->getIdBajo() . " " .$presionVaporObj->getFechaGrabacionValorBajo();
        $datosPresionAltaVapor = $presionVaporObj->getIdAlto() . " " .$presionVaporObj->getFechaGrabacionValorAlto();

        $temperaturaAguaObj = new TemperaturaAgua();
        $temperaturaAguaObj->getUltimaMedicion($calderaId);
        $datosTemperaturaAgua = $temperaturaAguaObj->getId() . " " .$temperaturaAguaObj->getFechaGrabacion();

	$temperaturaChimeneaObj = new TemperaturaChimenea();
        $temperaturaChimeneaObj->getUltimaMedicion($calderaId);
        $datosTemperaturaChimenea = $temperaturaChimeneaObj->getId() . " " .$temperaturaChimeneaObj->getFechaGrabacion();
?>
