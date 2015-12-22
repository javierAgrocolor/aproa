<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Localizacion".
 *
 * @property integer $id
 * @property integer $codigo_localizacion
 * @property string $Localizacion
 */
class Localizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Localizacion';
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
            [['codigo_localizacion', 'Localizacion'], 'required'],
            [['codigo_localizacion'], 'integer'],
            [['Localizacion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_localizacion' => 'Codigo Localizacion',
            'Localizacion' => 'Localizacion',
        ];
    }
}
