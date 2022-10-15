<?php
session_start();
include './function/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($koneksi, "SELECT * FROM tAdmin WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if ($cek > 0) {
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:dashboard.php");
} else {
?>
	<script language="JavaScript">
		alert('Oops! Username atau Password tidak sesuai ...');
		document.location = 'index.php';
	</script>
<?php
}
?>