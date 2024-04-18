<?php
require 'cek-sesi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="img\logo2.png">
  <title>Money Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
require ('koneksi.php');
require ('sidebar.php');

$rencana = mysqli_query($koneksi, "SELECT * FROM rencana");
$rencana = mysqli_num_rows($rencana);

$query = "SELECT COUNT(*) as row_count FROM rencana WHERE tanggal >= CURDATE()";
$hasil_rencana = mysqli_query($koneksi, $query);
if ($hasil_rencana) {
  $row = mysqli_fetch_assoc($hasil_rencana);
  $jumlah_rencana = $row['row_count'];
} else {
  echo "Error executing query: " . mysqli_error($koneksi);
}

$query = "SELECT COUNT(*) as row_count FROM hutang 
WHERE YEAR(tenggat) = YEAR(CURDATE()) AND MONTH(tenggat) = MONTH(CURDATE()) AND DAY(tenggat) >= DAY(CURDATE())";
$hutang_bulan_ini = mysqli_query($koneksi, $query);
if ($hutang_bulan_ini) {
  $row = mysqli_fetch_assoc($hutang_bulan_ini);
  $jumlah_hutang = $row['row_count'];
} else {
  echo "Error executing query: " . mysqli_error($koneksi);
}

$pengeluaran_bulan_ini = mysqli_query($koneksi, "SELECT SUM(jumlah) FROM pengeluaran 
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = MONTH(CURDATE())");
$pengeluaran_bulan_ini = mysqli_fetch_array($pengeluaran_bulan_ini);

 
$pemasukan_bulan_ini = mysqli_query($koneksi, "SELECT SUM(jumlah) FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = MONTH(CURDATE())");
$pemasukan_bulan_ini = mysqli_fetch_array($pemasukan_bulan_ini);



$pemasukan=mysqli_query($koneksi,"SELECT * FROM pemasukan");
while ($masuk=mysqli_fetch_array($pemasukan)){
$arraymasuk[] = $masuk['jumlah'];
}
$jumlahmasuk = array_sum($arraymasuk);


$pengeluaran=mysqli_query($koneksi,"SELECT * FROM pengeluaran");
while ($keluar=mysqli_fetch_array($pengeluaran)){
$arraykeluar[] = $keluar['jumlah'];
}
$jumlahkeluar = array_sum($arraykeluar);


$uang = $jumlahmasuk - $jumlahkeluar;

//untuk data chart area

// fetch pemasukan
$injan = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '01'");
$injan = mysqli_fetch_array($injan);
$injan !== null ? (int)$injan['jumlah'] : '0.00';

$infeb = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '02'");
$infeb = mysqli_fetch_array($infeb);
$infeb !== null ? (int)$infeb['jumlah'] : '0.00';

$inmaret = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '03'");
$inmaret = mysqli_fetch_array($inmaret);
$inmaret !== null ? (int)$inmaret['jumlah'] : '0.00';

$inapril = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '04'");
$inapril = mysqli_fetch_array($inapril);
$inapril !== null ? (int)$inapril['jumlah'] : '0.00';

$inmei = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '05'");
$inmei = mysqli_fetch_array($inmei);
$inmei !== null ? (int)$inmei['jumlah'] : '0.00';

$injuni = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '06'");
$injuni = mysqli_fetch_array($injuni);
$injuni !== null ? (int)$injuni['jumlah'] : '0.00';

$injuli = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '07'");
$injuli = mysqli_fetch_array($injuli);
$injuli !== null ? (int)$injuli['jumlah'] : '0.00';

$inags = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '08'");
$inags = mysqli_fetch_array($inags);
$inags !== null ? (int)$inags['jumlah'] : '0.00';

$insep = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '09'");
$insep = mysqli_fetch_array($insep);
$insep !== null ? (int)$insep['jumlah'] : '0.00';

$inokt = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '10'");
$inokt = mysqli_fetch_array($inokt);
$inokt !== null ? (int)$inokt['jumlah'] : '0.00';

$innov = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '11'");
$innov = mysqli_fetch_array($innov);
$innov !== null ? (int)$innov['jumlah'] : '0.00';

$indes = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE()) AND MONTH(tgl_pemasukan) = '12'");
$indes = mysqli_fetch_array($indes);
$indes !== null ? (int)$indes['jumlah'] : '0.00';

// fetch pengeluaran
$outjan = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '01'");
$outjan = mysqli_fetch_array($outjan);
$outjan !== null ? (int)$outjan['jumlah'] : '0.00';

$outfeb = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '02'");
$outfeb = mysqli_fetch_array($outfeb);
$outfeb !== null ? (int)$outfeb['jumlah'] : '0.00';

$outmaret = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '03'");
$outmaret = mysqli_fetch_array($outmaret);
$outmaret !== null ? (int)$outmaret['jumlah'] : '0.00';

$outapril = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '04'");
$outapril = mysqli_fetch_array($outapril);
$outapril !== null ? (int)$outapril['jumlah'] : '0.00';

$outmei = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '05'");
$outmei = mysqli_fetch_array($outmei);
$outmei !== null ? (int)$outmei['jumlah'] : '0.00';

$outjuni = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '06'");
$outjuni = mysqli_fetch_array($outjuni);
$outjuni !== null ? (int)$outjuni['jumlah'] : '0.00';

$outjuli = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '07'");
$outjuli = mysqli_fetch_array($outjuli);
$outjuli !==null ? (int)$outjuli['jumlah'] : '0.00';

$outags = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '08'");
$outags = mysqli_fetch_array($outags);
$outags !== null ? (int)$outags['jumlah'] : '0.00';

$outsep = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '09'");
$outsep = mysqli_fetch_array($outsep);
$outsep !== null ? (int)$outsep['jumlah'] : '0.00';

