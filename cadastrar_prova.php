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
    
    <form method="POST" action="logica/processa_cadastro_prova.php">
        <table class='main_table'>
            <tr>
                <td>
                    Órgão:
                </td>
                <td>
                    <?php 
                        include 'logica/exibir_filtro_orgao.php'
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Banca:
                </td>
                <td>
                    <?php 
                        include 'logica/exibir_filtro_banca.php'
                    ?>
                </td>
            </tr>
            <tr>
                <td>
                    Cargo:
                </td>
                <td>
                    <input name="cargo" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Ano:
                </td>
                <td>
                    <input name="ano" type="text">
                </td>
            </tr>
            <tr>
                <td>
                    Nível:
                </td>
                <td>
                    <select name="nivel">
                        <option value="Superior">Superior</option>
                        <option value="Médio">Médio</option>
                        <option value="Fundamental">Fundamental</option>
                    </select>
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
                        ANO
                    </th>
                    <th>
                        CARGO
                    </th>
                    <th>
                        NÍVEL
                    </th>
                    <th>
                        BANCA
                    </th>
                    <th>
                        ÓRGÃO
                    </th>
                </tr>
                <?php 
                $n = 0;
                include 'logica/select_todas_provas.php';   

                while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                    $n = $n+1;
                echo "
                <tr id='realcar'>
                    <td><b>".$n."</b></td>
                    <td>".$row['id']."</td>
                    <td>".$row['ano']."</td>
                    <td>".$row['cargo']."</td>
                    <td>".$row['nivel']."</td>
                    <td>".$row['sigla']."</td>
                    <td>".$row['orgao']."</td>
                </tr>";
                }
                ?>
            </table>
        </section>
        
    </form>
</body>
   
</html>