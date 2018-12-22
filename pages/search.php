<?php

include($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');

$page_title = 'Hasil Pencarian';
include('header.php');
include('navbar.php');

echo '<body>';

// mendapatkan keyword yg dicari dari form pencarian
$query = $_GET['q']; 

// atur panjang minimal kueri
$min_length = 3;

if(strlen($query) >= $min_length)
{ // jika panjang kueri lebih dari atau sama dengan panjang minimal kueri, lalu         
  $query = htmlspecialchars($query); 
  // mengganti sebuah karakter yg biasa digunakan di html sebagai ekuivalen (susah kata-katanya :v). contoh: "<" menjadi "&gt" gitu pokoknya
         
  $query = mysqli_real_escape_string($con, $query);
  // memastikan gak ada yg coba inject SQL ;)
        
  //sql query
  $sql = "SELECT * FROM buku
  WHERE (`judul_buku` LIKE '%".$query."%') OR (`isbn` LIKE '%".$query."%') OR (`nomor_panggil` LIKE '%".$query."%') OR (`pengarang` LIKE '%".$query."%')";
   
  /*
  ** '*' artinya pilih semua bidang, bisa juga ketik yg lebih  spesifik kaya 'id', 'judul_buku', 'pengarang'.
  ** 'buku' itu nama tabelnya.
  ** %query% itu kata kunci apa yang mau kita cari, % artinya apa aja.
  ** contoh, jika $query -nya itu Earthfall,
  ** maka hasilnya yang ada kata Earthfall, jadinya "Earthfall", "Earthfall PT1", "earthfall", "earthfallbook"
  ** tapi kalo mau pake yang kata-katanya harus pas atau sama,
  ** gunakan '% $query %' ...OR ... '$query %' ... OR ... '% $query'
  */

  //mendeklarasikan $raw_results untuk kuero kotornya
  $raw_results = mysqli_query($con, $sql);

  include('searchindex.php');
         
}
else
{ // jika kueri kurang dari minimal huruf yg sudah ditentukan
  echo "Minimal huruf ".$min_length;
}

include('footer.php');

/* tutup koneksi */
mysqli_close($con)
?>
