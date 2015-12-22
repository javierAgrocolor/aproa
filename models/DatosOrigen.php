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
}
