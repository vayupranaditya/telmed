<?php
	require "../data_akun_masuk.php";
	if ((!isset($_SESSION["logged_in"]) OR 
		($_SESSION["logged_in"]==false) AND ($akun["id_user"]==1))) {
		header("location:../../index.php");}
	if (!isset($_GET["field_amount"])) {
		header("location:../index.html");}
	function add_field ($field_num) {
		echo "<div class='field'>";
			echo "Kategori	<select name='category_".$field_num."'>";
								echo "<option value='riwayat_pendidikan'>Riwayat Pendidikan</option>";
								echo "<option value='riwayat_organisasi'>Riwayat Organisasi</option>";
								echo "<option value='pengalaman_kepanitiaan'>Pengalaman Kepanitiaan</option>";
								echo "<option value='lomba_seminar'>Keikutsertaan Lomba & Seminar</option>";
								echo "<option value='penghargaan'>Pencapaian & Penghargaan</option>";
								echo "<option value='kemampuan'>Kemampuan</option>";
								echo "<option value='hasil_kegabutan'>Hasil Kegabutan</option>";
							echo "</select><br>";
			echo "Nama Kegiatan <input type='text' name='activity_name_".$field_num."'><br>";
			echo "Tahun Mulai <input type='number' name='start_year_".$field_num."'><br>";
			echo "Bulan Mulai <input type='number' name='start_month_".$field_num."'><br>";
			echo "Tahun Selesai <input type='number' name='end_year_".$field_num."'><br>";
			echo "Bulan Selesai <input type='number' name='end_month_".$field_num."'><br>";
			echo "Posisi <input type='text' name='position_".$field_num."'><br>";
			echo "Tentang Kegiatan <textarea name='about_activity_".$field_num."'></textarea><br>";
			echo "<br>";
		}
	function apply_field($field_amount) {
		for ($field_num=1; $field_num <= $field_amount; $field_num++) {
			add_field($field_num);
				echo "<input type='hidden' name='field_amount' value='".$field_amount."'>"; 
			echo "</div>";} }
?>