<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Productos</th>
            <th>Media</th>
            <th>Corte 1</th>
            <th>Corte 2</th>
            <th>Corte 3</th>
            <th>Corte 4</th>
            <th>Corte 5</th>
            <th>Corte 6</th>
            <th>Corte 7</th>
            <th>Corte 8</th>
            <th>Corte 9</th>
            <th>Corte 10</th>
            <th>Corte 11</th>
            <th>Corte 12</th>
            <th>Corte 13</th>
            <th>Corte 14</th>
            <th>Corte 15</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            foreach ($mediasGlobales as $productoGlobal){
                echo "<tr>";
                echo "<td>".$productoGlobal['nombre']."</td>";
                echo "<td>".round($productoGlobal['media'],3)."</td>";
                for ($i = 1; $i < 16; $i++){
                    echo "<td>".$productoGlobal['corte'.$i]."</td>";
                }
            }
        ?>
    </tbody>
</table>
