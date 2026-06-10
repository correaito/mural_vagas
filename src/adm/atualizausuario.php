<?php
include("../restrito.php"); 
include("../config.php"); 

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_edit = $_POST['id'];
    $usuarioNovo = trim($_POST['usuario']);
    $senhaNova = $_POST['senha'];

    if (empty($usuarioNovo) || empty($senhaNova) || empty($id_edit)) {
        header("Location: usuarios.php?erro=vazio");
        exit;
    }

    // Verifica se o usuário já existe, mas ignorando o próprio ID
    $verifica = $pdo->prepare("SELECT id FROM user WHERE usuario = :usuario AND id != :id");
    $verifica->bindParam(':usuario', $usuarioNovo);
    $verifica->bindParam(':id', $id_edit);
    $verifica->execute();

    if ($verifica->rowCount() > 0) {
        header("Location: usuarios.php?erro=existe");
        exit;
    }

    $atualiza = $pdo->prepare("UPDATE user SET usuario = :usuario, senha = :senha WHERE id = :id");
    $atualiza->bindParam(':usuario', $usuarioNovo);
    $atualiza->bindParam(':senha', $senhaNova);
    $atualiza->bindParam(':id', $id_edit);
    
    if ($atualiza->execute()) {
        header("Location: usuarios.php?sucesso=editado");
    } else {
        header("Location: usuarios.php?erro=banco");
    }
} else {
    header("Location: usuarios.php");
}
?>
