<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/db_connection.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/temperatura_chimenea.php');

	$testObj = new TemperaturaChimeneaDatos();
    $fechaInicioObj = new DateTime("2022-08-31 00:00:00");
    $fechaFinObj = new DateTime("2022-09-10 23:59:59");
    $array = $testObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, 1, "mayor", 5);
    echo print_r($array);
?>