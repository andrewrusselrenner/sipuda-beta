<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/db_conn.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

$lihatbuku = $db->prepare('SELECT * FROM buku WHERE nomor_panggil = :nomor_panggil');
$lihatbuku->execute(array(':nomor_panggil' => $_GET['nopang']));
$baris = $lihatbuku->fetch();

//Jika buku tidak ada, alihkan pengguna ke beranda
if($baris['nomor_panggil'] == '')
{
    header('Location: ./');
    exit;
}

include('header.php');
include('navbar.php');
?>
<body>
  <div class="py-5 text-center section-parallax" style="background-image: url(&quot;http://hdqwalls.com/wallpapers/christopher-robin-2018-movie-poster-3r.jpg&quot;);">
    <div class="container-fluid">
      <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
        <div class="mx-auto col-md-6 p-3">
        <?php  
          echo "<h1>".$baris['judul_buku']."</h1>";
          echo "<p class='mb-12'>".$baris['deskripsi_singkat']."</p>";
        ?>
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
             include('breadcrumb.php');
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="py-3 px-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center"> Cras justo odio <span class="badge badge-primary badge-pill">14</span> </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> Dapibus ac facilisis in <span class="badge badge-primary badge-pill">2</span> </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> Morbi leo risus <span class="badge badge-primary badge-pill">1</span> </li>
          </ul>
        </div>
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="row no-gutter">
              <div class="col-auto">
                  <?php
                  // impor fungsi timeago()
                  include($_SERVER['DOCUMENT_ROOT'].'/config/timeago-function.php');
                  
                  // the CardView, tolong rapiin ya ;)
                  echo"<img alt='Card image cap' class='img-fluid' src=".$baris['gambar']." style='	height: 405px;'>";
              echo "</div>";
              echo "<div class='col-4'>";
                echo "<div class='card-block px-2 flex-column'>";
                    echo "<h3 class='card-title'>".$baris['judul_buku']."</h3>";
                    echo "<p class='card-text'>".$baris['pengarang']."</p>";
                    echo "<p class='card-text'>".$baris['tahun_terbit']."</p>";
                    echo "<br class='card-text' />";

                    //mengconvert dari angka ke string
                    if($baris['status_buku'] == '0')
                    {
                      $status_buku = 'Sedang Dipinjam';
                    }
                    else if($baris['status_buku'] == '1')
                    {
                      $status_buku = 'Tersedia';
                    }
                    else if($baris['status_buku'] == '2')
                    {
                      $status_buku = 'Hilang';
                    }
                    else
                    {
                      $status_buku = 'Tidak diketahui keadaannya';
                    }

                    echo "<h4 class='card-text'>".$status_buku."</h4>";
                    echo "<br class='card-text' />";
                    echo "<p class='card-text'>Terdapat ".$baris['lbr_halaman']." halaman dibuku ini.</p>";
                    echo "<p class='card-text'><i>".$baris['kategori']."</i></p>";

                    echo "<a href='pinjam.php?action=".$baris['id_buku']."' class='btn btn-outline-primary btn-lg'>Pinjam</a>";
                echo "</div>";
                echo "</div>";
            echo "<div class='col-4'>";
                echo "<div class='card-block px-2 flex-column'>";
                    echo "<p class='card-text'><strong>Nomor Panggil</strong><br />".$baris['nomor_panggil']."</p>";
                    echo "<p class='card-text'><strong>Nomor ISBN</strong><br />".$baris['isbn']."</p>";
                    echo "<p class='card-text'><strong>Penerbit</strong><br />".$baris['penerbit']."</p>";
                    echo "<p class='card-text'><strong>Jenis Bahan</strong><br />".$baris['jenis_bahan']."</p>";
                    echo "<br class='card-text' />";
                        
                    if(!$baris['konten_digital'] == '' || !$baris['konten_digital'] == 'NULL')
                    {
                        echo "<p class='card-text'>";
                        echo "<strong>Konten Digital</strong>";
                        echo "<br />Tidak Ada Konten Digital</p>";
                    }
                    else
                    {
                        echo "<p class='card-text'>";
                        echo "<strong>Konten Digital</strong>";
                        echo "<br />Ada</p>";
                    }
                echo "</div>";
            //echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='card-footer w-100 text-muted'>";
              echo "<p class='text-left'>";
              echo "Dimodifikasi ";
              echo timeago($baris['tgl_perubahan']);
              echo "<span class='float-right'>".$baris['numofcopies']." Buku Yang Sama Lainnya Tersedia.</span>";
              echo "</p>";
            echo "</div>";
        echo "</div>";
        echo "<br>";
                  ?>                
        
      </div>
    </div>
      <div class="row my-5">
        <div class="col-md-6">
            
          <h3 class="text-center">Checkout History&nbsp;<span class="badge badge-light"> New</span></h3>
          <hr class="bg-primary">
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-6">
          <h3 class="text-center">On Hold&nbsp;<span class="badge badge-light"> New</span></h3>
          <hr class="bg-primary">
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="text-center mx-auto col-lg-8 col-10">
          <h1 class="mb-3">Carousel</h1>
          <div id="carousel1" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
            <div class="carousel-inner">
              <div class="carousel-item active"> <img class="d-block w-100" src="https://static.pingendo.com/cover-moon.svg"> </div>
              <div class="carousel-item"> <img class="d-block w-100" src="https://static.pingendo.com/cover-bubble-light.svg"> </div>
              <div class="carousel-item"> <img class="d-block w-100" src="https://static.pingendo.com/cover-bubble-dark.svg"> </div>
            </div>
            <ol class="carousel-indicators">
              <li data-target="#carousel1" data-slide-to="0" class="active"> </li>
              <li data-target="#carousel1" data-slide-to="1"> </li>
              <li data-target="#carousel1" data-slide-to="2"> </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include('footer.php');

/* tutup koneksi */
mysqli_close($con)
?>
