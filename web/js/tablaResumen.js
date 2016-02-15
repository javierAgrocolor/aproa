/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
    
    
    $productosUnion = $('.laUnion .precios td.columnaProducto');
    $productosCasi = $('.casi .precios td.columnaProducto');
    $productos = $productosUnion.add($productosCasi);
    
    $contador = 0;
    
    $ppUnion = $('.laUnion .precios td.columnaPP');
    $ppCasi = $('.casi .precios td.columnaPP');
    $pp = $ppUnion.add($ppCasi);
    
    $toneladasCasi = $('.casi .toneladas td.columnaPP');
    $toneladasLaUnion = $('.laUnion .toneladas td.columnaPP');
    $toneladasAgroponiente = $('.agroponiente td.columnaPP');
    $toneladasFemago = $('.femago td.columnaPP');
    $toneladasCosta = $('.costa td.columnaPP');
    
    
    $productos.each(function(){
        $contador++;
        $('#fila'+$contador+' td.columna1').html($(this).html());
    });
    
    $contador = 0;
    $pp.each(function(){
        $contador++;
        $('#fila'+$contador+' td.columna2').html(parseFloat($(this).html()));
        
        if($contador < 8){
            $('#fila'+$contador+' td.columna6').html(parseFloat($(this).html()));
        }
        
        if ($contador > 7){
            $('#fila'+$contador+' td.columna4').html(parseFloat($(this).html()));
        }
        
    });
    
    $contador = 7;
    $toneladasCasi.each(function(){
        $contador++;
        $('#fila'+$contador+ ' td.columna5').html(parseFloat($(this).html()));
    });
    
    $contador = 0;
    $toneladasLaUnion.each(function(){
        $contador++;
        $('#fila'+$contador+ ' td.columna7').html(parseFloat($(this).html()));
    });
    
    $contador = 0;
    $toneladasAgroponiente.each(function(){
        $contador++;
        $('#fila'+$contador+ ' td.columna9').html(parseFloat($(this).html()));
    });
    
    $contador = 0;
    $toneladasFemago.each(function(){
        $contador++;
        $('#fila'+$contador+ ' td.columna11').html(parseFloat($(this).html()));
    });
    
    $contador = 0;
    $toneladasCosta.each(function(){
        $contador++;
        $('#fila'+$contador+ ' td.columna13').html(parseFloat($(this).html()));
    });
    
    for($i = 1; $i < 8; $i++){
        $tonUnion = parseFloat($('#fila'+$i+ ' td.columna7').html());
        $tonAgroponiente = parseFloat($('#fila'+$i+ ' td.columna9').html());
        if($i !== 7){
            $tonFemago = parseFloat($('#fila'+$i+ ' td.columna11').html());
        }else{
            $tonFemago = 0;
        }
        $tonCosta = parseFloat($('#fila'+$i+ ' td.columna13').html());
        if(isNaN($tonUnion)){
            $tonUnion = 0;
        }
        
        if(isNaN($tonAgroponiente)){
            $tonAgroponiente = 0;
        }
        
        if(isNaN($tonFemago)){
            $tonFemago = 0;
        }
        
        if(isNaN($tonCosta)){
            $tonCosta = 0;
        }
        
        
        $sumaToneladas = $tonUnion + $tonAgroponiente + $tonFemago + $tonCosta;
        $('#fila'+$i+ ' td.columna3').html($sumaToneladas);
    }
    
    $contador = 7;
    $toneladasCasi.each(function(){
        $contador++;
        $('#fila'+$contador+ ' td.columna3').html(parseFloat($(this).html()));
    })
    
    
});
