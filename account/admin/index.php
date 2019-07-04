<?php
/*
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

if(isset($_SESSION['masuk']) && $_SESSION['masuk']==true && $_SESSION['Level_Akses']=='Admin')
{
    */

include_once('index-engine.php');

if(isset($_SESSION['masuk']) && $_SESSION['masuk']==true && $_SESSION['Level_Akses']=='Admin')
{
$page_title = 'Pustakawan';
include(ROOT_PATH.'/pages/header.php');
include(ROOT_PATH.'/pages/navbar.php');
?>
<body>
<div class="py-5 text-center section-parallax" style="background-image: url(&quot;<?php echo $coverbkg ?>&quot;);">
    <div class="container-fluid">
        <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
            <div class="mx-auto col-md-6 p-3">
                <h1>Selamat Datang <?php echo $namadpn ?></h1>
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
                      <img class="img-fluid d-block rounded-circle w-100" src="<?php echo $ava ?>" style="height: 230px; width: 230px;">
                    </div>
                    <div class="col-md-8">
                    <h1><?php echo $namadpn ?></h1>
                      <h2><?php echo $namablkg ?></h2>
                      <br>
                      <p><?php echo $surel ?></p>
                      <p><?php echo $gender ?></p>
                      <p><?php echo $job ?></p>
                      <p>Terdaftar <?php echo timeago($tglbuat); ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tabtwo" role="tabpanel">
                <div class="col-md-12">
                  <ul class="nav nav-tabs">
                    <li class="nav-item"> <a href="" class="active nav-link" data-toggle="pill" data-target="#tabbuku"><i class="fas fa-book"></i> Buku</a>
                    </li>
                    <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabpinjam"><i class="fas fa-receipt"></i> Peminjaman</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="" data-toggle="pill" data-target="#tabfours"><i class="fas fa-users"></i> Anggota</a>
                    </li>
                    <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabfives"><i class="fas fa-edit"></i> Post</a>
                    </li>
                  </ul>
                  <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="tabbuku" role="tabpanel">
                    <div class="py-3 px-3">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-12 d-flex align-items-center justify-content-between my-2">
                              <a href="/pages/catalog" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-book-reader"></i> Detil Pustaka
                              </a>
                              <a href="" data-toggle="modal" data-target="#tambahbuku" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-plus"></i> Tambah Buku
                              </a>
                              <?php
                              include_once("buku/tambahbuku.php");
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="bukutable"></div>
                    </div>
                    <div class="tab-pane fade" id="tabpinjam" role="tabpanel">
                      <div class="py-3 px-3">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-12 d-flex align-items-center justify-content-between my-2">
                              <a href="" data-toggle="modal" data-target="#tambahpinjam" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-plus"></i> Tambah Peminjaman
                              </a>
                              <?php
                              include_once("peminjaman/tambahpinjam.php");
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="pinjamtable"></div>
                    </div>
                    <div class="tab-pane fade" id="tabfours" role="tabpanel">
                      <div class="py-3 px-3">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-12 d-flex align-items-center justify-content-between my-2">
                              <a href="" data-toggle="modal" data-target="#tambahanggota" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-plus"></i> Tambah Anggota
                              </a>
                              <?php
                              //include_once("anggota/tambahanggota.php");
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="anggotatable"></div>
                    </div>
                    <div class="tab-pane fade" id="tabfives" role="tabpanel">
                      <p class="">Maaf, belum dapat menampilkan post. Fitur akan datang di versi terbaru.</p>
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
include_once('script.php');
include(ROOT_PATH.'/pages/footer.php');
}
else if($_SESSION['Level_Akses']=='Anggota')
{
  header("location: /account/index");
}
else
{
  header("location:" . BASE_URL);
}
?>