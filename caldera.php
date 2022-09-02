<?php
	include 'business/caldera.php';
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
    <div class="menu__bar">
        <div class="logo__nav">
            <a class="logo__s" href="/"><img class="logo__img" src="./img/cmi_logo.jpg" alt=""></a>
        </div>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="#">Calderas <i class="fas fa-caret-down"></i></a>
                <div class="dropdown__menu">
		    <ul>
			<li><a href="caldera.php?caldera=1">Caldera 1</a></li>
                        <li><a href="caldera.php?caldera=2">Caldera 2</a></li>
                        <li><a href="caldera.php?caldera=3">Caldera 3</a></li>
                        <li><a href="caldera.php?caldera=4">Caldera 4</a></li>
                    </ul>
                </div></li>
                <!--<li><a href="#">Proceso<i class="fa-solid fa-temperature-arrow-up"></i></a>
                    <div class="dropdown__menu">
                        <ul>
                            <li><a href="pres_vapor1.html">Presion de Vapor</a></li>
                        </ul>
                    </div></li>-->
                <li><a href="#"> Graficas<i class="fa-solid fa-chart-bar"></i></a>
                    <div class="dropdown__menu">
                        <ul>
                            <li><a href="niveles_agua1_graph.html">Nivel de Agua</a></li>
                            <li><a href="presiones_vapor1_graph.html">Presion de vapor</a></li>
                            <li><a href="presiones_bunker1_graph.html">Presion Bunker</a></li>
                            <li><a href="flama1_graph.html">Flama</a></li>
                            <li><a href="temp_agua1_graph.html">Temperatura Agua</a></li>
                            <li><a href="temp_chim1_graph.html">Temperatura Chimenea</a></li>
                        </ul>
                    </div></li>    
                    <li><a href="#"> Settings <i class="fa-solid fa-gear"></i></a>
                        <div class="dropdown__menu">
			    <ul>
                                <li><a href="configuracion_parametros.php?medicion=temp_agua">Temperatura de Agua</a></li>
                                <li><a href="configuracion_parametros.php?medicion=temp_chimenea">Temperatura de Chimenea</a></li>
                            </ul>
                        </div></li>

        </ul>
    </div>

    <div class="header">
    <h1 class="title">CALDERA <?php echo $caldera->get_num_caldera(); ?> EN TIEMPO REAL</h1>
    </div>

<div class="screen">
    <div>
            <form action="/" class="variables">
                    <label class="input-group mb-3">
                        <span class="input-group-text" id="f">1. Nivel de Agua Alto</span>
			<input type="text" class="form-control" id="f" value="<?php echo $nivel_agua_alto->get_ultimo_registro($id_caldera); ?>" name="fecha">
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="f">2. Nivel de Agua Bajo</span>
                        <input type="text" class="form-control" id="f" value="<?php echo $nivel_agua_bajo->get_ultimo_registro($id_caldera); ?>" name="fecha">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="f">3. Presion Baja Vapor</span>
                        <input type="text" class="form-control" id="f" value="<?php echo $presion_baja_vapor->get_ultimo_registro($id_caldera); ?>" name="fecha">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="f">4. Presion Alta Vapor</span>
                        <input type="text" class="form-control" id="f" value="<?php echo $presion_alto_vapor->get_ultimo_registro($id_caldera); ?>" name="fecha">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="f">5. Presion de Bunker</span>
                        <input type="text" class="form-control" id="f" value="<?php echo $presion_bunker->get_ultimo_registro($id_caldera); ?>" name="fecha">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="f">6. Gas Propano</span>
                        <input type="text" class="form-control" id="f" value="<?php echo $gas_propano->get_ultimo_registro($id_caldera); ?>" name="fecha">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="f">7. Flama</span>
                        <input type="text" class="form-control" id="f" value="<?php echo $flama->get_ultimo_registro($id_caldera); ?>" name="fecha">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="f">8. Temp. de Agua</span>
                        <input type="text" class="form-control" id="f" value="<?php echo $temperatura_agua->get_ultimo_registro($id_caldera); ?>" name="fecha">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="f">9. Temp. de Chimenea</span>
                        <input type="text" class="form-control" id="f" value="<?php echo $temperatura_chimenea->get_ultimo_registro($id_caldera); ?>" name="fecha">
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
<script src="../index.js"></script>    
</body>
</html>
