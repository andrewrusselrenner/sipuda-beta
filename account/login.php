<?php
include($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

include_once('login-engine.php');

if(empty($_SESSION['masuk']) && $_SESSION['masuk']==false)
{
$page_title = 'Akun SIPUDA';
include_once(ROOT_PATH.'/pages/header.php');
?>

<body>
  <div class="main-page py-5 text-center d-flex flex-column flex-fill" style="background-image: url('https://i.imgur.com/g1Sg25V.png'); height: 100%;	background-size: cover;	background-position: center;	background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="mx-auto col-md-6 col-10 bg-white p-4 shadow-lg">
          <div class="row">
            <div class="px-0 col-md-1 py-1">
              <img src="https://i.imgur.com/C1c0at7.png" class="img-responsive img-thumbnail shadow-sm" width="47">
            </div>
            <div class="col-md-0">
              <h2 class="my-1 text-left text-uppercase mx-1">Sipuda</h2>
            </div>
          </div>
          <h1 class="mb-3 mt-2 text-left font-weight-bold">Akun Sipuda</h1>
          <?php if(isset($error_msg)){ echo $error_msg; } ?>
          <form method="POST" id="loginform">
          <script>
            function submitForm() {
            document.getElementById("loginform").submit();
            }
          </script>
            <div class="form-group"> <input type="email" class="form-control" placeholder="Surel" name="surel" required autocomplete="off"> </div>
            <div class="form-group mb-3"> <input type="password" class="form-control" placeholder="Kata Sandi" name="katasandi" required autocomplete="off"> </div>
            <div class="form-group my-3"> 
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                <small class="form-text text-muted text-right">
                    <p class="mb-0 mt-2"><a href="lupasandi"> Lupa Kata Sandi?</a></p>
                    <p><a href="daftar"> Buat Akun</a></p>
                </small> 
            </div> 
            <button type="submit" name="masuk" class="loginmodal-submit g-recaptcha btn btn-outline-primary btn-lg w-50" data-callback="submitForm" data-badge="inline">Masuk</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  if(isset($script)){ echo $script; };
  include(ROOT_PATH.'/pages/script.php');
  ?>

</body>

</html>
<?php

}
else
{
  header("location: ".BASE_URL."index");
  exit();
}

?>