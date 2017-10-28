<?PHP
	$pembuka_halaman=
				"<h1>Tamu - Tel-Med</h1>";
	$logout=
				"<form action='logout.php' method='POST'>
					<input type='submit' value='Keluar'/>
				</form>";
	function
			tampilkan_kiriman()
			{
				require "tampilkan_kiriman.php";
			}
	
				//TULIS ISI HALAMAN DI BAWAH
	echo
		$pembuka_halaman.
		$logout;
	tampilkan_kiriman();
?>