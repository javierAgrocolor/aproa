<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property integer $codigo
 * @property string $nombre
 * @property integer $grupo
 */
class Productos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'nombre', 'grupo'], 'required'],
            [['codigo', 'grupo'], 'integer'],
            [['nombre'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'grupo' => 'Grupo',
        ];
    }
}
