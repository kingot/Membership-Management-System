<?php 
	//include_once 'core/connect.php'; 
	include_once '../core/initialize-all-pages.php'; 

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> TEIN | Admin | Change Password</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><b>Admin</b> Change Password</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Recover your password by using your registered email</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder=" New Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
           <div class="form-group has-feedback">
            <input type="password" name="password_verify" class="form-control" placeholder="Verify Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <input type="submit" class="btn btn-primary btn-block btn-flat" value="Submit">
            </div><!-- /.col -->
          </div>
        </form>

       

        <a href="login-page.php">Log in</a> | <a href="../index.php">Home</a><br>
        
        <br/>
        <?php

//admin change password code
$error=array();
 //global $mysqli;
if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_verify'])){
	
	 $email=htmlentities($mysqli->real_escape_string(($_POST['email'])));
	  $password=htmlentities($mysqli->real_escape_string(($_POST['password'])));
	  $password_verify=htmlentities($mysqli->real_escape_string(($_POST['password_verify'])));
	  
	  $hash=md5($password);
	
 //instantiation the class
 $change_pass= new change_password;
 
if(empty($email) || empty($password) || empty($password_verify)){
	$error[]='Please all fields are required';
}else{

if($change_pass->admin_email($email)===false){
		$error[]='Error: Incorrect email provided ,try again.';
	}

if($password !=$password_verify){
		$error[]='Error: Password and Verify password do not match, try again';
	}
	


}

 if(!empty($error)){
	  echo '<p><ul style="background:#f63"><li>'.implode('</li><li>',$error).'</li></ul><p>';
 }else{
		if($change_pass->update_password($hash,$email)){
		
		
		
		 }else{
			 echo '<p class="pa">Your new password is successfully created, you may  &nbsp;&nbsp;<a href="login-page.php">Login</a></a>';
		 }
		 
 	}

 }//end isset
 

?>


      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="../plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
