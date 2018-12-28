<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');


    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        
        $bid=$_POST['nopang'];
        $judul=$_POST['judul'];
        $deskripsiskt=$_POST['deskripsiskt'];
        $pengarang=$_POST['author'];
        $tahunterbit=$_POST['tahunterbit'];
        $ketersediaan=$_POST['ketersediaan'];
        $isbn=$_POST['isbn'];
        $penerbit=$_POST['penerbit'];
        $gambar=$_POST['gambar'];
        $salinan=$_POST['salinan'];
        $hal=$_POST['hal'];
        $category=$_POST['category'];
        $jenisbahan=$_POST['jenisbahan'];

        $sql="INSERT INTO buku (nomor_panggil, judul_buku, deskripsi_singkat, pengarang, tahun_terbit, status_buku, isbn, penerbit, tgl_ditambahkan, tgl_perubahan, gambar, numofcopies, lbr_halaman, kategori, jenis_bahan, konten_digital) VALUES (:bid, :judul, :deskripsiskt, :pengarang, :tahunterbit, :ketersediaan, :isbn, :penerbit, NOW(), NOW(), :gambar, :salinan, :hal, :category, :jenisbahan, NULL)";
        
        $query = $dbs->prepare($sql);
        $query->bindParam(':bid',$bid,PDO::PARAM_STR);
        $query->bindParam(':judul',$judul,PDO::PARAM_STR);
        $query->bindParam(':deskripsiskt',$deskripsiskt,PDO::PARAM_STR);
        $query->bindParam(':pengarang',$pengarang,PDO::PARAM_STR);
        $query->bindParam(':tahunterbit',$tahunterbit,PDO::PARAM_STR);
        $query->bindParam(':ketersediaan',$ketersediaan,PDO::PARAM_STR);
        $query->bindParam(':isbn',$isbn,PDO::PARAM_STR);
        $query->bindParam(':penerbit',$penerbit,PDO::PARAM_STR);
        $query->bindParam(':gambar',$gambar,PDO::PARAM_STR);
        $query->bindParam(':salinan',$salinan,PDO::PARAM_STR);
        $query->bindParam(':hal',$hal,PDO::PARAM_STR);
        $query->bindParam(':category',$category,PDO::PARAM_STR);
        $query->bindParam(':jenisbahan',$jenisbahan,PDO::PARAM_STR);
        $query->execute();
        $idpinjam = $dbs->lastInsertId();

        if(isset($idpinjam))
        {
            $_SESSION['message']="Buku telah ditambahkan";
            echo "<script>window.confirm('Sukses. Silahkan refresh halaman untuk update tabel.')</script>";
            echo "<h1 class='text-center'>Sukses. Silahkan refresh halaman untuk update tabel.</h1>";
            //header('location:/account/admin');
        }
        else
        {
            $_SESSION['error']="Ada yang tidak beres. Mohon coba lagi.";
            echo "<script>window.confirm('Galat, salah di sql nya kayanya')</script>";
            echo "<h1 class='text-center'>Ada yang aneh".$idpinjam."</h1>";
            //header("location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    else
    {
    echo "<script>window.confirm('Galat, lain post')</script>";
    }
?>