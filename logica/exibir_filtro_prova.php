<?php 
$option = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_STRING);
echo "
    <select name='prova_id'>
        ";
        include 'logica/select_todas_provas.php';
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='".$row['id']."'>".$row['nivel']." ".$row['ano']." ".$row['cargo']." ".$row['sigla']."</option>";
        }
echo "
    </select>";?>