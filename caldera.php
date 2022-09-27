<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/negocio/caldera.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="60">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Centro de datos de Calderas</title>
</head>
<body>

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/negocio/includes/menu_principal.php'); ?>

    <div class="header">
    <h1 class="title">Caldera <?php echo $calderaObj->getNombre(); ?> en Tiempo Real</h1>
    </div>

<div class="screen">
    <div>
            <form action="/" class="variables">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">1. Nivel de Agua Alto</span>
			        <input type="text" class="form-control" id="f" value="<?php echo $datosNivelAguaAlto; ?>" name="fecha">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">2. Nivel de Agua Bajo</span>
                    <input type="text" class="form-control" id="f" value="<?php echo $datosNivelAguaBajo; ?>" name="fecha">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">3. Presion Baja Vapor</span>
                    <input type="text" class="form-control" id="f" value="<?php echo $datoPresionBajaVapor; ?>" name="fecha">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">4. Presion Alta Vapor</span>
                    <input type="text" class="form-control" id="f" value="<?php echo $datosPresionAltaVapor; ?>" name="fecha">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">5. Presion de Bunker</span>
                    <input type="text" class="form-control" id="f" value="<?php echo $datosPresionBunker; ?>" name="fecha">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">6. Gas Propano</span>
                    <input type="text" class="form-control" id="f" value="<?php echo $datosGasPropano; ?>" name="fecha">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">7. Flama</span>
                    <input type="text" class="form-control" id="f" value="<?php echo $datosFlama; ?>" name="fecha">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">8. Temp. de Agua</span>
                    <input type="text" class="form-control" id="f" value="<?php echo $datosTemperaturaAgua; ?>" name="fecha">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="f">9. Temp. de Chimenea</span>
                    <input type="text" class="form-control" id="f" value="<?php echo $datosTemperaturaChimenea; ?>" name="fecha">
                </div>
            </form>
    </div>
    <div>
            <img src="./img/caldera1.jpeg" alt="">
            <!--<div  class="boton">
                <a href="#">Entradas Analogicas</a>
            </div>
            <div  class="boton">
                <a href="#">Entradas Digitales</a>
    </div>-->
    </div>
</div> 
</body>
</html>
