<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="row-fluid">
    <div class="col-lg-12">
        <h3><?php echo date('Y-m-d'); ?></h3>
        <ul class="nav nav-tabs">
            <li role="tablero" class="active">
                <a href="#pizarras" role="tab" data-toggle="tab">Pizarras</a>
            </li>
            <li role="tablero">
                <a href="#mediaGlobal" role="tab" data-toggle="tab">Media Global</a>
            </li>
            <li role="tablero">
                <a href="#precioProducto" role="tab" data-toggle="tab">Precios por Producto</a>
            </li>
            <li role="tablero">
                <a href="#precioSemana" role="tab" data-toggle="tab">Precios por Semana</a>
            </li>
            <li role="tablero">
                <a href="#precioCortes" role="tab" data-toggle="tab">Precio por Cortes</a>
            </li>
            <li role="tablero">
                <a href="#preciosComision" role="tab" data-toggle="tab">Precios Quitando Comisión</a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="pizarras">
                <?php
                    require "aproa/views/precios/pizarraParts/tabPizarra.php";
                ?>
            </div>
            <div role="tabpanel" class="tab-pane" id="mediaGlobal">
                pruebaMedias
            </div>
            <div role="tabpanel" class="tab-pane" id="precioProducto">
                pruebaPreciosProducto
            </div>
            <div role="tabpanel" class="tab-pane" id="precioSemana">
                pruebaPrecioSemana
            </div>
            <div role="tabpanel" class="tab-pane" id="precioCortes">
                pruebaPrecioCortes
            </div>
            <div role="tabpanel" class="tab-pane" id="preciosComision">
                pruebaPrecioComision
            </div>
        </div>
    </div>
</div>
