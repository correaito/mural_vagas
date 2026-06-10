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

// Lógica de Busca e Paginação
$busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;
$limite = 15;
$offset = ($pagina - 1) * $limite;

// Montar query base
$sqlBase = "FROM vaga WHERE 1=1";
$params = [];
if (!empty($busca)) {
    $sqlBase .= " AND titulo LIKE :busca";
    $params[':busca'] = "%$busca%";
}

// Contar total de registros para paginação
$stmtCount = $pdo->prepare("SELECT COUNT(*) $sqlBase");
$stmtCount->execute($params);
$totalRegistros = $stmtCount->fetchColumn();
$totalPaginas = ceil($totalRegistros / $limite);

// Buscar os registros da página atual
$sql = "SELECT * $sqlBase ORDER BY id DESC LIMIT $limite OFFSET $offset";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
?>

<div class="row">
    <div class="col-12">
        <form method="GET" action="listavagas.php">
            <div class="card shadow-sm border-0" id="geralvagas-card">
                <div class="card-header text-white" style="background-color: #34495e;">
                    <h6 class="m-0 font-weight-bold"><i class="fas fa-list mr-2"></i> Lista Geral de Vagas</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table id="geralvagas" class="table table-sm table-hover table-striped mb-0" style="width:100%">
                          <thead style="background-color: #f8f9fc;">
                            <tr>
                              <th class="pl-4 py-3 text-uppercase text-muted" style="font-size: 0.85rem;">Título da Vaga</th>
                              <th class="text-right pr-4 py-3 text-uppercase text-muted" style="font-size: 0.85rem;" width="150">Ações</th>
                            </tr>
                            <tr>
                              <th class="pl-4 pb-3 border-top-0">
                                  <input type="text" class="form-control form-control-sm" name="busca" placeholder="Filtrar..." value="<?php echo htmlspecialchars($busca); ?>">
                              </th>
                              <th class="text-right pr-4 pb-3 border-top-0">
                                  <button type="submit" class="btn btn-sm btn-info" title="Buscar"><i class="fas fa-search"></i></button>
                                  <?php if(!empty($busca)): ?>
                                      <a href="listavagas.php" class="btn btn-sm btn-outline-secondary ml-1" title="Limpar"><i class="fas fa-times"></i></a>
                                  <?php endif; ?>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                        <?php 
                        if ($stmt->rowCount() > 0) {
                            while ($linha = $stmt->fetch()) { 
                                $titulo = htmlspecialchars($linha['titulo']);
                                $id_vaga = $linha['id'];
                                $empresa = htmlspecialchars($linha['empresa']);
                            ?>
                            <tr>
                                <td class="align-middle pl-4 py-2">
                                    <a href="editavaga.php?id=<?php echo $id_vaga; ?>" class="text-dark" style="text-decoration: none;">
                                        <?php echo $titulo; ?>
                                    </a> 
                                    <span class="badge badge-info ml-2" style="font-weight:normal;" title="Empresa"><?php echo $empresa; ?></span>
                                </td>
                                <td class="align-middle text-right pr-4 py-2">
                                    <a href="editavaga.php?id=<?php echo $id_vaga; ?>" class="table-action-icon text-primary mr-3" title="Editar"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="javascript:void(0);" onclick="excluirvagaon('<?php echo $id_vaga; ?>')" class="table-action-icon text-danger" title="Excluir"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php } 
                        } else { ?>
                            <tr><td colspan="2" class="text-center text-muted py-5">Nenhuma vaga encontrada.</td></tr>
                        <?php } ?>
                      </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Controles de Paginação -->
            <div class="card-footer bg-white py-3">
                <nav aria-label="Paginação de vagas">
                  <ul class="pagination pagination-sm justify-content-end mb-0">
                    <li class="page-item <?php echo ($pagina <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?pagina=<?php echo $pagina - 1; ?>&busca=<?php echo urlencode($busca); ?>">Anterior</a>
                    </li>
                    <li class="page-item <?php echo ($pagina >= $totalPaginas) ? 'disabled' : ''; ?>">
                        <a class="page-link" href="?pagina=<?php echo $pagina + 1; ?>&busca=<?php echo urlencode($busca); ?>">Próximo</a>
                    </li>
                  </ul>
                </nav>
            </div>

        </div>
        </form>
    </div>
</div>

<?php include("includes/footer.php"); ?>
