<?php
include("../restrito.php"); 
include("../config.php"); 

session_start();
$logged_in_id = $_SESSION['id'];

if (isset($_GET['id'])) {
    $id_para_deletar = $_GET['id'];

    // Impede o usuário logado de se excluir acidentalmente
    if ($id_para_deletar == $logged_in_id) {
        header("Location: usuarios.php?erro=autoexclusao");
        exit;
    }

    $deleta = $pdo->prepare("DELETE FROM user WHERE id = :id");
    $deleta->bindParam(':id', $id_para_deletar);
    
    if ($deleta->execute()) {
        header("Location: usuarios.php?deletado=1");
    } else {
        header("Location: usuarios.php?erro=banco");
    }
} else {
    header("Location: usuarios.php");
}
?>
