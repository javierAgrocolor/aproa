<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="panel-group margintop" id="accordion2" role="tablist" aria-multiselectable="true">
    <?php
$y = 0;
foreach ($listaAlhondigas as $alhondiga){
    ?>

    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="<?php echo $alhondiga['ebbdd']; ?>">
            
                <?php echo "<h4 class='panel-title titulosPanel' role='button' data-toggle='collapse' data-parent='#accordion2' href='#collapse2".$alhondiga['ebbdd']."' aria-expanded='true' aria-controls='collapse2".$alhondiga['ebbdd']."'>".$alhondiga['nombre']."</h4>"; ?> 
            
        </div>
    
    <div id='collapse2<?php echo $alhondiga['ebbdd']; ?>' class="panel-collapse collapse" role='tabpanel' aria-labelledby='<?php echo $alhondiga["ebbdd"]; ?>'>
        <div class="panel-body">
            <?php
            if (is_array($listaPizarrasProducto[$y])){
                echo "<img src='/aproa/images/".$alhondiga['ebbdd'].".jpg' class='img-responsive center-block'>";
                require($_SERVER['DOCUMENT_ROOT'].'/aproa/views/precios/pizarraParts/cabeceraTablaPizarra.php');
                require($_SERVER['DOCUMENT_ROOT'].'/aproa/views/precios/pizarraParts/cuerpoTablaProducto.php');
            }else{
                echo "<p align='center'>No existen aún registros para el día de hoy.</p>";
            }
            $y++;
            ?>
        </div>
    </div>
</div>

<?php
}
?></div>

