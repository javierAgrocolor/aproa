<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Histórico Informes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <p class="titulosPaginaPrincipal"><?= Html::encode($this->title) ?></p>

    <div class="col-md-12">
        <div class="span12 bordetop">         
        </div>
        <form action="abrirpdf">
            <div class="col-lg-6 col-lg-offset-2">  
                <p class="titulos2"> Buscar Informe:</p>
            </div>
            <div class="row marginbotton30">
                <div class="col-lg-6 col-lg-offset-2">            
                    <select id="productos" name="informes" class="form-control chosen-select-width">
                        <?php
                        foreach ($tablaHistorico as $row) {
                            echo "<option id='" . $row['boletin'] . "' value='" . $row['boletin'] . "'>" . $row['tipo'] . " ( " . $row['fecha'] . " )" . "</option>";
                        }
                        ?>
                    </select>            
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary" formtarget="_blank" type="submit">Ver PDF</button>
                </div>
            </div>
        </form>
        <div class="span12 bordebotton">
        </div>
    </div>

    <!-- Paginacion -->
    <div class="col-md-12">
        <div class="span12 contenedoresPaginacion">
            <table id="content" class="marginbotton">
                <tbody>       
                    <?php
                    foreach ($tablaHistorico as $row) {
                        //exit($row);
                        echo "<tr><td class='titulos2'><a target='_blank' href='abrirpdf?informes=" . $row['boletin'] . "'>" . $row['tipo'] . "</a> (";
                        $time = strtotime($row['fecha']);
                        echo $time = date('d-m-Y', $time);
                        echo ")
                      </td></tr>";
                    }
                    ?>     
                </tbody>
            </table>
            <div id="pagination"></div>        
        </div>
    </div>

<!--<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.simplePagination.js"></script>-->

    <!-- Funcion de paginación -->
    <script>
        jQuery(function ($) {
            var items = $("#content tbody tr");
            var numItems = items.length;
            var perPage = 10;
            // Muestra los valores de 10 en 10
            items.slice(perPage).hide();
            // now setup pagination
            $("#pagination").pagination({
                items: numItems,
                itemsOnPage: perPage,
                cssStyle: "light-theme",
                onPageClick: function (pageNumber) { // this is where the magic happens
                    // someone changed page, lets hide/show trs appropriately
                    var showFrom = perPage * (pageNumber - 1);
                    var showTo = showFrom + perPage;
                    items.hide() // first hide everything, then show for the new page
                            .slice(showFrom, showTo).show();
                }
            });
        });
    </script>

    <div class="row">
        <!-- Publi APK -->
        <div class="span12">
            <a href="http://www.aproa.eu/crisis/apps/apk.apk"><img src="/images/apkdescarga.png" class="img-responsive center-block"></a>
        </div>
    </div>
</div>
