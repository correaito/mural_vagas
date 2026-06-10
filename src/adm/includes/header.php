
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard - Mural de Vagas</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    

    <!-- Dashboard Custom CSS -->
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>

    <!-- Navbar 100% Width -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
        <div class="container-fluid" style="padding: 10px 30px;">
            <div class="d-flex align-items-center">
                <button class="btn btn-light mr-3" id="menu-toggle">
                    <i class="fas fa-bars"></i>
                </button>
                <span class="navbar-brand mb-0">
                    <img src="../logo.png" alt="Mural de Vagas" style="height: 3rem;">
                </span>
            </div>
            
            <div class="ml-auto d-flex align-items-center">
                <span class="mr-3 text-dark font-weight-bold">
                    <i class="fas fa-user-circle"></i> Olá, <?php echo isset($usuario) ? $usuario : 'Admin'; ?>
                </span>
                <a href="../index.php" class="btn btn-outline-secondary btn-sm">Sair</a>
            </div>
        </div>
    </nav>

<div id="wrapper">
    <script>
        if (localStorage.getItem('sidebar-toggled') === 'true') {
            document.getElementById('wrapper').classList.add('toggled');
        }
    </script>

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <div class="list-group list-group-flush pt-3">
            <a href="index.php" class="list-group-item list-group-item-action">
                <i class="fas fa-chart-line"></i> Painel Inicial
            </a>
            <a href="analisevaga.php" class="list-group-item list-group-item-action">
                <i class="fas fa-clipboard-check"></i> Vagas Pendentes
            </a>
            <a href="listavagas.php" class="list-group-item list-group-item-action">
                <i class="fas fa-list"></i> Lista Geral
            </a>
            <a href="cadastravaga.php" class="list-group-item list-group-item-action">
                <i class="fas fa-plus-circle"></i> Cadastrar Vaga
            </a>
            <a href="extimage_adm.php" class="list-group-item list-group-item-action">
                <i class="fas fa-file-image"></i> Extração OCR
            </a>
            <a href="../index.php" class="list-group-item list-group-item-action mt-auto" target="_blank">
                <i class="fas fa-external-link-alt"></i> Ver Portal Público
            </a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">



        <div class="container-fluid mt-2">
