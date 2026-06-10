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
$senhauser = $usercons['senha']; 

include("includes/header.php");
?>

<div class="row">
    <div class="col-12">
        
        <?php if(isset($_GET['sucesso'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> A vaga foi cadastrada e já está publicada no mural.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php endif; ?>

        <div class="card shadow-sm border-0">
            <div class="card-header text-white" style="background-color: #34495e;">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-plus-circle mr-2"></i> Cadastrar Nova Vaga</h6>
            </div>
            <div class="card-body">
                <form action="salvavaga_adm.php" method="POST">
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="font-weight-bold text-muted small text-uppercase">Título da Vaga</label>
                            <input type="text" class="form-control" name="titulovaga" required placeholder="Ex: Auxiliar Administrativo">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold text-muted small text-uppercase">Empresa</label>
                            <input type="text" class="form-control" name="empresa" required placeholder="Ex: Supermercado XYZ">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="font-weight-bold text-muted small text-uppercase">Contato / Como Enviar</label>
                            <input type="text" class="form-control" name="contato" placeholder="Ex: email@empresa.com.br ou WhatsApp">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="font-weight-bold text-muted small text-uppercase">Descrição Detalhada</label>
                            <textarea class="form-control" name="descricaovaga" rows="8" required placeholder="Requisitos, salário, benefícios, endereço, etc..."></textarea>
                        </div>
                    </div>

                    <div class="text-right mt-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i> Publicar Vaga Diretamente</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>
