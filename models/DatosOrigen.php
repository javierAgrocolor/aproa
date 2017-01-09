<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Datos_origen".
 *
 * @property string $id
 * @property string $fecha
 * @property integer $cod_producto
 * @property integer $cod_categoria
 * @property integer $cod_presentacion
 * @property integer $cod_localizacion
 * @property integer $cod_origen
 * @property double $precio
 * @property integer $tipo_precio
 */
class DatosOrigen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Datos_origen';
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
            [['cod_producto', 'cod_categoria', 'cod_presentacion', 'cod_localizacion', 'cod_origen', 'tipo_precio'], 'integer'],
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
            'tipo_precio' => 'Tipo Precio',
        ];
    }
    
    /**
     * Devuelve una consulta con todos los años registrados dentro de la tabla de Origen.
     * @return Array
     */
    public function leerYears(){
        $query = new \yii\db\Query();
        $query ->select(['distinct datepart(year,fecha) as year'])
                ->from('Datos_origen')
                ->orderBy('year');
        $rows = $query->all(DatosOrigen::getDb());
        /*$query -> select('Precio')
                ->selectOption('datepart(year,fecha)')
                ->from('Datos_generales_mayoristas');
        $rows = $query->all(DatosGeneralesMayoristas::getDb());*/
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
        //Cambio de datepart(week,fecha) por (datepart(DY, datediff(d,0,fecha)/7*7+3)+6)/7
        $query ->select(['distinct fecha, convert(varchar(10),fecha,103) as fechaCorta, (datepart(DY, datediff(d, 0, fecha) / 7 * 7 + 3)+6) / 7 as week'])
                ->from('Datos_origen')
                ->where("fecha>='01-08-".$fechaInicial."'and fecha<='31-07-".$fechaFinal."'")
                ->groupBy('fecha')
                ->orderBy('Datos_origen.fecha');
        $rows = $query -> all(DatosOrigen::getDb());
        return $rows;
    }
    
    public function leerUltimaFecha(){
        $query = new \yii\db\Query();
        $query -> select ('fecha')
                -> distinct ('fecha')
                -> from ('Datos_origen')
                -> orderBy('fecha desc')
                -> limit(1);
        $rows = $query -> all(DatosOrigen::getDb());
        return $rows;
    }
    
    /**
     * Devuelve los datos filtrados por productos o devuelve las medias del precio de lo filtrado por productos. 
     * @return Array
     * @param Array $productos Contiene los códigos de los productos a filtrar.
     */
    public function leerDatos($productos, $fechaInicial, $fechaFinal, $tipoConsulta, $semanas, $anio){
        
        if ($tipoConsulta == "consultaMedias"){
            $condiciones = $this -> generarCondiciones($productos, $fechaInicial, $fechaFinal);
            $rows = $this -> consultarMediasDosFechas($condiciones);
        }
        
        if ($tipoConsulta == "consultaNormal"){
            $condiciones = $this -> generarCondiciones($productos, $fechaInicial, $fechaFinal);
            $rows = $this -> consultarTodos($condiciones);
        }
        
        if ($tipoConsulta == "consultaSemanal"){
            $condiciones = $this -> generarCondicionesSemanales($productos, $semanas, $fechaInicial, $fechaFinal, $anio);
            $rows = $this -> consultarMediasSemanales($condiciones);
        }
        
        return $rows;
    }
    
    /**
     * Genera un String con las condiciones de los filtros del where si es que los hay.
     * @param Array $productos
     * @param Array $fechaInicial
     * @param Array $fechaFinal
     * @return string
     */
    public function generarCondiciones($productos, $fechaInicial, $fechaFinal){
        
        $condiciones = "Datos_origen.cod_presentacion = 0";
        
        if (isset($productos)){
            $condiciones = $this -> generarCondProductos($productos, $condiciones);
        }

        if ($fechaInicial != ""){
            $condiciones .= " and Datos_origen.fecha >= convert(datetime,'".$fechaInicial."')";
        }

        if ($fechaFinal != ""){
            $condiciones .= " and Datos_origen.fecha <= convert(datetime,'".$fechaFinal."')";
        }
        
        return $condiciones;
    }
    
    /**
     * Genera un String con las condiciones de los filtros del where si es que los hay para las consultas semanales.
     * @param Array $productos
     * @param Array $semanas
     */
    public function generarCondicionesSemanales($productos, $semanas, $fechaInicial, $fechaFinal, $anio){
        $condiciones = "Datos_origen.cod_presentacion = 0";
        
        if ($productos[0] !== ""){
            $condiciones = $this -> generarCondProductos($productos, $condiciones);
        }
        
        if ($semanas[0] !== ""){
            $condiciones = $this -> generarCondSemanas($semanas, $condiciones);
        }
        
        $nextYear = $anio +1;

        if ($anio != ""){
            $condiciones .= " and Datos_origen.fecha >= '01-08-".$anio."'";
        }

        if ($anio != ""){
            $condiciones .= " and Datos_origen.fecha <= '31-07-".$nextYear."'";
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
            //Cambio de datepart(week,Datos_origen.fecha) por (datepart(DY, datediff(d,0,Datos_origen.fecha)/7*7+3)+6)/7
            $condiciones .= " and (datepart(DY, datediff(d,0,Datos_origen.fecha)/7*7+3)+6)/7 in (";
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
            $condiciones .= " and DATEPART(year, Datos_origen.fecha) in (";
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
        
        if (isset($productos)){
            $condiciones .= " and Datos_origen.cod_producto in (";
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
     * Devuelve los datos filtrados por localizaciones, origenes y productos.
     * @param String $condiciones
     * @return Array
     */
    public function consultarTodos($condiciones){
        $query = new \yii\db\Query();
        $query->select(['*'])
                ->from('Datos_origen')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_origen.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_origen.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_origen.cod_producto')
                ->where($condiciones)
                ->orderBy('producto, fecha');
        $rows = $query->all(DatosOrigen::getDb());
        return $rows;
    }
    
    /**
     * Devuelve una consulta con las medias agrupadas por producto, localización y origen entre dos fechas.
     * @param string $condiciones
     * @return Array
     */
    public function consultarMediasDosFechas($condiciones){
        
        $query = new \yii\db\Query();
        $query->select(['producto.producto, Localizacion.Localizacion, origen.origen, Round(avg(precio),2) as preciomedio'])
                ->from('Datos_origen')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_origen.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_origen.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_origen.cod_producto')
                ->where($condiciones)
                ->groupBy(['Producto', 'Localizacion', 'Origen'])
                ->orderBy('producto');
        $rows = $query->all(DatosOrigen::getDb());
        return $rows;
    }
    
    /**
     * Devuelve una consulta con las medias para distintas semanas 
     * @param string $condiciones
     */
    public function consultarMediasSemanales($condiciones){
        $query = new \yii\db\Query();
        //Cambio de datepart(week,Datos_origen.fecha) por (datepart(DY, datediff(d,0,Datos_origen.fecha)/7*7+3)+6)/7
        $query -> select(['producto.producto, Localizacion.Localizacion, origen.origen, Round(avg(precio),2) as preciomedio, (datepart(DY, datediff(d,0,Datos_origen.fecha)/7*7+3)+6)/7 as Semana', 'DATEPART(year, Datos_origen.fecha) as anio'])
                -> from('Datos_origen')
                -> innerJoin('Origen', 'Origen.codigo_origen = Datos_origen.cod_origen')
                -> innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_origen.cod_localizacion')
                -> innerJoin('Producto', 'Producto.codigo_producto = Datos_origen.cod_producto')
                ->where($condiciones)
                ->groupBy(['Producto', 'Localizacion', 'Origen', '(datepart(DY, datediff(d,0,Datos_origen.fecha)/7*7+3)+6)/7', 'DATEPART(year, Datos_origen.fecha)'])
                ->orderBy('anio, Semana, Producto');
        $rows = $query -> all(DatosOrigen::getDb());
        return $rows;
    }
    
    public function leerProductos(){
        $query = new \yii\db\Query();
        $query -> select('producto.producto, Datos_origen.cod_producto')
                -> distinct('producto.producto')
                -> from ('Datos_origen')
                -> innerJoin('producto', 'producto.codigo_producto = Datos_origen.cod_producto')
                -> where('producto.codigo_producto in (34,36,35,13,39,14,37,45,20,19,42,30,32,33,7,6,5,11,10,9,8,4,26,24,3,22,2,1,15,16,17)')
                -> orderBy('producto.producto');
        $rows = $query -> all(DatosOrigen::getDb());
        return $rows;
    }
    
    /**
     * CONSULTAS PAGINA PRODUCTOS
     */
    
    public function productosOrigen($fechaini,$fechafin,$condicion){
        $query = new \yii\db\Query();
        
        
        $date = new \DateTime($fechaini);
        $fechaini = $date->format('Y-d-m H:i:s');
        $date = new \DateTime($fechafin);
        $fechafin = $date->format('Y-d-m H:i:s');
        
        
        
        $query->select(['Producto.producto,cod_producto,AVG(precio) as precio'])
                ->from('Datos_origen')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_origen.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_origen.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_origen.cod_producto')
                -> where ("fecha <= '".$fechaini."'")
                ->andWhere("fecha >= '".$fechafin."'")
                ->andWhere('cod_localizacion=1 and cod_origen = 17')   
                ->andWhere($condicion)
                ->orderBy('producto')
                ->groupBy('producto,cod_producto');
      
        /*SELECT AVG(precio) FROM Datos_Origen, Producto, Origen, Localizacion WHERE 
                fecha<='" & Me.DateTimePicker1.Value.Date & "' 
                AND Datos_Origen.cod_producto=Producto.codigo_producto 
                AND Datos_Origen.cod_localizacion=Localizacion.codigo_localizacion 
                AND Datos_Origen.cod_origen=Origen.codigo_origen 
                AND producto='" & productosql & "' 
                AND localizacion='" & localizacionsql & "' 
                AND origen='" & origensql & "' 
                AND fecha>='" & Me.DateTimePicker1.Value.Date.AddDays(-6) & "' 
                AND tipo_precio=0*/
        
        $rows = $query->all(DatosOrigen::getDb());
        return $rows;
    }
    
    public function productosOrigenFecha($fechaini,$fechafin,$condicion){
        $query = new \yii\db\Query();
        
        
        $date = new \DateTime($fechaini);
        $fechaini = $date->format('Y-d-m H:i:s');
        $date = new \DateTime($fechafin);
        $fechafin = $date->format('Y-d-m H:i:s');
        
        
        
        $query->select(['fecha'])
                ->from('Datos_origen')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_origen.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_origen.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_origen.cod_producto')
                -> where ("fecha <= '".$fechaini."'")
                ->andWhere("fecha >= '".$fechafin."'")
                ->andWhere('cod_localizacion=1 and cod_origen = 17')   
                ->andWhere($condicion)
                ->orderBy('fecha DESC');
        
        $rows = $query->all(DatosOrigen::getDb());
        return $rows;
    }
}
