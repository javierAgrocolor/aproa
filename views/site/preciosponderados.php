<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Precios Ponderados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div >
    <p class="titulosPaginaPrincipal"><?= Html::encode($this->title) ?></p>
</div>
<!-- GRAFICO PRECIOS Y TONELADAS -->
<?php if (isset($tablaGraficoppt[0]['Producto'])) { ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
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
                legend: {position: 'top'},
                title: 'Dia:  <?php echo $tablaGraficoppt[0]['Fecha']; ?>',
                vAxis: {0: {format: '#', title: 'tons'}, 1: {format: '#', title: 'tons'}},
                hAxis: {title: ''},
                colors: ["#cd010d", "#FF8300"],
                series: {
                    0: {type: "line", targetAxisIndex: 1},
                    1: {type: "bars", targetAxisIndex: 0}
                }
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(view, options);
        }
    </script>
<?php }
?>
<!-- FIN GRAFICO PRECIOS Y TONELADAS -->

<!-- GRAFICO EVOLUCION -->
<?php if (isset($tablaGraficoevolucion[0]['Producto'])) { ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
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
            if ($grafico['Fecha'] < 60) {
                echo ",['" . $grafico['Fecha'] . "'," . $grafico['Precio'];
            } else {
                echo ",['" . $grafico['Fecha'] . "'," . $grafico['Pond_Suma'];
            }
        } else {
            $con2 = 1;
            echo "," . $grafico['Pond_Suma'] . "]";
        }
    }
    ?>
            ]);
            var view = new google.visualization.DataView(data);
            var options = {
                title: 'Producto: <?php echo $tablaGraficoevolucion[0]['Producto']; ?>, <?php echo $tablaGraficoevolucion[0]['Empresa']; ?>',
                legend: {position: 'top'},
                vAxis: {0: {format: '#'}, 1: {format: '#'}},
                hAxis: {title: ''},
                backgroundColor: '#ffffff',
                series: {
                    0: {type: "line", color: '#cd010d', targetAxisIndex: 0},
                    1: {type: "bars", color: '#FF8300', targetAxisIndex: 1}
                }
            };
            var chart = new google.visualization.ComboChart(document.getElementById('chart_div2'));
            chart.draw(view, options);
        }
    </script>
<?php }
?>
<!-- FIN GRAFICO EVOLUCION -->

<!-- FORMULARIO EVOLUCION-->
<div class="span12 contenedores">
    <p class="titulos2">EVOLUCIÓN DE PRECIOS Y TONELADAS PARA TODA LA CAMPAÑA</p>
    <div class="row marginbotton col-md-10 col-md-offset-1">                   
        <form id="filtroGraficaevolucion">
            <div class="col-xs-3">
                <label>Empresa</label>
                <select id="empresas" name="empresas" class="form-control">            
                    <option value="LA UNION">LA UNION</option>
                    <option value="CASI">CASI</option>
                </select>
            </div>
            <div class="col-xs-3">
                <label>Producto</label>
                <select id="productos" name="productos" class="form-control">
                    <option value="Berenjena Larga">Berenjena Larga</option>
                    <option value="Calabacin Fino">Calabacin Fino</option>
                    <option value="P. Calif. Amarillo">P. Calif. Amarillo</option>
                    <option value="P. Calif. Rojo">P. Calif. Rojo</option>
                    <option value="P. Calif. Verde">P. Calif. Verde</option>
                    <option value="Pepino Almeria">Pepino Almeria</option>
                    <option value="Tomate Daniela 1a">Tomate Daniela 1a</option>
                    <option value="Tomate Liso">Tomate Liso</option>
                    <option value="Tomate Pera">Tomate Pera</option>
                    <option value="Tomate Rama G">Tomate Rama G</option>
                    <option value="Tomate Rama M">Tomate Rama M</option>
                    <option value="Tomate Suelto G">Tomate Suelto G</option>
                    <option value="Tomate Suelto M">Tomate Suelto M</option>
                </select>
            </div>
            <div class="col-xs-3">
                <label>Semanas - Dias</label>
                <select id="tipo" name="sd" class="form-control">   
                    <option value="2">Dias</option>
                    <option value="1">Semanas</option>            
                </select>      
            </div>
            <div class="col-xs-3">
                <label>Fecha Final</label>
                <input id="datetimepicker-2" name="datetimepicker-2" type="text" class="form-control" />
            </div>
    </div>
    <div class="row-fluid">
        <div class="col-md-2 col-md-offset-5">                    
            <input class="btn btn-primary col-md-12 marginbotton" type="submit">
        </div>
    </div>
