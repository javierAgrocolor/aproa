<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<script type="text/javascript">
    $(document).ready(function(){
        $('#enlaceTabCortes').click(function(){
            $('#modalCortes').modal('toggle');
        })
    })
</script>

<div class="panel-group margintop" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="heading1">
            <h4 role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1" class="panel-title titulosPanel"> 
                Última Pizarra - <?php echo $ultimaPizarra[0]['alhondiga']; ?>
                </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
            <div class="panel-body">
            <?php
            
            if (is_array($ultimaPizarra)){                
                require($_SERVER['DOCUMENT_ROOT'].'/aproa/views/precios/pizarraParts/cabeceraTablaPizarra.php');
                require($_SERVER['DOCUMENT_ROOT'].'/aproa/views/precios/pizarraParts/cuerpoUltimaPizarra.php');
            }else{
                echo $ultimaPizarra;
            }
            
            ?>
        </div>
        </div>
    </div>


<?php
$y = 0;
foreach ($listaAlhondigas as $alhondiga){
    ?>

    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="<?php echo $alhondiga['ebbdd']; ?>">
            
                <?php echo "<h4 class='panel-title titulosPanel' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse".$alhondiga['ebbdd']."' aria-expanded='true' aria-controls='collapse".$alhondiga['ebbdd']."'>".$alhondiga['nombre']."</h4>"; ?> 
            
        </div>
    
    <div id='collapse<?php echo $alhondiga['ebbdd']; ?>' class="panel-collapse collapse" role='tabpanel' aria-labelledby='<?php echo $alhondiga["ebbdd"]; ?>'>
        <div class="panel-body">            
            <?php
            if (is_array($listaPizarras[$y])){
                echo "<img src='/aproa/images/".$alhondiga['ebbdd'].".jpg' class='img-responsive center-block'>";
                require($_SERVER['DOCUMENT_ROOT'].'/aproa/views/precios/pizarraParts/cabeceraTablaPizarra.php');
                require($_SERVER['DOCUMENT_ROOT'].'/aproa/views/precios/pizarraParts/cuerpoTablaPizarra.php');
            }else{
                echo "<p align='center'>No existen aún registros para el día de hoy.</p>";
            }
            $y++;
            ?>
        </div>
    </div>
    </div>         

<?php
}?>
</div>
