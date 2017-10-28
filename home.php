<?PHP
	session_start();
	if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false)
	{
		header("location:index.php");
		
	}
	else
	{
		require "data_akun_masuk.php";
		if (isset($_GET["status"]))
		{
			$status=$_GET["status"];
			if($status=="kirimanberhasil")
			{
				
			}
			else
			{
				
			}
		}
		else
		{
			
		}
		/* ISI DARI $isi_halaman : $profil_pribadi, $perbarui_profil, $buat_kiriman, $logout, $tampilkan_kiriman*/
		$judul_halaman=$akun['nama_lengkap'];
	}
	
	echo
		"<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
			<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
			<title>".$judul_halaman." - Tel-Med</title>
			<link rel='icon' href='images/favicon_1.png' type='image'/>
			<link href='bootstrap/css/bootstrap.css' rel='stylesheet' type='text/css' />
			<link href='css/home.css' rel='stylesheet' type='text/css' />
		</head>

		<body>
		<div id='container'>
			<div id='header'>
				<div id='header_kanan'>
					<div class='header_kanan_tombol'>
						<a href='home.php?halaman=profil_pribadi'>
							<img src='images/profile_pic/".$akun['foto_profil']."' alt='Profil'/>
						</a>
					</div>
					<div class='header_kanan_tombol'>
						<a href='home.php?halaman=perbarui_profil'>
							<img src='images/settings.png' alt='Pengaturan'/>
						</a>
					</div>
				  <div class='header_kanan_tombol'>
					<a href='bantuan.php'>
						<img src='images/help.png' alt='Bantuan'/>
					</a>
				  </div>
					<div class='header_kanan_tombol'>
						<a href='logout.php'>
							<img src='images/logout.png' alt='Keluar' class='header_kanan__tombol'/>
						</a>
					</div>
				</div>
				<div id='header_kiri'>
					<a href='index.php'>
						<img src='images/telmed_logo_transparan.png' alt='Tel-Med' style='height:40px; margin:0 auto; display:block' />
					</a>
				</div>
				<div id='header_tengah'>
					<form action='cari.php' method='GET'>
					  <input type='text' name='cari' value='Cari...' style='width: calc(100% - 4px); height:35px'/>
					</form>
				</div>
			</div>
			<div id='content'>
				<div id='content_kiri'>
					Tel-Med Notes Sharing<br />
					Kategori:<br />
					<ul>
						<li>Fakultas Ekonomi dan Bisnis</li>
						<li>Fakultas Ilmu Terapan</li>
						<li>Fakultas Industri Kratif</li>
						<li>Fakultas Komunikasi dan Bisnis</li>
						<li>Fakultas Rekayasa Industri</li>
						<li>Fakultas Teknik Elektro</li>
						<li>Fakultas Teknik Informatika</li>
					</ul>
				</div>
				<div id='content_kanan'>
					Tel-Med Instant Shopping<br />
					Kategori:<br />
					<ul>
						<li>Bahan Makanan</li>
						<li>Makanan Siap Saji</li>
						<li>Peralatan Rumah Tangga</li>
						<li>Gadget dan Aksesori</li>
					</ul>
					<br>
					Tel-Med Instant Service<br />
					Kategori:<br />
					<ul>
						<li>Komputer/Laptop</li>
						<li>Handphone</li>
					</ul>
				</div>
				<div id='content_tengah'>
					<div class='content_tegah_content'>
					<br />
					<br />
					<br />";
				if (isset($_GET["halaman"]))
				{
					$halaman=$_GET["halaman"];
					$target=$halaman.".php";
					require $target;
				}
				else
				{
					require "user_home.isi_halaman.php";
				}
				echo
					"
					</div>
				</div>
				
			</div>
			<div id='footer' data-role='footer' data-position='fixed'>
			Telkom University Media<br />
			Copyright 2017 by I Gusti Bagus Vayupranaditya Putraadinatha
			</div>
		</div>
		</body>
		</html>";
?>