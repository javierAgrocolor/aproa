<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Histórico';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <div id="pagination"></div>
    <table id="content">
        <tbody>       

            <?php
            foreach ($tablaHistorico as $row) {
                //exit($row);
                echo "<tr><td><a target='_blank' href='/aproa/web/index.php/site/abrirpdf?informes=" . $row['boletin'] . "'>" . $row['tipo'] . " (" . $row['fecha'] . ")</a>
                      </td></tr>";
            }
            ?>     

        </tbody>
    </table>
    <!--<script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery.simplePagination.js"></script>-->
    <script>
        jQuery(function ($) {
            var items = $("#content tbody tr");
            var numItems = items.length;
            var perPage = 10;
            // only show the first 2 (or "first per_page") items initially
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


</div>
