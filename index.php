<?php
include_once('config.php');

$sql = "SELECT * FROM online";
$response = mysqli_query($conn, $sql);
$pemakai = mysqli_fetch_array($response);

$username = $pemakai['username'];
$password = $pemakai['password'];

//bilang pengguna aktif
if ($pemakai) {
    $ada = 1;
}

?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Lipstik Waradah Cosmetic</title>
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <link type="text/css" rel="stylesheet" href="css/halamannyala.css">
</head>

<body>
<marquee>Selamat Datang di Lipstic Wardah Cosmetic, semoga anda senang dengan layanan dan produk kami</marquee>

<a href="index.php">
    <header class="top">
        <img src="images/wardah-logo.png" width="50%">
    </header>
</a>


<nav>
    <ul>
        <li class="selected"><a href="index.php"><span class="disni">Home</span></a></li>
        <li><a href="kontak.php">Kontak Kami</a></li>
        <?php
        if ($ada == 1) {
            echo "
            <li><a href=\"member.php\">$username</a></li>
            <li><a href=\"keluar.php\">Keluar</a></li>
            ";
        } else {
            echo "
                <li><a href=\"login.php\">Masuk</a></li>
            ";
        }
        ?>
    </ul>
</nav>

<div id="tableContainer">
    <div id="tableRow">



        <section id="home">
            <article>
                <div id="kepalaIsi">
                    <p class="selamat">
                        List Produk Lipstic Wardah Cosmetic......
                <div id="kotak">

                    <?php

                    $index = 0;
                    $column = -1;

                    require_once('config.php');
                    $sql = "SELECT * FROM produk";
                    $response = @mysqli_query($conn, $sql);

                    // ekstraks evry line
                    while($row = mysqli_fetch_array($response)) {
                        $kode_produk[$index] = $row['Kode_produk'];
                        $kode_warna[$index] = $row['kode_warna'];
                        $merk[$index] = $row['merk'];
                        $jenis[$index] = $row['jenis'];
                        $netto[$index] = $row['netto'];
                        $images[$index] = $row['gambar_produk'];
                        $index++;
                    }
                    
                    
                    // menghitung isi table
                    $response = @mysqli_query($conn, $sql);                    
                    $jumlah = 0;
                    while ($hitung = mysqli_fetch_array($response)) {
                            $jumlah++;
                    }
                    //
                    $diprint = $jumlah / 2;

                    // print each item sale
                    for($row = 1; $row <=$diprint; $row++) {
                        $column++;
                        echo "
                                    <div id=\"baris\">
                						<div id=\"item1\">
                							<a class=\"menuju\" href=\"showproduk.php?id=$kode_produk[$column]\">
		    		            				<img src=" . $images[$column] . " width=\"150px\">
				    				            <p>$jenis[$column]</p>
						    	             </a>
						                </div>
						     ";
                        $column++;
                        echo "
                        
            						    <div id=\"item2\">
						            	    <a class=\"menuju\" href=\"showproduk.php?id=$kode_produk[$column]\">
								                <img src=" . $images[$column] . " width=\"150px\">
								                <p>$jenis[$column]</p>
							                </a>
						                </div>
						             </div>
		    				        <br>
                            ";


                    }
                            if ($jumlah % 2 != 0) {
                                $column++;
                                echo "
                                    <div id=\"baris\">
                						<div id=\"item1\">
                							<a class=\"menuju\" href=\"showproduk.php?id=$kode_produk[$column]\">
		    		            				<img src=" . $images[$column] . " width=\"150px\">
				    				            <p>$jenis[$column]</p>
						    	             </a>
						                </div>
                                    </div>
						     ";
                            }
                    mysqli_close($conn);
                    ?>
                </div>
            </article>
        </section>

        <aside>
            <h1 class="promoj">
                SHOWLIST
            </h1>

                <div class="populer">
                    <img src="images/iklan1.jpg"
                         alt="populer2" width="100%"
                    >
                </div>

                <div class="populer">
                    <img src="images/iklan2.jpg"
                         alt="populer2" width="100%">
                </div>

                <div class="populer">
                    <img src="images/iklan3.jpg"
                         alt="populer2" width="100%">
                </div>

                <div class="populer">
                    <img src="images/ilkan.jpg"
                         alt="populer2" width="100%">
                </div>
            </a>
        </aside>
    </div>
</div>

<footer>
    &copy; Lipstic Wardah Cosmetic
    <br>
   2016.
</footer>


</body>
