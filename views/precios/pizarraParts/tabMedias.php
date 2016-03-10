<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="span12 contenedoresTable margintop">
    <div class="table-responsive">
<table class="table">
    <thead>
        <tr>
            <th>Productos</th>
            <th>Media</th>
            <th></th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
            <th>C6</th>
            <th>C7</th>
            <th>C8</th>
            <th>C9</th>
            <th>C10</th>
            <th>C11</th>
            <th>C12</th>
            <th>C13</th>
            <th>C14</th>
            <th>C15</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $contr = 1;
        $contador = 0;
            foreach ($mediasGlobales as $productoGlobal){
                $mediaActualCalculada = $productoGlobal['media']*10000;
                

                if($contador < count($mediasAnteriores)-1){
                    if(strcmp($productoGlobal['nombre'], $mediasAnteriores[$contador]['nombre']) > 0){
                        while(strcmp($productoGlobal['nombre'], $mediasAnteriores[$contador]['nombre']) > 0 && $contador < count($mediasAnteriores)){
                            $contador++;
                        }
                    }
                }
		if($contador < count($mediasAnteriores)-1){
			$mediaAnteriorCalculada = $mediasAnteriores[$contador]['media']*10000;	
		}
		
                if ($contr != 1) {
                            $contr = 1;
                            echo "<tr class='danger'>";
                echo "<td>".$productoGlobal['nombre']."</td>";
                    if($productoGlobal['media'] != 0){
                        echo "<td>". sprintf("%.2f", round($productoGlobal['media'],2))."</td>";
                    }else{
                        echo "<td> - </td>";
                    }
                
                if($productoGlobal['nombre'] == $mediasAnteriores[$contador]['nombre']){
                    if ($mediaActualCalculada > $mediaAnteriorCalculada){
                        echo "<td><img class='flechas' src='/images/flechaVerde.png' title='Precio Anterior: ".round($mediasAnteriores[$contador]['media'], 2)."' /></td>";
                    }else{
                        if($mediaActualCalculada == $mediaAnteriorCalculada){
                            echo "<td><img class='flechas' src='/images/igual.png' title='Precio Anterior: ".round($mediasAnteriores[$contador]['media'], 2)."' /></td>";
                        }else{
                            echo "<td><img class='flechas' src='/images/flechaRoja.png' title='Precio Anterior: ".round($mediasAnteriores[$contador]['media'], 2)."' /></td>";
                        }
                    }
                    if($contador < count($mediasAnteriores)-1){
                        $contador++;
                    }
                }else{
                    echo "<td></td>";
                }
                
                for ($i = 1; $i < 16; $i++){
                    if($productoGlobal['corte'.$i] != 0){
                        echo "<td>".$productoGlobal['corte'.$i]."</td>";
                    }else{
                        echo "<td> - </td>";
                    }
                    
                }
                        } else {
                            $contr = 2;
                            echo "<tr>";
                echo "<td>".$productoGlobal['nombre']."</td>";
                    if($productoGlobal['media'] != 0){
                        echo "<td>".sprintf("%.2f", round($productoGlobal['media'],2))."</td>";
                    }else{
                        echo "<td> - </td>";
                    }
                if($productoGlobal['nombre'] == $mediasAnteriores[$contador]['nombre']){
                    if ($mediaActualCalculada > $mediaAnteriorCalculada ){
                        echo "<td><img class='flechas' src='/images/flechaVerde.png' title='Precio Anterior: ".round($mediasAnteriores[$contador]['media'], 2)."' /></td>";
                    }else{
                        if($mediaActualCalculada == $mediaAnteriorCalculada){
                            echo "<td><img class='flechas' src='/images/igual.png' title='Precio Anterior: ".round($mediasAnteriores[$contador]['media'], 2)."' /></td>";
                        }else{
                            echo "<td><img class='flechas' src='/images/flechaRoja.png' title='Precio Anterior: ".round($mediasAnteriores[$contador]['media'], 2)."' /></td>";
                        }
                    }
                    if($contador < count($mediasAnteriores)-1){
                        $contador++;
                    }
                }else{
                    echo "<td></td>";
                }
                
                
                for ($i = 1; $i < 16; $i++){
                    if($productoGlobal['corte'.$i] != 0){
                        echo "<td>".$productoGlobal['corte'.$i]."</td>";
                    }else{
                        echo "<td> - </td>";
                    }
                }
                        }
            }
        ?>
    </tbody>
</table>
    </div>
</div>
