<?php 
        //SQL para selecionar os registros
        //$materia_id = filter_input(INPUT_POST, 'materia_id', FILTER_SANITIZE_STRING);
        
    
        $string1 = "SELECT T.*, materia.nome FROM (SELECT questao.*, prova.ano, prova.nivel, prova.cargo, banca.sigla as banca, orgao.nome as orgao FROM questao INNER JOIN prova ON questao.prova_id = prova.id INNER JOIN banca on prova.banca_id = banca.id INNER JOIN orgao on prova.orgao_id = orgao.id) T INNER JOIN questao_assunto on T.id = questao_assunto.questao_id INNER JOIN assunto on questao_assunto.assunto_id = assunto.id INNER JOIN materia on assunto.materia_id = materia.id WHERE materia.nome LIKE '%".$materia."%' AND pergunta LIKE '%".$pesquisa."%'  GROUP BY T.id ORDER BY id asc";

        //$string1 = "SELECT questao.texto, questao.img_url, questao.id, questao.pergunta, questao.alternativa1, questao.alternativa2, questao.alternativa3, questao.alternativa4, questao.alternativa5, questao.correta, questao.resolucao FROM questao LEFT join questao_assunto on questao.id = questao_assunto.questao_id WHERE questao_assunto.assunto_id is null";

        //Seleciona registros
        $resultado = $conn->prepare($string1);
        $resultado->execute(); 
?>