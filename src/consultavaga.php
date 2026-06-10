<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.7.10, javascript:void(0) -->
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
  <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="css/styles.css"/>

  <?
include("config.php"); // conexão com o BD
$id=$_GET['id']; // Captura o número de ticket da solicitação, no link

$executa = $pdo->query("SELECT * from vaga where id='$id'"); // Consulta no BD, todas as entradas com o número do ticket capturado

while ($reginfmp= $executa->fetch()) // Extrai todas as informações do ticket encontrado e memoriza em reginfmp

{ // Distribui todas as informações memorizadas dos campos do ticket para as strings abaixo

  $vaga1=$reginfmp['titulo']; 
  $vaga2=$reginfmp['empresa']; 
  $vaga3=$reginfmp['contato'];
  $vaga4=$reginfmp['descricao'];
  $vaga5=$reginfmp['data'];

$data = implode('/', array_reverse(explode( '-', $vaga5 )));

}

?>


</head>
<body>
  <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm" style="background-color: white;">
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
          <a class="nav-link link text-white display-4" href="index.php#form1-3">
            <i class="fas fa-cloud-upload-alt"></i>&nbsp;Envio de Vagas
          </a>
        </li>
      </ul>
      <div class="navbar-buttons mbr-section-btn">
       <a href="javascript:history.back()"><button href="" type="submit" class="btn btn-dark btn-form display-4">Voltar</button></a>
     </div>
   </div>
 </nav>
</section>



<section class="mbr-section form1 cid-qWZL8Lzsq5">   


  <div class="container">
    <div class="row justify-content-center">
      <div class="title col-12 col-lg-8">
        <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2" style="padding-top: 30px; padding-bottom: 10px;">
          Consulta da Vaga
        </h2>
        <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
          <? echo $vaga1; ?>
        </h3>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="media-container-column col-lg-8" data-form-type="formoid">

        <form class="mbr-form" action="" method="post" data-form-title="">

         <div class="row row-sm-offset">
          <div class="col-md-3 multi-horizontal" data-for="name">
            <div class="form-group">
              <label class="form-control-label mbr-fonts-style display-7" for="name-form1-3">Data de envio</label>
              <input type="text" class="form-control" value="<? echo $data; ?>" name="titulovaga" readonly data-form-field="Name" id="name-form1-3">
            </div>
          </div>
          <div class="col-md-9 multi-horizontal" data-for="name">
            <div class="form-group">
              <label class="form-control-label mbr-fonts-style display-7" for="name-form1-3">Título da vaga</label>
              <input type="text" class="form-control" value="<? echo $vaga1; ?>" name="titulovaga" readonly data-form-field="Name" id="name-form1-3">
            </div>
          </div>
          <div class="col-md-12 multi-horizontal" data-for="email">
            <div class="form-group">
              <label class="form-control-label mbr-fonts-style display-7" for="email-form1-3">Empresa</label>
              <input type="text" class="form-control" value="<? echo $vaga2; ?>" readonly name="empresa" id="email-form1-3">
            </div>
          </div>
          <div class="col-md-12 multi-horizontal" data-for="phone">
            <div class="form-group">
              <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-3">Contato</label>
              <input type="text" class="form-control" value="<? echo $vaga3; ?>" readonly name="contato" id="phone-form1-3">
            </div>
          </div>
        </div>
        <div class="form-group" data-for="message">
          <label class="form-control-label mbr-fonts-style display-7" for="message-form1-3">Descrição da vaga</label>
          <textarea type="text" class="form-control" readonly name="descricao" rows="7" data-form-field="Message" id="message-form1-3"><? echo $vaga4; ?></textarea>
        </div> 
      </form>
      <span class="input-group-btn">
       <a href="javascript:history.back()"><button type="button" class="btn btn-dark btn-form display-4">Voltar</button></a>
     </span>
   </div>
 </div>
</div>
</section>

  <section class="cid-qTkAaeaxX5" id="footer1-2" style="background-color: #6E6E6E;">  

    <div class="container">
      <div class="media-container-row content text-white">
        <div class="col-12 col-md-3">
          <div class="media-wrap">
            <a href="javascript:void(0)/">
              <img src="logo_branco.png" alt="Mobirise">
            </a>
          </div>
        </div>
        <div class="col-12 col-md-3 mbr-fonts-style display-7">
          <h5 class="pb-3" style="color: white;">

          </h5>
          <p class="mbr-text" style="color: white;">

          </p>
        </div>
        <div class="col-12 col-md-3 mbr-fonts-style display-7">
          <h5 class="pb-3" style="color: white;">
            Contatos
          </h5>
          <p class="mbr-text" style="color: white;">
            Email: correaito@gmail.com
            <br>Fone: (41) 99855 3549
          </p>
        </div>
        <div class="col-12 col-md-3 mbr-fonts-style display-7">
          <h5 class="pb-3" style="color: white;">
            Links
          </h5>
          <p class="mbr-text">
          </p>
        </div>
      </div>
      <div class="footer-lower">
        <div class="media-container-row">
          <div class="col-sm-12">
            <hr>
          </div>
        </div>
        <div class="media-container-row" >
          <div class="col-sm-6 copyright">
            <p class="mbr-text mbr-fonts-style display-7" style="color: white;">
              © Copyright 2018 Vagas de Emprego Litoral PR. <br>Desenvolvido por <a href="http://www.facebook.com/SAServicosTI" target="_blanck">S&A Serviços de Tecnologia</a>
            </p>
          </div>
          <div class="col-md-6">
            <div class="social-list align-right">

               <div class="soc-item">
                <a href="https://chat.whatsapp.com/AV7oPitXYPk5qn0on6ZhzV" target="_blank">
                  <span class="socicon-whatsapp socicon mbr-iconfont mbr-iconfont-social"></span>
                </a>
              </div>             
              <div class="soc-item">
                <a href="javascript:void(0)" target="_blank">
                  <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                </a>
              </div>             
              <div class="soc-item">
                <a href="javascript:void(0)" target="_blank">
                  <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                </a>
              </div>
              <div class="soc-item">
                <a href="javascript:void(0)" target="_blank">
                  <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                </a>
              </div>
              <div class="soc-item">
                <a href="javascript:void(0)" target="_blank">
                  <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="js/pdfmake.min.js"></script>
  <script src="js/vfs_fonts.js"></script>
  <script src="js/datatables.min.js"></script>
  <script src="js/ocrad.js"></script>
  <script src="js/webfont.js"></script>



</body>
</html>