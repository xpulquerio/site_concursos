<?php 
$option = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_STRING);
echo "
    <select name='prova_id'>
        ";
    $contador = 1;
        include 'logica/select_todas_provas.php';
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='".$row['id']."'>$contador - ".$row['cargo']." ".$row['sigla']." ".$row['orgao']." - [".$row['nivel']." ".$row['ano']."]</option>";
            $contador++;
        }
echo "
    </select>";?>