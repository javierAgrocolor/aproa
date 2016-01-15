<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Precios Ponderados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>
    <form id="filtroPreciosponderados">
        <div class="col-xs-2">
        <label>Empresa</label>
        <select id="empresas" name="empresas" class="form-control">
            <option value="LA UNION">LA UNION</option>
            <option value="FEMAGO">FEMAGO</option>
            <option value="0">prueba</option>
        </select>
        </div>
        <div class="col-xs-2">
        <label>Producto</label>
        <select id="productos" name="productos" class="form-control">
            <option value="Pepino Almeria">Pepino Almeria</option>
            <option value="Berenjena Larga">Berenjena Larga</option>
            
        </select>
        </div>
        
        <input type="submit">
    </form>
    
    
    <?php
    if (isset($tabla)){
        ?>
    <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Fecha</th>
                    <th>Empresa</th>
                    <th>Tipo</th>
                    <th>Suma Pond</th>
                    <th>Media</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>C6</th>
                    <th>C7</th>
                    <th>C8</th>
                    <th>C9</th>
                    <th>C10</th>                   
                </tr>
            </thead>
            <tbody>
                
                    <?php foreach($tabla as $row){?>
                <tr>
                    <td><?php echo $row->Producto;?></td>
                    <td><?php echo $row->Fecha;?></td>
                    <td><?php echo $row->Empresa;?></td>
                    <td><?php echo $row->Tipo;?></td>
                    <td><?php echo $row->Pond_Suma;?></td>
                    <td><?php echo $row->Media;?></td>
                    <td><?php echo $row->C1;?></td>
                    <td><?php echo $row->C2;?></td>
                    <td><?php echo $row->C3;?></td>
                    <td><?php echo $row->C4;?></td>
                    <td><?php echo $row->C5;?></td>
                    <td><?php echo $row->C6;?></td>
                    <td><?php echo $row->C7;?></td>
                    <td><?php echo $row->C8;?></td>
                    <td><?php echo $row->C9;?></td>                    
                    <td><?php echo $row->C10;}}?></td>
                </tr>
            </tbody>
        </table>
            

    <!--<code><?= __FILE__ ?></code>-->
</div>