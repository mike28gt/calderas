<?php
	require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/negocio/configuracion_parametros.php');
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

    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/negocio/includes/menu_principal.php'); ?>

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
