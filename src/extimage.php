<!doctype html>
<html>
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.7.10, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <meta name="description" content="">
  <title>Mural de Vagas - Paranaguá</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="css/datatables.min.css"/>
  <link rel="stylesheet" href="css/extimage.css"/>


</head>
<body>

 <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">
  <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm" style="background-color: #C1CDCD;">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <div class="hamburger">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </button>
    <div class="menu-logo">
      <div class="navbar-brand">
        <span class="navbar-logo">
          <a href="javascript:void(0)">
           <img src="logo.png" alt="Mobirise" style="height: 3.8rem;">
         </a>
       </span>
       <span class="navbar-caption-wrap">
        <a class="navbar-caption text-white display-4" href="#">
        </a>
      </span>
    </div>
  </div>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
      <li class="nav-item">
        <a class="nav-link link text-white display-4" href="index.php#table1-4">
          <i class="fas fa-table"></i>&nbsp;Mural
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link link text-white display-4" data-toggle="modal" data-target="#logarnoadm">
          <i class="fas fa-user"></i>&nbsp;Login
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link link text-white display-4" href="index.php#form1-3">
          <i class="fas fa-cloud-upload-alt"></i>&nbsp;Envio de Vagas
        </a>
      </li>
    </ul>
    <div class="navbar-buttons mbr-section-btn">
     <a href="javascript:history.back()"><button type="button" class="btn btn-dark btn-form display-4">Voltar</button></a>
   </div>
 </div>
</nav>
</section>

<section class="section-table cid-qX4WeoIZP9" style="padding-top: 130px; padding-bottom: 50px; background-color: white;">  

  <div class="container container-table">
    <h2 class="mbr-section-title mbr-fonts-style align-center pb-3 display-2">
      Extração de Texto
    </h2>
    <h3 class="mbr-section-subtitle mbr-fonts-style align-center pb-5 mbr-light display-5">
      Envie a imagem que deseja extrair o texto. 
    </h3>

  </section>


</script>
<select style="display:none;" id="langsel" onchange="window.lastFile && recognizeFile(window.lastFile)">
  <option value='por'> Portuguese</option>

</select>


<input type="file" onchange="recognizeFile(window.lastFile=this.files[0])">

<div id="log"></div>


<textarea rows="14" cols="80" id="classtext" style="display:none;" class="js-copytextarea"></textarea>

<form class="mbr-form">

<span class="input-group-btn">
  <button type="button" id="js-textareacopybtn" class="btn btn-dark btn-form display-4">Copiar</button>
  <a href="javascript:history.back()"><button type="button" class="btn btn-dark btn-form display-4">Voltar</button></a>
</span>

</form>

</div>
</div>

</section>
</body>




<div class="modal fade" id="logarnoadm" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Área Administrativa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

       <form id="logar" class="form-inline" action="" method="post">

         <div class="form-group" style="padding-right: 15px;">
          <input type="text" class="form-control input-sm input-inverse" id="usuario" required="" placeholder="Nome">
        </div>
        <div class="form-group">
          <input type="password" class="form-control input-sm input-inverse" id="senha" required="" placeholder="Senha">
        </div>
        <div class="form-group">
        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>
    </div>
  </div>
</div>
</div>



<div class="modal fade" id="loginerrado" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ops!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Desculpe, mas o usuário e/ou a senha estão incorretos.
     </div>
     <div class="modal-footer">
      <button type="button" data-dismiss="modal" class="btn btn-primary">Fechar</button>
    </div>
  </div>
</div>
</div>


<script src="assets/web/assets/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js"></script>
<script src='http://www.dynamicdrive.com/dynamicindex11/copytextclipboard.js'></script>
<script src="assets/popper/popper.min.js"></script>
<script src="assets/tether/tether.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/smoothscroll/smooth-scroll.js"></script>
<script src="assets/dropdown/js/script.min.js"></script>
<script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
<script src="assets/theme/js/script.js"></script>

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
        
        // Desenha a imagem original para manter as dimensões
        ctx.drawImage(img, 0, 0);
        
        // Tesseract v5 possui um modo de PSM (Page Segmentation Mode)
        // e funciona muito melhor se ajudarmos ele um pouco
        callback(canvas.toDataURL("image/png"));
    }
    reader.readAsDataURL(file);
  }

  function recognizeFile(file){
    document.querySelector("#log").innerHTML = '<div class="alert alert-info mt-3">Iniciando a Inteligência Artificial OCR... isso pode levar alguns segundos.</div>';
    $('#classtext').hide().val('');

    // Pre-processamento da imagem antes de mandar pro Tesseract
    preprocessImage(file, function(processedImage) {
        Tesseract.recognize(
          processedImage,
          document.querySelector('#langsel').value,
          { 
            logger: m => {
              console.log(m);
              if (m.status === 'recognizing text') {
                  let p = Math.round(m.progress * 100);
                  document.querySelector("#log").innerHTML = `<div class="alert alert-warning mt-3">Lendo texto da imagem... ${p}% concluído.</div>`;
              } else {
                  document.querySelector("#log").innerHTML = `<div class="alert alert-secondary mt-3">Preparando motor de visão computacional...</div>`;
              }
            }
          }
        ).then(({ data: { text } }) => {
          document.querySelector("#log").innerHTML = '<div class="alert alert-success mt-3">Extração Concluída com Sucesso!</div>';
          var pre = document.getElementById('classtext');
          pre.value = text;
          $('#classtext').slideDown();
        }).catch(err => {
          document.querySelector("#log").innerHTML = '<div class="alert alert-danger mt-3">Erro ao processar imagem. Tente novamente com uma imagem mais nítida.</div>';
          console.error(err);
        });
    });
  }

  // Login no sistema
  $(document).ready(function(){
  $('#logar').submit(function(){  //Ao submeter formulário
    var usuario=$('#usuario').val();  //Pega valor do campo email
    var senha=$('#senha').val();  //Pega valor do campo senha
    $.ajax({      //Função AJAX
      url:"logar.php",      //Arquivo php
      type:"post",        //Método de envio
      data: "usuario="+usuario+"&senha="+senha, //Dados
        success: function (result){     //Sucesso no AJAX
          if(result == 2){            
                      location.href='adm/index.php'  //Redireciona
                    }else{
                     $('#logarnoadm').modal('hide');  
                     $('#loginerrado').modal('show');  
                   }
                 }
               })
    return false; //Evita que a página seja atualizada
  })
})


  window.onload = function() {
    // Pega todos os elementos correspondentes
    var copyTextareaBtn = Array.prototype.slice.
    call(document.querySelectorAll('#js-textareacopybtn'));
    var copyTextarea = Array.prototype.slice.
    call(document.querySelectorAll('.js-copytextarea'));

    // Laço para percorrer todos os elementos
    copyTextareaBtn.forEach(function(btn, idx) {

      btn.addEventListener("click", function() {

        // Copia o conteudo do textarea
        copyTextarea[idx].select();

        var msg = document.execCommand('copy') 
        ? 'funcionou' : 'deu erro';
        console.log('Compando para copiar texto ' + msg);

      });

    });
  }
</script>

