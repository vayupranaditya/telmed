<?PHP
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
		//ANTI CROSS SITE SCRIPTING
		$nama_lengkap=htmlspecialchars($nama_lengkap);
		$email=htmlentities($email);
		$password=htmlspecialchars($password);
		//VARIABEL UNTUK MYSQL
		$db_host="localhost";
		$db_user="root";
		$db_password="";
		$db_namadb="latcv1_telmed";
		$db_tabel="data_user";
		//LINK
		$link="mysqli_connect($db_host,$db_user,$db_password,$db_namadb)";
		if(!link)
		{
			die("Gagal tersambung ke database!");
		}
		else
		{
			$tambah_akun=mysqli_query($link,"INSERT INTO ".$db_tabel." (nama_lengkap, email, password) VALUES ('".$nama_lengkap."','".$email."','".$password."')");
			if($tambah_akun)
			{
				$pesan="Akun ".$nama_lengkap." berhasil didaftarkan!";
			}
			else
			{
				$pesan="Akun ".$nama_lengkap." gagal didaftarkan!";
			}
		}
	}
?>