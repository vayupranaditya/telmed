<?php
    session_start();
    if (isset($_SESSION["logged_in"]) AND $_SESSION["logged_in"]==true)
    {
        header("location:home.php");
    }
    else
    {
        echo
            "
                <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
                <html xmlns='http://www.w3.org/1999/xhtml'>
                <head>
                <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
                <title>Telkom Media</title>
                <link rel='icon' href='images/favicon_1.png' type='image'/>
                <link href='css/index.css' rel='stylesheet' type='text/css' />
                <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css' />
                </head>

                <body>
                	<div class='index_atas'>
                    	<div class='tulisan_telmed pull-left'>
                        	Telkom University Media
                        </div>
                        <div class='login_form pull-right'>
                        	<form action='logging_in.php' method='POST'>
                            	Email <input type='email' name='email' /> <br />
                                Password <input type='password' name='password' /> <br />
                                <input type='submit' value='Login' />
                            </form>
                        </div>
                    </div>
                    <div class='index_bawah'>
                    	<div class='bawah_kiri pull-left'>
                        	<div class='tentang_telmed'>
                                <span style='font-size:5vh; opacity:1;'>Tel-Med</span><br>
                                <br>
                                <span style='font-size:3vh; opacity:1;'>Merupakan jejaring sosial khusus masyarakat Telkom University. Tel-Med hadir sebagai wadah bagi masyarakat Telkom University, khususnya mahasiswa dan mahasiswi, untuk saling bercengkrama, berbagi ilmu, bahkan membagikan jasa.
                            </div>
                        </div>
                        <div class='bawah_kanan pull-right'>
                        	<span style='font-size: 3vh'>Belum memiliki akun? Bergabunglah sekarang! <b>GRATIS!</b></span><br>
                            <br>
                            <form action='daftarkan_akun.php' method='POST'>
                            	Nama Lengkap <input type='text' name='nama_lengkap' /><br />
                                Alamat Email <input type='email' name='email'/><br>
                                Password <input type='password' name='password'><br>
                                <input type='submit' name='Daftar'><br>
                            </form>
                            <br>
                            Belum tertarik bergabung? Coba Tel-Med dengan masuk sebagai <a href='logintamu.php'>tamu</a>
                        </div>
                    </div>
                </body>
                </html>
            ";
    }
?>