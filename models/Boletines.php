<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "boletines".
 *
 * @property integer $id
 * @property string $fecha
 * @property integer $boletin
 * @property string $tipo
 */
class Boletines extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'boletines';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha', 'tipo'], 'required'],
            [['fecha'], 'safe'],
            [['boletin'], 'integer'],
            [['tipo'], 'string', 'max' => 255]
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
            'boletin' => 'Boletin',
            'tipo' => 'Tipo',
        ];
    }
    
    public function buscarPdf($tipo){
        $query = new \yii\db\Query(); 
        
        $query->select('Boletin')
                ->from('boletines')
                ->where('Tipo LIKE :tipo',array(':tipo'=>$tipo))                
                ->orderBy('Fecha DESC')
                ->limit(1);
        $rows = $query->all(Boletines::getDb());
        return $rows;
    }
}
