<?php
	session_start();
	if (isset($_SESSION["logged_in"]) AND $_SESSION["logged_in"]==true)
	{
		header("location:home.php");
	}
	else
	{
		//LIHAT STATUS
		if (isset($_GET["status"]))
		{
			$status=$_GET["status"];
			if ($status=="passwordsalah")
			{
				$pesan="Password salah!<br><br>";
			}
			else
			{
				if ($status=="tidakterdaftar")
				{
					$pesan="Email tidak terdaftar. Silahkan <a href='buatakun.php'>mendaftar</a><br><br>";
				}
				else
				{
					if ($status=="daftarberhasil")
					{
						$pesan="Pendaftaran akun baru berhasil!<br><br>";
					}
					else
					{
						$pesan="";
					}
				}
			}
		}
		else
		{
			$pesan="";
		}
		echo //HTML
		"
			<!DOCTYPE html>
			<!--LOGIN PAGE-->
			<html>
				<head>
					<title>Halaman Masuk - Tel-Med</title>
				</head>
				<body>
					<h1>Masuk ke <a href='index.php'>Tel-Med</a></h1>"
					.$pesan.
					"
					<form action='logging_in.php' method='POST'>
						Email: <input type='email' name='email'/>
						<br>
						Password: <input type='password' name='password'/>
						<br>
						<input type='submit' value='Login!'/>
					</form>
					<br>
					Belum punya akun? Silahkan 
					<a href='buatakun.php'>buat akun</a>
					atau login sebagai 
					<form action='logintamu.php' method='POST'  style='display:inline'>
						<input type='submit' value='tamu'/>
					</form>
				</body>
			</html>
		";
	}
?>