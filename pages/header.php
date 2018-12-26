<?php 
include($_SERVER['DOCUMENT_ROOT'].'/config/metadata.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/config/core.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compability" content="IE=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <meta name="description" content="<?php echo($description); ?>">
    <meta name="author" content="<?php echo($author); ?>">
    <title><?php echo ($page_title)." | ".($title); ?></title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- for material design, if we use it, otherwise, just delete this -->
    <!--
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    -->
  <!-- Pake kustom theme -->
  <link rel="stylesheet" href="<?php echo BASE_URL."vendor/css/theme.css" ?>" type="text/css">

  <!-- Gambar ikon (favicon)-->
  <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicon/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicon/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicon/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicon/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicon/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicon/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicon/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicon/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicon/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="assets/images/favicon/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicon/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon/favicon-16x16.png">
  <link rel="manifest" href="assets/images/favicon/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/images/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <link rel="shortcut icon" href="<?php echo BASE_URL."images/favicon/favicon.ico"?>"/>

  <!-- Script: Animated entrance -->
  <script src="<?php echo BASE_URL."vendor/js/animate-in.js"?>"></script>
  <script src="<?php echo BASE_URL."vendor/js/anime.min.js"?>"></script>
  
  <!-- JQuery CDN dari Microsoft -->
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js" async></script>
  <?php include_once('script.php'); ?>

  <?php
  $loginpage = '/account/login';
  $sekenlogin = '/account/login.php';
  $signuppage = '/account/daftar';
  $sekendaftar = '/account/daftar.php';
  $currentpage = $_SERVER['REQUEST_URI'];
  
  if($currentpage == $loginpage || $currentpage == $sekenlogin)
  {
    ?>
    <script src='https://www.google.com/recaptcha/api.js?render=<?php echo GCSITE_KEY ?>'></script>
    <script>
      grecaptcha.ready(function() {
        grecaptcha.execute(<?php echo GCSITE_KEY ?>, {action: 'masuk'})
        .then(function(token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
        });
      });
    </script>
    <?php
  }
  else if($currentpage == $signuppage || $currentpage == $sekendaftar)
  {
    ?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script type="text/javascript">
        var check = function() {
            if (document.getElementById('sandi').value ==
            document.getElementById('konfirmasikatasandi').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'matching';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'not matching';
            }
        }
    </script>

<script>
    function cekEmail() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "/models/ceksurel.php",
            data:'surel='+$("#surel").val(),
            type: "POST",
        
            success:function(data)
            {
                $("#statusemail").html(data);
                $("#loaderIcon").hide();
            },
        error:function (){}
        });
    }
</script>
    <?php
  }
  else
  {
     //Nothing
  }
  ?>
</head>