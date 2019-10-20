<?php
ob_start();
echo "Syarat";
$isi=ob_get_contents();
ob_end_clean();

session_start();
include('head.php');
?>

<body id="page-top" class="bg-white">

  <?php
  if(isset($_SESSION['nim'])){
    include('user/navbar.php');
  }else{
    include('guest/navbar.php');
  }
  ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    if(isset($_SESSION['nim'])){
      include('user/sidebar.php');
    }else{
      include('guest/sidebar.php');
    }
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php
        if(isset($_SESSION['nim'])){
          include('user/breadcrumbs.php');
        }else{
          include('guest/breadcrumbs.php');
        }
        ?>

        <!-- Page Content -->
        <h1>Syarat & Ketentuan</h1>
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