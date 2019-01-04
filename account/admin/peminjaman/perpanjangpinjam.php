<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

// Update tgl pengembalian buku
$idbuku = $_GET['nopang'];
$sqldel = $dbs->prepare('UPDATE FROM peminjaman SET peminjaman.tgl_pengembalian = DATE_ADD(NOW(), INTERVAL 1 WEEK) WHERE peminjaman.nomor_panggil_buku = :nompang');
$sqldel->bindParam(':nompang', $idbuku);
$sqldel->execute();

if(!$sqldel->rowCount())
{
    ?>
    <span class="fas fa-times-circle fa-4x"></span>
    <h2 class="display-3">Galat</h2>
    <p>Perpanjang buku gagal</p>
    <?php
}
else
{
    ?>
    <span class="fas fa-calendar-check fa-4x"></span>
    <h2 class="display-3">Sukses</h2>
    <p class="py-2">Buku telah diperpanjang.</p>
    <?php
}
?>

