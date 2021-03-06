<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Producto".
 *
 * @property integer $id
 * @property integer $codigo_producto
 * @property string $producto
 *
 * @property DatosGeneralesMayoristas[] $datosGeneralesMayoristas
 * @property DatosOrigen[] $datosOrigens
 * @property DatosSupermercados[] $datosSupermercados
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Producto';
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
            [['codigo_producto', 'producto'], 'required'],
            [['codigo_producto'], 'integer'],
            [['producto'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_producto' => 'Codigo Producto',
            'producto' => 'Producto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGeneralesMayoristas()
    {
        return $this->hasMany(DatosGeneralesMayoristas::className(), ['cod_producto' => 'codigo_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosOrigens()
    {
        return $this->hasMany(DatosOrigen::className(), ['cod_producto' => 'codigo_producto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosSupermercados()
    {
        return $this->hasMany(DatosSupermercados::className(), ['cod_producto' => 'codigo_producto']);
    }
    
    /**
     * Devuelve todos los productos ordenados alfabeticamente.
     * @return Array
     */
    public function leerTodos(){
        return Producto::find()->orderBy("producto")->all();
    }
    
}
