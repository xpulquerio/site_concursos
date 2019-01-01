<?php 

include_once("../banco/conexao.php");

$SendCad = filter_input(INPUT_POST, 'SendCad', FILTER_SANITIZE_STRING);



if($SendCad){
    //Preencher formulário
    
    $assunto_id = filter_input(INPUT_POST, 'assunto_id', FILTER_SANITIZE_STRING);
    $lero_id = filter_input(INPUT_POST, 'id123', FILTER_SANITIZE_STRING);
    
    $result_materia = "INSERT INTO questao_assunto (questao_id, assunto_id) VALUES (:lero_id, :assunto_id)";
    
    $result_materia = $conn->prepare($result_materia);
    $result_materia->bindParam(':lero_id', $lero_id);
    $result_materia->bindParam(':assunto_id', $assunto_id);
    
    var_dump($result_materia);
    
    var_dump($lero_id);
    var_dump($assunto_id);
    

    
    if($result_materia->execute()){
       
        header("Location: ../ajeitar_os_assuntos.php");
    } else {
        
        header("Location: ../ajeitar_os_assuntos.php");
    } 
}
    else {        
        header("Location: ../ajeitar_os_assuntos.php");
}

?>