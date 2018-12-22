<?php 
        //SQL para selecionar os registros
        
        $string1 = "SELECT * FROM materia ORDER BY nome ASC";
        
        //Seleciona registros
        $resultado = $conn->prepare($string1);
        $resultado->execute(); 
?>