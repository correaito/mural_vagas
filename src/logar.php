<?php ob_start();
include("config.php");

// remove os caracteres especiais para evitar SQL Injection
$login = preg_replace('/[^[:alpha:]_]/', '',$_POST['usuario']);
$senha = preg_replace('/[^[:alnum:]_]/', '',$_POST['senha']);

/* Procura na tabela user uma linha que contenha o login e a senha digitada */
$sql_logar = $pdo->prepare("SELECT * FROM user WHERE usuario = :login && senha = :senha");
$sql_logar->bindParam( ':login', $login );
$sql_logar->bindParam( ':senha', $senha );
$sql_logar->execute();
$fet_logar = $sql_logar->fetch();
$num_logar = $sql_logar->rowCount();

// Verifica se o usuário digitado consta na tabela user
if ($num_logar == 0){
 
echo '1';
 } 

else {  
 
session_start();

$_SESSION['id'] = $fet_logar['id'];
$_SESSION['usuario'] = $fet_logar['usuario']; 
$_SESSION['senha'] = $fet_logar['senha']; 

echo '2';

}
?>