<?PHP
	session_start();
	if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false)
	{
		header("location:login.php");
		
	}
	else
	{
		require "data_akun_masuk.php";
		if (isset($_GET["status"]))
		{
			$status=$_GET["status"];
			if($status=="kirimanberhasil")
			{
				$status_kiriman='<script>alert("Kiriman berhasil!")</script>';
			}
			else
			{
				$status_kiriman="";
			}
		}
		else
		{
			$status_kiriman="";
		}
		/* ISI DARI $isi_halaman : $profil_pribadi, $perbarui_profil, $buat_kiriman, $logout, $tampilkan_kiriman*/
		$judul_halaman="Beranda ".$akun['nama_lengkap'];
			
		}
	}
	echo
	"
		<!DOCTYPE html>
		<html>
			<head>
				<title>".$judul_halaman." - Tel-Med</title>
				<link href='css/style.css' rel='stylesheet' type='text/css' />
			<body>
				".$status_kiriman
				."<div id='wrapper'>
					<div id='header'>
					</div>
					<div id='sidebar_kiri'>
					</div>
					<div id='sidebar_kanan'>
					</div>
					<div id='content'>";
						require "user_home.isi_halaman.php";
			echo
					"</div>
			</body>
		</html>
	";
?>