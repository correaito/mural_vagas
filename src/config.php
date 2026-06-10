<?php ob_start();

$host = "db"; //Servidor do mysql
$user = "corre034"; //Usuario do banco de dados
$senha = "03Ybr9xPz2"; //senha do banco de dados
$db = "corre034_wordpress"; //banco de dados
$nome_site = "Mural de Vagas - Paranaguá"; //Nome do site
$site = "https://jrodriguescorretora.com.br"; // Dominio website

$pdo = new PDO('mysql:host=db;dbname=corre034_wordpress', $user, $senha, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

?>
