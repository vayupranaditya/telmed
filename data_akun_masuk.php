<?PHP
	$email=$_SESSION["email"];
	require "koneksi_ke_mysql.php";
	$db_tabel_user="data_user";
	$pilih_akun=mysqli_query($link, "SELECT * FROM ".$db_tabel_user." WHERE email='".$email."';");
	$akun=mysqli_fetch_array($pilih_akun, MYSQLI_ASSOC);
	$foto_profil_pribadi="images/profile_pic/".$akun["foto_profil"];
?>