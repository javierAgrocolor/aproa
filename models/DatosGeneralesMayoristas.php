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
    public function leerDatos($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal, $tipoConsulta){
        
        if ($tipoConsulta == "consultaMedias"){
            $condiciones = $this -> generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal);
            $rows = $this -> consultarMediasDosFechas($condiciones);
        }
        if ($tipoConsulta == "consultaNormal"){
            $condiciones = $this -> generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal);
            $rows = $this -> consultarTodos($condiciones);
        //return DatosGeneralesMayoristas::find()->all();
        }
        
        if ($tipoConsulta == "consultaSemanal"){
            
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
     * Devuelve una consulta con las medias agrupadas por producto, localización y origen entre dos fechas.
     * @param type $productos
     * @param type $origenes
     * @param type $localizaciones
     * @param type $fechaInicial
     * @param type $fechaFinal
     * @param type $medias
     * @param type $condiciones
     * @return Array
     */
    public function consultarMediasDosFechas($condiciones){
        
        $query = new \yii\db\Query();
        $query->select('producto.producto, Localizacion.Localizacion, origen.origen, avg(precio) as preciomedio')
                ->from('Datos_generales_mayoristas')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_generales_mayoristas.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_generales_mayoristas.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_generales_mayoristas.cod_producto')
                ->where($condiciones)
                ->groupBy(['Producto', 'Localizacion', 'Origen']);
        $rows = $query->all(DatosGeneralesMayoristas::getDb());
        return $rows;
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
    public function generarCondiciones($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal){
        $condiciones = "Datos_generales_mayoristas.cod_categoria = 1";
        if ($productos != ""){
                $contador = 0;
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

        if ($origenes != ""){
                $contador = 0;
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

        if ($localizaciones != ""){
                $contador = 0;
                exit ($condiciones);
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
     * @param Array $productos
     * @param Array $origenes
     * @param Array $localizaciones
     * @param Array $fechaInicial
     * @param Array $fechaFinal
     * @return Array
     */
    public function consultarTodos($condiciones){
        
        $query = new \yii\db\Query();
        $query->select('*')
                ->from('Datos_generales_mayoristas')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_generales_mayoristas.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_generales_mayoristas.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_generales_mayoristas.cod_producto')
                ->where($condiciones);
        $rows = $query->all(DatosGeneralesMayoristas::getDb());
        return $rows;
    }
}