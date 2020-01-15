<?php include 'inc/head.php'; ?>
<?php

include_once 'connectdb.php';
session_start();

if(isset($_POST['btn_login'])){
  $useremail = $_POST['txt_email' ];
  $password  = $_POST['txt_password'];
  
  // echo $useremail . " - " . $password;

  $select = $pdo->prepare(" 
    SELECT * FROM tbl_user 
    WHERE useremail='$useremail' 
    AND password='$password'");

  $select->execute();
  $row = $select->fetch(PDO::FETCH_ASSOC);
  if($row['useremail'] == $useremail AND $row['password'] == $password){
    $success = 'Login successfull';
    header('refresh:1; dashboard.php');
  } else {
    echo "Log in failed";
  }
}
?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="index.php"><b>TIKA</b>InventoryPOS</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="txt_email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="txt_password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="#">I forgot my password</a><br>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn_login">Log In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
