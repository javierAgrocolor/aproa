<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $ID
 * @property string $usuario
 * @property string $pass
 * @property integer $nivel_acceso
 * @property integer $nuevo
 * @property integer $perfil
 * @property string $uuid
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usuario', 'pass', 'nuevo', 'perfil', 'uuid'], 'required'],
            [['usuario', 'pass'], 'string'],
            [['nivel_acceso', 'nuevo', 'perfil'], 'integer'],
            [['uuid'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'usuario' => 'Usuario',
            'pass' => 'Pass',
            'nivel_acceso' => 'Nivel Acceso',
            'nuevo' => 'Nuevo',
            'perfil' => 'Perfil',
            'uuid' => 'Uuid',
        ];
    }
}
