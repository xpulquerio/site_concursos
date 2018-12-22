<?php 
$materia = filter_input(INPUT_POST, 'materia', FILTER_SANITIZE_STRING);
$pesquisa = filter_input(INPUT_POST, 'pesquisa', FILTER_SANITIZE_STRING);
echo "<form method='POST' action='questoes.php'>
        <table>
            <tr>
                <td>
                    Matéria: 
                    <select name='materia'>
                        <option selected='selected' value=''>Todos</option>";
                        include 'logica/select_todas_materias.php';
                        while($row = $resultado->fetch(PDO::FETCH_ASSOC)){
                            echo "<option value='".$row['nome']."'>".$row['nome']."</option>";
                        }
echo "              </select> 
                </td>
            </tr>
            <tr>
                <td>
                    Pergunta: <input type='text' name='pesquisa' value=''/>
                </td>
            </tr>
            <tr>
                <td>
                    <input class='botao' type='submit' value='Filtrar'>
                </td>
            </tr>
        </table>
    </form>";?>