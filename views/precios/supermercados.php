<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$this->title = 'Precios Supermercados';
$this->params['breadcrumbs'][] = $this->title;
?>
<script type="text/javascript">
    $(document).ready(function(){
        /*$('#anadirProducto').click(function(){
            //var productos = new Array();
            $('#productos').push($('#productos option:selected').val());
        });*/
        $('#yearsMayoristas option:last').attr('selected', 'selected');
        
        $('#consultaSemanal').change(function (){
            $('select#yearsMayoristas, select#semanas, #semanas_chosen, .etiquetaOculta').css('visibility', 'visible');
            $('div#fechas').css('display', 'none');
        });
        
        $('#consultaNormal, #consultaMedias').change(function (){
            $('select#yearsMayoristas, select#semanas, #semanas_chosen, .etiquetaOculta').css('visibility', 'hidden');
            $('div#fechas').css('display', 'initial');
        });
        
    });
</script>

<?php

    if (isset($year)){
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $("option[value='<?php echo $year ?>']").attr('selected', 'selected');
                $("input[value='consultaSemanal']").attr('checked', 'checked');
                $('select#yearsMayoristas, select#semanas, #semanas_chosen, .etiquetaOculta').css('visibility', 'visible');
                $('div#fechas').css('display', 'none');
            });
        </script>
<?php
    }

?>

        
<h1>PRECIOS SUPERMERCADOS</h1>       

<form action="leersemanas2" id="formYears"><input class="inputOculto" name="tipoConsultaSemanas" value="supermercados" /></form>
<form action="supermercados" id="filtroProducto">
    <div class="col-lg-6">
        <label>Productos</label>
        <select id="productos" name="productos[]" multiple class="form-control chosen-select-width">
            <?php 
                foreach ($listaProductos as $especieOption){
                    echo "<option id='".$especieOption->codigo_producto."' value='".$especieOption->codigo_producto."'>".$especieOption->producto."</option>";
                } 
            ?>
        </select>
        <!-- el br de debajo es una ñapa temporal no me seas mendrugo.-->
        <br>
        <label>Origen</label>
        <select id="origen" name="origen[]" multiple class="form-control chosen-select-width">
            <?php
                foreach ($listaOrigenes as $paisOption){
                    echo "<option id='".$paisOption->codigo_origen."' value='".$paisOption->codigo_origen."'>".$paisOption->origen."</option>";
                }
            ?>
        </select>
        <br>
        <label>Localización</label>
        <select id="localizacion" name="localizacion[]" multiple class="form-control chosen-select-width">
            <?php
                foreach ($listaLocalizaciones as $localizacionOption){
                    echo "<option id='".$localizacionOption->codigo_localizacion."' value='".$localizacionOption->codigo_localizacion."'>".$localizacionOption->Localizacion."</option>";
                }
            ?>
        </select>
    <br>
    </div>
    <div class="col-lg-6">
        <div id="fechas">
        <label>Fecha Inicial</label>
        <input id="datetimepicker1" name="fechaInicial" type="text" class="form-control" />
        <br>
        <label>Fecha Final</label>
        <input id="datetimepicker-1" name="fechaFinal" type="text" class="form-control" />
        <br>
        </div>
        <label>Tipo de Consulta:</label>
        <br>
        <label>
            <input type="radio" name="opcionesConsulta" id="consultaNormal" value="consultaNormal" />
            Consulta Normal.
        </label>
        <label>
            <input type="radio" name="opcionesConsulta" id="consultaMedias" value="consultaMedias"/>
            Media entre dos fechas.
        </label>
        <label>
            <input type="radio" name="opcionesConsulta" id="consultaSemanal" value="consultaSemanal" />
            Medias semanales.
        </label>
        <label class="etiquetaOculta">
            Campañas
        </label>
        <select id="yearsMayoristas" name="year" class="form-control" form="formYears">
                <?php
                    for($i = 0; $i<count($listaYears)-1; $i++){
                        echo "<option id='".$listaYears[$i]['year']."/".$listaYears[$i+1]['year']."' value='".$listaYears[$i]['year']."'>".$listaYears[$i]['year']."/".$listaYears[$i+1]['year']."</option>";
                    }
                ?>
        </select>
        <br>
        <label class="etiquetaOculta">
            Semanas
        </label>
        <select id="semanas" name="semanas[]" multiple="multiple" class="semanas form-control form_field chosen-select-width">
            <?php
            $i = 0;
            $aux = 0;
                for($x=0; $x < count($listaSemanas); $x++){
                    $yearValue = substr($listaSemanas[$x]['fechaCorta'], 6, 4);
                    if ($aux == 0){
                        $option = "<option id='".$x."' value=".$listaSemanas[$x]['week']."-".$yearValue."'>".$listaSemanas[$x]['week'].".- ".$listaSemanas[$x]['fechaCorta'];
                        $aux = 1;
                    }
                    
                    if (count($listaSemanas) != $x+1){
                        if ($aux == 1 && $listaSemanas[$x]['week'] != $listaSemanas[$x+1]['week']){
                            $option .= " - ".$listaSemanas[$x+1]['fechaCorta']."</option>";
                            $aux = 0;
                            echo $option;
                        }
                    }
                }
                echo $option;
            ?>
        </select>
        
        <!--<label>Calcular Medias</label>
        <input id="media" type="checkbox" name="media" />-->
    </div>
    <div class="row-fluid">
        <div class="col-lg-12">
            <br>
            <input class="btn btn-primary" type="submit" />
        </div>
    </div>
</form>
<?php
    if (isset($tabla)){
        if (isset($tabla[0]['preciomedio'])){
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Localización</th>
            <th>Origen</th>
            <th>Precio Medio</th>
            <?php
                if (isset($tabla[0]['Semana'])){
                    echo "<th>Semana</th>";
                }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($tabla as $row){
            echo "<tr><td>".$row['producto']."</td><td>".$row['Localizacion']."</td><td>".$row['origen']."</td><td>".substr($row['preciomedio'], 0, 5)."</td>";
            if (isset($tabla[0]['Semana'])){ echo "<td>".$row['Semana']."</td>"; }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
<?php
        }else{
?>
        <table class="table table-striped">
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
        foreach($tabla as $row){
            echo "<tr><td>".$row['producto']."</td><td>".$row['Localizacion']."</td><td>".$row['origen']."</td><td>".substr($row['precio'], 0, 5)."</td><td>".$row['fecha']."</td></tr>";
        }
        echo "</tbody>
        </table>";
        }
    }
    

            

