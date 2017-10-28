<?php
	session_start();
	require "../../koneksi_ke_mysql.php";
	require "../../data_akun_masuk.php";
	if ((!isset($_SESSION["logged_in"]) OR 
		$_SESSION["logged_in"]==false) AND ($akun["id_user"]==1)) {
		header("location:index.php");}
	if (!isset($_POST["field_amount"])) {
		header("location:../index.html");}
	$id_user=$akun["id_user"];
	$field_amount=$_POST["field_amount"];
	function store_data($field_num) {
		global $link,$db_tabel_cv,$id_user,$category,$activity_name,$start_year,$start_month,$end_year,$end_month,$position,$about_activity;
		$add_to_mysql=mysqli_query(
			$link, 
				"INSERT INTO ".$db_tabel_cv." 
				(id_user,category,activity_name,start_year,start_month,end_year,end_month,position,about_activity) 
				VALUES 
				(".$id_user.",'".$category."','".$activity_name."',".$start_year.",".$start_month.",".$end_year.",".$end_month.",'".$position."','".$about_activity."');");
		}
	
	for ($field_num=1;$field_num<=$field_amount;$field_num++) {
		echo $field_amount;
		$category=$_POST["category_".$field_num];
		$category=strip_tags($category, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		$activity_name=$_POST["activity_name_".$field_num];
		$activity_name=strip_tags($activity_name, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		$start_year=$_POST["start_year_".$field_num];
		$start_year=strip_tags($start_year, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		$start_month=$_POST["start_month_".$field_num];
		$start_month=strip_tags($start_month, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		$end_year=$_POST["end_year_".$field_num];
		$end_year=strip_tags($end_year, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		$end_month=$_POST["end_month_".$field_num];
		$end_month=strip_tags($end_month, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		$position=$_POST["position_".$field_num];
		$position=strip_tags($position, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		$about_activity=$_POST["about_activity_".$field_num]; 
		$about_activity=strip_tags($about_activity, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		store_data($field_num);}
	header("location:../index.html?status=success");
?>