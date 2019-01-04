<?php
require($_SERVER['DOCUMENT_ROOT'].'/config/dbconnection.php');
require($_SERVER['DOCUMENT_ROOT'].'/config/core.php');

// Fetching semua buku
    $query = "SELECT * FROM buku WHERE tgl_ditambahkan ORDER BY buku.tgl_ditambahkan DESC LIMIT 8";
    $raw_result = mysqli_query($con, $query);

    if ($raw_result > 0) {
        ?>
    <div class="py-4 my-5">
        <div class="container-fluid my-5">
        <h1 class="text-center mb-3">Buku baru telah tiba!</h1>
            <div class="row w-5 mx-auto col-md-auto content-center">
                <?php
                while ($result = $raw_result->fetch_assoc()) {
                    ?>
                    <div class="col-md-3 py-2">
                        <div class="card" style="height: 771px;">
                            <img class="card-img-center img-fluid" src= <?php echo $result['gambar'] ?> alt="Buku Perpus" style="height: 453px; width: 328px;">
                            <div class="card-body">
                                <h4 class="card-title"><?php echo $result['judul_buku'] ?></h4>
                                <p class="card-text"><?php echo $result['pengarang'] ?> </p>
                                <?php
                                //mengconvert dari angka ke string
                                if ($result['status_buku'] == '0') {
                                    $status_buku = 'Sedang Dipinjam';
                                } elseif ($result['status_buku'] == '1') {
                                    $status_buku = 'Tersedia';
                                } elseif ($result['status_buku'] == '2') {
                                    $status_buku = 'Hilang';
                                } else {
                                    $status_buku = 'Tidak diketahui keadaannya';
                                } ?>

                                <p class="card-text"><?php echo date("Y", strtotime($result['tahun_terbit'])) ?> </p>
                                <p class="card-text"><?php echo $status_buku ?> </p>
                            </div>
                            <div class="card-footer">
                            <?php
                                echo "<a href='pages/viewBook?nopang=".$result['nomor_panggil']."' class='btn btn-outline-primary btn-lg'>Detil Buku</a>"; ?>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
                </div>
            </div>                    
        </div>
    <?php
    }
    else if($raw_result < 0)
    {
        echo "<h4 class='display-3'>Hmmm... Sepertinya belum ada buku di katalog perpustakaan. :|</h4>";
    }
    ?>