<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "token".
 *
 * @property integer $id
 * @property string $token
 * @property integer $accesos
 */
class Token extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'token';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['token'], 'required'],
            [['accesos'], 'integer'],
            [['token'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'token' => 'Token',
            'accesos' => 'Accesos',
        ];
    }
}
