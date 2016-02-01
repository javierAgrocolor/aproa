<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "preciosdiarios".
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
 */
class Preciosdiarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'preciosdiarios';
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
            [['corte1', 'corte2', 'corte3', 'corte4', 'corte5', 'corte6', 'corte7', 'corte8', 'corte9', 'corte10', 'corte11', 'corte12', 'corte13', 'corte14', 'corte15'], 'number'],
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
        ];
    }
    
    public function leerProductos(){
        $query = new Query();
        $query -> select('*')
                -> from('productos')
                -> innerJoin('grupo_producto', 'grupo_producto.id = productos.grupo')
                -> orderBy('grupo');
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function leerAlhondigas(){
        $query = new Query();
        $query -> select('*')
                -> from('alhondigas')
                -> orderBy('enlace');
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function leerUltimaAlhondiga($today){
        $query = new Query();
        $query -> select('alhondiga')
                -> from('preciosdiarios')
                -> where("fecha = '".$today."'")
                -> orderBy('id', 'DESC')
                -> limit(1);
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function leerUltimaPizarra($today, $ultimaAlhondiga){
        $query = new Query();
        $query -> select('*')
                -> from('preciosdiarios')
                -> innerJoin('productos', 'productos.codigo = preciosdiarios.idproducto')
                -> where("fecha = '".$today."'")
                -> andWhere("alhondiga = '".$ultimaAlhondiga[0]['alhondiga']."'");
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
}
