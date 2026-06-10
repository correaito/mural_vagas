<?
include("config.php"); // conexão com o BD

date_default_timezone_set('America/Sao_Paulo'); // Estabelece a data/hora de Brasilia 

$hoje = date('Y-m-d');  // formato de data/hora padrão

// Verifica as apolices que irão vencer dentro de 15 dias
 $del = $pdo->query("DELETE FROM vaga WHERE datavenc = '$hoje'"); 

?>


