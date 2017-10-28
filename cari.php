<?php
	session_start();
	require "koneksi_ke_mysql.php";
	require "data_akun_masuk.php";
	if ($akun["id_user"] == 1)
	{
		header("location:home.php?halaman=batas_preview");
	}
	else
	{
		$cari=$_GET["cari"];
		header("location:home.php?halaman=pencarian&cari=".$cari);
	}
?>