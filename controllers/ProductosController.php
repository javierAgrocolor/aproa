<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\DatosOrigen;
use app\models\DatosGeneralesMayoristas;
use app\models\DatosSupermercados;
use app\models\Producto;
use app\models\Origen;
use app\models\Boletines;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductosController
 *
 * @author Iván
 */
class ProductosController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionTomate() {
        if (!\Yii::$app->user->isGuest) {
            
            $origenModel = new DatosOrigen();
            $mayoristasModel = new DatosGeneralesMayoristas();
            $supermercadoModel = new DatosSupermercados();
            $nombreorigenModel = new Origen();
            
            $request = yii::$app->request;
            if (count($request->get('fecha')) != 0) {
                $fecha = $request->get('fecha');
            } else {
                $fecha = date('Y-m-d');
            }

            $fecha2 =  date( "Y-m-d", strtotime( "-6 day", strtotime( $fecha ) ) ); 
            $semana =  date( "Y-m-d", strtotime( "-7 day", strtotime( $fecha ) ) ); 
            $semana2 =  date( "Y-m-d", strtotime( "-13 day", strtotime( $fecha ) ) ); 
            $year =  date( "Y-m-d", strtotime( "-1 year", strtotime( $fecha ) ) ); 
            $year2 =  date( "Y-m-d", strtotime( "-7 day", strtotime( $year ) ) ); 
            
            //ORIGEN
            $condicion = "cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4";
            
            $origenFecha = $origenModel -> productosOrigen($fecha,$fecha2,$condicion);
            $origenSemana = $origenModel -> productosOrigen($semana,$semana2,$condicion);
            $origenYear = $origenModel -> productosOrigen($year,$year2,$condicion);
            
            //MAYORISTA
            $condicionEsp = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4) and cod_localizacion=24";
            
