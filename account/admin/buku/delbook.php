<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

// Cek dulu siapa tau ada yang minjam
$sqlcheck = $dbs->prepare('SELECT buku.nomor_panggil,buku.judul_buku,buku.pengarang,buku.tahun_terbit,buku.status_buku,buku.numofcopies,buku.isbn,anggota.id,anggota.nama_depan,peminjaman.tgl_peminjaman,peminjaman.tgl_pengembalian,peminjaman.id_peminjaman,peminjaman.tanggal_kembali FROM peminjaman JOIN anggota ON anggota.id=peminjaman.id_anggota JOIN buku ON buku.nomor_panggil=peminjaman.nomor_panggil_buku WHERE buku.nomor_panggil=:nopang');
$sqlcheck->execute(array(':nopang' => $_GET['nopang']));
$cheking = $sqlcheck->fetch();

if(isset($cheking['id_peminjaman']))
{
    ?>
    <!--<script>$('#delbook').modal('show');</script>-->
    <span class="fas fa-times-circle fa-4x"></span>
    <h2 class="display-3">Galat</h2>
    <p>Buku sedang dalam proses peminjaman atau sedang dalam peminjaman. Batalkan peminjaman terlebih dahulu atau tunggu buku dikembalikan.</p>
    <?php
}
else if(!isset($cheking['id_peminjaman']))
{
    // Hapus buku
    $idbuku = $_GET['nopang'];
    $sqldel = $dbs->prepare('DELETE FROM buku WHERE buku.nomor_panggil = :nompang');
    $sqldel->bindParam(':nompang', $idbuku);
    $sqldel->execute();

    if(!$sqldel->rowCount())
    {
        ?>
        <span class="fas fa-times-circle fa-4x"></span>
        <h2 class="display-3">Galat</h2>
        <p>Hapus buku gagal</p>
        <?php
        //echo "<script>alert('Hapus buku gagal.');</script>";
    }
    else
    {
        ?>
        <!--<script>alert("Buku telah dihapus.");</script>-->

        <span class="fas fa-check-circle fa-4x"></span>
        <h2 class="display-3">Sukses</h2>
        <p class="py-2">Buku telah dihapus.</p>
        <?php
    }

}
else
{
    ?>
    <!--<script>$('#delbook').modal('show');</script>-->
    <span class="fas fa-times-circle fa-4x"></span>
    <h2 class="display-3">Galat</h2>
    <p>Terdapat kesalahan komunikasi.</p>
    <?php
}
?>

