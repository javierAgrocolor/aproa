<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupo_producto".
 *
 * @property integer $id
 * @property string $nombre
 */
class GrupoProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupo_producto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 255]
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
        ];
    }
}
