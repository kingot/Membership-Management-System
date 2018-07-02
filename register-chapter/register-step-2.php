<?php 
	//include_once 'core/connect.php'; 
	include_once '../core/initialize-all-pages.php'; 
	
	if(@$_SESSION['institutes_id']){
	$institutes_id=$_SESSION['institutes_id'];
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Register TEIN Chapter</title>
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
  <body class="hold-transition register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>Master <span style="color:green">Admin</span> </b></a>
      </div>
		       <?php  
       
	   $error=array();
if(isset($_POST['institutes_id']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['email'])){
	 $institutes_id=htmlentities($_POST['institutes_id']);
	 $username=htmlentities($_POST['username']);
	 $password=htmlentities($_POST['password']);
	 $confirm_password=htmlentities($_POST['confirm_password']);
	 $email=htmlentities($_POST['email']);
	 
	 $hash = md5($password);
 //instantiation the class
 	 
	 
	$register= new register_chapter;
 
	$register->register_admin($institutes_id,$username,$hash,$email);
	
}

?>
      <div class="register-box-body">
        <p class="login-box-msg">Register a new <span style="color:green">TEIN</span> Chapter</p>
        <form action="" method="post">
      		
           
                  <div class="box-body">
                    <div class="form-group">
                      
                        <input type="hidden" class="form-control"  name="institutes_id" value="<?php echo @$institutes_id;?>">
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="username">Username</label>
                        <input type="text" class="form-control"  name="username" placeholder="Username *">
                    </div>
                    
                     
                    <div class="form-group">
                      <label for="password">Password</label>
                        <input type="password" class="form-control"  name="password" placeholder="Password *">
                    </div>
                    
                    <div class="form-group">
                      <label for="password">Confirm Password</label>
                        <input type="password" class="form-control"  name="confirm_password" placeholder="Confirm Password *">
                    </div>
                    
                      <div class="form-group">
                      <label for="email">Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="Email *">
                    </div>
                    
                    
  
               
                  <div class="box-footer">
                  <a href="../index.php">Cancel</a>
                    <input type="submit" class="btn btn-info pull-right" value="Submit">
                  </div>
         
        </form>




         
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

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
