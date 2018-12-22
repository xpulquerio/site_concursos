<?php 
$option = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_STRING);
echo "
    <select name='materia_id'>
        ";
        include 'logica/select_todas_materias.php';
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='".$row['id']."'>".$row['nome']."</option>";
        }
echo "
    </select>";?>