<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alhondigas".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $enlace
 * @property string $ebbdd
 */
class Alhondigas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alhondigas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'enlace', 'ebbdd'], 'required'],
            [['nombre', 'enlace', 'ebbdd'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'enlace' => 'Enlace',
            'ebbdd' => 'Ebbdd',
        ];
    }
}
