<?php 

header('Content-Type: text/html; charset=utf-8');
define ('HOST', 'localhost');
define ('USER', 'root');
define ('PASS', '');
define ('DBNAME', 'banco_de_questoes');


$conn = new PDO ('mysql:host='.HOST.';dbname='.DBNAME.';',USER, PASS);

$conn->exec("set names utf8");
$conn->exec('SET character_set_connection=utf8');
$conn->exec('SET character_set_client=utf8');
$conn->exec('SET character_set_results=utf8');
?>