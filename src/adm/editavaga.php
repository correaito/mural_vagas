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

$id_vaga = $_GET['id']; // Captura o número de ticket da solicitação, no link
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
                <span>Editar Vaga: <?php echo $vaga1; ?></span>
                <a href="javascript:history.back()" class="btn btn-sm btn-outline-primary">Voltar</a>
            </div>
            <div class="card-body">
                <form id="atualizavaga" action="" method="post">
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
                    
                    <input type="hidden" id="id" value="<?php echo $id_vaga_db; ?>" name="id">

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
                        <button type="submit" class="btn btn-primary mr-2">Atualizar</button>
                        <button type="button" onclick="excluirvagaon('<?php echo $id_vaga_db;?>');" class="btn btn-danger">Excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<script>
$(document).ready(function(){
  $('#atualizavaga').submit(function(){
    var dados = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "atualizavaga.php",
      data: dados,
      success: function(data) {
        alert('Vaga atualizada com sucesso!');
        window.location.href = 'analisevaga.php#geralvagas-card';
      }
    });      
    return false;
  });
});

function excluirvagaon(id) { 
  if(confirm("Tem certeza que deseja excluir esta vaga?")) {
    $.post("deletavaga.php", {id: id}, function(retorno) {
      alert('OK, vaga excluída com sucesso!');
      window.location.href = 'analisevaga.php#geralvagas-card';
    });    
  }
}   
</script>