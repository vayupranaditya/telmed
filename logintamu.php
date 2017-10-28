<?PHP
	session_start();
	if (isset($_SESSION["logged_in"]) AND $_SESSION["logged_in"]==true)
	{
		header("location:home.php");
	}
	else
	{
		//VARIABEL UNTUK LINK
		$db_tabel_user="data_user";
		$nama_user="tamu";
		$password="tamunyavayu";
		//LINK
		require "koneksi_ke_mysql.php";
		$search=mysqli_query($link,"SELECT * FROM ".$db_tabel_user." WHERE nama_lengkap='".$nama_user."'");
		if(mysqli_num_rows($search)==1)
		{
			$pesan="Login tamu berhasil";
			session_start();
			$_SESSION["email"]="tamunyavayu@vayu.co.id";
			$_SESSION["logged_in"]=true;
			header("location:home.php");
		}
		else
		{
			$pesan= "Login tamu gagal! Silahkan <a href='index.php'>ulangi</a>";
		}
		echo
		"
			<!DOCTYPE html>
			<html>
				<head>
					<title>Login Tamu - Tel-Med</title>
				</head>
				<body>
					<h1>Masuk ke Tel-Med sebagai tamu</h1>
					<br>
					".$pesan."
				</body>
			</html>
		";
	}
?>