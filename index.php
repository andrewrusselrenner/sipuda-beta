<?php 
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

$page_title = 'Beranda';
include('pages/header.php'); 
?>
<body>
    <?php include('pages/navbar.php'); ?>
      <!-- gambar header -->
  <div class="py-5 text-center text-md-right section-parallax" style="	background-image: url(&quot;<?php echo $coverbkg ?>&quot;);	background-position: right top;	background-size: cover;	background-repeat: repeat;	background-attachment: fixed;">
    <div class="container">
      <div class="row section-light shadow">
        <div class="p-5 mx-auto mx-md-0 ml-md-auto col-10 col-md-9">
          <h3 class="display-3">Selamat Datang di SIPUDA!</h3>
          <p class="mb-3 lead">SIPUDA merupakan portal perpustakaan daring untuk mempermudah anggota perpustakaan dalam mencari dan meminjam buku tanpa harus mencari secara manual. Selamat menikmati! </p>
        </div>
      </div>
    </div>
  </div>
  <div class="py-2">
    <div class="container-fluid" style="	max-height: 78px;">
      <div class="row justify-content-md-center">
        <h1 class="display-1 text-center" contenteditable="false">Mulai Petualanganmu!</h1>
        <div class="col-lg-10 col-md-10">
          <form action="pages/search" method="GET" >
          <div class="input-group search-box">
            <i class="fa fa-search fa-2x shadow"></i>
            <input type="search" class="form-control align-items-center text-dark text-center shadow" name="q" placeholder="Cari buku berdasarkan Judul, ISBN atau Penulis disini..." style="height: 82px; font-size:25px;">
            <!--<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
              <div class="input-group-append"><button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button></div>-->
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php 
  include($_SERVER['DOCUMENT_ROOT'].'/models/newbook.php'); 
  include_once('models/home-post.php');
  include('pages/footer.php'); ?>