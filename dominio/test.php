<?php 
	include('presion_vapor.php');

	$temperaturaChimeneaObj = new PresionVapor();
	$result = $temperaturaChimeneaObj->getDatosReporteAlertas("31/08/2022", "10/09/2022", 1, "meno", 5);
	echo print_r($result);

	/*
	$temperaturaChimeneaObj = new TemperaturaChimenea();
	$result = $temperaturaChimeneaObj->getDatosReporteAlertas("31/08/2022", "10/09/2022", 1, "menor", 5);
	echo print_r($result);
	*/
	/*
	include 'medicion.php';
	include 'caldera.php';

	$array = array();
	$name = "temp_max";
	$value = 31;
	$array[$name] = $value;
        $name = "temp_min";
        $value = 1;
        $array[$name] = $value;

	$calderaIdDefault = 1;
	$testObj = new Medicion;
        $testObj->setNombre("temp_agua");
//	echo $testObj->actualizarConfiguracionParametros($calderaIdDefault, $array);
//	echo print_r($testObj->obtenerConfiguracionParametros($calderaIdDefault));
	$calderaObj = new Caldera();
	echo print_r($calderaObj->getCalderasActivas());
	*/
?>
