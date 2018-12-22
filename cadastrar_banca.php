<?php 
session_start();
include("banco/conexao.php");

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
    <form method="POST" action="logica/processa_cadastro_banca.php">
        <table class='main_table'>
            <tr>
                <td>
                    Banca:
                </td>
                <td>
                    <input name="nome" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Sigla:
                </td>
                <td>
                    <input name="sigla" type="text">
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
                    ID
                </th>
                <th>
                    SIGLA
                </th>
                <th>
                    NOME
                </th>
            </tr>
            <?php 
            $n = 0;
            include 'logica/select_todas_bancas.php';   
            
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                $n = $n+1;
            echo "
            <tr>
                <td>".$n."</td>
                <td>".$row['sigla']." (".$row['id'].")</td>
                <td>".$row['nome']."</td>
            </tr>";
            }
            ?>
        </table>
    
    </section>
</body>
   
</html>