<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$this->title = 'Precios Mayoristas';
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">// <![CDATA[
   window.onload = function()
    {
        document.getElementById('enlaceGrafico').click();
         setTimeout("document.getElementById('enlaceResultado').click()",1);
    }
// ]]></script>

<?php
//RESULTADO
if (isset($tabla)) {
    if (isset($tabla[0]['preciomedio']) && isset($tabla[0]['Semana'])) {
        ?>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
        google.load("visualization", "1", {packages: ["corechart"]});
        google.setOnLoadCallback(drawVisualization);


        function drawVisualization() {
        // Some raw data (not necessarily accurate)        
        var data = google.visualization.arrayToDataTable([
        <?php
        if (isset($productos)) {
            $pro = array();
            $cong = 1;
            foreach ($productos as $p) {
                $pro[$cong] = $p;
                $cong++;
            }
            $cong--;
        }
        ?>

            ['Semanas'
        <?php
        if (isset($productos)) {
            for ($i = 1; $i <= $cong; $i++) {
                echo ",document.getElementById('" . $pro[$i] . "')";
            }
            echo "],";
            $cong2 = 1;
            foreach ($tabla as $pr) {
                if ($cong2 > $cong) {
                    $cong2 = 1;
                    echo ",";
                }
                if ($cong2 == 1) {
                    echo "[" . $pr['Semana'] . "," . $pr['preciomedio'] . "";
                    if ($cong2 == $cong) {
                        echo "]";
                    }
                    $cong2++;
                } else {
                    echo "," . $pr['preciomedio'] . "";
                    if ($cong2 == $cong) {
                        echo "]";
                    }
                    $cong2++;
                }
            }
        }
        ?>
        ]);
        var options = {
            title: 'Medias Semanales',
            vAxis: {title: 'Precio Medio'},
            hAxis: {title: 'Semanas'},
            seriesType: 'line',
            series: {}
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div_mayoristas'));
        chart.draw(data, options);
        }
        </script>
        <?php
    }
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        /*$('#anadirProducto').click(function(){
         //var productos = new Array();
         $('#productos').push($('#productos option:selected').val());
         });*/
        $('#yearsMayoristas option:last').attr('selected', 'selected');

        $('#consultaSemanal').change(function () {
            $('select#yearsMayoristas, select#semanas, #semanas_chosen, .etiquetaOculta').css('visibility', 'visible');
            $('div#fechas').css('display', 'none');
        });

        $('#consultaNormal, #consultaMedias').change(function () {
            $('select#yearsMayoristas, select#semanas, #semanas_chosen, .etiquetaOculta').css('visibility', 'hidden');
            $('div#fechas').css('display', 'initial');
        });

    });
</script>

<?php
if (isset($year)) {
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("option[value='<?php echo $year ?>']").attr('selected', 'selected');
            $("input[value='consultaSemanal']").attr('checked', 'checked');
            $('select#yearsMayoristas, select#semanas, #semanas_chosen, .etiquetaOculta').css('visibility', 'visible');
            $('div#fechas').css('display', 'none');
        });
    </script>
    <?php
}
?>
<div >
    <p class="titulosPaginaPrincipal"><?= Html::encode($this->title) ?></p>
</div>

