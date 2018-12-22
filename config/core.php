<?php
// lapor kalo ada error
error_reporting(E_ALL);

// memulai sesi php
if(!isset($_SESSION)) 
{ 
  session_start(); 
}

// atur default zona waktu, pake WITA Makassar
date_default_timezone_set('Asia/Makassar');

// url halaman beranda
$home_url="localhost/";

// atau halaman berandanya disini
if(!defined('BASE_URL')) define('BASE_URL', 'http://localhost/');

// mendefinisikan direktori file-file php
if(!defined('ROOT_PATH')) define('ROOT_PATH', $_SERVER['DOCUMENT_ROOT']);

// page given in URL parameter , default page is one (mbob opo iki)
$page = isset($_GET['page']) ? $_GET['page'] : 1;

//set number of records per page
$records_per_page = 5;

// calculate for the query LIMIT clause (kayanya disuruh hitung kueri batas login mboh deh)
$from_record_num = ($records_per_page * $page) - $records_per_page;

//load classes as needed
spl_autoload_register(function ($class) {
   
    $class = strtolower($class);
 
     //if call from within assets adjust the path
    $classpath = 'classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
       require_once $classpath;
     } 	
     
     //if call from within admin adjust the path
    $classpath = '../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
       require_once $classpath;
     }
     
     //if call from within admin adjust the path
    $classpath = '../../classes/class.'.$class . '.php';
    if ( file_exists($classpath)) {
       require_once $classpath;
     } 		
      
 });

?>