<?php
        include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/caldera.php');
        include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/flama.php');
        include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/gas_propano.php');
        include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/nivel_agua.php');
        include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/presion_bunker.php');
        include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/presion_vapor.php');
        include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/temperatura_agua.php');
        include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/temperatura_chimenea.php');

	$id_caldera = $_GET["caldera"];
	$caldera = new Caldera();
	$caldera->buscar($id_caldera);
        
        $nivel_agua_alto = new NivelAguaAlto();
        $flama = new Flama();
        $gas_propano = new GasPropano();
        $nivel_agua_bajo = new NivelAguaBajo();
        $presion_bunker = new PresionBunker();
        $presion_alto_vapor = new PresionAltaVapor();
        $presion_baja_vapor = new PresionBajaVapor();
        $temperatura_agua = new TemperaturaAgua();
	$temperatura_chimenea = new TemperaturaChimenea();
?>
