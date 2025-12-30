<div class="row about-us">
  <?php
  include 'koneksi.php';
  $action = $_REQUEST['action'];

  if ($action == "show-all") {
    $query = mysqli_query($koneksi, 'SELECT * FROM tb_barang ORDER BY id_barang DESC');
  } else {
    $query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_kategori = '$action' ORDER BY id_barang DESC");
  }
  while ($data = mysqli_fetch_array($query)) {
    ?>

    <div class="col-md-3">
      <br>
      <div class="card">
        <a href="detail_product.php?id_product=<?php echo $data['id_barang']; ?>"
          title="<?php echo $data['nama_barang']; ?>">
          <img src="assets/produk/<?php echo $data['foto_barang']; ?>" class="card-img-top"
            alt="<?php echo $data['nama_barang']; ?>" height="300px">
          <div class="card-body">
            <h5 class="card-title text-center">
              <?php echo $data['nama_barang']; ?>
            </h5>
        </a>
        <a href="detail_product.php?id_product=<?php echo $data['id_barang']; ?>" class="btn btn-primary btn-block">
          Pesan</a>
      </div>
    </div>
  </div>

<?php } ?>
</div>