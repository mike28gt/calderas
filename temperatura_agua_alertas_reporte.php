<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="js/c3-0.7.20/c3.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker3.min.css">
    <script type="text/javascript" src="js/c3-0.7.20/docs/js/d3-5.8.2.min.js"></script>
    <script type="text/javascript" src="js/c3-0.7.20/c3.min.js"></script>
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.es.min.js"></script>

    <title>Centro de datos de Calderas</title>
</head>
<body>
    <div class="menu__bar">
        <div class="logo__nav">
            <a class="logo__s" href="/"><img class="logo__img" src="./img/cmi_logo.jpg" alt=""></a>
        </div>
        <ul>
	    <li><a href="/calderas">Home</a></li>
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

    <div class="header">
        <h1 class="title">Grafica de Temperatura de agua Caldera 1</h1>
    </div>

<div class="screen">
    <div>
        <div class="input-group input-daterange">
            <input type="text" id="fechaInicio" class="form-control">
            <div class="input-group-addon">&nbsp;a&nbsp;&nbsp;</div>
            <input type="text" id="fechaFin" class="form-control">
        </div>
        <div id="chart"></div>
    </div>
</div>     
</body>
<script type="text/javascript">

    function refrescarGrafica() {
        $.ajax({
            method: "POST",
            //url: "tomar URL de PHP",
            url: "business/ajax-list/temperatura_agua_alertas_ajax.php",
            data: {"calderaId": 1, "fechaInicio": "31/08/2022", "fechaFin": "07/09/2022", "temperaturaMaxima": 10, "temperaturaMinima": 5}
	    }).done(function(msg) {
            //console.log(msg);
            var responseJsonObject = JSON.parse(msg);

            chart.load({
                    json: responseJsonObject
            });
            
        })
        .fail(function(jqXHR, textStatus) {
            console.log(textStatus);
        });
    }

    $(document).ready(function() {
        
        var fechaActual = new Date();
        var fechaInicio = fechaActual - 5;
        var fechaInicioStr = fechaActual.getDate() + "/" + (fechaActual.getMonth()+1) + "/" + fechaActual.getFullYear();
        $("#fechaInicio").val();
        $("#fechaFin").val();


        $('.input-daterange input').each(function() {
            $(this).datepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                todayBtn: true,
                todayHighlight: true
            });
        });

        var chart = c3.generate({
            bindto: '#chart',
            data: {
                x: 'x',
                json: {
                    x: [],
                    'Alertas superiores al máximo': [],
                    'Alertas inferiores al mínimo': []
                }
            },
            axis: {
                x: {
                    type: 'category',
                    label: {
                        text: 'Fechas',
                        position: 'outer-center'
                    },
                    tick: {
                        rotate: 75,
                        multiline: false
                    }
                },
                y: {
                    label: {
                        text: 'Cantidad de Alertas',
                        position: 'outer-middle'
                    }
                }
            },
            grid: {
                x: {
                    show: true
                },
                y: {
                    show: true
                }
            }
        });
    });

</script>
</html>
