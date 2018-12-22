<?php 
        //SQL para selecionar os registros
        
        $string1 = "SELECT prova.id, prova.ano, prova.cargo, prova.nivel, banca.sigla, orgao.nome as orgao FROM prova 
INNER JOIN banca 
ON prova.banca_id = banca.id
INNER JOIN orgao
ON prova.orgao_id = orgao.id  
ORDER BY `prova`.`nivel` DESC, `prova`.`id` ASC";
        
        //Seleciona registros
        $resultado = $conn->prepare($string1);
        $resultado->execute(); 
?>