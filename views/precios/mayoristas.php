<?php
use yii\helpers\ArrayHelper;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

foreach ($mayoristas as $valor){
    echo $valor -> fecha;
}
?>

<form action="" id="filtroProducto">
    <select id="productos" class="form-control">
        <?php 
            foreach ($producto as $especie){
                echo "<option id='".$especie->codigo_producto."'>".$especie->producto."</option>";
            } 
        ?>
    </select>
    <!-- el br de debajo es una ñapa temporal no me seas mendrugo.-->
    <br>
    <select id="origen" class="form-control">
        <?php
            foreach ($origen as $pais){
                echo "<option id='".$pais->codigo_origen."'>".$pais->origen."</option>";
            }
        ?>
    </select>
</form>

