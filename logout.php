<?PHP
	session_start();
	if (isset($_SESSION["logged_in"]) AND $_SESSION["logged_in"]==true)
	{
		$email=$_SESSION["email"];
		session_unset();
		header("location:index.php");
	}
	else
	{
		header("location:index.php");
	}
?>