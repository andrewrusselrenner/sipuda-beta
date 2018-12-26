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

// Google ReCaptcha V2 (Checkbox) Setting Disini
if(!defined('GSECRET_KEY')) define('GSECRET_KEY', '6LevK4QUAAAAAHCpg2O0kbnSAioXNh7KZTZO-pYO');
if(!defined('GSITE_KEY')) define('GSITE_KEY', '6LevK4QUAAAAAFqmQHpzTlK7HGYNq9hGl5iW2UGg');

// Google ReCaptcha V3 Setting Disini
if(!defined('GCSECRET_KEY')) define('GCSECRET_KEY', '6LcmLYQUAAAAABVTn05T8F_sn2nSRHgd49gTmYei');
if(!defined('GCSITE_KEY')) define('GCSITE_KEY', '6LcmLYQUAAAAAH7EnCZy_Aw-GIn1rW63Ka9W7IHt');

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


 // Social Media Links, just insert username
 $fb      = 'benscott28';
 $twitter = '_ariffahmi';
 $ig      = 'simonickalexs';

if(!defined('FB_LINK')) define('FB_LINK', 'http://fb.com/'.$fb);
if(!defined('IG_LINK')) define('IG_LINK', 'http://instagram.com/'.$ig);
if(!defined('TWITTER_LINK')) define('TWITTER_LINK', 'http://twitter.com/'.$fb);
?>