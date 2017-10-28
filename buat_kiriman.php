<?PHP
	session_start();
	//KONEK KE DATABASE
	$db_tabel_kiriman="kiriman_user_publik";
	require "koneksi_ke_mysql.php";
	require "data_akun_masuk.php";
	$email=$_SESSION["email"];
	$id_user=$akun["id_user"];
	if (!empty($_POST["isi_kiriman"]))
	{	
		//ISI KIRIMAN
		$isi_kiriman=$_POST["isi_kiriman"];
		$isi_kiriman=str_replace("'", "\'", $isi_kiriman);
		$isi_kiriman=str_replace("\ ", "\\", $isi_kiriman);
		if (!empty($_FILES["foto_kiriman"]))
		{
			$allowed_extension=array("jpg", "jpeg", "png","gif");
			$nama_foto_kiriman=$_FILES["foto_kiriman"]["name"];
			$nama_foto_kiriman_terpisah=explode(".", $nama_foto_kiriman);
			$ekstensi_foto_kiriman=end($nama_foto_kiriman_terpisah);
			if ($_FILES["foto_kiriman"]["size"] > 2097152) 					//KALAU UKURAN FILE LEBIH BESAR DARI 2 MEGABYTE
			{
				echo "FOTO TIDAK BOLEH LEBIH DARI 2MB!";
				header("location:".$_SERVER["HTTP_REFERER"]);
			}
			if (in_array($ekstensi_foto_kiriman, $allowed_extension))
			{
				$kiriman_sebelumnya=mysqli_query($link, 
					"SELECT * FROM `".$db_tabel_kiriman."` 
					ORDER BY id_kiriman DESC 
					LIMIT 1");
				$kiriman_sebelumnya=mysqli_fetch_array($kiriman_sebelumnya, MYSQLI_ASSOC);
				$id_kiriman_sebelumnya=$kiriman_sebelumnya["id_kiriman"];
				$id_kiriman_sekarang=$id_kiriman_sebelumnya + 1;
				$foto_kiriman_tersimpan="kiriman_".$id_kiriman_sekarang.".".$ekstensi_foto_kiriman;
				$foto_kiriman_tmp=$_FILES["foto_kiriman"]["tmp_name"];
				$direktori_penyimpanan_gambar_kiriman="images/kiriman/";
				if (move_uploaded_file($foto_kiriman_tmp, $direktori_penyimpanan_gambar_kiriman.$foto_kiriman_tersimpan))
				{
					echo "Upload foto berhasil!<br>";
					echo "<img src=".$direktori_penyimpanan_gambar_kiriman.$foto_kiriman_tersimpan." style='height:200px; width:200px'><br>";
					echo "Nama gambar: ".$foto_kiriman_tersimpan."<br>";
					echo "Lokasi penyimpanan gambar: ".$direktori_penyimpanan_gambar_kiriman."<br>";
				}
				else
				{
					echo "Upload foto gagal!";
				}
			}
			else
			{
				$foto_kiriman_tersimpan="";
			}
		}
		//ANTI CROSS SITE SCRIPTING
		$isi_kiriman=strip_tags($isi_kiriman, "<a>, <b>, <br>, <i>, <p>, <strong>,");
		if ($buat_kiriman=mysqli_query($link,"
			INSERT INTO ".$db_tabel_kiriman." (id_user,isi_kiriman,foto_kiriman)
			VALUES ('".$id_user."','".$isi_kiriman."','".$foto_kiriman_tersimpan."');"))
		{
			echo "BERHASIL!";
			header("location:".$_SERVER['HTTP_REFERER']);
		}
		else
		{
			echo "GAGAL!";
			header("location:".$_SERVER['HTTP_REFERER']);
		}
	}
	else
	{
		header("location:".$_SERVER['HTTP_REFERER']);
	}
?>

