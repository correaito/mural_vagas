<?php
include("../restrito.php"); 
include("../config.php"); 

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuarioNovo = trim($_POST['usuario']);
    $senhaNova = $_POST['senha'];

    if (empty($usuarioNovo) || empty($senhaNova)) {
        header("Location: usuarios.php?erro=vazio");
        exit;
    }

    // Verifica se o usuário já existe
    $verifica = $pdo->prepare("SELECT id FROM user WHERE usuario = :usuario");
    $verifica->bindParam(':usuario', $usuarioNovo);
    $verifica->execute();

    if ($verifica->rowCount() > 0) {
        header("Location: usuarios.php?erro=existe");
        exit;
    }

    // Mantendo sem criptografia para fins de demonstração/legado do sistema original.
    // Se fosse sistema real: $senhaHash = password_hash($senhaNova, PASSWORD_DEFAULT);
    
    // Pega o maior id e soma 1, pois no script original a tabela user não tem AUTO_INCREMENT no insert explícito? 
    // Wait, o schema em init.sql é: `id` int(11) NOT NULL (sem AUTO_INCREMENT aparente, ou foi ignorado).
    // Mas MySQL suporta omissão de ID se houver auto increment. Se não, vamos procurar o max ID.
    $maxIdQuery = $pdo->query("SELECT MAX(id) FROM user");
    $maxId = $maxIdQuery->fetchColumn();
    $novoId = $maxId ? $maxId + 1 : 1;

    $insere = $pdo->prepare("INSERT INTO user (id, usuario, senha) VALUES (:id, :usuario, :senha)");
    $insere->bindParam(':id', $novoId);
    $insere->bindParam(':usuario', $usuarioNovo);
    $insere->bindParam(':senha', $senhaNova);
    
    if ($insere->execute()) {
        header("Location: usuarios.php?sucesso=1");
    } else {
        header("Location: usuarios.php?erro=banco");
    }
} else {
    header("Location: usuarios.php");
}
?>
