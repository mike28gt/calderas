<?php 
	include('../procs/db_connection.php');
	include 'temperatura_agua.php';

	$testObj = new TemperaturaAguaDatos();
    $fechaInicioObj = new DateTime("2022-08-31 00:00:00");
    $fechaFinObj = new DateTime("2022-09-07 23:59:59");
    $array = $testObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, 1, "menor", 10);
    echo print_r($array);
?>