<?php

/* Essa função vai fazer aparecer um icone feito com div de informações na tela*/
function info($a){
    
    $msg = null;
    $msg = $a;

?>
<style type="text/css">
    
    p{
        
        margin: 0px;
        padding: 0px;
    }
    .info{
    
        width: 35px;
        height: 35px;
        padding: 7px 6px 5px 6px;
        text-align: center;
        box-sizing: border-box;
        float: left;
    }

    .retangulo{

        width: 250px;
        height: 50px;
        padding: 5px;
        font-weight: 100;
        text-align: center;
        font-family: Arial, Helvetica, sans-serif;
        color: white;
        border-radius: 2px 2px;
        background-color: rgba(50,50,50,0.9);
        box-sizing: border-box;
    }

    .triangulo{

        width: 0px;
        height: 0px;
        margin: 0px 0px 0px 20px;
        border-left: 8px solid transparent; 
        border-right: 8px solid transparent; 
        border-top: 10px solid rgba(50,50,50,0.9);

    }

    .box-info{
    
        width: 300px;
        height: 50px;
        margin: -82px 0px 0px -20px;
/*        position:absolute;*/
        box-sizing: border-box;
        display: none;
    }

    .btn-informacoes{

        width: 20px;
        height: 20px;
        font-family: "Times New Roman", Times, serif;
        text-align: center;
        border-radius: 50px 50px;
        color: white;
        font-weight: bold;
        padding: 1px 1px 1px 2px;
        background-color: #031;
        box-sizing: border-box;
        cursor: pointer;
    }

    .btn-informacoes:hover .box-info{
        display: block;

    }
    
    .proibido{
    
        width: 55px;
        height: 55px;
        background-color: white;
        border: 4px solid black;
        border-radius: 50% 50%;
        box-sizing: border-box;
        overflow: hidden;

    }

    .barra{

        width: 0px;
        height: 0px;
        margin-top: 2.2px;
    /*    margin: 0px 0px 0px 0px;*/
    /*    border-left: 10px solid transparent; */
        border-right: 50px solid transparent; 
        border-top: 50px solid black;
    }

    .barra1{

        width: 0px;
        height: 20px;
        margin-top: -56px;
    /*    margin: 0x 0px 0px 0px;*/
    /*    border-left: 10px solid transparent; */
        border-right: 50px solid transparent; 
        border-top: 50px solid white;
    }
    
</style>

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

/* Essa função vai fazer aparecer um icone feito com div proibido*/
function proibido(){
    
?>
    <div class="proibido">
                                
        <div class="barra" class="center">
            <div class="barra1" class="center">

            </div>
            
        </div>
        
    </div>

<?php
}      
?>