<?php
include("config.php"); // Configuração do BD

date_default_timezone_set('America/Sao_Paulo'); // Estabelece a data/hora de Brasilia 

$hoje = date('Y-m-d');  // formato de data/hora padrão
$hoje_atual = implode('-', array_reverse(explode( '/', $hoje )));


$vaga1=addslashes($_POST['titulovaga']); 
$vaga2=addslashes($_POST['empresa']); 
$vaga3=addslashes($_POST['contato']); 
$vaga4=addslashes($_POST['descricaovaga']); 
$quinzenal = date('Y-m-d', strtotime('+15 days', strtotime($hoje)));



      // grava os dados na tabela propostaresid
$grav = $pdo->query("INSERT INTO vaga (
     titulo, empresa, contato, descricao, data, datavenc)
VALUES ('$vaga1', '$vaga2', '$vaga3', '$vaga4', '$hoje_atual', '$quinzenal')");


?>