<?php

/* Essa função vai fazer aparecer um icone feito com div de informações na tela*/
function info($a){
    
    $msg = null;
    $msg = $a;

?>

    <div class="info">
        <div class="btn-informacoes">
            <p>i</p>
            <div class="box-info">
                <div class="retangulo">
                    <p>
                        <?php 
                            echo($msg);
                        
                        ?>      
                    </p>
                </div>
                <div class="triangulo"></div>
            </div>
        </div>
    </div>

<?php
}

?>