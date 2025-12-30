<?php
include 'function.php';
include 'koneksi.php';
$menu = 'status';

?>

<!DOCTYPE html>
<html lang="id">
<?php include 'head.php'; ?>

<body>
	<?php include 'navbar.php'; ?>
	<br><br><br><br>
	<br><br><br><br>

	<div class="container">
		<?php
		if (isset($_GET['s'])) {
			?>
			<div class="alert alert-success" role="alert">
				Pesanan berhasil dibuat! Kode Pesanan:
				<b>
					<?= $_GET['s']; ?>
				</b>
			</div>
			<?php
		}
		?>
		<h1 class="display-5">Cek status pesanan Anda</h1>
		<hr>
		<form method="POST" action="status_pesanan.php">
			<label>Masukkan kode pesanan yang diberikan saat melakukan pemesanan.</label>
			<div class="row">
				<div class="col">
					<div class="input-group input-group-lg">
						<input type="text" name="kode_pesanan" class="form-control" aria-label="Large"
							placeholder="Misal: ABC12..." aria-describedby="inputGroup-sizing-sm" required>
					</div>
				</div>
				<div class="col">
					<button type="submit" class="btn btn-primary btn-lg">Cek</button>
				</div>
			</div>
		</form>


		<br><br><br><br>
		<br><br><br><br>


	</div>

	<?php include 'foot.php' ?>
</body>

</html>