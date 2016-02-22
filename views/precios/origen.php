<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'Precios Origen';
$this->params['breadcrumbs'][] = $this->title;
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
<form action="leersemanas2" id="formYears"><input class="inputOculto" name="tipoConsultaSemanas" value="origen" /></form>
<form action="origen" id="filtroProducto">
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
                        if (strlen($listaSemanas[$x]['week']) < 2) {
                            $listaSemanas[$x]['week'] = '0' . $listaSemanas[$x]['week'];
                        }

                        $yearValue = substr($listaSemanas[$x]['fechaCorta'], 6, 4);
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
            <!--<label>Calcular Medias</label>
            <input id="media" type="checkbox" name="media" />-->
        </div>
    </div>

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
        <div class="span12 contenedoresTable">
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Localización</th>
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
                            echo "<tr class='danger'><td>" . $row['producto'] . "</td><td>" . $row['Localizacion'] . "</td><td>" . $row['origen'] . "</td><td>" . round($row['preciomedio'], 2) . "</td>";
                            if (isset($tabla[0]['Semana'])) {
                                echo "<td>" . $row['Semana'] . "</td>";
                            }
                            echo "</tr>";
                        } else {
                            $contr = 2;
                            echo "<tr><td>" . $row['producto'] . "</td><td>" . $row['Localizacion'] . "</td><td>" . $row['origen'] . "</td><td>" . round($row['preciomedio'], 2) . "</td>";
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
    } else {
        ?>
        <div class="span12 contenedoresTable">
            <div class="table-responsive">
            <table class="table">
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
                    $contr = 1;
                    foreach ($tabla as $row) {
                        if ($contr != 1) {
                            $contr = 1;
                            echo "<tr class='danger'><td>" . $row['producto'] . "</td><td>" . $row['Localizacion'] . "</td><td>" . $row['origen'] . "</td><td>" . round($row['precio'], 2) . "</td><td>" . $row['fecha'] . "</td></tr>";
                        } else {
                            $contr = 2;
                            echo "<tr><td>" . $row['producto'] . "</td><td>" . $row['Localizacion'] . "</td><td>" . $row['origen'] . "</td><td>" . round($row['precio'], 2) . "</td><td>" . $row['fecha'] . "</td></tr>";
                        }
                        
                    }
                    echo "</tbody>
        </table></div></div>";
                }
            }