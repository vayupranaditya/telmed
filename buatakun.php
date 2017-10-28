<?PHP
	session_start();
	if (isset($_SESSION["logged_in"]) AND $_SESSION["logged_in"]==true)
	{
		header("location:home.php");
	}
	else
	{
		if (isset($_GET["status"]))
		{
			if ($_GET["status"] == "daftargagal")
			{
				$pesan="Pembuatan akun gagal!<br><br>";
			}
			else
			{
				$pesan="";
			}
		}
		else
		{
			$pesan="";
		}
		echo
		"
			<!DOCTYPE html>
			<html>
				<head>
					<title>Buat Akun Baru - Tel-Med</title>
				</head>
				<body>
					<h1>Buat akun <a href='index.php'>Tel-Med<a/a> baru</h1>
					".$pesan."
					<form action='daftarkan_akun.php' method='POST'>
						Nama Lengkap: <input type='text' name='nama_lengkap'/>
						<br>
						Alamat Email: <input type='email' name='email'/>
						<br>
						Password: <input type='password' name='password'/>
						<br>
						Ulangi Password: <input type='password' name='password2'/>
						<br>
						<input type='submit' value='Daftar!'/>
					</form>
				</body>
			</html>
		";
	}
?>