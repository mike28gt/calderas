<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/caldera.php');

    $ajaxUrl = "negocio/ajax-list/flama_alertas_ajax.php";
    $intervaloDias = 7;
    $calderaObj = new Caldera();
    $calderasLista = $calderaObj->getCalderasActivas();
    $calderasFiltrosHtml = "";

    foreach (array_keys($calderasLista) as $numeroCaldera) {
        $calderasFiltrosHtml = $calderasFiltrosHtml."<label class='form-check-label'>Caldera ".$numeroCaldera."</label>&nbsp;<input type='radio' class='form-check-input' name='filtroCaldera' value='".$calderasLista[$numeroCaldera]."'>&nbsp;&nbsp;&nbsp;&nbsp;";
    }    
?>