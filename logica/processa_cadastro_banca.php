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

    $result_banca = "INSERT INTO banca (nome, sigla) VALUES (:nome, :sigla)";
    
    $result_banca = $conn->prepare($result_banca);
    $result_banca->bindParam(':nome', $nome);
    $result_banca->bindParam(':sigla', $sigla);
    
    if($result_banca->execute()){
        $_SESSION['msg'] = "<p style='color:green'>Banca adicionada com sucesso</p>";
        header("Location: ../cadastrar_banca.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red'>Banca não foi cadastrada</p>";
        header("Location: ../cadastrar_banca.php");
    } 
}
    else {
        echo "Teste";
        $_SESSION['msg'] = "<p style='color:red'>Questão não foi cadastrada</p>";
        header("Location: ../cadastrar_banca.php");
}



?>