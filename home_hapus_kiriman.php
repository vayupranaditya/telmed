<?php
	session_start();
	require "koneksi_ke_mysql.php";
	require "data_akun_masuk.php";
	$db_tabel_kiriman="kiriman_user_publik";
	$id_kiriman=$_GET["kiriman"];
	$pengirim=mysqli_query($link, "SELECT * FROM ".$db_tabel_kiriman." WHERE id_kiriman=".$id_kiriman.";");
	$tampilkan_pengirim=mysqli_fetch_array($pengirim, MYSQLI_ASSOC);
	$id_pengirim=$tampilkan_pengirim["id_user"];
	$pengakses_file=$akun["id_user"];
	if ($pengakses_file == $id_pengirim)
	{
		mysqli_query($link, "DELETE FROM ".$db_tabel_kiriman." WHERE id_kiriman=".$id_kiriman);
		header("location:".$_SERVER["HTTP_REFERER"]);
	}
	else
	{
		header("location:".$_SERVER["HTTP_REFERER"]);
	}
?>