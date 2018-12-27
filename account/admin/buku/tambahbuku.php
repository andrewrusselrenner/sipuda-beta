
  <div class="modal fade" id="tambahbuku" tabindex="-1" role="dialog" aria-labelledby="tambahbukuLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Buku</h5> <button type="button" class="close" data-dismiss="modal"> <span>×</span> </button>
        </div>
        <div class="modal-body">
        <form method="POST" id="tambahbukuform">
          <!--<script>
            function submitForm() {
            document.getElementById("tambahbukuform").submit();
            }
          </script>-->
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="judul">Judul Buku</label> <input type="text" class="form-control" id="judul" placeholder="Cth : Buku Panduan Memasak" required="required" name="judul">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="deskripsiskt">Deskripsi</label> <input type="text" class="form-control" id="deskripsiskt" placeholder="Deskripsi Singkat Buku" required="required" name="deskripsiskt">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="author">Pengarang/Author</label> <input type="text" class="form-control" id="author" placeholder="Cth : Budiman" required="required" name="author">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> <label for="tahunterbit">Tahun Terbit</label> <input type="date" class="form-control" id="tahunterbit" required="required" name="tahunterbit">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> <label for="form3">Ketersediaan</label>
                <select class="form-control bg-primary d-flex w-100 text-white" id="ketersediaan" name="ketersediaan">
                  <option class="text-white" value="1">Ada</option>
                  <option value="0" class="text-white">Tidak Ada</option>
                  <option value="2" class="text-white">Hilang</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> <label for="hal">Jumlah Halaman</label> <input type="number" class="form-control" id="hal" required="required" name="hal" placeholder="Cth : 136">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> <label for="category">Kategori</label> <input type="text" class="form-control" id="category" required="required" name="category" placeholder="Cth : Sains dan Fiksi">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> <label for="nopang">Nomor Panggil</label> <input type="text" class="form-control" id="nopang" required="required" name="nopang" placeholder="Cth : AD-2810">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> <label for="isbn">ISBN</label> <input type="text" class="form-control" id="isbn" required="required" name="isbn" placeholder="12 digit nomor ISBN">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="penerbit">Penerbit</label> <input type="text" class="form-control" placeholder="Cth : Percetakan Surya Nuansa" required="required" id="penerbit" name="penerbit">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group"> <label for="gambar">Tautan Gambar</label> <input type="url" class="form-control" placeholder="Cth : http://imgurl.com/IghsxS.jpg" required="required" id="gambar" name="gambar">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group"> <label for="jenisbahan">Jenis Bahan</label>
                <select class="form-control bg-primary d-flex w-100 text-white" id="jenisbahan" name="jenisbahan">
                  <option class="text-white" value="Monograf">Monograf</option>
                  <option value="Digital" class="text-white">Digital</option>
                  <option value="Komik" class="text-white">Komik</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group"> <label for="salinan">Jumlah Buku Salinan</label> <input type="text" class="form-control" id="salinan" required="required" name="salinan" placeholder="Masukkan jumlah buku yang sama">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer"> 
          <input type="submit" name="tambah" id="tambah" class="btn btn-primary" value="Simpan" />
          <!--<button type="button" name="tambah" id="tambah" class="btn btn-primary" value="Simpan">Simpan</button> -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> 
        </div>
        </form>
      </div>
    </div>
  </div>
  <?php
  //include_once("addbooks.php");
  ?>