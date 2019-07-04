<?php 
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

$page_title = 'Halaman Profil';
include(ROOT_PATH.'/pages/header.php');
?>
<body>
    <?php include(ROOT_PATH.'/pages/navbar.php'); ?>
      <!-- gambar header -->
      <div class="py-5 text-center section-parallax" style="background-image: url(&quot;<?php echo $coverbkg ?>&quot;);">
        <div class="container-fluid">
            <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
                <div class="mx-auto col-md-6 p-3">
                    <h1>Tentang Sipuda</h1>
                    <p class='mb-12'>Ketahui lebih lanjut tentang SIPUDA.</p>
                </div>
                <?php
                include($_SERVER['DOCUMENT_ROOT'].'/models/searchbar.php');
                ?>
            </div>
        </div>
    </div>
    <div class="py-3 px-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb d-flex flex-row align-items-start w-100">
                        <!-- Kode untuk untuk menampilkan breadcrumb -->
                        <?php 
                        include(ROOT_PATH.'/pages/breadcrumb.php');
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  <div class="py-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 border">
            <h3 class="text-center display-3">Tentang Sipuda</h3>
            <br>
            <blockquote class="blockquote text-center">
                <p class="mb-0"> Sipuda adalah platform aplikasi web yang memudahkan pengunjung perpustakaan dalam mencari buku maupun meminjam buku.</p>
            </blockquote>
            <p class="justify">
            Teknologi Informasi berperan penting dalam memperbaiki kualitas dan kuantitas suatu lembaga pendidikan. Penggunaan teknologi informasi dalam lingkup  tidak hanya sebagai proses otomatisasi terhadap akses informasi, tetapi juga menciptakan akurasi, kecepatan, dan kelegkapan sebuah sistem yang terintegrassi sebagai upaya menciptakan berbagai kemudahan dalam melakukan semua transaksi yang ada diperpustakaan, misalanya proses pendaftaran anggota baru, pemesanan koleksi, peminjaman koleksi, dan pengembalian koleksi perpustakaan. Penerapan sistem basis data di perpustakaan  yang masih menggunakan sistem manual yang semua proses teransaksinya ditulis pada kertas.
            <br> <br>
            Dengan adanya aplikasi perpustakaan yang terkomputerisasi, diharapkan dapat mengatasi permasalahan dan penambahan nilai guna terhadap perpustakaan di , terutama bagi petugas perpustakaan dalam pengolahan data transaksi yang terjadi seperti pendaftaran anggota baru, pemesanan, peminjaman dam pengembalian koleksi serta dalam pembuatan laporan- laporan setiap periodiknya.
            </p>
            <hr>
        </div>
      </div>
    </div>
  </div>
  <?php 
  include(ROOT_PATH.'/pages/footer.php');