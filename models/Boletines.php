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
    
    /**
     * Busca el ultimo nombre de PDF segun el tipo indicado.
     * @param type $tipo
     * @return type
     */
    public function buscarPdf($tipo){
        $query = new \yii\db\Query(); 
        
        if($tipo=="Seguimiento_de_Campana"){
            $query->select('Boletin')
                ->from('boletines')
                ->where('Tipo LIKE :tipo',array(':tipo'=>'Seguimiento_de_Campaña'))                
                ->orderBy('Fecha DESC')
                ->limit(1);
        }else{
            $query->select('Boletin')
                ->from('boletines')
                ->where('Tipo LIKE :tipo',array(':tipo'=>$tipo))                
                ->orderBy('Fecha DESC')
                ->limit(1);
        }    
                
        $rows = $query->all(Boletines::getDb());
        return $rows;
    }
    
    /**
     * Extrae la lista completa de nombres de los PDF.
     * @return type
     */
    public function buscarHistorico(){
        $query = new \yii\db\Query(); 
        
        $query->select('*')
                ->from('boletines')                          
                ->orderBy('Fecha DESC');
                //->limit(30);
        $rows = $query->all(Boletines::getDb());
        return $rows;
    }
    
    public function buscarCuotasmercado(){
        $query = new \yii\db\Query(); 
        
        $query->select('*')
                ->from('boletines')    
		->where('Tipo LIKE :tipo',array(':tipo'=>'Exportación Anual%'))               		
                ->orderBy('Fecha DESC');
                //->limit(30);
        $rows = $query->all(Boletines::getDb());
        return $rows;
    }
    
    /**
     * Extrae la lista completa de nombres de PDF de la categoria Otros
     * (Todos los que no tienen ninguna categoria)
     * @return type
     */
    public function buscarOtros(){
        $query = new \yii\db\Query(); 
        $prueba = 'Origen%';
        $query->select('*')
                ->from('boletines')       
                ->where('Tipo NOT LIKE :tipo and Tipo NOT LIKE :tipo2 and Tipo NOT LIKE :tipo3 and Tipo NOT LIKE :tipo4 and Tipo NOT LIKE :tipo5 and Tipo NOT LIKE :tipo6 and Tipo NOT LIKE :tipo7 and Tipo NOT LIKE :tipo8 and Tipo NOT LIKE :tipo9 and Tipo NOT LIKE :tipo10 and Tipo NOT LIKE :tipo11 and Tipo NOT LIKE :tipo12 and Tipo NOT LIKE :tipo13',
                        array(':tipo'=>'Origen%',':tipo2'=>'Calidad%',':tipo3'=>'Exportacion%',':tipo4'=>'Analisis%',':tipo5'=>'Comercializacion%',':tipo6'=>'Supermercados%',':tipo7'=>'Clima%',':tipo8'=>'Prevision%',':tipo9'=>'Mayoristas%',':tipo10'=>'Distribucion%',':tipo11'=>'Seguimiento%',':tipo12'=>'Citricos%',':tipo13'=>'Consumo%'))                
                ->orderBy('Fecha DESC');
                //->limit(30);
        $rows = $query->all(Boletines::getDb());
        return $rows;
    }
}
