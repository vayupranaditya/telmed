<?PHP
	require "data_akun_masuk.php";
	$buat_kiriman=
					"
					<div class='buat_kiriman'>
						<div class='isi_draft_kiriman'>
						<form action='buat_kiriman.php' method='POST' enctype='multipart/form-data'>			<!--BUAT KIRIMAN-->
							<textarea name='isi_kiriman' style='width:100%; height:100px; resize:none; font-family: Arial, Helvetica, sans-serif;'>Bagikan sesuatu...</textarea>
							Tambah foto <input type='file' name='foto_kiriman'/>
							</div>
							<input type='submit' value='Bagikan'/>
						</form>
					</div>	
					";
	function
		tampilkan_kiriman()
				{
					require 'tampilkan_kiriman.php';
				};

	if ($akun["id_user"]==1)	/*ID akun tamu*/				//TULIS ISI HALAMAN TAMU DI BAWAH
	{
		tampilkan_kiriman();
	}
	else												//TULIS ISI HALAMAN USER DI BAWAH
	{
		echo
			$buat_kiriman;
		tampilkan_kiriman();
	}
?>