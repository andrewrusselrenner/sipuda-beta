<?php
include('dbdata.php');

// Mengkoneksikan ke database dengan metode PDO
try
{
    $dbs = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPW,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $err)
{
    exit("Hayoo error: " . $err->getMessage());
}

// koneksi ke db dengan metode MySQLi
$con = @mysqli_connect(DBHOST, DBUSER, DBPW, DBNAME);

// cek koneksi
if (mysqli_connect_errno())
  {
  echo "Sambungan ke database bermasalah: " . mysqli_connect_error();
  }

?>