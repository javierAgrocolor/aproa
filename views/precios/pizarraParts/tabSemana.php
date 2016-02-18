<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($tablaSemana)){
?>
    <script>
        $('#pizarras').removeClass('active');
        $('.pizarra').removeClass('active');
        $('#precioSemana').addClass('active');
        $('.semana').addClass('active');
    </script>
<?php
}

?>

<button type="button btn-sm" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalSemana">
  Filtros
</button>

<div class="modal fade" id="modalSemana" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Filtros Precios Por Semana</h4>
      </div>
      <div class="modal-body">
          <form action="pizarraprecios" method="get" id="filtrosModalSemanas">
              <div class="fechasFiltroSemanas">
                <label>Fecha Inicial</label>
                <input id="datetimepicker2" name="fechaInicial" type="text" class="form-control" />
                <label>Fecha Final</label>
                <input id="datetimepicker-2" name="fechaFinal" type="text" class="form-control" />
              </div>
              <div class="productosFiltro">
                  <label>Productos</label><br>
                    <select id="productos" name="productos[]" multiple class="form-control chosen-select-width anchoMulti">
                        <?php
                        foreach ($listaProductos as $especieOption) {
                            echo "<option id='" . $especieOption['idProducto'] . "' value='" . $especieOption['idProducto'] . "'>" . $especieOption['nombre']. "</option>";
                        }
                        ?>
                    </select>
              </div>
              <div class="alhondigasFiltro">
                  <label>Alhondigas</label><br>
                    <select id="alhondigas" name="alhondigas[]" multiple class="form-control chosen-select-width anchoMulti">
                        <?php
                        foreach ($listaAlhondigas as $alhondiga) {
                            echo "<option id='" . $alhondiga['enlace'] . "' value='" . $alhondiga['enlace'] . "'>" . $alhondiga['nombre']. "</option>";
                        }
                        ?>
                    </select>
              </div>
              <div class="corteFiltro">
                  <label>Corte Inicial</label>
                  <select id="corteInicial" name="corteInicial" class="form-control">
                      <?php
                        for ($i = 0; $i < 15; $i++){
                            echo "<option id='".($i+1)."' value='".($i+1)."'>".($i+1)."</option>";
                        }
                      ?>
                  </select>
                  <label>Corte Final</label>
                  <select id="corteFinal" name="corteFinal" class="form-control">
                      <?php
                        for($i = 0; $i < 15; $i++){
                            echo "<option id='".($i+1)."' value='".($i+1)."'>".($i+1)."</option>";
                        }
                      ?>
                  </select>
              </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="confirmarModalSemanas">Aplicar filtros</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="span12 contenedoresTable margintop scrollLateral">
    <table class="table table-striped">
        <thead>
            <tr>
                <?php
                    if (isset($listaAlhondigasCabecera)){
                        echo "<th id='tituloSemana'>Semana</th>";
                        foreach ($listaAlhondigasCabecera as $alhondiga){
                            foreach($listaProductosCabecera as $producto){
                                echo "<th id='".$producto['idProducto']."'>".$producto['nombre']."</th>";
                            }
                        }
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($tablaSemana)){
                foreach($tablaSemana as $row){
                    echo "<tr>";
                    foreach ($row as $celda){
                        echo "<td>".round($celda, 2)."</td>";
                    }
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>