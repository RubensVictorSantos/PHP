<?php

    require_once('modulo.php');
    $msg = null;
?>
<html>
    <head>
        <title>
            Test
        </title>
    
    </head>
    <body>
            <div style="width:300px;height:300px;margin-left:auto;margin-right:auto;padding-top:50px;">
                <?php
                    $msg = 'Botão de informações';
                    info($msg);
                    
                    proibido();
                ?>
            </div>
    </body>

</html>