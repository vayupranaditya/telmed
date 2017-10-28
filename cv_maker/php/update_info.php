<?php
	session_start();
	require "../../data_akun_masuk.php";
	require "../../koneksi_ke_mysql.php";
	if ((!isset($_SESSION["logged_in"]) OR 
		$_SESSION["logged_in"]==false) OR ($akun["id_user"]==1)) {
		header("location:../../index.php");}
	$id_user=$akun["id_user"];
	$full_name=$_POST["full_name"];
	$full_name=strip_tags($full_name, "<a>, <b>, <br>, <i>, <p>, <strong>,");
	$birth_place=$_POST["birth_place"];
	$birth_place=strip_tags($birth_place, "<a>, <b>, <br>, <i>, <p>, <strong>,");
	$birth_date=$_POST["birth_date"];
	$birth_date=strip_tags($birth_date, "<a>, <b>, <br>, <i>, <p>, <strong>,");
	$faculty=$_POST["faculty"];
	$faculty=strip_tags($faculty, "<a>, <b>, <br>, <i>, <p>, <strong>,");
	$department=$_POST["department"];
	$department=strip_tags($department, "<a>, <b>, <br>, <i>, <p>, <strong>,");
	$about=$_POST["about"];
	$about=strip_tags($about, "<b>, <br>, <i>, <p>, <strong>,");
	$is_exist=mysqli_query(
		$link,
			"SELECT * FROM $db_tabel_cv_basic 
			WHERE id_user = $id_user;");
	$row_found=mysqli_affected_rows($link);
	if ($row_found == 1) {
		$update_info=mysqli_query(
			$link,
				"UPDATE $db_tabel_cv_basic 
				SET 
				full_name = '$full_name',
				birth_place = '$birth_place',
				birth_date = '$birth_date',
				faculty = '$faculty',
				department = '$department',
				about = '$about' 
				WHERE
				id_user = $id_user;");}
	else {
		$create_info=mysqli_query(
			$link,
				"INSERT INTO $db_tabel_cv_basic 
				(id_user, full_name, birth_place, birth_date, faculty, department, about)
				VALUES
				($id_user, '$full_name', '$birth_place', '$birth_date', '$faculty', '$department', '$about');");}
	header("location:../index.html");
?>