<?php

    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/dominio/medicion.php');

    $selectorGrafica = $_GET["medicion"];
    $medicionObj = new Medicion();
    $medicionObj->setNombre($_GET["medicion"]);
    $medicionObj->getByName();
    $include = "";
    $medicionNombre = $medicionObj->getNombrePretty();

    switch ($selectorGrafica) {
        case "temp_agua":
            $include = "/calderas/negocio/includes/temperatura_agua_alertas_reporte.php";
            break;
        case "nivel_agua":
            $include = "/calderas/negocio/includes/nivel_agua_alertas_reporte.php";
            break;
        case "presion_vapor":
            $include = "/calderas/negocio/includes/presion_vapor_alertas_reporte.php";
            break;
        case "presion_bunker":
            $include = "/calderas/negocio/includes/presion_bunker_alertas_reporte.php";
            break;
        case "flama":
            $include = "/calderas/negocio/includes/flama_alertas_reporte.php";
            break;
        case "temp_chimenea":
            $include = "/calderas/negocio/includes/temperatura_chimenea_alertas_reporte.php";
            break;
        case "gas_propano":
                $include = "/calderas/negocio/includes/gas_propano_alertas_reporte.php";
            break;
    }
?>