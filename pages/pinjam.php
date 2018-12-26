<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

if(isset($_REQUEST['id']))
{
$email  = $_SESSION['masuk'];
$mid    = $_SESSION['id'];

//$nopang = $baris['nomor_panggil'];
$nopang = $_POST['id'];

$query2 = $dbs->prepare('INSERT INTO peminjaman (id_peminjaman, id_anggota, nomor_panggil_buku, is_accepted, tgl_peminjaman, tgl_pengembalian, tanggal_kembali) VALUES (LPAD(FLOOR(RAND() * 20000000), 7, 2), :mid, :nopang, 0, CURRENT_DATE(), DATE_ADD(CURRENT_DATE, INTERVAL 1 WEEK), NULL)');

$query2->bindParam(':mid',$mid,PDO::PARAM_STR);
$query2->bindParam(':nopang',$nopang,PDO::PARAM_STR);
$query2->execute();
$idpinjam = $dbs->lastInsertId();

?>
            <span class="fa fa-check-circle fa-4x"></span></p>
            <h1> Permintaan Peminjaman Sukses! </h1>
            <p>Silahkan datang ke perpustakaan dengan nomor permintaan dibawah ini untuk mengambil buku</p>
            <br />
            <p><h2><?php echo $idpinjam; ?></h2></p>
            </div>
            </div>

<?php
}
?>