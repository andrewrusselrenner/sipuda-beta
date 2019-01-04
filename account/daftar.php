<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

if(empty($_SESSION['masuk']) && $_SESSION['masuk']==false)
{

include('register-engine.php');

$page_title = 'Daftar Akun SIPUDA';
include_once(ROOT_PATH.'/pages/header.php');
?>

<body>
  <div class="main-page py-2 text-center d-flex flex-column flex-fill" style="background-image: url('<?php echo $coverbkglog ?>');	width: 100%;	background-size: cover;	background-position: center;	background-repeat: no-repeat; background-attachment: fixed;">
    <div class="py-4 text-center">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg col-10 bg-white p-3 mx-5 shadow-lg">
            <div class="row">
              <div class="px-0 col-md-1 py-2">
                <img src="<?php echo $thelogo ?>" class="img-responsive img-thumbnail shadow-sm" width="77">
              </div>
              <div class="col-md-0">
                <h3 class="display-3 font-weight-bold">SIPUDA</h3>
              </div>
            </div>
            <h1 class="text-left mt-4 font-weight-bold">Pendaftaran</h1>
            <p class="mb-3 text-left">Sudah punya akun? <a href=<?php BASE_URL."account/login";?>>Masuk</a></p>
            <?php if(isset($error_msg)){ echo $error_msg; } ?>
            <form class="text-left" name="daftar" method="POST" id="daftarForm" onsubmit="return pwvalidasi();">
            <script>
                function submitForm() {
                    document.getElementById("daftarForm").submit();
                }
            </script>
              <div class="form-row">
                <div class="form-group col-md-6">     
                  <label for="namad">Nama Depan</label> 
                  <input type="text" class="form-control" name="namad" placeholder="Cth: Celine" required="required"> 
                </div>
                <div class="form-group col-md-6">
                  <label for="namab">Nama Belakang</label> 
                  <input type="text" class="form-control" name="namab" placeholder="Cth: Sondakh" required="required"> 
                </div>
              </div>
              <div class="form-group"> 
                <label for="email">Surel</label> 
                <input type="email" class="form-control" name="email" id="surel" onBlur="cekEmail()" placeholder="contoh.email@contoh.com" required="required"> 
                <span id="statusemail" style="font-size:12px;"></span> 
              </div>
              <div class="form-row">
                <div class="form-group col-md-6"> 
                  <label for="sandi">Kata Sandi</label> 
                  <input type="password" class="form-control" name="sandi" id="sandi" placeholder="Atur kata sandi yang mudah diingat" required="required"> </div>
                <div class="form-group col-md-6"> 
                  <label for="konfirmasikatasandi">Konfirmasi Kata Sandi</label> 
                  <input type="password" class="form-control" name="konfirmasikatasandi" id="konfirmasikatasandi" placeholder="Masukkan kata sandi kembali" required="required"> 
                  <span id='message'></span>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-2">
                  <label for="idcard">Jenis Kartu Identitas</label>
                  <select class="form-control bg-primary d-flex w-100" id="idcard" name="idcard">
                    <option class="text-white" value="KTP">KTP</option>
                    <option class="text-white" value="SIM">SIM</option>
                    <option class="text-white" value="Kartu Pelajar">Kartu Pelajar</option>
                  </select>
                </div>
                <div class="form-group col-md-10"> 
                  <label for="noid">No. Identitas</label> 
                  <input type="number" class="form-control" name="noid" placeholder="Cth: 640012506980002" required="required"> 
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4"> 
                  <label for="tptlahir">Tempat Lahir</label> 
                  <input type="text" class="form-control" name="tptlahir" placeholder="Cth: Balikpapan" required="required"> 
                </div>
                <div class="form-group col-md-4">
                  <label for="tgllahir">Tanggal Lahir</label> 
                  <input type="date" class="form-control" name="tgllahir" id="tgllahir" required="required">
                </div>
                <div class="form-group col-md-4">
                  <label for="gender">Jenis Kelamin</label>
                  <select class="form-control bg-primary d-flex w-100" id="gender" name="gender">
                    <option class="text-white" value="Laki-Laki">Laki-Laki</option>
                    <option class="text-white" value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="jobstatus">Status Pekerjaan</label>
                  <select class="form-control bg-primary d-flex w-100" id="jobstatus" name="jobstatus">
                    <option class="text-white" value="Pelajar">Pelajar</option>
                    <option class="text-white" value="Mahasiswa">Mahasiswa</option>
                    <option class="text-white" value="Wiraswasta">Wiraswasta</option>
                    <option class="text-white" value="Pegawai Sipil">Pegawai Sipil</option>
                    <option class="text-white" value="Belum Bekerja">Belum Bekerja</option>
                  </select>
                </div>
                <div class="form-group col-md-6"> <label for="nope">Nomor Telefon</label> <input type="number" class="form-control" id="nope" name="nope" placeholder="Cth: 081234567890" required="required"> </div>
              </div>
              <div class="form-group"> 
                <label for="almt">Alamat</label> 
                <input type="text" class="form-control" name="almt" placeholder="Cth: Jl. Mulawarman RT.06 No.5 Kel. Mekar Sari Balikpapan Selatan" required="required"> 
              </div>
              <div class="form-group">
                <p> Dengan mengklik tombol "Ajukan Akun" dibawah ini, saya sudah membaca dan menyetujui <a href=<?php echo BASE_URL."pages/syaratketentuan.php" ?>>Syarat dan Ketentuan</a> baik dari sisi perpustakaan maupun situs SIPUDA ini. </p>
              </div>
              <div class="form-group">
                <div class="g-recaptcha" data-sitekey="<?php echo GSITE_KEY ?>"></div>
              </div>
              <button type="submit" name="daftar" id="daftar" class="btn btn-primary btn btn-primary btn-lg w-100" data-callback="submitForm" data-badge="inline">Ajukan Akun</button>
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