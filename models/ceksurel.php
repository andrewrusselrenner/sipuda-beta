<?php 
include($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');

// Cek jika email/surel sudah ada di db
if(!empty($_POST["surel"])) 
{
	$email = $_POST["surel"];
    if (filter_var($surel, FILTER_VALIDATE_EMAIL)===true) 
    {
		$sql ="SELECT surel FROM sipudalmstest WHERE surel=:email";
        
        $query  = $dbs -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> execute();
        $results = $query -> fetchAll(PDO::FETCH_OBJ);
        $cnt     = 1; // opo iki yo?
        
        if($query -> rowCount() > 0)
        {
            echo "<span style='color:red'> Surel sudah terdaftar!.</span>";
            echo "<script>$('#submit').prop('disabled',true);</script>";
        } 
        else
        {
	        echo "<span style='color:green'> Surel belum terdaftar. Anda dapat menggunakannya.</span>";
            echo "<script>$('#submit').prop('disabled',false);</script>";
        }
	}
    else 
    {
        echo "Maaf. Surel yang Anda masukkan tidak valid. Mohon cek kembali.";
    }
}
?>