<div class="span12 bordetop">
</div>
<form action="leersemanas2" id="formYears"><input class="inputOculto" name="tipoConsultaSemanas" value="mayoristas" /></form>
<form action="mayoristas" id="filtroProducto">
    <div class="row marginbotton30">
        <div class="col-lg-5 col-lg-offset-1">
            <label>Productos</label>
            <select id="productos" name="productos[]" multiple class="form-control chosen-select-width">
                <?php
                foreach ($listaProductos as $especieOption) {
                    echo "<option id='" . $especieOption['cod_producto'] . "' value='" . $especieOption['cod_producto'] . "'>" . $especieOption['producto'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-lg-5">        

            <label>Origen</label>
            <select id="origen" name="origen[]" multiple class="form-control chosen-select-width">
                <?php
                foreach ($listaOrigenes as $paisOption) {
                    echo "<option id='" . $paisOption->codigo_origen . "' value='" . $paisOption->codigo_origen . "'>" . $paisOption->origen . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-lg-5 col-lg-offset-1 margintop">
            <label>Mercados Mayoristas</label>
            <select id="localizacion" name="localizacion[]" multiple class="form-control chosen-select-width">
                <?php
                foreach ($listaLocalizaciones as $localizacionOption) {
                    echo "<option id='" . $localizacionOption['cod_localizacion'] . "' value='" . $localizacionOption['cod_localizacion'] . "'>" . $localizacionOption['Localizacion'] . "</option>";
                }
                ?>
            </select>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">        
            <label>Tipo de Consulta:</label>

            <label>
                <input type="radio" name="opcionesConsulta" id="consultaNormal" value="consultaNormal" />
                Consulta General.
            </label>
            <label>
                <input type="radio" name="opcionesConsulta" id="consultaMedias" value="consultaMedias"/>
                Media entre dos fechas.
            </label>
            <label>
                <input type="radio" name="opcionesConsulta" id="consultaSemanal" value="consultaSemanal" />
                Medias semanales.
            </label>
        </div>        
    </div>
    <div class="row margintop marginbotton">
        <div class="col-lg-10 col-lg-offset-1">  
            <div id="fechas">
                <div class="col-lg-5 col-lg-offset-1">
                    <label>Fecha Inicial</label>
                    <input id="datetimepicker1" name="fechaInicial" type="text" class="form-control" />
                </div>
                <div class="col-lg-5">
                    <label>Fecha Final</label>
                    <input id="datetimepicker-1" name="fechaFinal" type="text" class="form-control" />
                </div>
            </div>
            <div class="col-lg-5 col-lg-offset-1">
                <label class="etiquetaOculta">
                    Campañas
                </label>


                <select id="yearsMayoristas" name="year" class="form-control" form="formYears">
                    <?php
                    for ($i = 0; $i < count($listaYears) - 1; $i++) {
                        echo "<option id='" . $listaYears[$i]['year'] . "/" . $listaYears[$i + 1]['year'] . "' value='" . $listaYears[$i]['year'] . "'>" . $listaYears[$i]['year'] . "/" . $listaYears[$i + 1]['year'] . "</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="col-lg-5">
                <label class="etiquetaOculta">
                    Semanas
                </label>
                <select id="semanas" name="semanas[]" multiple="multiple" class="semanas form-control form_field chosen-select-width">
                    <?php
                    $i = 0;
                    $aux = 0;
                    for ($x = 0; $x < count($listaSemanas); $x++) {
                        $yearValue = substr($listaSemanas[$x]['fechaCorta'], 6, 4);
                        if (strlen($listaSemanas[$x]['week']) < 2) {
                            $listaSemanas[$x]['week'] = '0' . $listaSemanas[$x]['week'];
                        }
                        if ($aux == 0) {
                            $option = "<option id='" . $x . "' value=" . $listaSemanas[$x]['week'] . "-" . $yearValue . "'>" . $listaSemanas[$x]['week'] . ".- " . $listaSemanas[$x]['fechaCorta'];
                            $aux = 1;
                        }

                        if (count($listaSemanas) != $x + 1) {
                            if ($aux == 1 && $listaSemanas[$x]['week'] != $listaSemanas[$x + 1]['week']) {
                                $option .= " - " . $listaSemanas[$x + 1]['fechaCorta'] . "</option>";
                                $aux = 0;
                                echo $option;
                            }
                        }
                    }
                    echo $option;
                    ?>
                </select>
            </div>        

        </div>
    </div>

    <!--<label>Calcular Medias</label>
    <input id="media" type="checkbox" name="media" />-->


    <div class="row margintop">
        <div class="col-md-2 col-md-offset-5">                    
            <input class="btn btn-primary col-md-12 marginbotton" type="submit">
        </div>
    </div>
</form>
<div class="span12 bordebotton">
</div>

<?php
if (isset($tabla)) {
    if (isset($tabla[0]['preciomedio'])) {
        ?>
        <?php if (isset($tabla[0]['Semana'])) { ?>
            <div class="row-fluid margintop">
                <div class="col-lg-12">        
                    <ul class="nav nav-tabs" id="navMayoristas">
                        <li role="tablero" class="pizarra active">
                            <a id="enlaceResultado" href="#resultado" role="tab" data-toggle="tab">Resultado</a>
                        </li>
                        <li role="tablero" class="pizarra">
                            <a id="enlaceGrafico" href="#graficaMayoristas" role="tab" data-toggle="tab">Grafica</a>
                        </li>            
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="resultado">
                        <?php }
                        ?>
                        <div class="span12 contenedoresTable margintop">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Mercado Mayorista</th>
                                            <th>Origen</th>
                                            <th>Precio Medio</th>
                                            <?php
                                            if (isset($tabla[0]['Semana'])) {
                                                echo "<th>Semana</th>";
                                            }
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $contr = 1;
                                        foreach ($tabla as $row) {
                                            if ($contr != 1) {
                                                $contr = 1;
                                                echo "<tr class='danger'><td>" . $row['producto'] . "</td><td>" . $row['Localizacion'] . "</td><td>" . $row['origen'] . "</td><td>" . sprintf("%.2f", round($row['preciomedio'], 2)) . "</td>";
                                                if (isset($tabla[0]['Semana'])) {
                                                    echo "<td>" . $row['Semana'] . "</td>";
                                                }
                                                echo "</tr>";
                                            } else {
                                                $contr = 2;
                                                echo "<tr><td>" . $row['producto'] . "</td><td>" . $row['Localizacion'] . "</td><td>" . $row['origen'] . "</td><td>" . sprintf("%.2f", round($row['preciomedio'], 2)) . "</td>";
                                                if (isset($tabla[0]['Semana'])) {
                                                    echo "<td>" . $row['Semana'] . "</td>";
                                                }
                                                echo "</tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php
                        if (isset($tabla[0]['Semana'])) {
                            ?></div>
                        <div role="tabpanel" class="tab-pane active" id="graficaMayoristas">
                            <div class="span12 contenedoresTable margintop">
                                <div class="table-responsive">
                                    <table class="table">
                                        <?php
                                        if (isset($tabla)) {
                                            if (isset($tabla[0]['preciomedio']) && isset($productos)) {
                                                echo '<div id="chart_div_mayoristas" style="width: 1000px; height: 500px;"></div>';
                                            } else {
                                                echo "<p class='margintop' align='center'>No se puede mostrar la gráfica, ha introducido demasiados valores o hay datos insuficientes.</p>";
                                            }
                                        }
                                        ?>   
                                    </table></div></div>
                        </div>  

                    </div> 
                    <?php
                }
                ?>    
                <?php
            } else {
                ?>
                <div class="span12 contenedoresTable">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Mercado Mayorista</th>
                                    <th>Origen</th>
                                    <th>Precio</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contr = 1;
                                foreach ($tabla as $row) {
                                    $date = new DateTime($row['fecha']);
                                    $row['fecha'] = $date;
                                    if ($contr != 1) {
                                        $contr = 1;
                                        echo "<tr class='danger'><td>" . $row['producto'] . "</td><td>" . $row['Localizacion'] . "</td><td>" . $row['origen'] . "</td><td>" . sprintf("%.2f", round($row['precio'], 2)) . "</td><td>" . $row['fecha'] -> format('d-m-Y') . "</td></tr>";
                                    } else {
                                        $contr = 2;
                                        echo "<tr><td>" . $row['producto'] . "</td><td>" . $row['Localizacion'] . "</td><td>" . $row['origen'] . "</td><td>" . sprintf("%.2f", round($row['precio'], 2)) . "</td><td>" . $row['fecha'] -> format('d-m-Y') . "</td></tr>";
                                    }
                                }
                                echo "</tbody>
        </table></div></div>";
                            }
                        }
    

            

