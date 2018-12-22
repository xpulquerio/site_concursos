<?php 
$option = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_STRING);

echo "
    <select name='banca_id'>";
        include 'logica/select_todas_bancas.php';
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='".$row['id']."'>".$row['sigla']." - ".$row['nome']."</option>";
        }
echo "
    </select>";?>