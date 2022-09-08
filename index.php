<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Centro de datos de Calderas</title>
</head>
<body>
    <div class="menu__bar">
        <div class="logo__nav">
            <a class="logo__s" href="/"><img class="logo__img" src="./img/cmi_logo.jpg" alt=""></a>
        </div>
        <ul>
            <li><a href="/calderas">Home</a></li>
            <li><a href="#">Calderas<i class="fas fa-caret-down"></i></a>
                <div class="dropdown__menu">
                    <ul>
                        <li><a href="caldera.php?caldera=1">Caldera 1</a></li>
                        <li><a href="caldera.php?caldera=2">Caldera 2</a></li>
                        <li><a href="caldera.php?caldera=3">Caldera 3</a></li>
                        <li><a href="caldera.php?caldera=4">Caldera 4</a></li>
                    </ul>
                </div>
	    </li>
                <li><a href="#"> Graficas<i class="fa-solid fa-chart-bar"></i></a>
                    <div class="dropdown__menu">
                        <ul>
                            <li><a href="temperatura_agua_alertas_reporte.php">Temperatura de Agua</a></li>
                            <li><a href="niveles_agua1_graph.html">Nivel de Agua</a></li>
                            <li><a href="presiones_vapor1_graph.html">Presion de vapor</a></li>
                            <li><a href="presiones_bunker1_graph.html">Presion Bunker</a></li>
                            <li><a href="flama1_graph.html">Flama</a></li>
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

    <section id="banner">
        <div class="contenido-banner">
            <h3><span>CENTRO DE ADQUISICION DE DATOS </span> <br>DE CALDERAS</h3>
        </div>
        
    </section>
</body>
</html>
