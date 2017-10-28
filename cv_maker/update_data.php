<?php
	session_start();
	require "../data_akun_masuk.php";
	require "../koneksi_ke_mysql.php";
	if ((!isset($_SESSION["logged_in"]) OR 
		$_SESSION["logged_in"]==false) OR 
		($akun["id_user"]==1)) {
		header("location:../index.php");}
	$id_user=$akun["id_user"];
	$get_data=mysqli_query(
		$link,
			"SELECT * FROM $db_tabel_cv_basic 
			WHERE id_user = $id_user");
	$user=mysqli_fetch_array($get_data, MYSQLI_ASSOC);
	$full_name=$user["full_name"];
	$birth_place=$user["birth_place"];
	$birth_date=$user["birth_date"];
	$faculty=$user["faculty"];
	$department=$user["department"];
	$about=$user["about"];
	echo "<!DOCTYPE html>";
	echo "<html>";
	echo "<head>";
		echo "<title>Perbarui Data CV | Tel-Med</title>";
	echo "</head>";
	echo "<body>";
		echo "<form action='php/update_info.php' method='POST'>";
			echo "Nama Lengkap <input type='text' name='full_name' value='$full_name'><br>";
			echo "Tempat Lahir <input type='text' name='birth_place' value='$birth_place'><br>";
			echo "Tanggal Lahir <input type='date' name='birth_date' value='$birth_date'><br>";
			echo "Fakultas <input type='text' name='faculty' value='$faculty'><br>";
			echo "Jurusan <input type='text' name='department' value='$department'><br>";
			echo "Tentang Diri Sendiri <textarea name='about'>$about</textarea><br>";
			echo "<input type='submit' value='Perbarui Data'><br>";
		echo "</form>";
	echo "</body>";
	echo "</html>";
?>