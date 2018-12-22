<?php
include_once('db_data.php');

class CloseCon
{
    public function CloseConn()
    {
        /* tutup koneksi */
        mysqli_close($con);
    }
}

?>