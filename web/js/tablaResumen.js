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
    $totalproductos = $contador;
    $contador = 0;
    $pp.each(function(){
        $contador++;
	
	if($totalproductos > 7){
        $anteriorPre = $('#fila'+$contador+ ' td.columna2').html();
	}else{
        $anteriorPre = $('#fila'+($contador+6)+ ' td.columna2').html();
	}
        
        if(parseFloat($(this).html())>0){
		$('#fila'+$contador+' td.columna2').html($anteriorPre+" "+(parseFloat($(this).html())).toFixed(2));
	}else{
		$('#fila'+$contador+' td.columna2').html("");
	}
	
               
	
        if($contador < 8 && parseFloat($(this).html())>0 && $ppUnion.size()>0){
            $('#fila'+$contador+' td.columna6').html((parseFloat($(this).html())).toFixed(2));
        }else{
		$('#fila'+$contador+' td.columna6').html("");
	}
	
	if ($contador < 8 && parseFloat($(this).html()) > 0 && $ppUnion.size()<1) {
            $('#fila' + $contador + ' td.columna4').html((parseFloat($(this).html())).toFixed(2));
        }
        
        if ($contador > 7 && parseFloat($(this).html())>0){
            $('#fila'+$contador+' td.columna4').html((parseFloat($(this).html())).toFixed(2));
        }else{
		
	}	
        
    });
    
     if($totalproductos > 7){
        $contador = 7;
    }else{
        $contador = 0;
    }
    $toneladasCasi.each(function(){
        $contador++;
        if(parseFloat($(this).html())>0){
		$('#fila'+$contador+ ' td.columna5').html((parseFloat($(this).html())).toFixed(2));
	}else{
		$('#fila'+$contador+ ' td.columna5').html("");
	}
    });
    
    $contador = 0;
    $toneladasLaUnion.each(function(){
        $contador++;
	if(parseFloat($(this).html())>0){
		$('#fila'+$contador+ ' td.columna7').html((parseFloat($(this).html())).toFixed(2));
	}else{
		$('#fila'+$contador+ ' td.columna7').html("");
	}
        
    });
    
    $contador = 0;
    $toneladasAgroponiente.each(function(){
        $contador++;
        if(parseFloat($(this).html())>0){
		$('#fila'+$contador+ ' td.columna9').html((parseFloat($(this).html())).toFixed(2));
	}else{
		$('#fila'+$contador+ ' td.columna9').html("");
	}
    });
    
    $contador = 0;
    $toneladasFemago.each(function(){
        $contador++;
        if(parseFloat($(this).html())>0){
		$('#fila'+$contador+ ' td.columna11').html((parseFloat($(this).html())).toFixed(2));
	}else{
		$('#fila'+$contador+ ' td.columna11').html("");
	}
    });
    
    $contador = 0;
    $toneladasCosta.each(function(){
        $contador++;
        if(parseFloat($(this).html())>0){
		$('#fila'+$contador+ ' td.columna13').html((parseFloat($(this).html())).toFixed(2));
	}else{
		$('#fila'+$contador+ ' td.columna13').html("");
	}
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
        $anteriorTon = $('#fila'+$i+ ' td.columna3').html();
	if($sumaToneladas>0){
        $('#fila'+$i+ ' td.columna3').html($anteriorTon+" "+$sumaToneladas.toFixed(2));
	}
    }
    
    if($totalproductos > 7){
        $contador = 7;
    }else{
        $contador = 0;
    }
    $toneladasCasi.each(function(){
        $contador++;
	if($totalproductos > 7){
        $anteriorTon = $('#fila'+$contador+ ' td.columna3').html();
	}else{
        $anteriorTon = $('#fila'+($contador+6)+ ' td.columna3').html();
	}
        
	if(parseFloat($(this).html())>0){
		$('#fila'+$contador+ ' td.columna3').html($anteriorTon+" "+(parseFloat($(this).html())).toFixed(2));
	}else{
		$('#fila'+$contador+' td.columna3').html("");
	}	
	
        
   })
    
    
});
