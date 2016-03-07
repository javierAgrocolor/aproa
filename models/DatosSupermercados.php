<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Datos_Supermercados".
 *
 * @property string $id
 * @property string $fecha
 * @property integer $cod_producto
 * @property integer $cod_categoria
 * @property integer $cod_presentacion
 * @property integer $cod_localizacion
 * @property integer $cod_origen
 * @property double $precio
 */
class DatosSupermercados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Datos_Supermercados';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['cod_producto', 'cod_categoria', 'cod_presentacion', 'cod_localizacion', 'cod_origen'], 'integer'],
            [['precio'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'cod_producto' => 'Cod Producto',
            'cod_categoria' => 'Cod Categoria',
            'cod_presentacion' => 'Cod Presentacion',
            'cod_localizacion' => 'Cod Localizacion',
            'cod_origen' => 'Cod Origen',
            'precio' => 'Precio',
        ];
    }
    
    /**
     * Devuelve las fechas distintas y las semanas a las que corresponden según la campaña proporcionada.
     * @param type Año Inicial
     * @param type Año Final
     * @return Array
     */
    public function leerSemanas($fechaInicial){
        
        $fechaFinal = $fechaInicial + 1;
        $query = new \yii\db\Query();
        $query ->select(['distinct fecha, convert(varchar(10),fecha,103) as fechaCorta, datepart(week,fecha) as week'])
                ->from('Datos_supermercados')
                ->where("fecha>'01-08-".$fechaInicial."'and fecha<'31-07-".$fechaFinal."'")
                ->groupBy('fecha')
                ->orderBy('Datos_Supermercados.fecha');
        $rows = $query -> all(DatosSupermercados::getDb());
        return $rows;
    }
    
    /**
     * Devuelve los datos filtrados por localizaciones, origenes y productos o devuelve las medias del precio de lo filtrado por localizaciones, origenes y productos. 
     * @return Array
     * @param Array $productos Contiene los códigos de los productos a filtrar.
     * @param Array $origen Contiene los códigos de los origenes a filtrar.
     * @param Array $localizacion Contiene los códigos de las localizaciones a filtrar.
     */
    public function leerDatos($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal, $tipoConsulta, $semanas, $presentaciones){
        
        if ($tipoConsulta == "consultaMedias"){
            $condiciones = $this -> generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal, $presentaciones);
            $rows = $this -> consultarMediasDosFechas($condiciones);
        }
        if ($tipoConsulta == "consultaNormal"){
            $condiciones = $this -> generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal, $presentaciones);
            $rows = $this -> consultarTodos($condiciones);
        }
        
        if ($tipoConsulta == "consultaSemanal"){
            $condiciones = $this -> generarCondicionesSemanales($productos, $origenes, $localizaciones, $semanas, $presentaciones);
            $rows = $this -> consultarMediasSemanales($condiciones);
        }
        return $rows;
    }
    
    /**
     * Devuelve una consulta con todos los años registrados dentro de la tabla de mayoristas.
     * @return Array
     */
    public function leerYears(){
        $query = new \yii\db\Query();
        $query ->select(['distinct datepart(year,fecha) as year'])
                ->from('Datos_Supermercados')
                ->orderBy('year');
        $rows = $query->all(DatosSupermercados::getDb());
        return $rows;
    }
    
    public function leerUltimaFecha(){
        $query = new \yii\db\Query();
        $query -> select ('fecha')
                -> distinct ('fecha')
                -> from ('Datos_Supermercados')
                -> orderBy('fecha desc')
                -> limit(1);
        $rows = $query -> all(DatosSupermercados::getDb());
        return $rows;
    }
    
    
    /**
     * Genera un String con las condiciones de los filtros del where si es que los hay.
     * @param Array $productos
     * @param Array $origenes
     * @param Array $localizaciones
     * @param Array $fechaInicial
     * @param Array $fechaFinal
     * @param Array $presentaciones
     * @return string
     */
    public function generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal, $presentaciones){
        $condiciones = "Datos_Supermercados.cod_categoria = 1";
        if (isset($productos)){
            $condiciones = $this -> generarCondProductos($productos, $condiciones);
        }

        if (isset($origenes)){
            $condiciones = $this -> generarCondOrigenes($origenes, $condiciones);
        }

        if (isset($localizaciones)){
            $condiciones = $this -> generarCondLocalizaciones($localizaciones, $condiciones);
        }
        
        if (isset($presentaciones)){
            $condiciones = $this -> generarCondPresentaciones($presentaciones, $condiciones);
        }

        if ($fechaInicial != ""){
            $condiciones .= " and Datos_Supermercados.fecha >= convert(datetime,'".$fechaInicial."')";
        }

        if ($fechaFinal != ""){
            $condiciones .= " and Datos_Supermercados.fecha <= convert(datetime,'".$fechaFinal."')";
        }
        return $condiciones;
    }
    
    /**
     * Genera un String con las condiciones de los filtros del where si es que los hay para las consultas semanales.
     * @param Array $productos
     * @param Array $origenes
     * @param Array $localizaciones
     * @param Array $semanas
     * @param Array $presentaciones
     */
    public function generarCondicionesSemanales($productos, $origenes, $localizaciones, $semanas, $presentaciones){
        $condiciones = "Datos_supermercados.cod_categoria = 1";
        
        if ($productos[0] !== ""){
            $condiciones = $this -> generarCondProductos($productos, $condiciones);
        }
        
        if ($origenes[0] !== ""){
            $condiciones = $this -> generarCondOrigenes($origenes, $condiciones);
        }
        
        if ($localizaciones[0] !== ""){
            $condiciones = $this -> generarCondLocalizaciones($localizaciones, $condiciones);
        }
        
        if($presentaciones[0] !== ""){
            $condiciones = $this ->generarCondPresentaciones($presentaciones, $condiciones);
        }
        
        if ($semanas[0] !== ""){
            $condiciones = $this -> generarCondSemanas($semanas, $condiciones);
        }
        
        return $condiciones;
    }
    
    /**
     * Genera la condición del filtro de productos.
     * @param Array $productos
     * @return string
     */
    public function generarCondProductos($productos, $condiciones){
        $contador = 0;
        if(isset($productos)){
            $condiciones .= " and Datos_Supermercados.cod_producto in (";
            foreach($productos as $producto){
                if ($contador == 0){
                    $condiciones .= $producto;
                }else{
                    $condiciones .= ",".$producto;
                }
                    $contador++;
            }
            $condiciones .= ")";
        }
        return $condiciones;
    }
    
    /**
     * Genera un string con las condiciones del filtro de Origenes.
     * @param Array $origenes
     * @return string
     */
    public function generarCondOrigenes($origenes, $condiciones){
        $contador = 0;
        if(isset($origenes)){
            $condiciones .= " and Datos_Supermercados.cod_origen in (";
            foreach($origenes as $origen){
                if ($contador == 0){
                    $condiciones .= $origen;
                }else{
                    $condiciones .= ",".$origen;
                }
                $contador++;
            }
            $condiciones .= ")";
        }
        return $condiciones;
    }
    
    /**
     * Genera un string con las condiciones del filtro de Localizaciones.
     * @param type $localizaciones
     * @return string
     */
    public function generarCondLocalizaciones($localizaciones, $condiciones){
        $contador = 0;
        if(isset($localizaciones)){
            $condiciones .= " and Datos_Supermercados.cod_localizacion in (";
            foreach ($localizaciones as $localizacion){
                if ($contador == 0){
                    $condiciones .= $localizacion;
                }else{
                    $condiciones .= ",".$localizacion;
                }
                $contador++;
            }
            $condiciones .= ")";
        }
        return $condiciones;
    }
    
    /**
     * Genera un string con las condiciones del filtro de presentaciones.
     * @param type $presentaciones
     * @param type $condiciones
     * @return string
     */
    public function generarCondPresentaciones($presentaciones, $condiciones){
        $contador = 0;
        if (isset($presentaciones)){
            $condiciones .= " and Datos_Supermercados.cod_presentacion in (";
            foreach ($presentaciones as $presentacion){
                if($contador == 0){
                    $condiciones .= $presentacion;
                }else{
                    $condiciones .= ",".$presentacion;
                }
                $contador++;
            }
            $condiciones .= ")";
        }
        return $condiciones;
    }
    
    
    /**
     * Devuelve un string con las condiciones del filtro de Semanas para la consultas semanales.
     * @param Array $semanas
     * @param string $condiciones
     */
    public function generarCondSemanas($semanas, $condiciones){
        $contador = 0;
        if(isset($semanas)){
            $condiciones .= " and DATEPART(week, Datos_supermercados.fecha) in (";
            // Recorremos una vez el array para añadir la condición de la semana.
            foreach($semanas as $semana){
                if ($contador === 0){
                    $condiciones .= substr($semana, 0, 2);
                }else{
                    $condiciones .= ",".substr($semana, 0, 2);
                }
                $contador++;
            }
            $condiciones .= ")";

            // Recorremos otra vez el array para añadir la condición del año (ya que la semana se repite año a año).
            $condiciones .= " and DATEPART(year, Datos_supermercados.fecha) in (";
            $contador = 0;
            foreach ($semanas as $semana){
                if ($contador === 0){
                    $condiciones .= substr($semana, 3, 4);
                }else{
                    $condiciones .= ",".substr($semana, 3, 4);
                }
                $contador++;
            }
            $condiciones .= ")";
        }
        return $condiciones;
    }
    
    /**
     * Devuelve una consulta con las medias para distintas semanas 
     * @param string $condiciones
     */
    public function consultarMediasSemanales($condiciones){
        $query = new \yii\db\Query();
        $query -> select(['producto.producto, Localizacion.Localizacion, origen.origen, Round(avg(precio),3) as preciomedio, DATEPART(week, Datos_Supermercados.fecha) as Semana, presentacion.presentacion'])
                -> from('Datos_Supermercados')
                -> innerJoin('Origen', 'Origen.codigo_origen = Datos_Supermercados.cod_origen')
                -> innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_Supermercados.cod_localizacion')
                -> innerJoin('Producto', 'Producto.codigo_producto = Datos_Supermercados.cod_producto')
                -> innerJoin('presentacion', 'presentacion.presentacion = Datos_Supermercados.cod_presentacion')
                ->where($condiciones)
                ->groupBy(['Producto', 'Localizacion', 'Origen', 'presentacion','DATEPART(week, Datos_Supermercados.fecha)'])
                ->orderBy('Semana');
        $rows = $query -> all(DatosSupermercados::getDb());
        return $rows;
    }
    
    /**
     * Devuelve una consulta con las medias agrupadas por producto, localización y origen entre dos fechas.
     * @param string $condiciones
     * @return Array
     */
    public function consultarMediasDosFechas($condiciones){
        
        $query = new \yii\db\Query();
        $query->select(['producto.producto, Localizacion.Localizacion, origen.origen, presentacion.presentacion, Round(avg(precio),3) as preciomedio'])
                ->from('Datos_Supermercados')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_Supermercados.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_Supermercados.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_Supermercados.cod_producto')
                ->innerJoin('presentacion', 'presentacion.codigo = Datos_Supermercados.cod_presentacion')
                ->where($condiciones)
                ->groupBy(['Producto', 'Localizacion', 'Origen', 'presentacion']);
        $rows = $query->all(DatosSupermercados::getDb());
        return $rows;
    }
    
    /**
     * Devuelve los datos filtrados por localizaciones, origenes y productos.
     * @param String $condiciones
     * @return Array
     */
    public function consultarTodos($condiciones){
        $query = new \yii\db\Query();
        $query->select('*')
                ->from('Datos_Supermercados')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_Supermercados.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_Supermercados.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_Supermercados.cod_producto')
                ->innerJoin('presentacion', 'presentacion.codigo = Datos_Supermercados.cod_presentacion')
                ->where($condiciones);
        $rows = $query->all(DatosSupermercados::getDb());
        return $rows;
    }
    
    public function leerProductos(){
        $query = new \yii\db\Query();
        $query -> select('producto.producto, Datos_Supermercados.cod_producto')
                -> distinct('Datos_Supermercados.cod_producto')
                -> from('Datos_Supermercados')
                -> innerJoin('Producto', 'Producto.codigo_producto = Datos_Supermercados.cod_producto')
                -> where('Producto.codigo_producto in (12,13,401,14,37,31,45,20,18,49,73,19,48,30,32,33,28,7,6,5,11,10,9,8,16,53,17,15,41,3,22,2,1,40,4,25,46,26,24)')
                -> orderBy('producto.producto');
        $rows = $query -> all(DatosSupermercados::getDb());
        return $rows;
    }
    
    public function leerLocalizaciones(){
        $query = new \yii\db\Query();
        $query -> select('Localizacion.Localizacion, Datos_Supermercados.cod_localizacion')
                -> distinct('Datos_Supermercados.cod_localizacion')
                -> from('Datos_Supermercados')
                -> innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_Supermercados.cod_localizacion')
                -> where('Localizacion.codigo_localizacion in (7,8,9,10,11,15,16,19,28,30,31,32,34,35,41,45,48,49,51,52,53,57,63,70,73,74,75,79,84)')
                -> orderBy('Localizacion.Localizacion');
        $rows = $query -> all(DatosSupermercados::getDb());
        return $rows;
    }
    
    public function leerPresentaciones(){
        $query = new \yii\db\Query();
        $query -> select('presentacion.presentacion, Datos_Supermercados.cod_presentacion')
                -> distinct('Datos_Supermercados.cod_presentacion')
                -> from ('presentacion')
                -> innerJoin('Datos_Supermercados', 'presentacion.codigo = Datos_Supermercados.cod_presentacion')
                -> orderBy('presentacion.presentacion');
        $rows = $query -> all(DatosSupermercados::getDb());
        return $rows;
    }
    
}
