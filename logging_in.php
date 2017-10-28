<?PHP
	if(isset($_REQUEST["email"]) AND isset($_REQUEST["password"]))
	{
		//KALAU email dan password sudah diset
		//LOAD email sama password
		$email=$_REQUEST["email"];
		$password=$_REQUEST["password"];
		//ANTI CROSS SITE SCRIPTING
		$email=htmlspecialchars($email);
		$password=htmlspecialchars($password);
		//CONNECT KE MYSQL
		$db_tabel_user="data_user";
		require "koneksi_ke_mysql.php";
		if (!$link)
		{
			die("Gagal tersambung!");
		}
		else
		{
			$search=
				mysqli_query(
					$link,
						"SELECT * FROM ".$db_tabel_user." 
						WHERE email='".$email."';");
			$cekpassword=mysqli_fetch_array($search,MYSQLI_ASSOC);
			if (mysqli_num_rows($search)==1)
			{
				if ($password==$cekpassword["password"])
				{
					session_start();
					$_SESSION["email"]=$email;
					$_SESSION["logged_in"]=true;
					header("location:home.php");
				}
				else
				{
					$pesan="Login gagal! Periksa alamat email dan/atau password Anda!<br>Silahkan ulangi";
					header("location:index.php?status=passwordsalah");
				}
			}
			else
			{
				$pesan="Email tidak terdaftar! Silahkan <a href='buatakun.php'>buat akun</a>";
				header("location:index.php?status=tidakterdaftar");
			}
		}
	}
	else
	{
		header("location:index.php");
	}
?>