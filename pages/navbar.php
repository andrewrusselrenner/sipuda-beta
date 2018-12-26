  <!-- Navigation bar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top d-flex justify-content-md-center" id="mainNav" >
    <div class="container-fluid">
      <!--
        nanti logo taro disini
      -->
      <a class="navbar-brand js-scroll-trigger " href=<?php echo BASE_URL ?>>Sipuda Web App</a>
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
            <a class="nav-link js-scroll-trigger anime-link" href="/pages/features">Fasilitas</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link js-scroll-trigger anime-link" href="/pages/catalog">Katalog</a> 
          </li>
          <li class="nav-item"> 
            <a class="nav-link js-scroll-trigger anime-link" href="/pages/about">Tentang</a> 
          </li>
        </ul>
          <ul class="navbar-nav mx-3">
          <?php
          //Cek jika si anggota sudah masuk
          //jika sudah masuk, tampilkan opsi "Akun Saya" dan "Keluar"
          if(isset($_SESSION['masuk']) && $_SESSION['masuk']==true && $_SESSION['Level_Akses']=='Anggota')
          {
            ?>
            
              <li class="nav-item" <?php /*echo $page_title=="Akun Saya" ? "class='active'" : ""; */?>> 
                <a class="nav-link anime-link" href="<?php echo BASE_URL; ?>account/index">Akun Saya</a> 
              </li>
              <li class="nav-item"> 
                <a class="nav-link anime-link" href="<?php echo BASE_URL; ?>account/logout">Keluar</a> 
              </li>
            <?php
          }
          // Ditampilkan untuk yg punya hak akses Admin
          else if(isset($_SESSION['masuk']) && $_SESSION['masuk']==true && $_SESSION['Level_Akses']=='Admin')
          {
            ?>
              <li class="nav-item" <?php /*echo $page_title=="Akun Saya" ? "class='active'" : ""; */?>> 
                <a class="nav-link anime-link" href="<?php echo BASE_URL; ?>account/admin/index">Dasbor</a> 
              </li>
              <li class="nav-item"> 
                <a class="nav-link anime-link" href="<?php echo BASE_URL; ?>account/logout.php">Keluar</a> 
              </li>
            <?php
          }
          //jika si anggota belum masuk, maka tampilkan tombol "masuk" dan "registrasi"
          else 
          {
            ?>
            <li class="nav-item">
              <a class="nav-link anime-link" href="/account/login">Masuk</a> 
            </li>
            <li class="nav-item"> 
              <a class="nav-link anime-link" href="/account/daftar">Daftar</a>
            </li>
        <?php
          }
        ?>
        </ul>
      </div>
    </div>
  </nav>