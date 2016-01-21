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
        <select id="empresas" name="empresas[]" multiple class="form-control chosen-select-width">
            <option value="LA UNION">LA UNION</option>
            <option value="FEMAGO">FEMAGO</option>
            
        </select>
        </div>
        <div class="col-xs-2">
        <label>Producto</label>
        <select id="productos" name="productos[]" multiple class="form-control chosen-select-width">
            <option value="Pepino Almeria">Pepino Almeria</option>
            <option value="Berenjena Larga">Berenjena Larga</option>
            
        </select>
        </div>
        <div class="col-xs-2">
        <label>Tipo</label>
        <select id="tipo" name="tipo" class="form-control">
            <option id='null' value='%' selected='selected'></option>
            <option value="Precios">Precios</option>
            <option value="Toneladas">Toneladas</option>
            
        </select>
        </div>
        <div class="col-xs-2">
        <label>Fecha Inicial</label>
        <input id="datetimepicker2" name="datetimepicker2" type="text" class="form-control" />
        </div>
        <div class="col-xs-2">
        <label>Fecha Final</label>
        <input id="datetimepicker-2" name="datetimepicker-2" type="text" class="form-control" />
          
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

<!-- CONSULTAS DESPLEGABLES-->
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
    <!-- FIN CONSULTAS DESPLEGABLES-->