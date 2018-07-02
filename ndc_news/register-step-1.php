<?php 
	//include_once 'core/connect.php'; 
	include_once '../core/initialize-all-pages.php'; 

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> News Upload</title>
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
        <a href="#"><marquee><b>UpLoad  <span style="color:green">News</span> </b> </marquee></a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new <span style="color:green">TEIN</span> Chapter</p>
        <form action="" method="post" enctype="multipart/form-data">
      		        



           
            	     
                    
                    <div class="form-group">
                      <label for="news_title">NEWS TITLE</label>
                        <input type="text" class="form-control"  name="news_title" placeholder="News Title ">
                    </div>
                    
                     <div class="form-group">
                      <label for="news_image">NEWS LOGO</label>
                       <input type="file"  name="news_image" src="../images/news_image/1b.jpg">
                      <p class="help-block">Eg. file format png, jpg, jif etc.</p>
                    </div>

                    <div class="form-group">
                      <label for="news_body">MESSAGE </label>
                      <textarea rows="6" cols="48"  name="news_body" class="form-control" placeholder="Enter message ..."> 
                      </textarea>
                    </div>
                    
         		<!--
            <div class="form-group">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="agree" value="1"> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
               
                  <div class="box-footer">
                   <a href="register-step-1.php">Cancel</a>
                    <input type="submit" class="btn btn-info pull-right" value="Next">
                  </div>
         
        </form>


        
         <a href="../index.php" class="text-center">Home</a>
        <br/><br/>
       <?php  
       
	    $error=array();

if(isset($_FILES['news_image'])&&isset($_POST['news_title'])&&isset($_POST['news_body']) ){
   $news_image=$_FILES['news_image'];
	 $news_title=htmlentities($_POST['news_title']);
	 $news_body=htmlentities($_POST['news_body']);
	 
	 //$agree=@$_POST['agree'];

	
 //instantiation the class
	$news= new news_upload;
 
	$news->news_ups($news_image,$news_title,$news_body);
	
}

?>

         
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    <div id="container"><!-- display box -->
       <?php
                        $new_view= new news_views_echo;
                       $new_view->newsviewecho();
                        ?>

    </div><!-- end display box -->

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
