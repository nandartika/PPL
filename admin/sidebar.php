<ul class="sidebar navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="admin.php">
      <i class="fas fa-fw fa-login"></i>
      <span>Admin</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="kelas.php">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Ruang Kelas</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Admin & User</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Logout</span></a>
  </li>
</ul>

<!-- Logout Modal-->
<?php
include('logoutModal.php');
?>