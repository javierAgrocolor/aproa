<?php
use yii\helpers\ArrayHelper;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="mayoristas" id="filtroProducto">
    <div class="span6">
        <label>Productos</label>
        <select id="productos" name="productos" class="form-control">
            <?php 
                foreach ($listaProductos as $especieOption){
                    echo "<option id='".$especieOption->codigo_producto."' value='".$especieOption->codigo_producto."'>".$especieOption->producto."</option>";
                } 
            ?>
        </select>
        <!-- el br de debajo es una ñapa temporal no me seas mendrugo.-->
        <br>
        <label>Origen</label>
        <select id="origen" name="origen" class="form-control">
            <?php
                foreach ($listaOrigenes as $paisOption){
                    echo "<option id='".$paisOption->codigo_origen."' value='".$paisOption->codigo_origen."'>".$paisOption->origen."</option>";
                }
            ?>
        </select>
        <br>
        <label>Localización</label>
        <select id="localizacion" name="localizacion" class="form-control">
            <?php
                foreach ($listaLocalizaciones as $localizacionOption){
                    echo "<option id='".$localizacionOption->codigo_localizacion."' value='".$localizacionOption->codigo_localizacion."'>".$localizacionOption->Localizacion."</option>";
                }
            ?>
        </select>
    <br>
    </div>
    <div class="span12">
        <label>Fecha Inicial</label>
        <input id="datetimepicker" type="text" >
    </div>
    <input class="btn btn-primary" type="submit">
</form>
<?php
    if (isset($tabla)){
        ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Localizacion</th>
                    <th>Origen</th>
                    <th>Precio</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
            <?php
        foreach($tabla as $row){
            echo "<tr><td>".$row->codProducto->producto."</td><td>".$row->codLocalizacion->Localizacion."</td><td>".$row->codOrigen->origen."</td><td>".$row->precio."</td><td>".$row->fecha."</td></tr>";
        }
        echo "</tbody>
        </table>";
    }
    
?>
            

