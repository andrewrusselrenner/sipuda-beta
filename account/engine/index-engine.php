<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

$mid = $_SESSION['masuk'];
$sql = $dbs->prepare('SELECT * FROM anggota WHERE surel=:mid');
//$sql->bindParam(':mid',$mid,PDO::PARAM_STR);
$sql->execute(array(':mid' => $mid));
$result = $sql->fetch();

// impor fungsi timeago()
include($_SERVER['DOCUMENT_ROOT'].'/config/timeago-function.php');

// deklarasi supaya mudah dibaca
$namadpn    = $result['nama_depan'];
$namablkg   = $result['nama_belakang'];
$surel      = $result['surel'];
$gender     = $result['jenis_kelamin'];
$statusa    = $result['status'];
$tglbuat    = $result['tgl_dibuat'];
$ava        = $result['avatar'];
$job        = $result['status_pekerjaan'];

if($statusa == '0')
{
    $status = 'Akun Sedang Dalam Peninjauan';
}
else if($statusa == '1')
{
    $status = 'Aktif';
}
else
{
    $status = 'Tidak diketahui';
}

if($ava === NULL)
{
    $ava = 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/OOjs_UI_icon_userAvatar.svg/600px-OOjs_UI_icon_userAvatar.svg.png';
}
/*
$sql2 = $dbs->prepare('SELECT * FROM peminjaman WHERE id_anggota=:mid');
$sql2->execute(array(':mid' => $mid));
$result2 = $sql2->fetch();
$totalpeminjaman = $sql2->rowCount();

$idpeminjaman = $result2['id_peminjaman'];
$nopang       = $result2['nomor_panggil_buku'];
$isaccepted   = $result2['is_accepted'];
$tglpinjam    = $result2['tgl_peminjaman'];
$tglkembali   = $result2['tgl_pengembalian'];

if($isaccepted == '0')
{
    $diterima = 'Belum Diterima';
}
else if($isaccepted == '1')
{
    $diterima = 'Diterima';
}
else
{
    $diterima = 'Buku belum diterima';
}
*/
$sql3 = $dbs->prepare('SELECT buku.nomor_panggil,buku.judul_buku,buku.isbn,buku.tahun_terbit,peminjaman.tgl_peminjaman,peminjaman.tgl_pengembalian,peminjaman.id_peminjaman,peminjaman.tanggal_kembali from peminjaman join anggota on anggota.id=peminjaman.id_anggota join buku on buku.nomor_panggil=peminjaman.nomor_panggil_buku where anggota.surel=:mid order by peminjaman.tgl_peminjaman desc');
$sql3-> bindParam(':mid', $mid, PDO::PARAM_STR);
$sql3->execute();
$results3=$sql3->fetchAll(PDO::FETCH_OBJ);
$hitung=1;
?>