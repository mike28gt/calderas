<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/business/configuracion_parametros.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="js/jquery-3.6.1.min.js"></script>

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
                            <li><a href="graficas.php?medicion=temp_agua">Temperatura de Agua</a></li>
                            <li><a href="graficas.php?medicion=nivel_agua">Nivel de Agua</a></li>
                            <li><a href="graficas.php?medicion=presion_vapor">Presion de vapor</a></li>
                            <li><a href="graficas.php?medicion=presion_bunker">Presion Bunker</a></li>
			                <li><a href="graficas.php?medicion=flama">Flama</a></li>
                            <li><a href="graficas.php?medicion=temp_chimenea">Temperatura Chimenea</a></li>
                            <li><a href="graficas.php?medicion=gas_propano">Gas Propano</a></li>
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
    <h1 class="title"><?php echo $titulo ?></h1>
    </div>

<div class="screen">
    <div>
	<?php echo $bodyHTML ?>
    </div>
</div>    
</body>
<script type="text/javascript">
	$(document).ready(function () {

		$(".get-data").focusout(function() {
			var dataList = $(this).attr("id").split("-");
			if (dataList.length == 3) {
				$.ajax({
					method: "POST",
					url: "<?php echo $ajaxUrl ?>",
					data: {"calderaId": dataList[0], "parametroMedicion": dataList[1], "medicion": dataList[2], "valor": $(this).val()}
				})
				.done(function(msg) {
					console.log(msg);
				})
				.fail(function(jqXHR, textStatus) {
					console.log(textStatus);
				});
			}	
		});
	});
</script>
</html>
