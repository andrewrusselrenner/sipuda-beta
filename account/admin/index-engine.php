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

// untuk tab manajemen pustaka -> buku
$sql2 = $dbs->prepare('SELECT * FROM buku ORDER BY tgl_ditambahkan DESC LIMIT 5');
$sql2->execute();
$results2=$sql2->fetchAll(PDO::FETCH_OBJ);
$hitung=1;

// untuk tab manajemen pustaka -> peminjaman
$sql3 = $dbs->prepare('SELECT buku.nomor_panggil,buku.judul_buku,buku.pengarang,buku.tahun_terbit,buku.status_buku,buku.numofcopies,buku.isbn,peminjaman.tgl_peminjaman,peminjaman.tgl_pengembalian,peminjaman.id_peminjaman,peminjaman.tanggal_kembali FROM peminjaman JOIN anggota ON anggota.id=peminjaman.id_anggota JOIN buku ON buku.nomor_panggil=peminjaman.nomor_panggil_buku ORDER BY peminjaman.tgl_peminjaman DESC LIMIT 5');
$sql3->execute();
$results3=$sql3->fetchAll(PDO::FETCH_OBJ);
?>