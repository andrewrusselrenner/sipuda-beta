<?php
/*
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

if(isset($_SESSION['masuk']) && $_SESSION['masuk']==true && $_SESSION['Level_Akses']=='Admin')
{
    */

include_once('index-engine.php');

$page_title = 'Pustakawan';
include(ROOT_PATH.'/pages/header.php');
include(ROOT_PATH.'/pages/navbar.php');
?>
<body>
<div class="py-5 text-center section-parallax" style="background-image: url(&quot;http://hdqwalls.com/wallpapers/christopher-robin-2018-movie-poster-3r.jpg&quot;);">
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
<p><?php if(isset( $_SESSION['message'])) echo  $_SESSION['message']; ?></p>
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
                    <!--
                    <li class="nav-item">
                      <a href="" class="active nav-link" data-toggle="pill" data-target="#tabones"><i class="fa fa-home"></i> Dasbor</a>
                    </li>
                  -->
                    <li class="nav-item"> <a href="" class="active nav-link" data-toggle="pill" data-target="#tabbuku"><i class="fas fa-book"></i> Buku</a>
                    </li>
                    <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabpinjam"><i class="fas fa-receipt"></i> Peminjaman</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="" data-toggle="pill" data-target="#tabfours"><i class="fas fa-users"></i> Anggota</a>
                    </li>
                    <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabfives"><i class="fas fa-key"></i> Ganti Kata Sandi</a>
                    </li>
                  </ul>
                  <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="tabbuku" role="tabpanel">
                    <div class="py-3 px-3">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-12 d-flex align-items-center justify-content-between my-2">
                              <a href="buku/detailpustaka" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-book-reader"></i> Detil Pustaka
                              </a>
                              <?php
                              //echo "<button data-toggle='modal' data-target='#tambahbuku' data-id='".$nompang."' id='tambahbuku' class='btn btn-outline-primary btn-lg'><i class='fas fa-plus'></i> Tambah Buku</button>";
                              //echo "<div class='modal-container'></div>";

                              //include_once("buku/tambahbuku.php");
                              ?>
                              <a href="" data-toggle="modal" data-target="#tambahbuku" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-plus"></i> Tambah Buku
                              </a>
                              <?php
                              include_once("buku/tambahbuku.php");
                              ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="table-responsive" id="daftarbuku">
                        <table class="table">
                          <thead class="text-md-center">
                            <tr>
                              <th>#</th>
                              <th>No.Panggil</th>
                              <th>Judul Buku</th>
                              <th>Pengarang</th>
                              <th>Tahun Terbit</th>
                              <th>Status Buku</th>
                              <th>ISBN</th>
                              <th>Penerbit</th>
                              <th>Tanggal Ditambahkan</th>
                              <th>Tanggal Perubahan</th>
                              <th>Jumlah Salinan</th>
                              <th>Jumlah Lembar</th>
                              <th>Kategori</th>
                              <th>Penerbit</th>
                              <th>Jenis Bahan</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          if($sql2->rowCount() > 0)
                          {
                            foreach($results2 as $result2)
                            {
                              // deklarasi supaya enak manggilnya
                              $nompang = htmlentities($result2->nomor_panggil);
                              $title = htmlentities($result2->judul_buku);
                              $author1 = htmlentities($result2->pengarang);
                              $tahuntbt = date('Y',strtotime($result2->tahun_terbit));
                              $bkstatus = htmlentities($result2->status_buku);
                              $isbnum = htmlentities($result2->isbn);
                              $penerbit = htmlentities($result2->penerbit);
                              $tgltbh = date('d M, Y',strtotime($result2->tgl_ditambahkan));
                              $tglubah = date('d M, Y',strtotime($result2->tgl_perubahan));
                              $copies = htmlentities($result2->numofcopies);
                              $lbrhal = htmlentities($result2->lbr_halaman);
                              $kategori = htmlentities($result2->kategori);
                              $penerbit = htmlentities($result2->penerbit);
                              $jbahan = htmlentities($result2->jenis_bahan);

                              //mengconvert dari angka ke string
                              if($bkstatus == '0')
                              {
                                $statusbuku = 'Sedang Dipinjam';
                              }
                              else if($bkstatus == '1')
                              {
                                $statusbuku = 'Tersedia';
                              }
                              else if($bkstatus == '2')
                              {
                                $statusbuku = 'Hilang';
                              }
                              else
                              {
                                $statusbuku = 'Tidak diketahui keadaannya';
                              }
                              ?>
                              <tr>
                                <td><?php echo $hitung;?></td>
                                <td><?php echo $nompang;?></td>
                                <td><?php echo $title;?></td>
                                <td><?php echo $author1;?></td>
                                <td><?php echo $tahuntbt;?></td>
                                <td><?php echo $statusbuku;?></td>
                                <td><?php echo $isbnum;?></td>
                                <td><?php echo $penerbit;?></td>
                                <td><?php echo $tgltbh;?></td>
                                <td><?php echo $tglubah;?></td>
                                <td><?php echo $copies." buku";?></td>
                                <td><?php echo $lbrhal." hal.";?></td>
                                <td><?php echo $kategori;?></td>
                                <td><?php echo $penerbit;?></td>
                                <td><?php echo $jbahan;?></td>
                              
                                <td>
                                <?php 
                                echo "<a href='".BASE_URL."pages/viewBook?nopang=".$nompang."' class='btn btn-outline-primary'><i class='fas fa-book-open '></i>Detil</a>";
                                echo "<a href='".BASE_URL."account/admin/buku/editbuku?nopang=".$nompang."' class='btn btn-outline-primary'><i class='fas fa-edit '></i>Sunting</a>";
                                echo "<a href='".BASE_URL."account/admin/buku/delbuku?nopang=".$nompang."' class='btn btn-outline-danger'><i class='fas fa-trash '></i>Hapus</a>";
                                ?>
                                </td>
                                <?php
                                $hitung=$hitung+1;
                            }
                          }
                                ?>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                      
                      <!--<script async type="text/javascript">
	                    $(document).ready(function(){
		                    var url = "buku/tambahbuku.php";
		                    jQuery('#tambahbuku').click(function(e) {
		                      $('.tambahbuku').load(url,function(result){
				                  $('#tambahbuku').modal({show:true});
			                    });
		                    });
	                    });
                      </script>-->
                    </div>
                    <div class="tab-pane fade" id="tabpinjam" role="tabpanel">
                    <div class="table-responsive">
                        <table class="table">
                          <thead class="text-md-center">
                            <tr>
                              <th>#</th>
                              <th>No.Panggil</th>
                              <th>Judul Buku</th>
                              <th>Pengarang</th>
                              <th>Tahun Terbit</th>
                              <th>Status Buku</th>
                              <th>ISBN</th>
                              <th>Tanggal Peminjaman</th>
                              <th>Tanggal Pengembalian</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                          if($sql3->rowCount() > 0)
                          {
                            foreach($results3 as $result3)
                            {
                              // deklarasi supaya enak manggilnya
                              $nopang = htmlentities($result3->nomor_panggil);
                              $judul = htmlentities($result3->judul_buku);
                              $author = htmlentities($result3->pengarang);
                              $tahunterbit = date('Y',strtotime($result3->tahun_terbit));
                              $bstatus = htmlentities($result3->status_buku);
                              $isbn = htmlentities($result3->isbn);
                              $tglpeminjaman = date('d M, Y',strtotime($result3->tgl_peminjaman));
                              $tglpengembalian = date('d M, Y',strtotime($result3->tgl_pengembalian));

                              //mengconvert dari angka ke string
                              if($bstatus == '0')
                              {
                                $status_buku = 'Sedang Dipinjam';
                              }
                              else if($bstatus == '1')
                              {
                                $status_buku = 'Tersedia';
                              }
                              else if($bstatus == '2')
                              {
                                $status_buku = 'Hilang';
                              }
                              else
                              {
                                $status_buku = 'Tidak diketahui keadaannya';
                              }
                              ?>
                              <tr>
                                <td><?php echo $hitung;?></td>
                                <td><?php echo $nopang;?></td>
                                <td><?php echo $judul;?></td>
                                <td><?php echo $author;?></td>
                                <td><?php echo $tahunterbit;?></td>
                                <td><?php echo $isbn;?></td>
                                <td><?php echo $tglpeminjaman;?></td>
                                <td><?php echo $tglpengembalian;?></td>
                              
                                <td>
                                <?php 
                                echo "<a href='".BASE_URL."pages/viewBook?nopang=".$nopang."' class='btn btn-outline-primary'><i class='fas fa-book-open '></i>Detil</a>";
                                echo "<a href='".BASE_URL."account/admin/buku/perpanjangbuku?nopang=".$nopang."' class='btn btn-outline-primary'><i class='fas fa-edit '></i>Perpanjang</a>";
                                echo "<a href='".BASE_URL."account/admin/buku/delpinjam?nopang=".$nopang."' class='btn btn-outline-danger'><i class='fas fa-trash '></i>Hapus</a>";
                                ?>
                                </td>
                                <?php
                                $hitung=$hitung+1;
                            }
                          }
                                ?>
                              </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="py-3 px-3">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-md-12 d-flex align-items-center justify-content-between my-2">
                              <a href="buku/detailpustaka" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-book-reader"></i>Detil Pustaka
                              </a>
                              <a href="/buku/detailanggota" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-book-reader"></i>Detil Peminjaman
                              </a>
                              <a href="/buku/detailanggota" class="btn btn-outline-primary btn-lg d-block"><i class="fas fa-book-reader"></i>Detil Anggota
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
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
  <script>
$(document).ready(function(){
 $("#tambahbukuform").on("submit", function(event){  
  event.preventDefault(); 
  //var postData = $(this).serializeArray();
  //var formURL = $(this).
  /* 
  if($('#judul').val() == "")  
  {  
   alert("Judul harus ada!");  
  }  
  else if($('#nopang').val() == '')  
  {  
   alert("Nomor Panggil harus ada!");  
  }  
  else if($('#author').val() == '')
  {  
   alert("Pengarang harus ada");  
  }
  
   
  else  
  {  
    */
   $.ajax({  
    url:"buku/addbook.php",  
    method:"POST",  
    data:$('#tambahbukuform').serialize(),  
    beforeSend:function(){  
     $('#tambah').val("Menambahkan");  
    },  
    success:function(data){  
     $('#tambahbukuform')[0].reset();  
     $('#tambahbuku').modal('hide');  
     //$('#daftarbuku').html(data);  
    }  
   });  
  //}  
 });
});
</script>
<?php
include(ROOT_PATH.'/pages/footer.php');
?>