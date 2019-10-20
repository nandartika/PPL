<?php
ob_start();
echo "Form Peminjaman";
$isi=ob_get_contents();
ob_end_clean();

//session_start();
include('head.php');
//include('config.php');
?>

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
        <table>
          <tr>
            <td>NIM</td>
            <td>=</td>
            <td>1710511064</td>
          </tr>
          <tr>
            <td>Nama</td>
            <td>=</td>
            <td>Kartika Ananda Putri</td>
          </tr>
          <tr>
            <td>Alasan Peminjaman</td>
            <td>=</td>
            <td><input type="text" name="alasan"></td>
          </tr>
          <tr>
            <td>Foto KTM</td>
            <td>=</td>
            <td><input type="file" name="file"></td>
          </tr>
          <tr>
            <td>Waktu Peminjaman</td>
            <td>=</td>
            <td><input type="date" name="tanggal"> Waktu Mulai = <input type="time" name="mulai" min="08:00" max="19:00" step="1800"> Waktu Selesai = <input type="time" name="selesai" step="1800"></td>
          </tr>
		  <tr>
            <td>Ruangan </td>
            <td>=</td>
            <td><table>
				<tr>
					<td> <input type="submit" name="submit" value="201"></td>
					<td> <input type="submit" name="submit" value="202"></td>
					<td> <input type="submit" name="submit" value="203"></td>
				</tr></table>
			</td>
			<tr>
			<td></td>
			<td></td>
			<td>
			<table>
				<tr>
					<td> <input type="submit" name="submit" value="301"></td>
					<td> <input type="submit" name="submit" value="302"></td>
					<td> <input type="submit" name="submit" value="403"></td>
				</tr></table>
			</td>
			</tr>
			<tr>
			<td></td>
			<td></td>
			<td>
			<table>
				<tr>
					<td> <input type="submit" name="submit" value="401"></td>
					<td> <input type="submit" name="submit" value="402"></td>
					<td> <input type="submit" name="submit" value="403"></td>
				</tr></table>
			</td>
			</tr>
          </tr>
        </table>
		
		

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