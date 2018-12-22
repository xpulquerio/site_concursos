<?php 
        //SQL para selecionar os registros
        
        $string1 = "SELECT banca.id, banca.sigla, banca.nome FROM banca ORDER BY sigla ASC;";
        
        //Seleciona registros
        $resultado = $conn->prepare($string1);
        $resultado->execute(); 
?>