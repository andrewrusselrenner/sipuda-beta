<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

// Cek dulu siapa tau ada yang minjam
$sqlcheck = $dbs->prepare('SELECT buku.nomor_panggil,buku.judul_buku,buku.pengarang,buku.tahun_terbit,buku.status_buku,buku.numofcopies,buku.isbn,anggota.id,anggota.nama_depan,peminjaman.tgl_peminjaman,peminjaman.tgl_pengembalian,peminjaman.id_peminjaman,peminjaman.tanggal_kembali FROM peminjaman JOIN anggota ON anggota.id=peminjaman.id_anggota JOIN buku ON buku.nomor_panggil=peminjaman.nomor_panggil_buku WHERE buku.nomor_panggil=:nopang');
$sqlcheck->execute(array(':nopang' => $_GET['nopang']));
$cheking = $sqlcheck->fetch();

if($cheking['is_accepted'] == 1)
{
    ?>
    <!--<script>$('#delbook').modal('show');</script>-->
    <span class="fas fa-times-circle fa-4x"></span>
    <h2 class="display-3">Galat</h2>
    <p>Buku sudah ada yang pinjam atau sudah dipinjam.</p>
    <?php
}
else if($cheking['is_accepted'] == 0)
{
    // acc peminjaman buku
    $idbuku = $_GET['nopang'];
    $sqlkonf = $dbs->prepare('UPDATE buku,peminjaman SET peminjaman.is_accepted = 1, peminjaman.tgl_pengembalian = DATE_ADD(CURRENT_DATE, INTERVAL 1 WEEK),buku.status_buku=0 WHERE buku.nomor_panggil=peminjaman.nomor_panggil_buku AND peminjaman.nomor_panggil_buku=:nompang');
    $sqlkonf->bindParam(':nompang', $idbuku);
    $sqlkonf->execute();

    if(!$sqlkonf->rowCount())
    {
        ?>
        <span class="fas fa-times-circle fa-4x"></span>
        <h2 class="display-3">Galat</h2>
        <p>Peminjaman buku gagal</p>
        <?php
    }
    else
    {
        ?>
        <span class="fas fa-check-circle fa-4x"></span>
        <h2 class="display-3">Sukses</h2>
        <p class="py-2">Buku telah dikonfirmasi. Mohon jangan tekan tombol konfirmasi lagi atau database akan berhamburan.</p>
        <?php
    }

}
else
{
    ?>
    <!--<script>$('#delbook').modal('show');</script>-->
    <span class="fas fa-times-circle fa-4x"></span>
    <h2 class="display-3">Galat</h2>
    <p>Terdapat kesalahan komunikasi database.</p>
    <?php
}
?>

