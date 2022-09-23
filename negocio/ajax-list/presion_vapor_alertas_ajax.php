<?php

	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/presion_vapor.php');

	$calderaId = $_POST["calderaId"];
	$fechaInicio = $_POST["fechaInicio"];
    $fechaFin = $_POST["fechaFin"];

	$presionVaporObj = new PresionVapor();
	$alertasMayoresArray = $presionVaporObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, "mayor");
	$alertasMenoresArray = $presionVaporObj->getDatosReporteAlertas($fechaInicio, $fechaFin, $calderaId, "menor");

	$resultadoArray = array();
	$resultadoArray["x"] = $alertasMayoresArray["serieX"];
	$resultadoArray["Alertas presión alta"] = $alertasMayoresArray["serieY"];
	$resultadoArray["Alertas presión baja"] = $alertasMenoresArray["serieY"];
	
	echo json_encode($resultadoArray);
?>
