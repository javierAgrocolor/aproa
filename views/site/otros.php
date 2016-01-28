<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Otros Informes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

     <div>     
        
        <?php
        foreach ($tablaOtros as $row) {
            //exit($row);
            echo "<a target='_blank' href='/aproa/web/index.php/site/abrirpdf?informes=". $row['boletin'] ."'>".$row['tipo']." (".$row['fecha'].")</a>
                      ";
        }
        ?>     
                
    </div>
    
</div>
