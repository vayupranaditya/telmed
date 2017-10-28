<?php
	if (isset($_FILES["gambar"]))
	{
		$judul_gambar=$_FILES["gambar"]["name"];
		$ukuran_gambar=$_FILES["gambar"]["size"];
		$lokasi_sementara=$_FILES["gambar"]["tmp_name"];
		$bagian_nama_gambar=explode(".", $judul_gambar);
		$ekstensi_gambar=end($bagian_nama_gambar);
		$nama_file_tersimpan="gambar_tersimpan.".$ekstensi_gambar;
		if(move_uploaded_file($lokasi_sementara,"images/$nama_file_tersimpan"))
		{
			echo "Upload berhasil!<br>";
			echo "Judul: ".$judul_gambar."<br>";
			echo "Ukuran: ".$ukuran_gambar." Byte<br>";
			echo "<img src='images/".$nama_file_tersimpan."' style='height:150px; width:150px'/><br>";
			echo "UPDATE data_user SET `foto_profil` = '".$nama_file_tersimpan."' WHERE data_user.`id_user` = 27;";
		}
		else
		{
			echo "Upload Gagal!";
		}
		
	}
	else
	{
		echo "FAIL!";
	}
?>