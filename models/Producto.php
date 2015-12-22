<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Producto".
 *
 * @property integer $id
 * @property integer $codigo_producto
 * @property string $producto
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
}
