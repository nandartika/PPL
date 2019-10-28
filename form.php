<?php
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
  <script src="jquery-3.4.1.js"></script>S

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
              <td><input type="text" name="nim" value="<?php echo $_SESSION['nim'];  ?>" disabled></td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td><input type="text" name="nama" value="<?php echo $_SESSION['nama'];  ?>" disabled></td>
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
          </table>

          <?php
          $query = "SELECT a.f_lantai, a.f_noRuang, b.f_statusPeminjaman FROM t_ruang AS a LEFT JOIN t_statusruang AS b ON a.f_idRuang=b.f_idRuang ORDER BY a.f_lantai DESC";
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
            }

            echo "<td><button type='button' style='background-color:".$roomColor."' id='pilih'>".$lantai."0".$no_ruang."</button></td>";
          }

          echo"</table>";
          ?>

          <div>
            <input type="checkbox" name="sk" value=""> <a href="#">Baca Syarat dan Ketentuan Peminjaman</a>
          </div>
          <br>
          

          <button type="button" name="kirim" class="btn btn-primary" style="width:10%;background-color:#008000;border:none;">KIRIM</button>
        
        
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