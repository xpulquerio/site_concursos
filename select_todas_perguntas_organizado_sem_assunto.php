<?php 
        //SQL para selecionar os registros
        //$materia_id = filter_input(INPUT_POST, 'materia_id', FILTER_SANITIZE_STRING);
        
    
        $string1 = "select questao.*, questao_assunto.assunto_id from questao_assunto right join questao on questao_assunto.questao_id = questao.id where questao_assunto.assunto_id is null group by questao.id order by rand() Limit 1";

        //$string1 = "SELECT questao.texto, questao.img_url, questao.id, questao.pergunta, questao.alternativa1, questao.alternativa2, questao.alternativa3, questao.alternativa4, questao.alternativa5, questao.correta, questao.resolucao FROM questao LEFT join questao_assunto on questao.id = questao_assunto.questao_id WHERE questao_assunto.assunto_id is null";

        //Seleciona registros
        $resultado = $conn->prepare($string1);
        $resultado->execute(); 
?>