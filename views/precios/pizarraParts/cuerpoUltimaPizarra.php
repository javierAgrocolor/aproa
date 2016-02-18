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
foreach ($ultimaPizarra as $row) {
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
    echo "<td>" . $media . "</td>";
    echo "<td>" . $row['corte1'] . "</td>";
    echo "<td>" . $row['corte2'] . "</td>";
    echo "<td>" . $row['corte3'] . "</td>";
    echo "<td>" . $row['corte4'] . "</td>";
    echo "<td>" . $row['corte5'] . "</td>";
    echo "<td>" . $row['corte6'] . "</td>";
    echo "<td>" . $row['corte7'] . "</td>";
    echo "<td>" . $row['corte8'] . "</td>";
    echo "<td>" . $row['corte9'] . "</td>";
    echo "<td>" . $row['corte10'] . "</td>";
    echo "<td>" . $row['corte11'] . "</td>";
    echo "<td>" . $row['corte12'] . "</td>";
    echo "<td>" . $row['corte13'] . "</td>";
    echo "<td>" . $row['corte14'] . "</td>";
    echo "<td>" . $row['corte15'] . "</td>";
    ?>
    </tr>
        <?php
    }
    ?>
</tbody>
</table>