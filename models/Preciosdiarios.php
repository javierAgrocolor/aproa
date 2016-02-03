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
    
    public function leerPizarras($today, $listaAlhondigas){
        $x = 0;
        foreach($listaAlhondigas as $alhondiga){
            $query = new Query();
            $query -> select('*')
                    -> from('preciosdiarios')
                    -> innerJoin('productos', 'productos.codigo = preciosdiarios.idproducto')
                    -> where("fecha = '".$today."'")
                    -> andWhere("alhondiga = '".$alhondiga['enlace']."'")
                    ->orderBy('preciosdiarios.nombre');
            $rows = $query -> all(Preciosdiarios::getDb());
            if (count($rows)> 0){
                $listaPizarras[$x] = $rows;
            }else{
                $listaPizarras[$x] = "No existen registros para esta alhondiga en este día.";
            }
            $x++;
        }
        return $listaPizarras;
    }
    
    public function leerMediasGlobales($today){
        $query = new Query();
        $query -> select(['preciosdiarios.nombre, Round(avg(corte1),3) as corte1, Round(avg(corte2),3) as corte2, Round(avg(corte3),3) as corte3, Round(avg(corte4),3) as corte4, Round(avg(corte5),3) as corte5, Round(avg(corte6),3) as corte6, Round(avg(corte7),3) as corte7, Round(avg(corte8),3) as corte8, Round(avg(corte9),3) as corte9, Round(avg(corte10),3) as corte10, Round(avg(corte11),3) as corte11, Round(avg(corte12),3) as corte12, Round(avg(corte13),3) as corte13, Round(avg(corte14),3) as corte14, Round(avg(corte15),3) as corte15'])
                -> from ('preciosdiarios')
                -> where ("fecha = '".$today."'")
                -> orderBy ('nombre')
                -> groupBy ("nombre");
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function extraerMediasPorCorte($today){
        $query = new Query();
        $query -> select(['"Media de los productos" as nombre,alhondiga, Round(avg(corte1), 3) as corte1, Round(avg(corte2), 3) as corte2, Round(avg(corte3), 3) as corte3, Round(avg(corte4), 3) as corte4, Round(avg(corte5), 3) as corte5, Round(avg(corte6), 3) as corte6, Round(avg(corte7), 3) as corte7, Round(avg(corte8), 3) as corte8, Round(avg(corte9), 3) as corte9, Round(avg(corte10), 3) as corte10, Round(avg(corte11), 3) as corte11, Round(avg(corte12), 3) as corte12, Round(avg(corte13), 3) as corte13, Round(avg(corte14), 3) as corte14, Round(avg(corte15), 3) as corte15'])
                -> from ('preciosdiarios')
                -> where ("fecha = '".$today."'")
                -> orderBy ('alhondiga')
                -> groupBy ("alhondiga");
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    
}
