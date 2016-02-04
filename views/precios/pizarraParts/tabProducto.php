<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$y = 0;
foreach ($listaAlhondigas as $alhondiga){
    ?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="<?php echo $alhondiga['ebbdd']; ?>">
            <h4 class="panel-title">
                <?php echo "<a role='button' data-toggle='collapse' data-parent='#accordion' href='#producto".$alhondiga['ebbdd']."' aria-expanded='true' aria-controls='collapse".$alhondiga['ebbdd']."'>".$alhondiga['nombre']."</a>"; ?> 
            </h4>
        </div>
    </div>
    <div id='producto<?php echo $alhondiga['ebbdd']; ?>' class="panel-collapse collapse out" role='tabpanel' aria-labelledby='<?php echo $alhondiga["ebbdd"]; ?>'>
        <div class="panel-body">
            <?php
            if (is_array($listaPizarrasProducto[$y])){
                require($_SERVER['DOCUMENT_ROOT'].'/aproa/views/precios/pizarraParts/cabeceraTablaPizarra.php');
                require($_SERVER['DOCUMENT_ROOT'].'/aproa/views/precios/pizarraParts/cuerpoTablaProducto.php');
            }else{
                echo "No existen aún registros para el día de hoy.";
            }
            $y++;
            ?>
        </div>
    </div>
</div>

<?php
}


