<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/caldera.php');

    $calderaObj = new Caldera();
    $calderasLista = $calderaObj->getCalderasActivas();
    $calderasFiltrosHtml = "";

    foreach (array_keys($calderasLista) as $numeroCaldera) {
        $calderasFiltrosHtml = $calderasFiltrosHtml."<label>Caldera ".$numeroCaldera."</label><input type='radio' name='filtroCaldera' value='".$calderasLista[$numeroCaldera]."'>&nbsp;&nbsp;";
    }
    echo $calderasFiltrosHtml;

    
?>