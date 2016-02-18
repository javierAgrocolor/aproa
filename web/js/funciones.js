/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $(".filtros").prepend("<option id='null' value='' selected='selected'></option>");
    $(".filtros2").prepend("<option id='null' value='%' selected='selected'></option>");

    $('#yearsMayoristas').change(cargarSemanasSinAjax);

    $('#filtroProducto').submit(function (event) {
        if (!$("input[name='opcionesConsulta']").is(':checked')) {
            event.preventDefault();
            alert("Debes seleccionar un tipo de consulta");
        }
    });

    $('#confirmarModalSemanas').click(function(){
       $('#filtrosModalSemanas').submit(); 
    });
    
    //PAGINATION!!!!!

    // mind the slight change below, personal idea of best practices
    jQuery(function ($) {
        // consider adding an id to your table,
        // just incase a second table ever enters the picture..?
        var items = $("#content tbody tr");

        var numItems = items.length;
        var perPage = 10;

        // only show the first 2 (or "first per_page") items initially
        items.slice(perPage).hide();

        // now setup your pagination
        // you need that .pagination-page div before/after your table
        $(".pagination-page").pagination({
            items: numItems,
            itemsOnPage: perPage,
            cssStyle: "light-theme",
            onPageClick: function (pageNumber) { // this is where the magic happens
                // someone changed page, lets hide/show trs appropriately
                var showFrom = perPage * (pageNumber - 1);
                var showTo = showFrom + perPage;

                items.hide() // first hide everything, then show for the new page
                        .slice(showFrom, showTo).show();
            }
        });



        // EDIT: extra stuff to cover url fragments (i.e. #page-3)
        // https://github.com/bilalakil/bin/tree/master/simplepagination/page-fragment
        // is more thoroughly commented (to explain the regular expression)

        // we'll create a function to check the url fragment and change page
        // we're storing this function in a variable so we can reuse it
        var checkFragment = function () {
            // if there's no hash, make sure we go to page 1
            var hash = window.location.hash || "#page-1";

            // we'll use regex to check the hash string
            hash = hash.match(/^#page-(\d+)$/);

            if (hash)
                // the selectPage function is described in the documentation
                // we've captured the page number in a regex group: (\d+)
                $("#pagination").pagination("selectPage", parseInt(hash[1]));
        };

        // we'll call this function whenever the back/forward is pressed
        $(window).bind("popstate", checkFragment);

        // and we'll also call it to check right now!
        checkFragment();



    });
    //////FIN PAGINATION


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

    function cargarSemanasSinAjax() {
        var idCampania = $("#yearsMayoristas option:selected").val();

        $('#formYears').submit();
    }
    
    function defaultTabSemanas(){
        $(document).ready(function(){
            $('#pizarras').removeClass('active');
            $('#precioSemana').addClass('active');
        });
    }

    
});


