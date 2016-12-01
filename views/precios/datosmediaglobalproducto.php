<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Datos Media Global Producto';
$this->params['breadcrumbs'][] = $this->title;
//print_r($mediaglobalProducto);
?>
<div>
    <p class="titulosPaginaPrincipal"><?= Html::encode($this->title) ?></p>
</div>   

<!-- GRAFICO PRECIOS Y TONELADAS -->
<?php if (isset($mediaglobalProducto[0]['media'])) { ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawVisualization);

         
        function drawVisualization() {
        // Some raw data (not necessarily accurate)
        var data = google.visualization.arrayToDataTable([
         ['Dias',  'Media']
         <?php 
            foreach ($mediaglobalProducto as $media){
                echo ",['";
                $time=strtotime($media['fecha']); 
		echo $time = date('d-m-Y',$time); 
                        echo "',".sprintf("%.2f", round($media['media'],2))."]";
            }
         ?>
      ]);

      var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }]);

    var options = {
      title : 'Evolución Diaria (Último Mes)',
      legend: {position: 'top'},
                vAxis: {0: {format: '#'}},
                hAxis: {title: 'Días'},
                backgroundColor: '#ffffff',
                series: {
                    
                    1: {type: "line", color: '#3366cc', targetAxisIndex: 0}
                }
            };

    var chart = new google.visualization.ComboChart(document.getElementById('chart_divMediasGlobales'));
    chart.draw(view, options);
        }
    </script>
<?php }
?>
<!-- FIN GRAFICO PRECIOS Y TONELADAS -->


<div class="span12 bordetop">         
    </div>

    <div class="col-md-12">
        <div class="table-responsive">
                    <?php
                    //print_r($datosmediaglobalProducto);
                    //echo $datosProducto;
                    if (isset($datosmediaglobalProducto[0]['nombre'])) {
                        ?>
                        <p><strong><?php 
			 
			echo $datosmediaglobalProducto[0]['nombre'];
			?></strong></p>
                        <p><strong>Datos por Alhondiga - <?php 
			$time=strtotime($datosmediaglobalProducto[0]['fecha']); 
			echo $time = date('d-m-Y',$time);
			?>
                             </strong></p>

                        <table class="table casi">
                            <thead>
                                <tr>                                    
                                    <th>Alhondiga</th>
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
                                $contador = array();
                                $corte = array();
                                for($x=1;$x<16;$x++){
                                        $corte[$x]=0;
                                        $contador[$x]=0;
                                    }
                                foreach ($datosmediaglobalProducto as $row) {
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr class='danger'>";
                                        
                                    } else {
                                        $contr = 2;
                                        echo "<tr>";
                                       
                                    }
                                    
                                   
                                    for($x=1;$x<16;$x++){
                                        $corte[$x]=$corte[$x]+$row['corte'.$x.''];
                                        if($row['corte'.$x.'']!=0){
                                            $contador[$x]=$contador[$x]+1;
                                        }                                        
                                    }
                                   
                    
                    echo "<td>" . $row['alhondiga'] . "</td>
                    <td>" . $row['corte1'] . "</td>
                    <td>" . $row['corte2'] . "</td>
                    <td>" . $row['corte3'] . "</td>
                    <td>" . $row['corte4'] . "</td>
                    <td>" . $row['corte5'] . "</td>
                    <td>" . $row['corte6'] . "</td>
                    <td>" . $row['corte7'] . "</td>
                    <td>" . $row['corte8'] . "</td>
                    <td>" . $row['corte9'] . "</td>                    
                    <td>" . $row['corte10'] . "</td>
                    <td>" . $row['corte11'] . "</td>
                    <td>" . $row['corte12'] . "</td>
                    <td>" . $row['corte13'] . "</td>
                    <td>" . $row['corte14'] . "</td>
                    <td>" . $row['corte15'] . "</td></tr>";
                                }
                                echo "<tr class='info'><td>Media</td>";
                                for($x=1;$x<16;$x++){
                                        if($corte[$x]!=0){                                            
                                            echo "<td>" . sprintf("%.2f", round($corte[$x]/$contador[$x], 2)). "</td>";
                                        }else{
                                            echo "<td> </td>";
                                        }
                                        
                                    }
                                echo "</tr>";
                            } else {
                                ?>
                            <p align="center">No hay información disponible.</p>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
    </div>
         <div class="col-md-12">
    <?php
    if (isset($mediaglobalProducto[0]['media'])) {
        echo '<div class="table-responsive">';
        echo '<table class="table">';
        echo '<div id="chart_divMediasGlobales" style="width: 1100px; height: 500px;"></div>';
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
