<?php 

include_once("banco/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Questões</title> <!-- Titulo do HTML  onselectstart="return false" NAO DEIXA SELECIONAR-->
        <meta charset="utf-8"/> <!-- codificação do HTML -->
        <link rel="stylesheet" type="text/css" href="css/estilo_resposta.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

    </head>
   
<body> 

    <?php   
            $escolhida = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
            $verdadeira = filter_input(INPUT_POST, 'correta', FILTER_SANITIZE_STRING);
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        
            if($escolhida==''){
                echo "Você não selecionou nenhuma alternativa!";
            } else {
                if($escolhida==$verdadeira){
                    echo "<table class='correto'><tr><td>
                        <figure>
                            <img id='in_correto' src='imgs/correto.png'/>
                        </figure></td><td>
                    
                        <b class='acertou'>VOCÊ ACERTOU !!!</b></td>";
                } else {
                    echo "<table class='incorreto'><tr><td>
                        <figure>
                        
                            <img id='in_correto' src='imgs/incorreto.png'/>
                        </figure></td><td>
                        <b class='errou'>VOCÊ ERROU !!!</b></td>";
                }
                
            echo "
            <td>
            <form method='POST' action='resolucao.php'>
                <input type='hidden' name='id' value='".$id."'/>
                <input class='botao' type='submit' value='Mostrar resolução'/>
            </form></td></tr></table>";
            
            }
            
            
           
        
        
    ?>
</body>
   
</html>
