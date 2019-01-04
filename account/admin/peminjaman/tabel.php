<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/account/admin/index-engine.php');
?>

<div class="table-responsive" id="daftarpinjambuku">
    <table class="table">
        <thead class="text-md-center">
            <tr>
                <th>Aksi</th>
                <th>#</th>
                <th>No.Panggil</th>
                <th>Judul Buku</th>
                <th>Pengarang</th>
                <th>Tahun Terbit</th>
                <th>Status Buku</th>
                <th>ISBN</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if($sql3->rowCount() > 0)
        {
            foreach($results3 as $result3)
            {
                // deklarasi supaya enak manggilnya
                $nopang = htmlentities($result3->nomor_panggil);
                $judul = htmlentities($result3->judul_buku);
                $author = htmlentities($result3->pengarang);
                $tahunterbit = date('Y',strtotime($result3->tahun_terbit));
                $bstatus = htmlentities($result3->status_buku);
                $isbn = htmlentities($result3->isbn);
                $tglpeminjaman = date('d M, Y',strtotime($result3->tgl_peminjaman));
                $tglpengembalian = date('d M, Y',strtotime($result3->tgl_pengembalian));

                //mengconvert dari angka ke string
                if($bstatus == '0')
                {
                    $status_buku = 'Sedang Dipinjam';
                }
                else if($bstatus == '1')
                {
                    $status_buku = 'Tersedia';
                }
                else if($bstatus == '2')
                {
                    $status_buku = 'Hilang';
                }
                else
                {
                    $status_buku = 'Tidak diketahui keadaannya';
                }
        ?>
            <tr>
                <td>
                <?php 
                echo "<a href='".BASE_URL."pages/viewBook?nopang=".$nopang."' class='btn btn-outline-primary'><i class='fas fa-book-open '></i> Detil</a>";
                echo "<a href='".BASE_URL."account/admin/pinjam/perpanjangbuku?nopang=".$nopang."' class='btn btn-outline-primary'><i class='fas fa-edit '></i> Perpanjang</a>";
                echo "<a href='' class='btn btn-outline-primary' data-toggle='modal' data-target='#suntingpinjam".htmlentities($result3->id_peminjaman)."'><i class='fas fa-check'></i> Acc Peminjaman</a>";
                echo "<a class='btn btn-outline-danger' data-toggle='modal' data-target='#hapuspinjam'><i class='fas fa-trash '></i> Hapus</a>";
                include("suntingpinjam.php");
                echo htmlentities($result3->id_peminjaman);
                ?>
                </td>
                <td><?php echo $hitung2;?></td>
                <td><?php echo $nopang;?></td>
                <td><?php echo $judul;?></td>
                <td><?php echo $author;?></td>
                <td><?php echo $tahunterbit;?></td>
                <td><?php echo $status_buku;?></td>
                <td><?php echo $isbn;?></td>
                <td><?php echo $tglpeminjaman;?></td>
                <td><?php echo $tglpengembalian;?></td> 
                <?php
                $hitung2=$hitung2+1;
                
            }
        }
                ?>
            </tr>
        </tbody>
    </table>
</div>