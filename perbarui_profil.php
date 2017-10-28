<?PHP
	if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false OR $_SESSION["email"]=="tamunyavayu@vayu.co.id")
	{
		header("location:index.php");
	}
	else
	{
		require "koneksi_ke_mysql.php";
		require "data_akun_masuk.php";
		echo //HTML
		"<h1>Perbarui Profil ".$akun['nama_lengkap']." </h1>
		<form action='ubah_profil.php?referer=".$_SERVER['HTTP_REFERER']."' method='POST' enctype='multipart/form-data'>
			Foto Profil: <input type='file' name='foto_profil'>
			<br>
			Nama Lengkap: <input type='text' name='nama_lengkap' value=".$akun['nama_lengkap'].">
			<br>
			<!--Tentang: <input type='text' name='tentang' value=".htmlspecialchars($akun["tentang"]).">-->
			Tentang: 
				<textarea name='tentang' style='width:30%; height:50px; resize:none; font-family: Arial, Helvetica, sans-serif;'>".htmlspecialchars($akun["tentang"])."</textarea>
			<br>
			Email: <input type='email' name='email' value=".$akun['email'].">
			<br>
			Password: <input type='password' name='password'/>
			<br>
			Ulangi Password: <input type='password' name='password2'/>
			<br>
			<input type='submit' value='Perbarui'/>
		</form>
		<form action='".$_SERVER['HTTP_REFERER']."' method='POST' style='display:inline'>
			<input type='submit' value='Batalkan'/>
		</form>
		";
	}
?>