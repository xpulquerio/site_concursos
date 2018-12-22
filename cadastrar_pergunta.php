<?php 
session_start();
include_once("banco/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Questões</title> <!-- Titulo do HTML  onselectstart="return false" NAO DEIXA SELECIONAR-->
        <meta charset="utf-8"/> <!-- codificação do HTML -->
        <link rel="stylesheet" type="text/css" href="css/estilo_questoes.css">
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <!-- <link rel="icon" href="imgs/icone.png" type="image/x-icon" /> -->
        <link rel="shortcut icon" href="imgs/icone.png" type="image/x-icon" />
        
        <style>
        
            input, textarea, select{ width: 100%;}
        </style>
    </head>
   
<body> 
    
    <?php 
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
    <form method="POST" action="logica/processa_cadastro_questao.php">
        <table class='main_table'>
            <tr>
                <td>
                    Assunto:
                </td>
                <td>
                    <?php 
                        include 'logica/exibir_filtro_assunto.php';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Prova:
                </td>
                <td>
                    <?php 
                        include 'logica/exibir_filtro_prova.php';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    URL da Imagem:
                </td>
                <td>
                    <input name="img_url" type="text" value="">
                </td>
            </tr>
            <tr>
                <td>
                    Legenda da Imagem:
                </td>
                <td>
                    <input name="legenda_da_imagem" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Texto:
                </td>
                <td>
                    <textarea name="texto" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Pergunta:
                </td>
                <td>
                    <textarea name="pergunta" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Alternativa1:
                </td>
                <td>
                    <textarea name="alternativa1" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Alternativa2:
                </td>
                <td>
                    <textarea name="alternativa2" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Alternativa3:
                </td>
                <td>
                    <textarea name="alternativa3" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Alternativa4:
                </td>
                <td>
                    <textarea name="alternativa4" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Alternativa5:
                </td>
                <td>
                    <textarea name="alternativa5" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    Alternativa correta:
                </td>
                <td>
                    <select name='correta'>
                        <option value='alternativa1'>Alternativa 1</option>
                        <option value='alternativa2'>Alternativa 2</option>
                        <option value='alternativa3'>Alternativa 3</option>
                        <option value='alternativa4'>Alternativa 4</option>
                        <option value='alternativa5'>Alternativa 5</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Resolução:
                </td>
                <td>
                    <textarea name="resolucao" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="reset" value="Resetar">
                </td>
                <td>
                    <input type="submit" name="SendCad" value="Cadastrar">
                </td>
            </tr>
        </table>
    </form>
</body>
   
</html>
