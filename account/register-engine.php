<?php
include(ROOT_PATH.'/config/dbconnection.php');
if(isset($_POST['daftar']))
{
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) 
    {

        //your site secret key
        $secret = GSECRET_KEY;
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        
        if ($responseData->success)
        {
            // Kode untuk id anggota (belum punya)
            // Line 22 itu gak tau dapat darimana kodenya soalnya kopas bro
            /*
            $count_my_page = ("idanggota.txt");
            $hits = file($count_my_page);
            $hits[0] ++;
            $fp = fopen($count_my_page , "w");
            fputs($fp , "$hits[0]");
            fclose($fp); 
            $idAnggota = $hits[0];   
            */
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
            
            $sql       = "INSERT INTO anggota(nama_depan,nama_belakang,surel,nohp,alamat,katasandi,j-kartu_identitas,no_identitas,tempat_lahir,tgl_lahir,jenis_kelamin,status_pekerjaan,level_akses,status,tgl_dibuat) VALUES(:namad,:namab,:email,:nope,:almt,PASSWORD(:sandi),:idcard,:noid,:tptlahir,:tgllahir,:gender,:jobstatus,:hakakses,:status,:datecrtd)";
            
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
            $query->bindParam(':datecrtd',$datecrtd,PDO::PARAM_STR);
            $query->execute();
            $lastInsertId = $dbs->lastInsertId();

            /*
            $reslt = $lastInsertId->fetchAll(PDO::FETCH_OBJ);
            $idAnggota = $reslt['id'];

            */

            if($lastInsertId)
            {
                echo "<script>alert('Your Registration successfull and your student id is  '+".$lastInsertId."')</script>";
                header("location: ".BASE_URL."/account/me");
                exit();
            }
            else 
            {
            echo "<script>alert('Ada yang tidak benar. Silahkan coba kembali.');</script>";
            }
        }
        else {
            $error_msg = "<div class='login-modal'>Verifikasi Gagal. Silahkan coba kembali</div>";
            $script =  "<script> $(document).ready(function(){ $('#daftar').modal('show'); }); </script>";
        }
    }
    else {
        $error_msg = "<div class='login-modal'>Galat!</div>";
        $script =  "<script> $(document).ready(function(){ $('#daftar-modal').modal('show'); }); </script>";
    }
}
?>