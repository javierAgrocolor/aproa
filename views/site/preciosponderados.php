<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Precios Ponderados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div >
    <h1><?= Html::encode($this->title) ?></h1>
    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);
 

      function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Producto', 'Toneladas (CASI+La Unión+Costa+Agroponiente+Femago)', 'Precio ponderado (CASI, La Unión): Euro/kilo'],
         <?php 
         $con = 1;
         foreach ($tablaGraficoppt as $row) {
             if($con == 1){
                 $con=2;
                 echo "['".$row['Producto']."',".$row['Suma'];                 
             }else{
                 $con=1;
                 echo ",".$row['Suma']."],";                 
             }
                                
         }
         ?>
         
         ['',  0,            0]
      ]);
        //var data = google.visualization.arrayToDataTable([array]);

    var options = {
      title : 'Monthly Coffee Production by Country',
      vAxis: {title: 'Cups'},
      hAxis: {title: 'Producto'},
      seriesType: 'bars',
      colors: ["red", "#454545"],
      series: {0: {type: 'line'}}
    };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
    </script>
    
    <div id="chart_div" style="width: 1100px; height: 500px;"></div>
    
    <div class="row marginbotton">
        <div class="col-md-2 col-md-offset-5">
    <form id="filtroPreciosponderados">
        
        <label>Fecha</label>
        <input id="datetimepicker2" name="datetimepicker2" type="text" class="form-control" />    
        <input class="btn btn-primary col-md-12" type="submit">
        
        
    </form>
            </div>
    </div>
    <!--
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
    -->




    <!--<code><?= __FILE__ ?></code>-->
</div>

