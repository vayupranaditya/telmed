<?PHP
	require "koneksi_ke_mysql.php";
	require "data_akun_masuk.php";
	$db_tabel_kiriman="kiriman_user_publik";
	$db_tabel_user="data_user";
	$user=$_GET["profil"];
	$sort=mysqli_query($link, "SELECT * FROM ".$db_tabel_kiriman." WHERE id_user =".$user." ORDER BY waktu_kiriman DESC");
	if (mysqli_affected_rows($link) == 0)
	{
		echo "<span style=' position:  relative; left:3%'>Sampai saat ini belum ada kiriman...</span>";
	}
	while ($tampilkan_kiriman=mysqli_fetch_array($sort, MYSQLI_ASSOC))
	{
		$id_pengirim=$tampilkan_kiriman["id_user"];
		$user=mysqli_query($link, "SELECT * FROM ".$db_tabel_user." WHERE id_user=".$id_pengirim.";");
		$tampilkan_user=mysqli_fetch_array($user, MYSQLI_ASSOC);
		$nama_user=$tampilkan_user["nama_lengkap"];
		$foto_profil_user=$tampilkan_user["foto_profil"];
		$foto_kiriman=$tampilkan_kiriman["foto_kiriman"];
			if (strlen($foto_kiriman) > 1)																						//KALAU ADA FOTONYA
		{
			$direktori_foto_kiriman="images/kiriman/";
			$foto_kiriman=
				"<img src='".$direktori_foto_kiriman.$foto_kiriman."' style='max-width:100%; max-height:500px;'/><br><br>";
		}
		else
		{
			$foto_kiriman="";
		}
		echo 
		"<div class='isi_konten'>"
			."<div class='header_content'>"
				."<div class='nama_pengirim'>"
					."<img src='images/profile_pic/".$foto_profil_user."' style='width:40px; height:40px'/> "
					.$nama_user
				."</div>"
				."<div class='waktu_konten'>"
						.$tampilkan_kiriman["waktu_kiriman"]." WITA"
				."</div>"
				."<div style='clear:both'>"
				
				."</div>"
			."</div>"
			."<div class='center_content'>"
				."<div class='pesan_konten'>"
					."<div class='foto_kiriman'>"
						.$foto_kiriman
					."</div>"
					."<pre>"
						.$tampilkan_kiriman["isi_kiriman"]
					."</pre>"
				."</div>"
			."</div>"
		."</div>";
	}
?>