<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

// variables for pagination
if (isset($_GET['pageno'])) 
{
    $pageno = $_GET['pageno'];
} 
else
{
    $pageno = 1;
}

$no_of_records_per_page = 8;
$offset = ($pageno-1) * $no_of_records_per_page;
// pagination
$total_pages_sql = "SELECT COUNT(*) FROM buku ORDER BY buku.tgl_ditambahkan";
$hsil = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($hsil)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

// the query
$query = "SELECT * FROM buku ORDER BY buku.tgl_ditambahkan DESC LIMIT $offset, $no_of_records_per_page";
$raw_result = mysqli_query($con, $query);

$page_title = 'Katalog';
include(ROOT_PATH.'/pages/header.php');
include_once(ROOT_PATH.'/config/timeago-function.php');
?>
<body>
  <?php include(ROOT_PATH.'/pages/navbar.php'); ?>
  <div class="py-5 text-center section-parallax" style="background-image: url(&quot;http://hdqwalls.com/wallpapers/christopher-robin-2018-movie-poster-3r.jpg&quot;);">
    <div class="container-fluid">
      <div class="row my-3 mx-auto col-md-6 p-3 section-lighttwo">
        <div class="mx-auto col-md-10 p-3">
            <h1>Katalog</h1>
            <p class="mb-12">Selamat datang dikatalog! Disini adalah kumpulan semua buku yang ada di Perpustakaan. </p>
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
    <div class="py-1 my-2">
        <div class="container-fluid my-3">
        <h1 class="text-center mb-3">Menampilkan Semua Buku <small>v1</small></h1>
            <div class="row w-5 mx-auto col-md-auto content-center">
                <?php
                while($result = $raw_result->fetch_assoc())
                {
                    ?>
                    <div class="col-md-3 py-2">
                        <div class="card" style="height: 771px;">
                            <img class="card-img-center img-fluid" src= <?php echo $result['gambar'] ?> alt="Buku Perpus" style="height: 453px; width: 328px;">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $result['judul_buku'] ?></h4>
                                <p class="card-text"><?php echo $result['pengarang'] ?> </p>
                                <?php
                                //mengconvert dari angka ke string
                                if($result['status_buku'] == '0')
                                {
                                    $status_buku = 'Sedang Dipinjam';
                                }
                                else if($result['status_buku'] == '1')
                                {
                                    $status_buku = 'Tersedia';
                                }
                                else if($result['status_buku'] == '2')
                                {
                                    $status_buku = 'Hilang';
                                }
                                else
                                {
                                    $status_buku = 'Tidak diketahui keadaannya';
                                }
                                ?>

                                <p class="card-text"><?php echo date("Y", strtotime($result['tahun_terbit'])) ?> </p>
                                <p class="card-text"><?php echo $status_buku ?> </p>
                            </div>
                            <div class="card-footer">
                            <?php
                                echo "<a href='".BASE_URL."pages/viewBook?nopang=".$result['nomor_panggil']."' class='btn btn-outline-primary btn-lg'>Detil Buku</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>                    
        </div>

<div class="container">
    <div class="row">
        <div class="col-6 offset-3 py-1">
            <ul class="pagination mx-auto text-center">
              <li class="page-item"><a class="page-link" href=<?php echo "index?&pageno=1"; ?>>Awal</a></li>
              <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($pageno <= 1){ echo '#'; } else { echo "index?&pageno=".($pageno - 1); } ?>">Sebelumnya</a>
              </li>
              <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                <a class="page-link" href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "index?&pageno=".($pageno + 1); } ?>">Selanjutnya</a>
              </li>
              <li class="page-item"><a class="page-link" href=<?php echo "index?&pageno=".$total_pages; ?>>Akhir</a></li>
            </ul>
        </div>
    </div>
</div>
<?php
include(ROOT_PATH.'/pages/footer.php');
?>
