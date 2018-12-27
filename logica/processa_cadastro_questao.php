<?php
session_start();
include_once("../banco/conexao.php");

$SendCad = filter_input(INPUT_POST, 'SendCad', FILTER_SANITIZE_STRING);

if($SendCad){
    //Preencher formulário
    $legenda_da_imagem = filter_input(INPUT_POST, 'legenda_da_imagem', FILTER_SANITIZE_STRING);
    $img_url = filter_input(INPUT_POST, 'img_url', FILTER_SANITIZE_STRING);
    $texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_STRING);
    $pergunta = filter_input(INPUT_POST, 'pergunta', FILTER_SANITIZE_STRING);
    $alternativa1 = filter_input(INPUT_POST, 'alternativa1', FILTER_SANITIZE_STRING);
    $alternativa2 = filter_input(INPUT_POST, 'alternativa2', FILTER_SANITIZE_STRING);
    $alternativa3 = filter_input(INPUT_POST, 'alternativa3', FILTER_SANITIZE_STRING);
    $alternativa4 = filter_input(INPUT_POST, 'alternativa4', FILTER_SANITIZE_STRING);
    $alternativa5 = filter_input(INPUT_POST, 'alternativa5', FILTER_SANITIZE_STRING);
    $correta = filter_input(INPUT_POST, 'correta', FILTER_SANITIZE_STRING);
    $resolucao = filter_input(INPUT_POST, 'resolucao', FILTER_SANITIZE_STRING);
    $prova_id = filter_input(INPUT_POST, 'prova_id', FILTER_SANITIZE_STRING);
    
    
    
    if($img_url == ''){
        $img_url = NULL;
    }
    
    if($legenda_da_imagem == ''){
        $legenda_da_imagem = NULL;
    }
    if($texto == ''){
        $texto = NULL;
    }
    
    if($alternativa3 == ''){
        $alternativa3 = NULL;
    }
    if($alternativa4 == ''){
        $alternativa4 = NULL;
    }
    
    if($alternativa5 == ''){
        $alternativa5 = NULL;
    }
    if($resolucao == ''){
        $resolucao = NULL;
    }
        
    $result_artista = "INSERT INTO questao (legenda_da_imagem, img_url, texto, pergunta, alternativa1, alternativa2, alternativa3, alternativa4, alternativa5, correta, resolucao, prova_id) VALUES (:legenda_da_imagem, :img_url, :texto, :pergunta, :alternativa1, :alternativa2, :alternativa3, :alternativa4, :alternativa5, :correta, :resolucao, :prova_id)";
    
    $insert_artista = $conn->prepare($result_artista);
    $insert_artista->bindParam(':legenda_da_imagem', $legenda_da_imagem);
    $insert_artista->bindParam(':img_url', $img_url);
    $insert_artista->bindParam(':texto', $texto);
    $insert_artista->bindParam(':pergunta', $pergunta);
    $insert_artista->bindParam(':alternativa1', $alternativa1);
    $insert_artista->bindParam(':alternativa2', $alternativa2);
    $insert_artista->bindParam(':alternativa3', $alternativa3);
    $insert_artista->bindParam(':alternativa4', $alternativa4);
    $insert_artista->bindParam(':alternativa5', $alternativa5);
    $insert_artista->bindParam(':correta', $correta);
    $insert_artista->bindParam(':resolucao', $resolucao);
    $insert_artista->bindParam(':prova_id', $prova_id);
    
    
    
    //------------------------------------------------------------------------
    
    include 'select_proximo_id_da_questao.php';
    while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
        $questao_id = $row['id'];
    }
    
    
    $assunto_id = filter_input(INPUT_POST, 'assunto_id', FILTER_SANITIZE_STRING);
    
    $result_questao_assunto = "INSERT INTO questao_assunto (questao_id, assunto_id) VALUES (:questao_id, :assunto_id)";
    
    $insert_questao_assunto = $conn->prepare($result_questao_assunto);
    $insert_questao_assunto->bindParam(':assunto_id', $assunto_id);
    $insert_questao_assunto->bindParam(':questao_id', $questao_id);
    
   
    
    if($insert_artista->execute() and $insert_questao_assunto->execute()){
        $_SESSION['msg'] = "<p style='color:green'>Questão adicionada com sucesso</p>";
        header("Location: ../cadastrar_pergunta.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red'>Questão não foi cadastrada</p>";
        header("Location: ../cadastrar_pergunta.php");
    } 
}
    else {
        echo "Teste";
        $_SESSION['msg'] = "<p style='color:red'>Questão não foi cadastrada</p>";
        header("Location: ../cadastrar_pergunta.php");
}



?>