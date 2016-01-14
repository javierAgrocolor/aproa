<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alhondigas".
 *
 * @property string $ID
 * @property string $Producto
 * @property string $Fecha
 * @property string $Empresa
 * @property string $Tipo
 * @property double $Pond_Suma
 * @property double $Media
 * @property double $C1
 * @property double $C2
 * @property double $C3
 * @property double $C4
 * @property double $C5
 * @property double $C6
 * @property double $C7
 * @property double $C8
 * @property double $C9
 * @property double $C10
 * @property double $C11
 * @property double $C12
 * @property double $C13
 * @property double $C14
 * @property double $C15
 */
class AlhondigasPreciosPonderados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alhondigas';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db3');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Producto', 'Fecha', 'Empresa', 'Tipo', 'Pond_Suma'], 'required'],
            [['Fecha'], 'safe'],
            [['Pond_Suma', 'Media', 'C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10', 'C11', 'C12', 'C13', 'C14', 'C15'], 'number'],
            [['Producto'], 'string', 'max' => 100],
            [['Empresa', 'Tipo'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Producto' => 'Producto',
            'Fecha' => 'Fecha',
            'Empresa' => 'Empresa',
            'Tipo' => 'Tipo',
            'Pond_Suma' => 'Pond  Suma',
            'Media' => 'Media',
            'C1' => 'C1',
            'C2' => 'C2',
            'C3' => 'C3',
            'C4' => 'C4',
            'C5' => 'C5',
            'C6' => 'C6',
            'C7' => 'C7',
            'C8' => 'C8',
            'C9' => 'C9',
            'C10' => 'C10',
            'C11' => 'C11',
            'C12' => 'C12',
            'C13' => 'C13',
            'C14' => 'C14',
            'C15' => 'C15',
        ];
    }
}
