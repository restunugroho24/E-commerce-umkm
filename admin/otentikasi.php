<?php
include '../koneksi.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$user = mysqli_query($koneksi, "SELECT username_admin FROM tb_admin WHERE username_admin='$username' AND password_admin='$password'");


if (mysqli_num_rows($user) != 0) {
	$data                 = mysqli_fetch_array($user);
	$_SESSION['id_admin'] = $data['username_admin'];

	echo '<script>alert("Login Sukes!"); document.location="index.php";</script>';

} else {
	echo '<script>alert("Login Gagal!");  document.location="login.php"</script>';
}

?>