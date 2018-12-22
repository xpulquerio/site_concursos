<?php 
include_once("banco/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Questões</title> <!-- Titulo do HTML  onselectstart="return false" NAO DEIXA SELECIONAR-->
        <meta charset="utf-8"/> <!-- codificação do HTML -->
        <link rel="stylesheet" type="text/css" href="css/estilo_resolucao.css">   
        <link rel="stylesheet" type="text/css" href="css/estilo.css">   
    </head>
   
<body> 
<?php   
        
        include 'logica/select_resolucao.php';
        
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){ 
            
        echo "  <b> RESOLUÇÃO </b>
                <br/><br/>
                <div class='texto_resolucao'>
                ".$row['resolucao']."
                </div>
                <br/>
                <b style='color:green'>Correta: ".$row["".$row['correta'].""]."</b>";
            
        }
?>
    </body>
</html> 