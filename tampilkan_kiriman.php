<?PHP
	require "koneksi_ke_mysql.php";
	require "data_akun_masuk.php";
	$db_tabel_kiriman="kiriman_user_publik";
	$db_tabel_user="data_user";
	$sort=
		mysqli_query(
			$link, 
				"SELECT * 
				FROM ".$db_tabel_kiriman." 
				ORDER BY waktu_kiriman DESC");
	while ($tampilkan_kiriman=mysqli_fetch_array($sort, MYSQLI_ASSOC))
	{
		$id_pengirim=$tampilkan_kiriman["id_user"];
		$id_kiriman=$tampilkan_kiriman["id_kiriman"];
		mysqli_query(
			$link, 
				"SELECT * 
				FROM ".$db_tabel_user." 
				WHERE id_user =".$id_pengirim.";");
		if (mysqli_affected_rows($link) === 0)
		{
			mysqli_query(
				$link, 
					"DELETE FROM ".$db_tabel_kiriman." 
					WHERE ".$db_tabel_kiriman.".`id_kiriman` = ".$id_pengirim);
		}
		else
		{
			$pengirim=
				mysqli_query(
					$link, 
						"SELECT * 
						FROM data_user 
						WHERE id_user=".$id_pengirim.";");
			$tampilkan_pengirim=mysqli_fetch_array($pengirim, MYSQLI_ASSOC);
			$nama_pengirim=$tampilkan_pengirim["nama_lengkap"];
			$foto_profil_pengirim=$tampilkan_pengirim["foto_profil"];
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
			if ($id_pengirim == $akun["id_user"])
			{
				$hapus_kiriman=
					"<a href='hapus_kiriman.php?kiriman=".$tampilkan_kiriman["id_kiriman"]."'>Hapus kiriman</a>";
			}
			else
			{
				$hapus_kiriman="";
			}
			echo 
			"<div class='isi_konten'>"
				."<div class='header_content'>"
					."<div class='nama_pengirim'>"
						."<a href='home.php?halaman=profil_user&profil=".$id_pengirim."'>" //LINK KE PROFIL PENGIRIM
						."<img src='images/profile_pic/".$foto_profil_pengirim."' style='width:40px; height:40px'/> "
							.$nama_pengirim
						."</a>" //AKHIR LINK
					."</div>"
					."<div class='waktu_konten'>"
						.$tampilkan_kiriman["waktu_kiriman"]." WITA"
					."</div>"
					."<div style='clear:both'>"
					
					."</div>"
				."</div>"
				."<div class='center_content'>"
					."<div class='pesan_konten'>"
						."<pre class='kiriman'>"
							."<div class='foto_kiriman'>"
								.$foto_kiriman
							."</div>"
							."<span class='pre_span'>"
								.$tampilkan_kiriman["isi_kiriman"]
							."</span>"
						."</pre>"
					."</div>"
					.$hapus_kiriman
				."</div>"
			."</div>";
		}
	}
?>