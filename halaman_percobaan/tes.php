<?php
	$lower_string="a b c d e f g h i j k l m n o p q r s t u v w x y z ";
	$upper_string=strtoupper($lower_string);
	$number="0 1 2 3 4 5 6 7 8 9";
	$alphanumeric=$lower_string.$upper_string.$number;
	$exploded_alphanumeric=explode(" ",$alphanumeric);
	$random_alphanumeric=array_rand($exploded_alphanumeric, 1);
	$activation_key_max_length=rand(20,40);
	$activation_key="";
	for ($activation_key_length=0; $activation_key_length<$activation_key_max_length; $activation_key_length++)
	{
		$single_key=$exploded_alphanumeric[array_rand($exploded_alphanumeric, 1)];
		$activation_key=$activation_key.$single_key;
	}
	echo 
	"
	<form action='tes2.php?' method=GET>
		Masukkan kode aktifasi <input type='text' name='key'/>
		<input type='text' name='master' value='".$activation_key."' style='visibility:hidden'><br>
		<input type='submit' value='Aktifasi akun'/>
	</form>
	";
?>