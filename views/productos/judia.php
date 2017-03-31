<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Judía';
$this->params['breadcrumbs'][] = $this->title;
//print_r($mayoristasfechaorigen);

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Graficos origen -->
<?php if (isset($origenfecha[0]['producto'])) { ?>    
    
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart','table']});
        google.charts.setOnLoadCallback(drawJudiaHeldaOri);

        function drawJudiaHeldaOri() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
    <?php
    //controlar fecha
    $valido = false;
    for ($x = 0; $x < count($origenfecha); $x++) {
        if ($origenfecha[$x]['cod_producto'] == 14) {
            echo "[''," . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo "['',0";
    }
    //controlar semana
    $valido = false;
    for ($x = 0; $x < count($origensemana); $x++) {
        if ($origensemana[$x]['cod_producto'] == 14) {
            echo "," . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo ",0";
    }
    //controlar año
    $valido = false;
    for ($x = 0; $x < count($origenyear); $x++) {
        if ($origenyear[$x]['cod_producto'] == 14) {
            echo "," . sprintf("%.2f", round($origenyear[$x]['precio'], 2)) . "]";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo ",0]";
    }
    ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Helda - Precios en origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: 'ALMERÍA'},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_origen_jhelda'));
            chart.draw(view, options);
        }

        google.charts.setOnLoadCallback(drawJudiaPeronaOri);

        function drawJudiaPeronaOri() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
    <?php
    //controlar fecha
    $valido = false;
    for ($x = 0; $x < count($origenfecha); $x++) {
        if ($origenfecha[$x]['cod_producto'] == 37) {
            echo "[''," . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo "['',0";
    }
    //controlar semana
    $valido = false;
    for ($x = 0; $x < count($origensemana); $x++) {
        if ($origensemana[$x]['cod_producto'] == 37) {
            echo "," . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo ",0";
    }
    //controlar año
    $valido = false;
    for ($x = 0; $x < count($origenyear); $x++) {
        if ($origenyear[$x]['cod_producto'] == 37) {
            echo "," . sprintf("%.2f", round($origenyear[$x]['precio'], 2)) . "]";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo ",0]";
    }
    ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Perona - Precios en origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: 'ALMERÍA'},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_origen_jperona'));
            chart.draw(view, options);
        }

        google.charts.setOnLoadCallback(drawJudiaStrikeOri);

        function drawJudiaStrikeOri() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
    <?php
    //controlar fecha
    $valido = false;
    for ($x = 0; $x < count($origenfecha); $x++) {
        if ($origenfecha[$x]['cod_producto'] == 45) {
            echo "[''," . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo "['',0";
    }
    //controlar semana
    $valido = false;
    for ($x = 0; $x < count($origensemana); $x++) {
        if ($origensemana[$x]['cod_producto'] == 45) {
            echo "," . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo ",0";
    }
    //controlar año
    $valido = false;
    for ($x = 0; $x < count($origenyear); $x++) {
        if ($origenyear[$x]['cod_producto'] == 45) {
            echo "," . sprintf("%.2f", round($origenyear[$x]['precio'], 2)) . "]";
            $valido = true;
        }
    }
    if ($valido == false) {
        echo ",0]";
    }
    ?>
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Strike - Precios en origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: 'ALMERÍA'},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_origen_jstrike'));
            chart.draw(view, options);
        }

    </script>
<?php } ?>
    
     <!-- Graficos mayoristas -->
<?php if (isset($mayoristasfechaesp[0]['producto']) || isset($mayoristasfechaale[0]['producto']) || isset($mayoristasfechafra[0]['producto']) || isset($mayoristasfecharei[0]['producto'])) { ?>
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart','table']});
        google.charts.setOnLoadCallback(drawJudiaHeldaMay);

        function drawJudiaHeldaMay() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($mayoristasfechaesp); $x++) {
        if ($mayoristasfechaesp[$x]['cod_producto'] == 14) {
            echo "['España'," . sprintf("%.2f", round($mayoristasfechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0"; */ $espana = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanaesp); $x++) {
        if ($mayoristassemanaesp[$x]['cod_producto'] == 14 && $espana == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearesp); $x++) {
        if ($mayoristasyearesp[$x]['cod_producto'] == 14 && $espana == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($mayoristasfechaale); $x++) {
        if ($mayoristasfechaale[$x]['cod_producto'] == 14) {
            echo "['Alemania'," . sprintf("%.2f", round($mayoristasfechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Alemania',0"; */ $alemania = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanaale); $x++) {
        if ($mayoristassemanaale[$x]['cod_producto'] == 14 && $alemania == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearale); $x++) {
        if ($mayoristasyearale[$x]['cod_producto'] == 14 && $alemania == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($mayoristasfechafra); $x++) {
        if ($mayoristasfechafra[$x]['cod_producto'] == 14) {
            echo "['Francia'," . sprintf("%.2f", round($mayoristasfechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0";*/ $francia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanafra); $x++) {
        if ($mayoristassemanafra[$x]['cod_producto'] == 14 && $francia == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearfra); $x++) {
        if ($mayoristasyearfra[$x]['cod_producto'] == 14 && $francia == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($mayoristasfecharei); $x++) {
        if ($mayoristasfecharei[$x]['cod_producto'] == 14) {
            echo "['Reino Unido'," . sprintf("%.2f", round($mayoristasfecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Reino Unido',0";*/ $reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanarei); $x++) {
        if ($mayoristassemanarei[$x]['cod_producto'] == 14 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearrei); $x++) {
        if ($mayoristasyearrei[$x]['cod_producto'] == 14 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearrei[$x]['precio'], 2)) . "]";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0]";    }
    if($espana == false && $alemania == false && $francia == false && $reinounido == false){echo "['',0,0,0]";}
    ?>          
          ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Helda - Precios en mayoristas(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_mayoristas_judiahelda'));
            chart.draw(view, options);
        }

   
        google.charts.setOnLoadCallback(drawJudiaGarrafonMay);

        function drawJudiaGarrafonMay() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($mayoristasfechaesp); $x++) {
        if ($mayoristasfechaesp[$x]['cod_producto'] == 401) {
            echo "['España'," . sprintf("%.2f", round($mayoristasfechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {      /*  echo "['España',0";*/ $espana = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanaesp); $x++) {
        if ($mayoristassemanaesp[$x]['cod_producto'] == 401 && $espana == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearesp); $x++) {
        if ($mayoristasyearesp[$x]['cod_producto'] == 401 && $espana == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($mayoristasfechaale); $x++) {
        if ($mayoristasfechaale[$x]['cod_producto'] == 401) {
            echo "['Alemania'," . sprintf("%.2f", round($mayoristasfechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Alemania',0"; */$alemania = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanaale); $x++) {
        if ($mayoristassemanaale[$x]['cod_producto'] == 401 && $alemania == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearale); $x++) {
        if ($mayoristasyearale[$x]['cod_producto'] == 401 && $alemania == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($mayoristasfechafra); $x++) {
        if ($mayoristasfechafra[$x]['cod_producto'] == 401) {
            echo "['Francia'," . sprintf("%.2f", round($mayoristasfechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Francia',0";*/$francia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanafra); $x++) {
        if ($mayoristassemanafra[$x]['cod_producto'] == 401 && $francia == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearfra); $x++) {
        if ($mayoristasyearfra[$x]['cod_producto'] == 401 && $francia == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($mayoristasfecharei); $x++) {
        if ($mayoristasfecharei[$x]['cod_producto'] == 401) {
            echo "['Reino Unido'," . sprintf("%.2f", round($mayoristasfecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Reino Unido',0";*/$reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanarei); $x++) {
        if ($mayoristassemanarei[$x]['cod_producto'] == 401 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearrei); $x++) {
        if ($mayoristasyearrei[$x]['cod_producto'] == 401 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearrei[$x]['precio'], 2)) . "]";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0]";    }
    if($espana == false && $alemania == false && $francia == false && $reinounido == false){echo "['',0,0,0]";}
    ?>          
          ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Garrafón - Precios en mayoristas(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_mayoristas_judiagarrafon'));
            chart.draw(view, options);
        }

   
        google.charts.setOnLoadCallback(drawJudiaSinMay);

        function drawJudiaSinMay() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($mayoristasfechaesp); $x++) {
        if ($mayoristasfechaesp[$x]['cod_producto'] == 31) {
            echo "['España'," . sprintf("%.2f", round($mayoristasfechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0";*/$espana = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanaesp); $x++) {
        if ($mayoristassemanaesp[$x]['cod_producto'] == 31 && $espana == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearesp); $x++) {
        if ($mayoristasyearesp[$x]['cod_producto'] == 31 && $espana == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($mayoristasfechaale); $x++) {
        if ($mayoristasfechaale[$x]['cod_producto'] == 31) {
            echo "['Alemania'," . sprintf("%.2f", round($mayoristasfechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Alemania',0";*/$alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanaale); $x++) {
        if ($mayoristassemanaale[$x]['cod_producto'] == 31 && $alemania == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearale); $x++) {
        if ($mayoristasyearale[$x]['cod_producto'] == 31 && $alemania == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($mayoristasfechafra); $x++) {
        if ($mayoristasfechafra[$x]['cod_producto'] == 31) {
            echo "['Francia'," . sprintf("%.2f", round($mayoristasfechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Francia',0";*/$francia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanafra); $x++) {
        if ($mayoristassemanafra[$x]['cod_producto'] == 31 && $francia == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearfra); $x++) {
        if ($mayoristasyearfra[$x]['cod_producto'] == 31 && $francia == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($mayoristasfecharei); $x++) {
        if ($mayoristasfecharei[$x]['cod_producto'] == 31) {
            echo "['Reino Unido'," . sprintf("%.2f", round($mayoristasfecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Reino Unido',0";*/ $reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanarei); $x++) {
        if ($mayoristassemanarei[$x]['cod_producto'] == 31 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearrei); $x++) {
        if ($mayoristasyearrei[$x]['cod_producto'] == 31 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearrei[$x]['precio'], 2)) . "]";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0]";    }
    if($espana == false && $alemania == false && $francia == false && $reinounido == false){echo "['',0,0,0]";}
    ?>          
          ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Sin - Precios en mayoristas(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_mayoristas_judiasin'));
            chart.draw(view, options);
        }

    </script>
    
<?php } ?>

    <!-- Tabla mayoristas -->
    <?php if(isset($mayoristastabla[0]['producto'])){?>
    
    <script type="text/javascript">

      google.charts.load('current', {'packages':['table','corechart']});
      google.charts.setOnLoadCallback(drawTable);

      function drawTable() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Producto');
        data.addColumn('string', 'Localización');
        data.addColumn('string', 'Origen');
        data.addColumn('string', 'Fecha');
        data.addColumn('number', 'Precio');
        
        data.addRows([
            <?php 
            foreach ($mayoristastabla as $row) {
                $date = new DateTime($row['fecha']);
                $row['fecha'] = $date;
                echo '["'.$row['producto'].'","'.$row['Localizacion'].'","'.$row['origen'].'","'.$row['fecha']->format('d-m-Y').'",'.sprintf("%.2f", round($row['precio'], 2)).'],';
            }
            ?>          
        ]);

        var table = new google.visualization.Table(document.getElementById('table_mayoristas'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }

</script>
    
    <?php }?>

 <!-- Graficos mayoristas origen -->
<?php if (isset($mayoristasfechaorigen[0]['producto'])) { ?>
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart','table']});        
        google.charts.setOnLoadCallback(drawJudiaHeldaMayOr);

        function drawJudiaHeldaMayOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
                <?php
                    $datos=false;
                    foreach ($mayoristasfechaorigen as $row) {
                        if($row['cod_producto']==14){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($mayoristassemanaorigen as $row2) {
                                 if($row2['cod_producto']==14 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($mayoristasyearorigen as $row3) {
                                 if($row3['cod_producto']==14 && $row3['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row3['precio'], 2)).'],';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0],';}
                        }   } 
                        if($datos==false){echo '["",0,0,0]';}
                        ?>  ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Helda - Precios en mayoristas segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_mayoristas_origen_judiahelda'));
            chart.draw(view, options);
        }
        
        google.charts.setOnLoadCallback(drawJudiaGarrafonMayOr);

        function drawJudiaGarrafonMayOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
                <?php
                    $datos=false;
                    foreach ($mayoristasfechaorigen as $row) {
                        if($row['cod_producto']==401){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($mayoristassemanaorigen as $row2) {
                                 if($row2['cod_producto']==401 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($mayoristasyearorigen as $row3) {
                                 if($row3['cod_producto']==401 && $row3['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row3['precio'], 2)).'],';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0],';}
                        }   }
                        if($datos==false){echo '["",0,0,0]';}
                        ?>  ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Garrafón - Precios en mayoristas segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_mayoristas_origen_judiagarrafon'));
            chart.draw(view, options);
        }
        
        google.charts.setOnLoadCallback(drawJudiaSinMayOr);

        function drawJudiaSinMayOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],               
                <?php
                    $datos=false;
                    foreach ($mayoristasfechaorigen as $row) {
                        if($row['cod_producto']==31){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($mayoristassemanaorigen as $row2) {
                                 if($row2['cod_producto']==31 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($mayoristasyearorigen as $row3) {
                                 if($row3['cod_producto']==31 && $row3['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row3['precio'], 2)).'],';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0],';}
                        }   }
                        if($datos==false){echo '["",0,0,0]';}
                        ?>  ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Sin - Precios en mayoristas segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_mayoristas_origen_judiasin'));
            chart.draw(view, options);
        }
                
    </script>
    
    <?php }?>
    

<!-- Graficos supermercado -->
<?php if (isset($supermercadofechaesp[0]['producto']) || isset($supermercadofechaale[0]['producto']) || isset($supermercadofechafra[0]['producto']) || isset($supermercadofecharei[0]['producto'])) { ?>
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart','table']});
        google.charts.setOnLoadCallback(drawJudiaHeldaSup);

        function drawJudiaHeldaSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 14) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0"; */$espana = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 14 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 14 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 14) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Alemania',0";*/$alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 14 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 14 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 14) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0";*/$francia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 14 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 14 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 14) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Polonia',0";*/$polonia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 14 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 14 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 14) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Reino Unido',0"; */$reinounido = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 14 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 14 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearrei[$x]['precio'], 2)) . "]";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0]";    }
    if($espana == false && $alemania == false && $francia == false && $reinounido == false && $polonia == false){echo "['',0,0,0]";}
    ?>          
          ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Helda - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_judiahelda'));
            chart.draw(view, options);
        }
   
        google.charts.setOnLoadCallback(drawJudiaPeronaSup);

        function drawJudiaPeronaSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 37) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0";*/$espana = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 37 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 37 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 37) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Alemania',0";*/$alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 37 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 37 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 37) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0"; */$francia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 37 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 37 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 37) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Polonia',0"; */$polonia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 37 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 37 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 37) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Reino Unido',0";*/$reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 37 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 37 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearrei[$x]['precio'], 2)) . "]";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0]";    }
    if($espana == false && $alemania == false && $francia == false && $reinounido == false && $polonia == false){echo "['',0,0,0]";}
    ?>          
          ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Perona - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_judiaperona'));
            chart.draw(view, options);
        }
           
        google.charts.setOnLoadCallback(drawJudiaStrikeSup);

        function drawJudiaStrikeSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 45) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0"; */$espana = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 45 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 45 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 45) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Alemania',0";*/$alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 45 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 45 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 45) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Francia',0";*/$francia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 45 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 45 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 45) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Polonia',0";*/$polonia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 45 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 45 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 45) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Reino Unido',0";*/$reinounido= false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 45 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 45 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearrei[$x]['precio'], 2)) . "]";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0]";    }
    if($espana == false && $alemania == false && $francia == false && $reinounido == false && $polonia == false){echo "['',0,0,0]";}
    ?>          
          ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Strike - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_judiastrike'));
            chart.draw(view, options);
        }    
        
        google.charts.setOnLoadCallback(drawJudiaSinSup);

        function drawJudiaSinSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 31) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0";*/$espana = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 31 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 31 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 31) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Alemania',0";*/$alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 31 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 31 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 31) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0"; */$francia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 31 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 31 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 31) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Polonia',0";*/$polonia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 31 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 31 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 31) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Reino Unido',0";*/$reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 31 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 31 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearrei[$x]['precio'], 2)) . "]";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0]";    }
    if($espana == false && $alemania == false && $francia == false && $reinounido == false && $polonia == false){echo "['',0,0,0]";}
    ?>          
          ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Sin - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_judiasin'));
            chart.draw(view, options);
        } 

    </script>
    
<?php } ?>

<!-- Tabla supermercado -->
<?php if(isset($supermercadotabla[0]['producto'])){?>
    
    <script type="text/javascript">

      google.charts.load('current', {'packages':['table','corechart']});
      google.charts.setOnLoadCallback(drawTableSup);

      function drawTableSup() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Producto');
        data.addColumn('string', 'Localización');
        data.addColumn('string', 'Origen');
        data.addColumn('string', 'Fecha');
        data.addColumn('string','Presentación');
        data.addColumn('number', 'Precio');
        
        data.addRows([
            <?php 
            foreach ($supermercadotabla as $row) {
                $date = new DateTime($row['fecha']);
                $row['fecha'] = $date;
                echo '["'.$row['producto'].'","'.$row['Localizacion'].'","'.$row['origen'].'","'.$row['fecha']->format('d-m-Y').'","'.$row['presentacion'].'",'.sprintf("%.2f", round($row['precio'], 2)).'],';
            }
            ?>          
        ]);

        var table = new google.visualization.Table(document.getElementById('table_supermercado'));

        table.draw(data, {showRowNumber: true, width: '100%', height: '100%'});
      }

</script>
    
    <?php }?>
   
<!-- Graficos supermercado origen -->
<?php if (isset($supermercadofechaorigen[0]['producto'])) { ?>
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart','table']});        
        google.charts.setOnLoadCallback(drawJudiaHeldaSupOr);

        function drawJudiaHeldaSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==14){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==14 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==14 && $row3['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row3['precio'], 2)).'],';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0],';}
                        }   }  
                        if($datos==false){echo '["",0,0,0]';}
                        ?>  ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Helda - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_judiahelda'));
            chart.draw(view, options);
        }
        
        google.charts.setOnLoadCallback(drawJudiaPeronaSupOr);

        function drawJudiaPeronaSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==37){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==37 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==37 && $row3['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row3['precio'], 2)).'],';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0],';}
                        }   }  
                        if($datos==false){echo '["",0,0,0]';}
                        ?>  ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Perona - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_judiaperona'));
            chart.draw(view, options);
        }
                      
        google.charts.setOnLoadCallback(drawJudiaStrikeSupOr);

        function drawJudiaStrikeSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],               
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==45){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==45 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==45 && $row3['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row3['precio'], 2)).'],';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0],';}
                        }   } 
                        if($datos==false){echo '["",0,0,0]';}
                        ?>  ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Strike - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_judiastrike'));
            chart.draw(view, options);
        }
        
        google.charts.setOnLoadCallback(drawJudiaSinSupOr);

        function drawJudiaSinSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],               
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==31){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==31 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==31 && $row3['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row3['precio'], 2)).'],';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0],';}
                        }   } 
                        if($datos==false){echo '["",0,0,0]';}
                        ?>  ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1, {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                }, 2, {
                    calc: "stringify",
                    sourceColumn: 2,
                    type: "string",
                    role: "annotation"
                }, 3, {
                    calc: "stringify",
                    sourceColumn: 3,
                    type: "string",
                    role: "annotation"
                }]);

            var options = {
                legend: {textStyle: {fontSize: '9'}, position: 'top'},
                title: 'Judía Sin - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#1d5868", "#3289a1", "#5db1c8"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_judiasin'));
            chart.draw(view, options);
        }
        
    </script>
    
    <?php }?>
    
<!-- Productos -->
                
           <div class="span12">
                 <div class="row-fluid">   
                <div class="col-md-3 botonesproductos">
                    <div class="col-md-6">                         
                        <a href="<?php echo Url::home() ?>/productos/tomate?producto=tomate"><img src="/images/botontomate.png" class="img-responsive center-block"></a>            
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo Url::home() ?>/productos/pimiento?producto=pimiento"><img src="/images/botonpimiento.png" class="img-responsive center-block"></a>     
                    </div> 
                </div> 
                <div class="col-md-3 botonesproductos">
                    <div class="col-md-6">
                        <a href="<?php echo Url::home() ?>/productos/pepino?producto=pepino"><img src="/images/botonpepino.png" class="img-responsive center-block"></a>            
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo Url::home() ?>/productos/berenjena?producto=berenjena"><img src="/images/botonberenjena.png" class="img-responsive center-block"></a>            
                    </div>
                </div>
                <div class="col-md-3 botonesproductos">
                    <div class="col-md-6">
                        <a href="<?php echo Url::home() ?>/productos/calabacin?producto=calabacin"><img src="/images/botoncalabacin.png" class="img-responsive center-block"></a>            
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo Url::home() ?>/productos/judia?producto=judia"><img src="/images/botonjudia.png" class="img-responsive center-block"></a>            
                    </div>
                </div>
                <div class="col-md-3 botonesproductos">
                    <div class="col-md-6">
                        <a href="<?php echo Url::home() ?>/productos/melon?producto=melon"><img src="/images/botonmelon.png" class="img-responsive center-block"></a>            
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo Url::home() ?>/productos/sandia?producto=sandia"><img src="/images/botonsandia.png" class="img-responsive center-block"></a>            
                    </div>
                </div>
            </div>              
        </div>

<div class="col-md-12">
    <p class="titulosPaginaPrincipal"><?= Html::encode($this->title) ?></p>
</div>

<div class="span12 bordetop">   
</div>

    <div class="row">    
    <div class="col-md-12">
        <div class="col-md-3">
          <img src="/images/judia.png" class="img-responsive">  
        </div>
        <div class="col-md-1 paddingTop">
            <?php echo "<a id='flechaIzquierda' href='".Url::home()."/productos/judia/?fecha=".$fecha -> sub(new \DateInterval('P1D'))-> format('Y-m-d')."' value='".$fecha -> format('Y-m-d')."'><img src='/images/flechaIzquierda.png' /></a>"; ?>
        </div>
        <div class="col-md-6 paddingTop">
            <p class="titulosProductos">Datos a mostrar: <?php echo $fecha-> add(new \DateInterval('P1D')) -> format('d-m-Y'); ?></p>
        </div>
        <div class='col-md-1 paddingTop'>
            <?php echo "<a id='flechaDerecha' href='".Url::home()."/productos/judia/?fecha=". $fecha -> add(new \DateInterval('P1D'))-> format('Y-m-d')."' value='".$fecha -> format('Y-m-d')."'><img src='/images/flechaDerecha.png' /></a>"; ?>
        </div>
    </div>
    </div>

    <div class="row-fluid margintop">
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li role="tablero" class="active">
                <a id="enlaceOrigen" href="#origen" role="tab" data-toggle="tab">Precios en Origen</a>
            </li>
            <li role="tablero">
                <a id="enlaceMayoristas" href="#mayoristas" role="tab" data-toggle="tab">Precios en Mayoristas</a>
            </li>
            <li role="tablero">
                <a id="enlaceSupermercados" href="#supermercados" role="tab" data-toggle="tab">Precios en Supermercados</a>
            </li>            
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="origen">
                <div class="row margintop">
                   <div class="span12">
                       <div class="col-md-12">
                           <p class="titulosProductos">Precios en Origen</p>
                           <?php
                                if (isset($origenfechaultima[0]['fecha'])) {
                                    $date = new DateTime($origenfechaultima[0]['fecha']);                                    
                                    echo '<p class="fechaProductos">Últimos datos disponibles a: '.$date->format('d-m-Y').'</p>';
                                }
                           ?>
                       </div>
                   </div>
               </div>
               <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($origenfecha[0]['producto'])) {
                                    echo '<div class="col-md-6" id="chart_origen_jhelda" style="width: 550px; height: 200px;"></div>';
                                    echo '<div class="col-md-6" id="chart_origen_jperona" style="width: 550px; height: 200px;"></div>';
                                } else {
                                    echo '<div class="col-md-12"><p align="center">Aun no se han generado datos para este día.</p></div>';
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($origenfecha[0]['producto'])) {
                                    echo '<div class="col-md-6" id="chart_origen_jstrike" style="width: 550px; height: 200px;"></div>';
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                    <div class="span12">   
                        <?php
                                if (isset($origenfecha[0]['producto'])) { ?>
                        <div class="table-responsive">                            
                            <table class="table-condensed">
                                <thead>
                                    <tr bgcolor="#89bcca">
                                        <th class="thtablaproductos">Producto</th>
                                        <th class="thtablaproductos">Última Semana(€/kg</th>
                                        <th class="thtablaproductos">Penúltima Semana(€/kg)</th>
                                        <th class="thtablaproductos">Misma Semana Campaña Anterior(€/kg)</th>
                                        <th class="thtablaproductos">Variación Última Semana  Semana Anterior</th>
                                        <th class="thtablaproductos">Variación Última Semana  Misma Semana Campaña Anterior</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td align="center">Judía Helda</td>
                                        <td align="center">
                                            <?php
                                            $fechaPrecio = 0;
                                            $semanaPrecio = 0;
                                            $yearPrecio = 0;
                                                                                       
                                            for ($x = 0; $x < count($origenfecha); $x++) {
                                                if ($origenfecha[$x]['cod_producto'] == 14) {
                                                    echo "" . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
                                                    $fechaPrecio = sprintf("%.2f", round($origenfecha[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php                                        
                                            for ($x = 0; $x < count($origensemana); $x++) {
                                                if ($origensemana[$x]['cod_producto'] == 14) {
                                                    echo "" . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
                                                    $semanaPrecio = sprintf("%.2f", round($origensemana[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            for ($x = 0; $x < count($origenyear); $x++) {
                                                if ($origenyear[$x]['cod_producto'] == 14) {
                                                    echo "" . sprintf("%.2f", round($origenyear[$x]['precio'], 2)) . "";
                                                    $yearPrecio=sprintf("%.2f", round($origenyear[$x]['precio'], 2));
                                                }
                                            }
                                            ?>  
                                        </td>                                        
                                        <td align="center"><?php if($fechaPrecio==0 or $semanaPrecio==0){echo "";}else if($fechaPrecio>$semanaPrecio){echo "<img class='flechas' src='/images/flechaverde.png'>";}else if($fechaPrecio<$semanaPrecio){echo "<img class='flechas' src='/images/flecharoja.png'>";}else{echo "<img class='flechas' src='/images/igual.png'>";} ?></td>
                                        <td align="center"><?php if($fechaPrecio==0 or $yearPrecio==0){echo "";}else if($fechaPrecio>$yearPrecio){echo "<img class='flechas' src='/images/flechaverde.png'>";}else if($fechaPrecio<$yearPrecio){echo "<img class='flechas' src='/images/flecharoja.png'>";}else{echo "<img class='flechas' src='/images/igual.png'>";} ?></td>
                                    </tr>
                                    <tr bgcolor="#e3eff2">
                                        <td align="center">Judía Perona</td>
                                        <td align="center">
                                            <?php
                                            $fechaPrecio = 0;
                                            $semanaPrecio = 0;
                                            $yearPrecio = 0;
                                                                                       
                                            for ($x = 0; $x < count($origenfecha); $x++) {
                                                if ($origenfecha[$x]['cod_producto'] == 37) {
                                                    echo "" . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
                                                    $fechaPrecio = sprintf("%.2f", round($origenfecha[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php                                        
                                            for ($x = 0; $x < count($origensemana); $x++) {
                                                if ($origensemana[$x]['cod_producto'] == 37) {
                                                    echo "" . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
                                                    $semanaPrecio = sprintf("%.2f", round($origensemana[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            for ($x = 0; $x < count($origenyear); $x++) {
                                                if ($origenyear[$x]['cod_producto'] == 37) {
                                                    echo "" . sprintf("%.2f", round($origenyear[$x]['precio'], 2)) . "";
                                                    $yearPrecio=sprintf("%.2f", round($origenyear[$x]['precio'], 2));
                                                }
                                            }
                                            ?>  
                                        </td>                                        
                                        <td align="center"><?php if($fechaPrecio==0 or $semanaPrecio==0){echo "";}else if($fechaPrecio>$semanaPrecio){echo "<img class='flechas' src='/images/flechaverde.png'>";}else if($fechaPrecio<$semanaPrecio){echo "<img class='flechas' src='/images/flecharoja.png'>";}else{echo "<img class='flechas' src='/images/igual.png'>";} ?></td>
                                        <td align="center"><?php if($fechaPrecio==0 or $yearPrecio==0){echo "";}else if($fechaPrecio>$yearPrecio){echo "<img class='flechas' src='/images/flechaverde.png'>";}else if($fechaPrecio<$yearPrecio){echo "<img class='flechas' src='/images/flecharoja.png'>";}else{echo "<img class='flechas' src='/images/igual.png'>";} ?></td>
                                    </tr>
                                    <tr>
                                        <td align="center">Judía Strike</td>
                                        <td align="center">
                                            <?php
                                            $fechaPrecio = 0;
                                            $semanaPrecio = 0;
                                            $yearPrecio = 0;
                                                                                       
                                            for ($x = 0; $x < count($origenfecha); $x++) {
                                                if ($origenfecha[$x]['cod_producto'] == 45) {
                                                    echo "" . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
                                                    $fechaPrecio = sprintf("%.2f", round($origenfecha[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php                                        
                                            for ($x = 0; $x < count($origensemana); $x++) {
                                                if ($origensemana[$x]['cod_producto'] == 45) {
                                                    echo "" . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
                                                    $semanaPrecio = sprintf("%.2f", round($origensemana[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            for ($x = 0; $x < count($origenyear); $x++) {
                                                if ($origenyear[$x]['cod_producto'] == 45) {
                                                    echo "" . sprintf("%.2f", round($origenyear[$x]['precio'], 2)) . "";
                                                    $yearPrecio=sprintf("%.2f", round($origenyear[$x]['precio'], 2));
                                                }
                                            }
                                            ?>  
                                        </td>                                        
                                        <td align="center"><?php if($fechaPrecio==0 or $semanaPrecio==0){echo "";}else if($fechaPrecio>$semanaPrecio){echo "<img class='flechas' src='/images/flechaverde.png'>";}else if($fechaPrecio<$semanaPrecio){echo "<img class='flechas' src='/images/flecharoja.png'>";}else{echo "<img class='flechas' src='/images/igual.png'>";} ?></td>
                                        <td align="center"><?php if($fechaPrecio==0 or $yearPrecio==0){echo "";}else if($fechaPrecio>$yearPrecio){echo "<img class='flechas' src='/images/flechaverde.png'>";}else if($fechaPrecio<$yearPrecio){echo "<img class='flechas' src='/images/flecharoja.png'>";}else{echo "<img class='flechas' src='/images/igual.png'>";} ?></td>
                                    </tr>                                    
                                </tbody>
                            </table>
                            </div>
                         <?php } ?>  
                        <!--<div class="col-md-2 col-md-offset-5">
                            <?php //echo " <a class='btn btn-info' role='button' target='_blank' href='" . Url::home() . "/productos/buscarproducto?informes=Origen-Cotizaciones-Alhondigas-Diario&fecha=" . $fecha->format('Y-m-d') . "' value='" . $fecha->format('Y-m-d') . "'>Ver Informe de Datos</a>"; ?>
                        </div>-->
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="mayoristas">
                <div class="row margintop">
                   <div class="span12">
                       <div class="col-md-12">
                           <p class="titulosProductos">Precios en mayoristas</p>
                           <?php
                                if (isset($mayoristastabla[0]['producto'])) {
                                    $date = new DateTime($mayoristastabla[0]['fecha']);                                    
                                    echo '<p class="fechaProductos">Últimos datos disponibles a: '.$date->format('d-m-Y').'</p>';
                                }
                           ?>
                       </div>
                   </div>
               </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($mayoristasfechaesp[0]['producto']) || isset($mayoristasfechaale[0]['producto']) || isset($mayoristasfechafra[0]['producto']) || isset($mayoristasfecharei[0]['producto'])) {
                                    echo '<div class="col-md-6" id="chart_mayoristas_judiahelda" style="width: 550px; height: 200px;"></div>';
                                    echo '<div class="col-md-6" id="chart_mayoristas_judiagarrafon" style="width: 550px; height: 200px;"></div>';
                                } else {
                                    echo '<div class="col-md-12"><p align="center">Aun no se han generado datos para este día.</p></div>';
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($mayoristasfechaesp[0]['producto']) || isset($mayoristasfechaale[0]['producto']) || isset($mayoristasfechafra[0]['producto']) || isset($mayoristasfecharei[0]['producto'])) {
                                    echo '<div class="col-md-6" id="chart_mayoristas_judiasin" style="width: 550px; height: 200px;"></div>';
                                    
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                   <div class="span12">
                       <div class="col-md-12">
                           <p class="titulosProductos">Precios en mayoristas según origen</p>
                           <?php
                                if (isset($mayoristastabla[0]['producto'])) {
                                    $date = new DateTime($mayoristastabla[0]['fecha']);                                    
                                    echo '<p class="fechaProductos">Últimos datos disponibles a: '.$date->format('d-m-Y').'</p>';
                                }
                           ?>
                       </div>
                   </div>
               </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($mayoristasfechaorigen[0]['producto'])) {
                                    echo '<div class="col-md-6" id="chart_mayoristas_origen_judiahelda" style="width: 550px; height: 200px;"></div>';     
                                    echo '<div class="col-md-12" id="chart_mayoristas_origen_judiagarrafon" style="width: 550px; height: 200px;"></div>';                                     
                                } else {
                                    echo '<div class="col-md-12"><p align="center">Aun no se han generado datos para este día.</p></div>';
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($mayoristasfechaorigen[0]['producto'])) {
                                    echo '<div class="col-md-6" id="chart_mayoristas_origen_judiasin" style="width: 550px; height: 200px;"></div>';     
                                                                
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                   <div class="span12">
                       <div class="col-md-12">
                           <p class="titulosProductos">Datos en detalle</p>
                       </div>
                   </div>
               </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <div id="table_mayoristas"></div>
                            </table></div>
                    </div>                        
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="supermercados">
                <div class="row margintop">
                   <div class="span12">
                       <div class="col-md-12">
                           <p class="titulosProductos">Precios en supermercados</p>
                           <?php
                                if (isset($supermercadotabla[0]['producto'])) {
                                    $date = new DateTime($supermercadotabla[0]['fecha']);                                    
                                    echo '<p class="fechaProductos">Últimos datos disponibles a: '.$date->format('d-m-Y').'</p>';
                                }
                           ?>
                       </div>
                   </div>
               </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($supermercadofechaesp[0]['producto']) || isset($supermercadofechaale[0]['producto']) || isset($supermercadofechafra[0]['producto']) || isset($supermercadofecharei[0]['producto'])){
                                    echo '<div class="col-md-6" id="chart_supermercado_judiahelda" style="width: 550px; height: 200px;"></div>';
                                    echo '<div class="col-md-6" id="chart_supermercado_judiaperona" style="width: 550px; height: 200px;"></div>';
                                } else {
                                    echo '<div class="col-md-12"><p align="center">Aun no se han generado datos para este día.</p></div>';
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($supermercadofechaesp[0]['producto']) || isset($supermercadofechaale[0]['producto']) || isset($supermercadofechafra[0]['producto']) || isset($supermercadofecharei[0]['producto'])){
                                   echo '<div class="col-md-6" id="chart_supermercado_judiastrike" style="width: 550px; height: 200px;"></div>';
                                    echo '<div class="col-md-6" id="chart_supermercado_judiasin" style="width: 550px; height: 200px;"></div>';                                    
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                   <div class="span12">
                       <div class="col-md-12">
                           <p class="titulosProductos">Precios en supermercados según origen</p>
                           <?php
                                if (isset($supermercadotabla[0]['producto'])) {
                                    $date = new DateTime($supermercadotabla[0]['fecha']);                                    
                                    echo '<p class="fechaProductos">Últimos datos disponibles a: '.$date->format('d-m-Y').'</p>';
                                }
                           ?>
                       </div>
                   </div>
               </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($supermercadofechaorigen[0]['producto'])) {
                                    echo '<div class="col-md-6" id="chart_supermercado_origen_judiahelda" style="width: 550px; height: 200px;"></div>';     
                                    echo '<div class="col-md-12" id="chart_supermercado_origen_judiaperona" style="width: 550px; height: 200px;"></div>';                                     
                                } else {
                                    echo '<div class="col-md-12"><p align="center">Aun no se han generado datos para este día.</p></div>';
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                if (isset($supermercadofechaorigen[0]['producto'])) {
                                    echo '<div class="col-md-12" id="chart_supermercado_origen_judiastrike" style="width: 550px; height: 200px;"></div>';          
                                    echo '<div class="col-md-6" id="chart_supermercado_origen_judiasin" style="width: 550px; height: 200px;"></div>';  
                                }
                                ?>
                            </table></div>
                    </div>                        
                </div>                
                <div class="row margintop">
                   <div class="span12">
                       <div class="col-md-12">
                           <p class="titulosProductos">Datos en detalle</p>
                       </div>
                   </div>
               </div>
                <div class="row margintop">
                    <div class="span12">
                        <div class="table-responsive">
                            <table class="table">
                                <div id="table_supermercado"></div>
                            </table></div>
                    </div>                        
                </div>
            </div>            
        </div>
    </div>
</div>
    

<div class="span12 bordebotton">
</div>
<script type="text/javascript">
//$( "#enlaceOrigen" ).click(function() {
  
 // setTimeout("document.getElementById('enlaceOrigen').click()",1);
//});
$( "#enlaceMayoristas" ).click(function() {
    document.getElementById('enlaceMayoristas').click();
    //setTimeout("document.getElementById('enlaceResultado').click()",1);
  //mayoristas
  drawJudiaHeldaMay();
  drawJudiaGarrafonMay();
  drawJudiaSinMay();
  
  //mayoristas segun origen
  drawJudiaHeldaMayOr();
  drawJudiaGarrafonMayOr();
  drawJudiaSinMayOr();
  
});
$( "#enlaceSupermercados" ).click(function() {
   document.getElementById('enlaceSupermercados').click();
    //setTimeout("document.getElementById('enlaceResultado').click()",1);
  //supermercados
  drawJudiaHeldaSup();
  drawJudiaPeronaSup();  
  drawJudiaStrikeSup();
  drawJudiaSinSup();
  //supermercados segun origen
  drawJudiaHeldaSupOr();
  drawJudiaPeronaSupOr();
  drawJudiaStrikeSupOr();
  drawJudiaSinSupOr();
  //setTimeout("document.getElementById('enlaceSupermercados').click()",1);
});
</script>