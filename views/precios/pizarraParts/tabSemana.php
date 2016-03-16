<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (isset($tablaSemana)) {
    ?>
    <script>
        $('#pizarras').removeClass('active');
        $('.pizarra').removeClass('active');
        $('#precioSemana').addClass('active');
        $('.semana').addClass('active');
        $(document).ready(function () {
            $contadorProductos = $('#filaCabeceraProductos th').length;
            $contadorAlhondigas = $('#filaCabeceraAlhondigas th').length;
            $colspan = ($contadorProductos - 1) / ($contadorAlhondigas - 1);
            $('.alhondigas').attr('colspan', $colspan);
        });

        $('#filtrosModalSemanas').submit(function () {
            alert("glglgl");
        });

    </script>
    <?php
}
?>

<script>
    $(document).ready(function () {
        $('#enlaceTabSemanas').click(function () {
            $('#modalSemana').modal('show');
        });
    });
</script>

<button id="botonFiltros" type="button btn-sm" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modalSemana">
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
                        <input id="datetimepicker2"  name="fechaInicial" type="text" class="form-control datetimepickers datetimepicker-2" />
                        <label>Fecha Final</label>
                        <input id="datetimepicker-2" name="fechaFinal" type="text" class="form-control datetimepickers datetimepicker-2" />
                    </div>
                    <div class="productosFiltro">
                        <label>Productos</label><br>
                        <select id="productos" name="productos[]" multiple class="form-control chosen-select-width anchoMulti">
                            <?php
                            foreach ($listaProductos as $especieOption) {
                                echo "<option id='" . $especieOption['idProducto'] . "' value='" . $especieOption['idProducto'] . "'>" . $especieOption['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="alhondigasFiltro">
                        <label>Alhondigas</label><br>
                        <select id="alhondigas" name="alhondigas[]" multiple class="form-control chosen-select-width anchoMulti">
                            <?php
                            foreach ($listaAlhondigas as $alhondiga) {
                                echo "<option id='" . $alhondiga['enlace'] . "' value='" . $alhondiga['enlace'] . "'>" . $alhondiga['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="corteFiltro">
                        <label>Corte Inicial</label>
                        <select id="corteInicial" name="corteInicial" class="form-control">
                            <?php
                            for ($i = 0; $i < 15; $i++) {
                                echo "<option id='" . ($i + 1) . "' value='" . ($i + 1) . "'>" . ($i + 1) . "</option>";
                            }
                            ?>
                        </select>
                        <label>Corte Final</label>
                        <select id="corteFinal" name="corteFinal" class="form-control">
                            <?php
                            for ($i = 0; $i < 15; $i++) {
                                echo "<option id='" . ($i + 1) . "' value='" . ($i + 1) . "'>" . ($i + 1) . "</option>";
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


<div class="span12 contenedoresTable margintop">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr id="filaCabeceraAlhondigas">
                    <?php
                    if (isset($listaAlhondigasCabecera)) {
                        echo "<th id='columnaSemana'></th>";
                        $conta = 1;
                        $alhondigastotal = 0;
                        foreach ($listaAlhondigasCabecera as $alhondiga) {
                            $alhondigastotal++;
                            if ($conta != 2) {
                                $conta = 2;
                                echo "<th id='" . $alhondiga['alhondiga'] . "' class='alhondigas danger'>" . $alhondiga['alhondiga'] . "</th>";
                            } else {
                                $conta = 1;
                                echo "<th id='" . $alhondiga['alhondiga'] . "' class='alhondigas'>" . $alhondiga['alhondiga'] . "</th>";
                            }
                        }
                    }
                    ?>
                </tr>
                <tr id="filaCabeceraProductos">
                    <?php
                    if (isset($listaAlhondigasCabecera)) {
                        echo "<th id='tituloSemana'>Semana</th>";
                        $conta = 1;
                        $productostotal = 0;
                        foreach ($listaAlhondigasCabecera as $alhondiga) {
                            if ($conta != 1) {
                                $conta = 1;
                            } else {
                                $conta = 2;
                            }
                            foreach ($listaProductosCabecera as $producto) {
                                $productostotal++;
                                if ($conta != 1) {
                                    echo "<th class='danger' id='" . $producto['idProducto'] . "'>" . $producto['nombre'] . "</th>";
                                } else {
                                    echo "<th id='" . $producto['idProducto'] . "'>" . $producto['nombre'] . "</th>";
                                }
                            }
                        }
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($tablaSemana)) {
                    $contr = 1;
                    $productoAlhondiga = $productostotal / $alhondigastotal;
                    $contaPA = 0;
                    $contaPintar = 0;
                    $contaFila = 0;
                    foreach ($tablaSemana as $row) {
                        echo "<tr>";
                        $contador = 0;
                        foreach ($row as $celda) {
                            if ($contaFila == 1) {
                                $contaPintar = 0;
                            } else if ($contaPA == $productoAlhondiga) {
                                $contaPA = 0;
                                if ($contaPintar != 1) {
                                    $contaPintar = 1;
                                } else {
                                    $contaPintar = 0;
                                }
                            }
                                        
                            if ($celda != 0) {
                                if ($contador == 0) {
                                    if ($contaFila == 0) {
                                        $contaPA--;
                                        $celda2 = $celda;
                                        $celda2++;
                                        echo "<td>" . $celda2 . "</td>";
                                    } else if ($contaPintar != 1) {
                                        echo "<td class='danger'>" . $celda . "</td>";
                                    } else {
                                        echo "<td>" . $celda . "</td>";
                                    }
                                    $contador = 1;
                                } else {
                                    if ($contaFila == 0) {
                                        $contaPA--;
                                        echo "<td>" . sprintf("%.2f", round($celda, 2)) . "</td>";
                                    } else if ($contaPintar != 1) {
                                        echo "<td class='danger'>" . sprintf("%.2f", round($celda, 2)) . "</td>";
                                    } else {
                                        echo "<td>" . sprintf("%.2f", round($celda, 2)) . "</td>";
                                    }
                                }
                            } else {
                                if ($contaFila == 0) {
                                    $contaPA--;
                                    echo "<td> - </td>";
                                } else if ($contaPintar != 1) {
                                    echo "<td class='danger'> - </td>";
                                } else {
                                    echo "<td> - </td>";
                                }
                            }
                            
                            $contaPA++;
                            $contaFila++;
                            if ($contaFila > $productostotal) {
                                $contaFila = 0;
                            }
                        }
                        echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
