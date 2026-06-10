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
        <div class="card shadow-sm border-0">
            <div class="card-header text-white" style="background-color: #34495e;">
                <h6 class="m-0 font-weight-bold"><i class="fas fa-file-image mr-2"></i> Extração de Texto (OCR)</h6>
            </div>
            <div class="card-body">
                
                <p class="text-muted">Anexe a imagem da qual você deseja extrair o texto para colar no formulário de vagas.</p>

                <div class="form-group">
                    <input type="file" class="form-control-file border p-2 bg-light" accept="image/*" onchange="recognizeFile(window.lastFile=this.files[0])">
                </div>

                <select style="display:none;" id="langsel">
                    <option value='por'>Portuguese</option>
                </select>

                <div id="log"></div>

                <div class="form-group mt-3">
                    <textarea rows="14" id="classtext" style="display:none;" class="form-control js-copytextarea"></textarea>
                </div>

                <div class="text-right">
                    <button type="button" id="js-textareacopybtn" class="btn btn-dark"><i class="fas fa-copy"></i> Copiar Texto</button>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>

<script>
  function preprocessImage(file, callback) {
    var img = new Image();
    var reader = new FileReader();
    reader.onload = function(e) {
        img.src = e.target.result;
    }
    img.onload = function() {
        var canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0);
        callback(canvas.toDataURL("image/png"));
    }
    reader.readAsDataURL(file);
  }

  function recognizeFile(file){
    if(!file) return;
    document.querySelector("#log").innerHTML = '<div class="alert alert-info mt-3">Iniciando a Inteligência Artificial OCR... isso pode levar alguns segundos.</div>';
    $('#classtext').hide().val('');

    preprocessImage(file, function(processedImage) {
        Tesseract.recognize(
          processedImage,
          document.querySelector('#langsel').value,
          { 
            logger: m => {
              if (m.status === 'recognizing text') {
                  let p = Math.round(m.progress * 100);
                  document.querySelector("#log").innerHTML = `<div class="alert alert-warning mt-3"><i class="fas fa-spinner fa-spin"></i> Lendo texto da imagem... ${p}% concluído.</div>`;
              } else {
                  document.querySelector("#log").innerHTML = `<div class="alert alert-secondary mt-3"><i class="fas fa-cog fa-spin"></i> Preparando motor de visão computacional...</div>`;
              }
            }
          }
        ).then(({ data: { text } }) => {
          document.querySelector("#log").innerHTML = '<div class="alert alert-success mt-3"><i class="fas fa-check-circle"></i> Extração Concluída com Sucesso!</div>';
          var pre = document.getElementById('classtext');
          pre.value = text;
          $('#classtext').slideDown();
        }).catch(err => {
          document.querySelector("#log").innerHTML = '<div class="alert alert-danger mt-3"><i class="fas fa-exclamation-triangle"></i> Erro ao processar imagem. Tente novamente com uma imagem mais nítida.</div>';
          console.error(err);
        });
    });
  }

  document.getElementById('js-textareacopybtn').addEventListener('click', function() {
    var copyTextarea = document.getElementById('classtext');
    copyTextarea.select();
    try {
      var successful = document.execCommand('copy');
      var msg = successful ? 'Texto copiado com sucesso!' : 'Não foi possível copiar';
      alert(msg);
    } catch (err) {
      alert('Erro ao copiar o texto');
    }
  });
</script>
