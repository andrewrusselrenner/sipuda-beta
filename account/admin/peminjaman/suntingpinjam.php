<?php
$url = $_SERVER['REQUEST_URI'];

if (strpos($url,'viewBook') !== false)
{
    $judule = $baris['judul_buku'];  
    $nopange = $baris['nomor_panggil']; 
    $isbn = $baris['isbn'];
}
else if(strpos($url,'admin') !== false)
{
    $judule = $judul;
    $nopange = $nopang;
    $isbne = $isbn;
    $idpinjam = htmlentities($result3->id_peminjaman);
    $idanggota = htmlentities($result3->id);

}
?>

<div class="modal fade" id="suntingpinjam<?php echo htmlentities($result3->id_peminjaman) ?>" tabindex="-1" role="dialog" aria-labelledby="suntingpinjamLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Permintaan Peminjaman</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
            </div>
            <div class="modal-body text-center">
                <p><?php echo htmlentities($result3->id_peminjaman); ?></p>
                <h3>Anda akan mengkonfirmasi permintaan peminjaman dengan nomor peminjaman <?php echo "<strong>'".$idpinjam."'</strong>"; ?> dan nomor panggil buku <?php echo "<strong>'".$nopange."'</strong>"; ?> untuk ID Anggota <?php echo "<strong>'".$idanggota."'</strong>"; ?></h3>
            </div>
            <div class="modal-footer"> 
                <button data-toggle="modal" data-target="#confirm" data-id="<?php echo $nopange; ?>" id="confirm" name="confirm" class="btn btn-primary"><li class="fas fa-check"> Konfirmasi</li></button>
                <button type="button" class="btn btn--outline-danger" data-dismiss="modal">Batal</button> 
            </div>        
        </div>
    </div>
</div>
  
<!-- Konfirmasi Pinjam modal -->
<div class="modal fade" id="confirmpinjam">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Peminjaman</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center p-3" id="pinjamDetail">
                <p class="py-2">
                <div id="modal-loader2" style="display: none; text-align: center;">
                    <!-- ajax loader -->
                    <img src="https://static-steelkiwi-dev.s3.amazonaws.com/media/filer_public/4e/07/4e07eece-7c84-46e2-944d-1a6b856d7b5f/463ff844-6f36-4ffe-b051-fea983d39223.gif">
                </div>                  
                <div id="dynamic-content2"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>