<?php
session_start();
include("../restrito.php"); 
include("../config.php"); 

date_default_timezone_set('America/Sao_Paulo'); 

$hoje = date('Y-m-d');  
$hoje_atual = implode('-', array_reverse(explode( '/', $hoje )));

$vaga1=addslashes($_POST['titulovaga']); 
$vaga2=addslashes($_POST['empresa']); 
$vaga3=addslashes($_POST['contato']); 
$vaga4=addslashes($_POST['descricaovaga']); 
$quinzenal = date('Y-m-d', strtotime('+15 days', strtotime($hoje)));

// Gravando diretamente como "liberado"
$grav = $pdo->query("INSERT INTO vaga (
     titulo, empresa, contato, descricao, data, datavenc, status)
VALUES ('$vaga1', '$vaga2', '$vaga3', '$vaga4', '$hoje_atual', '$quinzenal', 'liberado')");

header("Location: cadastravaga.php?sucesso=1");
exit;
?>
