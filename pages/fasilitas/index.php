<?php 
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

$page_title = 'Fasilitas';
include(ROOT_PATH.'/pages/header.php');
?>
<body>
    <?php include(ROOT_PATH.'/pages/navbar.php'); ?>
      <!-- gambar header -->
      <div class="py-5 text-center section-parallax" style="background-image: url(&quot;<?php echo $coverbkg ?>&quot;);">
        <div class="container-fluid">
            <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
                <div class="mx-auto col-md-6 p-3">
                    <h1>Fasilitas Perpustakaan</h1>
                    <p class='mb-12'>Anda dapat melihat rincian fasilitas yang ada di perpustakaan pada halaman ini</p>
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
        <div class="col-lg-12 col-md-12">
            <!-- fasilitas pertama -->
            <div class="row my-5 bg-primary" >
                <div class="p-4 col-md-6 align-self-center">
                    <p class="mb-1">Nyaman bagi pembaca</p>
                    <h2 class="">Ruang Baca</h2>
                    <p class="my-3">Suasana yang tenang dan nyaman dilengkapi fasilitas seperti ac.</p>
                </div>
            <div class="p-0 col-md-6">
                <div class="carousel slide" data-ride="carousel" id="carousel1">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid w-100" src="https://library.un.org/sites/library.un.org/files/styles/content_image_style/public/2nd_floor_reading_room.png?itok=kJGtOu6M" atl="first slide">
                            <div class="carousel-caption">
                            <h3>Ruang Baca 1</h3>
                            <p>Ambil Satu dan Baca</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="https://merl.reading.ac.uk/wp-content/uploads/sites/20/2017/04/img-fullwidth-reading-room-a.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                            <h3>Ruang Baca 2</h3>
                            <p>Beri makan otakmu dengan Baca Buku</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="https://www.columbuslibrary.org/sites/default/files/uploads/images/Main%20Library%20Reading%20Room.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                            <h3>Ruang Baca 3</h3>
                            <p>Saya cinta buku</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                    <a class="carousel-control-next" href="#carousel1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                </div>
            </div>
            </div>
            <!-- fasilitas kedua -->
            <div class="row my-5 bg-primary" >
                <div class="p-4 col-md-6 align-self-center">
                    <p class="mb-1">Komputer memudahkan suatu pekerjaan manusia</p>
                    <h2 class="">Ruang Komputer</h2>
                    <p class="my-3">Segala jenis ruang yang berisi instalasi komputer baik tunggal maupun jaringan.</p>
                </div>
            <div class="p-0 col-md-6">
                <div class="carousel slide" data-ride="carousel" id="carousel2">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid w-100" src="http://www.fsb.miamioh.edu/fsb/content/offices/technology/labs/2037.JPG" atl="first slide">
                            <div class="carousel-caption">
                            <h3>Ruang Komputer 1</h3>
                            <p>Komputer merupakan alat yang sangat penting saat ini.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="https://www.extron.com/img/mktg/open_graph/computerlabdesign.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                            <h3>Ruang Komputer 2</h3>
                            <p>Komputer memudahkan pekerjaan manusia sehari-hari</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="https://web-apps.communication.utexas.edu/usher/assests/facilities/photos/cma4138_9315_2015_main.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                            <h3>Ruang Komputer 3</h3>
                            <p>Komputer adalah sumber ilmu selain buku</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel2" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                    <a class="carousel-control-next" href="#carousel2" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                </div>
            </div>
            </div>
            <!-- fasilitas ketiga -->
            <div class="row my-5 bg-primary" >
                <div class="p-4 col-md-6 align-self-center">
                    <p class="mb-1">Anak merupakan generasi penerus bangsa</p>
                    <h2 class="">Ruang Baca Anak</h2>
                    <p class="my-3">Ruangan baca khusus untuk anak-anak</p>
                </div>
            <div class="p-0 col-md-6">
                <div class="carousel slide" data-ride="carousel" id="carousel3">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid w-100" src="http://www.johnsoncountypubliclibrary.org/img/kidsroom2.jpg" atl="first slide">
                            <div class="carousel-caption">
                            <h3>Ruang Anak 1</h3>
                            <p>Pendidikan pada usia dini merupakan hal yang sangat penting</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="http://cumberlandiowa.com/wp-content/uploads/2013/07/Cumberland-Library-5.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                            <h3>Ruang Anak 2</h3>
                            <p>Dengan membaca dapat membuat pikiran anak menjadi lebih kreatif</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid w-100" src="http://www.greenlifestylechanges.com/wp-content/uploads/2014/01/library-of-congress-1280x825-600x386.jpg" data-holder-rendered="true">
                            <div class="carousel-caption">
                            <h3>Ruang Anak 3</h3>
                            <p>Berikan ilmu yang bermanfaat kepada anak-anak</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carousel3" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
                    <a class="carousel-control-next" href="#carousel3" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
                </div>
            </div>
            </div>
            <hr>
        </div>
      </div>
    </div>
  </div>
  <?php 
  include(ROOT_PATH.'/pages/footer.php');