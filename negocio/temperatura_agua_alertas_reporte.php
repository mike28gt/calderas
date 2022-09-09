<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/caldera.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/medicion.php');

    $ajaxUrl = "business/ajax-list/temperatura_agua_alertas_ajax.php";
    $intervaloDias = 7;
    $calderaObj = new Caldera();
    $calderasLista = $calderaObj->getCalderasActivas();
    $medicionObj = new Medicion();
    $medicionObj->setNombre("temp_agua");
    $calderasFiltrosHtml = "";

    foreach (array_keys($calderasLista) as $numeroCaldera) {
        $mediciones = $medicionObj->obtenerConfiguracionParametros($calderasLista[$numeroCaldera]);
        $calderasFiltrosHtml = $calderasFiltrosHtml."<label class='form-check-label'>Caldera ".$numeroCaldera."</label>&nbsp;<input type='radio' class='form-check-input' name='filtroCaldera' temp_max='".$mediciones["temp_max"]."' temp_min='".$mediciones["temp_min"]."' value='".$calderasLista[$numeroCaldera]."'>&nbsp;&nbsp;&nbsp;&nbsp;";
    }    
?>