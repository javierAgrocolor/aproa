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
foreach ($listaPizarras[$y] as $row) {
    
    $contador = 0;
    $suma = 0;
    for ($i = 1; $i < 16; $i++){
        if ($row['corte'.$i] != 0){
            $suma += $row['corte'.$i];
            $contador++;
        }
    }
    $media = $suma/$contador;
    $media = round($media, 2);
    
    if ($contr != 1) {
        $contr = 1;
        echo "<tr class='danger'>";
    } else {
        $contr = 2;
        echo "<tr>";
    }
    echo "<td>" . $row['nombre'] . "</td>";
    echo "<td>" .$media. "</td>";
    echo "<td class='corte1'>" . $row['corte1'] . "</td>";
    echo "<td class='corte2'>" . $row['corte2'] . "</td>";
    echo "<td class='corte3'>" . $row['corte3'] . "</td>";
    echo "<td class='corte4'>" . $row['corte4'] . "</td>";
    echo "<td class='corte5'>" . $row['corte5'] . "</td>";
    echo "<td class='corte6'>" . $row['corte6'] . "</td>";
    echo "<td class='corte7'>" . $row['corte7'] . "</td>";
    echo "<td class='corte8'>" . $row['corte8'] . "</td>";
    echo "<td class='corte9'>" . $row['corte9'] . "</td>";
    echo "<td class='corte10'>" . $row['corte10'] . "</td>";
    echo "<td class='corte11'>" . $row['corte11'] . "</td>";
    echo "<td class='corte12'>" . $row['corte12'] . "</td>";
    echo "<td class='corte13'>" . $row['corte13'] . "</td>";
    echo "<td class='corte14'>" . $row['corte14'] . "</td>";
    echo "<td class='corte15'>" . $row['corte15'] . "</td>";
    ?>
    </tr>
        <?php
    }
    ?>
</tbody>
</table>
</div>