</form>    
<div class="col-md-12">
    <?php
    if (isset($tablaGraficoevolucion[0]['Producto'])) {
        echo '<div class="table-responsive">';
        echo '<table class="table">';
        echo '<div id="chart_div2" style="width: 1100px; height: 400px;"></div>';
        echo '</table></div>';
    } else {
        ?>
        <p align="center">No hay datos para los valores introducidos.</p>
        <?php
    }
    ?>
</div>
</div>    

<!-- FORMULARIO PRECIOS PONDERADOS Y TONELADAS 
    Carga el grafico y las tablas segun la fecha de la busqueda-->
<div class="span12 contenedores">
    <p class="titulos2">PRECIOS PONDERADOS Y TONELADAS COMERCIALIZADAS POR ALHÓNDIGAS</p>
    <div class="row marginbotton">
        <div class="col-md-2 col-md-offset-5">
            <form id="filtroPreciosponderados">   
                <label>Fecha</label>
                <input id="datetimepicker2" name="datetimepicker2" type="text" class="form-control" />    
                <input class="btn btn-primary col-md-12" type="submit">
            </form>
        </div>
    </div>
    <div class="col-md-12">
        <?php
        if (isset($tablaGraficoppt[0]['Producto'])) {
            echo '<div class="table-responsive">';
            echo '<table class="table">';
            echo '<div id="chart_div" style="width: 1100px; height: 400px;"></div>';
            echo '</table></div>';
        } else {
            ?>
            <p align="center">Aun no se han generado precios para este día.</p>
            <?php
        }
        ?>
    </div>
</div>

