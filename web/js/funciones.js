/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {
    $(".filtros").prepend("<option id='null' value='' selected='selected'></option>");
    $(".filtros2").prepend("<option id='null' value='%' selected='selected'></option>");
    
    $('#yearsMayoristas').change(cargarSemanasSinAjax);
    
    $('#filtroProducto').submit(function (event){
        if (!$("input[name='opcionesConsulta']").is(':checked')){
            event.preventDefault();
            alert("Debes seleccionar un tipo de consulta");
        }
    });
    
    /*$("input[name='opcionesConsulta']").change(function(){
        if ($("#consultaSemanal").is(':checked')){
            alert ("consultaSemanal elegida");
        }
    });*/
    
    
    
    /*function cargarSemanas(){
        var idCampania = $("#yearsMayoristas option:selected").val();
        $.ajax({
            url: "leersemanas",
            type: "POST",
            datatype: "json",
            data: { id: idCampania },
            success: function(response) {
                var cboxSemana = document.getElementById("semanas");
                while (cboxSemana.hasChildNodes()){
                    cboxSemana.removeChild(cboxSemana.lastChild);
                }
                var array = jQuery.parseJSON(response);
                var aux = 0;
                for (var x = 0; x < array.length-1; x++){
                    if (aux == 0){
                        var optionSemanas = document.createElement("option");
                        optionSemanas.innerHTML = array[x]['fecha'];
                        optionSemanas.value = array[x]['week'];
                        optionSemanas.id = array[x]['week'];
                        aux = 1;
                    }
                    
                    if (array[x+1]['week']!=array[x]['week'] && aux == 1){
                        optionSemanas.innerHTML += array[x]['fecha'];
                        cboxSemana = document.getElementById("semanas");
                        cboxSemana.appendChild(optionSemanas);
                        
                        var liSemanas = document.createElement("li");
                        liSemanas.class = 'active-result';
                        liSemanas.setAttribute("data-option-array-index", x+1);
                        $("div#semanas_chosen.chosen-container.chosen-container-multi div.chosen-drop ul.chosen-results").append(liSemanas);
                        aux = 0;
                    }
                }
            },
            error: function (response) {
                alert("PAYASO");
            },
        complete: function() {
                $('#semanas').trigger("chosen:updated");
                $('.chosen-results').trigger("chosen:updated");
                alert("ya he hecho el trigger");
            }
        });
    }*/
    
    function cargarSemanasSinAjax(){
        var idCampania = $("#yearsMayoristas option:selected").val();
        
        $('#formYears').submit();
    }
    
});


