<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Origen".
 *
 * @property integer $id
 * @property integer $codigo_origen
 * @property string $origen
 */
class Origen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Origen';
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
            [['codigo_origen', 'origen'], 'required'],
            [['codigo_origen'], 'integer'],
            [['origen'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_origen' => 'Codigo Origen',
            'origen' => 'Origen',
        ];
    }
    
    public function leerTodos(){
        return Origen::find()->orderBy("origen")->all();
    }
    
}
