<?PHP
	session_start();
	if (!isset($_SESSION["logged_in"]) OR $_SESSION["logged_in"]==false)
	{
		echo "Hi!".$_SESSION["email"];
	}
	else
	{
		echo "Get out!";
	}
?>