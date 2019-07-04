<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

// Acc anggota
$idanggota = $_GET['id'];
$sqlanggota = $dbs->prepare('UPDATE anggota SET status=:1 WHERE anggota.id=:idanggota');
$sqlanggota->bindParam(':idanggota', $idanggota);
$sqlanggota->execute();

if(!$sqlanggota->rowCount())
{
    ?>
    <span class="fas fa-times-circle fa-4x"></span>
    <h2 class="display-3">Galat</h2>
    <p>Konfirmasi anggota gagal</p>
    <?php
    //echo "<script>alert('Hapus buku gagal.');</script>";
}
else
{
    ?>
    <!--<script>alert("Buku telah dihapus.");</script>-->

    <span class="fas fa-check-circle fa-4x"></span>
    <h2 class="display-3">Sukses</h2>
    <p class="py-2">Anggota dengan id <?php echo $idanggota ?> telah sukses dikonfirmasi.</p>
    <?php
}
?>

