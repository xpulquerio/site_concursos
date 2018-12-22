<?php 
session_start();
include_once("banco/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Questões</title> <!-- Titulo do HTML  onselectstart="return false" NAO DEIXA SELECIONAR-->
        <meta charset="utf-8"/> <!-- codificação do HTML -->
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
    <form method="POST" action="logica/processa_cadastro_assunto.php">
        <table class='main_table'>
            <tr>
                <td>
                    Matéria:
                </td>
                <td>
                    <?php 
                        include 'logica/exibir_filtro_materia.php';
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Assunto:
                </td>
                <td>
                    <input name="nome" type="text">
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