<?php 
	include('../procs/db_connection.php');
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
?>
