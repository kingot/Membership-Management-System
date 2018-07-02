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
    <?php
    if(isset($_GET['news_id']))
  {

     $news_id=$_GET['news_id'];
     

//$news= new views_echo;
 
// $news->viewecho($news_id);

  $query = "SELECT * FROM news_tb where news_id='$news_id' "; 
       //DESC LIMIT 6
            $result=$mysqli->query($query);
                        
            while($row = $result->fetch_assoc()){
                 $news_id= $row["news_id"] ;
                 $news_title= $row['news_title'];
                 $news_body=$row['news_body'];
                 $news_image=$row['news_image'];
                 
                 
    ?>
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><marquee><b>Edit UpLoaded  <span style="color:green">News</span> </b> </marquee></a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Edit Registered a new <span style="color:green">TEIN</span> Chapter</p>
        <form action="" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                      <label for="news_title">NEWS TITLE</label>
                        <input type="text" class="form-control"  name="news_title" placeholder="News Title"  value=" <?php echo $news_title; ?> ">
                    </div>
                    
                     <div class="form-group">
                      <label for="news_image">NEWS LOGO</label>
                       <input type="file"  name="news_image"  value="<?php echo $news_image; ?> " >
                      <p class="help-block">Eg. file format png, jpg, jif etc.</p>
                    </div>

                    <div class="form-group">
                      <label for="news_body">MESSAGE </label>
                      <textarea rows="6" cols="0" name="news_body" class="form-control"  placeholder="Enter message ..." > 
                        <?php echo $news_body; ?>
                      </textarea>
                    </div>         
                  <div class="box-footer">
                   <a href="register-step-1.php">Cancel</a>
                    <input type="submit" class="btn btn-info pull-right" value="Next">
                  </div>
         
        </form>
        <?php
          }

     }
     ?>
         <a href="../index.php" class="text-center">Home</a>
        <br/><br/>
       <?php  
       
	    $error=array();

      if(isset($_FILES['news_image'])&&isset($_POST['news_title'])&&isset($_POST['news_body']) ){
   $news_image=$_FILES['news_image'];
   $news_title=htmlentities($_POST['news_title']);
   $news_body=htmlentities($_POST['news_body']);
   

 //$news= new news_update;
 
 // $news->newsupdate($news_image,$news_title,$news_body);

   //CAN'T FIND NEWS ID 



if(isset($_FILES['news_image'])&&isset($_POST['news_title'])&&isset($_POST['news_body']) ){
 global $mysqli;
 //instantiation the class
  $news_title=$mysqli->real_escape_string($news_title);
    $news_body=$mysqli->real_escape_string($news_body);
    
    
    if(empty($news_title) || empty($news_body) ){
  $error[]='Please all fields are required';
}else{
   
  if(empty($_FILES['news_image']['name'])==true){
    $error[]='Please upload your institution logo';
  }
  //allowed file extension to upload
  $allowed=array('jpg','jpeg','jif','png');
  $file_name=$_FILES['news_image']['name'];
  $file_ext=@strtolower(end(explode('.', $file_name)));
  $file_temp=$_FILES['news_image']['tmp_name'];
  $file_size=$_FILES['news_image']['size'];
  
  if($file_size > 2097152){
    $error[]='File size must be 2MB.';
  }
  
  if(in_array($file_ext,$allowed)===false){
    $error[]= "Incorrect file type. Allowed: jpg, jpeg, jif, png";
  }
  
  if(in_array($file_ext,$allowed)===true){
    
    //upload file here
    $path='../images/news_image/'.$file_name;
    move_uploaded_file($file_temp,$path);
    //move_uploaded_file($file_temp,'../images/news_image/'.$file_name);
  }
  
  
 
}

 if(!empty($error)){
    echo '<p><ul style="background:#f63"><li>'.implode('</li><li>',$error).'</li></ul><p>';
 }else{

    $string = serialize($allowed);
    $sql=    ("UPDATE news_tb SET news_image='$path', news_title='$news_title', news_body='$news_body' WHERE news_id='$news_id'");
    $mysqli->query($sql);

      if ($mysqli->query($sql)) {
        header("Location: register-step-1.php");
      }
     
    // }else{
       echo '<p class="pa">News block has been successfully Updated, &nbsp;&nbsp;<a href="#">Login</a></a>';
    // }
     
     }

     }
}
?>


         
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    <div id="container"><!-- display box -->
      

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
