<?php
session_start();
include_once("../banco/conexao.php");

$SendCad = filter_input(INPUT_POST, 'SendCad', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";

if($SendCad){
    //Preencher formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sigla = filter_input(INPUT_POST, 'sigla', FILTER_SANITIZE_STRING);

    $result_orgao = "INSERT INTO orgao (nome, sigla) VALUES (:nome, :sigla)";
    
    $result_orgao = $conn->prepare($result_orgao);
    $result_orgao->bindParam(':nome', $nome);
    $result_orgao->bindParam(':sigla', $sigla);
    
    if($result_orgao->execute()){
        $_SESSION['msg'] = "<p style='color:green'>Órgão adicionada com sucesso</p>";
        header("Location: ../cadastrar_orgao.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red'>Órgão não foi cadastrada</p>";
        header("Location: ../cadastrar_orgao.php");
    } 
}
    else {
        echo "Teste";
        $_SESSION['msg'] = "<p style='color:red'>Órgão não foi cadastrada</p>";
        header("Location: ../cadastrar_orgao.php");
}



?>