<!-- CONSULTAS DESPLEGABLES-->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading1">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="panel-title"> 
                    RESUMEN                
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
            <div class="panel-body">
                //Falta rellenar
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading2">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="panel-title">
                LA UNION
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
            <div class="panel-body">
                <?php
                if (isset($tablaLaunion[0]['Producto'])) {
                    ?>
                <img src="/aproa/images/<?php echo $tablaLaunion[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                <h4>Fecha: <?php echo $tablaLaunion[0]['Fecha']; ?></h4>
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>                                
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
                                <th>C11</th>    
                                <th>C12</th>    
                                <th>C13</th>    
                                <th>C14</th>
                                <th>C15</th>    
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($tablaLaunion as $row) {
                                echo "<tr>
                    <td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td>" . $row['Pond_Suma'] . "</td>
                    <td>" . $row['Media'] . "</td>
                    <td>" . $row['C1'] . "</td>
                    <td>" . $row['C2'] . "</td>
                    <td>" . $row['C3'] . "</td>
                    <td>" . $row['C4'] . "</td>
                    <td>" . $row['C5'] . "</td>
                    <td>" . $row['C6'] . "</td>
                    <td>" . $row['C7'] . "</td>
                    <td>" . $row['C8'] . "</td>
                    <td>" . $row['C9'] . "</td>                    
                    <td>" . $row['C10'] . "</td>
                    <td>" . $row['C11'] . "</td>
                    <td>" . $row['C12'] . "</td>
                    <td>" . $row['C13'] . "</td>
                    <td>" . $row['C14'] . "</td>
                    <td>" . $row['C15'] . "</td>
    </tr>";
                            }
                        }else{
                            ?>
                        <p align="center">Aun no se han generado precios para este día.</p>
                             <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading3">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="panel-title">
                CASI
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
            <div class="panel-body">
                <?php
                if (isset($tablaCasi[0]['Producto'])) {
                    ?>
                <img src="/aproa/images/<?php echo $tablaCasi[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                <h4>Fecha: <?php echo $tablaCasi[0]['Fecha']; ?></h4>
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>                                
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
                                <th>C11</th>    
                                <th>C12</th>    
                                <th>C13</th>    
                                <th>C14</th>
                                <th>C15</th>    
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($tablaCasi as $row) {
                                echo "<tr>
                    <td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td>" . $row['Pond_Suma'] . "</td>
                    <td>" . $row['Media'] . "</td>
                    <td>" . $row['C1'] . "</td>
                    <td>" . $row['C2'] . "</td>
                    <td>" . $row['C3'] . "</td>
                    <td>" . $row['C4'] . "</td>
                    <td>" . $row['C5'] . "</td>
                    <td>" . $row['C6'] . "</td>
                    <td>" . $row['C7'] . "</td>
                    <td>" . $row['C8'] . "</td>
                    <td>" . $row['C9'] . "</td>                    
                    <td>" . $row['C10'] . "</td>
                    <td>" . $row['C11'] . "</td>
                    <td>" . $row['C12'] . "</td>
                    <td>" . $row['C13'] . "</td>
                    <td>" . $row['C14'] . "</td>
                    <td>" . $row['C15'] . "</td>
                    </tr>";
                            }
                        }else{
                            ?>
                        <p align="center">Aun no se han generado precios para este día.</p>
                             <?php
                        }
                        ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading4">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4" class="panel-title">
                COSTA
            </h4>
        </div>
        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
            <div class="panel-body">
            <?php
                if (isset($tablaCosta[0]['Producto'])) {
                    ?>
                <img src="/aproa/images/<?php echo $tablaCosta[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                <h4>Fecha: <?php echo $tablaCosta[0]['Fecha']; ?></h4>
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>                                
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
                                <th>C11</th>    
                                <th>C12</th>    
                                <th>C13</th>    
                                <th>C14</th>
                                <th>C15</th>    
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($tablaCosta as $row) {
                                echo "<tr>
                    <td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td>" . $row['Pond_Suma'] . "</td>
                    <td>" . $row['Media'] . "</td>
                    <td>" . $row['C1'] . "</td>
                    <td>" . $row['C2'] . "</td>
                    <td>" . $row['C3'] . "</td>
                    <td>" . $row['C4'] . "</td>
                    <td>" . $row['C5'] . "</td>
                    <td>" . $row['C6'] . "</td>
                    <td>" . $row['C7'] . "</td>
                    <td>" . $row['C8'] . "</td>
                    <td>" . $row['C9'] . "</td>                    
                    <td>" . $row['C10'] . "</td>
                    <td>" . $row['C11'] . "</td>
                    <td>" . $row['C12'] . "</td>
                    <td>" . $row['C13'] . "</td>
                    <td>" . $row['C14'] . "</td>
                    <td>" . $row['C15'] . "</td>
                    </tr>";
                            }
                        }else{
                            ?>
                        <p align="center">Aun no se han generado precios para este día.</p>
                             <?php
                        }
                        ?>
                    </tbody>
                    </table>    
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading5">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5" class="panel-title">
                FEMAGO
            </h4>
        </div>
        <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
            <div class="panel-body">
            <?php
                if (isset($tablaFemago[0]['Producto'])) {
                    ?>
                <img src="/aproa/images/<?php echo $tablaFemago[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                <h4>Fecha: <?php echo $tablaFemago[0]['Fecha']; ?></h4>
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>                                
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
                                <th>C11</th>    
                                <th>C12</th>    
                                <th>C13</th>    
                                <th>C14</th>
                                <th>C15</th>    
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($tablaFemago as $row) {
                                echo "<tr>
                    <td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td>" . $row['Pond_Suma'] . "</td>
                    <td>" . $row['Media'] . "</td>
                    <td>" . $row['C1'] . "</td>
                    <td>" . $row['C2'] . "</td>
                    <td>" . $row['C3'] . "</td>
                    <td>" . $row['C4'] . "</td>
                    <td>" . $row['C5'] . "</td>
                    <td>" . $row['C6'] . "</td>
                    <td>" . $row['C7'] . "</td>
                    <td>" . $row['C8'] . "</td>
                    <td>" . $row['C9'] . "</td>                    
                    <td>" . $row['C10'] . "</td>
                    <td>" . $row['C11'] . "</td>
                    <td>" . $row['C12'] . "</td>
                    <td>" . $row['C13'] . "</td>
                    <td>" . $row['C14'] . "</td>
                    <td>" . $row['C15'] . "</td>
                    </tr>";
                            }
                        }else{
                            ?>
                        <p align="center">Aun no se han generado precios para este día.</p>
                             <?php
                        }
                        ?>
                    </tbody>
                    </table>    
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading6">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6" class="panel-title">
                AGROPONIENTE
            </h4>
        </div>
        <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
            <div class="panel-body">
            <?php
                if (isset($tablaAgroponiente[0]['Producto'])) {
                    ?>
                <img src="/aproa/images/<?php echo $tablaAgroponiente[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                <h4>Fecha: <?php echo $tablaAgroponiente[0]['Fecha']; ?></h4>
                
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Producto</th>                                
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
                                <th>C11</th>    
                                <th>C12</th>    
                                <th>C13</th>    
                                <th>C14</th>
                                <th>C15</th>    
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($tablaAgroponiente as $row) {
                                echo "<tr class='success'>
                    <td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td>" . $row['Pond_Suma'] . "</td>
                    <td>" . $row['Media'] . "</td>
                    <td>" . $row['C1'] . "</td>
                    <td>" . $row['C2'] . "</td>
                    <td>" . $row['C3'] . "</td>
                    <td>" . $row['C4'] . "</td>
                    <td>" . $row['C5'] . "</td>
                    <td>" . $row['C6'] . "</td>
                    <td>" . $row['C7'] . "</td>
                    <td>" . $row['C8'] . "</td>
                    <td>" . $row['C9'] . "</td>                    
                    <td>" . $row['C10'] . "</td>
                    <td>" . $row['C11'] . "</td>
                    <td>" . $row['C12'] . "</td>
                    <td>" . $row['C13'] . "</td>
                    <td>" . $row['C14'] . "</td>
                    <td>" . $row['C15'] . "</td>
                    </tr>";
                            }
                        }else{
                            ?>
                        <p align="center">Aun no se han generado precios para este día.</p>
                             <?php
                        }
                        ?>
                    </tbody>
                    </table>    
            </div>
        </div>
    </div>
</div>
<!-- FIN CONSULTAS DESPLEGABLES-->