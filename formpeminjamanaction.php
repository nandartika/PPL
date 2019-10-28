<?php
include('cekSession.php');

$nim = "";
$nama = "";
$alasan = "";
$tanggal = "";
$mulai= "";
$selesai= "";
$status= "";
$ruangan= "";

$db = mysqli_connect('localhost','root','','ruang');

if(isset($_POST['kirim'])){
	
	$nim	=$_POST['nim'];
    $nama			=$_POST['nama'];
    $alasan = $_POST['alasan'];
    $tanggal = $_POST['tanggal'];
	$mulai= $_POST['mulai'];
	$selesai= $_POST['selesai'];
	$status= $_POST['status'];
	$ruangan= $_POST['kirim'];
	if(count($errors)==0){
		
		$sql="insert into cekruang (NIM, Nama, Alasan, Tanggal, JamMulai, JamSelesai, status, ruangan) values  ('$nim', '$nama', '$alasan','$tanggal','$mulai','$selesai','$status','$ruangan')";
		
		mysqli_query($db,$sql);
		header('location: form.php');
			}
		
		}



?>
