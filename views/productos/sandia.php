<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Sandía';
$this->params['breadcrumbs'][] = $this->title;

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- Graficos origen -->
<?php if (isset($origenfecha[0]['producto'])) { ?>    
    
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart','table']});
        google.charts.setOnLoadCallback(drawSandiaNegraSinOri);

        function drawSandiaNegraSinOri() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
    <?php
    //controlar fecha
    $valido = false;
    for ($x = 0; $x < count($origenfecha); $x++) {
        if ($origenfecha[$x]['cod_producto'] == 15) {
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
        if ($origensemana[$x]['cod_producto'] == 15) {
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
        if ($origenyear[$x]['cod_producto'] == 15) {
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
                title: 'Sandía Negra Sin - Precios en origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: 'ALMERÍA'},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_origen_snegrasin'));
            chart.draw(view, options);
        }

        google.charts.setOnLoadCallback(drawSandiaBlancaSinOri);

        function drawSandiaBlancaSinOri() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
    <?php
    //controlar fecha
    $valido = false;
    for ($x = 0; $x < count($origenfecha); $x++) {
        if ($origenfecha[$x]['cod_producto'] == 16) {
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
        if ($origensemana[$x]['cod_producto'] == 16) {
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
        if ($origenyear[$x]['cod_producto'] == 16) {
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
                title: 'Sandía Blanca Sin - Precios en origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: 'ALMERÍA'},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_origen_sblancasin'));
            chart.draw(view, options);
        }

        google.charts.setOnLoadCallback(drawSandiaNegraConOri);

        function drawSandiaNegraConOri() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
    <?php
    //controlar fecha
    $valido = false;
    for ($x = 0; $x < count($origenfecha); $x++) {
        if ($origenfecha[$x]['cod_producto'] == 17) {
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
        if ($origensemana[$x]['cod_producto'] == 17) {
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
        if ($origenyear[$x]['cod_producto'] == 17) {
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
                title: 'Sandía Negra Con - Precios en origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: 'ALMERÍA'},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_origen_snegracon'));
            chart.draw(view, options);
        }

    </script>
<?php } ?>
    

    <!-- Graficos mayoristas -->
<?php if (isset($mayoristasfechaesp[0]['producto']) || isset($mayoristasfechaale[0]['producto']) || isset($mayoristasfechafra[0]['producto']) || isset($mayoristasfecharei[0]['producto'])) { ?>
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart','table']});
        google.charts.setOnLoadCallback(drawSandiaMay);

        function drawSandiaMay() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($mayoristasfechaesp); $x++) {
        if ($mayoristasfechaesp[$x]['cod_producto'] == 16) {
            echo "['España'," . sprintf("%.2f", round($mayoristasfechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0"; */$espana = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanaesp); $x++) {
        if ($mayoristassemanaesp[$x]['cod_producto'] == 16 && $espana == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearesp); $x++) {
        if ($mayoristasyearesp[$x]['cod_producto'] == 16 && $espana == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($mayoristasfechaale); $x++) {
        if ($mayoristasfechaale[$x]['cod_producto'] == 16) {
            echo "['Alemania'," . sprintf("%.2f", round($mayoristasfechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Alemania',0";*/ $alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanaale); $x++) {
        if ($mayoristassemanaale[$x]['cod_producto'] == 16 && $alemania == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearale); $x++) {
        if ($mayoristasyearale[$x]['cod_producto'] == 16 && $alemania == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($mayoristasfechafra); $x++) {
        if ($mayoristasfechafra[$x]['cod_producto'] == 16) {
            echo "['Francia'," . sprintf("%.2f", round($mayoristasfechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0"; */$francia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanafra); $x++) {
        if ($mayoristassemanafra[$x]['cod_producto'] == 16 && $francia == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearfra); $x++) {
        if ($mayoristasyearfra[$x]['cod_producto'] == 16 && $francia == true) {
            echo "," . sprintf("%.2f", round($mayoristasyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($mayoristasfecharei); $x++) {
        if ($mayoristasfecharei[$x]['cod_producto'] == 16) {
            echo "['Reino Unido'," . sprintf("%.2f", round($mayoristasfecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Reino Unido',0";*/$reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($mayoristassemanarei); $x++) {
        if ($mayoristassemanarei[$x]['cod_producto'] == 16 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($mayoristassemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($mayoristasyearrei); $x++) {
        if ($mayoristasyearrei[$x]['cod_producto'] == 16 && $reinounido == true) {
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
                title: 'Sandía Blanca Sin - Precios en mayoristas(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_mayoristas_sandia'));
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
        google.charts.setOnLoadCallback(drawSandiaMayOr);

        function drawSandiaMayOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
                <?php
                    $datos=false;
                    foreach ($mayoristasfechaorigen as $row) {
                        if($row['cod_producto']==16){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($mayoristassemanaorigen as $row2) {
                                 if($row2['cod_producto']==16 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($mayoristasyearorigen as $row3) {
                                 if($row3['cod_producto']==16 && $row3['cod_origen']==$origen){
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
                title: 'Sandía Blanca Sin - Precios en mayoristas segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_mayoristas_origen_sandia'));
            chart.draw(view, options);
        }
                
    </script>
    
    <?php }?>
            
<!-- Graficos supermercado -->
<?php if (isset($supermercadofechaesp[0]['producto']) || isset($supermercadofechaale[0]['producto']) || isset($supermercadofechafra[0]['producto']) || isset($supermercadofecharei[0]['producto'])) { ?>
    <script type="text/javascript">

        google.charts.load('current', {'packages': ['corechart','table']});
        google.charts.setOnLoadCallback(drawSandiaBSinSup);

        function drawSandiaBSinSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 16) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['España',0"; */$espana = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 16 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 16 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 16) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Alemania',0";*/$alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 16 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 16 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 16) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0";*/$francia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 16 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 16 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 16) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Polonia',0";*/$polonia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 16 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 16 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 16) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Reino Unido',0";*/$reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 16 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 16 && $reinounido == true) {
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
                title: 'Sandía Blanca Sin - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_sandiabsin'));
            chart.draw(view, options);
        }
   
        google.charts.setOnLoadCallback(drawSandiaAmarillaSup);

        function drawSandiaAmarillaSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 52) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0";*/$espana = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 52 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 52 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 52) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Alemania',0";*/$alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 52 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 52 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 52) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0"; */$francia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 52 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 52 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 52) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Polonia',0"; */ $polonia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 52 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 52 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 52) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Reino Unido',0";*/$reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 52 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 52 && $reinounido == true) {
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
                title: 'Sandía Amarilla - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_sandiaamarilla'));
            chart.draw(view, options);
        }
           
        google.charts.setOnLoadCallback(drawSandiaFashionSup);

        function drawSandiaFashionSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 53) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0";*/ $espana = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 53 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 53 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 53) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Alemania',0";*/$alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 53 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 53 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 53) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Francia',0"; */$francia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 53 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 53 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 53) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Polonia',0"; */$polonia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 53 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 53 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 53) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Reino Unido',0"; */ $reinounido = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 53 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 53 && $reinounido == true) {
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
                title: 'Sandía Fashion - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_sandiafashion'));
            chart.draw(view, options);
        }    
        
        google.charts.setOnLoadCallback(drawSandiaNConSup);

        function drawSandiaNConSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 17) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0"; */$espana = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 17 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 17 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 17) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Alemania',0"; */ $alemania = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 17 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 17 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 17) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0"; */ $francia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 17 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 17 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 17) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Polonia',0"; */$polonia = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 17 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 17 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 17) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {      /*  echo "['Reino Unido',0";*/$reinounido = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 17 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 17 && $reinounido == true) {
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
                title: 'Sandía Negra Con - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_sandiancon'));
            chart.draw(view, options);
        } 

        google.charts.setOnLoadCallback(drawSandiaNSinSup);

        function drawSandiaNSinSup() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
           <?php 
//ESPAÑA - controlar fecha
    $valido = false;$espana = true;
    for ($x = 0; $x < count($supermercadofechaesp); $x++) {
        if ($supermercadofechaesp[$x]['cod_producto'] == 15) {
            echo "['España'," . sprintf("%.2f", round($supermercadofechaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['España',0";*/ $espana = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaesp); $x++) {
        if ($supermercadosemanaesp[$x]['cod_producto'] == 15 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaesp[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearesp); $x++) {
        if ($supermercadoyearesp[$x]['cod_producto'] == 15 && $espana == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearesp[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $espana == true) {        echo ",0],";    }
    
//ALEMANIA - controlar fecha
    $valido = false;$alemania = true;
    for ($x = 0; $x < count($supermercadofechaale); $x++) {
        if ($supermercadofechaale[$x]['cod_producto'] == 15) {
            echo "['Alemania'," . sprintf("%.2f", round($supermercadofechaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {      /*  echo "['Alemania',0";*/ $alemania = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanaale); $x++) {
        if ($supermercadosemanaale[$x]['cod_producto'] == 15 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanaale[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearale); $x++) {
        if ($supermercadoyearale[$x]['cod_producto'] == 15 && $alemania == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearale[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $alemania == true) {        echo ",0],";    }
    
    //FRANCIA - controlar fecha
    $valido = false;$francia = true;
    for ($x = 0; $x < count($supermercadofechafra); $x++) {
        if ($supermercadofechafra[$x]['cod_producto'] == 15) {
            echo "['Francia'," . sprintf("%.2f", round($supermercadofechafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Francia',0";*/$francia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanafra); $x++) {
        if ($supermercadosemanafra[$x]['cod_producto'] == 15 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanafra[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearfra); $x++) {
        if ($supermercadoyearfra[$x]['cod_producto'] == 15 && $francia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearfra[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $francia == true) {        echo ",0],";    }
    
    //POLONIA - controlar fecha
    $valido = false;$polonia = true;
    for ($x = 0; $x < count($supermercadofechapol); $x++) {
        if ($supermercadofechapol[$x]['cod_producto'] == 15) {
            echo "['Polonia'," . sprintf("%.2f", round($supermercadofechapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {        /*echo "['Polonia',0";*/$polonia = false;    }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanapol); $x++) {
        if ($supermercadosemanapol[$x]['cod_producto'] == 15 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanapol[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearpol); $x++) {
        if ($supermercadoyearpol[$x]['cod_producto'] == 15 && $polonia == true) {
            echo "," . sprintf("%.2f", round($supermercadoyearpol[$x]['precio'], 2)) . "],";
            $valido = true;
        }    }
    if ($valido == false && $polonia == true) {        echo ",0],";    }
    
    //REINO UNIDO - controlar fecha
    $valido = false;$reinounido = true;
    for ($x = 0; $x < count($supermercadofecharei); $x++) {
        if ($supermercadofecharei[$x]['cod_producto'] == 15) {
            echo "['Reino Unido'," . sprintf("%.2f", round($supermercadofecharei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false) {       /* echo "['Reino Unido',0"; */$reinounido = false;   }
//controlar semana
    $valido = false;
    for ($x = 0; $x < count($supermercadosemanarei); $x++) {
        if ($supermercadosemanarei[$x]['cod_producto'] == 15 && $reinounido == true) {
            echo "," . sprintf("%.2f", round($supermercadosemanarei[$x]['precio'], 2)) . "";
            $valido = true;
        }    }
    if ($valido == false && $reinounido == true) {        echo ",0";    }
//controlar año
    $valido = false;
    for ($x = 0; $x < count($supermercadoyearrei); $x++) {
        if ($supermercadoyearrei[$x]['cod_producto'] == 15 && $reinounido == true) {
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
                title: 'Sandía Negra Sin - Precios en supermercados(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_sandiansin'));
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
        google.charts.setOnLoadCallback(drawSandiaBSinSupOr);

        function drawSandiaBSinSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==16){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==16 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==16 && $row3['cod_origen']==$origen){
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
                title: 'Sandía Blanca Sin - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_sandiabsin'));
            chart.draw(view, options);
        }
        
        google.charts.setOnLoadCallback(drawSandiaAmarillaSupOr);

        function drawSandiaAmarillaSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==52){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==52 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==52 && $row3['cod_origen']==$origen){
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
                title: 'Sandía Amarilla - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_sandiaamarilla'));
            chart.draw(view, options);
        }
                      
        google.charts.setOnLoadCallback(drawSandiaFashionSupOr);

        function drawSandiaFashionSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],               
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==53){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==53 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==53 && $row3['cod_origen']==$origen){
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
                title: 'Sandía Fashion - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_sandiafashion'));
            chart.draw(view, options);
        }
        
        google.charts.setOnLoadCallback(drawSandiaNConSupOr);

        function drawSandiaNConSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],               
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==17){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==17 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==17 && $row3['cod_origen']==$origen){
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
                title: 'Sandía Negra Con - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_sandiancon'));
            chart.draw(view, options);
        }
        
        google.charts.setOnLoadCallback(drawSandiaNSinSupOr);

        function drawSandiaNSinSupOr() {
            // Some raw data (not necessarily accurate)
            var data = google.visualization.arrayToDataTable([
                ['', 'Última semana', 'Semana anterior', 'Última semana campaña pasada'],               
                <?php
                    $datos=false;
                    foreach ($supermercadofechaorigen as $row) {
                        if($row['cod_producto']==15){
                            $datos=true;
                            echo '["'.$row['origen'].'",'.sprintf("%.2f", round($row['precio'], 2)).'';
                            $origen = $row['cod_origen'];
                            $valor = false;
                            foreach ($supermercadosemanaorigen as $row2) {
                                 if($row2['cod_producto']==15 && $row2['cod_origen']==$origen){
                                     echo ','.sprintf("%.2f", round($row2['precio'], 2)).'';
                                     $valor = true;
                                 }                            }
                            if($valor==false){echo ',0';}
                            $valor = false;
                            foreach ($supermercadoyearorigen as $row3) {
                                 if($row3['cod_producto']==15 && $row3['cod_origen']==$origen){
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
                title: 'Sandía Negra Sin - Precios en supermercados segun origen(€/kg)',
                vAxis: {title: 'Precio'},
                hAxis: {title: ''},
                colors: ["#b9961b", "#ffc700", "#f9d969"],
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_supermercado_origen_sandiansin'));
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
                    <div class="col-md-12">
                    <div class="col-md-3">
                        <img src="/images/sandia.png" class="img-responsive">  
                    </div>
                    <div class="col-md-1 paddingTop">
                        <?php echo "<a id='flechaIzquierda' href='" . Url::home() . "/productos/sandia/?fechaorigen=" . $fechaorigen->sub(new \DateInterval('P1D'))->format('Y-m-d') . "' value='" . $fechaorigen->format('Y-m-d') . "'><img src='/images/flechaIzquierda.png' /></a>"; ?>
                    </div>
                    <div class="col-md-6 paddingTop">
                        <p class="titulosProductos">Datos a mostrar: <?php echo $fechaorigen->add(new \DateInterval('P1D'))->format('d-m-Y'); ?></p>
                    </div>
                    <div class='col-md-1 paddingTop'>
                        <?php echo "<a id='flechaDerecha' href='" . Url::home() . "/productos/sandia/?fechaorigen=" . $fechaorigen->add(new \DateInterval('P1D'))->format('Y-m-d') . "' value='" . $fechaorigen->format('Y-m-d') . "'><img src='/images/flechaDerecha.png' /></a>"; ?>
                    </div>
                    </div>
                </div>
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
                                    echo '<div class="col-md-6" id="chart_origen_sblancasin" style="width: 550px; height: 200px;"></div>';
                                    echo '<div class="col-md-6" id="chart_origen_snegrasin" style="width: 550px; height: 200px;"></div>';
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
                                    echo '<div class="col-md-6" id="chart_origen_snegracon" style="width: 550px; height: 200px;"></div>';
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
                                    <tr bgcolor="#fbe289">
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
                                        <td align="center">Sandía Blanca Sin</td>
                                        <td align="center">
                                            <?php
                                            $fechaPrecio = 0;
                                            $semanaPrecio = 0;
                                            $yearPrecio = 0;
                                                                                       
                                            for ($x = 0; $x < count($origenfecha); $x++) {
                                                if ($origenfecha[$x]['cod_producto'] == 16) {
                                                    echo "" . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
                                                    $fechaPrecio = sprintf("%.2f", round($origenfecha[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php                                        
                                            for ($x = 0; $x < count($origensemana); $x++) {
                                                if ($origensemana[$x]['cod_producto'] == 16) {
                                                    echo "" . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
                                                    $semanaPrecio = sprintf("%.2f", round($origensemana[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            for ($x = 0; $x < count($origenyear); $x++) {
                                                if ($origenyear[$x]['cod_producto'] == 16) {
                                                    echo "" . sprintf("%.2f", round($origenyear[$x]['precio'], 2)) . "";
                                                    $yearPrecio=sprintf("%.2f", round($origenyear[$x]['precio'], 2));
                                                }
                                            }
                                            ?>  
                                        </td>                                        
                                        <td align="center"><?php if($fechaPrecio==0 or $semanaPrecio==0){echo "";}else if($fechaPrecio>$semanaPrecio){echo "<img class='flechas' src='/images/flechaverde.png'>";}else if($fechaPrecio<$semanaPrecio){echo "<img class='flechas' src='/images/flecharoja.png'>";}else{echo "<img class='flechas' src='/images/igual.png'>";} ?></td>
                                        <td align="center"><?php if($fechaPrecio==0 or $yearPrecio==0){echo "";}else if($fechaPrecio>$yearPrecio){echo "<img class='flechas' src='/images/flechaverde.png'>";}else if($fechaPrecio<$yearPrecio){echo "<img class='flechas' src='/images/flecharoja.png'>";}else{echo "<img class='flechas' src='/images/igual.png'>";} ?></td>
                                    </tr>
                                    <tr bgcolor="#fdfde0">
                                        <td align="center">Sandía Negra Sin</td>
                                        <td align="center">
                                            <?php
                                            $fechaPrecio = 0;
                                            $semanaPrecio = 0;
                                            $yearPrecio = 0;
                                                                                       
                                            for ($x = 0; $x < count($origenfecha); $x++) {
                                                if ($origenfecha[$x]['cod_producto'] == 15) {
                                                    echo "" . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
                                                    $fechaPrecio = sprintf("%.2f", round($origenfecha[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php                                        
                                            for ($x = 0; $x < count($origensemana); $x++) {
                                                if ($origensemana[$x]['cod_producto'] == 15) {
                                                    echo "" . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
                                                    $semanaPrecio = sprintf("%.2f", round($origensemana[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            for ($x = 0; $x < count($origenyear); $x++) {
                                                if ($origenyear[$x]['cod_producto'] == 15) {
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
                                        <td align="center">Sandía Negra Con</td>
                                        <td align="center">
                                            <?php
                                            $fechaPrecio = 0;
                                            $semanaPrecio = 0;
                                            $yearPrecio = 0;
                                                                                       
                                            for ($x = 0; $x < count($origenfecha); $x++) {
                                                if ($origenfecha[$x]['cod_producto'] == 17) {
                                                    echo "" . sprintf("%.2f", round($origenfecha[$x]['precio'], 2)) . "";
                                                    $fechaPrecio = sprintf("%.2f", round($origenfecha[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php                                        
                                            for ($x = 0; $x < count($origensemana); $x++) {
                                                if ($origensemana[$x]['cod_producto'] == 17) {
                                                    echo "" . sprintf("%.2f", round($origensemana[$x]['precio'], 2)) . "";
                                                    $semanaPrecio = sprintf("%.2f", round($origensemana[$x]['precio'], 2));
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <?php
                                            for ($x = 0; $x < count($origenyear); $x++) {
                                                if ($origenyear[$x]['cod_producto'] == 17) {
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
                            <?php //echo " <a class='btn btn-warning' role='button' target='_blank' href='" . Url::home() . "/productos/buscarproducto?informes=Origen-Cotizaciones-Alhondigas-Diario&fecha=" . $fecha->format('Y-m-d') . "' value='" . $fecha->format('Y-m-d') . "'>Ver Informe de Datos</a>"; ?>
                        </div>-->
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="mayoristas">
                <div class="row margintop">    
                    <div class="col-md-12">
                    <div class="col-md-3">
                        <img src="/images/sandia.png" class="img-responsive">  
                    </div>
                    <div class="col-md-1 paddingTop">
                        <?php echo "<a id='flechaIzquierda' href='" . Url::home() . "/productos/sandia/?fechamayorista=" . $fechamayorista->sub(new \DateInterval('P1D'))->format('Y-m-d') . "' value='" . $fechamayorista->format('Y-m-d') . "'><img src='/images/flechaIzquierda.png' /></a>"; ?>
                    </div>
                    <div class="col-md-6 paddingTop">
                        <p class="titulosProductos">Datos a mostrar: <?php echo $fechamayorista->add(new \DateInterval('P1D'))->format('d-m-Y'); ?></p>
                    </div>
                    <div class='col-md-1 paddingTop'>
                        <?php echo "<a id='flechaDerecha' href='" . Url::home() . "/productos/sandia/?fechamayorista=" . $fechamayorista->add(new \DateInterval('P1D'))->format('Y-m-d') . "' value='" . $fechamayorista->format('Y-m-d') . "'><img src='/images/flechaDerecha.png' /></a>"; ?>
                    </div>
                    </div>
                </div>
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
                                    echo '<div class="col-md-6 col-md-offset-1" id="chart_mayoristas_sandia" style="width: 950px; height: 200px;"></div>';
                                } else {
                                    echo '<div class="col-md-12"><p align="center">Aun no se han generado datos para este día.</p></div>';
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
                                    echo '<div class="col-md-6 col-md-offset-1" id="chart_mayoristas_origen_sandia" style="width: 950px; height: 200px;"></div>';                                   
                                } else {
                                    echo '<div class="col-md-12"><p align="center">Aun no se han generado datos para este día.</p></div>';
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
                    <div class="col-md-12">
                    <div class="col-md-3">
                        <img src="/images/sandia.png" class="img-responsive">  
                    </div>
                    <div class="col-md-1 paddingTop">
                        <?php echo "<a id='flechaIzquierda' href='" . Url::home() . "/productos/sandia/?fechasupermercado=" . $fechasupermercado->sub(new \DateInterval('P1D'))->format('Y-m-d') . "' value='" . $fechasupermercado->format('Y-m-d') . "'><img src='/images/flechaIzquierda.png' /></a>"; ?>
                    </div>
                    <div class="col-md-6 paddingTop">
                        <p class="titulosProductos">Datos a mostrar: <?php echo $fechasupermercado->add(new \DateInterval('P1D'))->format('d-m-Y'); ?></p>
                    </div>
                    <div class='col-md-1 paddingTop'>
                        <?php echo "<a id='flechaDerecha' href='" . Url::home() . "/productos/sandia/?fechasupermercado=" . $fechasupermercado->add(new \DateInterval('P1D'))->format('Y-m-d') . "' value='" . $fechasupermercado->format('Y-m-d') . "'><img src='/images/flechaDerecha.png' /></a>"; ?>
                    </div>
                    </div>
                </div>
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
                                    echo '<div class="col-md-6" id="chart_supermercado_sandiabsin" style="width: 550px; height: 200px;"></div>';
                                    echo '<div class="col-md-6" id="chart_supermercado_sandiaamarilla" style="width: 550px; height: 200px;"></div>';
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
                                   echo '<div class="col-md-6" id="chart_supermercado_sandiafashion" style="width: 550px; height: 200px;"></div>';
                                    echo '<div class="col-md-6" id="chart_supermercado_sandiancon" style="width: 550px; height: 200px;"></div>';                                    
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
                                   echo '<div class="col-md-6" id="chart_supermercado_sandiansin" style="width: 550px; height: 200px;"></div>';
                                                                      
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
                                    echo '<div class="col-md-6" id="chart_supermercado_origen_sandiabsin" style="width: 550px; height: 200px;"></div>';     
                                    echo '<div class="col-md-12" id="chart_supermercado_origen_sandiaamarilla" style="width: 550px; height: 200px;"></div>';                                     
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
                                    echo '<div class="col-md-12" id="chart_supermercado_origen_sandiafashion" style="width: 550px; height: 200px;"></div>';          
                                    echo '<div class="col-md-6" id="chart_supermercado_origen_sandiancon" style="width: 550px; height: 200px;"></div>';  
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
                                    echo '<div class="col-md-12" id="chart_supermercado_origen_sandiansin" style="width: 550px; height: 200px;"></div>';          
                                     
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
  drawSandiaMay();
  
  //mayoristas segun origen
  drawSandiaMayOr();
  
});
$( "#enlaceSupermercados" ).click(function() {
  document.getElementById('enlaceSupermercados').click();
    //setTimeout("document.getElementById('enlaceResultado').click()",1);
  //supermercados
  drawSandiaBSinSup();
  drawSandiaAmarillaSup();  
  drawSandiaFashionSup();
  drawSandiaNConSup();
  drawSandiaNSinSup();  
  //supermercados segun origen
  drawSandiaBSinSupOr();
  drawSandiaAmarillaSupOr();
  drawSandiaFashionSupOr();
  drawSandiaNConSupOr();
  drawSandiaNSinSupOr();  
  //setTimeout("document.getElementById('enlaceSupermercados').click()",1);
});
</script>