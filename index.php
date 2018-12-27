<!DOCTYPE html>
<?php 

include_once("banco/conexao.php");

?>
<html lang="pt-br">
    <head>
        <title>Cubo das Questões</title> <!-- Titulo do HTML  onselectstart="return false" NAO DEIXA SELECIONAR-->
        <meta charset="utf-8"/> <!-- codificação do HTML -->
        <link rel="shortcut icon" href="imgs/icone.png" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" href="css/estilo.css"> 
        <link rel="stylesheet" type="text/css" href="css/style_menu.css"> 
        
    </head>
   
    <body>
        <?php include_once "incs/menu.php"; ?>
        
        <?php 
        
        include "logica/select_questoes_por_materia.php";
        
        echo "Quantidade de questões por matéria:<br><br>";
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<b>".$row['quantidade']."</b> questões de ".$row['nome']."<br><hr>";
            
        }
        
        
        ?>
        
    </body>
</html>
