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
     * Devuelve los datos filtrados por localizaciones, origenes y productos. 
     * @return Array
     * @param Array $productos Contiene los códigos de los productos a filtrar.
     * @param Array $origen Contiene los códigos de los origenes a filtrar.
     * @param Array $localizacion Contiene los códigos de las localizaciones a filtrar.
     */
    public function leerDatos($productos, $origenes, $localizaciones, $fechaInicial, $fechaFinal){
        
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
        
        $query = new \yii\db\Query();
        $query->select('*')
                ->from('Datos_generales_mayoristas')
                ->innerJoin('Origen', 'Origen.codigo_origen = Datos_generales_mayoristas.cod_origen')
                ->innerJoin('Localizacion', 'Localizacion.codigo_localizacion = Datos_generales_mayoristas.cod_localizacion')
                ->innerJoin('Producto', 'Producto.codigo_producto = Datos_generales_mayoristas.cod_producto')
                ->where($condiciones);
        $rows = $query->all(DatosGeneralesMayoristas::getDb());
        return $rows;
        //return DatosGeneralesMayoristas::find()->all();
    }
}
