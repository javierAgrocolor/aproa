<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<tbody>
    <?php
      
    foreach($ultimaPizarra as $row){
    ?>
    <tr>
    <?php
        echo "<td>".$row['producto']."</td>";
        echo "<td>PUTA MEDIA</td>";
        echo "<td>".$row['corte1']."</td>";
        echo "<td>".$row['corte2']."</td>";
        echo "<td>".$row['corte3']."</td>";
        echo "<td>".$row['corte4']."</td>";
        echo "<td>".$row['corte5']."</td>";
        echo "<td>".$row['corte6']."</td>";
        echo "<td>".$row['corte7']."</td>";
        echo "<td>".$row['corte8']."</td>";
        echo "<td>".$row['corte9']."</td>";
        echo "<td>".$row['corte10']."</td>";
        echo "<td>".$row['corte11']."</td>";
        echo "<td>".$row['corte12']."</td>";
        echo "<td>".$row['corte13']."</td>";
        echo "<td>".$row['corte14']."</td>";
        echo "<td>".$row['corte15']."</td>";
    ?>
    </tr>
    }
    
    ?>
</tbody>
</table>