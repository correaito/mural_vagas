<?php ob_start();
include("../restrito.php"); 
include("../config.php"); 
session_start(); 

$id = $_SESSION['id'];

// Pega os dados do usuário atual (logado)
$consultauser = $pdo->prepare("SELECT * from user where id= :id");
$consultauser->bindParam(':id', $id);
$consultauser->execute();
$usercons = $consultauser->fetch(); 
$usuario = $usercons['usuario'];

// Pega os dados do usuário a ser editado
if (!isset($_GET['id'])) {
    header("Location: usuarios.php");
    exit;
}

$id_edit = $_GET['id'];
$queryEdit = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$queryEdit->bindParam(':id', $id_edit);
$queryEdit->execute();

if ($queryEdit->rowCount() == 0) {
    header("Location: usuarios.php");
    exit;
}

$user_edit = $queryEdit->fetch(PDO::FETCH_ASSOC);

include("includes/header.php");
?>

<div class="row">
    <div class="col-12">
        
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header text-white" style="background-color: #34495e;">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-user-edit mr-2"></i> Editar Usuário</h6>
            </div>
            <div class="card-body">
                <form action="atualizausuario.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user_edit['id']; ?>">
                    
                    <div class="form-group">
                        <label for="nomeUsuario" class="font-weight-bold">Nome de Usuário</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" id="nomeUsuario" name="usuario" value="<?php echo htmlspecialchars($user_edit['usuario']); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="senhaUsuario" class="font-weight-bold">Senha</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-key"></i></div>
                            </div>
                            <input type="password" class="form-control" id="senhaUsuario" name="senha" value="<?php echo htmlspecialchars($user_edit['senha']); ?>" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="toggleSenha" style="border-color: #ced4da;">
                                    <i class="fas fa-eye" id="iconeSenha"></i>
                                </button>
                            </div>
                        </div>
                        <small class="form-text text-muted">Você pode alterar a senha editando o campo acima.</small>
                    </div>

                    <!-- Nota sobre E-mail -->
                    <div class="alert alert-warning mt-3 mb-0" role="alert" style="font-size: 0.9rem;">
                        <i class="fas fa-info-circle"></i> O banco de dados original deste sistema armazena apenas Nome de Usuário e Senha. Se desejar adicionar suporte a E-mail, a estrutura do banco precisará ser alterada.
                    </div>

                    <hr class="mt-4 mb-4">
                    
                    <div class="d-flex justify-content-between">
                        <a href="usuarios.php" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?php include("includes/footer.php"); ?>
<script>
document.getElementById('toggleSenha').addEventListener('click', function (e) {
    const passwordInput = document.getElementById('senhaUsuario');
    const icon = document.getElementById('iconeSenha');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
});
</script>
