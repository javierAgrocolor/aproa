<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script src="../../../vendor/bower/jquery/dist/jquery.js"></script>
    <script src="../../js/funciones.js" type="text/javascript"></script>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'APROA - Prevención y Gestión de Crisis',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Origen', 'url' => ['/precios/origen']],
            ['label' => 'Mayoristas', 'url' => ['/precios/mayoristas']],
            ['label' => 'Supermercados', 'url' => ['/precios/supermercados']],
            ['label' => 'Precios Ponderados', 'url' => ['/site/preciosponderados']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/site/login']] :
                [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container contenidoPrincipal">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><strong>&copy; <img src="/aproa/images/aproafooter.png" > <?= date('Y') ?></strong></p>
        <p class="pull-right"><strong>Subvencionado a través del Programa operativo parcial de APROA: Medidas de Prevención y Gestión de Crisis.</strong></p>
       <!-- <p class="pull-right"><?= Yii::powered() ?></p>-->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
    <!-- this should go after your </body> -->
    <link rel="stylesheet" type="text/css" href="../../assets/datetimepicker-master/jquery.datetimepicker.css" />
    <!--<script src="../../assets/datetimepicker-master/jquery.js"></script>-->
    <script src="../../assets/datetimepicker-master/build/jquery.datetimepicker.full.min.js"></script>
    <script>
        jQuery.datetimepicker.setLocale('es');

        jQuery('#datetimepicker1').datetimepicker({
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Marzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,
         format:'d/m/Y'
        });
        
        jQuery.datetimepicker.setLocale('es');

        jQuery('#datetimepicker-1').datetimepicker({
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Marzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,
         format:'d/m/Y'
        });
        
        jQuery.datetimepicker.setLocale('es');

        jQuery('#datetimepicker2').datetimepicker({
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Marzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,
         format:'Y-m-d'
        });
        
        jQuery.datetimepicker.setLocale('es');

        jQuery('#datetimepicker-2').datetimepicker({
         i18n:{
          de:{
           months:[
            'Enero','Febrero','Marzo','Abril',
            'Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre',
           ],
           dayOfWeek:[
            "So.", "Mo", "Di", "Mi", 
            "Do", "Fr", "Sa.",
           ]
          }
         },
         timepicker:false,
         format:'Y-m-d'
        });
    </script>
</html>
<?php $this->endPage() ?>
