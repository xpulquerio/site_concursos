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
        <link rel="stylesheet" type="text/css" href="css/style_menu.css"> 
        
        
    </head>
   
<body> 
    
    <?php include_once "incs/menu.php"; ?>
    
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
            
            include 'select_todas_perguntas_organizado_sem_assunto.php';   
            $contador_de_questoes = 1;
            while($row1 = $resultado->fetch(PDO::FETCH_ASSOC)){ 
                
                
            
            echo "
            <hr>
            
            
            
                <tr>
                    <td>
                       <form method='POST' target='".$row1['id']."' action='logica/alterar_assunto.php'>
                       <table>";
                            
                            if($row1['texto']){
                                echo "<div class='texto'>".$row1['texto']."<br><br></div>";
                                }

                                        
                            if($row1['img_url']){
                               echo "
                                <tr>  
                                    <td>
                                        <figure>
                                            <img id='img_da_noticia' src='imgs/".$row1['img_url']."'>
                                            <b><figcaption>".$row1['legenda_da_imagem']."</figcaption></b>
                                        </figure>
                                    </td>
                                </tr>";
                                }
                            
                
                            echo "
                            <tr>
                                <td><b id='pergunta'><u style='color: gray'>[COD.".$row1['id']."]</u> ". $contador_de_questoes ." - ". $row1['pergunta'] ."</b><br><br></td>
                            </tr>
                            
                            ";
                            $lista = array("'".$row1['alternativa1']."'","'".$row1['alternativa2']."'","'".$row1['alternativa3']."'","'".$row1['alternativa4']."'","'".$row1['alternativa5']."'");
                        
                            $index = 1;
                            
                            $indexadores = array (1,2,3,4,5);
                            shuffle($indexadores);
                            $letras = array('A','B','C','D','E');
                            
                            $id = $row1['id'];
                            
                            while ($index <= 5){
                                $temp = "alternativa".$indexadores[$index-1];
                                if($row1["".$temp.""]!=NULL){            
                                echo "<tr>
                                <td>".$letras[$index-1].") - <input id='".$row1['id'].$temp."' type='radio' name='gender' value='".$temp."'><label id='alternativa' for='".$row1['id'].$temp."'>". $row1["".$temp.""] .".</label></td>
                                
                                </tr>";
                                }
                                $index = $index+1;
                            }
                
                            
                            include 'logica/exibir_filtro_assunto.php';
                
                             echo   "
                           </table>
                           
                           <input type='hidden' name='id123' value='". $row1['id'] ."'/>
                           <input type='hidden' name='correta' value='". $row1['correta'] ."'/>
                           <br><input class='botao' type='submit' name='SendCad' value='Alterar'>
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