<!-- TABLAS DE RESULTADO DE PRECIOS PONDERADOS Y TONELADAS -->
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="heading1">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="panel-title titulosPanel"> 
                Resumen    
            </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    if (isset($tablaGraficoppt[0]['Producto'])) {
                        ?>      
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Fecha:  <?php echo $tablaGraficoppt[0]['Fecha']; ?></th>
                                    <th colspan="2">TOTAL</th>
                                    <th colspan="2"><img src="/aproa/images/casiresumen.jpg" class="img-responsive center-block"></th>
                                    <th colspan="2"><img src="/aproa/images/launionresumen.jpg" class="img-responsive center-block"></th>
                                    <th colspan="2"><img src="/aproa/images/agroponienteresumen.jpg" class="img-responsive center-block"></th>
                                    <th colspan="2"><img src="/aproa/images/femagoresumen.jpg" class="img-responsive center-block"></th>
                                    <th colspan="2"><img src="/aproa/images/costaresumen.jpg" class="img-responsive center-block"></th>
                                </tr>
                                <tr class="trresumen">
                                    <th>Producto</th>
                                    <th>PR. POND.</th>
                                    <th>SUM. TONS</th>
                                    <th>PRECIO</th>
                                    <th>TONS</th>
                                    <th>PRECIO</th>
                                    <th>TONS</th>
                                    <th>PRECIO</th>
                                    <th>TONS</th>
                                    <th>PRECIO</th>
                                    <th>TONS</th>
                                    <th>PRECIO</th>
                                    <th>TONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contr = 1;
                                for ($i = 1; $i < 14; $i++) {
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr id='fila" . $i . "' class='danger'>";
                                    } else {
                                        $contr = 2;
                                        echo "<tr id='fila" . $i . "'>";
                                    }
                                    //echo "<tr id='fila" . $i . "'>";
                                    for ($g = 1; $g < 14; $g++) {
                                        echo "<td class='columna" . $g . "'></td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>

                                <?php
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
    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="heading2">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2" class="panel-title titulosPanel">
                La Union
            </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    if (isset($tablaLaunion[0]['Producto'])) {
                        ?>
                        <img src="/aproa/images/<?php echo $tablaLaunion[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                        <p><strong>Fecha: <?php echo $tablaLaunion[0]['Fecha']; ?></strong></p>

                        <table class="table laUnion">
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
                                $contr = 1;
                                foreach ($tablaLaunion as $row) {
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr class='danger toneladas'>";
                                    } else {
                                        $contr = 2;
                                        echo "<tr class='precios'>";
                                    }

                                    echo "<td class='columnaProducto'>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td class='columnaPP'>" . $row['Pond_Suma'] . "</td>
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
    </div>
    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="heading3">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3" class="panel-title titulosPanel">
                Casi
            </h4>
        </div>
        <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    if (isset($tablaCasi[0]['Producto'])) {
                        ?>
                        <img src="/aproa/images/<?php echo $tablaCasi[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                        <p><strong>Fecha: <?php echo $tablaCasi[0]['Fecha']; ?></strong></p>

                        <table class="table casi">
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
                                $contr = 1;
                                foreach ($tablaCasi as $row) {
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr class='danger toneladas'>";
                                    } else {
                                        $contr = 2;
                                        echo "<tr class='precios'>";
                                    }

                                    echo "<td class='columnaProducto'>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td class='columnaPP'>" . $row['Pond_Suma'] . "</td>
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
    </div>
    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="heading4">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4" class="panel-title titulosPanel">
                Costa de Almería
            </h4>
        </div>
        <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    if (isset($tablaCosta[0]['Producto'])) {
                        ?>
                        <img src="/aproa/images/<?php echo $tablaCosta[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                        <p><strong>Fecha: <?php echo $tablaCosta[0]['Fecha']; ?></strong></p>

                        <table class="table costa">
                            <thead>
                                <tr>
                                    <th>Producto</th>                                
                                    <th>Tipo</th>
                                    <th>Suma Pond</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $contr = 1;
                                foreach ($tablaCosta as $row) {
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr class='danger toneladas'>";
                                    } else {
                                        $contr = 2;
                                        echo "<tr class='precios'>";
                                    }

                                    echo "<td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td class='columnaPP'>" . $row['Pond_Suma'] . "</td>
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
    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="heading5">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5" class="panel-title titulosPanel">
                Femago
            </h4>
        </div>
        <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    if (isset($tablaFemago[0]['Producto'])) {
                        ?>
                        <img src="/aproa/images/<?php echo $tablaFemago[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                        <p><strong>Fecha: <?php echo $tablaFemago[0]['Fecha']; ?></strong></p>

                        <table class="table femago">
                            <thead>
                                <tr>
                                    <th>Producto</th>                                
                                    <th>Tipo</th>
                                    <th>Suma Pond</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $contr = 1;
                                foreach ($tablaFemago as $row) {
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr class='danger toneladas'>";
                                    } else {
                                        $contr = 2;
                                        echo "<tr class='precios'>";
                                    }

                                    echo "<td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td class='columnaPP'>" . $row['Pond_Suma'] . "</td>
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
    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="heading6">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6" class="panel-title titulosPanel">
                Agroponiente
            </h4>
        </div>
        <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
            <div class="panel-body">
                <div class="table-responsive">
                    <?php
                    if (isset($tablaAgroponiente[0]['Producto'])) {
                        ?>
                        <img src="/aproa/images/<?php echo $tablaAgroponiente[0]['Empresa']; ?>.jpg" class="img-responsive center-block">
                        <p><strong>Fecha: <?php echo $tablaAgroponiente[0]['Fecha']; ?></strong></p>

                        <table class="table agroponiente">
                            <thead>
                                <tr>
                                    <th>Producto</th>                                
                                    <th>Tipo</th>
                                    <th>Suma Pond</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $contr = 1;
                                foreach ($tablaAgroponiente as $row) {
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr class='danger toneladas'>";
                                    } else {
                                        $contr = 2;
                                        echo "<tr class='precios'>";
                                    }

                                    echo "<td>" . $row['Producto'] . "</td>                    
                    <td>" . $row['Tipo'] . "</td>
                    <td class='columnaPP'>" . $row['Pond_Suma'] . "</td>                    
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
</div>
<div class="marginbotton30"></div>
<script type="text/javascript" src="../../js/tablaResumen.js"></script>
<!-- FIN RESULTADOS TABLAS PP Y TONELADAS-->
