<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Pizarra de Precios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row-fluid marginbotton30">
    <div class="col-lg-1">
        <label>Fecha de Pizarra:</label>
    </div>
    <div class='col-lg-11'>
        <form action='pizarraprecios'>
            <div class="col-lg-4">
                <input id="datetimepicker2" name="fechaPizarra" type="text" class="form-control" />
            </div>
            <div class='col-lg-2'>
                <input class="btn btn-primary col-md-12 marginbotton" id="verPizarra" value="Ver fecha" />
            </div>
        </form>
    </div>
    <div class="col-lg-12" id="contenedorTituloPizarras">
        <div class="col-lg-1">
            <?php echo "<a id='flechaIzquierda' href='".Url::home()."/precios/pizarraprecios/?fechaPizarra=".$fecha -> sub(new \DateInterval('P1D'))-> format('Y-m-d')."' value='".$fecha -> format('Y-m-d')."'><img src='/images/flechaIzquierda.png' /></a>"; ?>
        </div>
        <div class="col-lg-10">
            <p class="titulosPaginaPrincipal">Pizarra de Precios: <?php echo $fecha-> add(new \DateInterval('P1D')) -> format('d-m-Y'); ?></p>
        </div>
        <div class='col-lg-1'>
            <?php echo "<a id='flechaDerecha' href='".Url::home()."/precios/pizarraprecios/?fechaPizarra=". $fecha -> add(new \DateInterval('P1D'))-> format('Y-m-d')."' value='".$fecha -> format('Y-m-d')."'><img src='/images/flechaDerecha.png' /></a>"; ?>
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" id="navprecios">
            <li role="tablero" class="pizarra active">
                <a id="enlaceTabPizarras" href="#pizarras" role="tab" data-toggle="tab">Pizarras</a>
            </li>
            <li role="tablero">
                <a href="#mediaGlobal" role="tab" data-toggle="tab">Media Global</a>
            </li>
            <!--<li role="tablero">
                <a href="#precioProducto" role="tab" data-toggle="tab">Precios por Producto</a>
            </li>-->
            <li role="tablero" class="semana">
                <a id="enlaceTabSemanas" href="#precioSemana" role="tab" data-toggle="tab">Precios por Semana</a>
            </li>
            <!--<li role="tablero">
                <a id="enlaceTabCortes" href="#precioCortes" role="tab" data-toggle="tab">Precio por Cortes</a>
            </li>-->
            <li role="tablero">
                <a id="enlaceTabComision" href="#preciosComision" role="tab" data-toggle="tab">Precios por Cortes - Quitando Comisión</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="pizarras">
                <?php
                    require($_SERVER['DOCUMENT_ROOT'].'/../views/precios/pizarraParts/tabPizarra.php');
                ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="mediaGlobal">
                <?php
                    require($_SERVER['DOCUMENT_ROOT'].'/../views/precios/pizarraParts/tabMedias.php');
                ?>
            </div>
            <!--<div role="tabpanel" class="tab-pane" id="precioProducto">-->
                <?php
                   // require($_SERVER['DOCUMENT_ROOT'].'/../views/precios/pizarraParts/tabProducto.php');
                ?>
            <!--</div>-->
            <div role="tabpanel" class="tab-pane" id="precioSemana">
                <?php
                    require($_SERVER['DOCUMENT_ROOT'].'/../views/precios/pizarraParts/tabSemana.php');
                ?>
            </div>
            <!--<div role="tabpanel" class="tab-pane" id="precioCortes">-->
                <?php
                    //require($_SERVER['DOCUMENT_ROOT'].'/../views/precios/pizarraParts/tabCortes.php');
                ?>
            <!--</div>-->
            <div role="tabpanel" class="tab-pane" id="preciosComision">
                <?php
                    require($_SERVER['DOCUMENT_ROOT'].'/../views/precios/pizarraParts/tabComision.php');
                ?>
            </div>
        </div>
    </div>
</div>
