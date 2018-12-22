<?php
session_start();
include_once("../banco/conexao.php");

$SendCad = filter_input(INPUT_POST, 'SendCad', FILTER_SANITIZE_STRING);

if($SendCad){
    //Preencher formulário
    $ano = filter_input(INPUT_POST, 'ano', FILTER_SANITIZE_STRING);
    $cargo = filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_STRING);
    $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
    $banca_id = filter_input(INPUT_POST, 'banca_id', FILTER_SANITIZE_STRING);
    $orgao_id = filter_input(INPUT_POST, 'orgao_id', FILTER_SANITIZE_STRING);
    
    $result_prova = "INSERT INTO prova (ano, nivel, cargo, banca_id, orgao_id) VALUES (:ano, :nivel, :cargo, :banca_id, :orgao_id)";
    
    $result_prova = $conn->prepare($result_prova);
    $result_prova->bindParam(':ano', $ano);
    $result_prova->bindParam(':nivel', $nivel);
    $result_prova->bindParam(':cargo', $cargo);
    $result_prova->bindParam(':banca_id', $banca_id);
    $result_prova->bindParam(':orgao_id', $orgao_id);
    
    if($result_prova->execute()){
        $_SESSION['msg'] = "<p style='color:green'>Prova adicionada com sucesso</p>";
        header("Location: ../cadastrar_prova.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red'>Prova não foi cadastrada</p>";
        header("Location: ../cadastrar_prova.php");
    } 
}
    else {
        echo "Teste";
        $_SESSION['msg'] = "<p style='color:red'>Prova não foi cadastrada</p>";
        header("Location: ../cadastrar_prova.php");
}



?>