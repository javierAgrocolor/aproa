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
        <select id="empresas" name="empresas" class="form-control filtros2">
            <option value="LA UNION">LA UNION</option>
            <option value="FEMAGO">FEMAGO</option>
            
        </select>
        </div>
        <div class="col-xs-2">
        <label>Producto</label>
        <select id="productos" name="productos" class="form-control filtros2">
            <option value="Pepino Almeria">Pepino Almeria</option>
            <option value="Berenjena Larga">Berenjena Larga</option>
            
        </select>
        </div>
        <div class="col-xs-2">
        <label>Tipo</label>
        <select id="tipo" name="tipo" class="form-control filtros2">
            <option value="Precios">Precios</option>
            <option value="Toneladas">Toneladas</option>
            
        </select>
        </div>
        <div class="col-xs-2">
        <label>Fecha Inicial</label>
        <input id="datetimepicker2" name="datetimepicker2" type="text" class="form-control filtros" />
        </div>
        <div class="col-xs-2">
        <label>Fecha Final</label>
        <input id="datetimepicker-2" name="datetimepicker-2" type="text" class="form-control filtros" />
          
        </div>
        <div class="row-fluid">
            <div class="col-lg-12">
                <br>
        <input class="btn btn-primary" type="submit">
        
            </div>
        </div>
    </form>
    <br>
    
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
                
                    <?php foreach($tabla as $row){
                echo "<tr>
                    <td>".$row['Producto']."</td>
                    <td>".$row['Fecha']."</td>
                    <td>".$row['Empresa']."</td>
                    <td>".$row['Tipo']."</td>
                    <td>".$row['Pond_Suma']."</td>
                    <td>".$row['Media']."</td>
                    <td>".$row['C1']."</td>
                    <td>".$row['C2']."</td>
                    <td>".$row['C3']."</td>
                    <td>".$row['C4']."</td>
                    <td>".$row['C5']."</td>
                    <td>".$row['C6']."</td>
                    <td>".$row['C7']."</td>
                    <td>".$row['C8']."</td>
                    <td>".$row['C9']."</td>                    
                    <td>".$row['C10']."</td>
    </tr>";}}
                ?>
            </tbody>
        </table>
            

    <!--<code><?= __FILE__ ?></code>-->
</div>