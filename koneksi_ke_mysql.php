<?PHP
	$db_host="localhost";
	$db_user="root";
	$db_password="";
	$db_namadb="telmed";
	$db_tabel_kiriman="kiriman_user_publik";
	$db_tabel_user="data_user";
	$db_tabel_cv_basic="cv_basic";
	$db_tabel_cv="cv_detailed";
	$link=mysqli_connect($db_host,$db_user,$db_password,$db_namadb) or die("Gagal tersambung ke database");
?>