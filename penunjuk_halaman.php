<?PHP
	if (isset($_GET["halaman"]))
	{
		$halaman=$_GET["halaman"];
		$target=$halaman.".php";
		header("location:".$target);
	}
	else
	{
		header("location:isi_kiriman.php");
	}
?>