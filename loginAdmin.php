<?php
include('config.php');
session_start();
if(isset($_SESSION['username'])){
	header('location: admin.php');
}

ob_start();
echo "Login Admin";
$isi=ob_get_contents();
ob_end_clean();

include('head.php');
?>

<body class="bg-white">

  <?php
  include('guest/navbar.php');
  ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    include('guest/sidebar.php');
    ?>

    <div id="content-wrapper">
      <div class="container-fluid">
       <!-- Breadcrumbs-->
        <?php
        include('guest/breadcrumbs.php');
        $errors = array(); 
        if(isset($_POST['login'])){
          $username = $_POST['username'];
          $password = md5($_POST['password']);
        
          if (empty($username)) {
            array_push($errors, "Username is required");
          }
          if (empty($password)) {
            array_push($errors, "Password is required");
          }
        
          if (count($errors) == 0) {
            $query = mysqli_query($db,"SELECT * FROM t_admin WHERE f_username='$username' AND f_password='$password'");
            $cek=mysqli_num_rows($query);
            if ($cek == 1) {
              $data = mysqli_fetch_assoc($query);
              $id_user = $data['id_admin'];
              $_SESSION['username'] = $username;
              $_SESSION['id_user'] = $id_admin;
              $_SESSION['status']="admin";
              header('location: admin.php');
            } else{
               
              
        ?> 
      </div>

      <div class="container">
      <div class="alert alert-danger text-center"> <b style="color:red;">The username and password you entered did not match our records. Please double-check and try again.</b></div>
      <?php
          }
        } 
      }
      ?>
        <div class="card card-login mx-auto mt-10">    
          <div class="card-header text-center">Login Admin</div>
          <div class="card-body">
              
            <div class="logoUPN">
              <img src="images/Logo_UPNVJ.png" class="logoUPN">
            </div>

            <form action="loginAdmin.php" method="POST">
              <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="inputNIP" class="form-control" placeholder="Username" required="required" autofocus="autofocus" name="username">
                  <label for="inputNIP">Username</label>
                </div>
              </div>
              <div class="form-group">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required" name="password">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="form-group">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="remember-me">
                    Remember Password
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
            </form>
            <div class="text-center">
              <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
            </div>
          </div>
        </div>
      </div>
    
  </div>

  <!-- Sticky Footer -->
  <?php
  include('footer.php');
  ?>
</div>

<?php
include('script.php');
?>

</body>

</html>
