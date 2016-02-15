<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "accesos".
 *
 * @property string $id
 * @property string $usuario
 * @property string $fecha
 * @property string $ip
 */
class Accesos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'accesos';
    }
    
    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('db');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha'], 'safe'],
            [['usuario'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 50]
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
            'fecha' => 'Fecha',
            'ip' => 'Ip',
        ];
    }
}
