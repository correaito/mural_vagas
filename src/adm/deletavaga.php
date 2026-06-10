<?php ob_start();

include("../config.php");

$id = $_POST['id'];

$del = $pdo->query("DELETE FROM vaga WHERE id = '$id'"); 

echo '1';

?>
