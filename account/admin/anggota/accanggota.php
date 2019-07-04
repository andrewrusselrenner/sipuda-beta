<!-- Acc buku Modal -->
<div class="modal fade" id="anggotamodal<?php echo $idmem ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Konfirmasi Anggota</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body text-center">
        <span class="fas fa-question-circle fa-4x"></span>
        <h2 class="display-3">Ingin dikonfirmasi?</h2>
        <?php
        echo "<p>Anda akan mengkonfirmasi akun dengan nomor anggota ".$idmem." dan dengan nama ".$namad." ".$namab.", jenis identitas ".$jki." dengan nomor identitas ".$noid.".</p>";
        ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button data-toggle="modal" data-target="#accsukses" data-id="<?php echo $idmem ?>" id="acc" class="btn btn-outline-primary"><li class="fas fa-check"> Konfirmasi</li></button>
        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Delbook modal -->
<div class="modal fade" id="accsukses">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi Anggota Sukses</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-center p-3" id="accDetail">
                <p class="py-2">
                <div id="modal-loader4" style="display: none; text-align: center;">
                    <!-- ajax loader -->
                    <img src="https://static-steelkiwi-dev.s3.amazonaws.com/media/filer_public/4e/07/4e07eece-7c84-46e2-944d-1a6b856d7b5f/463ff844-6f36-4ffe-b051-fea983d39223.gif">
                </div>                  
                <div id="dynamic-content4"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>