            $mayoristasFechaEsp = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionEsp);
            $mayoristasSemanaEsp = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionEsp);
            $mayoristasYearEsp = $mayoristasModel -> productosMayoristas($year,$year2,$condicionEsp);
            
            $condicionAle = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4) and (cod_localizacion=6 or cod_localizacion=20 or cod_localizacion=21 or cod_localizacion=22 or cod_localizacion=23)";
            
            $mayoristasFechaAle = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionAle);
            $mayoristasSemanaAle = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionAle);
            $mayoristasYearAle = $mayoristasModel -> productosMayoristas($year,$year2,$condicionAle);
            
            $condicionFra = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4) and (cod_localizacion=3 or cod_localizacion=4)";
            
            $mayoristasFechaFra = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionFra);
            $mayoristasSemanaFra = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionFra);
            $mayoristasYearFra = $mayoristasModel -> productosMayoristas($year,$year2,$condicionFra);
            
            $condicionRei = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4) and cod_localizacion=5";
            
            $mayoristasFechaRei = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionRei);
            $mayoristasSemanaRei = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionRei);
            $mayoristasYearRei = $mayoristasModel -> productosMayoristas($year,$year2,$condicionRei);
            
            //mayorista tabla
            $condicionTabla = "cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4";
            
            $mayoristasTabla = $mayoristasModel ->productosTablaMayoristas($fecha, $fecha2, $condicionTabla);
            
            //mayorista origen
            
            $condicionOrigen = "cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4";
            
            $mayoristasFechaOrigen = $mayoristasModel ->productosMayoristasOrigen($fecha,$fecha2,$condicionOrigen);
            $mayoristasSemanaOrigen = $mayoristasModel ->productosMayoristasOrigen($semana,$semana2,$condicionOrigen);
            $mayoristasYearOrigen = $mayoristasModel -> productosMayoristasOrigen($year,$year2,$condicionOrigen);
                                    
            //SUPERMERCADOS
            $condicionEspSup = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4 or cod_producto=24 or cod_producto=26) and (cod_localizacion=75 or cod_localizacion=30 or cod_localizacion=11 or cod_localizacion=84 or cod_localizacion=31 or cod_localizacion=32 or cod_localizacion=10)";
            
            $supermercadoFechaEsp = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionEspSup);
            $supermercadoSemanaEsp = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionEspSup);
            $supermercadoYearEsp = $supermercadoModel -> productosSupermercado($year,$year2,$condicionEspSup);
            
            $condicionAleSup = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4 or cod_producto=24 or cod_producto=26) and (cod_localizacion=70 or cod_localizacion=79 or cod_localizacion=49 or cod_localizacion=28 or cod_localizacion=48 or cod_localizacion=45 or cod_localizacion=51 or cod_localizacion=35)";
            
            $supermercadoFechaAle = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionAleSup);
            $supermercadoSemanaAle = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionAleSup);
            $supermercadoYearAle = $supermercadoModel -> productosSupermercado($year,$year2,$condicionAleSup);
            
            $condicionFraSup = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4 or cod_producto=24 or cod_producto=26) and (cod_localizacion=19 or cod_localizacion=16)";
            
            $supermercadoFechaFra = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionFraSup);
            $supermercadoSemanaFra = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionFraSup);
            $supermercadoYearFra = $supermercadoModel -> productosSupermercado($year,$year2,$condicionFraSup);
            
            $condicionReiSup = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4 or cod_producto=24 or cod_producto=26) and (cod_localizacion=9 or cod_localizacion=41 or cod_localizacion=7 or cod_localizacion=8 or cod_localizacion=74)";
            
            $supermercadoFechaRei = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionReiSup);
            $supermercadoSemanaRei = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionReiSup);
            $supermercadoYearRei = $supermercadoModel -> productosSupermercado($year,$year2,$condicionReiSup);
            
            $condicionPolSup = "(cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4 or cod_producto=24 or cod_producto=26) and (cod_localizacion=63 or cod_localizacion=52 or cod_localizacion=57 or cod_localizacion=54 or cod_localizacion=73)";
            
            $supermercadoFechaPol = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionPolSup);
            $supermercadoSemanaPol = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionPolSup);
            $supermercadoYearPol = $supermercadoModel -> productosSupermercado($year,$year2,$condicionPolSup);
            
            //supermercado tabla
            $condicionTablaSup = "cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4 or cod_producto=24 or cod_producto=26";
            
            $supermercadoTabla = $supermercadoModel ->productosTablaSupermercado($fecha, $fecha2, $condicionTablaSup);
            
            //supermercado origen
            
            $condicionOrigenSup = "cod_producto=1 or cod_producto=2 or cod_producto=3 or cod_producto=4 or cod_producto=24 or cod_producto=26";
            
            $supermercadoFechaOrigen = $supermercadoModel ->productosSupermercadoOrigen($fecha,$fecha2,$condicionOrigenSup);
            $supermercadoSemanaOrigen = $supermercadoModel ->productosSupermercadoOrigen($semana,$semana2,$condicionOrigenSup);
            $supermercadoYearOrigen = $supermercadoModel -> productosSupermercadoOrigen($year,$year2,$condicionOrigenSup);

            $date = new \DateTime($fecha);
            $fecha = $date;

            return $this->render('tomate', ['fecha' => $fecha,'origenfecha'=>$origenFecha,'origensemana'=>$origenSemana,'origenyear'=>$origenYear,'mayoristastabla'=>$mayoristasTabla
                                    ,'mayoristasfechaesp'=>$mayoristasFechaEsp,'mayoristassemanaesp'=>$mayoristasSemanaEsp,'mayoristasyearesp'=>$mayoristasYearEsp
                                    ,'mayoristasfechaale'=>$mayoristasFechaAle,'mayoristassemanaale'=>$mayoristasSemanaAle,'mayoristasyearale'=>$mayoristasYearAle
                                    ,'mayoristasfechafra'=>$mayoristasFechaFra,'mayoristassemanafra'=>$mayoristasSemanaFra,'mayoristasyearfra'=>$mayoristasYearFra
                                    ,'mayoristasfecharei'=>$mayoristasFechaRei,'mayoristassemanarei'=>$mayoristasSemanaRei,'mayoristasyearrei'=>$mayoristasYearRei
                                    ,'mayoristasfechaorigen'=>$mayoristasFechaOrigen,'mayoristassemanaorigen'=>$mayoristasSemanaOrigen,'mayoristasyearorigen'=>$mayoristasYearOrigen
                                    ,'supermercadofechaesp'=>$supermercadoFechaEsp,'supermercadosemanaesp'=>$supermercadoSemanaEsp,'supermercadoyearesp'=>$supermercadoYearEsp
                                    ,'supermercadofechaale'=>$supermercadoFechaAle,'supermercadosemanaale'=>$supermercadoSemanaAle,'supermercadoyearale'=>$supermercadoYearAle
                                    ,'supermercadofechafra'=>$supermercadoFechaFra,'supermercadosemanafra'=>$supermercadoSemanaFra,'supermercadoyearfra'=>$supermercadoYearFra
                                    ,'supermercadofecharei'=>$supermercadoFechaRei,'supermercadosemanarei'=>$supermercadoSemanaRei,'supermercadoyearrei'=>$supermercadoYearRei
                                    ,'supermercadofechapol'=>$supermercadoFechaPol,'supermercadosemanapol'=>$supermercadoSemanaPol,'supermercadoyearpol'=>$supermercadoYearPol
                                    ,'supermercadofechaorigen'=>$supermercadoFechaOrigen,'supermercadosemanaorigen'=>$supermercadoSemanaOrigen,'supermercadoyearorigen'=>$supermercadoYearOrigen
                                    ,'supermercadotabla'=>$supermercadoTabla]);
        } else {
            return $this->goHome();
        }
    }

    public function actionPimiento() {
        if (!\Yii::$app->user->isGuest) {
            
            $origenModel = new DatosOrigen();
            $mayoristasModel = new DatosGeneralesMayoristas();
            $supermercadoModel = new DatosSupermercados();
            $nombreorigenModel = new Origen();
            
            $request = yii::$app->request;
            if (count($request->get('fecha')) != 0) {
                $fecha = $request->get('fecha');
            } else {
                $fecha = date('Y-m-d');
            }

            $fecha2 =  date( "Y-m-d", strtotime( "-6 day", strtotime( $fecha ) ) ); 
            $semana =  date( "Y-m-d", strtotime( "-7 day", strtotime( $fecha ) ) ); 
            $semana2 =  date( "Y-m-d", strtotime( "-13 day", strtotime( $fecha ) ) ); 
            $year =  date( "Y-m-d", strtotime( "-1 year", strtotime( $fecha ) ) ); 
            $year2 =  date( "Y-m-d", strtotime( "-7 day", strtotime( $year ) ) ); 
            
            //ORIGEN
            $condicion = "cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=8 or cod_producto=9 or cod_producto=10 or cod_producto=11";
            
            $origenFecha = $origenModel -> productosOrigen($fecha,$fecha2,$condicion);
            $origenSemana = $origenModel -> productosOrigen($semana,$semana2,$condicion);
            $origenYear = $origenModel -> productosOrigen($year,$year2,$condicion);
            
            //MAYORISTA
            $condicionEsp = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11) and cod_localizacion=24";
            
            $mayoristasFechaEsp = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionEsp);
            $mayoristasSemanaEsp = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionEsp);
            $mayoristasYearEsp = $mayoristasModel -> productosMayoristas($year,$year2,$condicionEsp);
            
            $condicionAle = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11) and (cod_localizacion=6 or cod_localizacion=20 or cod_localizacion=21 or cod_localizacion=22 or cod_localizacion=23)";
            
            $mayoristasFechaAle = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionAle);
            $mayoristasSemanaAle = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionAle);
            $mayoristasYearAle = $mayoristasModel -> productosMayoristas($year,$year2,$condicionAle);
            
            $condicionFra = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11) and (cod_localizacion=3 or cod_localizacion=4)";
            
            $mayoristasFechaFra = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionFra);
            $mayoristasSemanaFra = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionFra);
            $mayoristasYearFra = $mayoristasModel -> productosMayoristas($year,$year2,$condicionFra);
            
            $condicionRei = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11) and cod_localizacion=5";
            
            $mayoristasFechaRei = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionRei);
            $mayoristasSemanaRei = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionRei);
            $mayoristasYearRei = $mayoristasModel -> productosMayoristas($year,$year2,$condicionRei);
            
            //mayorista tabla
            $condicionTabla = "cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11";
            
            $mayoristasTabla = $mayoristasModel ->productosTablaMayoristas($fecha, $fecha2, $condicionTabla);
            
            //mayorista origen
            
            $condicionOrigen = "cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11";
            
            $mayoristasFechaOrigen = $mayoristasModel ->productosMayoristasOrigen($fecha,$fecha2,$condicionOrigen);
            $mayoristasSemanaOrigen = $mayoristasModel ->productosMayoristasOrigen($semana,$semana2,$condicionOrigen);
            $mayoristasYearOrigen = $mayoristasModel -> productosMayoristasOrigen($year,$year2,$condicionOrigen);
                                    
            //SUPERMERCADOS
            $condicionEspSup = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11 or cod_producto=28) and (cod_localizacion=75 or cod_localizacion=30 or cod_localizacion=11 or cod_localizacion=84 or cod_localizacion=31 or cod_localizacion=32 or cod_localizacion=10)";
            
            $supermercadoFechaEsp = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionEspSup);
            $supermercadoSemanaEsp = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionEspSup);
            $supermercadoYearEsp = $supermercadoModel -> productosSupermercado($year,$year2,$condicionEspSup);
            
            $condicionAleSup = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11 or cod_producto=28) and (cod_localizacion=70 or cod_localizacion=79 or cod_localizacion=49 or cod_localizacion=28 or cod_localizacion=48 or cod_localizacion=45 or cod_localizacion=51 or cod_localizacion=35)";
            
            $supermercadoFechaAle = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionAleSup);
            $supermercadoSemanaAle = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionAleSup);
            $supermercadoYearAle = $supermercadoModel -> productosSupermercado($year,$year2,$condicionAleSup);
            
            $condicionFraSup = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11 or cod_producto=28) and (cod_localizacion=19 or cod_localizacion=16)";
            
            $supermercadoFechaFra = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionFraSup);
            $supermercadoSemanaFra = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionFraSup);
            $supermercadoYearFra = $supermercadoModel -> productosSupermercado($year,$year2,$condicionFraSup);
            
            $condicionReiSup = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11 or cod_producto=28) and (cod_localizacion=9 or cod_localizacion=41 or cod_localizacion=7 or cod_localizacion=8 or cod_localizacion=74)";
            
            $supermercadoFechaRei = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionReiSup);
            $supermercadoSemanaRei = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionReiSup);
            $supermercadoYearRei = $supermercadoModel -> productosSupermercado($year,$year2,$condicionReiSup);
            
            $condicionPolSup = "(cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11 or cod_producto=28) and (cod_localizacion=63 or cod_localizacion=52 or cod_localizacion=57 or cod_localizacion=54 or cod_localizacion=73)";
            
            $supermercadoFechaPol = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionPolSup);
            $supermercadoSemanaPol = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionPolSup);
            $supermercadoYearPol = $supermercadoModel -> productosSupermercado($year,$year2,$condicionPolSup);
            
            //supermercado tabla
            $condicionTablaSup = "cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11 or cod_producto=28";
            
            $supermercadoTabla = $supermercadoModel ->productosTablaSupermercado($fecha, $fecha2, $condicionTablaSup);
            
            //supermercado origen
            
            $condicionOrigenSup = "cod_producto=5 or cod_producto=6 or cod_producto=7 or cod_producto=11 or cod_producto=28";
            
            $supermercadoFechaOrigen = $supermercadoModel ->productosSupermercadoOrigen($fecha,$fecha2,$condicionOrigenSup);
            $supermercadoSemanaOrigen = $supermercadoModel ->productosSupermercadoOrigen($semana,$semana2,$condicionOrigenSup);
            $supermercadoYearOrigen = $supermercadoModel -> productosSupermercadoOrigen($year,$year2,$condicionOrigenSup);

            $date = new \DateTime($fecha);
            $fecha = $date;

            return $this->render('pimiento', ['fecha' => $fecha,'origenfecha'=>$origenFecha,'origensemana'=>$origenSemana,'origenyear'=>$origenYear,'mayoristastabla'=>$mayoristasTabla
                                    ,'mayoristasfechaesp'=>$mayoristasFechaEsp,'mayoristassemanaesp'=>$mayoristasSemanaEsp,'mayoristasyearesp'=>$mayoristasYearEsp
                                    ,'mayoristasfechaale'=>$mayoristasFechaAle,'mayoristassemanaale'=>$mayoristasSemanaAle,'mayoristasyearale'=>$mayoristasYearAle
                                    ,'mayoristasfechafra'=>$mayoristasFechaFra,'mayoristassemanafra'=>$mayoristasSemanaFra,'mayoristasyearfra'=>$mayoristasYearFra
                                    ,'mayoristasfecharei'=>$mayoristasFechaRei,'mayoristassemanarei'=>$mayoristasSemanaRei,'mayoristasyearrei'=>$mayoristasYearRei
                                    ,'mayoristasfechaorigen'=>$mayoristasFechaOrigen,'mayoristassemanaorigen'=>$mayoristasSemanaOrigen,'mayoristasyearorigen'=>$mayoristasYearOrigen
                                    ,'supermercadofechaesp'=>$supermercadoFechaEsp,'supermercadosemanaesp'=>$supermercadoSemanaEsp,'supermercadoyearesp'=>$supermercadoYearEsp
                                    ,'supermercadofechaale'=>$supermercadoFechaAle,'supermercadosemanaale'=>$supermercadoSemanaAle,'supermercadoyearale'=>$supermercadoYearAle
                                    ,'supermercadofechafra'=>$supermercadoFechaFra,'supermercadosemanafra'=>$supermercadoSemanaFra,'supermercadoyearfra'=>$supermercadoYearFra
                                    ,'supermercadofecharei'=>$supermercadoFechaRei,'supermercadosemanarei'=>$supermercadoSemanaRei,'supermercadoyearrei'=>$supermercadoYearRei
                                    ,'supermercadofechapol'=>$supermercadoFechaPol,'supermercadosemanapol'=>$supermercadoSemanaPol,'supermercadoyearpol'=>$supermercadoYearPol
                                    ,'supermercadofechaorigen'=>$supermercadoFechaOrigen,'supermercadosemanaorigen'=>$supermercadoSemanaOrigen,'supermercadoyearorigen'=>$supermercadoYearOrigen
                                    ,'supermercadotabla'=>$supermercadoTabla]);
        } else {
            return $this->goHome();
        }
    }

    public function actionPepino() {
        if (!\Yii::$app->user->isGuest) {
            $origenModel = new DatosOrigen();
            $mayoristasModel = new DatosGeneralesMayoristas();
            $supermercadoModel = new DatosSupermercados();
            $nombreorigenModel = new Origen();
            
            $request = yii::$app->request;
            if (count($request->get('fecha')) != 0) {
                $fecha = $request->get('fecha');
            } else {
                $fecha = date('Y-m-d');
            }

            $fecha2 =  date( "Y-m-d", strtotime( "-6 day", strtotime( $fecha ) ) ); 
            $semana =  date( "Y-m-d", strtotime( "-7 day", strtotime( $fecha ) ) ); 
            $semana2 =  date( "Y-m-d", strtotime( "-13 day", strtotime( $fecha ) ) ); 
            $year =  date( "Y-m-d", strtotime( "-1 year", strtotime( $fecha ) ) ); 
            $year2 =  date( "Y-m-d", strtotime( "-7 day", strtotime( $year ) ) ); 
            
            //ORIGEN    
            $condicion = "cod_producto=30 or cod_producto=32 or cod_producto=33";
            
            $origenFecha = $origenModel -> productosOrigen($fecha,$fecha2,$condicion);
            $origenSemana = $origenModel -> productosOrigen($semana,$semana2,$condicion);
            $origenYear = $origenModel -> productosOrigen($year,$year2,$condicion);
            
            //MAYORISTA
            $condicionEsp = "(cod_producto=30) and cod_localizacion=24";
            
            $mayoristasFechaEsp = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionEsp);
            $mayoristasSemanaEsp = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionEsp);
            $mayoristasYearEsp = $mayoristasModel -> productosMayoristas($year,$year2,$condicionEsp);
            
            $condicionAle = "(cod_producto=30) and (cod_localizacion=6 or cod_localizacion=20 or cod_localizacion=21 or cod_localizacion=22 or cod_localizacion=23)";
            
            $mayoristasFechaAle = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionAle);
            $mayoristasSemanaAle = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionAle);
            $mayoristasYearAle = $mayoristasModel -> productosMayoristas($year,$year2,$condicionAle);
            
            $condicionFra = "(cod_producto=30) and (cod_localizacion=3 or cod_localizacion=4)";
            
            $mayoristasFechaFra = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionFra);
            $mayoristasSemanaFra = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionFra);
            $mayoristasYearFra = $mayoristasModel -> productosMayoristas($year,$year2,$condicionFra);
            
            $condicionRei = "(cod_producto=30) and cod_localizacion=5";
            
            $mayoristasFechaRei = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionRei);
            $mayoristasSemanaRei = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionRei);
            $mayoristasYearRei = $mayoristasModel -> productosMayoristas($year,$year2,$condicionRei);
            
            //mayorista tabla
            $condicionTabla = "cod_producto=30";
            
            $mayoristasTabla = $mayoristasModel ->productosTablaMayoristas($fecha, $fecha2, $condicionTabla);
            
            //mayorista origen
            
            $condicionOrigen = "cod_producto=30";
            
            $mayoristasFechaOrigen = $mayoristasModel ->productosMayoristasOrigen($fecha,$fecha2,$condicionOrigen);
            $mayoristasSemanaOrigen = $mayoristasModel ->productosMayoristasOrigen($semana,$semana2,$condicionOrigen);
            $mayoristasYearOrigen = $mayoristasModel -> productosMayoristasOrigen($year,$year2,$condicionOrigen);

            //SUPERMERCADOS
            $condicionEspSup = "(cod_producto=30 or cod_producto=32) and (cod_localizacion=75 or cod_localizacion=30 or cod_localizacion=11 or cod_localizacion=84 or cod_localizacion=31 or cod_localizacion=32 or cod_localizacion=10)";
            
            $supermercadoFechaEsp = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionEspSup);
            $supermercadoSemanaEsp = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionEspSup);
            $supermercadoYearEsp = $supermercadoModel -> productosSupermercado($year,$year2,$condicionEspSup);
            
            $condicionAleSup = "(cod_producto=30 or cod_producto=32) and (cod_localizacion=70 or cod_localizacion=79 or cod_localizacion=49 or cod_localizacion=28 or cod_localizacion=48 or cod_localizacion=45 or cod_localizacion=51 or cod_localizacion=35)";
            
            $supermercadoFechaAle = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionAleSup);
            $supermercadoSemanaAle = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionAleSup);
            $supermercadoYearAle = $supermercadoModel -> productosSupermercado($year,$year2,$condicionAleSup);
            
            $condicionFraSup = "(cod_producto=30 or cod_producto=32) and (cod_localizacion=19 or cod_localizacion=16)";
            
            $supermercadoFechaFra = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionFraSup);
            $supermercadoSemanaFra = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionFraSup);
            $supermercadoYearFra = $supermercadoModel -> productosSupermercado($year,$year2,$condicionFraSup);
            
            $condicionReiSup = "(cod_producto=30 or cod_producto=32) and (cod_localizacion=9 or cod_localizacion=41 or cod_localizacion=7 or cod_localizacion=8 or cod_localizacion=74)";
            
            $supermercadoFechaRei = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionReiSup);
            $supermercadoSemanaRei = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionReiSup);
            $supermercadoYearRei = $supermercadoModel -> productosSupermercado($year,$year2,$condicionReiSup);
            
            $condicionPolSup = "(cod_producto=30 or cod_producto=32) and (cod_localizacion=63 or cod_localizacion=52 or cod_localizacion=57 or cod_localizacion=54 or cod_localizacion=73)";
            
            $supermercadoFechaPol = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionPolSup);
            $supermercadoSemanaPol = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionPolSup);
            $supermercadoYearPol = $supermercadoModel -> productosSupermercado($year,$year2,$condicionPolSup);
            
            //supermercado tabla
            $condicionTablaSup = "cod_producto=30 or cod_producto=32";
            
            $supermercadoTabla = $supermercadoModel ->productosTablaSupermercado($fecha, $fecha2, $condicionTablaSup);
            
            //supermercado origen
            
            $condicionOrigenSup = "cod_producto=30 or cod_producto=32";
            
            $supermercadoFechaOrigen = $supermercadoModel ->productosSupermercadoOrigen($fecha,$fecha2,$condicionOrigenSup);
            $supermercadoSemanaOrigen = $supermercadoModel ->productosSupermercadoOrigen($semana,$semana2,$condicionOrigenSup);
            $supermercadoYearOrigen = $supermercadoModel -> productosSupermercadoOrigen($year,$year2,$condicionOrigenSup);
            
            $date = new \DateTime($fecha);
            $fecha = $date;

            return $this->render('pepino', ['fecha' => $fecha,'origenfecha'=>$origenFecha,'origensemana'=>$origenSemana,'origenyear'=>$origenYear,'mayoristastabla'=>$mayoristasTabla
                                    ,'mayoristasfechaesp'=>$mayoristasFechaEsp,'mayoristassemanaesp'=>$mayoristasSemanaEsp,'mayoristasyearesp'=>$mayoristasYearEsp
                                    ,'mayoristasfechaale'=>$mayoristasFechaAle,'mayoristassemanaale'=>$mayoristasSemanaAle,'mayoristasyearale'=>$mayoristasYearAle
                                    ,'mayoristasfechafra'=>$mayoristasFechaFra,'mayoristassemanafra'=>$mayoristasSemanaFra,'mayoristasyearfra'=>$mayoristasYearFra
                                    ,'mayoristasfecharei'=>$mayoristasFechaRei,'mayoristassemanarei'=>$mayoristasSemanaRei,'mayoristasyearrei'=>$mayoristasYearRei
                                    ,'mayoristasfechaorigen'=>$mayoristasFechaOrigen,'mayoristassemanaorigen'=>$mayoristasSemanaOrigen,'mayoristasyearorigen'=>$mayoristasYearOrigen
                                    ,'supermercadofechaesp'=>$supermercadoFechaEsp,'supermercadosemanaesp'=>$supermercadoSemanaEsp,'supermercadoyearesp'=>$supermercadoYearEsp
                                    ,'supermercadofechaale'=>$supermercadoFechaAle,'supermercadosemanaale'=>$supermercadoSemanaAle,'supermercadoyearale'=>$supermercadoYearAle
                                    ,'supermercadofechafra'=>$supermercadoFechaFra,'supermercadosemanafra'=>$supermercadoSemanaFra,'supermercadoyearfra'=>$supermercadoYearFra
                                    ,'supermercadofecharei'=>$supermercadoFechaRei,'supermercadosemanarei'=>$supermercadoSemanaRei,'supermercadoyearrei'=>$supermercadoYearRei
                                    ,'supermercadofechapol'=>$supermercadoFechaPol,'supermercadosemanapol'=>$supermercadoSemanaPol,'supermercadoyearpol'=>$supermercadoYearPol
                                    ,'supermercadofechaorigen'=>$supermercadoFechaOrigen,'supermercadosemanaorigen'=>$supermercadoSemanaOrigen,'supermercadoyearorigen'=>$supermercadoYearOrigen
                                    ,'supermercadotabla'=>$supermercadoTabla]);
        } else {
            return $this->goHome();
        }
    }

    public function actionBerenjena() {
        if (!\Yii::$app->user->isGuest) {
            $origenModel = new DatosOrigen();
            $mayoristasModel = new DatosGeneralesMayoristas();
            $supermercadoModel = new DatosSupermercados();
            $nombreorigenModel = new Origen();
            
            $request = yii::$app->request;
            if (count($request->get('fecha')) != 0) {
                $fecha = $request->get('fecha');
            } else {
                $fecha = date('Y-m-d');
            }

            $fecha2 =  date( "Y-m-d", strtotime( "-6 day", strtotime( $fecha ) ) ); 
            $semana =  date( "Y-m-d", strtotime( "-7 day", strtotime( $fecha ) ) ); 
            $semana2 =  date( "Y-m-d", strtotime( "-13 day", strtotime( $fecha ) ) ); 
            $year =  date( "Y-m-d", strtotime( "-1 year", strtotime( $fecha ) ) ); 
            $year2 =  date( "Y-m-d", strtotime( "-7 day", strtotime( $year ) ) ); 
            
            //ORIGEN
            $condicion = "cod_producto=34 or cod_producto=36";
            
            $origenFecha = $origenModel -> productosOrigen($fecha,$fecha2,$condicion);
            $origenSemana = $origenModel -> productosOrigen($semana,$semana2,$condicion);
            $origenYear = $origenModel -> productosOrigen($year,$year2,$condicion);
            
            //MAYORISTA
            $condicionEsp = "(cod_producto=12) and cod_localizacion=24";
            
            $mayoristasFechaEsp = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionEsp);
            $mayoristasSemanaEsp = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionEsp);
            $mayoristasYearEsp = $mayoristasModel -> productosMayoristas($year,$year2,$condicionEsp);
            
            $condicionAle = "(cod_producto=12) and (cod_localizacion=6 or cod_localizacion=20 or cod_localizacion=21 or cod_localizacion=22 or cod_localizacion=23)";
            
            $mayoristasFechaAle = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionAle);
            $mayoristasSemanaAle = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionAle);
            $mayoristasYearAle = $mayoristasModel -> productosMayoristas($year,$year2,$condicionAle);
            
            $condicionFra = "(cod_producto=12) and (cod_localizacion=3 or cod_localizacion=4)";
            
            $mayoristasFechaFra = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionFra);
            $mayoristasSemanaFra = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionFra);
            $mayoristasYearFra = $mayoristasModel -> productosMayoristas($year,$year2,$condicionFra);
            
            $condicionRei = "(cod_producto=12) and cod_localizacion=5";
            
            $mayoristasFechaRei = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionRei);
            $mayoristasSemanaRei = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionRei);
            $mayoristasYearRei = $mayoristasModel -> productosMayoristas($year,$year2,$condicionRei);
            
            //mayorista tabla
            $condicionTabla = "cod_producto=12";
            
            $mayoristasTabla = $mayoristasModel ->productosTablaMayoristas($fecha, $fecha2, $condicionTabla);
            
            //mayorista origen
            
            $condicionOrigen = "cod_producto=12";
            
            $mayoristasFechaOrigen = $mayoristasModel ->productosMayoristasOrigen($fecha,$fecha2,$condicionOrigen);
            $mayoristasSemanaOrigen = $mayoristasModel ->productosMayoristasOrigen($semana,$semana2,$condicionOrigen);
            $mayoristasYearOrigen = $mayoristasModel -> productosMayoristasOrigen($year,$year2,$condicionOrigen);

            //SUPERMERCADOS
            $condicionEspSup = "(cod_producto=12) and (cod_localizacion=75 or cod_localizacion=30 or cod_localizacion=11 or cod_localizacion=84 or cod_localizacion=31 or cod_localizacion=32 or cod_localizacion=10)";
            
            $supermercadoFechaEsp = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionEspSup);
            $supermercadoSemanaEsp = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionEspSup);
            $supermercadoYearEsp = $supermercadoModel -> productosSupermercado($year,$year2,$condicionEspSup);
            
            $condicionAleSup = "(cod_producto=12) and (cod_localizacion=70 or cod_localizacion=79 or cod_localizacion=49 or cod_localizacion=28 or cod_localizacion=48 or cod_localizacion=45 or cod_localizacion=51 or cod_localizacion=35)";
            
            $supermercadoFechaAle = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionAleSup);
            $supermercadoSemanaAle = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionAleSup);
            $supermercadoYearAle = $supermercadoModel -> productosSupermercado($year,$year2,$condicionAleSup);
            
            $condicionFraSup = "(cod_producto=12) and (cod_localizacion=19 or cod_localizacion=16)";
            
            $supermercadoFechaFra = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionFraSup);
            $supermercadoSemanaFra = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionFraSup);
            $supermercadoYearFra = $supermercadoModel -> productosSupermercado($year,$year2,$condicionFraSup);
            
            $condicionReiSup = "(cod_producto=12) and (cod_localizacion=9 or cod_localizacion=41 or cod_localizacion=7 or cod_localizacion=8 or cod_localizacion=74)";
            
            $supermercadoFechaRei = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionReiSup);
            $supermercadoSemanaRei = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionReiSup);
            $supermercadoYearRei = $supermercadoModel -> productosSupermercado($year,$year2,$condicionReiSup);
            
            $condicionPolSup = "(cod_producto=12) and (cod_localizacion=63 or cod_localizacion=52 or cod_localizacion=57 or cod_localizacion=54 or cod_localizacion=73)";
            
            $supermercadoFechaPol = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionPolSup);
            $supermercadoSemanaPol = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionPolSup);
            $supermercadoYearPol = $supermercadoModel -> productosSupermercado($year,$year2,$condicionPolSup);
            
            //supermercado tabla
            $condicionTablaSup = "cod_producto=12";
            
            $supermercadoTabla = $supermercadoModel ->productosTablaSupermercado($fecha, $fecha2, $condicionTablaSup);
            
            //supermercado origen
            
            $condicionOrigenSup = "cod_producto=12";
            
            $supermercadoFechaOrigen = $supermercadoModel ->productosSupermercadoOrigen($fecha,$fecha2,$condicionOrigenSup);
            $supermercadoSemanaOrigen = $supermercadoModel ->productosSupermercadoOrigen($semana,$semana2,$condicionOrigenSup);
            $supermercadoYearOrigen = $supermercadoModel -> productosSupermercadoOrigen($year,$year2,$condicionOrigenSup);

            $date = new \DateTime($fecha);
            $fecha = $date;

            return $this->render('berenjena', ['fecha' => $fecha,'origenfecha'=>$origenFecha,'origensemana'=>$origenSemana,'origenyear'=>$origenYear,'mayoristastabla'=>$mayoristasTabla
                                    ,'mayoristasfechaesp'=>$mayoristasFechaEsp,'mayoristassemanaesp'=>$mayoristasSemanaEsp,'mayoristasyearesp'=>$mayoristasYearEsp
                                    ,'mayoristasfechaale'=>$mayoristasFechaAle,'mayoristassemanaale'=>$mayoristasSemanaAle,'mayoristasyearale'=>$mayoristasYearAle
                                    ,'mayoristasfechafra'=>$mayoristasFechaFra,'mayoristassemanafra'=>$mayoristasSemanaFra,'mayoristasyearfra'=>$mayoristasYearFra
                                    ,'mayoristasfecharei'=>$mayoristasFechaRei,'mayoristassemanarei'=>$mayoristasSemanaRei,'mayoristasyearrei'=>$mayoristasYearRei
                                    ,'mayoristasfechaorigen'=>$mayoristasFechaOrigen,'mayoristassemanaorigen'=>$mayoristasSemanaOrigen,'mayoristasyearorigen'=>$mayoristasYearOrigen
                                    ,'supermercadofechaesp'=>$supermercadoFechaEsp,'supermercadosemanaesp'=>$supermercadoSemanaEsp,'supermercadoyearesp'=>$supermercadoYearEsp
                                    ,'supermercadofechaale'=>$supermercadoFechaAle,'supermercadosemanaale'=>$supermercadoSemanaAle,'supermercadoyearale'=>$supermercadoYearAle
                                    ,'supermercadofechafra'=>$supermercadoFechaFra,'supermercadosemanafra'=>$supermercadoSemanaFra,'supermercadoyearfra'=>$supermercadoYearFra
                                    ,'supermercadofecharei'=>$supermercadoFechaRei,'supermercadosemanarei'=>$supermercadoSemanaRei,'supermercadoyearrei'=>$supermercadoYearRei
                                    ,'supermercadofechapol'=>$supermercadoFechaPol,'supermercadosemanapol'=>$supermercadoSemanaPol,'supermercadoyearpol'=>$supermercadoYearPol
                                    ,'supermercadofechaorigen'=>$supermercadoFechaOrigen,'supermercadosemanaorigen'=>$supermercadoSemanaOrigen,'supermercadoyearorigen'=>$supermercadoYearOrigen
                                    ,'supermercadotabla'=>$supermercadoTabla]);
        } else {
            return $this->goHome();
        }
    }

    public function actionCalabacin() {
        if (!\Yii::$app->user->isGuest) {
            $origenModel = new DatosOrigen();
            $mayoristasModel = new DatosGeneralesMayoristas();
            $supermercadoModel = new DatosSupermercados();
            $nombreorigenModel = new Origen();
            
            $request = yii::$app->request;
            if (count($request->get('fecha')) != 0) {
                $fecha = $request->get('fecha');
            } else {
                $fecha = date('Y-m-d');
            }

            $fecha2 =  date( "Y-m-d", strtotime( "-6 day", strtotime( $fecha ) ) ); 
            $semana =  date( "Y-m-d", strtotime( "-7 day", strtotime( $fecha ) ) ); 
            $semana2 =  date( "Y-m-d", strtotime( "-13 day", strtotime( $fecha ) ) ); 
            $year =  date( "Y-m-d", strtotime( "-1 year", strtotime( $fecha ) ) ); 
            $year2 =  date( "Y-m-d", strtotime( "-7 day", strtotime( $year ) ) ); 
            
            //ORIGEN
            $condicion = "cod_producto=13 or cod_producto=39";
            
            $origenFecha = $origenModel -> productosOrigen($fecha,$fecha2,$condicion);
            $origenSemana = $origenModel -> productosOrigen($semana,$semana2,$condicion);
            $origenYear = $origenModel -> productosOrigen($year,$year2,$condicion);
            
            //MAYORISTA
            $condicionEsp = "(cod_producto=13) and cod_localizacion=24";
            
            $mayoristasFechaEsp = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionEsp);
            $mayoristasSemanaEsp = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionEsp);
            $mayoristasYearEsp = $mayoristasModel -> productosMayoristas($year,$year2,$condicionEsp);
            
            $condicionAle = "(cod_producto=13) and (cod_localizacion=6 or cod_localizacion=20 or cod_localizacion=21 or cod_localizacion=22 or cod_localizacion=23)";
            
            $mayoristasFechaAle = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionAle);
            $mayoristasSemanaAle = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionAle);
            $mayoristasYearAle = $mayoristasModel -> productosMayoristas($year,$year2,$condicionAle);
            
            $condicionFra = "(cod_producto=13) and (cod_localizacion=3 or cod_localizacion=4)";
            
            $mayoristasFechaFra = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionFra);
            $mayoristasSemanaFra = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionFra);
            $mayoristasYearFra = $mayoristasModel -> productosMayoristas($year,$year2,$condicionFra);
            
            $condicionRei = "(cod_producto=13) and cod_localizacion=5";
            
            $mayoristasFechaRei = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionRei);
            $mayoristasSemanaRei = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionRei);
            $mayoristasYearRei = $mayoristasModel -> productosMayoristas($year,$year2,$condicionRei);
            
            //mayorista tabla
            $condicionTabla = "cod_producto=13";
            
            $mayoristasTabla = $mayoristasModel ->productosTablaMayoristas($fecha, $fecha2, $condicionTabla);
            
            //mayorista origen
            
            $condicionOrigen = "cod_producto=13";
            
            $mayoristasFechaOrigen = $mayoristasModel ->productosMayoristasOrigen($fecha,$fecha2,$condicionOrigen);
            $mayoristasSemanaOrigen = $mayoristasModel ->productosMayoristasOrigen($semana,$semana2,$condicionOrigen);
            $mayoristasYearOrigen = $mayoristasModel -> productosMayoristasOrigen($year,$year2,$condicionOrigen);

            //SUPERMERCADOS
            $condicionEspSup = "(cod_producto=13) and (cod_localizacion=75 or cod_localizacion=30 or cod_localizacion=11 or cod_localizacion=84 or cod_localizacion=31 or cod_localizacion=32 or cod_localizacion=10)";
            
            $supermercadoFechaEsp = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionEspSup);
            $supermercadoSemanaEsp = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionEspSup);
            $supermercadoYearEsp = $supermercadoModel -> productosSupermercado($year,$year2,$condicionEspSup);
            
            $condicionAleSup = "(cod_producto=13) and (cod_localizacion=70 or cod_localizacion=79 or cod_localizacion=49 or cod_localizacion=28 or cod_localizacion=48 or cod_localizacion=45 or cod_localizacion=51 or cod_localizacion=35)";
            
            $supermercadoFechaAle = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionAleSup);
            $supermercadoSemanaAle = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionAleSup);
            $supermercadoYearAle = $supermercadoModel -> productosSupermercado($year,$year2,$condicionAleSup);
            
            $condicionFraSup = "(cod_producto=13) and (cod_localizacion=19 or cod_localizacion=16)";
            
            $supermercadoFechaFra = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionFraSup);
            $supermercadoSemanaFra = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionFraSup);
            $supermercadoYearFra = $supermercadoModel -> productosSupermercado($year,$year2,$condicionFraSup);
            
            $condicionReiSup = "(cod_producto=13) and (cod_localizacion=9 or cod_localizacion=41 or cod_localizacion=7 or cod_localizacion=8 or cod_localizacion=74)";
            
            $supermercadoFechaRei = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionReiSup);
            $supermercadoSemanaRei = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionReiSup);
            $supermercadoYearRei = $supermercadoModel -> productosSupermercado($year,$year2,$condicionReiSup);
            
            $condicionPolSup = "(cod_producto=13) and (cod_localizacion=63 or cod_localizacion=52 or cod_localizacion=57 or cod_localizacion=54 or cod_localizacion=73)";
            
            $supermercadoFechaPol = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionPolSup);
            $supermercadoSemanaPol = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionPolSup);
            $supermercadoYearPol = $supermercadoModel -> productosSupermercado($year,$year2,$condicionPolSup);
            
            //supermercado tabla
            $condicionTablaSup = "cod_producto=13";
            
            $supermercadoTabla = $supermercadoModel ->productosTablaSupermercado($fecha, $fecha2, $condicionTablaSup);
            
            //supermercado origen
            
            $condicionOrigenSup = "cod_producto=13";
            
            $supermercadoFechaOrigen = $supermercadoModel ->productosSupermercadoOrigen($fecha,$fecha2,$condicionOrigenSup);
            $supermercadoSemanaOrigen = $supermercadoModel ->productosSupermercadoOrigen($semana,$semana2,$condicionOrigenSup);
            $supermercadoYearOrigen = $supermercadoModel -> productosSupermercadoOrigen($year,$year2,$condicionOrigenSup);

            $date = new \DateTime($fecha);
            $fecha = $date;

            return $this->render('calabacin',  ['fecha' => $fecha,'origenfecha'=>$origenFecha,'origensemana'=>$origenSemana,'origenyear'=>$origenYear,'mayoristastabla'=>$mayoristasTabla
                                    ,'mayoristasfechaesp'=>$mayoristasFechaEsp,'mayoristassemanaesp'=>$mayoristasSemanaEsp,'mayoristasyearesp'=>$mayoristasYearEsp
                                    ,'mayoristasfechaale'=>$mayoristasFechaAle,'mayoristassemanaale'=>$mayoristasSemanaAle,'mayoristasyearale'=>$mayoristasYearAle
                                    ,'mayoristasfechafra'=>$mayoristasFechaFra,'mayoristassemanafra'=>$mayoristasSemanaFra,'mayoristasyearfra'=>$mayoristasYearFra
                                    ,'mayoristasfecharei'=>$mayoristasFechaRei,'mayoristassemanarei'=>$mayoristasSemanaRei,'mayoristasyearrei'=>$mayoristasYearRei
                                    ,'mayoristasfechaorigen'=>$mayoristasFechaOrigen,'mayoristassemanaorigen'=>$mayoristasSemanaOrigen,'mayoristasyearorigen'=>$mayoristasYearOrigen
                                    ,'supermercadofechaesp'=>$supermercadoFechaEsp,'supermercadosemanaesp'=>$supermercadoSemanaEsp,'supermercadoyearesp'=>$supermercadoYearEsp
                                    ,'supermercadofechaale'=>$supermercadoFechaAle,'supermercadosemanaale'=>$supermercadoSemanaAle,'supermercadoyearale'=>$supermercadoYearAle
                                    ,'supermercadofechafra'=>$supermercadoFechaFra,'supermercadosemanafra'=>$supermercadoSemanaFra,'supermercadoyearfra'=>$supermercadoYearFra
                                    ,'supermercadofecharei'=>$supermercadoFechaRei,'supermercadosemanarei'=>$supermercadoSemanaRei,'supermercadoyearrei'=>$supermercadoYearRei
                                    ,'supermercadofechapol'=>$supermercadoFechaPol,'supermercadosemanapol'=>$supermercadoSemanaPol,'supermercadoyearpol'=>$supermercadoYearPol
                                    ,'supermercadofechaorigen'=>$supermercadoFechaOrigen,'supermercadosemanaorigen'=>$supermercadoSemanaOrigen,'supermercadoyearorigen'=>$supermercadoYearOrigen
                                    ,'supermercadotabla'=>$supermercadoTabla]);
        } else {
            return $this->goHome();
        }
    }

    public function actionJudia() {
        if (!\Yii::$app->user->isGuest) {
            $origenModel = new DatosOrigen();
            $mayoristasModel = new DatosGeneralesMayoristas();
            $supermercadoModel = new DatosSupermercados();
            $nombreorigenModel = new Origen();
            
            $request = yii::$app->request;
            if (count($request->get('fecha')) != 0) {
                $fecha = $request->get('fecha');
            } else {
                $fecha = date('Y-m-d');
            }

            $fecha2 =  date( "Y-m-d", strtotime( "-6 day", strtotime( $fecha ) ) ); 
            $semana =  date( "Y-m-d", strtotime( "-7 day", strtotime( $fecha ) ) ); 
            $semana2 =  date( "Y-m-d", strtotime( "-13 day", strtotime( $fecha ) ) ); 
            $year =  date( "Y-m-d", strtotime( "-1 year", strtotime( $fecha ) ) ); 
            $year2 =  date( "Y-m-d", strtotime( "-7 day", strtotime( $year ) ) ); 
            
            //ORIGEN
            $condicion = "cod_producto=14 or cod_producto=37 or cod_producto=45";
            
            $origenFecha = $origenModel -> productosOrigen($fecha,$fecha2,$condicion);
            $origenSemana = $origenModel -> productosOrigen($semana,$semana2,$condicion);
            $origenYear = $origenModel -> productosOrigen($year,$year2,$condicion);
            
            
            //MAYORISTA
            $condicionEsp = "(cod_producto=14 or cod_producto=401 or cod_producto=31) and cod_localizacion=24";
            
            $mayoristasFechaEsp = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionEsp);
            $mayoristasSemanaEsp = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionEsp);
            $mayoristasYearEsp = $mayoristasModel -> productosMayoristas($year,$year2,$condicionEsp);
            
            $condicionAle = "(cod_producto=14 or cod_producto=401 or cod_producto=31) and (cod_localizacion=6 or cod_localizacion=20 or cod_localizacion=21 or cod_localizacion=22 or cod_localizacion=23)";
            
            $mayoristasFechaAle = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionAle);
            $mayoristasSemanaAle = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionAle);
            $mayoristasYearAle = $mayoristasModel -> productosMayoristas($year,$year2,$condicionAle);
            
            $condicionFra = "(cod_producto=14 or cod_producto=401 or cod_producto=31) and (cod_localizacion=3 or cod_localizacion=4)";
            
            $mayoristasFechaFra = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionFra);
            $mayoristasSemanaFra = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionFra);
            $mayoristasYearFra = $mayoristasModel -> productosMayoristas($year,$year2,$condicionFra);
            
            $condicionRei = "(cod_producto=14 or cod_producto=401 or cod_producto=31) and cod_localizacion=5";
            
            $mayoristasFechaRei = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionRei);
            $mayoristasSemanaRei = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionRei);
            $mayoristasYearRei = $mayoristasModel -> productosMayoristas($year,$year2,$condicionRei);
            
            //mayorista tabla
            $condicionTabla = "cod_producto=14 or cod_producto=401 or cod_producto=31";
            
            $mayoristasTabla = $mayoristasModel ->productosTablaMayoristas($fecha, $fecha2, $condicionTabla);
            
            //mayorista origen
            
            $condicionOrigen = "cod_producto=14 or cod_producto=401 or cod_producto=31";
            
            $mayoristasFechaOrigen = $mayoristasModel ->productosMayoristasOrigen($fecha,$fecha2,$condicionOrigen);
            $mayoristasSemanaOrigen = $mayoristasModel ->productosMayoristasOrigen($semana,$semana2,$condicionOrigen);
            $mayoristasYearOrigen = $mayoristasModel -> productosMayoristasOrigen($year,$year2,$condicionOrigen);
                                    
            //SUPERMERCADOS
            $condicionEspSup = "(cod_producto=14 or cod_producto=37 or cod_producto=45 or cod_producto=31) and (cod_localizacion=75 or cod_localizacion=30 or cod_localizacion=11 or cod_localizacion=84 or cod_localizacion=31 or cod_localizacion=32 or cod_localizacion=10)";
            
            $supermercadoFechaEsp = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionEspSup);
            $supermercadoSemanaEsp = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionEspSup);
            $supermercadoYearEsp = $supermercadoModel -> productosSupermercado($year,$year2,$condicionEspSup);
            
            $condicionAleSup = "(cod_producto=14 or cod_producto=37 or cod_producto=45 or cod_producto=31) and (cod_localizacion=70 or cod_localizacion=79 or cod_localizacion=49 or cod_localizacion=28 or cod_localizacion=48 or cod_localizacion=45 or cod_localizacion=51 or cod_localizacion=35)";
            
            $supermercadoFechaAle = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionAleSup);
            $supermercadoSemanaAle = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionAleSup);
            $supermercadoYearAle = $supermercadoModel -> productosSupermercado($year,$year2,$condicionAleSup);
            
            $condicionFraSup = "(cod_producto=14 or cod_producto=37 or cod_producto=45 or cod_producto=31) and (cod_localizacion=19 or cod_localizacion=16)";
            
            $supermercadoFechaFra = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionFraSup);
            $supermercadoSemanaFra = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionFraSup);
            $supermercadoYearFra = $supermercadoModel -> productosSupermercado($year,$year2,$condicionFraSup);
            
            $condicionReiSup = "(cod_producto=14 or cod_producto=37 or cod_producto=45 or cod_producto=31) and (cod_localizacion=9 or cod_localizacion=41 or cod_localizacion=7 or cod_localizacion=8 or cod_localizacion=74)";
            
            $supermercadoFechaRei = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionReiSup);
            $supermercadoSemanaRei = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionReiSup);
            $supermercadoYearRei = $supermercadoModel -> productosSupermercado($year,$year2,$condicionReiSup);
            
            $condicionPolSup = "(cod_producto=14 or cod_producto=37 or cod_producto=45 or cod_producto=31) and (cod_localizacion=63 or cod_localizacion=52 or cod_localizacion=57 or cod_localizacion=54 or cod_localizacion=73)";
            
            $supermercadoFechaPol = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionPolSup);
            $supermercadoSemanaPol = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionPolSup);
            $supermercadoYearPol = $supermercadoModel -> productosSupermercado($year,$year2,$condicionPolSup);
            
            //supermercado tabla
            $condicionTablaSup = "cod_producto=14 or cod_producto=37 or cod_producto=45 or cod_producto=31";
            
            $supermercadoTabla = $supermercadoModel ->productosTablaSupermercado($fecha, $fecha2, $condicionTablaSup);
            
            //supermercado origen
            
            $condicionOrigenSup = "cod_producto=14 or cod_producto=37 or cod_producto=45 or cod_producto=31";
            
            $supermercadoFechaOrigen = $supermercadoModel ->productosSupermercadoOrigen($fecha,$fecha2,$condicionOrigenSup);
            $supermercadoSemanaOrigen = $supermercadoModel ->productosSupermercadoOrigen($semana,$semana2,$condicionOrigenSup);
            $supermercadoYearOrigen = $supermercadoModel -> productosSupermercadoOrigen($year,$year2,$condicionOrigenSup);

            $date = new \DateTime($fecha);
            $fecha = $date;

            return $this->render('judia', ['fecha' => $fecha,'origenfecha'=>$origenFecha,'origensemana'=>$origenSemana,'origenyear'=>$origenYear,'mayoristastabla'=>$mayoristasTabla
                                    ,'mayoristasfechaesp'=>$mayoristasFechaEsp,'mayoristassemanaesp'=>$mayoristasSemanaEsp,'mayoristasyearesp'=>$mayoristasYearEsp
                                    ,'mayoristasfechaale'=>$mayoristasFechaAle,'mayoristassemanaale'=>$mayoristasSemanaAle,'mayoristasyearale'=>$mayoristasYearAle
                                    ,'mayoristasfechafra'=>$mayoristasFechaFra,'mayoristassemanafra'=>$mayoristasSemanaFra,'mayoristasyearfra'=>$mayoristasYearFra
                                    ,'mayoristasfecharei'=>$mayoristasFechaRei,'mayoristassemanarei'=>$mayoristasSemanaRei,'mayoristasyearrei'=>$mayoristasYearRei
                                    ,'mayoristasfechaorigen'=>$mayoristasFechaOrigen,'mayoristassemanaorigen'=>$mayoristasSemanaOrigen,'mayoristasyearorigen'=>$mayoristasYearOrigen
                                    ,'supermercadofechaesp'=>$supermercadoFechaEsp,'supermercadosemanaesp'=>$supermercadoSemanaEsp,'supermercadoyearesp'=>$supermercadoYearEsp
                                    ,'supermercadofechaale'=>$supermercadoFechaAle,'supermercadosemanaale'=>$supermercadoSemanaAle,'supermercadoyearale'=>$supermercadoYearAle
                                    ,'supermercadofechafra'=>$supermercadoFechaFra,'supermercadosemanafra'=>$supermercadoSemanaFra,'supermercadoyearfra'=>$supermercadoYearFra
                                    ,'supermercadofecharei'=>$supermercadoFechaRei,'supermercadosemanarei'=>$supermercadoSemanaRei,'supermercadoyearrei'=>$supermercadoYearRei
                                    ,'supermercadofechapol'=>$supermercadoFechaPol,'supermercadosemanapol'=>$supermercadoSemanaPol,'supermercadoyearpol'=>$supermercadoYearPol
                                    ,'supermercadofechaorigen'=>$supermercadoFechaOrigen,'supermercadosemanaorigen'=>$supermercadoSemanaOrigen,'supermercadoyearorigen'=>$supermercadoYearOrigen
                                    ,'supermercadotabla'=>$supermercadoTabla]);
        } else {
            return $this->goHome();
        }
    }

    public function actionMelon() {
        if (!\Yii::$app->user->isGuest) {
            $origenModel = new DatosOrigen();
            $mayoristasModel = new DatosGeneralesMayoristas();
            $supermercadoModel = new DatosSupermercados();
            $nombreorigenModel = new Origen();
            
            $request = yii::$app->request;
            if (count($request->get('fecha')) != 0) {
                $fecha = $request->get('fecha');
            } else {
                $fecha = date('Y-m-d');
            }

            $fecha2 =  date( "Y-m-d", strtotime( "-6 day", strtotime( $fecha ) ) ); 
            $semana =  date( "Y-m-d", strtotime( "-7 day", strtotime( $fecha ) ) ); 
            $semana2 =  date( "Y-m-d", strtotime( "-13 day", strtotime( $fecha ) ) ); 
            $year =  date( "Y-m-d", strtotime( "-1 year", strtotime( $fecha ) ) ); 
            $year2 =  date( "Y-m-d", strtotime( "-7 day", strtotime( $year ) ) ); 
            
            //ORIGEN
            $condicion = "cod_producto=19 or cod_producto=20 or cod_producto=42";
            
            $origenFecha = $origenModel -> productosOrigen($fecha,$fecha2,$condicion);
            $origenSemana = $origenModel -> productosOrigen($semana,$semana2,$condicion);
            $origenYear = $origenModel -> productosOrigen($year,$year2,$condicion);
            
            //MAYORISTA
            $condicionEsp = "(cod_producto=20 or cod_producto=19 or cod_producto=44 or cod_producto=18 or cod_producto=48) and cod_localizacion=24";
            
            $mayoristasFechaEsp = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionEsp);
            $mayoristasSemanaEsp = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionEsp);
            $mayoristasYearEsp = $mayoristasModel -> productosMayoristas($year,$year2,$condicionEsp);
            
            $condicionAle = "(cod_producto=20 or cod_producto=19 or cod_producto=44 or cod_producto=18 or cod_producto=48) and (cod_localizacion=6 or cod_localizacion=20 or cod_localizacion=21 or cod_localizacion=22 or cod_localizacion=23)";
            
            $mayoristasFechaAle = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionAle);
            $mayoristasSemanaAle = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionAle);
            $mayoristasYearAle = $mayoristasModel -> productosMayoristas($year,$year2,$condicionAle);
            
            $condicionFra = "(cod_producto=20 or cod_producto=19 or cod_producto=44 or cod_producto=18 or cod_producto=48) and (cod_localizacion=3 or cod_localizacion=4)";
            
            $mayoristasFechaFra = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionFra);
            $mayoristasSemanaFra = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionFra);
            $mayoristasYearFra = $mayoristasModel -> productosMayoristas($year,$year2,$condicionFra);
            
            $condicionRei = "(cod_producto=20 or cod_producto=19 or cod_producto=44 or cod_producto=18 or cod_producto=48) and cod_localizacion=5";
            
            $mayoristasFechaRei = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionRei);
            $mayoristasSemanaRei = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionRei);
            $mayoristasYearRei = $mayoristasModel -> productosMayoristas($year,$year2,$condicionRei);
            
            //mayorista tabla
            $condicionTabla = "cod_producto=20 or cod_producto=19 or cod_producto=44 or cod_producto=18 or cod_producto=48";
            
            $mayoristasTabla = $mayoristasModel ->productosTablaMayoristas($fecha, $fecha2, $condicionTabla);
            
            //mayorista origen
            
            $condicionOrigen = "cod_producto=20 or cod_producto=19 or cod_producto=44 or cod_producto=18 or cod_producto=48";
            
            $mayoristasFechaOrigen = $mayoristasModel ->productosMayoristasOrigen($fecha,$fecha2,$condicionOrigen);
            $mayoristasSemanaOrigen = $mayoristasModel ->productosMayoristasOrigen($semana,$semana2,$condicionOrigen);
            $mayoristasYearOrigen = $mayoristasModel -> productosMayoristasOrigen($year,$year2,$condicionOrigen);
                                    
            //SUPERMERCADOS
            $condicionEspSup = "(cod_producto=20 or cod_producto=19 or cod_producto=18 or cod_producto=48) and (cod_localizacion=75 or cod_localizacion=30 or cod_localizacion=11 or cod_localizacion=84 or cod_localizacion=31 or cod_localizacion=32 or cod_localizacion=10)";
            
            $supermercadoFechaEsp = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionEspSup);
            $supermercadoSemanaEsp = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionEspSup);
            $supermercadoYearEsp = $supermercadoModel -> productosSupermercado($year,$year2,$condicionEspSup);
            
            $condicionAleSup = "(cod_producto=20 or cod_producto=19 or cod_producto=18 or cod_producto=48) and (cod_localizacion=70 or cod_localizacion=79 or cod_localizacion=49 or cod_localizacion=28 or cod_localizacion=48 or cod_localizacion=45 or cod_localizacion=51 or cod_localizacion=35)";
            
            $supermercadoFechaAle = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionAleSup);
            $supermercadoSemanaAle = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionAleSup);
            $supermercadoYearAle = $supermercadoModel -> productosSupermercado($year,$year2,$condicionAleSup);
            
            $condicionFraSup = "(cod_producto=20 or cod_producto=19 or cod_producto=18 or cod_producto=48) and (cod_localizacion=19 or cod_localizacion=16)";
            
            $supermercadoFechaFra = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionFraSup);
            $supermercadoSemanaFra = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionFraSup);
            $supermercadoYearFra = $supermercadoModel -> productosSupermercado($year,$year2,$condicionFraSup);
            
            $condicionReiSup = "(cod_producto=20 or cod_producto=19 or cod_producto=18 or cod_producto=48) and (cod_localizacion=9 or cod_localizacion=41 or cod_localizacion=7 or cod_localizacion=8 or cod_localizacion=74)";
            
            $supermercadoFechaRei = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionReiSup);
            $supermercadoSemanaRei = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionReiSup);
            $supermercadoYearRei = $supermercadoModel -> productosSupermercado($year,$year2,$condicionReiSup);
            
            $condicionPolSup = "(cod_producto=20 or cod_producto=19 or cod_producto=18 or cod_producto=48) and (cod_localizacion=63 or cod_localizacion=52 or cod_localizacion=57 or cod_localizacion=54 or cod_localizacion=73)";
            
            $supermercadoFechaPol = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionPolSup);
            $supermercadoSemanaPol = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionPolSup);
            $supermercadoYearPol = $supermercadoModel -> productosSupermercado($year,$year2,$condicionPolSup);
            
            //supermercado tabla
            $condicionTablaSup = "cod_producto=20 or cod_producto=19 or cod_producto=18 or cod_producto=48";
            
            $supermercadoTabla = $supermercadoModel ->productosTablaSupermercado($fecha, $fecha2, $condicionTablaSup);
            
            //supermercado origen
            
            $condicionOrigenSup = "cod_producto=20 or cod_producto=19 or cod_producto=18 or cod_producto=48";
            
            $supermercadoFechaOrigen = $supermercadoModel ->productosSupermercadoOrigen($fecha,$fecha2,$condicionOrigenSup);
            $supermercadoSemanaOrigen = $supermercadoModel ->productosSupermercadoOrigen($semana,$semana2,$condicionOrigenSup);
            $supermercadoYearOrigen = $supermercadoModel -> productosSupermercadoOrigen($year,$year2,$condicionOrigenSup);

            $date = new \DateTime($fecha);
            $fecha = $date;

            return $this->render('melon', ['fecha' => $fecha,'origenfecha'=>$origenFecha,'origensemana'=>$origenSemana,'origenyear'=>$origenYear,'mayoristastabla'=>$mayoristasTabla
                                    ,'mayoristasfechaesp'=>$mayoristasFechaEsp,'mayoristassemanaesp'=>$mayoristasSemanaEsp,'mayoristasyearesp'=>$mayoristasYearEsp
                                    ,'mayoristasfechaale'=>$mayoristasFechaAle,'mayoristassemanaale'=>$mayoristasSemanaAle,'mayoristasyearale'=>$mayoristasYearAle
                                    ,'mayoristasfechafra'=>$mayoristasFechaFra,'mayoristassemanafra'=>$mayoristasSemanaFra,'mayoristasyearfra'=>$mayoristasYearFra
                                    ,'mayoristasfecharei'=>$mayoristasFechaRei,'mayoristassemanarei'=>$mayoristasSemanaRei,'mayoristasyearrei'=>$mayoristasYearRei
                                    ,'mayoristasfechaorigen'=>$mayoristasFechaOrigen,'mayoristassemanaorigen'=>$mayoristasSemanaOrigen,'mayoristasyearorigen'=>$mayoristasYearOrigen
                                    ,'supermercadofechaesp'=>$supermercadoFechaEsp,'supermercadosemanaesp'=>$supermercadoSemanaEsp,'supermercadoyearesp'=>$supermercadoYearEsp
                                    ,'supermercadofechaale'=>$supermercadoFechaAle,'supermercadosemanaale'=>$supermercadoSemanaAle,'supermercadoyearale'=>$supermercadoYearAle
                                    ,'supermercadofechafra'=>$supermercadoFechaFra,'supermercadosemanafra'=>$supermercadoSemanaFra,'supermercadoyearfra'=>$supermercadoYearFra
                                    ,'supermercadofecharei'=>$supermercadoFechaRei,'supermercadosemanarei'=>$supermercadoSemanaRei,'supermercadoyearrei'=>$supermercadoYearRei
                                    ,'supermercadofechapol'=>$supermercadoFechaPol,'supermercadosemanapol'=>$supermercadoSemanaPol,'supermercadoyearpol'=>$supermercadoYearPol
                                    ,'supermercadofechaorigen'=>$supermercadoFechaOrigen,'supermercadosemanaorigen'=>$supermercadoSemanaOrigen,'supermercadoyearorigen'=>$supermercadoYearOrigen
                                    ,'supermercadotabla'=>$supermercadoTabla]);
        } else {
            return $this->goHome();
        }
    }

    public function actionSandia() {
        if (!\Yii::$app->user->isGuest) {
            $origenModel = new DatosOrigen();
            $mayoristasModel = new DatosGeneralesMayoristas();
            $supermercadoModel = new DatosSupermercados();
            $nombreorigenModel = new Origen();
            
            $request = yii::$app->request;
            if (count($request->get('fecha')) != 0) {
                $fecha = $request->get('fecha');
            } else {
                $fecha = date('Y-m-d');
            }

            $fecha2 =  date( "Y-m-d", strtotime( "-6 day", strtotime( $fecha ) ) ); 
            $semana =  date( "Y-m-d", strtotime( "-7 day", strtotime( $fecha ) ) ); 
            $semana2 =  date( "Y-m-d", strtotime( "-13 day", strtotime( $fecha ) ) ); 
            $year =  date( "Y-m-d", strtotime( "-1 year", strtotime( $fecha ) ) ); 
            $year2 =  date( "Y-m-d", strtotime( "-7 day", strtotime( $year ) ) ); 
            
            //ORIGEN
            $condicion = "cod_producto=15 or cod_producto=16 or cod_producto=17";
            
            $origenFecha = $origenModel -> productosOrigen($fecha,$fecha2,$condicion);
            $origenSemana = $origenModel -> productosOrigen($semana,$semana2,$condicion);
            $origenYear = $origenModel -> productosOrigen($year,$year2,$condicion);
            
            //MAYORISTA
            $condicionEsp = "(cod_producto=16) and cod_localizacion=24";
            
            $mayoristasFechaEsp = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionEsp);
            $mayoristasSemanaEsp = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionEsp);
            $mayoristasYearEsp = $mayoristasModel -> productosMayoristas($year,$year2,$condicionEsp);
            
            $condicionAle = "(cod_producto=16) and (cod_localizacion=6 or cod_localizacion=20 or cod_localizacion=21 or cod_localizacion=22 or cod_localizacion=23)";
            
            $mayoristasFechaAle = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionAle);
            $mayoristasSemanaAle = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionAle);
            $mayoristasYearAle = $mayoristasModel -> productosMayoristas($year,$year2,$condicionAle);
            
            $condicionFra = "(cod_producto=16) and (cod_localizacion=3 or cod_localizacion=4)";
            
            $mayoristasFechaFra = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionFra);
            $mayoristasSemanaFra = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionFra);
            $mayoristasYearFra = $mayoristasModel -> productosMayoristas($year,$year2,$condicionFra);
            
            $condicionRei = "(cod_producto=16) and cod_localizacion=5";
            
            $mayoristasFechaRei = $mayoristasModel -> productosMayoristas($fecha,$fecha2,$condicionRei);
            $mayoristasSemanaRei = $mayoristasModel -> productosMayoristas($semana,$semana2,$condicionRei);
            $mayoristasYearRei = $mayoristasModel -> productosMayoristas($year,$year2,$condicionRei);
            
            //mayorista tabla
            $condicionTabla = "cod_producto=16";
            
            $mayoristasTabla = $mayoristasModel ->productosTablaMayoristas($fecha, $fecha2, $condicionTabla);
            
            //mayorista origen
            
            $condicionOrigen = "cod_producto=16";
            
            $mayoristasFechaOrigen = $mayoristasModel ->productosMayoristasOrigen($fecha,$fecha2,$condicionOrigen);
            $mayoristasSemanaOrigen = $mayoristasModel ->productosMayoristasOrigen($semana,$semana2,$condicionOrigen);
            $mayoristasYearOrigen = $mayoristasModel -> productosMayoristasOrigen($year,$year2,$condicionOrigen);

            //SUPERMERCADOS
            $condicionEspSup = "(cod_producto=16 or cod_producto=52 or cod_producto=53 or cod_producto=17 or cod_producto=15) and (cod_localizacion=75 or cod_localizacion=30 or cod_localizacion=11 or cod_localizacion=84 or cod_localizacion=31 or cod_localizacion=32 or cod_localizacion=10)";
            
            $supermercadoFechaEsp = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionEspSup);
            $supermercadoSemanaEsp = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionEspSup);
            $supermercadoYearEsp = $supermercadoModel -> productosSupermercado($year,$year2,$condicionEspSup);
            
            $condicionAleSup = "(cod_producto=16 or cod_producto=52 or cod_producto=53 or cod_producto=17 or cod_producto=15) and (cod_localizacion=70 or cod_localizacion=79 or cod_localizacion=49 or cod_localizacion=28 or cod_localizacion=48 or cod_localizacion=45 or cod_localizacion=51 or cod_localizacion=35)";
            
            $supermercadoFechaAle = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionAleSup);
            $supermercadoSemanaAle = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionAleSup);
            $supermercadoYearAle = $supermercadoModel -> productosSupermercado($year,$year2,$condicionAleSup);
            
            $condicionFraSup = "(cod_producto=16 or cod_producto=52 or cod_producto=53 or cod_producto=17 or cod_producto=15) and (cod_localizacion=19 or cod_localizacion=16)";
            
            $supermercadoFechaFra = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionFraSup);
            $supermercadoSemanaFra = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionFraSup);
            $supermercadoYearFra = $supermercadoModel -> productosSupermercado($year,$year2,$condicionFraSup);
            
            $condicionReiSup = "(cod_producto=16 or cod_producto=52 or cod_producto=53 or cod_producto=17 or cod_producto=15) and (cod_localizacion=9 or cod_localizacion=41 or cod_localizacion=7 or cod_localizacion=8 or cod_localizacion=74)";
            
            $supermercadoFechaRei = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionReiSup);
            $supermercadoSemanaRei = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionReiSup);
            $supermercadoYearRei = $supermercadoModel -> productosSupermercado($year,$year2,$condicionReiSup);
            
            $condicionPolSup = "(cod_producto=16 or cod_producto=52 or cod_producto=53 or cod_producto=17 or cod_producto=15) and (cod_localizacion=63 or cod_localizacion=52 or cod_localizacion=57 or cod_localizacion=54 or cod_localizacion=73)";
            
            $supermercadoFechaPol = $supermercadoModel -> productosSupermercado($fecha,$fecha2,$condicionPolSup);
            $supermercadoSemanaPol = $supermercadoModel -> productosSupermercado($semana,$semana2,$condicionPolSup);
            $supermercadoYearPol = $supermercadoModel -> productosSupermercado($year,$year2,$condicionPolSup);
            
            //supermercado tabla
            $condicionTablaSup = "cod_producto=16 or cod_producto=52 or cod_producto=53 or cod_producto=17 or cod_producto=15";
            
            $supermercadoTabla = $supermercadoModel ->productosTablaSupermercado($fecha, $fecha2, $condicionTablaSup);
            
            //supermercado origen
            
            $condicionOrigenSup = "cod_producto=16 or cod_producto=52 or cod_producto=53 or cod_producto=17 or cod_producto=15";
            
            $supermercadoFechaOrigen = $supermercadoModel ->productosSupermercadoOrigen($fecha,$fecha2,$condicionOrigenSup);
            $supermercadoSemanaOrigen = $supermercadoModel ->productosSupermercadoOrigen($semana,$semana2,$condicionOrigenSup);
            $supermercadoYearOrigen = $supermercadoModel -> productosSupermercadoOrigen($year,$year2,$condicionOrigenSup);

            $date = new \DateTime($fecha);
            $fecha = $date;

            return $this->render('sandia', ['fecha' => $fecha,'origenfecha'=>$origenFecha,'origensemana'=>$origenSemana,'origenyear'=>$origenYear,'mayoristastabla'=>$mayoristasTabla
                                    ,'mayoristasfechaesp'=>$mayoristasFechaEsp,'mayoristassemanaesp'=>$mayoristasSemanaEsp,'mayoristasyearesp'=>$mayoristasYearEsp
                                    ,'mayoristasfechaale'=>$mayoristasFechaAle,'mayoristassemanaale'=>$mayoristasSemanaAle,'mayoristasyearale'=>$mayoristasYearAle
                                    ,'mayoristasfechafra'=>$mayoristasFechaFra,'mayoristassemanafra'=>$mayoristasSemanaFra,'mayoristasyearfra'=>$mayoristasYearFra
                                    ,'mayoristasfecharei'=>$mayoristasFechaRei,'mayoristassemanarei'=>$mayoristasSemanaRei,'mayoristasyearrei'=>$mayoristasYearRei
                                    ,'mayoristasfechaorigen'=>$mayoristasFechaOrigen,'mayoristassemanaorigen'=>$mayoristasSemanaOrigen,'mayoristasyearorigen'=>$mayoristasYearOrigen
                                    ,'supermercadofechaesp'=>$supermercadoFechaEsp,'supermercadosemanaesp'=>$supermercadoSemanaEsp,'supermercadoyearesp'=>$supermercadoYearEsp
                                    ,'supermercadofechaale'=>$supermercadoFechaAle,'supermercadosemanaale'=>$supermercadoSemanaAle,'supermercadoyearale'=>$supermercadoYearAle
                                    ,'supermercadofechafra'=>$supermercadoFechaFra,'supermercadosemanafra'=>$supermercadoSemanaFra,'supermercadoyearfra'=>$supermercadoYearFra
                                    ,'supermercadofecharei'=>$supermercadoFechaRei,'supermercadosemanarei'=>$supermercadoSemanaRei,'supermercadoyearrei'=>$supermercadoYearRei
                                    ,'supermercadofechapol'=>$supermercadoFechaPol,'supermercadosemanapol'=>$supermercadoSemanaPol,'supermercadoyearpol'=>$supermercadoYearPol
                                    ,'supermercadofechaorigen'=>$supermercadoFechaOrigen,'supermercadosemanaorigen'=>$supermercadoSemanaOrigen,'supermercadoyearorigen'=>$supermercadoYearOrigen
                                    ,'supermercadotabla'=>$supermercadoTabla]);
        } else {
            return $this->goHome();
        }
    }
    
    public function actionBuscarproducto() {
        if (!\Yii::$app->user->isGuest) {
            $boletinesModels = new Boletines();

            $request = yii::$app->request;
            if (count($request->queryParams) != 0) {
                $tipo = $request->get('informes');
                $fecha = $request->get('fecha');
                    //exit($fecha);
                    $filename = $boletinesModels->buscarPdfProducto($tipo,$fecha);
                    if(isset($filename[0]['Boletin'])){
                         //exit($filename[0]['Boletin']);           
                    //exit($filename)exit($filename[0]['Boletin']); ;  
                    $ruta = '/pdf/' . $filename[0]['Boletin'] . '.pdf';
                    //exit($ruta);
                    return $this->redirect($ruta); 
                    }else{
                        $mensaje='El informe no se encuentra disponible. Consúltelo de nuevo en las próximas horas.';
                        return $this->render('..\site\paginaerror', ['mensaje' => $mensaje]);
                    }                                    
            }
        } else {
            return $this->goHome();
        }
    }

}
