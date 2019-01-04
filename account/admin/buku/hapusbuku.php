<?php
$url = $_SERVER['REQUEST_URI'];

if (strpos($url,'viewBook') !== false)
{
    $juduls = $baris['judul_buku'];
    $desks = $baris['deskripsi_singkat'];
    $authors = $baris['pengarang'];
    $ttb = date("Y-m-d", strtotime($baris['tahun_terbit']));
    $availability = $status_buku;
    $hals = $baris['lbr_halaman'];
    $categorys = $baris['kategori'];
    $nopangs = $baris['nomor_panggil'];
    $isbns = $baris['isbn'];
    $penerbits = $baris['penerbit'];
    $salinans = $baris['numofcopies'];
    $gambars = $baris['gambar'];
}
else{
    $juduls = $title;
    $desks = $desksing;
    $authors = $author1;
    $ttb = $tahuntbt2;
    $availability = $statusbuku;
    $hals = $lbrhal;
    $categorys = $kategori;
    $nopangs = $nompang;
    $isbns = $isbnum;
    $penerbits = $penerbit;
    $salinans = $copies;
    $gambars = $gambar;
}

?> 

<!-- Hapus buku Modal -->
<div class="modal fade" id="hapusbuku<?php echo $nopangs ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Hapus Buku</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text-center">
        <span class="fas fa-question-circle fa-4x"></span>
        <h2 class="display-3">Yakin ingin dihapus?</h2>
        <?php
        if(isset($nompang))
        {
            echo "<p>Anda akan menghapus buku ".$title." dengan nomor panggil ".$nompang.". Tindakan ini tidak dapat dibatalkan.</p>";
        }
        else{
            echo "<p>Anda akan menghapus buku ".$baris['judul_buku']." dengan nomor panggil ".$baris['nomor_panggil'].". Tindakan ini tidak dapat dibatalkan.</p>";
        }
        ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button data-toggle="modal" data-target="#delbook" data-id="<?php 
        if(isset($nompang))
        {
            echo $nompang;
        }
        else
        {
            $nopangs = $baris['nomor_panggil'];
            echo $nopangs;
        }?>" id="hapus" class="btn btn-danger"><li class="fas fa-trash"> Hapus</li></button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Delbook modal -->
<div class="modal fade" id="delbook">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Penghapusan Buku</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center p-3" id="hapusDetail">
                <p class="py-2">
                <div id="modal-loader" style="display: none; text-align: center;">
                    <!-- ajax loader -->
                    <img src="https://static-steelkiwi-dev.s3.amazonaws.com/media/filer_public/4e/07/4e07eece-7c84-46e2-944d-1a6b856d7b5f/463ff844-6f36-4ffe-b051-fea983d39223.gif">
                </div>                  
                <div id="dynamic-content"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>