<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Tipo_Precio".
 *
 * @property integer $id
 * @property integer $codigo_tipo_precio
 * @property string $tipo_precio
 */
class TipoPrecio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Tipo_Precio';
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
            [['codigo_tipo_precio'], 'integer'],
            [['tipo_precio'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_tipo_precio' => 'Codigo Tipo Precio',
            'tipo_precio' => 'Tipo Precio',
        ];
    }
}
