<?php
session_start();
include_once("../banco/conexao.php");

$SendCad = filter_input(INPUT_POST, 'SendCad', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";

if($SendCad){
    //Preencher formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $materia_id = filter_input(INPUT_POST, 'materia_id', FILTER_SANITIZE_STRING);
    
    $result_assunto = "INSERT INTO assunto (nome, materia_id) VALUES (:nome, :materia_id)";
    
    $result_assunto = $conn->prepare($result_assunto);
    $result_assunto->bindParam(':nome', $nome);
    $result_assunto->bindParam(':materia_id', $materia_id);

    
    if($result_assunto->execute()){
        $_SESSION['msg'] = "<p style='color:green'>Assunto adicionada com sucesso</p>";
        header("Location: ../cadastrar_assunto.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red'>Assunto não foi cadastrada</p>";
        header("Location: ../cadastrar_assunto.php");
    } 
}
    else {
        echo "Teste";
        $_SESSION['msg'] = "<p style='color:red'>Assunto não foi cadastrada</p>";
        header("Location: ../cadastrar_assunto.php");
}



?>