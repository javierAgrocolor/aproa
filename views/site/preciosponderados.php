<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Precios Ponderados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div >
    <h1><?= Html::encode($this->title) ?></h1>
    
    <!-- GRAFICO PRECIOS Y TONELADAS -->
    <?php if (isset($tablaGraficoppt[0]['Producto'])) {?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawVisualization);


        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                
<?php
echo "['Producto', 'Precio ponderado (CASI, La Unión): Euro/kilo', 'Toneladas (CASI+La Unión+Costa+Agroponiente+Femago)']";
$con = 1;
foreach ($tablaGraficoppt as $grafico) {
    if ($con == 1) {
        $con = 2;
        echo ",['" . $grafico['Producto'] . "'," . $grafico['Suma'];
    } else {
        $con = 1;
        echo "," . $grafico['Suma'] . "]";
    }
}
?>                
            ]);
            var view = new google.visualization.DataView(data);
view.setColumns([0, 1, {
    calc: "stringify",
    sourceColumn: 1,
    type: "string",
    role: "annotation"
}, 2, {
    calc: "stringify",
    sourceColumn: 2,
    type: "string",
    role: "annotation"
}]);

   var options = {
legend: { position: 'top' },
      title : 'Dia:  <?php echo $tablaGraficoppt[0]['Fecha']; ?>',
      vAxis: {0: {format: '#', title: 'tons'}, 1: {format: '#', title: 'tons'}},
      hAxis: {title: ''},
      colors: ["red", "#0285B5"],
      series: {
            0:{ type: "line", targetAxisIndex: 1 },
            1: { type: "bars", targetAxisIndex: 0}
        }      
    };





    var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
    chart.draw(view, options);
  }
    </script>
    <div id="chart_div" style="width: 1100px; height: 400px;"></div>
    <?php  } else {
                            ?>
                        <p align="center">Aun no se han generado precios para este día.</p>
                        <?php
                    }
                    ?>
<!-- FIN GRAFICO PRECIOS Y TONELADAS -->

<!-- GRAFICO EVOLUCION -->

<?php if (isset($tablaGraficoevolucion[0]['Producto'])) {?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawVisualization);


        function drawVisualization() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                
<?php
echo "['Producto', 'Precio: Euro/kg', 'Cantidad: Toneladas']";
$con2 = 1;
foreach ($tablaGraficoevolucion as $grafico) {
    if ($con2 == 1) {
        $con2 = 2;
        echo ",['" . $grafico['Fecha'] . "'," . $grafico['Pond_Suma'];
    } else {
        $con2 = 1;
        echo "," . $grafico['Pond_Suma'] . "]";
    }
}
?>                
            ]);
            var view = new google.visualization.DataView(data);
var options = {
      title : 'Evolución de Precios y Toneladas para toda campaña: <?php echo $tablaGraficoevolucion[0]['Producto']; ?>, <?php echo $tablaGraficoevolucion[0]['Empresa']; ?>',
      legend: { position: 'top' },
      vAxis: {0: {format: '#'}, 1: {format: '#'}},
      hAxis: {title: 'Tiempo'},
      
      series: {
            0:{ type: "line", color: 'red', targetAxisIndex: 0 },
            1: { type: "bars", color: 'orange', targetAxisIndex: 1}
        }      

	
};
    var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
    chart.draw(view, options);
  }
    </script>
    <?php
    }?>

<!-- FIN GRAFICO EVOLUCION -->

    <div class="row marginbotton">
        <div class="col-md-2 col-md-offset-5">
            <form id="filtroPreciosponderados">

                <label>Fecha</label>
                <input id="datetimepicker2" name="datetimepicker2" type="text" class="form-control" />    
                <input class="btn btn-primary col-md-12" type="submit">

            </form>
        </div>
    </div>
    
     <div class="row marginbotton">                   
        <form id="filtroGraficaevolucion">
        <div class="col-xs-2">
        <label>Empresa</label>
        <select id="empresas" name="empresas" class="form-control">
            <option id='null' value='' selected='selected'></option>
            <option value="LA UNION">LA UNION</option>
            <option value="CASI">CASI</option>
            
        </select>
        </div>
        <div class="col-xs-2">
        <label>Producto</label>
        <select id="productos" name="productos" class="form-control">
            <option value="Pepino Almeria">Pepino Almeria</option>
            <option value="Berenjena Larga">Berenjena Larga</option>
            
        </select>
        </div>
        <div class="col-xs-2">
        <label>Semanas - Dias</label>
        <select id="tipo" name="sd" class="form-control">            
            <option value="1">Semanas</option>
            <option value="2">Dias</option>
            
        </select>       
        
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
     </div>
    <br>
    
<?php if (isset($tablaGraficoevolucion[0]['Producto'])) {
    echo '<div id="chart_div2" style="width: 1100px; height: 400px;"></div>';
} else {
                            ?>
                        <p align="center">Aun no se han generado precios para este día.</p>
                        <?php
                    }
                    ?>


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
                                echo "<tr class='trrow'>
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
                        } else {
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
                                echo "<tr class='trrow'>
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
                    <td>" . $row['C15'] . "</td></tr>";
                            }
                        } else {
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
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($tablaCosta as $row) {
                                echo "<tr class='trrow'>
                    <td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td>" . $row['Pond_Suma'] . "</td>
                    </tr>";
                            }
                        } else {
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
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($tablaFemago as $row) {
                                echo "<tr class='trrow'>
                    <td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td>" . $row['Pond_Suma'] . "</td>
                    </tr>";
                            }
                        } else {
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
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($tablaAgroponiente as $row) {
                                echo "<tr  class='trrow'>
                    <td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td>" . $row['Pond_Suma'] . "</td>                    
                    </tr>";
                            }
                        } else {
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