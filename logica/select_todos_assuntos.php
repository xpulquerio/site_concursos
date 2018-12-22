<?php 
        //SQL para selecionar os registros
        
        $string1 = "SELECT assunto.id as assunto_id, assunto.nome as assunto_nome, materia.nome as materia_nome FROM assunto INNER JOIN materia ON materia.id = assunto.materia_id ORDER BY materia.nome asc, assunto.nome asc";
        
        //Seleciona registros
        $resultado = $conn->prepare($string1);
        $resultado->execute(); 
?>