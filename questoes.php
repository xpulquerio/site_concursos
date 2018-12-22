<?php 

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
        
        
    </head>
   
<body> 

    <table class='main_table'>
        <tr>
            <td>
                <!--<a href="bancas.php">BANCAS</a>-->
                <figure class='figure_principal'>
                    <img id='main_img' src='imgs/icone2.png'>
                </figure>
            </td>
            <td>
                <?php 
                    include 'logica/exibir_filtro.php'
                ?>
            </td>
            <td>
                
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
        </tr>
    </table>
            
            <table class='tabela_questoes'>
            <?php
            
            include 'logica/select_todas_perguntas_organizado.php';   
            $contador_de_questoes = 1;
            while($row = $resultado->fetch(PDO::FETCH_ASSOC)){ 
            echo "
            <hr>
            
            
            
                <tr>
                    <td>
                       <form method='POST' target='".$row['id']."' action='resposta.php'>
                       <table>";
                            
                            if($row['texto']){
                                echo "<div class='texto'>".$row['texto']."<br><br></div>";
                                }

                                        
                            if($row['img_url']){
                               echo "
                                <tr>  
                                    <td>
                                        <figure>
                                            <img id='img_da_noticia' src='imgs/".$row['img_url']."'>
                                            <b><figcaption>".$row['legenda_da_imagem']."</figcaption></b>
                                        </figure>
                                    </td>
                                </tr>";
                                }
                            
                
                            echo "
                            <tr>
                                <td><b id='pergunta'><u style='color: gray'>[COD.".$row['id']."]</u> ". $contador_de_questoes ." - ". $row['banca'] ." (". $row['ano'] .") - ". $row['pergunta'] ."</b><br><br></td>
                            </tr>
                            
                            ";
                            $lista = array("'".$row['alternativa1']."'","'".$row['alternativa2']."'","'".$row['alternativa3']."'","'".$row['alternativa4']."'","'".$row['alternativa5']."'");
                        
                            $index = 1;
                            
                            $indexadores = array (1,2,3,4,5);
                            shuffle($indexadores);
                            $letras = array('A','B','C','D','E');
                            
                
                            
                            while ($index <= 5){
                                $temp = "alternativa".$indexadores[$index-1];
                                if($row["".$temp.""]!=NULL){            
                                echo "<tr>
                                <td>".$letras[$index-1].") - <input id='".$row['id'].$temp."' type='radio' name='gender' value='".$temp."'><label id='alternativa' for='".$row['id'].$temp."'>". $row["".$temp.""] .".</label></td>
                                
                                </tr>";
                                }
                                $index = $index+1;
                            }
                             echo   "
                           </table>
                           <input type='hidden' name='id' value='". $row['id'] ."'/>
                           <input type='hidden' name='correta' value='". $row['correta'] ."'/>
                           <br><input class='botao' type='submit' value='Responder'>
                           <br><br>
                           
        
                        </form>
                    </td>
                </tr>";
            ?>
            </table>
    
            <?php echo "
            <iframe name='". $row['id'] ."'></iframe>
            
  
             ";
            $contador_de_questoes = $contador_de_questoes + 1;
            }
                
             $conn = NULL;   
            ?>
                
          

 

</body>
   
</html>