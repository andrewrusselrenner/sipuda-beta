<?php
/*
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

if(isset($_SESSION['masuk']) && $_SESSION['masuk']==true && $_SESSION['Level_Akses']=='Admin')
{
    */

require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

$page_title = 'Pustakawan';
include(ROOT_PATH.'/pages/header.php');
include(ROOT_PATH.'/pages/navbar.php');
?>
<body>
<div class="py-5 text-center section-parallax" style="background-image: url(&quot;http://hdqwalls.com/wallpapers/christopher-robin-2018-movie-poster-3r.jpg&quot;);">
    <div class="container-fluid">
        <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
            <div class="mx-auto col-md-6 p-3">
                <h1>Selamat Datang Kenneth!</h1>
                <p class='mb-12'>Sebagai pustakawan, Anda dapat mengelola pustaka perpustakaan disini.</p>
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
<div class="py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 px-2">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item"> <a href="" class="nav-link active show" data-toggle="pill" data-target="#tabone">Profil</a> </li>
            <li class="nav-item"> <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo">Manajemen Pustaka</a> </li>
            <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree">Pengaturan</a> </li>
          </ul>
        </div>
        <div class="col-md-8 x-2">
          <div class="col-auto">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="tabone" role="tabpanel">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-4">
                      <img class="img-fluid d-block rounded-circle w-100" src="https://junglove.net/wp-content/uploads/2017/08/c7f1d4263ff000681dc9cc755fe943b4-600x600.jpg">
                    </div>
                    <div class="col-md-8">
                      <h1 class="">Kenneth</h1>
                      <h2 class="">Robinson</h2>
                      <br>
                      <p>kenneth@microsoft.com</p>
                      <p>Laki-Laki</p>
                      <p>Pustakawan</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tabtwo" role="tabpanel">
                <div class="col-md-12">
                  <ul class="nav nav-tabs">
                    <li class="nav-item"> <a href="" class="active nav-link" data-toggle="pill" data-target="#tabtwos"><i class="fa fa-book"></i> Buku</a>
                    </li>
                    <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabthrees"><i class="fas fa-receipt"></i> Peminjaman</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="" data-toggle="pill" data-target="#tabfours"><i class="fa fa-users"></i> Anggota</a>
                    </li>
                    <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabfives"><i class="fa fa-key"></i> Ganti Kata Sandi</a>
                    </li>
                  </ul>
                  <div class="tab-content mt-2">
                    <div class="tab-pane fade" id="tabtwos" role="tabpanel">
                      <?php include('test/buku.php') ?>
                    </div>
                    <?php include('test/tambahbuku.php') ?>
                    <a href="test/tambahbuku.php" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#tambahbuku">Tambah</a>
                    
                  </div>
                    <div class="tab-pane fade" id="tabthrees" role="tabpanel">
                      <p class="">When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface.</p>
                    </div>
                    <div class="tab-pane fade" id="tabfours" role="tabpanel">
                      <p class="">Isi tab 4</p>
                    </div>
                    <div class="tab-pane fade" id="tabfives" role="tabpanel">
                      <p class="">Isi tab 5</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade py-4" id="tabthree" role="tabpanel">
                <h3 class="display-4">Maaf! Sementara ini fitur belum dapat digunakan.</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?php
include(ROOT_PATH.'/pages/footer.php');
?>