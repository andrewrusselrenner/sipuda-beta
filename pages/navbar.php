  <!-- Navigation bar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top d-flex justify-content-md-center" id="mainNav" >
    <div class="container-fluid">
      <!--
        nanti logo taro disini
      -->
      <a class="navbar-brand js-scroll-trigger " href=<?php echo $home_url ?>>Sipuda Web App</a>
      <!-- kalo misalnya layarnya tambah mengecil -->
      <button class="navbar-toggler navbar-toggler-right shadow p-3" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation" style="text-shadow: black 0px 0px 8px;"> Menu <i class="fa fa-bars"></i>
        <!--<span class="navbar-toggler-icon"></span>-->
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <!-- <a class="navbar-brand d-none d-md-block" href="#">
          <i class="fa d-inline fa-lg fa-circle"></i>
          <b> Sipuda</b>
        </a>
      -->
        <!-- Menu yang ditengah -->
        <ul class="navbar-nav mx-md-auto">
          <li class="nav-item"> 
            <a class="nav-link js-scroll-trigger anime-link" href="/pages/features.php">Fasilitas</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link js-scroll-trigger anime-link" href="/pages/catalog.php">Katalog</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link js-scroll-trigger anime-link" href="/pages/about.php">Tentang</a> 
          </li>


<!--
          ?php
          Cek jika si anggota sudah masuk
          //jika sudah masuk, tampilkan opsi "Akun Saya" dan "Keluar"
          if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true && $_SESSION['level_akses']=='Anggota'){
            ?>
          <ul class="navbar-nav mx-6">
          <li class="nav-item" ?php echo $page_title=="Akun Saya" ? "class='active'" : "" ?>> 
            <a class="nav-link anime-link" href="?php echo $home_url; ?>/account/index.php">Halo ?php echo $_SESSION['nama_depan']; ?>!</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link anime-link" href="?php echo $home_url; ?>/account/logout.php">Keluar</a> 
          </li>
        </ul>
        ?php
          }

          //jika si anggota belm masuk, maka tampilkan tombol "masuk" dan "registrasi"
          else {
          ?>
          -->

          <!-- Untuk login, register/myaccount, atau keluar -->
        </ul>
        <ul class="navbar-nav mx-6">
          <li class="nav-item">
            <a class="nav-link anime-link" href="/account/login">Masuk</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link anime-link" href="/account/register">Daftar</a>
          </li>
        </ul>
        <!--
        ?php
          }
        ?>
        -->
      </div>
    </div>
  </nav>