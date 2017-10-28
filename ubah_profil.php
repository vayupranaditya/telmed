<?PHP
	session_start();
	if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false OR $_SESSION["email"]=="tamunyavayu@vayu.co.id")
	{
		header("location:index.php");
	}
	else
	{
		require "koneksi_ke_mysql.php";
		require "data_akun_masuk.php";
		$referer=$_GET["referer"];
		if (isset($_POST["nama_lengkap"]))
		{
			if (!empty($_FILES["foto_profil"]))
			{
				$foto_profil_diterima=$_FILES["foto_profil"]["name"];
				$nama_foto_profil_terpisah=explode(".", $foto_profil_diterima);
				$ekstensi_foto_profil=strtolower(end($nama_foto_profil_terpisah));
				$allowed_extension=array("jpg", "jpeg", "gif", "png");
				if(!in_array($ekstensi_foto_profil,$allowed_extension))
				{
					echo "Format dilarang!";
				}
				else
				{
					$foto_profil="profile_pic_".$akun["id_user"].".".$ekstensi_foto_profil;
					$sql=
						mysqli_query(
							$link, 
								"UPDATE ".$db_tabel_user." 
								SET `foto_profil` = '".$foto_profil."' 
								WHERE ".$db_tabel_user.".`id_user` = ".$akun['id_user'].";");
					if ($sql)
					{
						move_uploaded_file($_FILES["foto_profil"]["tmp_name"], "images/profile_pic/$foto_profil");
						echo "Foto profil berhasil diganti!";
					}
					else
					{
						echo "Data gagal diubah!";
					}
				}
			}
			if (!empty($_POST["nama_lengkap"]))
			{
				$nama_lengkap=$_POST["nama_lengkap"];
				$nama_lengkap=strip_tags($nama_lengkap, "<br>,<p>,<i>,<b>");
				$sql=
					mysqli_query(
						$link, 
						"UPDATE ".$db_tabel_user." 
						SET `nama_lengkap` = '".$nama_lengkap."' 
						WHERE ".$db_tabel_user.".`id_user` = ".$akun['id_user'].";");
				if ($sql)
				{
					echo "Data berhasil diubah";
				}
				else
				{
					echo "Data gagal diubah!";
				}
			}
			if (!empty($_POST["tentang"]))
			{
				$tentang=$_POST["tentang"];
				$tentang=strip_tags($tentang, "<br>,<p>,<i>,<b>, <strong>");
				$sql=
					mysqli_query(
						$link, 
							"UPDATE ".$db_tabel_user." 
							SET `tentang` = '".$tentang."' 
							WHERE ".$db_tabel_user.".`id_user` = ".$akun['id_user'].";");
				if ($sql)
				{
					echo "Data berhasil diubah";
				}
				else
				{
					echo "Data gagal diubah!";
				}
			}
			if (!empty($_POST["email"]))
			{
				$email=$_POST["email"];
				$email=strip_tags($email, "<br>,<p>,<i>,<b>");
				$sql=
					mysqli_query(
						$link, 
							"UPDATE ".$db_tabel_user." 
							SET `email` = '".$email."' 
							WHERE ".$db_tabel_user.".`id_user` = ".$akun['id_user'].";");
				if ($sql)
				{
					echo "Data berhasil diubah";
					$_SESSION["email"]=$email;
				}
				else
				{
					echo "Data gagal diubah!";
				}
			}
			if (!empty($_POST["password"]))
			{
				if ($_POST["password"] == $_POST["password2"])
				{
					$password=$_POST["password"];
					$password=strip_tags($password, "<br>,<p>,<i>,<b>");
					$sql=
						mysqli_query(
							$link, 
								"UPDATE ".$db_tabel_user." 
								SET `password` = '".$password."' 
								WHERE ".$db_tabel_user.".`id_user` = ".$akun['id_user'].";");
					if ($sql)
					{
						echo "Data berhasil diubah";
					}
					else
					{
						echo "Data gagal diubah!";
					}
				}
				else
				{
					header("location:".$referer);
				}
			}
			header("location:".$referer);
		}
		else
		{
			header("location:perbarui_profil.php");
		}
	}
?>