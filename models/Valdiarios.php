<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "valdiarios".
 *
 * @property string $id
 * @property string $fecha
 * @property integer $idproducto
 * @property string $nombre
 * @property string $alhondiga
 * @property double $corte1
 * @property double $corte2
 * @property double $corte3
 * @property double $corte4
 * @property double $corte5
 * @property double $corte6
 * @property double $corte7
 * @property double $corte8
 * @property double $corte9
 * @property double $corte10
 * @property double $corte11
 * @property double $corte12
 * @property double $corte13
 * @property double $corte14
 * @property double $corte15
 * @property double $total
 */
class Valdiarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'valdiarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'nombre', 'alhondiga'], 'required'],
            [['fecha'], 'safe'],
            [['idproducto'], 'integer'],
            [['corte1', 'corte2', 'corte3', 'corte4', 'corte5', 'corte6', 'corte7', 'corte8', 'corte9', 'corte10', 'corte11', 'corte12', 'corte13', 'corte14', 'corte15', 'total'], 'number'],
            [['nombre', 'alhondiga'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'idproducto' => 'Idproducto',
            'nombre' => 'Nombre',
            'alhondiga' => 'Alhondiga',
            'corte1' => 'Corte1',
            'corte2' => 'Corte2',
            'corte3' => 'Corte3',
            'corte4' => 'Corte4',
            'corte5' => 'Corte5',
            'corte6' => 'Corte6',
            'corte7' => 'Corte7',
            'corte8' => 'Corte8',
            'corte9' => 'Corte9',
            'corte10' => 'Corte10',
            'corte11' => 'Corte11',
            'corte12' => 'Corte12',
            'corte13' => 'Corte13',
            'corte14' => 'Corte14',
            'corte15' => 'Corte15',
            'total' => 'Total',
        ];
    }
}
