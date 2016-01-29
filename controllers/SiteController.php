<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\AlhondigasPreciosPonderados;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Boletines;

class SiteController extends Controller {

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

    public function actionIndex() {
        //return $this->render('index');
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
        }
        return $this->render('login', ['model' => $model,]);
    }

    public function actionLogin() {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
        }
        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionLogout() {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionPreciosponderados() {
        $alhondigasppModels = new AlhondigasPreciosPonderados();
        //$alhondigasppModels2 = new AlhondigasPreciosPonderados();
        // Leemos la petición POST/GET
        $request = yii::$app->request;
        //$fecha_actual2 = date('Y-m-d');
        if (count($request->queryParams) != 0) {
            $fecha_actual = $request->get('datetimepicker2');
            $empresas = $request->get('empresas');
            $productos = $request->get('productos');
            $sd = $request->get('sd');
            $fechafin = $request->get('datetimepicker-2');

            $resultado = $alhondigasppModels->laUnion($fecha_actual);
            $resultado2 = $alhondigasppModels->casi($fecha_actual);
            $resultado3 = $alhondigasppModels->costa($fecha_actual);
            $resultado4 = $alhondigasppModels->femago($fecha_actual);
            $resultado5 = $alhondigasppModels->agroponiente($fecha_actual);
            $grafico1 = $alhondigasppModels->graficoPpt($fecha_actual);
            $grafico2 = $alhondigasppModels->graficoEvolucion($productos, $empresas, $sd, $fechafin);
            return $this->render('preciosponderados', ['tablaLaunion' => $resultado, 'tablaCasi' => $resultado2, 'tablaCosta' => $resultado3
                        , 'tablaFemago' => $resultado4, 'tablaAgroponiente' => $resultado5, 'tablaGraficoppt' => $grafico1, 'tablaGraficoevolucion' => $grafico2]);
        } else {
            $fecha_actual = date('Y-m-d');

            $resultado = $alhondigasppModels->laUnion($fecha_actual);
            $resultado2 = $alhondigasppModels->casi($fecha_actual);
            $resultado3 = $alhondigasppModels->costa($fecha_actual);
            $resultado4 = $alhondigasppModels->femago($fecha_actual);
            $resultado5 = $alhondigasppModels->agroponiente($fecha_actual);
            $grafico1 = $alhondigasppModels->graficoPpt($fecha_actual);

            return $this->render('preciosponderados', ['tablaLaunion' => $resultado, 'tablaCasi' => $resultado2, 'tablaCosta' => $resultado3
                        , 'tablaFemago' => $resultado4, 'tablaAgroponiente' => $resultado5, 'tablaGraficoppt' => $grafico1]);
        }
        /*
          if (count($request->queryParams) != 0){
          $empresas = $request->get('empresas');
          $productos = $request->get('productos');
          $tipo = $request->get('tipo');
          $fechaini = $request->get('datetimepicker2');
          $fechafin = $request->get('datetimepicker-2');

          $resultado = $alhondigasppModels ->leerDatos($productos,$empresas,$tipo,$fechaini,$fechafin);

          return $this->render('preciosponderados',['tabla'=>$resultado]);
          }else{
          //return $this->render('preciosponderados');
          } */
    }

    public function actionBuscar() {
        $boletinesModels = new Boletines();

        $request = yii::$app->request;
        if (count($request->queryParams) != 0) {
            $tipo = $request->get('informes');
            if ($tipo != 'Historico' && $tipo != 'Otros') {
                $filename = $boletinesModels->buscarPdf($tipo);
                //exit($filename[0]['Boletin']);           
                return $this->redirect('/aproa/pdf/' . $filename[0]['Boletin'] . '.pdf');
            } else {
                if ($tipo != 'Otros') {
                    $historico = $boletinesModels->buscarHistorico();
                    return $this->render('historico', ['tablaHistorico' => $historico]);
                } else {
                    $otros = $boletinesModels->buscarOtros();
                    return $this->render('otros', ['tablaOtros' => $otros]);
                }
            }
        }
    }

    public function actionAbrirpdf() {
        $request = yii::$app->request;
        if (count($request->queryParams) != 0) {
            $pdf = $request->get('informes');
            return $this->redirect('/aproa/pdf/' . $pdf . '.pdf');
        }
    }

}
