<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "codigos_acceso".
 *
 * @property string $id
 * @property string $codigo
 * @property string $usuario
 * @property integer $accesos
 */
class CodigosAcceso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'codigos_acceso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'usuario', 'accesos'], 'required'],
            [['accesos'], 'integer'],
            [['codigo', 'usuario'], 'string', 'max' => 255]
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
            'usuario' => 'Usuario',
            'accesos' => 'Accesos',
        ];
    }
}
