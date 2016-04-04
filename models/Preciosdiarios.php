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
        $query -> select('preciosdiarios.nombre, preciosdiarios.idProducto, productos.grupo')
                ->distinct('nombre')
                -> from('preciosdiarios')
                -> innerJoin("productos", "productos.codigo = preciosdiarios.idproducto")
                -> orderBy('grupo');
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function leerProductosCabecera($productos){
        $condiciones = $this ->generarCondicionesProductosCabecera($productos);
        $query = new Query();
        $query -> select('preciosdiarios.nombre, preciosdiarios.idProducto')
                -> distinct('nombre')
                -> from ('preciosdiarios')
                -> where ($condiciones)
                -> orderBy('nombre');
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function generarCondicionesProductosCabecera($productos){
        if (isset($productos)){
            $condiciones = "idProducto in (";
            $contador = 0;
            foreach($productos as $producto){
                if ($contador == 0){
                    $condiciones .= $producto;
                    $contador++;
                }else{
                    $condiciones .= ",".$producto;
                }
            }
            $condiciones .= ")";
        }else{
            $condiciones = "1=1";
        }
        
        return $condiciones;
    }
    
    public function leerAlhondigasCabecera($alhondigas){
        $condiciones = $this -> generarCondicionesAlhondigasCabecera($alhondigas);
        $query = new Query();
        $query -> select('preciosdiarios.alhondiga')
                -> distinct('alhondiga')
                -> from ('preciosdiarios')
                -> where($condiciones)
                -> orderBy('alhondiga');
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function generarCondicionesAlhondigasCabecera($alhondigas){
        if(isset($alhondigas)){
            $condiciones = "alhondiga in ('";
            $contador = 0;
            foreach($alhondigas as $alhondiga){
                if ($contador == 0){
                    $condiciones .= $alhondiga."'";
                    $contador++;
                }else{
                    $condiciones .= ", '".$alhondiga."'";
                }
            }
            $condiciones .= ")";
        }else{
            $condiciones = "1=1";
        }
        
        return $condiciones;
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
                -> orderBy('id DESC')
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
                -> andWhere("alhondiga = '".$ultimaAlhondiga[0]['alhondiga']."'")
		-> orderBy('preciosdiarios.nombre');
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
        $query -> select(['preciosdiarios.nombre, Round(avg(nullif(corte1, 0)),2) as corte1, Round(avg(nullif(corte2, 0)),2) as corte2, Round(avg(nullif(corte3, 0)),2) as corte3, Round(avg(nullif(corte4, 0)),2) as corte4, Round(avg(nullif(corte5, 0)),2) as corte5, Round(avg(nullif(corte6, 0)),2) as corte6, Round(avg(nullif(corte7, 0)),2) as corte7, Round(avg(nullif(corte8, 0)),2) as corte8, Round(avg(nullif(corte9, 0)),2) as corte9, Round(avg(nullif(corte10, 0)),2) as corte10, Round(avg(nullif(corte11,0)),2) as corte11, Round(avg(nullif(corte12,0)),2) as corte12, Round(avg(nullif(corte13,0)),2) as corte13, Round(avg(nullif(corte14,0)),2) as corte14, Round(avg(nullif(corte15,0)),2) as corte15'])
                -> from ('preciosdiarios')
                -> where ("fecha = '".$today."'")
                -> orderBy ('nombre')
                -> groupBy ("nombre");
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function extraerMediasPorCorte($today){
        $query = new Query();
        $query -> select(['"Media de los productos" as nombre,alhondiga, Round(avg(nullif(corte1, 0)), 2) as corte1, Round(avg(nullif(corte2, 0)), 2) as corte2, Round(avg(nullif(corte3, 0)), 2) as corte3, Round(avg(nullif(corte4, 0)), 2) as corte4, Round(avg(nullif(corte5, 0)), 2) as corte5, Round(avg(nullif(corte6, 0)), 2) as corte6, Round(avg(nullif(corte7, 0)), 2) as corte7, Round(avg(nullif(corte8, 0)), 2) as corte8, Round(avg(nullif(corte9, 0)), 2) as corte9, Round(avg(nullif(corte10,0)), 2) as corte10, Round(avg(nullif(corte11,0)), 2) as corte11, Round(avg(nullif(corte12, 0)), 2) as corte12, Round(avg(nullif(corte13, 0)), 2) as corte13, Round(avg(nullif(corte14,0)), 2) as corte14, Round(avg(nullif(corte15, 0)), 2) as corte15'])
                -> from ('preciosdiarios')
                -> where ("fecha = '".$today."'")
                -> orderBy ('alhondiga')
                -> groupBy ("alhondiga");
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    public function leerPreciosPorSemana($fechaInicial, $fechaFinal, $productos, $alhondigas, $corteInicial, $corteFinal){
        $condiciones = $this -> generarCondiciones($fechaInicial, $fechaFinal, $productos, $alhondigas);
        
        if (isset($corteInicial)&&isset($corteFinal)){
            $seleccion = $this -> generarCondCortes($corteInicial, $corteFinal);
        }
        
        $query = new Query();
        $query -> select([$seleccion])
                -> from ('preciosdiarios')
                -> where($condiciones)
                -> groupBy("WEEK(fecha), nombre, alhondiga")
                -> orderBy("year(fecha), week(fecha), alhondiga, nombre");
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;
    }
    
    
    public function generarCondiciones($fechaInicial, $fechaFinal, $productos, $alhondigas){
        $condiciones = "preciosdiarios.fecha >= '".$fechaInicial."' and preciosdiarios.fecha <= '".$fechaFinal."'";
        if (isset($productos)){
            $condiciones = $this -> generarCondProductos($productos, $condiciones);
        }
        
        if (isset($alhondigas)){
            $condiciones = $this -> generarCondAlhondigas($alhondigas, $condiciones);
        }
        return $condiciones;
        // ¿Por qué coño puse esto? $condiciones .= "and corte1 != 0 and corte2 != 0 and corte3 != 0 and corte4 != 0 and corte5 != 0 and corte6 != 0 and corte7 != 0 and corte8 != 0 and corte9 != 0 and corte10 != 0 and corte11 != 0 and corte12 != 0 and corte13 != 0 and corte14 != 0 and corte 15 != 0";
    }
    
    public function generarCondProductos($productos, $condiciones){
        $contador = 0;
        if(isset($productos)){
            $condiciones .= " and preciosdiarios.idproducto in (";
            foreach($productos as $producto){
                if ($contador == 0){
                    $condiciones .= $producto;
                }else{
                    $condiciones .= ",".$producto;
                }
                    $contador++;
            }
            $condiciones .= ")";
        }
        return $condiciones;
    }
    
    public function generarCondAlhondigas($alhondigas, $condiciones){
        $contador = 0;
        if(isset($alhondigas)){
            $condiciones .= " and preciosdiarios.alhondiga in ('";
            foreach($alhondigas as $alhondiga){
                if ($contador == 0){
                    $condiciones .= $alhondiga."'";
                }else{
                    $condiciones .= ", '".$alhondiga."'";
                }
                    $contador++;
            }
            $condiciones .= ")";
        }
        return $condiciones;
    }
    
    public function generarCondCortes($corteInicial, $corteFinal){
        $seleccion = " avg(nullif(corte".$corteInicial.",0)) as corte".$corteInicial;
        $contador = 1;
        $corteInicial = $corteInicial +1;
        for($corteInicial; $corteInicial <= $corteFinal; $corteInicial++){
            $seleccion .= ", avg(nullif(corte".($corteInicial).",0)) as corte".$corteInicial;
            $contador++;
        }
        $seleccion .= " , nombre, idProducto, WEEK(fecha) as semana, YEAR(fecha), alhondiga";
        
        return $seleccion;
    }
    
    public function leerDiaAnterior($fecha){
	    
	$condicion = "fecha < '".$fecha."'";    
	$query = new Query();
        $query -> select('fecha')
		-> distinct('fecha')
		-> from ('preciosdiarios')
		-> where ($condicion)
		-> orderBy ('fecha DESC')
		-> limit (1);
        $rows = $query -> all(Preciosdiarios::getDb());
        return $rows;    
    }
    
    
}
