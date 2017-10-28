<?php
	session_start();
	require "data_akun_masuk.php";
	if(isset($_FILES['image']))
	{
		$errors= array();
		$file_name = $_FILES['image']['name'];
		$file_size = $_FILES['image']['size'];
		$file_tmp = $_FILES['image']['tmp_name'];
		$file_type = $_FILES['image']['type'];
		$lower_filename = strtolower($file_name);
		$exploded_filename = explode(".", $lower_filename);
		$file_ext = end($exploded_filename);
		$uploaded_filename = "profile_pic_".$akun["id_user"];
		echo $uploaded_filename;
		
		$expensions= array("jpeg","jpg","png");
		
		if(in_array($file_ext,$expensions)=== false)
		{
			$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}
		if($file_size > 2097152) 
		{
			$errors[]='File size must be excately 2 MB';
		}
		  
		if(empty($errors)==true) 
		{
			move_uploaded_file($file_tmp,"halaman_percobaan/images/$uploaded_filename.$file_ext);
			echo "Success";
		}
		else
		{
			print_r($errors);
		}
	}
?>
<html>
   <body>
      
      <form action = "" method = "POST" enctype = "multipart/form-data">
         <input type = "file" name = "image" />
         <input type = "submit"/>
			
         <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
			<li>File: <?php echo $_FILES['image']['tmp_name']; ?>
            <li>File size: <?php $MB = floor($_FILES['image']['size'] / 1048576);
								$MB_B= $MB * 1024*1024;
								$sisa_KB=$_FILES['image']['size']-$MB_B; 
								$KB= floor($sisa_KB / 1024);
								$KB_B = $KB*1024;
								$sisa_B=$sisa_KB-$KB_B;
								echo $MB ." MB ".$KB ." KB ". $sisa_B ." B";?>
			<li>Ukuran file: <?PHP echo $_FILES['image']['size']?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
			<li>File extension: <?php $exploded_filename=explode(".",$_FILES['image']['name']); $ext=end($exploded_filename); echo $ext; ?>
         </ul>
			
      </form>
      
   </body>
</html>