  <div class="modal fade" id="tambahpinjam" tabindex="-1" role="dialog" aria-labelledby="tambahpinjamLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Peminjaman</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">
        <form method="POST" action="peminjaman/addpinjam.php" id="tambahpinjamform">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="anggotaid">ID Anggota</label> <input type="text" class="form-control" id="anggotaid" placeholder="Cth : 4152" required="required" name="anggotaid">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="nopango">Nomor Panggil Buku</label> <input type="text" class="form-control" id="nopango" placeholder="Cth : CA-115" required="required" name="nopango">
              </div>
            </div>
          </div> 
        </form>
        </div>
        <div class="modal-footer"> 
          <input type="submit" name="tambahin" id="tambahin" class="btn btn-primary" value="Simpan" />
          <!--<button type="button" name="tambah" id="tambah" class="btn btn-primary" value="Simpan">Simpan</button> -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> 
        </div>        
      </div>
    </div>
  </div>
  <!-- Modal jika sukses -->
<div class="modal fade" id="suksesmodal4">
  <div class="modal-dialog">
    <div class="modal-content">

      
      <div class="modal-header">
        <h4 class="modal-title">Sukses</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      
      <div class="modal-body">
        
      </div>

      
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>

    </div>
  </div>
</div>