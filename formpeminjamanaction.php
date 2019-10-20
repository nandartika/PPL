<?php
include('cekSession.php');

if(isset($_POST['kirim'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alasan = $_POST['alasan'];
    $file = $_POST['file'];
    $tanggal = $_POST['tanggal'];
    $mulai = $_POST['mulai'];
    $selesai = $_POST['selesai'];
}


?>