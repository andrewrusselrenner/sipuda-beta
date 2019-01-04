<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/account/admin/index-engine.php');
?>
<div class="table-responsive" id="daftarbuku">
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
                <th>Penerbit</th>
                <th>Tanggal Ditambahkan</th>
                <th>Tanggal Perubahan</th>
                <th>Jumlah Salinan</th>
                <th>Jumlah Lembar</th>
                <th>Kategori</th>
                <th>Jenis Bahan</th> 
            </tr>
        </thead>
        <tbody>
        <?php
            if($sql2->rowCount() > 0)
            {
                foreach($results2 as $result2)
                {
                    // deklarasi supaya enak manggilnya
                    $nompang = htmlentities($result2->nomor_panggil);
                    $title = htmlentities($result2->judul_buku);
                    $desksing = htmlentities($result2->deskripsi_singkat);
                    $author1 = htmlentities($result2->pengarang);
                    $tahuntbt = date('Y',strtotime($result2->tahun_terbit));
                    $tahuntbt2 = date('Y-m-d',strtotime($result2->tahun_terbit));
                    $bkstatus = htmlentities($result2->status_buku);
                    $isbnum = htmlentities($result2->isbn);
                    $penerbit = htmlentities($result2->penerbit);
                    $tgltbh = date('d M, Y',strtotime($result2->tgl_ditambahkan));
                    $tglubah = date('d M, Y',strtotime($result2->tgl_perubahan));
                    $copies = htmlentities($result2->numofcopies);
                    $lbrhal = htmlentities($result2->lbr_halaman);
                    $kategori = htmlentities($result2->kategori);
                    $jbahan = htmlentities($result2->jenis_bahan);
                    $gambar = htmlentities($result2->gambar);

                    //mengconvert dari angka ke string
                    if($bkstatus == '0')
                    {
                        $statusbuku = 'Sedang Dipinjam';
                    }
                    else if($bkstatus == '1')
                    {
                        $statusbuku = 'Tersedia';
                    }
                    else if($bkstatus == '2')
                    {
                        $statusbuku = 'Hilang';
                    }
                    else
                    {
                        $statusbuku = 'Tidak diketahui keadaannya';
                    }
        ?>
                    <tr>
                        <td>
                        <?php 
                        echo "<a href='".BASE_URL."pages/viewBook?nopang=".$nompang."' class='btn btn-outline-primary'><i class='fas fa-book-open '></i> Detil</a>";
                        echo "<a href='' class='btn btn-outline-primary' data-toggle='modal' data-target='#suntingbuku".$nompang."'><i class='fas fa-edit'></i> Sunting</a>";
                        echo "<a href='' class='btn btn-outline-danger' data-toggle='modal' data-target='#hapusbuku".$nompang."'><i class='fas fa-trash '></i> Hapus</a>";
                        include("hapusbuku.php");
                        include("suntingbuku.php");
                        ?>
                        </td>
                        <td><?php echo $hitung;?></td>
                        <td><?php echo $nompang;?></td>
                        <td><?php echo $title;?></td>
                        <td><?php echo $author1;?></td>
                        <td><?php echo $tahuntbt;?></td>
                        <td><?php echo $statusbuku;?></td>
                        <td><?php echo $isbnum;?></td>
                        <td><?php echo $penerbit;?></td>
                        <td><?php echo $tgltbh;?></td>
                        <td><?php echo $tglubah;?></td>
                        <td><?php echo $copies." buku";?></td>
                        <td><?php echo $lbrhal." hal.";?></td>
                        <td><?php echo $kategori;?></td>
                        <td><?php echo $jbahan;?></td>
                        
                        <?php
                        $hitung=$hitung+1;
                }
            }
                        ?>
                    </tr>
        </tbody>
    </table>
</div>