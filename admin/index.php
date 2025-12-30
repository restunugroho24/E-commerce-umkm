<?php

include 'includer.php';

$menu             = 'dashboard';
$page_title       = 'Dasbor';
$page_description = 'Beranda';
$kategori         = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tb_kategori"));
$barang           = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tb_barang"));
$pesanan          = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM tb_pesanan"));

?>

<!DOCTYPE html>
<html lang="id">

<?php include 'header.php'; ?>

<body class="app sidebar-mini rtl">
  <?php include 'navbar.php'; ?>
  <?php include 'sidebar.php'; ?>

  <main class="app-content">
    <?php include 'title.php'; ?>

    <div class="row">
      <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-list-alt fa-3x"></i>
          <div class="info">
            <h4>Kategori</h4>
            <p><b>
                <?= $kategori['total']; ?>
              </b></p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-desktop fa-3x"></i>
          <div class="info">
            <h4>Produk</h4>
            <p><b>
                <?= $barang['total']; ?>
              </b></p>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon"><i class="icon fa fa-money fa-3x"></i>
          <div class="info">
            <h4>Pesanan</h4>
            <p><b>
                <?= $pesanan['total']; ?>
              </b></p>
          </div>
        </div>
      </div>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div
          style="width: 100%;max-width: 100%;max-height: 300px;overflow: hidden; display: flex; justify-content: center; align-items: center;">
          <img src="../assets/img/warung5.jpg" width="100%" height="auto" alt="WARUNG5">

          <div class="carousel-caption">
            <h1><b>WARUNG MAMA NONI</b></h1>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include 'footer.php'; ?>
</body>

</html>