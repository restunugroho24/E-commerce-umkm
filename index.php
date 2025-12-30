<?php
include 'koneksi.php';
include 'function.php';
$menu = 'beranda';
?>

<!DOCTYPE html>
<html lang="id">
<?php include 'head.php' ?>

<body class="body">
  <?php include 'navbar.php' ?>
  <div class="container-custom">

    <div id="demo" class="carousel slide" data-ride="carousel">
      <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
      </ul>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/warung1.jpg" alt="KEDAI NONI" width="100%" height="500">
          <div class="carousel-caption">
            <h1><b>WARUNG MAMA NONI</b></h1>
          </div>
        </div>
        <div class="carousel-item">
          <img src="assets/img/warung2.jpg" alt="kadai mama noni" width="100%" height="500">
          <div class="carousel-caption">
            <h1><b>REST AREA SPBU</b></h1>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>

    <br><br><br>

    <div class="container-fluid">

      <div class="row">
        <div class="col-md-4">
          <div class="garis"></div>
        </div>
        <div class="col-md-4">
          <h1 class="display-5 text-center">Produk kami</h1>
        </div>
        <div class="col-md-4">
          <div class="garis"></div>
        </div>
      </div>

      <br>
      <br>

      <div class="form-group col-md-3">
        <label for="exampleInputEmail1">Pilih kategori</label>

        <select class="form-control" id="kategori">
          <option value="show-all" selected="selected">---Pilihan kategori---</option>
          <?php
          $q_kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
          while ($data_kat = mysqli_fetch_array($q_kategori)) {
            ?>
            <option value="<?php echo $data_kat['id_kategori']; ?>"><?php echo $data_kat['nama_kategori']; ?></option>
          <?php } ?>
        </select>
      </div>

      <div id="data-product"></div>
      <br><br>

    </div>
  </div>

  <?php include 'foot.php' ?>
  <script type="text/javascript">
    $(document).ready(function () {

      var data = "data_product.php";
      $('#data_product').load(data);

      function getAll() {
        $.ajax({
          url: 'data_product.php',
          data: 'action=show-all',
          cache: false,
          success: function (response) {
            $("#data-product").html(response);

          }
        });
      }

      getAll();

      $("#kategori").change(function () {
        var pil = $(this).find(":selected").val();
        var dataString = 'action=' + pil;

        $.ajax({
          url: 'data_product.php',
          data: dataString,
          cache: false,
          success: function (response) {
            $("#data-product").html(response);
          }
        });
      })
    })

  </script>

</body>

</html>