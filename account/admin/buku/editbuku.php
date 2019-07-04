<?php
$url = $_SERVER['REQUEST_URI'];

if (strpos($url,'viewBook') !== false)
{
    $juduls = $baris['judul_buku'];
    $desks = $baris['deskripsi_singkat'];
    $authors = $baris['pengarang'];
    $ttb = date("Y-m-d", strtotime($baris['tahun_terbit']));
    $availability = $status_buku;
    $hals = $baris['lbr_halaman'];
    $categorys = $baris['kategori'];
    $nopangs = $baris['nomor_panggil'];
    $isbns = $baris['isbn'];
    $penerbits = $baris['penerbit'];
    $salinans = $baris['numofcopies'];
    $gambars = $baris['gambar'];
}
else{
    $juduls = $title;
    $desks = $desksing;
    $authors = $author1;
    $ttb = $tahuntbt2;
    $availability = $statusbuku;
    $hals = $lbrhal;
    $categorys = $kategori;
    $nopangs = $nompang;
    $isbns = $isbnum;
    $penerbits = $penerbit;
    $salinans = $copies;
    $gambars = $gambar;
}

?>  
  
  <div class="modal fade" id="suntingbuku<?php echo $nopangs ?>" tabindex="-1" role="dialog" aria-labelledby="suntingbukuLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sunting Buku</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">
        <h3>Untuk Kolom Ketersediaan, mohon dicek kembali pilihannya berdasarkan apakah buku ada atau tidak. <strong>Nomor panggil</strong> tidak dapat disunting/edit!. </h3>
        <form method="POST" action="editbook.php" id="sunting<?php echo $nopangs; ?>" onsubmit="nyuntingbuku(this.id)">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="juduls">Judul Buku</label> <input type="text" class="form-control" id="juduls" placeholder="Cth : Buku Panduan Memasak" required="required" name="juduls" value="<?php echo $juduls ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="deskripsis">Deskripsi</label> <input type="text" class="form-control" id="deskripsis" placeholder="Deskripsi Singkat Buku" required="required" name="deskripsis" value="<?php echo $desks ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="authors">Pengarang/Author</label> <input type="text" class="form-control" id="authors" placeholder="Cth : Budiman" required="required" name="authors" value="<?php echo $authors ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> <label for="tahunterbits">Tanggal Terbit</label> <input type="date" class="form-control" id="tahunterbits" required="required" name="tahunterbits" value="<?php echo $ttb ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> <label for="ketersediaans">Ketersediaan. Saat ini: <?php echo $availability ?>.</label>
                <select class="form-control bg-primary d-flex w-100 text-white" id="ketersediaans" name="ketersediaans">
                  <option class="text-white" value="1">Ada</option>
                  <option value="0" class="text-white">Tidak Ada</option>
                  <option value="2" class="text-white">Hilang</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> <label for="hals">Jumlah Halaman</label> <input type="number" class="form-control" id="hals" required="required" name="hals" placeholder="Cth : 136" value="<?php echo $hals ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> <label for="categorys">Kategori</label> <input type="text" class="form-control" id="categorys" required="required" name="categorys" placeholder="Cth : Sains dan Fiksi" value="<?php echo $categorys ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> <label for="nopangs">Nomor Panggil</label> <input type="text" class="form-control" id="nopangs" required="required" name="nopangs" placeholder="Cth : AD-2810" value="<?php echo $nopangs ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> <label for="isbns">ISBN</label> <input type="text" class="form-control" id="isbns" required="required" name="isbns" placeholder="13 digit nomor ISBN" value="<?php echo $isbns ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="penerbits">Penerbit</label> <input type="text" class="form-control" placeholder="Cth : Percetakan Surya Nuansa" required="required" id="penerbits" name="penerbits" value="<?php echo $penerbits ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="gambars">Tautan Gambar</label> <input type="url" class="form-control" placeholder="Cth : http://imgurl.com/IghsxS.jpg" required="required" id="gambars" name="gambars" value="<?php echo $gambars ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> <label for="jenisbahans">Jenis Bahan</label>
                <select class="form-control bg-primary d-flex w-100 text-white" id="jenisbahans" name="jenisbahans">
                  <?php
                  if($sqlkat->rowCount() > 0)
                  {
                      foreach($hasilkat as $hasilk)
                      {
                          echo "<option class='text-white' value=".htmlentities($hasilk->nama).">".htmlentities($hasilk->nama)."</option>";
                      }
                  }
                  else{
                      echo "<option class='text-white'>Tidak ada jenis bahan tercatat</option>";
                  }
                  ?>
                  <!--<option class="text-white" value="Monograf">Monograf</option>
                  <option value="Digital" class="text-white">Digital</option>
                  <option value="Komik" class="text-white">Komik</option>-->
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> <label for="salinans">Jumlah Buku Salinan</label> <input type="text" class="form-control" id="salinans" required="required" name="salinans" placeholder="Masukkan jumlah buku yang sama" value="<?php echo $salinans ?>">
              </div>
            </div>
          </div>
          </form>
        </div>
        <div class="modal-footer"> 
          <input type="submit" name="sunting" id="sunting" class="btn btn-primary" value="Simpan" />
          <!-- <button class="btn btn-primary" id="sunting" name="sunting">Simpan</button> -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> 
        </div>        
      </div>
    </div>
  </div>
  
  <!-- Modal jika sukses -->
<div class="modal fade" id="suksesmodal2">
  <div class="modal-dialog">
    <div class="modal-content">

      
      <div class="modal-header">
        <h4 class="modal-title">Sukses</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      
      <div class="modal-body text-center">
        
      </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script>
/* script sunting buku untuk di dasbor */
function nyuntingbuku(id) {
    var nopang = id;
    console.log("pass function say, yeay");
    $(this).closest("form").attr('id').on("submit", function(e) {
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        console.log('oke');
        alert($(this).attr("id"));
        $.ajax({
            url: formURL,
            type: "POST",
            data: postData,
            success: function(data, textStatus, jqXHR) {
                $('#suntingbuku').modal('hide'); 
                $('#suksesmodal2').modal('show');
                //$('#suksesmodal .modal-header .modal-title').html("Sukses");
                $('#suksesmodal2 .modal-body').html(data);
                $('#bukutable').load('buku/tabel.php');
                console.log('sukses');
                //$("#tambah").remove();
            },
            error: function(jqXHR, status, error) {
                console.log(status + ": " + error);
            }
        });
        e.preventDefault();
    });
}
</script>