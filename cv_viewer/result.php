<?php
session_start();
if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false) {
	header("location:../index.php");}
require "../koneksi_ke_mysql.php";
$user_id=$_POST["user_id"];
$get_data=mysqli_query(
	$link, 
		"SELECT * FROM $db_tabel_cv_basic 
		WHERE id_user = $user_id ;");
$user=mysqli_fetch_array($get_data, MYSQLI_ASSOC);
$full_name=$user["full_name"];
$birth_place=$user["birth_place"];
$birth_date=$user["birth_date"];
$faculty=$user["faculty"];
$department=$user["department"];
$about=$user["about"];
$info_needed="";
function check_pull($div_num) {
	if (($div_num % 2) ==  1) {
		$pull_info="pull-left";
		$pull_title="pull-right";}
	else {
		$pull_info="pull-right";
		$pull_title="pull-left";}
	return $pull_info;
	}
function show_data($user_id, $category, $div_num) {
	global $link, $db_tabel_cv;
	$get_data=mysqli_query(
		$link, 
			"SELECT * FROM $db_tabel_cv 
			WHERE 
				category = '$category' AND 
				id_user = $user_id 
			ORDER BY
				start_year ASC,
				start_month ASC,
				end_year ASC,
				end_month ASC;");
	echo "<div class='data_$div_num ".check_pull($div_num)."'>
			<table style='width:100%;'>
				<tr>
					<th style='width:25%;'>Activity Name</th>
					<th style='width:15%;'>Month/Year Start</th>
					<th style='width:15%;'>Month/Year End</th>
					<th style='width:15%;'>Position</th>
					<th style='width:30%;'>About Activity</th>
				</tr>";
	while ($data=mysqli_fetch_array($get_data, MYSQLI_ASSOC)) {
		echo "
				<tr>
					<td>$data[activity_name]</td>
					<td>$data[start_month]/$data[start_year]</td>
					<td>$data[end_month]/$data[end_year]</td>
					<td>$data[position]</td>
					<td>$data[about_activity]</td>
				</tr>
			";
		}
	echo "</table>
		</div>";
	}
function show_result($user_id) {
	global $link, $db_tabel_cv;
	$div_num = 1;
	if (isset($_POST["riwayat_pendidikan"])) {
		echo "<div class='detailed_info_".($div_num % 2)."'>";
			if (($div_num % 2) == 0) {
				show_data($user_id, "riwayat_pendidikan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "EduHistory";
				echo "</div>";
				}
			else {
				show_data($user_id, "riwayat_pendidikan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "EduHistory";
				echo "</div>";
				}
		echo "</div>";
		$div_num++;
		}
	if (isset($_POST["riwayat_organisasi"])) {
		echo "<div class='detailed_info_".($div_num % 2)."'>";
			if (($div_num % 2) == 0) {
				show_data($user_id, "riwayat_organisasi", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "OrgHistory";
				echo "</div>";
				}
			else {
				show_data($user_id, "riwayat_organisasi", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "OrgHistory";
				echo "</div>";
				}
		echo "</div>";
		$div_num++;
		}
	if (isset($_POST["pengalaman_kepanitiaan"])) {
		echo "<div class='detailed_info_".($div_num % 2)."'>";
			if (($div_num % 2) == 0) {
				show_data($user_id, "pengalaman_kepanitiaan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Committees";
				echo "</div>";
				}
			else {
				show_data($user_id, "pengalaman_kepanitiaan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Committees";
				echo "</div>";
				}
		echo "</div>";
		$div_num++;
		}
	if (isset($_POST["lomba_seminar"])) {
		echo "<div class='detailed_info_".($div_num % 2)."'>";
			if (($div_num % 2) == 0) {
				show_data($user_id, "lomba_seminar", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Comps&Seminars";
				echo "</div>";
				}
			else {
				show_data($user_id, "lomba_seminar", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Comps&Seminars";
				echo "</div>";
				}
		echo "</div>";
		$div_num++;
		}
	if (isset($_POST["penghargaan"])) {
		echo "<div class='detailed_info_".($div_num % 2)."'>";
			if (($div_num % 2) == 0) {
				show_data($user_id, "penghargaan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Achievements";
				echo "</div>";
				}
			else {
				show_data($user_id, "penghargaan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Achievements";
				echo "</div>";
				}
		echo "</div>";
		$div_num++;
		}
	if (isset($_POST["kemampuan"])) {
		echo "<div class='detailed_info_".($div_num % 2)."'>";
			if (($div_num % 2) == 0) {
				show_data($user_id, "kemampuan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Skills";
				echo "</div>";
				}
			else {
				show_data($user_id, "kemampuan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Skills";
				echo "</div>";
				}
		echo "</div>";
		$div_num++;
		}
	if (isset($_POST["hasil_kegabutan"])) {
		echo "<div class='detailed_info_".($div_num % 2)."'>";
			if (($div_num % 2) == 0) {
				show_data($user_id, "hasil_kegabutan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Gabuts";
				echo "</div>";
				}
			else {
				show_data($user_id, "hasil_kegabutan", $div_num%2);
				echo "<div class='info_title ".check_pull($div_num % 2)."'>";
					echo "Gabuts";
				echo "</div>";
				}
		echo "</div>";
		$div_num++;
		}
	$div_num=3;
	}

$get_profile_pic = mysqli_query($link, "SELECT * FROM ".$db_tabel_user." WHERE id_user = ".$user_id);
$get_pic = mysqli_fetch_array($get_profile_pic, MYSQLI_ASSOC);
$profile_pic="../images/profile_pic/".$get_pic["foto_profil"];
	
echo "
	<!DOCTYPE html>
	<html>
	<head>
		<title>CV MAKER</title>
		<link rel='stylesheet' type='text/css' href='css/bootstrap.min.css'>
		<link rel='stylesheet' type='text/css' href='css/result.css'>
	</head>
	<body>
		<div class='content'>
			<div class='top'>
				Curriculum Vitae
			</div>
			<div class='middle'>
				<div class='basic_info'>
					<div class='user_pic pull-left'>
						<img src='$profile_pic' style='width: 30vh;'>
					</div>
					<div class='user_info pull-right'>
						Name: $full_name<br>
						Place, Date of Birth: $birth_place,$birth_date<br>
						Faculty: $faculty<br>
						Department: $department<br>
						About: $about<br>
					</div>
				</div>
				<div class='detailed_info'>
					<div style='height:50px;width:100%'>
					</div>
					<!--DI SINI ISI INFO-INFO YANG DICENTANG!-->";
show_result($user_id);
echo "			</div>
			</div>
			<div class='bottom'>
				Created using Tel-Med CV Maker<br>
				Telkom University Media<br>
				Copyright 2017 by I Gusti Bagus Vayupranaditya Putraadinatha<br>
			</div>
		</div>
	</body>
	</html>
	";
?>