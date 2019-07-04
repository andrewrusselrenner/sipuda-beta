<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/account/admin/index-engine.php');
?>
<div class="table-responsive" id="anggotatable">
    <table class="table">
        <thead class="text-md-center">
            <tr>
                <th>Aksi</th>
                <th>ID Anggota</th>
                <th>Status</th>
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Surel</th>
                <th>No. Ponsel</th>
                <th>Alamat</th>
                <th>Jenis Kartu Identitas</th>
                <th>No. Identitas</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Status Pekerjaan</th> 
            </tr>
        </thead>
        <tbody>
        <?php
            if($sqlmem->rowCount() > 0)
            {
                foreach($hasilmem as $mem)
                {
                    // deklarasi supaya enak manggilnya
                    $idmem = htmlentities($mem->id);
                    $status = htmlentities($mem->status);
                    $namad = htmlentities($mem->nama_depan);
                    $namab = htmlentities($mem->nama_belakang);
                    $surel = htmlentities($mem->surel);
                    $nope = htmlentities($mem->nohp);
                    $alamat = htmlentities($mem->alamat);
                    $jki = htmlentities($mem->jenis_kartu_identitas);
                    $noid = htmlentities($mem->no_identitas);
                    $tempatlahir = htmlentities($mem->tempat_lahir);
                    $tgllahir = htmlentities($mem->tgl_lahir);
                    $jk = htmlentities($mem->jenis_kelamin);
                    $statusp = htmlentities($mem->status_pekerjaan);
                    $tgldibuat = date('d m, Y',strtotime($mem->tgl_dibuat));

                    //mengconvert dari angka ke string
                    if($status == '0')
                    {
                        $statusa = 'Akun Belum Dikonfirmasi';
                    }
                    else if($status == '1')
                    {
                        $statusa = 'Aktif';
                    }
                    else
                    {
                        $statusa = 'Tidak diketahui keadaannya';
                    }
        ?>
                    <tr>
                        <td>
                        <?php
                        echo "<a href='' class='btn btn-outline-primary' data-toggle='modal' data-target='#suntinganggota".$idmem."'><i class='fas fa-edit'></i> Sunting</a>";
                        echo "<a href='' class='btn btn-outline-primary' data-toggle='modal' data-target='#acc".$idmem."'><i class='fas fa-check '></i> Konfirmasi</a>";
                        include("accanggota.php");
                        //include("suntinganggota.php");
                        ?>
                        </td>
                        
                        <td><?php echo $idmem;?></td>
                        <td><?php echo $statusa;?></td>
                        <td><?php echo $namad;?></td>
                        <td><?php echo $namab;?></td>
                        <td><?php echo $surel;?></td>
                        <td><?php echo $nope;?></td>
                        <td><?php echo $alamat;?></td>
                        <td><?php echo $jki;?></td>
                        <td><?php echo $noid;?></td>
                        <td><?php echo $tempatlahir;?></td>
                        <td><?php echo $tgllahir;?></td>
                        <td><?php echo $jk;?></td>
                        <td><?php echo $statusp;?></td>
                        <td><?php echo $tgldibuat;?></td>
                        
                        <?php
                        //$hitung=$hitung+1;
                }
            }
                        ?>
                    </tr>
        </tbody>
    </table>
</div>