<?php 
        //SQL para selecionar os registros
        $id_para_pegar_resolucao = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        
        $string1 = "SELECT * FROM questao WHERE id='".$id_para_pegar_resolucao."'";
        
        //Seleciona registros
        $resultado = $conn->prepare($string1);
        $resultado->execute(); 
?>