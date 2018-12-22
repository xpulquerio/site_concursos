<?php 
        //SQL para selecionar os registros
        
        $string1 = "SELECT MAX(id)+1 as id FROM questao";
        
        //Seleciona registros
        $resultado = $conn->prepare($string1);
        $resultado->execute(); 
?>