<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $namad     = $_POST['namad'];
    $namab     = $_POST['namab'];
    $email     = $_POST['email'];
    $nope      = $_POST['nope'];
    $almt      = $_POST['almt'];
    $sandi     = $_POST['sandi'];
    $idcard    = $_POST['idcard'];
    $noid      = $_POST['noid'];
    $tptlahir  = $_POST['tptlahir'];
    $tgllahir  = $_POST['tgllahir'];
    $gender    = $_POST['gender'];
    $jobstatus = $_POST['jobstatus'];
    $hakakses  = 'Anggota';
    $status    = 0;
    $datecrtd  = date("Y-m-d");
    
    $sql       = "INSERT INTO anggota(id,nama_depan,nama_belakang,surel,avatar,nohp,alamat,katasandi,jenis_kartu_identitas,no_identitas,tempat_lahir,tgl_lahir,jenis_kelamin,status_pekerjaan,Level_Akses,status,tgl_dibuat) VALUES(LPAD(FLOOR(RAND() * 20000), 4, 2),:namad,:namab,:email,NULL,:nope,:almt,PASSWORD(:sandi),:idcard,:noid,:tptlahir,:tgllahir,:gender,:jobstatus,:hakakses,:status,NOW())";
    
    $dbs->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
    $query = $dbs->prepare($sql);
    //$query->bindParam(':idAnggota',$idAnggota,PDO::PARAM_STR);
    $query->bindParam(':namad',$namad,PDO::PARAM_STR);
    $query->bindParam(':namab',$namab,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':nope',$nope,PDO::PARAM_STR);
    $query->bindParam(':almt',$almt,PDO::PARAM_STR);
    $query->bindParam(':sandi',$sandi,PDO::PARAM_STR);
    $query->bindParam(':idcard',$idcard,PDO::PARAM_STR);
    $query->bindParam(':noid',$noid,PDO::PARAM_STR);
    $query->bindParam(':tptlahir',$tptlahir,PDO::PARAM_STR);
    $query->bindParam(':tgllahir',$tgllahir,PDO::PARAM_STR);
    $query->bindParam(':gender',$gender,PDO::PARAM_STR);
    $query->bindParam(':jobstatus',$jobstatus,PDO::PARAM_STR);
    $query->bindParam(':hakakses',$hakakses,PDO::PARAM_STR);
    $query->bindParam(':status',$status,PDO::PARAM_STR);
    //$query->bindParam(':datecrtd',$datecrtd,PDO::PARAM_STR);
    $query->execute();
    $reslt = $dbs->lastInsertId();

    /*
    $reslt = $lastInsertId->fetchAll(PDO::FETCH_OBJ);
    $idAnggota = $reslt['id'];

    */

    if(!isset($reslt))
    {
        $error_msg = "<div class='login-modal'>Broken sayyy...</div>";
        $errorpdo = $dbs->errorInfo();
        echo "<script>alert('Ada yang tidak benar. Silahkan coba kembali. Error : ".$errorpdo." print ".$reslt."')</script>";
        print_r($dbs->errorInfo());
    }
    else 
    {
        $error_msg = "<div class='login-modal'>Udah bisa sayy. Id nya ".$reslt.". Kasih ke admin ya. Balik ke beranda ya jangan nyepam mentang mentang bisa.</div>";
        ?>
        <!--<script>
        alert("Terima kasih sudah mendaftar. ID Anggota Anda <?php echo $reslt ?>. Silahkan datang ke bagian pendaftaran untuk verifikasi data dan pengambilan kartu.");
        //window.location.href = "./";
        </script>-->
        <li class="fas fa-check fa-5x"></li>
        <h3 class="display-6 text-center">Terima kasih sudah mendaftar. ID Anggota Anda <?php echo $reslt ?>. Silahkan datang ke bagian pendaftaran untuk verifikasi data dan pengambilan kartu.<h3>
        <?php
        //header("Location: ".BASE_URL);
        //echo "<script>alert('Sudah bisa. ini idnya ".$reslt."')</script>";
        //echo "<script>alert('Terima kasih. ID Anggota Anda ".$reslt.". Silahkan datang ke perpustakaan untuk verifikasi.')</script>";
        //header("location: ./");
        //exit();
    }
?>