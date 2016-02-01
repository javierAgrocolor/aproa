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
class AlhondigasPreciosPonderados extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'alhondigas';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb() {
        return Yii::$app->get('db3');
    }

    /**
     * @inheritdoc
     */
    public function rules() {
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
    public function attributeLabels() {
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

    public function leerDatos($productos, $empresas, $tipo, $fechaini, $fechafin) {

        $condiciones = "1=1";

        if ($empresas != "") {
            $contador = 0;
            $condiciones .= " and (";
            foreach ($empresas as $empresa) {
                if ($contador > 0) {
                    $condiciones .= " or";
                }
                $contador++;
                $condiciones .= " Empresa LIKE '" . $empresa . "'";
            }
            $condiciones .=")";
        }


        if ($productos != "") {
            $condiciones .=" and (";
            $contador = 0;
            foreach ($productos as $producto) {
                if ($contador > 0) {
                    $condiciones .= " or";
                }
                $contador++;
                $condiciones .= " Producto LIKE '" . $producto . "'";
            }
            $condiciones .=")";
        }

        $query = new \yii\db\Query();
        if ($fechaini != '' && $fechafin != '') {
            $query->select('*')
                    ->from('alhondigas')
                    ->where('Fecha>=:fechaini and Fecha <=:fechafin', array(':fechaini' => $fechaini, ':fechafin' => $fechafin))
                    ->andWhere('Tipo LIKE :tipo', array(':tipo' => $tipo))
                    ->andWhere($condiciones);
        } else if ($fechaini != '') {
            $query->select('*')
                    ->from('alhondigas')
                    ->where('Fecha>=:fechaini', array(':fechaini' => $fechaini))
                    ->andWhere('Tipo LIKE :tipo', array(':tipo' => $tipo))
                    ->andWhere($condiciones);
        } else {
            $query->select('*')
                    ->from('alhondigas')
                    ->where('Tipo LIKE :tipo', array(':tipo' => $tipo))
                    ->andWhere($condiciones);
        }

        $rows = $query->all(AlhondigasPreciosPonderados::getDb());
        return $rows;
    }

    public function laUnion($fecha_actual) {
        $query = new \yii\db\Query();
        //$fecha_actual = date('Y-m-d');
        $query->select('*')
                ->from('alhondigas')
                ->where('Empresa LIKE :empresa', array(':empresa' => 'LA UNION'))
                ->andWhere('Fecha=:fecha', array(':fecha' => $fecha_actual))
                ->orderBy('Producto');
        $rows = $query->all(AlhondigasPreciosPonderados::getDb());
        return $rows;
    }

    public function casi($fecha_actual) {
        $query = new \yii\db\Query();
        //$fecha_actual = date('Y-m-d');
        $query->select('*')
                ->from('alhondigas')
                ->where('Empresa LIKE :empresa', array(':empresa' => 'CASI'))
                ->andWhere('Fecha=:fecha', array(':fecha' => $fecha_actual))
                ->orderBy('Producto');
        $rows = $query->all(AlhondigasPreciosPonderados::getDb());
        return $rows;
    }

    public function costa($fecha_actual) {
        $query = new \yii\db\Query();
        //$fecha_actual = date('Y-m-d');
        $query->select('*')
                ->from('alhondigas')
                ->where('Empresa LIKE :empresa', array(':empresa' => 'COSTA'))
                ->andWhere('Fecha=:fecha', array(':fecha' => $fecha_actual))
                ->orderBy('Producto');
        $rows = $query->all(AlhondigasPreciosPonderados::getDb());
        return $rows;
    }

    public function femago($fecha_actual) {
        $query = new \yii\db\Query();
        //$fecha_actual = date('Y-m-d');
        $query->select('*')
                ->from('alhondigas')
                ->where('Empresa LIKE :empresa', array(':empresa' => 'FEMAGO'))
                ->andWhere('Fecha=:fecha', array(':fecha' => $fecha_actual))
                ->orderBy('Producto');
        $rows = $query->all(AlhondigasPreciosPonderados::getDb());
        return $rows;
    }

    public function agroponiente($fecha_actual) {
        $query = new \yii\db\Query();
        //$fecha_actual = date('Y-m-d');
        $query->select('*')
                ->from('alhondigas')
                ->where('Empresa LIKE :empresa', array(':empresa' => 'AGROPONIENTE'))
                ->andWhere('Fecha=:fecha', array(':fecha' => $fecha_actual))
                ->orderBy('Producto');
        $rows = $query->all(AlhondigasPreciosPonderados::getDb());
        return $rows;
    }

    public function graficoPpt($fecha_actual) {
        $query = new \yii\db\Query();
        //$fecha_actual = date('Y-m-d');
        $query->select('Fecha,Producto,sum(Pond_Suma) as Suma')
                ->from('alhondigas')
                ->where('Fecha=:fecha', array(':fecha' => $fecha_actual))
                ->groupBy('Producto,Tipo');
        $rows = $query->all(AlhondigasPreciosPonderados::getDb());
        return $rows;
    }

    public function graficoEvolucion($productos, $empresas, $sd, $fechafin) {
        $query = new \yii\db\Query();
        /* $query->select('Fecha,Producto,sum(Pond_Suma) as Suma')
          ->from('alhondigas')
          ->where('Fecha=:fecha',array(':fecha'=>'2015-10-23'))
          ->groupBy('Producto,Tipo'); */
        if($fechafin==''){
            $fechafin=  date('Y-m-d');
        }        
        if($sd!='1') {
            $query->select('Fecha,Pond_Suma,Producto,Empresa')
                    ->from('alhondigas')
                    ->where('Producto=:producto and Empresa=:empresa and  Fecha BETWEEN :fechaini AND :fechafin', array(':producto' => $productos, ':empresa' => $empresas, ':fechaini' => '2015-09-01', ':fechafin' => $fechafin))
                    ->orderBy('Fecha,Tipo');
            $rows = $query->all(AlhondigasPreciosPonderados::getDb());
            return $rows;
        } else {            
            $query->select('WEEKOFYEAR(Fecha) as Fecha,Producto,Empresa,SUM(Pond_Suma) as Pond_Suma,AVG(Pond_Suma) as Precio')
                    ->from('alhondigas')
                    ->where('Producto=:producto and Empresa=:empresa and  Fecha BETWEEN :fechaini AND :fechafin', array(':producto' => $productos, ':empresa' => $empresas, ':fechaini' => '2015-09-01', ':fechafin' => $fechafin))
                    ->groupBy('WEEKOFYEAR(Fecha),Tipo')
                    ->orderBy('YEAR(Fecha),WEEKOFYEAR(Fecha),Tipo');
            $rows = $query->all(AlhondigasPreciosPonderados::getDb());
            return $rows;
        }
    }

}
