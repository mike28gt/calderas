<?php

	include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/temperatura_agua.php');

	$calderaId = $_POST["calderaId"];
	$fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];
	$temperaturaMaxima = $_POST["temperaturaMaxima"];
	$temperaturaMinima = $_POST["temperaturaMinima"];

	/*
	$calderaId = 1;
	$fechaInicio = '31/08/2022';
	$fechaFin = '08/09/2022';
	$temperaturaMaxima = 10;
	$temperaturaMinima = 5;
	*/

	$temperaturaAguaObj = new TemperaturaAgua();
	$alertasMayoresArray = $temperaturaAguaObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, "mayor", $temperaturaMaxima);
	$alertasMenoresArray = $temperaturaAguaObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, "menor", $temperaturaMinima);

	$resultadoArray = array();
	$resultadoArray["x"] = $alertasMayoresArray["serieX"];
	$resultadoArray["Alertas superiores al máximo"] = $alertasMayoresArray["serieY"];
	$resultadoArray["Alertas inferiores al mínimo"] = $alertasMenoresArray["serieY"];
	
	echo json_encode($resultadoArray);
?>
