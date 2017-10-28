<?PHP
	session_start();
	if (isset($_SESSION["logged_in"]) AND $_SESSION["logged_in"]==true)
	{
		header("location:home.php");
	}
	else
	{
		if(!isset($_POST["nama_lengkap"]))
		{
			header("location:buatakun.php");
		}
		else
		{
			//BACA VARIABEL AWAL
			$nama_lengkap=$_POST["nama_lengkap"];
			$email=$_POST["email"];
			$password=$_POST["password"];
			$db_tabel_user="data_user";
			//ANTI CROSS SITE SCRIPTING
			$nama_lengkap=htmlspecialchars($nama_lengkap);
			$email=htmlentities($email);
			$password=htmlspecialchars($password);
			require "koneksi_ke_mysql.php";
			/*if(!$link)
			{
				//die("Gagal tersambung ke database!");
				echo "Koneksi gagal!";
			}
			else
			{*/ 
				$tambah_akun=
					mysqli_query(
						$link,
							"INSERT INTO ".$db_tabel_user." 
								(nama_lengkap,email,password, foto_profil) 
								VALUES ('".$nama_lengkap."','".$email."','".$password."','profile_pic_default.png')");
				if($tambah_akun)
				{
					header("location:logging_in.php?email=".$email."&password=".$password);
				}
				else
				{
					header("location:index.php?status=daftargagal");
				}
			//}
			echo 
			//HTML
			"
				<!DOCTYPE html>
				<html>
					<head>
						<title>Daftarkan Akun - Tel-Med</title>
					</head>
					<body>
						<h1>Pendaftaran Akun Tel-Med</h1>
						".$pesan."
					</body>
				</html>
			";
		}
	}
?>