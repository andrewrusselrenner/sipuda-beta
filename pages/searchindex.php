<div class="py-5 text-center section-parallax" style="background-image: url(&quot;http://hdqwalls.com/wallpapers/christopher-robin-2018-movie-poster-3r.jpg&quot;);">
  <div class="container-fluid">
    <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
      <div class="mx-auto col-md-6 p-3">
        <h1>Hasil Pencarian</h1>
        <?php echo "<p class='mb-12'>Temukan buku dengan kata kunci &quot;".$query."&quot; dikatalog perpustakaan disini! Hasil pencarian ada dibawah ya! ;) </p>";
      echo "</div>";
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
  <div class="py-2 px-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
            <h2>Hasil Pencarian</h2>
            <?php
                //menghitung jumlah data yang ditemukan di db
                $rowcount = $raw_results->num_rows;

                printf("Ditemukan %d hasil pencarian.\n",$rowcount);
            ?>
        </div>
      </div>
      <hr style="width: 100%;" />
    </div>
  </div>
  <?php 
  include($_SERVER['DOCUMENT_ROOT'].'/config/timeago-function.php');
  // jika salah satu atau lebih baris cocok, eksekusi kode perulangan di while dibawah ini
  if(mysqli_num_rows($raw_results) > 0)
  {           
    // $results = mysql_fetch_array($raw_results) 
    // itu maksudnya taro data dari db ke array.
    while($results = mysqli_fetch_array($raw_results, MYSQLI_ASSOC))
    { //kalo valid, kodenya akan melakukan perulangan
  ?>
  <div class="py-2 px-3">
    <div class="container-fluid">
      <div class="row">
        <!--<div class="col-md-4">
        </div>-->
        <div class="col-md-8">
          <div class="card">
            <div class="row no-gutter">
              <div class="col-auto">
                <?php
                // the CardView, tolong rapiin ya ;)
                echo "<img alt=Card image cap' class='img-fluid' src=".$results['gambar']." style='	height: 405px;'>";
                echo "</div>";
                  echo "<div class='col'>";
                    echo "<div class='card-block px-2 flex-column'>";
                      echo "<h3 class='card-title'>".$results['judul_buku']."</h3>";
                      echo "<p class='card-text'>".$results['pengarang']."</p>";
                      // ambil tahunnya saja
                      // contoh dari 2018-05-02 menjadi 2018 saja
                      $tahun = date("Y", strtotime($results['tahun_terbit']));
                      echo "<p class='card-text'>".$tahun."</p>";
                      echo "<br class='card-text' />";

                      //mengconvert dari angka ke string
                      if($results['status_buku'] == '0')
                      {
                        $status_buku = 'Sedang Dipinjam';
                      }
                      else if($results['status_buku'] == '1')
                      {
                        $status_buku = 'Tersedia';
                      }
                      else if($results['status_buku'] == '2')
                      {
                        $status_buku = 'Hilang';
                      }
                      else
                      {
                        $status_buku = 'Tidak diketahui keadaannya';
                      }

                      echo "<h4 class='card-text'>".$status_buku."</h4>";
                      echo "<br class='card-text' />";
                      echo "<br class='card-text' />";
                      echo "<br class='card-text' />";
                      echo "<a href='viewBook?nopang=".$results['nomor_panggil']."' class='btn btn-outline-primary btn-lg'>Detil Buku</a>";
                    echo "</div>";
                  echo "</div>";
                echo "</div>";
                echo "<div class='card-footer w-100 text-muted'>";
                  echo "<p class='text-left'>";
                  echo "Dimodifikasi ";
                  echo timeago($results['tgl_perubahan']);
                  echo "<span class='float-right'>".$results['numofcopies']." Buku Yang Sama Lainnya Tersedia.</span>";
                  echo "</p>";
                echo "</div>"
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 <?php
    }
             
  }
else
  { // jika gak ketemu sama sekali
    echo "<h4 class='text-md-center display-1'>Pencarian tidak ditemukan :(. Coba lagi dengan kata kunci yang lain.</h4>";
  }
?>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3 py-2">
            <ul class="pagination mx-auto text-center">
              <li class="page-item"><a class="page-link" href=<?php echo "search?q=".$query."&pageno=1"; ?>>Awal</a></li>
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "search?q=".$query."&pageno=".($pageno - 1); } ?>">Sebelumnya</a>
              </li>
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo  "search?q=".$query."&pageno=".($pageno + 1); } ?>">Selanjutnya</a>
              </li>
              <li class="page-item"><a class="page-link" href=<?php echo "search?q=".$query."&pageno=".$total_pages; ?>">Akhir</a></li>
            </ul>
        </div>
    </div>
</div>
