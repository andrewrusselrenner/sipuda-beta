<!-- Inti panjang Modal -->
<div class="modal fade" id="panjangbuku<?php echo htmlentities($result3->id_peminjaman) ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Perpanjangan Buku</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text-center">
        <span class="fas fa-question-circle fa-4x"></span>
        <h2 class="display-3">Ingin diperpanjang?</h2>
        <?php
        if(isset($nopang))
        {
            echo "<p>Anda akan memperpanjang buku ".$judul." dengan nomor panggil ".$nopang.". Tindakan ini tidak dapat dibatalkan.</p>";
        }
        else{
            echo "<p>Anda akan memperpanjang buku ".$baris['judul_buku']." dengan nomor panggil ".$baris['nomor_panggil'].". Tindakan ini tidak dapat dibatalkan.</p>";
        }
        ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button data-toggle="modal" data-target="#panjang" data-id="<?php 
        if(isset($nopang))
        {
            echo $nopang;
        }
        else
        {
            $nopangs = $baris['nomor_panggil'];
            echo $nopangs;
        }?>" id="panjang" class="btn btn-outline-primary"><li class="fas fa-check"> Perpanjang</li></button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Perpanjang modal -->
<div class="modal fade" id="panjangbukusukses">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Perpanjang Buku</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center p-3" id="panjangDetail">
                <p class="py-2">
                <div id="modal-loader5" style="display: none; text-align: center;">
                    <!-- ajax loader -->
                    <img src="https://static-steelkiwi-dev.s3.amazonaws.com/media/filer_public/4e/07/4e07eece-7c84-46e2-944d-1a6b856d7b5f/463ff844-6f36-4ffe-b051-fea983d39223.gif">
                </div>                  
                <div id="dynamic-content5"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>