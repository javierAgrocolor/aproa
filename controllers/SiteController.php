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
use app\models\Accesos;

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
            $accesos = new Accesos();
            $accesos->usuario = Yii::$app->user->identity->usuario;
            $accesos->fecha = date('Y-m-d H:i:s');
            $accesos->ip = $this->getRealIP();
            $accesos->save();
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
    
    public function actionDatosproductos(){
        if (!\Yii::$app->user->isGuest) {
            //Iniciamos instancia con el modelo
            $alhondigasppModels = new AlhondigasPreciosPonderados();

            $request = yii::$app->request;
            if (count($request->queryParams) != 0) {
                $producto = $request->get('prepondproducto');
                $fecha = $request->get('prepondfecha');
                $empresa = $request->get('prepondempresa');
               
                $datosProducto = $alhondigasppModels->buscarDatosProducto($producto,$fecha,$empresa);
                
                return $this->render('datosproductos',['datosProducto' => $datosProducto]);
            }
        } else {
            return $this->goHome();
        }
        
    }

    /**
     * Se encarga de gestion de datos para las diferentes graficas y tablas 
     * de precios ponderados y toneladas, consultando los valores del dia actual
     * o segun parametros introducidos por los diferentes formularios que corresponden.
     * 
     * @return type 
     */
    public function actionPreciosponderados() {
        if (!\Yii::$app->user->isGuest) {
            //Iniciamos instancia con el modelo
            $alhondigasppModels = new AlhondigasPreciosPonderados();

            // Leemos la petición POST/GET
            $request = yii::$app->request;
            //$fecha_actual2 = date('Y-m-d');
            //Si recibe pararemos busca datos segun los mismos, 
            //En caso de no recibir busca segun la fecha actual
            if (count($request->queryParams) != 0) {
                $fecha_actual = $request->get('datetimepicker2');
                $empresas = $request->get('empresas');
                $productos = $request->get('productos');
                $sd = $request->get('sd');
                $fechafin = $request->get('datetimepicker-2');
                $fechainicio = $request->get('datetimepicker-3');

                //COMPARADOR PRECIOS Y TONELADAS PP
                if ($fecha_actual!="") {
                    $ayer = $alhondigasppModels->leerDiaAnterior($fecha_actual);
                    $ayer = $ayer[0]['Fecha'];

                    $ToneladasAyer = $alhondigasppModels->consultarToneladas($ayer);
                    $PreciosAyer = $alhondigasppModels->consultarPrecios($ayer);
                    $ToneladasHoy = $alhondigasppModels->consultarToneladas($fecha_actual);
                    $PreciosHoy = $alhondigasppModels->consultarPrecios($fecha_actual);

                    $compararPrecios = array();
                    $compararToneladas = array();
                    for ($x = 0; $x < 13; $x++) {
                        if (isset($PreciosAyer[$x]['Pond_Suma']) && isset($PreciosHoy[$x]['Pond_Suma'])) {
                            if ($PreciosAyer[$x]['Pond_Suma'] < $PreciosHoy[$x]['Pond_Suma']) {
                                $compararPrecios[$x] = "<img class='flechas' src='/images/flechaVerde.png'/>";
                            } else if ($PreciosAyer[$x]['Pond_Suma'] > $PreciosHoy[$x]['Pond_Suma']) {
                                $compararPrecios[$x] = "<img class='flechas' src='/images/flechaRoja.png'/>";
                            } else {
                                $compararPrecios[$x] = "<img class='flechas' src='/images/igual.png'/>";
                            }
                        } else {
                            $compararPrecios[$x] = "";
                        }

                        if (isset($ToneladasAyer[$x]['Pond_Suma']) && isset($ToneladasHoy[$x]['Pond_Suma'])) {
                            if ($ToneladasAyer[$x]['Pond_Suma'] < $ToneladasHoy[$x]['Pond_Suma']) {
                                $compararToneladas[$x] = "<img class='flechas' src='/images/flechaVerde.png'/>";
                            } else if ($ToneladasAyer[$x]['Pond_Suma'] > $ToneladasHoy[$x]['Pond_Suma']) {
                                $compararToneladas[$x] = "<img class='flechas' src='/images/flechaRoja.png'/>";
                            } else {
                                $compararToneladas[$x] = "<img class='flechas' src='/images/igual.png'/>";
                            }
                        } else {
                            $compararPrecios[$x] = "";
                        }
                    }
                } else {
                    $compararPrecios = array();
                    $compararToneladas = array();
                }
                //

                $resultado = $alhondigasppModels->laUnion($fecha_actual);
                $resultado2 = $alhondigasppModels->casi($fecha_actual);
                $resultado3 = $alhondigasppModels->costa($fecha_actual);
                $resultado4 = $alhondigasppModels->femago($fecha_actual);
                $resultado5 = $alhondigasppModels->agroponiente($fecha_actual);
                $grafico1 = $alhondigasppModels->graficoPpt($fecha_actual);
                $grafico2 = $alhondigasppModels->graficoEvolucion($productos, $empresas, $sd, $fechafin,$fechainicio);

                return $this->render('preciosponderados', ['tablaLaunion' => $resultado, 'tablaCasi' => $resultado2, 'tablaCosta' => $resultado3
                            , 'tablaFemago' => $resultado4, 'tablaAgroponiente' => $resultado5, 'tablaGraficoppt' => $grafico1, 'tablaGraficoevolucion' => $grafico2
                            , 'tablaCompararToneladas' => $compararToneladas, 'tablaCompararPrecios' => $compararPrecios,'empresaGraEvo' => $empresas]);
            } else {
                //CODIGO PARA MOSTRAR DATOS DEL DIA ANTERIOR
                /*$fecha_actual2 = date('Y-m-d');
                if(date("l")=="Monday"){
                    $fecha_actual = date('Y-m-d', strtotime('-2 day', strtotime($fecha_actual2)));
                }else{
                    $fecha_actual = date('Y-m-d', strtotime('-1 day', strtotime($fecha_actual2)));
                }*/
                
                //CODIGO PARA MOSTRAR DASTOS DEL ULTIMO DIA DISPONIBLE
                $fecha_actual = $alhondigasppModels->leerUltimoDia();
                $fecha_actual = $fecha_actual[0]['Fecha'];
                

                //COMPARADOR PRECIOS Y TONELADAS PP
                $ayer = $alhondigasppModels->leerDiaAnterior($fecha_actual);
                $ayer = $ayer[0]['Fecha'];

                $ToneladasAyer = $alhondigasppModels->consultarToneladas($ayer);
                $PreciosAyer = $alhondigasppModels->consultarPrecios($ayer);
                $ToneladasHoy = $alhondigasppModels->consultarToneladas($fecha_actual);
                $PreciosHoy = $alhondigasppModels->consultarPrecios($fecha_actual);

                $compararPrecios = array();
                $compararToneladas = array();
                for ($x = 0; $x < 13; $x++) {
                    if (isset($PreciosAyer[$x]['Pond_Suma']) && isset($PreciosHoy[$x]['Pond_Suma'])) {
                        if ($PreciosAyer[$x]['Pond_Suma'] < $PreciosHoy[$x]['Pond_Suma']) {
                            $compararPrecios[$x] = "<img class='flechas' src='/images/flechaVerde.png'/>";
                        } else if ($PreciosAyer[$x]['Pond_Suma'] > $PreciosHoy[$x]['Pond_Suma']) {
                            $compararPrecios[$x] = "<img class='flechas' src='/images/flechaRoja.png'/>";
                        } else {
                            $compararPrecios[$x] = "<img class='flechas' src='/images/igual.png'/>";
                        }
                    } else {
                        $compararPrecios[$x] = "";
                    }

                    if (isset($ToneladasAyer[$x]['Pond_Suma']) && isset($ToneladasHoy[$x]['Pond_Suma'])) {
                        if ($ToneladasAyer[$x]['Pond_Suma'] < $ToneladasHoy[$x]['Pond_Suma']) {
                            $compararToneladas[$x] = "<img class='flechas' src='/images/flechaVerde.png'/>";
                        } else if ($ToneladasAyer[$x]['Pond_Suma'] > $ToneladasHoy[$x]['Pond_Suma']) {
                            $compararToneladas[$x] = "<img class='flechas' src='/images/flechaRoja.png'/>";
                        } else {
                            $compararToneladas[$x] = "<img class='flechas' src='/images/igual.png'/>";
                        }
                    } else {
                        $compararPrecios[$x] = "";
                    }
                }
                //

                $resultado = $alhondigasppModels->laUnion($fecha_actual);
                $resultado2 = $alhondigasppModels->casi($fecha_actual);
                $resultado3 = $alhondigasppModels->costa($fecha_actual);
                $resultado4 = $alhondigasppModels->femago($fecha_actual);
                $resultado5 = $alhondigasppModels->agroponiente($fecha_actual);
                $grafico1 = $alhondigasppModels->graficoPpt($fecha_actual);

                return $this->render('preciosponderados', ['tablaLaunion' => $resultado, 'tablaCasi' => $resultado2, 'tablaCosta' => $resultado3
                            , 'tablaFemago' => $resultado4, 'tablaAgroponiente' => $resultado5, 'tablaGraficoppt' => $grafico1
                            , 'tablaCompararToneladas' => $compararToneladas, 'tablaCompararPrecios' => $compararPrecios]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Busca el pdf en cuestien de la categoria indicada.
     * En casa de que la categoria de Historico u Otros,
     * extrae el listado de los distintos enlaces y los manda
     * a una pagina nueva para generar dicho contenido en modo de paginacion.
     * En caso de obtener un unico archivo lo manda para que se abra en el navegador.
     * @return type
     */
    public function actionBuscar() {
        if (!\Yii::$app->user->isGuest) {
            $boletinesModels = new Boletines();

            $request = yii::$app->request;
            if (count($request->queryParams) != 0) {
                $tipo = $request->get('informes');
                if ($tipo != 'Historico' && $tipo != 'Otros' && $tipo != 'Cuotasmercado') {
                    $filename = $boletinesModels->buscarPdf($tipo);
                    //exit($filename[0]['Boletin']);  
                    $ruta = '/pdf/' . $filename[0]['Boletin'] . '.pdf';
                    //exit($ruta);
                    return $this->redirect($ruta);
                } else {
                    if ($tipo != 'Otros' && $tipo != 'Historico') {
                        $cuotasmercado = $boletinesModels->buscarCuotasmercado();
                        return $this->render('cuotasmercado', ['tablaCuotasmercado' => $cuotasmercado]);
                    } else if ($tipo != 'Otros') {
                        $historico = $boletinesModels->buscarHistorico();
                        return $this->render('historico', ['tablaHistorico' => $historico]);
                    } else {
                        $otros = $boletinesModels->buscarOtros();
                        return $this->render('otros', ['tablaOtros' => $otros]);
                    }
                }
            }
        } else {
            return $this->goHome();
        }
    }

    public function actionBoletines() {
        if (!\Yii::$app->user->isGuest) {
            $request = yii::$app->request;
            if (count($request->queryParams) != 0) {
                $fecha = $request->get('fecha');
                $fecha2 = $request->get('diano');
                $sumres = $request->get('sumres');
                if(isset($fecha)){
                    $dia = (date('z Y', strtotime($fecha)))+1;	
                    $anio = date('Y', strtotime($fecha));
                    $diano = $anio."-".$dia;	
                }else if(isset($fecha2)){
                    if($sumres=='true'){
                        $fecha = date('Y-m-d', strtotime('-1 day', strtotime($fecha2)));
                        $dia = (date('z Y', strtotime($fecha)))+1;	
                        $anio = date('Y', strtotime($fecha));
                        $diano = $anio."-".$dia;
                    }else if($sumres=='false'){
                        $fecha = date('Y-m-d', strtotime('+1 day', strtotime($fecha2)));
                        $dia = (date('z Y', strtotime($fecha)))+1;	
                        $anio = date('Y', strtotime($fecha));
                        $diano = $anio."-".$dia;
                    }else{
                        $fecha = date('Y-m-d');
			$dia = (date('z Y', strtotime($fecha)))+1;	
                        $anio = date('Y', strtotime($fecha));
                        $diano = $anio."-".$dia;
                    }                    
                }
                
                //$diano = $request->get('diano');
                return $this->render('boletindiario', ['diano' => $diano,'fecha'=>$fecha]);
            }
        } else {
            return $this->goHome();
        }
    }

    /**
     * Abre un pdf segun la ruta indicada.
     * @return type
     */
    public function actionAbrirpdf() {
        if (!\Yii::$app->user->isGuest) {
            $request = yii::$app->request;
            if (count($request->queryParams) != 0) {
                $pdf = $request->get('informes');
                return $this->redirect('/pdf/' . $pdf . '.pdf');
            }
        } else {
            return $this->goHome();
        }
    }

    public function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];

        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];

        return $_SERVER['REMOTE_ADDR'];
    }

}
