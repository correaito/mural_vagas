<?php ob_start();

include("../restrito.php"); //Arquivo para restrição da página para usuários logados 
include("../config.php"); 

session_start(); 

$id = $_SESSION['id'];

$consultauser = $pdo->prepare("SELECT * from user where id= :id");
$consultauser->bindParam( ':id', $id );
$consultauser->execute();
$usercons = $consultauser->fetch(); 

$usuario = $usercons['usuario'];
$senhauser = $usercons['senha']; 

$id_vaga = $_GET['id']; 
$executa = $pdo->query("SELECT * from vaga where id='$id_vaga'"); 

while ($reginfmp= $executa->fetch()) {
  $vaga1=$reginfmp['titulo']; 
  $vaga2=$reginfmp['empresa']; 
  $vaga3=$reginfmp['contato'];
  $vaga4=$reginfmp['descricao'];
  $vaga5=$reginfmp['data'];
  $id_vaga_db=$reginfmp['id'];
  $data = implode('/', array_reverse(explode( '-', $vaga5 )));
}

include("includes/header.php");
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Aprovação de Vaga: <?php echo $vaga1; ?></span>
                <a href="javascript:history.back()" class="btn btn-sm btn-outline-primary">Voltar</a>
            </div>
            <div class="card-body">
                <form id="aprovavaga" action="" method="post">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data de envio</label>
                                <input type="text" class="form-control" readonly value="<?php echo $data; ?>">
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label>Título da vaga</label>
                                <input type="text" class="form-control" value="<?php echo $vaga1; ?>" name="titulovaga">
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" value="<?php echo $id_vaga_db; ?>" name="id">

                    <div class="form-group">
                        <label>Empresa</label>
                        <input type="text" class="form-control" value="<?php echo $vaga2; ?>" name="empresa">
                    </div>

                    <div class="form-group">
                        <label>Contato</label>
                        <input type="text" class="form-control" value="<?php echo $vaga3; ?>" name="contato">
                    </div>

                    <div class="form-group">
                        <label>Descrição da vaga</label>
                        <textarea class="form-control" name="descricao" rows="7"><?php echo $vaga4; ?></textarea>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Aprovar Vaga</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<script>
$(document).ready(function(){
  $('#aprovavaga').submit(function(){
    var dados = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "atualizaaprova.php",
      data: dados,
      success: function(data) {
        alert('Vaga aprovada com sucesso!');
        window.location.href = 'analisevaga.php';
      }
    });      
    return false;
  });
});
</script>