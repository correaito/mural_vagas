<?php ob_start();

include("../restrito.php"); 
include("../config.php"); 

session_start(); 

$id = $_SESSION['id'];

$consultauser = $pdo->prepare("SELECT * from user where id= :id");
$consultauser->bindParam( ':id', $id );
$consultauser->execute();
$usercons = $consultauser->fetch(); 

$usuario = $usercons['usuario'];

// Consulta todos os usuários para listar na tabela
$queryUsers = $pdo->query("SELECT * FROM user ORDER BY id DESC");
$usuarios_lista = $queryUsers->fetchAll(PDO::FETCH_ASSOC);

include("includes/header.php");
?>

<div class="row">
    <div class="col-12">
        <!-- Card do Formulário de Cadastro -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header text-white" style="background-color: #34495e;">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-user-plus mr-2"></i> Cadastrar Novo Membro</h6>
            </div>
            <div class="card-body">
                <?php if (isset($_GET['sucesso'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo $_GET['sucesso'] == 'editado' ? 'Usuário atualizado com sucesso!' : 'Usuário cadastrado com sucesso!'; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif (isset($_GET['erro'])): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo $_GET['erro'] == 'existe' ? 'Este nome de usuário já está em uso.' : 'Erro ao cadastrar usuário.'; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php elseif (isset($_GET['deletado'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Usuário excluído com sucesso!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>

                <form action="salvausuario_adm.php" method="POST">
                    <div class="form-row align-items-center">
                        <div class="col-sm-4 my-1">
                            <label class="sr-only" for="nomeUsuario">Nome de Usuário</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" id="nomeUsuario" name="usuario" placeholder="Nome de Usuário" required>
                            </div>
                        </div>
                        <div class="col-sm-4 my-1">
                            <label class="sr-only" for="senhaUsuario">Senha</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-key"></i></div>
                                </div>
                                <input type="password" class="form-control" id="senhaUsuario" name="senha" placeholder="Senha" required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="toggleSenha" style="border-color: #ced4da; background-color: #fff;">
                                        <i class="fas fa-eye" id="iconeSenha"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto my-1">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-plus"></i> Cadastrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Card da Lista de Usuários -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header text-white" style="background-color: #34495e;">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-users mr-2"></i> Usuários Cadastrados</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-hover table-striped mb-0" id="tabela-usuarios" width="100%" cellspacing="0">
                        <thead style="background-color: #f8f9fc;">
                            <tr>
                                <th class="pl-4 py-3 text-uppercase text-muted" style="font-size: 0.85rem;" width="10%">ID</th>
                                <th class="pl-4 py-3 text-uppercase text-muted" style="font-size: 0.85rem;">Usuário</th>
                                <th class="text-center pr-4 py-3 text-uppercase text-muted" style="font-size: 0.85rem;" width="15%">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios_lista as $u): ?>
                            <tr>
                                <td class="align-middle pl-4 py-2"><?php echo $u['id']; ?></td>
                                <td class="align-middle pl-4 py-2"><i class="fas fa-user-circle text-secondary"></i> <?php echo htmlspecialchars($u['usuario']); ?></td>
                                <td class="align-middle text-center pr-4 py-2">
                                    <a href="editausuario.php?id=<?php echo $u['id']; ?>" class="table-action-icon text-primary mr-3" title="Editar">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <?php if ($u['id'] != $id): ?>
                                    <a href="deletausuario.php?id=<?php echo $u['id']; ?>" class="table-action-icon text-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir o usuário <?php echo htmlspecialchars($u['usuario']); ?>? Esta ação não pode ser desfeita.');">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <?php else: ?>
                                    <span class="badge badge-secondary" style="vertical-align: top;">Você</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("includes/footer.php"); ?>
<script>
$(document).ready(function() {
    $('#tabela-usuarios').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
        }
    });

    $('#toggleSenha').click(function() {
        var passwordInput = $('#senhaUsuario');
        var icon = $('#iconeSenha');
        if (passwordInput.attr('type') === 'password') {
            passwordInput.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            passwordInput.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
});
</script>
