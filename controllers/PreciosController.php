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
use app\models\Presentacion;
use app\models\Localizacion;

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
        
        //Construimos los modelos que vamos a necesitar.
        $productModel = new Producto();
        $origenModel = new Origen();
        $localizacionModel = new Localizacion();
        $mayoristasModel = new DatosGeneralesMayoristas();
        // Leemos el contenido de las tablas.
        $listaProductos = $productModel->leerTodos();
        $listaOrigenes = $origenModel->leerTodos();
        $listaLocalizaciones = $localizacionModel -> leerTodos();
        
        
        
        // Leemos la petición POST/GET
        $request = yii::$app->request;
        
        // En base a si recibimos parámetros GET/POST mandamos unos datos a la vista o mandamos otros.
        if (count($request->queryParams) != 0){
            $productos = $request->get('productos');
            $origen = $request->get('origen');
            $localizacion = $request->get('localizacion');
            $fechaInicial = $request->get('fechaInicial');
            $fechaFinal = $request->get('fechaFinal');
            
            // Establecemos la consulta de datos con los parametros recibidos.            
            $resultado = $mayoristasModel ->leerDatos($productos, $origen, $localizacion, $fechaInicial, $fechaFinal);
            
            
            return $this->render('mayoristas', [
                'listaProductos' => $listaProductos,
                'listaOrigenes' => $listaOrigenes,
                'listaLocalizaciones' => $listaLocalizaciones,
                'productos' => $productos,
                'origen' => $origen,
                'localizacion' => $localizacion,
                'tabla' => $resultado
        ]);
        }else{
            return $this->render('mayoristas', [
                'listaProductos' => $listaProductos,
                'listaOrigenes' => $listaOrigenes,
                'listaLocalizaciones' => $listaLocalizaciones
        ]);
        }
    }
    
    public function actionLeermayoristas(){
        $request = yii::$app->request;
        $origen = $request->get('productos');
        return $this -> render('prueba',[
            'productos' => $origen
        ]);
    }
    
    public function actionOrigen()
    {
        
    }
    
    public function actionSupermercados()
    {
        
    }
    
    
}