<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<script type="text/javascript">
    $(document).ready(function(){
        $('#enlaceTabComision').click(function(){
            $('#modalComision').modal('show');
        });
        
        $('#confirmarModalComision').click(function(){
           $corteInicial = $('#selectCorteInicialComision option:selected').val();
           $corteFinal = $('#selectCorteFinalComision option:selected').val();
           for ($i = 1; $i < $corteInicial; $i++){
               $('.corte'+$i).hide();
               $('.corteCabecera'+$i).hide();
           }
           
           for ($corteFinal; $corteFinal < 16; $corteFinal++){
               $('.corte'+(parseFloat($corteFinal)+1)).hide();
               $('.corteCabecera'+(parseFloat($corteFinal)+1)).hide();
           }
           
           $('#modalComision').modal('hide');
           
           $descuento = $('#descuentoFiltro').val();
           
           $arrayCortes = $('.corte1, .corte2, .corte3, .corte4, .corte5, .corte6, .corte7, .corte8, .corte9, .corte10, .corte11, .corte12, .corte13, .corte14, .corte15');
           $arrayCortes.each(function(){
               $cuellos = parseFloat($(this).html());
               $descuento = parseFloat($descuento);
               $descuentoNumerico = ($cuellos*$descuento)/100;
               $resultado = $cuellos - $descuentoNumerico;
               $resultado = Math.round($resultado*100)/100;
               $(this).html($resultado);
           })
           
           
        });
        
        $('#enlaceTabPizarras').click(function(){
            for($i = 1; $i < 16; $i++){
                $('.corte'+$i).show();
            }
        })
        
    });
</script>
<div class="modal fade" id="modalComision" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Filtro Cortes y Comisión</h4>
      </div>
      <div class="modal-body">
            <label>Corte Inicial</label>
            <select id="selectCorteInicialComision" name="corteInicial" class="form-control">
                <?php 
                    for($i = 0; $i < 15; $i++){
                        echo "<option id='".($i+1)."' value='".($i+1)."'>".($i+1)."</option>";
                    }
                ?>
            </select>
            <label>Corte Final</label>
            <select id="selectCorteFinalComision" name="corteFinal" class="form-control">
                <?php
                    for ($i = 0; $i < 15; $i++){
                        echo "<option id='".($i+1)."' value='".($i+1)."'>".($i+1)."</option>";
                    }
                ?>
            </select>
            <label>Descuentos</label>
            <input type="number" name="descuento" id="descuentoFiltro" class="form-control" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="confirmarModalComision">Aplicar Filtros</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    <div class="panel-group margintop" id="accordion4" role="tablist" aria-multiselectable="true"> 
<?php 
$y = 0;
foreach ($listaAlhondigas as $alhondiga){
    ?>

    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="<?php echo $alhondiga['ebbdd']; ?>">
            <?php echo "<h4 class='panel-title titulosPanel' role='button' data-toggle='collapse' data-parent='#accordion4' href='#collapse".$alhondiga['ebbdd']."3' aria-expanded='true' aria-controls='collapse".$alhondiga['ebbdd']."'>".$alhondiga['nombre']."</h4>"; ?> 
        </div>
    
    <div id='collapse<?php echo $alhondiga['ebbdd']; ?>3' class="panel-collapse collapse" role='tabpanel' aria-labelledby='<?php echo $alhondiga["ebbdd"]; ?>'>
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