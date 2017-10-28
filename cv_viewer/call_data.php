<?php
if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false) {
	header("location:../index.php");
	}
require "../koneksi_ke_mysql.php";
function show_data($user_id, $category) {
	global $link, $db_tabel_cv;
	$get_data=mysqli_query(
		$link, 
			"SELECT * FROM $db_tabel_cv 
			WHERE 
				category = '$category' AND 
				id_user = $user_id;");
	echo "<div class='data_1 pull-left'>
			<table>
				<tr>
					<th>Activity Name</th>
					<th>Month/Year Start</th>
					<th>Month/Year End</th>
					<th>Position</th>
					<th>About Activity</th>
				</tr>";
	while ($data=mysqli_fetch_array($get_data, MYSQLI_ASSOC)) {
		echo "
				<tr>
					<td>$data[activity_name]</td>
					<td>$data[start_year],$data[start_month]</td>
					<td>$data[end_year],$data[end_month]</td>
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
	if (($div_num % 2) ==  1) {
		$pull="pull-left";}
	else {
		$pull="pull-right";}
	if (isset($_GET["riwayat_pendidikan"])) {
		echo "<div class='detailed_info_".($div_num % 2)." ".$pull."'>";
			show_data($user_id, "riwayat_pendidikan");
		echo "</div>";
		$div_num++;
		}
	if (isset($_GET["riwayat_organisasi"])) {
		echo "<div class='detailed_info_".($div_num % 2)." ".$pull."'>";
			show_data($user_id, "riwayat_organisasi");
		echo "</div>";
		$div_num++;
		}
	if (isset($_GET["pengalaman_kepanitiaan"])) {
		echo "<div class='detailed_info_".($div_num % 2)." ".$pull."'>";
			show_data($user_id, "pengalaman_kepanitiaan");
		echo "</div>";
		$div_num++;
		}
	if (isset($_GET["lomba_seminar"])) {
		echo "<div class='detailed_info_".($div_num % 2)." ".$pull."'>";
			show_data($user_id, "lomba_seminar");
		echo "</div>";
		$div_num++;
		}
	if (isset($_GET["penghargaan"])) {
		echo "<div class='detailed_info_".($div_num % 2)." ".$pull."'>";
			show_data($user_id, "penghargaan");
		echo "</div>";
		$div_num++;
		}
	if (isset($_GET["kemampuan"])) {
		echo "<div class='detailed_info_".($div_num % 2)." ".$pull."'>";
			show_data($user_id, "kemampuan");
		echo "</div>";
		$div_num++;
		}
	if (isset($_GET["hasil_kegabutan"])) {
		echo "<div class='detailed_info_".($div_num % 2)." ".$pull."'>";
			show_data($user_id, "hasil_kegabutan");
		echo "</div>";
		$div_num++;
		}
	$div_num=3;
	}
?>