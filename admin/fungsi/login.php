<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi, "SELECT * FROM tabel_user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	
	$data = mysqli_fetch_assoc($login);
	session_start();
	
	if($data['level']=="admin"){
 
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		header("location:../admin/dashboard.php");

	}else if($data['level']=="gudang"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "gudang";
		header("location:../gudang/dashboard.php");
 
	}else if($data['level']=="kepegawaian"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "kepegawaian";
		header("location:../kepegawaian/dashboard.php");
 
	}else if($data['level']=="keuangan"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "keuangan";
		header("location:../keuangan/dashboard.php");
 
	}else if($data['level']=="pemesanan"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pemesanan";
		header("location:../pemesanan/dashboard.php");
 
	}else if($data['level']=="produksi"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "produksi";
		header("location:../produksi/dashboard.php");
 
	}
 } else {
?>
	<script language="JavaScript">
		alert('Oops! Username atau Password tidak sesuai ...');
		document.location = '../index.php';
	</script>
<?php
}
?>