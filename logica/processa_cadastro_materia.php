<?php
session_start();
include_once("../banco/conexao.php");

$SendCad = filter_input(INPUT_POST, 'SendCad', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "Email: $email <br>";

if($SendCad){
    //Preencher formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    $result_materia = "INSERT INTO materia (nome) VALUES (:nome)";
    
    $result_materia = $conn->prepare($result_materia);
    $result_materia->bindParam(':nome', $nome);
    
    if($result_materia->execute()){
        $_SESSION['msg'] = "<p style='color:green'>Matéria adicionada com sucesso</p>";
        header("Location: ../cadastrar_materia.php");
    } else {
        $_SESSION['msg'] = "<p style='color:red'>Matéria não foi cadastrada</p>";
        header("Location: ../cadastrar_materia.php");
    } 
}
    else {
        echo "Teste";
        $_SESSION['msg'] = "<p style='color:red'>Matéria não foi cadastrada</p>";
        header("Location: ../cadastrar_materia.php");
}



?>