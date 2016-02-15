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
        <div class="spam12 contenedores">
            <div class="col-md-12">
            <div class="col-md-1 col-md-offset-4">
            <?php 
            echo"<a class='titulos2' href='/aproa/web/index.php/site/boletines?diano=$anterior'><img src='/aproa/images/anterior.png' class='img-responsive'/></a>";
            ?>
            </div>
                <div class="col-md-2">
                    <?php 
                    $diaactual=date('z')+1;
            echo"<a class='enlaceDiaActual' href='/aproa/web/index.php/site/boletines?diano=$diaactual'>DÍA ACTUAL</a>";
            ?>
                </div>
            <div class="col-md-1">
            <?php
            echo"<a class='titulos2' href='/aproa/web/index.php/site/boletines?diano=$siguiente'><img src='/aproa/images/siguiente.png' class='img-responsive'/></a>";
            ?>
            </div>
            </div>
            <div class="col-md-10 col-md-offset-1 margintop">
            <?php
            //echo $diano;
            for($x=1;$x<15;$x++){
            if(file_exists('../correos/img2/2016-'.$diano.'-'.$x.'.jpg')){
                echo"<img src='/aproa/correos/img2/2016-".$diano."-".$x.".jpg' class='img-responsive center-block'/>";
            }
            }
            ?>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Publi APK -->
        <div class="span12">
            <img src="/aproa/images/apkdescarga.png" class="img-responsive center-block">
        </div>
    </div>
</div>
