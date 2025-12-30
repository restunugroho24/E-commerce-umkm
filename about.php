<?php
include 'koneksi.php';
include 'function.php';
$menu = 'tentang';
?>

<!DOCTYPE html>
<html lang="id">
<?php include 'head.php' ?>

<body class="body">

  <?php include 'navbar.php' ?>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div
        style="width: 100%;max-width: 100%;max-height: 300px;overflow: hidden; display: flex; justify-content: center; align-items: center;">
        <img src="assets/img/warung1.jpg" alt="Edot gypsum" width="100%" height="auto">
        <div class="carousel-caption">
          <h1><b>TENTANG WARUNG MAMA NONI</b></h1>
        </div>
      </div>
    </div>
  </div>
  <br><br><br>

  <div class="container-custom">
    <div class="row">
      <div class="col-md-6">
        <img src="assets/img/warung3.jpg" alt="Los Angeles" width="100%" height="100%"
          style="border-radius: 10px 0 0 15px; ">
      </div>
      <div class="col-md-6">
        <div class="container">
          <br>
          <h1><b>TENTANG WARUNG MAMA NONI</b></h1>
          <br>
          Selamat datang di warung mama noni kami siap melayania customer
          <br><br>
          kami dari penjual mama noni sedia makanan dan minuman 
          <br><br>
          <a href="index.php" class="btn btn-dark btn-lg">LIHAT PRODUK</a>
          <br><br>
        </div>
      </div>
    </div>
  </div>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">TENTANG MAMA NONI</h5>
            <p class="card-text">Saya Misroni saya seorang wanita saya lahir di kota lampung pada tanggal 15 oktober 
              saya memiliki anak perempuan bernama Bunga Reva dan salah satu anak kesayang saya.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Berdirinya warung</h5>
            <p class="card-text">Saya mendirikan warung sederhana saya pada tahun ... dan saya mendirikan bersama 
              suami kesayan saya bernama juherman.</p>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">terakhir</h5>
            <p class="card-text">saya misroni yang memiliki warung mama noni siap melayani semua perminta customer.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  <div class="container-custom">
    <div class="container about-us">

      <div class="row">
        <div class="col-md-6">
          <div class="row">
            <div class="card-body">
              <h4>Kontak kami</h4>
              <p class="card-text">
              <p>NONI KEDAI SPBU</p>
              SPBU Sentul Jaya Pertamina 34.15605,sentul Jaya, Balaraja, Kabupaten Tangerang, Banten, indonesia
            sentul jaya, balaraja, kabupaten tangerang, banten</p>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="card-body">
              <h4>Media Sosial</h4>
              <p class="card-text">

              <p><img src="assets/img/wa.jpg" width="50px" height="50px"> <a
                  href="https://web.facebook.com/edot.gypsum">
                  kontak mama noni</a></p>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <br><br><br>

  <?php include 'foot.php' ?>

</body>

</html>