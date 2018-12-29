<?php

$judulbuku = $baris['judul_buku'];
$qsalin = $dbs->prepare('SELECT * FROM buku WHERE judul_buku=:judulbuku');
$qsalin->execute(array(':judulbuku' => $judulbuku));
$hasilq = $qsalin->fetch();
$hitung = 1;

if($qsalin->rowCount() >= 1)
{
    if(isset($baris['kategori']))
    {
    $kategori = $baris['kategori'];
    $query = "SELECT * FROM buku WHERE kategori='$kategori' AND NOT(judul_buku='$judulbuku') ORDER BY buku.tgl_ditambahkan DESC LIMIT 4";
    $raw_result = mysqli_query($con, $query);

    ?>
    <div class="py-2 my-3">
        <div class="container-fluid my-2">
        <h1 class="text-center mb-3">Mungkin Anda Juga Suka Buku Ini</h1>
            <div class="row w-5 mx-auto col-md-auto content-center">
                <?php
                while($result = $raw_result->fetch_assoc())
                {
                    ?>
                    <div class="col-md-3 py-2">
                        <div class="card d-block" style="height: 771px;">
                            <img class="card-img-center img-fluid" src= <?php echo $result['gambar'] ?> alt="Buku Perpus" style="height: 453px; width: 328px;">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $result['judul_buku'] ?></h4>
                                <p class="card-text"><?php echo $result['pengarang'] ?> </p>
                                <?php
                                //mengconvert dari angka ke string
                                if($result['status_buku'] == '0')
                                {
                                    $status_buku = 'Sedang Dipinjam';
                                }
                                else if($result['status_buku'] == '1')
                                {
                                    $status_buku = 'Tersedia';
                                }
                                else if($result['status_buku'] == '2')
                                {
                                    $status_buku = 'Hilang';
                                }
                                else
                                {
                                    $status_buku = 'Tidak diketahui keadaannya';
                                }
                                ?>

                                <p class="card-text"><?php echo date("Y", strtotime($result['tahun_terbit'])) ?> </p>
                                <p class="card-text"><?php echo $status_buku ?> </p>
                            </div>
                            <div class="card-footer">
                            <?php
                                echo "<a href='viewBook?nopang=".$result['nomor_panggil']."' class='btn btn-outline-primary btn-lg'>Detil Buku</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>                    
        </div>
    <?php
    }
    else
    {
        $query = "SELECT * FROM buku ORDER BY buku.tgl_ditambahkan DESC LIMIT 4";
        $raw_result = mysqli_query($con, $query);
    ?>
        <div class="py-4 my-5">
        <div class="container-fluid my-5">
        <h1 class="text-center mb-3">Buku Baru Yang Mungkin Anda Suka</h1>
            <div class="row w-5 mx-auto col-md-auto content-center">
                <?php
                while($result = $raw_result->fetch_assoc())
                {
                    ?>
                    <div class="col-md-3 py-2">
                        <div class="card d-block" style="height: 771px;">
                            <img class="card-img-center img-fluid" src= <?php echo $result['gambar'] ?> alt="Buku Perpus" style="height: 453px; width: 328px;">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $result['judul_buku'] ?></h4>
                                <p class="card-text"><?php echo $result['pengarang'] ?> </p>
                                <?php
                                //mengconvert dari angka ke string
                                if($result['status_buku'] == '0')
                                {
                                    $status_buku = 'Sedang Dipinjam';
                                }
                                else if($result['status_buku'] == '1')
                                {
                                    $status_buku = 'Tersedia';
                                }
                                else if($result['status_buku'] == '2')
                                {
                                    $status_buku = 'Hilang';
                                }
                                else
                                {
                                    $status_buku = 'Tidak diketahui keadaannya';
                                }
                                ?>

                                <p class="card-text"><?php echo date("Y", strtotime($result['tahun_terbit'])) ?> </p>
                                <p class="card-text"><?php echo $status_buku ?> </p>
                            </div>
                            <div class="card-footer">
                            <?php
                                echo "<a href='pages/viewBook?nopang=".$result['nomor_panggil']."' class='btn btn-outline-primary btn-lg'>Detil Buku</a>";
                                ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>                    
        </div>
    <?php
    }
}
else if($qsalin->rowCount() >= 2)
{
    ?>
    <div class="row my-5">
        <div class="col-md-12">
          <h3 class="text-center">Buku Salinan&nbsp;<span class="badge badge-light"> Baru</span></h3>
          <hr class="bg-primary">
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Buku</th>
                  <th scope="col">Tahun Terbit</th>
                  <th scope="col">ISBN</th>
                  <th scope="col">Nomor Panggil</th>
                </tr>
              </thead>
              <tbody>
              <?php
              if($qsalin->rowCount() > 0)
              {
                  while($buku = $qsalin->fetch(PDO::FETCH_OBJ))
                  {
                      
                      echo "<tr>";
                        echo "<th scope='row'>".$hitung."</th>";
                        echo "<td>".htmlentities($buku->judul_buku)."</td>";
                        echo "<td>".date('Y', strtotime($buku->tahun_terbit))."</td>";
                        echo "<td>".htmlentities($buku->isbn)."</td>";
                        echo "<td>".htmlentities($buku->nomor_panggil)."</td>";
                      echo "</tr>";
                      
                      $hitung=$hitung+1;
                  }
              }
                ?>
              </tbody>
            </table>
          </div>
        </div>
    </div>
  <!--</div>-->
    <?php
}
?>