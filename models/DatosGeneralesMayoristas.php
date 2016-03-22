<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Datos_generales_mayoristas".
 *
 * @property string $id
 * @property string $fecha
 * @property integer $cod_producto
 * @property integer $cod_categoria
 * @property integer $cod_presentacion
 * @property integer $cod_localizacion
 * @property integer $cod_origen
 * @property double $precio
 *
 * @property Categoria $codCategoria
 * @property Localizacion $codLocalizacion
 * @property Origen $codOrigen
 * @property Presentacion $codPresentacion
 * @property Producto $codProducto
 */
class DatosGeneralesMayoristas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Datos_generales_mayoristas';
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
     * @return \yii\db\ActiveQuery
     */
    public function getCodCategoria()
    {
        return $this->hasOne(Categoria::className(), ['cod_categoria' => 'cod_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodLocalizacion()
    {
        return $this->hasOne(Localizacion::className(), ['codigo_localizacion' => 'cod_localizacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodOrigen()
    {
        return $this->hasOne(Origen::className(), ['codigo_origen' => 'cod_origen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodPresentacion()
    {
        return $this->hasOne(Presentacion::className(), ['codigo' => 'cod_presentacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCodProducto()
    {
        return $this->hasOne(Producto::className(), ['codigo_producto' => 'cod_producto']);
    }
    
    /**
     * Devuelve los datos filtrados por localizaciones, origenes y productos o devuelve las medias del precio de lo filtrado por localizaciones, origenes y productos. 
     * @return Array
     * @param Array $productos Contiene los códigos de los productos a filtrar.
     * @param Array $origen Contiene los códigos de los origenes a filtrar.
     * @param Array $localizacion Contiene los códigos de las localizaciones a filtrar.
     */
    public function leerDatos($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal, $tipoConsulta, $semanas, $anio){
        
        if ($tipoConsulta == "consultaMedias"){
            $condiciones = $this -> generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal);
            $rows = $this -> consultarMediasDosFechas($condiciones);
        }
        if ($tipoConsulta == "consultaNormal"){
            $condiciones = $this -> generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal);
            $rows = $this -> consultarTodos($condiciones);
        }
        
        if ($tipoConsulta == "consultaSemanal"){
            $condiciones = $this -> generarCondicionesSemanales($productos, $origenes, $localizaciones, $semanas, $anio);
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
                ->from('Datos_generales_mayoristas')
                ->orderBy('year');
        $rows = $query->all(DatosGeneralesMayoristas::getDb());
        /*$query -> select('Precio')
                ->selectOption('datepart(year,fecha)')
                ->from('Datos_generales_mayoristas');
        $rows = $query->all(DatosGeneralesMayoristas::getDb());*/
        return $rows;
    }
    
    public function leerUltimaFecha(){
        $query = new \yii\db\Query();
        $query -> select ('fecha')
                -> distinct ('fecha')
                -> from ('Datos_generales_mayoristas')
                -> orderBy('fecha desc')
                -> limit(1);
        $rows = $query ->all(DatosGeneralesMayoristas::getDb());
        return $rows;
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
                ->from('Datos_generales_mayoristas')
                ->where("fecha>'01-08-".$fechaInicial."'and fecha<'31-07-".$fechaFinal."'")
                ->groupBy('fecha')
                ->orderBy('Datos_generales_mayoristas.fecha');
        $rows = $query -> all(DatosGeneralesMayoristas::getDb());
        return $rows;
    }
    
    /**
     * Devuelve una consulta con las medias para distintas semanas 
     * @param string $condiciones
     */
    public function consultarMediasSemanales($condiciones){
        $query = new \yii\db\Query();
        $query -> select(['producto.producto, Localizacion.Localizacion, origen.origen, Round(avg(precio),3) as preciomedio, DATEPART(week, Datos_generales_mayoristas.fecha) as Semana', 'DATEPART(year, Datos_generales_mayoristas.fecha) as anio'])
                -> from('Datos_generales_mayoristas')
                -> innerJoin('Origen', 'Origen.codigo_origen = Datos_generales_mayoristas.cod_origen')
                -> innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_generales_mayoristas.cod_localizacion')
                -> innerJoin('Producto', 'Producto.codigo_producto = Datos_generales_mayoristas.cod_producto')
                ->where($condiciones)
                ->groupBy(['Producto', 'Localizacion', 'Origen', 'DATEPART(week, Datos_generales_mayoristas.fecha)', 'DATEPART(year, Datos_generales_mayoristas.fecha)'])
                ->orderBy('anio','Semana');
        $rows = $query -> all(DatosGeneralesMayoristas::getDb());
        return $rows;
    }
    
    /**
     * Devuelve una consulta con las medias agrupadas por producto, localización y origen entre dos fechas.
     * @param string $condiciones
     * @return Array
     */
    public function consultarMediasDosFechas($condiciones){
        
        $query = new \yii\db\Query();
        $query->select(['producto.producto, Localizacion.Localizacion, origen.origen, Round(avg(precio),3) as preciomedio'])
                ->from('Datos_generales_mayoristas')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_generales_mayoristas.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_generales_mayoristas.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_generales_mayoristas.cod_producto')
                ->where($condiciones)
                ->groupBy(['Producto', 'Localizacion', 'Origen'])
                ->orderBy('producto');
        $rows = $query->all(DatosGeneralesMayoristas::getDb());
        return $rows;
    }
    
    /**
     * Genera un String con las condiciones de los filtros del where si es que los hay para las consultas semanales.
     * @param Array $productos
     * @param Array $origenes
     * @param Array $localizaciones
     * @param Array $semanas
     */
    public function generarCondicionesSemanales($productos, $origenes, $localizaciones, $semanas, $anio){
        $condiciones = "Datos_generales_mayoristas.cod_categoria = 1";
        
        if ($productos[0] !== ""){
            $condiciones = $this -> generarCondProductos($productos, $condiciones);
        }
        
        if ($origenes[0] !== ""){
            $condiciones = $this -> generarCondOrigenes($origenes, $condiciones);
        }
        
        if ($localizaciones[0] !== ""){
            $condiciones = $this -> generarCondLocalizaciones($localizaciones, $condiciones);
        }
        
        if ($semanas[0] !== ""){
            $condiciones = $this -> generarCondSemanas($semanas, $condiciones);
        }
        
        $nextYear = $anio +1;

        if ($anio != ""){
            $condiciones .= " and Datos_generales_mayoristas.fecha >= '01-08-".$anio."'";
        }

        if ($anio != ""){
            $condiciones .= " and Datos_generales_mayoristas.fecha <= '31-07-".$nextYear."'";
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
        
        if (isset($semanas)){
            $condiciones .= " and DATEPART(week, Datos_generales_mayoristas.fecha) in (";
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
            $condiciones .= " and DATEPART(year, Datos_generales_mayoristas.fecha) in (";
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
     * Genera la condición del filtro de productos.
     * @param Array $productos
     * @return string
     */
    public function generarCondProductos($productos, $condiciones){
        $contador = 0;
        if(isset($productos)){
            $condiciones .= " and Datos_generales_mayoristas.cod_producto in (";
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
        if (isset($origenes)){
            $condiciones .= " and Datos_generales_mayoristas.cod_origen in (";
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
        if (isset($localizaciones)){
            $condiciones .= " and Datos_generales_mayoristas.cod_localizacion in (";
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
     * Genera un String con las condiciones de los filtros del where si es que los hay.
     * @param Array $productos
     * @param Array $origenes
     * @param Array $localizaciones
     * @param Array $fechaInicial
     * @param Array $fechaFinal
     * @return string
     */
    public function generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal, $anio){
        $condiciones = "Datos_generales_mayoristas.cod_categoria = 1";
        if (isset($productos)){
            $condiciones = $this -> generarCondProductos($productos, $condiciones);
        }

        if (isset($origenes)){
            $condiciones = $this -> generarCondOrigenes($origenes, $condiciones);
        }

        if (isset($localizaciones)){
            $condiciones = $this -> generarCondLocalizaciones($localizaciones, $condiciones);
        }

        if ($fechaInicial != ""){
            $condiciones .= " and Datos_generales_mayoristas.fecha >= convert(datetime,'".$fechaInicial."')";
        }

        if ($fechaFinal != ""){
            $condiciones .= " and Datos_generales_mayoristas.fecha <= convert(datetime,'".$fechaFinal."')";
        }
        return $condiciones;
    }

    /**
     * Devuelve los datos filtrados por localizaciones, origenes y productos.
     * @param String $condiciones
     * @return Array
     */
    public function consultarTodos($condiciones){
        $query = new \yii\db\Query();
        $query->select('*')
                ->from('Datos_generales_mayoristas')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_generales_mayoristas.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_generales_mayoristas.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_generales_mayoristas.cod_producto')
                ->where($condiciones)
                ->orderBy('producto, fecha');
        $rows = $query->all(DatosGeneralesMayoristas::getDb());
        return $rows;
    }
    
    public function leerProductos(){
        $query = new \yii\db\Query();
        $query -> select('producto.producto, Datos_generales_mayoristas.cod_producto')
                -> distinct('producto.producto')
                -> from('Datos_generales_mayoristas')
                -> innerJoin('Producto', 'Producto.codigo_producto = Datos_generales_mayoristas.cod_producto')
                -> where('Datos_generales_mayoristas.cod_producto in (12,13,401,14,37,31,45,20,18,49,73,19,48,30,32,7,6,5,11,10,9,8,16,53,17,15,4,41,3,22,2,1)')
                -> orderBy('producto.producto');
        $rows = $query -> all(DatosGeneralesMayoristas::getDb());
        return $rows;
    }
    
    public function leerLocalizaciones(){
        $query = new \yii\db\Query();
        $query -> select('Localizacion.Localizacion, Datos_generales_mayoristas.cod_localizacion')
                -> distinct('Localizacion.Localizacion')
                -> from('Datos_generales_mayoristas')
                -> innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_generales_mayoristas.cod_localizacion')
                -> where ('Datos_generales_mayoristas.cod_localizacion in (6,20,21,22,23,5,24,4,3)')
                -> orderBy('Localizacion.Localizacion');
        $rows = $query -> all(DatosGeneralesMayoristas::getDb());
        return $rows;
    }
    
    
}
