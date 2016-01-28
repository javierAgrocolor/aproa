<?php
/* @var $this yii\web\View */

$this->title = 'APROA - Gestión de Crisis';
?>
<div class="site-index">

    <!--<div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->

    <div class="body-content">
        <div class="row-fluid">
            <!-- Cabecera -->
            <div class="span12">
                <img src="/aproa/images/cabecera.png" class="img-responsive center-block">
            </div>            
        </div>
        <div class="row h6">
            <!-- Pizarras -->
            <div class="col-lg-6">
                <a href="/aproa/web/index.php/site/preciosponderados"><img src="/aproa/images/pizarra.png" class="img-responsive center-block"></a>
            </div>
            <div class="col-lg-6">
                <img src="/aproa/images/pizarra.png" class="img-responsive center-block">
            </div>
        </div>
        <div class="row">
            <!-- Informes -->
            <div class="span12">
                <h3 class="titulosPaginaPrincipal">Informes</h3>
            </div>              
        </div>
        <div class="row ">
            <!-- Botones informes-->
            <div class="col-lg-3">
                <a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Calidad-Total_Hortalizas"><img src="/aproa/images/boton1.jpg" class="img-responsive center-block imgInformes"></a>            
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/aproa/images/boton2.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable" id="menu1">
                            <li>
                                <a href="#">España <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-right"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-Spain-Total_Hortalizas">Total hortalizas</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-Spain-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-Spain-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-Spain-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-Spain-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-Spain-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-Spain-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-Spain-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Union Europea <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-right"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-UE-Total_Hortalizas">Total hortalizas</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-UE-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-UE-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-UE-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-UE-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-UE-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-UE-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportacion-UE-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

                <a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Prevision_de_Cultivos"><img src="/aproa/images/boton3.jpg" class="img-responsive center-block imgInformes"></a>
                <a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Exportación Anual%"><img src="/aproa/images/boton4.jpg" class="img-responsive center-block imgInformes"></a>
            </div>
            <div class="col-lg-3">
                <a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Comercializacion-Aproa_semanal"><img src="/aproa/images/boton5.jpg" class="img-responsive center-block imgInformes"></a>
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/aproa/images/boton6.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable" id="menu1">
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Analisis_de_la_competencia-Marruecos">Marruecos</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Analisis_de_la_competencia-Turquia">Turquia</a></li>                            
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Analisis_de_la_competencia-Holanda">Holanda</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Analisis_de_la_competencia-Israel">Israel</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Analisis_de_la_competencia-Otros">Otros</a></li>                            
                        </ul>
                    </li>
                </ul>
                <a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Clima"><img src="/aproa/images/boton7.jpg" class="img-responsive center-block imgInformes"></a>
                <a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Supermercados"><img src="/aproa/images/boton8.jpg" class="img-responsive center-block imgInformes"></a>
            </div>
            <div class="col-lg-3">                
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/aproa/images/boton9.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li>
                                <a href="#">España <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Spain-Total_Hortalizas">Total hortalizas</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Spain-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Spain-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Spain-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Spain-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Spain-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Spain-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Spain-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Francia <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Francia-Total_Hortalizas">Total hortalizas</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Francia-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Francia-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Francia-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Francia-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Francia-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Francia-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Francia-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Reino Unido <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-UK-Total_Hortalizas">Total hortalizas</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-UK-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-UK-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-UK-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-UK-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-UK-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-UK-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-UK-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Alemania <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Alemania-Total_Hortalizas">Total hortalizas</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Alemania-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Alemania-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Alemania-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Alemania-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Alemania-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Alemania-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Alemania-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Polonia <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Polonia-Total_Hortalizas">Total hortalizas</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Polonia-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Polonia-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Polonia-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Polonia-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Polonia-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Polonia-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Polonia-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Otros UE <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Otros-Tomate">Total hortalizas</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Otros-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Otros-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Otros-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Otros-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Otros-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Otros-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Consumo-Otros-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/aproa/images/boton10.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Mayoristas-Cotizaciones">Cotización</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Mayoristas-Volumen">Volumen</a></li>                                                
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/aproa/images/boton11.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li>
                                <a href="#">Cotización <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-right"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Origen-Cotizaciones-Alhondigas-Diario">Alhondigas diario</a></li>
                                    <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Origen-Cotizaciones-Cooperativas-Semanal">Cooperativas semanal</a></li>                                    
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/aproa/images/boton12.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Distribucion-Alemania">Alemania</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Distribucion-UK">Reino unido</a></li>                            
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Distribucion-Francia">Francia</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Distribucion-Polonia">Polonia</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Distribucion-Italia">Italia</a></li>    
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Distribucion-Spain">España</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Distribucion-Rusia">Rusia</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Distribucion-Otros">Otros UE</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Seguimiento_de_Campaña"><img src="/aproa/images/boton13.jpg" class="img-responsive center-block imgInformes"></a>
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/aproa/images/boton14.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Citricos-Origen">Origen</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Citricos-Mayoristas">Mayoristas</a></li>                            
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Citricos-Supermercados">Supermercados</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Citricos-Exportacion">Exportación</a></li>
                            <li><a target="_blank" href="/aproa/web/index.php/site/buscar?informes=Citricos-APROA">Comercialización APROA</a></li>                              
                        </ul>
                    </li>
                </ul>
                <a href="/aproa/web/index.php/site/buscar?informes=Historico"><img src="/aproa/images/boton15.jpg" class="img-responsive center-block imgInformes"></a>
                <a href="/aproa/web/index.php/site/buscar?informes=Otros"><img src="/aproa/images/boton16.jpg" class="img-responsive center-block imgInformes"></a>
            </div>
        </div>

        <div class="row">
            <!-- Correo -->
            <div class="span12">
                <h3 class="titulosPaginaPrincipal">Correo Diario</h3>
            </div>              
        </div>
        <!--<div class="row">
            !-- Ultimos informes --
            <p>Ultimos informes...</p>
        </div>-->
        <div class="row">
            <!-- Publi APK -->
            <div class="span12">
                <img src="/aproa/images/apkdescarga.png" class="img-responsive center-block">
            </div>
        </div>
        <!--<div class="row-fluid">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/"><img src="../images/1.jpg"></a></p>
            </div>
        </div>-->

    </div>
</div>
