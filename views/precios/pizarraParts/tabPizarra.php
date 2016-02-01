<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="ultimaPizarra">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseUltima" aria-expanded="true" aria-controls="collapseUltima">
                    Última Pizarra
                </a>
            </h4>
        </div>
    </div>
    <div id="collapseUltima" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="ultimaPizarra">
        <div class="panel-body">
            <?php
            
            if (is_array($ultimaPizarra)){
                require("aproa/views/precios/pizarraParts/cabeceraTablaPizarra.php");
                require("aproa/views/precios/pizarraParts/cuerpoUltimaPizarra.php");
            }else{
                echo $ultimaPizarra;
            }
            
            ?>
        </div>
    </div>
</div>