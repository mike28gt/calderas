<?php
    require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/negocio/graficas.php');
?>

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
<style>
.screen-calderas {
    padding: 50px 30px;
    justify-content: center;
    text-align: center;
    background-image: url(./img/background.jpeg);
}
</style>
    <title>Centro de datos de Calderas</title>
</head>
<body>
    
    <?php require_once($_SERVER['DOCUMENT_ROOT'].'/calderas/negocio/includes/menu_principal.php'); ?>

    <div class="header">
        <h1 class="title">Gr&aacute;fica de <?php echo $medicionNombre ?></h1>
    </div>
<?php
    include($_SERVER['DOCUMENT_ROOT'].$include);
?>
</body>
</html>