$outokt = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '10'");
$outokt = mysqli_fetch_array($outokt);
$outokt !== null ? (int)$outokt['jumlah'] : '0.00';

$outnov = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '11'");
$outnov = mysqli_fetch_array($outnov);
$outnov !== null ? (int)$outnov['jumlah'] : '0.00';

$outdes = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE()) AND MONTH(tgl_pengeluaran) = '12'");
$outdes = mysqli_fetch_array($outdes);
$outdes !== null ? (int)$outdes['jumlah'] : '0.00';

//untuk data chart area
$total_masuk = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pemasukan
WHERE YEAR(tgl_pemasukan) = YEAR(CURDATE())");
$total_masuk = mysqli_fetch_array($total_masuk);
$total_masuk !== null ? (int)$total_masuk['jumlah'] : '0.00';

$total_keluar = mysqli_query($koneksi, "SELECT SUM(jumlah) AS jumlah FROM pengeluaran
WHERE YEAR(tgl_pengeluaran) = YEAR(CURDATE())");
$total_keluar = mysqli_fetch_array($total_keluar);
$total_keluar !== null ? (int)$total_keluar['jumlah'] : '0.00';

$sisa_uang = (int)$total_masuk['jumlah'] - (int)$total_keluar['jumlah'];

?>
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
<h1> Selamat Datang, <?=$_SESSION['nama']?></h1>

<?php require 'user.php'; ?>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="export-semua.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download Laporan</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Hutang Bulan Ini -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body d-flex">
                  <div class="row no-gutters align-items-center">
                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="margin-right: 20px;"><?=$jumlah_hutang?></div>  
                    <div class="col mr-2">
                      <div class="h6 mb-0 font-weight-bold text-primary text-uppercase mb-0">Hutang Tenggat Bulan Ini</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <!-- Jumlah Rencana Bulan Ini -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body d-flex">
                  <div class="row no-gutters align-items-center">
                    <div class="h5 mb-0 font-weight-bold text-gray-800" style="margin-right: 20px;"><?=$jumlah_rencana?></div>  
                    <div class="col mr-2">
                      <div class="h6 mb-0 font-weight-bold text-primary text-uppercase mb-0">Rencana Bulan Ini</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Rencana Bulan Ini -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">  
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pemasukan Bulan Ini</div>
                      <div class="h5 mb-3 font-weight-bold text-gray-800">Rp.<?= $pemasukan_bulan_ini !== null ? number_format($pemasukan_bulan_ini['0'], 2, ',', '.') : '0.00'; ?></div>
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengeluaran Bulan Ini</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">Rp.<?= $pengeluaran_bulan_ini !== null ? number_format($pengeluaran_bulan_ini['0'], 2, ',', '.') : '0.00'; ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Perbandingan Pendapatan dan Pengeluaran Tahun Ini</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area">
                    <canvas id="myBarChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Pendapatan
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Pengeluaran
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Perbandingan Total</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                 <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Pendapatan
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-danger"></i> Pengeluaran
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Sisa
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php require 'footer.php'?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<?php require 'logout-modal.php'; ?>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script type="text/javascript">
  // Set new default font family and font color to mimic Bootstrap's default styling
  // Set new default font family and font color to mimic Bootstrap's default styling

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function(n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}
// 
// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    datasets: [
      {
        label: "Pemasukan",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: [<?php echo (int)$injan['jumlah']; ?>, <?php echo (int)$infeb['jumlah']; ?>, <?php echo (int)$inmaret['jumlah']; ?>, <?php echo (int)$inapril['jumlah']; ?>,
               <?php echo (int)$inmei['jumlah']; ?>, <?php echo (int)$injuni['jumlah']; ?>, <?php echo (int)$injuli['jumlah']; ?>, <?php echo (int)$inags['jumlah']; ?>,
               <?php echo (int)$insep['jumlah']; ?>, <?php echo (int)$inokt['jumlah']; ?>, <?php echo (int)$innov['jumlah']; ?>, <?php echo (int)$indes['jumlah']; ?>,],
      },
      {
        label: "Pengeluaran",
        backgroundColor: "#be2617",
        hoverBackgroundColor: "#258391",
        borderColor: "#be2617",
        data: [<?php echo (int)$outjan['jumlah']; ?>, <?php echo (int)$outfeb['jumlah']; ?>, <?php echo (int)$outmaret['jumlah']; ?>, <?php echo (int)$outapril['jumlah']; ?>,
               <?php echo (int)$outmei['jumlah']; ?>, <?php echo (int)$outjuni['jumlah']; ?>, <?php echo (int)$outjuli['jumlah']; ?>, <?php echo (int)$outags['jumlah']; ?>,
               <?php echo (int)$outsep['jumlah']; ?>, <?php echo (int)$outokt['jumlah']; ?>, <?php echo (int)$outnov['jumlah']; ?>, <?php echo (int)$outdes['jumlah']; ?>,],
      }
    ],
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
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 12
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 3000000,
          maxTicksLimit: 5,
          padding: 10,
          // Include a dollar sign in the ticks
          callback: function(value, index, values) {
            return 'Rp' + number_format(value);
          }
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
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': Rp' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
  
  </script>
  
  <script type="text/javascript">
  
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Pendapatan", "Pengeluaran", "Sisa"],
    datasets: [{
      data: [<?php echo (int)$total_masuk['jumlah'] ?>, <?php echo (int)$total_keluar['jumlah'] ?>, <?php echo $sisa_uang ?>],
      backgroundColor: ['#4e73df', '#be2617', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#be2617', '#2c9faf'],
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

  
  </script>

</body>

</html>
