<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<tbody>
    <?php
    $contr = 1;
    if(is_array($listaPizarrasProducto[$y])){
        foreach($listaPizarrasProducto[$y] as $row){
    
        if ($contr != 1) {
        $contr = 1;
        echo "<tr class='danger'>";
    } else {
        $contr = 2;
        echo "<tr>";
    }
       
            echo "<td>".$row['nombre']."</td>";
            echo "<td>".sprintf("%.2f", round($row['media'], 2))."</td>";
            for($x = 1; $x < 16; $x++){
                if($row['corte'.$x] != 0){
                    echo "<td>".$row['corte'.$x]."</td>";
                }else{
                    echo "<td> - </td>";
                }
            }
        ?>
        </tr>
          
    
    <?php
        }
    }else{
        echo "<tr>".$listaPizarrasProducto[$y]."</tr>";
    }
    
    ?>
</tbody>
</table>
</div>
