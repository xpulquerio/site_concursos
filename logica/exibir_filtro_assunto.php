<?php 
//$option = filter_input(INPUT_POST, 'option', FILTER_SANITIZE_STRING);

echo "
    <select name='assunto_id'>";
        include 'logica/select_todos_assuntos.php';
        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
            echo "<option value='".$row['assunto_id']."'>".$row['materia_nome']." - ".$row['assunto_nome']."</option>";
        }
echo "
    </select>";?>