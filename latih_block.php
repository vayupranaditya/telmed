<?PHP
	echo
		"<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
		<html xmlns='http://www.w3.org/1999/xhtml'>
		<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
		<title>Untitled Document</title>
		<link href='CSS/latih_block.css' rel='stylesheet' type='text/css' />
		</head>

		<body>
		<div id='container'>
			<div id='header'>
				<div id='header_kanan'>
					<div class='header_kanan__tombol'>
						<a href='profil.php'>
							<img src='images/profile.png' alt='Profil'/>
						</a>
					</div>
					<div class='header_kanan__tombol'>
						<a href='pengaturan.php'>
							<img src='images/settings.png' alt='Pengaturan'/>
						</a>
					</div>
				  <div class='header_kanan__tombol'>
					<a href='bantuan.php'>
						<img src='images/help.png' alt='Bantuan'/>
					</a>
				  </div>
					<div class='header_kanan__tombol'>
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
					<form action='CARI.php' method='GET'>
					  <input type='text' name='CARI' value='Cari...' style='width: calc(100% - 4px); height:35px'/>
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
				</div>
				<div id='content_tengah'>
					<div class='content_tegah_content'>
					<br />
					<br />
					<br />";
				require "user_home.isi_halaman.php";
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