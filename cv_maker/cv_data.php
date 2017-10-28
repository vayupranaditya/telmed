<?php
	session_start();
	require "../data_akun_masuk.php";
	require "php/form_maker.php";
	$field_amount=$_GET["field_amount"];
	if ($field_amount <=0 ) {
		$field_amount = 1;}
	if ((!isset($_SESSION["logged_in"]) OR 
		$_SESSION["logged_in"]==false) AND ($akun["id_user"]==1)) {
		header("location:index.php");}
		echo "
			<!DOCTYPE html>
			<html>
			<head>
				<title>Add CV Data | Tel-Med</title>
			</head>
			<body>
				<form action='php/store_data.php' method='POST'>";
				apply_field($field_amount);
		echo "
					<input type='submit' value='Tambahkan!'</value>
				</form>
			</body>
			</html>";
?>