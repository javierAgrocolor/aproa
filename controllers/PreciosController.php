<?php


// estoy mirando esta mierda a ver que le pasa.
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\DatosGeneralesMayoristas;
use app\models\Producto;
use app\models\Origen;

class PreciosController extends Controller
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

    public function actionMayoristas()
    {
        $mayoristas = DatosGeneralesMayoristas::find()->where('id = 4138')->all();
        //Construimos los modelos que vamos a necesitar.
        $productModel = new Producto();
        $origenModel = new Origen();
        
        // Leemos el contenido de las tablas.
        $producto = $productModel->leerTodos();
        $origen = $origenModel->leerTodos();
        
        if ($mayoristas === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('mayoristas', [
            'mayoristas' => $mayoristas,
            'producto' => $producto,
            'origen' => $origen
        ]);
    }
    
    public function actionOrigen()
    {
        
    }
    
    public function actionSupermercados()
    {
        
    }
    
    
}