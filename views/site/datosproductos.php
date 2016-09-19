<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Datos producto';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <p class="titulosPaginaPrincipal"><?= Html::encode($this->title) ?></p>
    </div>
    
<!-- GRAFICO PRECIOS Y TONELADAS -->
<?php if (isset($datosProducto[0]['Producto'])) { ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawVisualization);

         function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Corte', 'Cantidad: Toneladas', 'Precio: Euro/kg'],
         ['C1',  <?php if(isset($datosProducto[1]['C1'])) {echo $datosProducto[1]['C1'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C1'])) {echo $datosProducto[0]['C1'];}else{echo 'null';} ?>],
         ['C2',  <?php if(isset($datosProducto[1]['C2'])) {echo $datosProducto[1]['C2'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C2'])) {echo $datosProducto[0]['C2'];}else{echo 'null';} ?>],
         ['C3',  <?php if(isset($datosProducto[1]['C3'])) {echo $datosProducto[1]['C3'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C3'])) {echo $datosProducto[0]['C3'];}else{echo 'null';} ?>],
         ['C4',  <?php if(isset($datosProducto[1]['C4'])) {echo $datosProducto[1]['C4'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C4'])) {echo $datosProducto[0]['C4'];}else{echo 'null';} ?>],
         ['C5',  <?php if(isset($datosProducto[1]['C5'])) {echo $datosProducto[1]['C5'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C5'])) {echo $datosProducto[0]['C5'];}else{echo 'null';} ?>],
         ['C6',  <?php if(isset($datosProducto[1]['C6'])) {echo $datosProducto[1]['C6'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C6'])) {echo $datosProducto[0]['C6'];}else{echo 'null';} ?>],
         ['C7',  <?php if(isset($datosProducto[1]['C7'])) {echo $datosProducto[1]['C7'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C7'])) {echo $datosProducto[0]['C7'];}else{echo 'null';} ?>],
         ['C8',  <?php if(isset($datosProducto[1]['C8'])) {echo $datosProducto[1]['C8'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C8'])) {echo $datosProducto[0]['C8'];}else{echo 'null';} ?>],
         ['C9',  <?php if(isset($datosProducto[1]['C9'])) {echo $datosProducto[1]['C9'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C9'])) {echo $datosProducto[0]['C9'];}else{echo 'null';} ?>],
         ['C10',  <?php if(isset($datosProducto[1]['C10'])) {echo $datosProducto[1]['C10'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C10'])) {echo $datosProducto[0]['C10'];}else{echo 'null';} ?>],
         ['C11',  <?php if(isset($datosProducto[1]['C11'])) {echo $datosProducto[1]['C11'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C11'])) {echo $datosProducto[0]['C11'];}else{echo 'null';} ?>],
         ['C12',  <?php if(isset($datosProducto[1]['C12'])) {echo $datosProducto[1]['C12'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C12'])) {echo $datosProducto[0]['C12'];}else{echo 'null';} ?>],
         ['C13',  <?php if(isset($datosProducto[1]['C13'])) {echo $datosProducto[1]['C13'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C13'])) {echo $datosProducto[0]['C13'];}else{echo 'null';} ?>],
         ['C14',  <?php if(isset($datosProducto[1]['C14'])) {echo $datosProducto[1]['C14'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C14'])) {echo $datosProducto[0]['C14'];}else{echo 'null';} ?>],
         ['C15',  <?php if(isset($datosProducto[1]['C15'])) {echo $datosProducto[1]['C15'];}else{echo 'null';} ?>,<?php if(isset($datosProducto[0]['C15'])) {echo $datosProducto[0]['C15'];}else{echo 'null';} ?>]
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
      title : 'Precios y cantidades por corte: <?php echo $datosProducto[0]['Producto']; ?>, <?php echo $datosProducto[0]['Empresa']; ?>, <?php echo $datosProducto[0]['Fecha']; ?>',
      legend: {position: 'top'},
                vAxis: {0: {format: '#'}, 1: {format: '#'}},
                hAxis: {title: 'Corte'},
                backgroundColor: '#ffffff',
                series: {
                    1: {type: "line", color: '#cd010d', targetAxisIndex: 1},
                    0: {type: "bars", color: '#3366cc', targetAxisIndex: 0}
                }
            };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_divPrePond'));
    chart.draw(view, options);
        }
    </script>
<?php }
?>
<!-- FIN GRAFICO PRECIOS Y TONELADAS -->

    <!-- Paginacion -->
    <div class="span12 bordetop">         
    </div>
    <div class="col-md-12">
        <div class="table-responsive">
                    <?php
                    //echo $datosProducto;
                    if (isset($datosProducto[0]['Producto'])) {
                        ?>
                        <img src="/images/<?php echo $datosProducto[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                        <p><strong>Fecha: <?php 
			$time=strtotime($datosProducto[0]['Fecha']); 
			echo $time = date('d-m-Y',$time);
			?></strong></p>

                        <table class="table casi">
                            <thead>
                                <tr>
                                    <th>Producto</th>                                
                                    <th>Tipo</th>
                                    <th>Precio Pond</th>
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
                                $contr = 1;
                                foreach ($datosProducto as $row) {
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr class='danger toneladas'>";
                                        echo "<td class='columnaProducto'> </td>";
                                    } else {
                                        $contr = 2;
                                        echo "<tr class='precios'>";
                                        echo "<td class='columnaProducto'>". $row['Producto']."</a></td>";
                                    }

                                    echo "<td>" . $row['Tipo'] . "</td>";
                                   // echo "<td class='columnaProducto'>" . $row['Producto'] . "</td><td>" . $row['Tipo'] . "</td>";
		    if($row['Pond_Suma']==0){
			    echo "<td class='columnaPP'></td>";
		    }else{
			    echo "<td class='columnaPP'>" . $row['Pond_Suma'] . "</td>";
		    }
                    
                    echo "<td>" . $row['Media'] . "</td>
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
    <!--<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery.simplePagination.js"></script>-->
    <div class="col-md-12">
    <?php
    if (isset($datosProducto[0]['Producto'])) {
        echo '<div class="table-responsive">';
        echo '<table class="table">';
        echo '<div id="chart_divPrePond" style="width: 1100px; height: 350px;"></div>';
        echo '</table></div>';
    } else {
        ?>
        <p align="center">No hay datos para los valores introducidos.</p>
        <?php
    }
    ?>
    </div>
    <div class="span12 bordebotton">
</div>
   
    <div class="row">
        <!-- Publi APK -->
        <div class="span12">
            <a href="http://www.aproa.eu/crisis/apps/apk.apk"><img src="/images/apkdescarga.png" class="img-responsive center-block"></a>
        </div>
    </div>
        

