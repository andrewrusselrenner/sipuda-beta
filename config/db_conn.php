<?php 
include_once('db_data.php');

ob_start();

$db = new PDO("mysql:host=".$servurl.";port=3306;dbname=".$db_name, $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//$anggota = new User($con);


// koneksi ke db
$con = @mysqli_connect($servurl, $username, $password, $db_name);

// cek koneksi
if (mysqli_connect_errno())
  {
  echo "Sambungan ke database bermasalah: " . mysqli_connect_error();
  }

?>