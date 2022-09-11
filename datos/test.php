<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/db_connection.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/nivel_agua_bajo.php');

	$testObj = new NivelAguaBajoDatos();
    $fechaInicioObj = new DateTime("2022-08-31 00:00:00");
    $fechaFinObj = new DateTime("2022-09-10 23:59:59");
    $array = $testObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, 1);
    echo print_r($array);
?>