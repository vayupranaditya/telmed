<?PHP
	if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false OR $_SESSION["email"]=="tamunyavayu@vayu.co.id")
	{
		header("location:index.php");
	}
	else
	{
		$selected_user = mysqli_query($link, "SELECT * FROM ".$db_tabel_user." WHERE id_user = ".$akun["id_user"]);
		require "koneksi_ke_mysql.php";
		require "data_akun_masuk.php";
		$user = mysqli_fetch_array($selected_user, MYSQLI_ASSOC);
		$user_id_user=$user["id_user"];
		$user_nama_user=$user["nama_lengkap"];
		$user_tentang=$user["tentang"];
		$profile_pic="images/profile_pic/".$user["foto_profil"];
		
		echo 
		"
			<div id='header_user'>
			<!--ISI FOTO PROFIL, NAMA, 'Selengkapnya...'-->
				<div style='width:30%; float:left; height:200px;'>
					<img src='".$profile_pic."' style=' height:200px; width: 200px; margin:0% 15%'/>
				</div>
				<div style='width:70%; height:120px; float:right; line-height:100px;'>
					<span style='vertical-align:middle; display:inline-block; font-size:70px;'>"
					.$user_nama_user
					."
					</span>
				</div>
				<div>
					<pre>"
						.$user_tentang
					."</pre>
					<a href='cv_maker/index.html' target='_blank'>Edit CV</a>
				</div>
				<div style='clear:both'>
				</div>
			</div>
			<div id='content_user'>
			<div class='buat_kiriman'>
				<form action='buat_kiriman.php' method='POST'  enctype='multipart/form-data' style='width94%; margin:20px 3% 0px;'>			<!--BUAT KIRIMAN-->
					<div class='isi_draft_kiriman'>
						<textarea name='isi_kiriman' style='width:99%; height:100px; resize:none; font-family: Arial, Helvetica, sans-serif;'>Bagikan sesuatu...</textarea>
						Tambah foto <input type=file name='foto_kiriman'/>
					</div>
					<input type='submit' value='Bagikan'/>
				</form>
			</div>	
			<!--ISI POST-->";
				require "kiriman_pribadi.php";
			echo
			"
			</div>
		";
	}
?>