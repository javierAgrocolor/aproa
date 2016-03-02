<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Boletín Diario';
$this->params['breadcrumbs'][] = $this->title;

$siguiente = $diano+1;
$anterior = $diano-1;
?>
<div>
    <p class="titulosPaginaPrincipal"><?= Html::encode($this->title) ?></p>

    <!-- Paginacion -->
    <div class="col-md-12">
        <div class="span12 contenedores">
            <div class="col-md-12">
            <div class="col-md-1 col-md-offset-4">
            <?php 
            echo"<a class='titulos2' href='boletines?diano=$anterior'><img src='/images/anterior.png' class='img-responsive'/></a>";
            ?>
            </div>
                <div class="col-md-2">
                    <?php 
                    $diaactual=date('z')+1;
            echo"<a class='enlaceDiaActual' href='boletines?diano=$diaactual'>DÍA ACTUAL</a>";
            ?>
                </div>
            <div class="col-md-1">
            <?php
            echo"<a class='titulos2' href='boletines?diano=$siguiente'><img src='/images/siguiente.png' class='img-responsive'/></a>";
            ?>
            </div>
            </div>
            <div class="col-md-10 col-md-offset-1 margintop">
            <?php
            //echo $diano;
            for($x=1;$x<15;$x++){
            if(file_exists('/boletines_correos/img2/2016-'.$diano.'-'.$x.'.jpg')){
                echo"<img src='/boletines_correos/img2/2016-".$diano."-".$x.".jpg' class='img-responsive center-block'/>";
            }
            }
            ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Publi APK -->
        <div class="span12">
            <img src="/images/apkdescarga.png" class="img-responsive center-block">
        </div>
    </div>
</div>
