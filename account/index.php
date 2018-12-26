<?php
include_once('engine/index-engine.php');

if(isset($_SESSION['Level_Akses'])==='Anggota')
{
$page_title = 'Halaman Profil';
include(ROOT_PATH.'/pages/header.php');
include(ROOT_PATH.'/pages/navbar.php');
include_once(ROOT_PATH.'/config/timeago-function.php');
?>
<body>
<div class="py-5 text-center section-parallax" style="background-image: url(&quot;http://hdqwalls.com/wallpapers/christopher-robin-2018-movie-poster-3r.jpg&quot;);">
    <div class="container-fluid">
        <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
            <div class="mx-auto col-md-6 p-3">
                <h1>Selamat Datang <?php echo $namadpn ?>!</h1>
                <p class='mb-12'>Di halaman ini Anda dapat melihat profil dan riwayat buku Anda tepat dibawah ini.</p>
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
            <li class="nav-item"> <a class="nav-link" href="" data-toggle="pill" data-target="#tabtwo">Riwayat Peminjaman</a> </li>
            <li class="nav-item"> <a href="" class="nav-link" data-toggle="pill" data-target="#tabthree">Pengaturan Akun</a> </li>
          </ul>
        </div>
        <div class="col-md-8 x-2">
          <div class="col-auto">
            <div class="tab-content">
              <div class="tab-pane fade active show" id="tabone" role="tabpanel">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-4">
                      <img class="img-fluid d-block profile-img" src="<?php echo $ava ?>" style="height: 230px; width: 230px;">
                    </div>
                    <div class="col-md-8">
                      <h1><?php echo $namadpn ?></h1>
                      <h2><?php echo $namablkg ?></h2>
                      <br>
                      <p><?php echo $surel ?></p>
                      <p><?php echo $gender ?></p>
                      <p><?php echo $job ?></p>
                      <p>Bergabung <?php echo timeago($tglbuat); ?></p>
                      <h4>Status Keanggotaan</h4>
                      <p><?php echo $status ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="tabtwo" role="tabpanel">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="text-md-center">
                      <tr>
                        <th>#</th>
                        <th>No.Panggil</th>
                        <th>Judul Buku</th>
                        <th>Tahun Terbit</th>
                        <th>ISBN</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Tenggat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($sql3->rowCount() > 0)
                    {
                      foreach($results3 as $result3)
                      {
                        // deklarasi
                        $nopang = htmlentities($result3->nomor_panggil);
                        $judul = htmlentities($result3->judul_buku);
                        $isbn = htmlentities($result3->isbn);
                        $tahunterbit = date('Y',strtotime($result3->tahun_terbit));
                        $tglpeminjaman = date('d M, Y',strtotime($result3->tgl_peminjaman));
                        $tglpengembalian = date('d M, Y',strtotime($result3->tgl_pengembalian));
                        $tglkembali = date('d M, Y',strtotime($result3->tanggal_kembali));

                        if(isset($tglkembali))
                        {
                          $statuskembali = 'Belum Dikembalikan';
                        }
                        else //if($tglkembali !== 'NULL')
                        {
                          $statuskembali = 'Sudah dikembalikan';
                        }
                        ?>
                        <tr>
                          <td><?php echo $hitung;?></td>
                          <td><?php echo $nopang;?></td>
                          <td><?php echo $judul;?></td>
                          <td><?php echo $tahunterbit;?></td>
                          <td><?php echo $isbn;?></td>
                          <td><?php echo $tglpeminjaman;?></td>
                          <td><?php echo $tglpengembalian;?></td>
                          <td><?php echo $statuskembali;?></td>
                          <td><?php echo "<a href='".BASE_URL."pages/viewBook?nopang=".$nopang."' class='btn btn-outline-primary'>Detil Buku</a>";?></td>
                        <?php
                        $hitung=$hitung+1;
                      }
                    }
                    ?>
                      </tr>
                    </tbody>
                  </table>
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
}
else if($_SESSION['Level_Akses']=='Admin')
{
  header("location: /account/admin/index");
}
else
{
  header("location:" . $_SERVER['HTTP_REFERER']);
}
?>