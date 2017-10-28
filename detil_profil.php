<?PHP	
	if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false)
	{
		header("location:index.php");
		
	}
	else
	{	//PROSES
		require "koneksi_ke_mysql.php";
		$db_tabel_user="data_user";
		//VARIABEL ID USER
		$id_user=$_GET["profil"];
		//ANTI CROSS SITE SCRIPTING
		$id_user=strip_tags($id_user);
		//CARI USERNYA
		$user=mysqli_query($link, "SELECT * FROM ".$db_tabel_user." WHERE id_user=".$id_user.";");
		$tampilkan_user=mysqli_fetch_array($user, MYSQLI_ASSOC);
	}
	//HTML
	echo
	"
		<!DOCTYPE html>
		<html>
			<head>
				<title>Detil Profil ".$tampilkan_user['nama_lengkap']." - Tel-Med</title>
			</head>
			<body>
				<h1> Detil Profil ".$tampilkan_user['nama_lengkap']." - <a href='index.php'>Tel-Med</a></h1>
				<p>
					Nama Lengkap: ".$tampilkan_user['nama_lengkap']
					."<br>
					Tentang ".$tampilkan_user['nama_lengkap'].": ".$tampilkan_user['tentang']
					."
				</p>
			</body>
		</html>
	"
?>