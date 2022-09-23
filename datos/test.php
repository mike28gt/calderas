<?php 
	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/db_sql_server_connection.php');
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/sql_server/configuracion_parametro_medicion_caldera.php');
    
    $valorAtributoConfiguracionObj = new ConfiguracionParametroMedicionCaldera();
    $result = $valorAtributoConfiguracionObj->seleccionarActivo(1, "temp_agua", "temp_max");
    echo print_r($result);
    
    /*
    $connObj = new Conexion();

    $sql = "SELECT * FROM dbo.caldera1";

    $stmt = sqlsrv_query($connObj->get_conn(), $sql);

    if ($stmt === false) {
        if (($errors = sqlsrv_errors()) != null) {
            foreach ($errors as $error) {
                echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
                echo "code: ".$error[ 'code']."<br />";
                echo "message: ".$error[ 'message']."<br />";
            }
        }
    } else {
        //$rows = sqlsrv_fetch_array($stmt);
        //echo print_r($rows);

        while ($row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {
            echo print_r($row)."<br />";
        }
    }
    */
    /*
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/datos/gas_propano.php');

    $testObj = new GasPropanoDatos();
    $fechaInicioObj = new DateTime("2022-08-31 00:00:00");
    $fechaFinObj = new DateTime("2022-09-10 23:59:59");
    $array = $testObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, 1);
*/
    /*
	$testObj = new TemperaturaChimeneaDatos();
    $fechaInicioObj = new DateTime("2022-08-31 00:00:00");
    $fechaFinObj = new DateTime("2022-09-10 23:59:59");
    $array = $testObj->getCantidadAlertasPorFechaPorCaldera($fechaInicioObj, $fechaFinObj, 1, "mayor", 5);
    */
    //echo print_r($array);
?>