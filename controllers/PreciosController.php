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
use app\models\DatosOrigen;
use app\models\DatosSupermercados;
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

    public function actionSupermercados()
    {
        // Construimos los modelos que vamos a necesitar.
        $supermercadosModel = new DatosSupermercados();
        $productModel = new Producto();
        $origenModel = new Origen();
        $localizacionModel = new Localizacion();
        
        
        // Leemos el contenido de las tablas. 
        $listaProductos = $productModel -> leerTodos();
        $listaOrigenes = $origenModel -> leerTodos();
        $listaLocalizaciones = $localizacionModel -> leerTodos();
        $listaYears = $supermercadosModel -> leerYears();
        
        $contadorYears = count($listaYears);
        $listaSemanas = $supermercadosModel -> leerSemanas($listaYears[$contadorYears-2]['year']);
        
        // Leemos la petición POST/GET
        $request = yii::$app->request;
        // En base a si recibimos parámetros GET/POST mandamos unos datos a la vista o mandamos otros.
        if (count($request->queryParams) != 0){
            $productos = $request->get('productos');
            $origen = $request->get('origen');
            $localizacion = $request->get('localizacion');
            $fechaInicial = $request->get('fechaInicial');
            $fechaFinal = $request->get('fechaFinal');
            $tipoConsulta = $request->get('opcionesConsulta');
            $semanas = $request->get('semanas');
            // Establecemos la consulta de datos con los parametros recibidos.            
            $resultado = $supermercadosModel ->leerDatos($productos, $origen, $localizacion, $fechaInicial, $fechaFinal, $tipoConsulta, $semanas);
            
            
            return $this->render('supermercados', [
                'listaProductos' => $listaProductos,
                'listaOrigenes' => $listaOrigenes,
                'listaLocalizaciones' => $listaLocalizaciones,
                'listaYears' => $listaYears,
                'productos' => $productos,
                'origen' => $origen,
                'localizacion' => $localizacion,
                'tabla' => $resultado,
                'listaSemanas' => $listaSemanas
            ]);
        }else{
            return $this->render('supermercados', [
                'listaProductos' => $listaProductos,
                'listaOrigenes' => $listaOrigenes,
                'listaLocalizaciones' => $listaLocalizaciones,
                'listaYears' => $listaYears,
                'listaSemanas' => $listaSemanas
            ]);
        }
        
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
        $listaYears = $mayoristasModel -> leerYears();
        
        $contadorYears = count($listaYears);
        $listaSemanas = $mayoristasModel ->leerSemanas($listaYears[$contadorYears-2]['year']);
        
        
        
        // Leemos la petición POST/GET
        $request = yii::$app->request;
        
        // En base a si recibimos parámetros GET/POST mandamos unos datos a la vista o mandamos otros.
        if (count($request->queryParams) != 0){
            $productos = $request->get('productos');
            $origen = $request->get('origen');
            $localizacion = $request->get('localizacion');
            $fechaInicial = $request->get('fechaInicial');
            $fechaFinal = $request->get('fechaFinal');
            $tipoConsulta = $request->get('opcionesConsulta');
            $semanas = $request->get('semanas');
            // Establecemos la consulta de datos con los parametros recibidos.            
            $resultado = $mayoristasModel ->leerDatos($productos, $origen, $localizacion, $fechaInicial, $fechaFinal, $tipoConsulta, $semanas);
            
            
            return $this->render('mayoristas', [
                'listaProductos' => $listaProductos,
                'listaOrigenes' => $listaOrigenes,
                'listaLocalizaciones' => $listaLocalizaciones,
                'listaYears' => $listaYears,
                'productos' => $productos,
                'origen' => $origen,
                'localizacion' => $localizacion,
                'tabla' => $resultado,
                'listaSemanas' => $listaSemanas
        ]);
        }else{
            return $this->render('mayoristas', [
                'listaProductos' => $listaProductos,
                'listaOrigenes' => $listaOrigenes,
                'listaLocalizaciones' => $listaLocalizaciones,
                'listaYears' => $listaYears,
                'listaSemanas' => $listaSemanas
        ]);
        }
    }
    
    public function actionOrigen()
    {
        //Construimos los modelos que vamos a necesitar.
        $productModel = new Producto();
        $origenModel = new DatosOrigen();
        
        // Leemos el contenido de las tablas.
        $listaProductos = $productModel ->leerTodos();
        $listaYears = $origenModel -> leerYears();
        
        $contadorYears = count($listaYears);
        $listaSemanas = $origenModel ->leerSemanas($listaYears[$contadorYears-2]['year']);
        
        // Leemos la petición POST/GET
        $request = yii::$app->request;
        
        // En base a si recibimos parámetros GET/POST mandamos unos datos a la vista o mandamos otros.
        if (count($request->queryParams) != 0){
            $productos = $request->get('productos');
            $origen = $request->get('origen');
            $localizacion = $request->get('localizacion');
            $fechaInicial = $request->get('fechaInicial');
            $fechaFinal = $request->get('fechaFinal');
            $tipoConsulta = $request->get('opcionesConsulta');
            $semanas = $request->get('semanas');
            // Establecemos la consulta de datos con los parametros recibidos.
            $resultado = $origenModel ->leerDatos($productos, $fechaInicial, $fechaFinal, $tipoConsulta, $semanas);
            
            
            return $this->render('supermercados', [
                'listaProductos' => $listaProductos,
                'listaYears' => $listaYears,
                'productos' => $productos,
                'origen' => $origen,
                'localizacion' => $localizacion,
                'tabla' => $resultado,
                'listaSemanas' => $listaSemanas
            ]);
        }else{
            return $this->render('supermercados', [
                'listaProductos' => $listaProductos,
                'listaYears' => $listaYears,
                'listaSemanas' => $listaSemanas
        ]);
        }
        
    }
    
    public function actionLeersemanas(){
        
        $mayoristasModel = new DatosGeneralesMayoristas();
        $request = yii::$app->request;
        $year = $request->POST('id');
        /*print_r($year);
        exit();*/
        $rows = $mayoristasModel ->leerSemanas($year);
        $rows = json_encode($rows);
        return $rows;
    }
    
    public function actionLeersemanas2(){
        
        //Construimos los modelos que vamos a necesitar.
        $productModel = new Producto();
        $datosOrigenModel = new DatosOrigen();
        $localizacionModel = new Localizacion();
        $mayoristasModel = new DatosGeneralesMayoristas();
        $origenModel = new Origen();
        // Leemos el contenido de las tablas.
        $listaProductos = $productModel->leerTodos();
        $listaOrigenes = $origenModel->leerTodos();
        $listaLocalizaciones = $localizacionModel -> leerTodos();
        $listaYears = $mayoristasModel -> leerYears();

        $request = yii::$app->request;
        $year = $request->get('year');
        $tipoConsultaSemanas = $request ->get('tipoConsultaSemanas');
        
        if ($tipoConsultaSemanas == 'origen'){
            $listaSemanas = $datosOrigenModel -> leerSemanas($year);
            
            return $this -> render ('origen', [
                'listaProductos' => $listaProductos,
                'listaYears' => $listaYears,
                'listaSemanas' => $listaSemanas,
                'year' => $year
            ]);
            
        }else{
            if ($tipoConsultaSemanas == 'mayoristas'){
                $listaSemanas = $mayoristasModel -> leerSemanas($year);
            }else{
                if ($tipoConsultaSemanas == 'supermercados'){
                    $listaSemanas = $supermercadosModel -> leerSemanas($year);
                }
            }
            return $this->render('mayoristas', [
                'listaProductos' => $listaProductos,
                'listaOrigenes' => $listaOrigenes,
                'listaLocalizaciones' => $listaLocalizaciones,
                'listaYears' => $listaYears,
                'listaSemanas' => $listaSemanas,
                'year' => $year
                ]);
            
        }
    }

}