<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\AlhondigasPreciosPonderados;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
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

    public function actions()
    {
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

    public function actionIndex()
    {
        //return $this->render('index');
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('index');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogin()
    {
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

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionPreciosponderados(){
        $alhondigasppModels = new AlhondigasPreciosPonderados();
        //$alhondigasppModels2 = new AlhondigasPreciosPonderados();
        // Leemos la petición POST/GET
        $request = yii::$app->request;
        //$fecha_actual2 = date('Y-m-d');
        $fecha_actual = '2016-01-20';
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
         }*/
            $resultado = $alhondigasppModels ->laUnion($fecha_actual);
            $resultado2 = $alhondigasppModels ->casi($fecha_actual);
            return $this->render('preciosponderados',['tablaLaunion'=>$resultado,'tablaCasi'=>$resultado2]);
            
            
            
        
    }
}
