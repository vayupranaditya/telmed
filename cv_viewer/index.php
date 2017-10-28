<?php
session_start();
if (!isset($_SESSION["logged_in"]) OR 
	($_SESSION["logged_in"]==false) OR
	!isset($_GET["user_id"]) OR
	$_GET["user_id"] == 1) {
	header("location:../index.php");}
require "../koneksi_ke_mysql.php";
$user_id=$_GET["user_id"];
$selected_user = mysqli_query($link, "SELECT * FROM ".$db_tabel_user." WHERE id_user = ".$user_id);
if(mysqli_affected_rows($link) === 0) {
	header("location:home.php");
	}
else {
	$user = mysqli_fetch_array($selected_user, MYSQLI_ASSOC);
	$user_name=$user["nama_lengkap"];
	$profile_pic="../images/profile_pic/".$user["foto_profil"];
	}
echo "
	<!DOCTYPE html>
	<html>
	<head>
		<link rel='stylesheet' type='text/css' href='css/index.css'>
		<title>CV Viewer | Tel-Med</title>
	</head>
	<body>
		<div class='content'>
			<span style='font-size:6vh;'>Tel-Med CV Viewer (Experimental)</span><br>
			<br>
			<span style='font-size:5vh;'>CV of $user_name</span><br>
			<br>
			Show me:<br>
			<form action='result.php' method='POST' target='_blank'>
				<input type='checkbox' name='riwayat_pendidikan' checked='checked'>Education History<br>
				<input type='checkbox' name='riwayat_organisasi' checked='checked'>Organization History<br>
				<input type='checkbox' name='pengalaman_kepanitiaan' checked='checked'>Committees<br>
				<input type='checkbox' name='lomba_seminar' checked='checked'>Competitions and Seminars<br>
				<input type='checkbox' name='penghargaan' checked='checked'>Achievements<br>
				<input type='checkbox' name='kemampuan' checked='checked'>Skills<br>
				<input type='checkbox' name='hasil_kegabutan' checked='checked'>Gabut Results<br>
				<input type='hidden' name='user_id' value='$user_id'>
				<input type='submit' value='Show CV'>
			</form>
		</div>
	</body>
	</html>
	";

?>