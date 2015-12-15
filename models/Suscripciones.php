<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suscripciones".
 *
 * @property integer $id
 * @property integer $usuario
 * @property integer $alhondiga
 * @property string $enlace
 * @property integer $producto
 */
class Suscripciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'suscripciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'alhondiga', 'enlace', 'producto'], 'required'],
            [['usuario', 'alhondiga', 'producto'], 'integer'],
            [['enlace'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'usuario' => 'Usuario',
            'alhondiga' => 'Alhondiga',
            'enlace' => 'Enlace',
            'producto' => 'Producto',
        ];
    }
}
