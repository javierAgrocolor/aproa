<?php
use yii\helpers\ArrayHelper;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="mayoristas" id="filtroProducto">
    <div class="col-lg-6">
        <label>Productos</label>
        <select id="productos" name="productos" class="form-control filtros">
            <?php 
                foreach ($listaProductos as $especieOption){
                    echo "<option id='".$especieOption->codigo_producto."' value='".$especieOption->codigo_producto."'>".$especieOption->producto."</option>";
                } 
            ?>
        </select>
        <!-- el br de debajo es una ñapa temporal no me seas mendrugo.-->
        <br>
        <label>Origen</label>
        <select id="origen" name="origen" class="form-control filtros">
            <?php
                foreach ($listaOrigenes as $paisOption){
                    echo "<option id='".$paisOption->codigo_origen."' value='".$paisOption->codigo_origen."'>".$paisOption->origen."</option>";
                }
            ?>
        </select>
        <br>
        <label>Localización</label>
        <select id="localizacion" name="localizacion" class="form-control filtros">
            <?php
                foreach ($listaLocalizaciones as $localizacionOption){
                    echo "<option id='".$localizacionOption->codigo_localizacion."' value='".$localizacionOption->codigo_localizacion."'>".$localizacionOption->Localizacion."</option>";
                }
            ?>
        </select>
    <br>
    </div>
    <div class="col-lg-6">
        <label>Fecha Inicial</label>
        <input id="datetimepicker1" name="fechaInicial" type="text" class="form-control" />
        <br>
        <label>Fecha Final</label>
        <input id="datetimepicker-1" name="fechaFinal" type="text" class="form-control" />
        <br>
    </div>
    <div class="row-fluid">
        <div class="col-lg-12">
            <input class="btn btn-primary" type="submit">
        </div>
    </div>
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
            echo "<tr><td>".$row['producto']."</td><td>".$row['Localizacion']."</td><td>".$row['origen']."</td><td>".substr($row['precio'], 0, 4)."</td><td>".$row['fecha']."</td></tr>";
        }
        echo "</tbody>
        </table>";
    }
    
?>
            

