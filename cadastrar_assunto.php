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
        <link rel="stylesheet" type="text/css" href="css/style_menu.css"> 
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
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
    
    <?php include_once "incs/menu.php"; ?>
    
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
    
    <section>
        <table>
            <tr>
                <th>
                #
                </th>
                <th>
                    ID
                </th>
                <th>
                    NOME
                </th>
                <th>
                    MATÉRIA
                </th>
            </tr>
            <?php 
            $n = 0;
            include 'logica/select_todos_assuntos.php';   
            
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                $n = $n+1;
            echo "
            <tr>
                <td><b>".$n."</b></td>
                <td>".$row['assunto_id']."</td>
                <td>".$row['assunto_nome']."</td>
                <td>".$row['materia_nome']."</td>
            </tr>";
            }
            ?>
        </table>
    
    </section>
    
</body>
   
</html>