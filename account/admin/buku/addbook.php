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

        $sql="INSERT INTO buku (nomor_panggil, judul_buku, deskripsi_singkat, pengarang, tahun_terbit, status_buku, isbn, penerbit, tgl_ditambahkan, tgl_perubahan, gambar, numofcopies, lbr_halaman, kategori, jenis_bahan, konten_digital) VALUES (:bid, :judul, :deskripsiskt, :pengarang, STR_TO_DATE(:tahunterbit, '%m/%d/%Y'), :ketersediaan, :isbn, :penerbit, CURRENT_DATE(), NOW(), :gambar, :salinan, :hal, :category, :jenisbahan, NULL)";
        
        $query = $dbs->prepare($sql);
        $query->bindValue(':bid',$bid,PDO::PARAM_STR);
        $query->bindValue(':judul',$judul,PDO::PARAM_STR);
        $query->bindValue(':deskripsiskt',$deskripsiskt,PDO::PARAM_STR);
        $query->bindValue(':pengarang',$pengarang,PDO::PARAM_STR);
        $query->bindValue(':tahunterbit',$tahunterbit,PDO::PARAM_STR);
        $query->bindValue(':isbn',$isbn,PDO::PARAM_STR);
        $query->bindValue(':penerbit',$penerbit,PDO::PARAM_STR);
        $query->bindValue(':ketersediaan',$ketersediaan,PDO::PARAM_STR);
        $query->bindValue(':gambar',$gambar,PDO::PARAM_STR);
        $query->bindValue(':salinan',$salinan,PDO::PARAM_STR);
        $query->bindValue(':hal',$hal,PDO::PARAM_STR);
        $query->bindValue(':category',$category,PDO::PARAM_STR);
        $query->bindValue(':jenisbahan',$jenisbahan,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbs->lastInsertId();

        if($lastInsertId)
        {
            $_SESSION['message']="Buku telah ditambahkan";
            echo "<script>window.confirm('Sukses')</script>";
            //header('location:/account/admin');
        }
        else
        {
            $_SESSION['error']="Ada yang tidak beres. Mohon coba lagi.";
            echo "<script>window.confirm('Galat, salah di sql nya kayanya')</script>";
            //header("location:" . $_SERVER['HTTP_REFERER']);
        }
    }
    else
    {
    echo "<script>window.confirm('Galat, lain post')</script>";
    }
?>