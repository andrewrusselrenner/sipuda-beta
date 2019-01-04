<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');


    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        $anggotaid=$_POST['anggotaid'];
        $nopango=$_POST['nopango'];

        $sql="INSERT INTO peminjaman (id_peminjaman, id_anggota, nomor_panggil_buku, is_accepted, tgl_peminjaman, tgl_pengembalian, tanggal_kembali) VALUES (LPAD(FLOOR(RAND() * 20000000), 7, 2), :anggotaid, :nopango, 1, CURRENT_DATE(), DATE_ADD(CURRENT_DATE, INTERVAL 1 WEEK), NULL);UPDATE buku SET buku.status_buku=0 WHERE buku.nomor_panggil=:nopango;";
        
        $query = $dbs->prepare($sql);
        $query->bindParam(':anggotaid',$anggotaid,PDO::PARAM_STR);
        $query->bindParam(':nopango',$nopango,PDO::PARAM_STR);
        
        $query->execute();
        $idpinjam = $dbs->lastInsertId();

        if(isset($idpinjam))
        {
            $_SESSION['message']="Peminjaman telah ditambahkan";
            //echo "<script>window.confirm('Sukses. Silahkan refresh halaman untuk update tabel.')</script>";
            echo "<i class='fas fa-check'></i><h1 class='text-center'>Sukses. Peminjaman tercatat dengan nomor pinjam ".$idpinjam.".</h1>";
            //header('location:/account/admin');
        }
        else
        {
            $_SESSION['error']="Ada yang tidak beres. Mohon coba lagi.";
            //echo "<script>window.confirm('Galat, salah di sql nya kayanya')</script>";
            echo "<h1 class='text-center'>Ada yang aneh".$idpinjam."</h1>";
            //header("location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    else
    {
    echo "<script>window.confirm('Galat, lain POST')</script>";
    }
?>