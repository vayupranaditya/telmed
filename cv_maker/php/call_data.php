<?php
	session_start();
	if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false) {
		header("location:../../index.php");}
	require "../../data_akun_masuk.php";
	if(!(isset($_GET["category"]) OR
		 isset($_GET["riwayat_pendidikan"]) OR 
		 isset($_GET["riwayat_organisasi"]) OR
		 isset($_GET["pengalaman_kepanitiaan"]) OR
		 isset($_GET["lomba_seminar"]) OR
		 isset($_GET["penghargaan"]) OR
		 isset($_GET["kemampuan"]) OR
		 isset($_GET["hasil_kegabutan"]))) {
		 //header("location:../../index.php");}
		 echo "NOT OPENED WELL!";}
	else {
		if (isset($_GET["riwayat_pendidikan"])) {
			function riwayat_pendidikan() {
				$select_data=mysqli_query($link,
					"SELECT * FROM ".$db_tabel_cv." 
					WHERE id_user = ".$id_user." 
					AND category = 'riwayat_pendidikan';");
				while ($riwayat_pendidikan = mysqli_fetch_array($select_data, MSYQLI_ASSOC)) {
					echo "..";}
				}
		} }

	/*if (isset($_GET["riwayat_pendidikan"])) {
		riwayat_pendidikan()}*/
?>