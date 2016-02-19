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
use app\models\Preciosdiarios;
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
        if (!\Yii::$app->user->isGuest) {
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
                'listaSemanas' => $listaSemanas,
                'fechaInicial' => $fechaInicial,
                'fechaFinal' => $fechaFinal
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
       }else{
        return $this->goHome();
    } 
    }
    
    public function actionMayoristas()
    {
        if (!\Yii::$app->user->isGuest) {
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
                'listaSemanas' => $listaSemanas,
                'fechaInicial' => $fechaInicial,
                'fechaFinal' => $fechaFinal
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
        }else{
        return $this->goHome();
    }
    }
    
    public function actionOrigen()
    {
        if (!\Yii::$app->user->isGuest) {
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
            
            
            return $this->render('origen', [
                'listaProductos' => $listaProductos,
                'listaYears' => $listaYears,
                'productos' => $productos,
                'origen' => $origen,
                'localizacion' => $localizacion,
                'tabla' => $resultado,
                'listaSemanas' => $listaSemanas,
                'fechaInicial' => $fechaInicial,
                'fechaFinal' => $fechaFinal
            ]);
        }else{
            return $this->render('origen', [
                'listaProductos' => $listaProductos,
                'listaYears' => $listaYears,
                'listaSemanas' => $listaSemanas
            ]);
        }
        }else{
        return $this->goHome();
    }
    }
    
    public function actionPizarraprecios(){
        if (!\Yii::$app->user->isGuest) {
        //Construimos los modelos que vamos a necesitar.
        $pizarraModel = new Preciosdiarios();
        
        // Leemos el contenido de las tablas.
        $listaProductos = $pizarraModel -> leerProductos();
        $listaAlhondigas = $pizarraModel -> leerAlhondigas();
        
        
        
        $today = date('Y-m-d');
        $today = '2015-11-27';
        $yesterday = date('Y-m-d', strtotime(' -1 day'));
        $yesterday = '2015-11-26';
        
        // Pizarra General.
        $ultimaPizarra = $this -> leerDatosUltima($today);
        $listaPizarras = $pizarraModel -> leerPizarras($today, $listaAlhondigas);
        
        // Pizarra Media Global.
        $mediasGlobales = $pizarraModel -> leerMediasGlobales($today);
        $mediasGlobales = $this -> calcularMediasArray($mediasGlobales);
        
        $mediasAnteriores = $pizarraModel ->leerMediasGlobales($yesterday);
        $mediasAnteriores = $this ->calcularMediasArray($mediasAnteriores);
        //exit(print_r($mediasAnteriores));
        // Pizarra de precio por producto.
        $listaPizarrasProducto = $listaPizarras;
        $listaPizarrasAuxiliar = array();
        // Media final de pizarra de precio por producto. Para esto hacemos una consulta nueva que nos saque las medias por alhondigas.
        $filaMedias = $pizarraModel -> extraerMediasPorCorte($today);
        $aux = 0;
        
        foreach ($listaPizarrasProducto as $pizarraProducto){
            $arrayMedias = 0;
            $contador = 0;
            $arrayMediasAnterior = 0;
            if (is_array($pizarraProducto)){
                $pizarraProducto = $this ->calcularMediasArray($pizarraProducto);
                foreach($pizarraProducto as $media){
                    $arrayMediasAnterior = $arrayMedias;
                    $arrayMedias += $media['media'];
                    
                    $arrayMedias *= 10000;
                    $arrayMediasAnterior *= 10000;
                    
                    if(intval($arrayMedias) > intval($arrayMediasAnterior)){
                        $contador++;
                    }else{
                        //
                    }
                    $arrayMedias /= 10000;
                }
                
                $mediaCalculada = $arrayMedias/$contador;
                $filaMedias[$aux]['media'] = $mediaCalculada;
                array_push($pizarraProducto, $filaMedias[$aux]);
                $aux++;
            }
            array_push($listaPizarrasAuxiliar, $pizarraProducto);
        }
        
        
        $request = yii::$app->request;
        //En base a si recibimos parametros GET/POST mandamos unos datos a la vista o mandamos otros.
        if (count($request->queryParams) != 0){
            $fechaInicial = $request -> get('fechaInicial');
            $fechaFinal = $request -> get('fechaFinal');
            $productos = $request->get('productos');
            $alhondigas = $request -> get('alhondigas');
            $corteInicial = $request -> get('corteInicial');
            $corteFinal = $request -> get('corteFinal');
            $listaProductosCabecera = $pizarraModel -> leerProductosCabecera($productos);
            $listaAlhondigasCabecera = $pizarraModel -> leerAlhondigasCabecera($alhondigas);
            $resultado = $pizarraModel ->leerPreciosPorSemana($fechaInicial, $fechaFinal, $productos, $alhondigas, $corteInicial, $corteFinal);
            $tablaSemana = $this -> construirTabla($listaAlhondigasCabecera, $listaProductosCabecera, $resultado);
            
            return $this -> render('pizarra', [
                'listaProductos' => $listaProductos,
                'listaAlhondigas' => $listaAlhondigas,
                'ultimaPizarra' => $ultimaPizarra,
                'listaPizarras' => $listaPizarras,
                'fecha' => $today,
                'mediasGlobales' => $mediasGlobales,
                'listaPizarrasProducto' => $listaPizarrasAuxiliar,
                'filaMedias' => $filaMedias,
                'fechaInicial' => $fechaInicial,
                'fechaFinal' => $fechaFinal,
                'resultado' => $resultado,
                'listaProductosCabecera' => $listaProductosCabecera,
                'listaAlhondigasCabecera' => $listaAlhondigasCabecera,
                'tablaSemana' => $tablaSemana,
                'mediasAnteriores' => $mediasAnteriores
            ]);
            
        }else{
            
        }
        
        return $this -> render('pizarra', [
            'listaProductos' => $listaProductos,
            'listaAlhondigas' => $listaAlhondigas,
            'ultimaPizarra' => $ultimaPizarra,
            'listaPizarras' => $listaPizarras,
            'fecha' => $today,
            'mediasGlobales' => $mediasGlobales,
            'listaPizarrasProducto' => $listaPizarrasAuxiliar,
            'filaMedias' => $filaMedias,
            'mediasAnteriores' => $mediasAnteriores
        ]);
        }else{
            return $this->goHome();
        }
    }
    
    public function construirTabla($listaAlhondigas, $listaProductos, $resultadoConsulta){
        $tabla = array();
        $contadorTabla = 0;
        
        
        while($contadorTabla < count($resultadoConsulta)-1){
            $fila = array();
            array_push($fila, $resultadoConsulta[$contadorTabla]['semana']);
            foreach ($listaAlhondigas as $alhondiga){
                foreach($listaProductos as $producto){
                    if($contadorTabla < count($resultadoConsulta)-1){
                        if(($producto['idProducto'] == $resultadoConsulta[$contadorTabla]['idProducto']) && (trim($alhondiga['alhondiga']) == trim($resultadoConsulta[$contadorTabla]['alhondiga']))){
                            $media = $this -> calcularMediaFila($resultadoConsulta[$contadorTabla]);
                            $contadorTabla++;
                            array_push($fila, $media);
                        }else{
                            $media = 0;
                            array_push($fila, $media);
                        }
                    }else{
                        $media = 0;
                        array_push($fila, $media);
                    }
                }
            }
            array_push($tabla, $fila);
            /*if($contadorTabla > 16 ){
                exit(print_r($listaAlhondigas));
            }*/
        }
        //exit(print_r($tabla));
        //exit(print_r($resultadoConsulta));
        //exit(print_r($tabla));
        return $tabla;
        
    }
    
    public function calcularMediaFila($producto){
        
        $contador = 0;
        $suma = 0;
        for($i = 1; $i < count($producto)-3; $i++){
            //exit(print_r(gettype($producto['corte'.$i])));
            $numero = $producto['corte'.$i];
            if(round($numero, 3) != 0){
                $suma += $producto['corte'.$i];
                $contador++;
            }
        }
        
        $suma = $suma*10000;
        $contador = $contador*10000;
        
        if ($contador != 0){
            $media = $suma/$contador;
        }else{
            $media = 0;
        }
        
        return $media;
    }
    
    
    public function calcularMediasArray($listaPrecios){
        $contador = 0;
        foreach ((array)$listaPrecios as $row){
            $media = $this -> calcularMediaCortes($row);
            $listaPrecios[$contador]['media'] = $media;
            $contador++;
        }
        
        return $listaPrecios;
    }
    
    
    public function leerDatosUltima($today){
        $pizarraModel = new Preciosdiarios();
        $ultimaAlhondiga = $pizarraModel -> leerUltimaAlhondiga($today);
        if (count($ultimaAlhondiga)>0){
            $ultimapizarra = $pizarraModel -> leerUltimaPizarra($today, $ultimaAlhondiga);
        }else{
            $ultimapizarra = "No existen registros para el día de hoy.";
        }
        
        return $ultimapizarra;
    }
    
    public function calcularMediaCortes($row){
        $sumaFila = 0;
        $contador = 0;
        $arrayMedias = array();
        for ($j = 1; $j < 16; $j++){
            if ($row['corte'.$j] != 0.000){
                $sumaFila += $row['corte'.$j];
                $contador++;
            }
        }
        
        if ($contador != 0){
            $mediaFila = $sumaFila/$contador;
            return $mediaFila;
        }else{
            return 0;
        }
        
    }
    
    
    public function actionLeersemanas(){
        
        $mayoristasModel = new DatosGeneralesMayoristas();
        $request = yii::$app->request;
        $year = $request->POST('id');
        $rows = $mayoristasModel ->leerSemanas($year);
        $rows = json_encode($rows);
        return $rows;
    }
    
    public function actionLeersemanas2(){
        if (!\Yii::$app->user->isGuest) {
        //Construimos los modelos que vamos a necesitar.
        $productModel = new Producto();
        $datosOrigenModel = new DatosOrigen();
        $localizacionModel = new Localizacion();
        $mayoristasModel = new DatosGeneralesMayoristas();
        $origenModel = new Origen();
        $supermercadosModel = new DatosSupermercados();
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
        }else{
        return $this->goHome();
    }
    }
    
}