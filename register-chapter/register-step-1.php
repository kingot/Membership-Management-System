<?php 
ob_start();
	//include_once 'core/connect.php'; 
	include_once '../core/initialize-all-pages.php'; 

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
        <a href="#"><b>Register </b><span style="color:green">TEIN</span> Chapter</a>
      </div>

		       <?php  
       
	   
if(isset($_POST['institute_name']) && isset($_POST['tertiary']) && isset($_POST['region']) && isset($_POST['city']) && isset($_FILES['institute_logo'])){
	 $institute_name=htmlentities($_POST['institute_name']);
	 $tertiary=htmlentities($_POST['tertiary']);
	 $region=htmlentities($_POST['region']);
	 $city=htmlentities($_POST['city']);
	 $institute_logo=$_FILES['institute_logo'];
	 //$agree=@$_POST['agree'];
	
 //instantiation the class
 	 $error=array();
	$register= new register_chapter;
 
	$register->register_chap($institute_name,$tertiary,$region,$city,$institute_logo);
	
	
	
		
	
}

?>

      <div class="register-box-body">
        <p class="login-box-msg">Register a new <span style="color:green">TEIN</span> Chapter</p>
        <form action="" method="post" enctype="multipart/form-data">
      		
           
                  <div class="box-body">
                    <div class="form-group">
                      <label for="institute_name">Institution Name</label>
                     <select class="form-control select2" style="width: 100%;" name="institute_name">
                     <option value="">Select Institution *</option>
                      <option value="Kwame Nkrumah University Of Science & Technology">Kwame Nkrumah University Of Science & Technology</option>
                      <option value="University Of Ghana">University Of Ghana</option>
                      <option value="University Of Ghana">University Of Winneba</option>
                      <option value="University Of Development Studies">University Of Development Studies</option>
                      <option value="University Of Cape Coast">University Of Cape Coast</option>
                      <option value="Garden City University">Garden City University</option>
                      <option value="Ghana Baptist University">Ghana Baptist University</option>
                      <option value="Kumasi Polytechnic">Kumasi Polytechnic</option>
                      <option value="Accra Polytechnic">Accra Polytechnic</option>
                      <option value="Temale Polytechnic">Temale Polytechnic</option>
                      <option value="Takoradi Polytechnic">Takoradi Polytechnic</option>
                      <option value="Wa Polytechnic">Wa Polytechnic</option>
                      <option value="Ho Polytechnic">Ho Polytechnic</option>
                      <option value="koforidua poly">Koforidua Polytechnic</option>
                      <option value="Koforidua Polytechnic">SMU University</option>
                      <option value="Spiritan University">Spiritan University</option>
                      <option value="Ashase University">Ashase University</option>
                    </select>
                    </div>
                    
                    
                    <div class="form-group">
                      <label for="tertiary">Tertiary</label>
                       <select class="form-control select2" style="width: 100%;" name="tertiary">
                     
                     
                  		 <option value="">Select Tertiary *</option>
                      <option value="University">University</option>
                      <option value="Polytechnic">Polytechnic</option>
                    </select>
                    </div>
              
               
            	<div class="form-group">
                      <label for="region">Region</label>
                      <select class="form-control select2" style="width: 100%;" name="region">
                     
                   	  <option value="">Select Region *</option>
                      <option value="Areater-accra">Greater Accra</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Central">Central</option>
                      <option value="Brong-Ahafo">Brong Ahafo</option>
                      <option value="Northen">Northen </option>
                      <option value="Western">Western</option>
                      <option value="Upper-West">Upper West</option>
                      <option value="Upper-East">Upper East</option>
                      <option value="Volta">Volta</option>
                      <option value="Eastern">Eastern</option>
                     
                    </select>
                    </div>
                    
                    <div class="form-group">
                      <label for="city">City</label>
                        <input type="text" class="form-control"  name="city" placeholder="city *">
                     
                    </div>
                    
                     <div class="form-group">
                      <label for="institute_logo">Institution Logo</label>
                       <input type="file" name="institute_logo">
                      <p class="help-block">Eg. file format png,jpg,jpeg,jif etc.</p>
                     
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
                   <a href="../index.php">Cancel</a>
                    <input type="submit" class="btn btn-info pull-right" value="Next">
                  </div>
         
        </form>


        
   

         
      </div><!-- /.form-box <img src="<?php // echo $image; ?>"/>-->
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
