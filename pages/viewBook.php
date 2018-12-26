<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

$lihatbuku = $dbs->prepare('SELECT * FROM buku WHERE nomor_panggil = :nomor_panggil');
$lihatbuku->execute(array(':nomor_panggil' => $_GET['nopang']));
$baris = $lihatbuku->fetch();

//Jika buku tidak ada, alihkan pengguna ke beranda
if($baris['nomor_panggil'] == '')
{
    header('Location: ./');
    exit();
}

$page_title = $baris['judul_buku'];
include('header.php');
include('navbar.php');
?>
<body>
  <div class="py-5 text-center section-parallax" style="background-image: url(&quot;http://hdqwalls.com/wallpapers/christopher-robin-2018-movie-poster-3r.jpg&quot;);">
    <div class="container-fluid">
      <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
        <div class="mx-auto col-md-10 p-3">
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
      <!-- Untuk kolom disamping
           Rencananya untuk daftar isi.
        <div class="col-md-4">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center"> Cras justo odio <span class="badge badge-primary badge-pill">14</span> </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> Dapibus ac facilisis in <span class="badge badge-primary badge-pill">2</span> </li>
            <li class="list-group-item d-flex justify-content-between align-items-center"> Morbi leo risus <span class="badge badge-primary badge-pill">1</span> </li>
          </ul>
        </div>
        -->
        <div class="col-md-10 mx-auto">
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

                    // ambil tahunnya saja
                      // contoh dari 2018-05-02 menjadi 2018 saja
                    $tahun = date("Y", strtotime($baris['tahun_terbit']));
                    echo "<p class='card-text'>".$tahun."</p>";
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
                    
                    if(isset($_SESSION['masuk']) && $_SESSION['masuk']==true && $_SESSION['Level_Akses']=='Anggota' && $baris['status_buku']=='1')
                    {
                      
                      echo "<button data-toggle='modal' data-target='#pinjamModal' data-id='".$baris['nomor_panggil']."' id='pinjam' class='btn btn-outline-primary btn-lg'> Pinjam</button>";
                      
                      /*
                      echo "<a name='pinjamBtn' id=".$baris['id_buku']."' class='btn btn-primary btn-lg' view_data'>Pinjam</a>";
                      */

                      //include("pinjam.php");
                      include_once("pinjamModal.php");
                      echo "</div>";
                    } else
                    {
                      // Nothing happened lel
                    }
                //echo "</div>";
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
        <div class="col-md-12">
          <h3 class="text-center">Buku Salinan&nbsp;<span class="badge badge-light"> Baru</span></h3>
          <hr class="bg-primary">
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Buku</th>
                  <th scope="col">Tahun Terbit</th>
                  <th scope="col">ISBN</th>
                  <th scope="col">Nomor Panggil</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Earthfall</td>
                  <td>2014</td>
                  <td>192018662</td>
                  <td>CA-110</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                  <td>Earthfall</td>
                  <td>2014</td>
                  <td>121309080</td>
                  <td>CA-111</td>
                </tr>
                <tr>
                  <<th scope="row">3</th>
                  <td>Earthfall</td>
                  <td>2014</td>
                  <td>648273001</td>
                  <td>CA-112</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
<script>
  $(document).ready(function(){
	
	$(document).on('click', '#pinjam', function(e){
		
		e.preventDefault();
		
		var uid = $(this).data('id');   // it will get id of clicked row
		
		$('#dynamic-content').html(''); // leave it blank before ajax call
		$('#modal-loader').show();      // load ajax loader
		
		$.ajax({
			url: 'pinjam.php',
			type: 'POST',
			data: 'id='+uid,
			dataType: 'html'
		})
		.done(function(data){
			console.log(data);	
			$('#dynamic-content').html('');    
			$('#dynamic-content').html(data); // load response 
			$('#modal-loader').hide();		  // hide ajax loader	
		})
		.fail(function(){
			$('#dynamic-content').html('<i class="fa fas-info"></i> Something went wrong, Please try again...');
			$('#modal-loader').hide();
		});
		
	});
	
});
</script>

<?php
include('footer.php');

/* tutup koneksi */
mysqli_close($con)
?>
