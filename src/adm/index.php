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

// Consultas para os cards de resumo
$queryTotalVagas = $pdo->query("SELECT COUNT(*) FROM vaga");
$totalVagas = $queryTotalVagas->fetchColumn();

$queryVagasPendentes = $pdo->query("SELECT COUNT(*) FROM vaga WHERE status = 'pendente' OR status IS NULL OR status = ''");
$vagasPendentes = $queryVagasPendentes->fetchColumn();

$queryVagasAprovadas = $pdo->query("SELECT COUNT(*) FROM vaga WHERE status = 'liberado'");
$vagasAprovadas = $queryVagasAprovadas->fetchColumn();

$queryTotalUsers = $pdo->query("SELECT COUNT(*) FROM user");
$totalUsers = $queryTotalUsers->fetchColumn();

include("includes/header.php");
?>

<!-- Summary Cards Row -->
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="summary-card bg-summary-blue">
            <div>
                <div class="number"><?php echo $totalVagas; ?></div>
                <div class="label">Total de Vagas</div>
            </div>
            <i class="fas fa-briefcase icon"></i>
        </div>
    </div>
    
    <div class="col-xl-3 col-md-6">
        <div class="summary-card bg-summary-yellow">
            <div>
                <div class="number"><?php echo $vagasPendentes; ?></div>
                <div class="label">Vagas Pendentes</div>
            </div>
            <i class="fas fa-clock icon"></i>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="summary-card bg-summary-green">
            <div>
                <div class="number"><?php echo $vagasAprovadas; ?></div>
                <div class="label">Vagas Aprovadas</div>
            </div>
            <i class="fas fa-check-circle icon"></i>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="summary-card bg-summary-red">
            <div>
                <div class="number"><?php echo $totalUsers; ?></div>
                <div class="label">Total de Usuários</div>
            </div>
            <i class="fas fa-users icon"></i>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Visão Geral de Vagas</h6>
            </div>
            <div class="card-body">
                <div class="chart-area" style="height: 300px;">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Status das Vagas</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2" style="height: 250px;">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-success"></i> Aprovadas
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-warning"></i> Pendentes
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Aprovadas", "Pendentes"],
    datasets: [{
      data: [<?php echo $vagasAprovadas; ?>, <?php echo $vagasPendentes; ?>],
      backgroundColor: ['#1cc88a', '#f6c23e'],
      hoverBackgroundColor: ['#17a673', '#dda20a'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

// Area Chart Placeholder Example
var ctxArea = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctxArea, {
  type: 'line',
  data: {
    labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
    datasets: [{
      label: "Vagas",
      lineTension: 0.3,
      backgroundColor: "rgba(78, 115, 223, 0.05)",
      borderColor: "rgba(78, 115, 223, 1)",
      pointRadius: 3,
      pointBackgroundColor: "rgba(78, 115, 223, 1)",
      pointBorderColor: "rgba(78, 115, 223, 1)",
      pointHoverRadius: 3,
      pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      pointHitRadius: 10,
      pointBorderWidth: 2,
      data: [0, 10, 5, 15, 10, 20, 15, 25, 20, 30, 25, <?php echo $totalVagas; ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 5,
          padding: 10,
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      intersect: false,
      mode: 'index',
      caretPadding: 10,
    }
  }
});
</script>
