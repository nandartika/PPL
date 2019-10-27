<?php
session_start();
ob_start();
echo "Form Peminjaman";
$isi=ob_get_contents();
ob_end_clean();

include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Form Peminjaman</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <link rel="stylesheet" href="css/form-style.css">
  <script src="jquery-3.4.1.js"></script>

<script type="text/javascript">

/***********************************************
* Highlight Table Cells Script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* Please keep this notice intact
***********************************************/

//Specify highlight behavior. "TD" to highlight table cells, "TR" to highlight the entire row:
var highlightbehavior="TD"

var ns6=document.getElementById&&!document.all
var ie=document.all

function changeto(e,highlightcolor){
source=ie? event.srcElement : e.target
if (source.tagName=="TABLE")
return
while(source.tagName!=highlightbehavior && source.tagName!="HTML")
source=ns6? source.parentNode : source.parentElement
if (source.style.backgroundColor!=highlightcolor&&source.id!="ignore")
source.style.backgroundColor=highlightcolor
}

function contains_ns6(master, slave) { //check if slave is contained by master
while (slave.parentNode)
if ((slave = slave.parentNode) == master)
return true;
return false;
}

function changeback(e,originalcolor){
if (ie&&(event.fromElement.contains(event.toElement)||source.contains(event.toElement)||source.id=="ignore")||source.tagName=="TABLE")
return
else if (ns6&&(contains_ns6(source, e.relatedTarget)||source.id=="ignore"))
return
if (ie&&event.toElement!=source||ns6&&e.relatedTarget!=source)
source.style.backgroundColor=originalcolor
}

</script>

</head>

<body id="page-top" class="bg-white">

  <?php
  include('user/navbar.php');
  ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    include('user/sidebar.php');
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php
        include('user/breadcrumbs.php');
        ?>

        <!-- Page Content -->
        <h1>Form Peminjaman Ruang</h1>
        <hr>
        <form action="formpeminjamanaction.php" method="post">
          <table>
            <tr>
              <td>NIM</td>
              <td>:</td>
              <td><input type="text" readonly="readonly" name="nim" value="<?php echo $_SESSION['nim']; ?>" ></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" readonly="readonly" name="nama" value="<?php echo $_SESSION['nama']; ?>" </td>
            </tr>
            <tr>
              <td>Alasan Peminjaman</td>
              <td>:</td>
              <td><input type="text" name="alasan"></td>
            </tr>
            <tr>
              <td>Foto KTM</td>
              <td>:</td>
              <td><input type="file" name="file"></td>
            </tr>
            <tr>
              <td>Waktu Peminjaman</td>
              <td>:</td>
              <td><input type="date" name="tanggal"> Waktu Mulai : <input type="time" name="mulai" min="08:00" max="19:00" step="1800"> Waktu Selesai : <input type="time" name="selesai" step="1800"></td>
            </tr>
			<input type="hidden"  name="status" value="waiting" </td>
          </table>

          <?php
          $query = "SELECT ruang.lantai, ruang.no_ruang, status.status from ruang left join status on ruang.id_ruang=status.id_ruang order by ruang.lantai desc";
          $result = mysqli_query($db, $query);
          $prevLantai = null;
          $roomColor = null;
          $tableRow = false;
          echo "<table>";

          while (list($lantai, $no_ruang, $status) = mysqli_fetch_row($result)){
            if ($prevLantai != $lantai) {
              echo"<tr>";
              if($lantai < 4){
                echo "</tr>";
              }
              $prevLantai = $lantai;
            } else {
              $tableRow = false;
            }
   
            //ruang tidak tersedia
            if ($status == 1) {
              $roomColor = "black";
            //ruang kelas
            } else if ($status == 2) {
              $roomColor = "red";
            //ruang telah terpinjam
            } else if ($status == 3) {
              $roomColor = "orange";
            //ruang tersedia
            } else {
              $roomColor = "lightgreen";
            }

            echo "<td><button type='button' style='background-color:".$roomColor."'>".$lantai."0".$no_ruang."</button></td>";
          }

          echo"</table>";
          ?>

          <div>
            <input type="checkbox" name="sk" value=""><a href="#contohModalKecil" data-toggle="modal" data-target="#contohModalKecil">Baca Syarat dan Ketentuan Peminjaman</a>
			<div class="modal fade" id="contohModalKecil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Syarat & Ketentuan</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							1. Mahasiswa atau karyawan aktif.<br> 
							2. Penggunaan ruangan hanya untuk kegiatan internal kampus UPNVJ.<br>
							3. Penggunaan ruangan hanya bisa sampai pukul 19.00.
							<br>4. Segala kegiatan yang berlangsung dibawah pengawasan Universitas.
						</div>
					</div>
				</div>
			</div>
 
		  </div>
          <br>
          

          <button type="submit" name="kirim" class="btn btn-primary" style="width:10%;background-color:#008000;border:none;">KIRIM</button>
        
        
        </form>


      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <?php
      include('footer.php');
      ?>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Script -->
  <?php
  include('script.php');
  ?>

</body>

</html>
