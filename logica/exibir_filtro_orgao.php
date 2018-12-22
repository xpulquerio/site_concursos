<?php 
$option = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_STRING);

echo "
    <select name='orgao_id'>";
        include 'logica/select_todos_orgaos.php';
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='".$row['id']."'>".$row['nome']." - ".$row['sigla']."</option>";
        }
echo "
    </select>";?>