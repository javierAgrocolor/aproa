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
            $('#modalCortes').modal('show');
        });
        
        $('#confirmarModalCortes').click(function(){
           $corteInicial = $('#selectCorteInicial option:selected').val();
           $corteFinal = $('#selectCorteFinal option:selected').val();
           for ($i = 1; $i < $corteInicial; $i++){
               $('.corte'+$i).hide();
               $('.corteCabecera'+$i).hide();
           }
           
           for ($corteFinal; $corteFinal < 16; $corteFinal++){
               $('.corte'+(parseFloat($corteFinal)+1)).hide();
               $('.corteCabecera'+(parseFloat($corteFinal)+1)).hide();
           }
           
           $('#modalCortes').modal('hide');
        });
        
        $('#enlaceTabPizarras').click(function(){
            for($i = 1; $i < 16; $i++){
                $('.corte'+$i).show();
            }
        });
        
    });
</script>
<div class="modal fade" id="modalCortes" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Filtro Cortes</h4>
      </div>
      <div class="modal-body">
            <form>
                <label>Corte Inicial</label>
                <select id="selectCorteInicial" name="corteInicial" class="form-control">
                <?php 
                    for($i = 0; $i < 15; $i++){
                        echo "<option id='".($i+1)."' value='".($i+1)."'>".($i+1)."</option>";
                    }
                    ?>
                </select>
                <label>Corte Final</label>
                <select id="selectCorteFinal" name="corteFinal" class="form-control">
                <?php
                    for ($i = 0; $i < 15; $i++){
                        echo "<option id='".($i+1)."' value='".($i+1)."'>".($i+1)."</option>";
                    }
                    ?>
                </select>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="confirmarModalCortes">Aplicar Filtros</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
     
<?php 
$y = 0;
foreach ($listaAlhondigas as $alhondiga){
    ?>

    <div class="panel panelTabla">
        <div class="panel-heading panelTitulo" role="tab" id="<?php echo $alhondiga['ebbdd']; ?>">
            <?php echo "<h4 class='panel-title titulosPanel' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse".$alhondiga['ebbdd']."2' aria-expanded='true' aria-controls='collapse".$alhondiga['ebbdd']."'>".$alhondiga['nombre']."</h4>"; ?> 
        </div>
    
    <div id='collapse<?php echo $alhondiga['ebbdd']; ?>2' class="panel-collapse collapse" role='tabpanel' aria-labelledby='<?php echo $alhondiga["ebbdd"]; ?>'>
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
