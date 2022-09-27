<div class="menu__bar">
        <div class="logo__nav">
            <a class="logo__s" href="/"><img class="logo__img" src="./img/cmi_logo.jpg" alt=""></a>
        </div>
        <ul>
            <li><a href="/calderas">Home</a></li>
            <li><a href="#">Calderas <i class="fas fa-caret-down"></i></a>
                <div class="dropdown__menu">
                    <ul>
                        <?php
                            switch ($_GET["caldera"]){
                                case 1: echo   "<li><a href='caldera.php?caldera=2'>Caldera 2</a></li>
                                                <li><a href='caldera.php?caldera=3'>Caldera 3</a></li>
                                                <li><a href='caldera.php?caldera=4'>Caldera 4</a></li>";
                                        break;
                                case 2: echo "<li><a href='caldera.php?caldera=1'>Caldera 1</a></li>
                                              <li><a href='caldera.php?caldera=3'>Caldera 3</a></li>
                                              <li><a href='caldera.php?caldera=4'>Caldera 4</a></li>";
                                        break;
                                case 3:  echo  "<li><a href='caldera.php?caldera=1'>Caldera 1</a></li>
                                                <li><a href='caldera.php?caldera=2'>Caldera 2</a></li>
                                                <li><a href='caldera.php?caldera=4'>Caldera 4</a></li>";
                                        break;
                                case 4:  echo  "<li><a href='caldera.php?caldera=1'>Caldera 1</a></li>
                                                <li><a href='caldera.php?caldera=2'>Caldera 2</a></li>
                                                <li><a href='caldera.php?caldera=3'>Caldera 3</a></li>";
                                        break;
                                default: echo  "<li><a href='caldera.php?caldera=1'>Caldera 1</a></li>
                                                <li><a href='caldera.php?caldera=2'>Caldera 2</a></li>
                                                <li><a href='caldera.php?caldera=3'>Caldera 3</a></li>
                                                <li><a href='caldera.php?caldera=4'>Caldera 4</a></li>";
                            }
                        ?>
                    </ul>
                </div>
            </li>
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
                </div>
            </li>    
            <li><a href="#"> Settings <i class="fa-solid fa-gear"></i></a>
                <div class="dropdown__menu">
			        <ul>
                        <li><a href="configuracion_parametros.php?medicion=temp_agua">Temperatura de Agua</a></li>
                        <li><a href="configuracion_parametros.php?medicion=temp_chimenea">Temperatura de Chimenea</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>