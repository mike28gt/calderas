<?php
	include($_SERVER['DOCUMENT_ROOT'].'/calderas/procs/db_connection.php');
	include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/caldera.php');
	include($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/medicion.php');

	$nombreMedicion = $_GET["medicion"];
	$calderaObj = new Caldera();
	$medicionObj = new Medicion();
	$calderas = $calderaObj->getCalderasActivas();
	$medicionObj->setNombre($nombreMedicion);
	$medicionObj->getByName();
        $titulo = "Ajustes de " . $medicionObj->getNombrePretty();
	$bodyHTML = "";

	foreach ($calderas as $calderaId => $numeroCaldera) {
		$bodyHTML = $bodyHTML . "<div><h3>Caldera " . $numeroCaldera . "</h3>";
		$bodyHTML = $bodyHTML . "<form class='variables'>";

		$parametrosMedicion = $medicionObj->obtenerConfiguracionParametros($numeroCaldera);
		foreach ($parametrosMedicion as $nombreParametroMedicion => $valor) {
			$bodyHTML = $bodyHTML . "<div class='input-group mb-3'>" ;
			$bodyHTML = $bodyHTML . "<span class='input-group-text'>".$medicionObj->getConfiguracionParametroMedicionNombrePretty($calderaId, $nombreParametroMedicion)."</span>";
			$bodyHTML = $bodyHTML . "<input type='text' class='form-control get-data' id='".$numeroCaldera."-".$nombreParametroMedicion."-".$nombreMedicion."' value='".$valor."'>";
			$bodyHTML = $bodyHTML . "</div>" ;
		}

		$bodyHTML = $bodyHTML . "</form>";
		$bodyHTML = $bodyHTML . "</div></br>";

	}
?>
