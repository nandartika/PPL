<?php
session_start();
if(!isset($_SESSION['username'])){
  header('location: loginAdmin.php');
}

ob_start();

include('config.php');
include('head.php');
?>

<body id="page-top" class="bg-white">

  <?php
  include('admin/navbar.php');
  ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    include('admin/sidebar.php');
    ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <?php
        include('admin/breadcrumbs.php');
        $query1 = mysqli_query($db,"select * from pinjam where status='waiting'");
        ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Permohonan Peminjaman Ruang</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Nama Pemohon</th>
                    <th>Keperluan</th>
                    <th>Detail</th>
                    <th>Terima</th>
                    <th>Tolak</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Nama Pemohon</th>
                    <th>Keperluan</th>
                    <th>Detail</th>
                    <th>Terima</th>
                    <th>Tolak</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
                  $i=0;
                  while($query2 = mysqli_fetch_array($query1)){
                    echo "<tr><td>".$i++."</td>";
                    echo "<td>".$query2['create_at']."</td>";
                    echo "<td>".$query2['nama']."</td>";
                    echo "<td>".$query2['alasan']."</td>";
                    echo "<td><img src='image/vision.png' href='detail.php?id=".$query2['id_peminjaman']."'></td>";
                    echo "<td><img src='image/check.png' href='accept.php?id=".$query2['id_peminjaman']."'></td>";
                    echo "<td><img src='image/delete.png' href='delete.php?id=".$query2['id_peminjaman']."'></td></tr>";
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

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