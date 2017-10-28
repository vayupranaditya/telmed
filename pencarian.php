<?php
	require "koneksi_ke_mysql.php";
	require "data_akun_masuk.php";
	if ($akun["id_user"] == 1)
	{
		header("location:home.php?halaman=batas_preview");
	}
	else
	{
		$cari=$_GET["cari"];
		$cari_user=mysqli_query($link, 
			"SELECT * FROM ".$db_tabel_user." 
			WHERE nama_lengkap LIKE '%".$cari."%' 
			AND id_user != 1 
			AND id_user != ".$akun['id_user']."
			ORDER BY
			LOCATE('".$cari."', nama_lengkap)");
		$jumlah_hasil=mysqli_affected_rows($link);
		if ($jumlah_hasil == 0)
		{
			echo " <h1>Tidak ditemukan pengguna dengan kata kunci \"".$cari."\"</h1>";
		}
		else
		{
			echo " <h1>Ditemukan ".$jumlah_hasil." pengguna dengan kata kunci \"".$cari."\"</h1>";
			while ($user_ditemukan=mysqli_fetch_array($cari_user, MYSQLI_ASSOC))
			{
				$nama_user_ditemukan=$user_ditemukan["nama_lengkap"];
				$id_user_ditemukan=$user_ditemukan["id_user"];
				$foto_profil_user_ditemukan=$user_ditemukan["foto_profil"];
				echo
					"<div class='isi_konten'>"
					."<img src='images/profile_pic/".$foto_profil_user_ditemukan."' style='width:40px; height:40px'/> "
					."<a href='home.php?halaman=profil_user&profil=".$id_user_ditemukan."'>".$nama_user_ditemukan."</a>"
					."</div>";
			}
		}
	}
?>