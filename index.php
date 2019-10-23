<?php
session_start();
if(!isset($_SESSION['nim'])){
  header("location: loginUser.php");
}

ob_start();
echo "Overview";
$isi=ob_get_contents();
ob_end_clean();


include('head.php');
if(!isset($_SESSION['nim'])){
  header("location: loginUser.php");
}
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
        <h1>Home</h1>
        <hr>
        <p>1. Mahasiswa atau karyawan aktif.</br>
            2. Penggunaan ruangan hanya untuk kegiatan internal kampus UPNVJ.</br>
            3. Penggunaan ruangan hanya bisa sampai pukul 19.00.</br>
            4. Segala kegiatan yang berlangsung dibawah pengawasan Universitas.
        </p>

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