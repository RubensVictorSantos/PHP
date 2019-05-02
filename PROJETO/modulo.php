<?php

/* Essa função vai fazer aparecer um icone feito com div de informações na tela*/
function info($a){
    
    $msg = null;
    $msg = $a;
    
    echo('
        
        <div class="info">
            <div class="btn-informacoes">
                <p>i</p>
                <div class="box-info">
                    <div class="retangulo">
                        <p>
                            '.$msg.'      
                        </p>
                    </div>
                    <div class="triangulo"></div>
                </div>
            </div>
        </div>
    '); 
}
?>