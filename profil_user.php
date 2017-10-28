<?php
	require "koneksi_ke_mysql.php";
	require "data_akun_masuk.php";
	if (!isset($_GET["profil"]))
	{
		header("location:home.php");
	}
	else
	{
		$id_user=$_GET["profil"];
		$selected_user = mysqli_query($link, "SELECT * FROM ".$db_tabel_user." WHERE id_user = ".$id_user);
		if(mysqli_affected_rows($link) === 0)
		{
			header("location:home.php");
		}
		else
		{
			$user = mysqli_fetch_array($selected_user, MYSQLI_ASSOC);
			$user_id_user=$user["id_user"];
			$user_nama_user=$user["nama_lengkap"];
			$user_tentang=$user["tentang"];
			$profile_pic="images/profile_pic/".$user["foto_profil"];
		}
	}
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
				<a href='cv_viewer/index.php?user_id=$user_id_user' target='_blank'>View CV</a>
			</div>
			<div style='clear:both'>
			</div>
		</div>
		<div id='content_user'>
		<!--ISI POST-->";
			require "kiriman_user.php";
		echo
		"
		</div>
	";
?>