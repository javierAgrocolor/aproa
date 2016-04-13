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
        
        <!-- Imagenes de enlace a Pizarras, origen... -->
        
        <div class="span12 marginbotton">  
            <div class="row-fluid">
            <div class="col-md-6">
                <a href="index.php/site/preciosponderados"><img src="/images/pizarra1.png" class="img-responsive"></a>
            </div>
            <div class="col-md-6">
                <a href="index.php/precios/pizarraprecios"><img src="/images/pizarra2.png" class="img-responsive"></a>
            </div>
            </div>
            <div class="row-fluid">
            <div class="col-md-4  marginbotton30 margintop">
                <a href="index.php/precios/origen"><img src="/images/pizarra3.png" class="img-responsive center-block"></a>
            </div>
            <div class="col-md-4 marginbotton30 margintop">
                <a href="index.php/precios/mayoristas"><img src="/images/pizarra4.png" class="img-responsive center-block"></a>
            </div>
            <div class="col-md-4 marginbotton30 margintop">
                <a href="index.php/precios/supermercados"><img src="/images/pizarra5.png" class="img-responsive center-block"></a>
            </div>
            </div>
        </div>
        
        <!-- Informes -->
        <div class="row">            
            <div class="span12">
                <h3 class="titulosPaginaPrincipal">Informes</h3>
            </div>              
        </div>
        
        <!-- Botones informes-->
        <div class="row ">    
            <div class="span12">
            <div class="col-md-3">
                <a target="_blank" href="index.php/site/buscar?informes=Calidad-Total_Hortalizas"><img src="/images/boton1.jpg" class="img-responsive center-block imgInformes"></a>            
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/images/boton2.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable" id="menu1">
                            <li>
                                <a href="#">España <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-right"></i></span></a>
                                <ul class="dropdown-menu sub-menu">                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-Spain-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-Spain-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-Spain-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-Spain-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-Spain-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-Spain-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-Spain-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Union Europea <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-right"></i></span></a>
                                <ul class="dropdown-menu sub-menu">                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-UE-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-UE-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-UE-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-UE-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-UE-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-UE-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Exportacion-UE-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

                <a target="_blank" href="index.php/site/buscar?informes=Prevision_de_Cultivos"><img src="/images/boton3.jpg" class="img-responsive center-block imgInformes"></a>
                <a target="_blank" href="index.php/site/buscar?informes=Cuotasmercado"><img src="/images/boton4.jpg" class="img-responsive center-block imgInformes"></a>
            </div>
            <div class="col-md-3">
                <a target="_blank" href="index.php/site/buscar?informes=Comercializacion-Aproa_semanal"><img src="/images/boton5.jpg" class="img-responsive center-block imgInformes"></a>
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/images/boton6.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable" id="menu1">
                            <li><a target="_blank" href="index.php/site/buscar?informes=Analisis_de_la_competencia-Marruecos">Marruecos</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Analisis_de_la_competencia-Turquia">Turquia</a></li>                            
                            <li><a target="_blank" href="index.php/site/buscar?informes=Analisis_de_la_competencia-Holanda">Holanda</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Analisis_de_la_competencia-Israel">Israel</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Analisis_de_la_competencia-Otros">Otros</a></li>                            
                        </ul>
                    </li>
                </ul>
                <a target="_blank" href="index.php/site/buscar?informes=Clima"><img src="/images/boton7.jpg" class="img-responsive center-block imgInformes"></a>
                <a target="_blank" href="index.php/site/buscar?informes=Supermercados"><img src="/images/boton8.jpg" class="img-responsive center-block imgInformes"></a>
            </div>
            <div class="col-md-3">                
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/images/boton9.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li>
                                <a href="#">España <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Spain-Total_Hortalizas">Total hortalizas</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Spain-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Spain-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Spain-Pimiento">Pimiento</a></li>
                                    <!--<li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Spain-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Spain-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Spain-Berenjena">Berenjena</a></li>-->
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Spain-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Francia <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                   <!-- <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Francia-Total_Hortalizas">Total hortalizas</a></li>-->
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Francia-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Francia-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Francia-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Francia-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Francia-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Francia-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Francia-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Reino Unido <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                  <!--  <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-UK-Total_Hortalizas">Total hortalizas</a></li>-->
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-UK-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-UK-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-UK-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-UK-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-UK-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-UK-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-UK-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Alemania <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                  <!--  <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Alemania-Total_Hortalizas">Total hortalizas</a></li>-->
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Alemania-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Alemania-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Alemania-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Alemania-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Alemania-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Alemania-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Alemania-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Polonia <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                   <!-- <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Polonia-Total_Hortalizas">Total hortalizas</a></li>-->
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Polonia-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Polonia-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Polonia-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Polonia-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Polonia-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Polonia-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Polonia-Tomate">Tomate</a></li>
                                </ul>
                            </li>
                            <!--<li>
                                <a href="#">Otros UE <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-down"></i></span></a>
                                <ul class="dropdown-menu sub-menu">                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Otros-Tomate">Total hortalizas</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Otros-Sandia">Sandia</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Otros-Melon">Melon</a></li>                                    
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Otros-Pimiento">Pimiento</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Otros-Pepino">Pepino</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Otros-Calabacin">Calabacin</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Otros-Berenjena">Berenjena</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Consumo-Otros-Tomate">Tomate</a></li>
                                </ul>
                            </li>-->
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/images/boton10.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li><a target="_blank" href="index.php/site/buscar?informes=Mayoristas-Cotizaciones">Cotización</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Mayoristas-Volumen">Volumen</a></li>                                                
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/images/boton11.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li>
                                <a href="#">Cotización <span class=" menu-ico-collapse"><i class="glyphicon glyphicon-chevron-right"></i></span></a>
                                <ul class="dropdown-menu sub-menu">
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Origen-Cotizaciones-Alhondigas-Diario">Alhondigas diario</a></li>
                                    <li><a target="_blank" href="index.php/site/buscar?informes=Origen-Cotizaciones-Cooperativas-Semanal">Cooperativas semanal</a></li>                                    
                                </ul>
                            </li>                            
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/images/boton12.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li><a target="_blank" href="index.php/site/buscar?informes=Distribucion-Alemania">Alemania</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Distribucion-UK">Reino unido</a></li>                            
                            <li><a target="_blank" href="index.php/site/buscar?informes=Distribucion-Francia">Francia</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Distribucion-Polonia">Polonia</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Distribucion-Italia">Italia</a></li>    
                            <li><a target="_blank" href="index.php/site/buscar?informes=Distribucion-Spain">España</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Distribucion-Rusia">Rusia</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Distribucion-Otros">Otros UE</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <a target="_blank" href="index.php/site/buscar?informes=Seguimiento_de_Campana"><img src="/images/boton13.jpg" class="img-responsive center-block imgInformes"></a>
                <ul class="nav nav-pills">
                    <li class="dropdown">
                        <img src="/images/boton14.jpg"  data-toggle="dropdown" class="dropdown-toggle img-responsive imgInformes">
                        <ul class="dropdown-menu menuDesplegable2" id="menu1">
                            <li><a target="_blank" href="index.php/site/buscar?informes=Citricos-Origen">Origen</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Citricos-Mayoristas">Mayoristas</a></li>                            
                            <li><a target="_blank" href="index.php/site/buscar?informes=Citricos-Supermercados">Supermercados</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Citricos-Exportacion">Exportación</a></li>
                            <li><a target="_blank" href="index.php/site/buscar?informes=Citricos-APROA">Comercialización APROA</a></li>                              
                        </ul>
                    </li>
                </ul>
                <a href="index.php/site/buscar?informes=Historico"><img src="/images/boton15.jpg" class="img-responsive center-block imgInformes"></a>
                <a href="index.php/site/buscar?informes=Otros"><img src="/images/boton16.jpg" class="img-responsive center-block imgInformes"></a>
            </div>
        </div>
        </div>
        
        <!-- Correo -->
        <div class="row">            
            <div class="span12">
                <h3 class="titulosPaginaPrincipal">Boletín Diario</h3>
            </div>              
        </div>
        <div class="span12 contenedores">
            <div class="col-md-10 col-md-offset-1">
                <!--<p class="titulos2">Aun no se han generado boletines para este día.</p>-->
                <?php
                $hoy=date('z')+1;
                if(file_exists('./boletines_correos/img2/2016-'.$hoy.'-1.jpg')&& file_exists('./boletines_correos/img2/2016-'.$hoy.'-2.jpg') && file_exists('./boletines_correos/img2/2016-'.$hoy.'-3.jpg')){
		
		echo"<a href='index.php/site/boletines?diano=$hoy' target='_blank'><img src='/boletines_correos/img2/2016-".$hoy."-1.jpg' class='img-responsive center-block'/></a>";
			
		echo"<a href='index.php/site/boletines?diano=$hoy' target='_blank'><img src='/boletines_correos/img2/2016-".$hoy."-2.jpg' class='img-responsive center-block'/></a>";
		
		echo"<a href='index.php/site/boletines?diano=$hoy' target='_new'><img src='/boletines_correos/img2/2016-".$hoy."-3.jpg' class='img-responsive center-block'/></a>";
		
	}else{
		echo"<a class='titulos2' href='index.php/site/boletines?diano=$hoy' target='_new'>El boletín de ".date("d/m/y")." aun no está disponible. Pulse aquí para visualizar otros boletines.</a>";
	}
                ?>
                              
            </div>            
        </div>
        
        <!-- Publi APK -->
        <div class="row marginbotton30">            
            <div class="span12">
                <a href="http://www.aproa.eu/crisis/apps/apk.apk"><img src="/images/apkdescarga.png" class="img-responsive center-block"></a>
            </div>
        </div>      
    </div>
</div>
