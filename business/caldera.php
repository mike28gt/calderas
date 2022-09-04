<?php
	include 'procs/db_connection.php';
	include 'procs/caldera.php';
	include 'procs/nivel_agua_alto.php';
        include 'procs/flama.php';
        include 'procs/gas_propano.php';
        include 'procs/nivel_agua_bajo.php';
        include 'procs/presion_bunker.php';
        include 'procs/presion_alta_vapor.php';
        include 'procs/presion_baja_vapor.php';
        include 'procs/temperatura_agua.php';
	include 'procs/temperatura_chimenea.php';


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
