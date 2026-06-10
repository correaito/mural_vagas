<?php
include("../config.php"); // Configuração do BD

date_default_timezone_set('America/Sao_Paulo'); // Estabelece a data/hora de Brasilia 

$id= $_POST['id'];
$vaga1=addslashes($_POST['titulovaga']); 
$vaga2=addslashes($_POST['empresa']); 
$vaga3=addslashes($_POST['contato']); 
$vaga4=addslashes($_POST['descricao']); 
$vaga5="liberado";


      // grava os dados na tabela propostaresid
  $atualizarapolice = $pdo->query("UPDATE vaga SET titulo='$vaga1', empresa='$vaga2', contato='$vaga3', descricao='$vaga4', status='$vaga5' where id='$id'");
