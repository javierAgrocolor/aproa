<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vistazos".
 *
 * @property string $id
 * @property string $titular
 * @property string $resumen
 * @property integer $publicidad
 */
class Vistazos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vistazos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titular', 'resumen', 'publicidad'], 'required'],
            [['publicidad'], 'integer'],
            [['titular', 'resumen'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titular' => 'Titular',
            'resumen' => 'Resumen',
            'publicidad' => 'Publicidad',
        ];
    }
}
