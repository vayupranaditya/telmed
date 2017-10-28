<?php
	$activation_key=$_GET["master"];
	$activation_key_input=$_GET["key"];
	if ($activation_key_input === $activation_key)
	{
		echo "Aktifasi berhasil!";
	}
	else
	{
		echo "Aktifasi gagal!";
	}
?>