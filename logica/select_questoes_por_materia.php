<?php 
        //SQL para selecionar os registros
        
        $string3 = "SELECT nome, COUNT(T.questao_id) as quantidade FROM (SELECT questao_assunto.questao_id, materia.nome FROM questao_assunto INNER JOIN assunto ON questao_assunto.assunto_id = assunto.id INNER JOIN materia ON assunto.materia_id = materia.id GROUP BY questao_assunto.questao_id ORDER BY `assunto_id` ASC) T GROUP BY nome ORDER BY nome";
        
        //Seleciona registros
        $resultado = $conn->prepare($string3);
        $resultado->execute(); 
?>