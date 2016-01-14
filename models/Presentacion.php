<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Presentacion".
 *
 * @property integer $id
 * @property integer $codigo
 * @property string $presentacion
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Presentacion';
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
            [['codigo', 'presentacion'], 'required'],
            [['codigo'], 'integer'],
            [['presentacion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'presentacion' => 'Presentacion',
        ];
    }
    
    public function leerTodos(){
        return Presentacion::find()->orderBy("presentacion")->all();
    }
}
