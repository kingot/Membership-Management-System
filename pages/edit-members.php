<?php
 include_once '../core/initialize-all-pages.php'; 
 if(isset($_GET['member_id']) && !empty($_GET['member_id'])){
	
    $member_id=$_GET['member_id'];
 }
 ?>
 
 
<?php
$login_infor= new login_check;

 if($login_infor->logged_in()===false){
	 header('Location: ../index.php');
	 die('You do not have permission to this page');
	  

 }
 else{

$admin_username=$_SESSION['username'];
//$admin_email=$_SESSION['email'];
$admin_institute=$_SESSION['institute_name'];
$admin_image=$_SESSION['institute_logo'];
$admin_institutes_id=$_SESSION['institutes_id'];
$admin_id=$_SESSION['admin_id'];

	
 }

?>

<!DOCTYPE html>
<html>
  <head>
    <?php include_once '../includes/admin-header-stylesheet.php'; ?>
  </head>
 
 	   <!-- admin page header start here-------->
       
        <?php include_once '../includes/admin-header.php'; ?>
        
        <!-- admin header ends here-------------->
     
      <!-- Left side column. contains the logo and sidebar -->
      
       <?php include_once '../includes/asidebar.php'; ?>
      
      <!-- asidebar ends here----------------------->
	
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        
        <!-- dashboard start from here------------------------>
  		 <?php include_once '../includes/admin-non-dashboard-header.php'; ?>		            
              
        <!---- dashboard content ends here-------------------->
           
           
        <!-- other content start from here beneath the dashboard content-->   
        <br><br>
     	 <?php  
       
  //   

if(isset($_POST['surname'])&& isset($_POST['last_name'])&& isset($_POST['level'])
		&& isset($_POST['constituency'])&& isset($_POST['phone_number'])&& isset($_POST['student_number'])&& isset($_POST['first_name'])&& isset($_POST['dob'])&& isset($_POST['department'])&& isset($_POST['region'])&& isset($_POST['email']) && isset($_FILES['member_image'])){
	
  
	$surname=htmlentities($_POST['surname']);
   $last_name=htmlentities($_POST['last_name']);
  $level=htmlentities($_POST['level']);
   $constituency=htmlentities($_POST['constituency']);
   $phone_number=htmlentities($_POST['phone_number']);
  //$date_registered=htmlentities($_POST['date_registered']);
   
  $student_number=htmlentities($_POST['student_number']);
   $first_name=htmlentities($_POST['first_name']);
   $dob=htmlentities($_POST['dob']); 
   $department=htmlentities($_POST['department']);
   $region=htmlentities($_POST['region']);
   $email=htmlentities($_POST['email']);
   //$semester=htmlentities($_POST['semester']);
  $member_image=$_FILES['member_image'];
   //$agree=@$_POST['agree'];
  
   $error=array();
 //instantiation the class

  $member_register= new register_member;

 
 
  $member_register->member_register_edit($member_id,$surname,$last_name,$level,$constituency,$phone_number,$student_number,$first_name,$dob,$department,$region,$email,$member_image);
  
}

?>
<?php
	
	 
	  $query = "SELECT * FROM members_tb where member_id='$member_id' "; 
       
            $result=$mysqli->query($query);
                        
            while($row = $result->fetch_array()){
                 $student_number= $row["student_number"] ;
                 $first_name= $row['first_name'];
                 $surname=$row['surname'];
                 $last_name=$row['last_name'];
				 $date_of_birth=$row['date_of_birth'];
				 $phone_number=$row['phone_number'];
				 $department_edit=$row['department'];
				$level=$row['level'];
				//$semester_registered=$row['semester_registered'];
				 $constituency=$row['constituency'];
				$region=$row['region'];
				$email=$row['email'];
				//$date_registerd=$row['date_registerd'];
				
                 
 // }
?>
        
        <div class="row">
       <form action="" method="post" enctype="multipart/form-data">
         
         <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;&nbsp;Update Member Information</h3>
                </div><!-- /.box-header -->
                
              <div class="col-sm-6">
                <div class="box-body">
                  
                            
                            <div  class="form-group">
                                  <label for="student_number">Student Number *</label>
                                 <input  type="text"  class="form-control" placeholder="Student Number" name="student_number" value="<?php  echo  $student_number;  ?>">
                            </div>
                            <div  class="form-group">
                              <label for="first_name">First Name *</label>
                                <input  type="text"  class="form-control" placeholder="First Name" name="first_name" value="<?php  echo $first_name; ?>">
                            </div>
                            
                            <div  class="form-group">
                              <label for="surname">Surname *</label>
                              <input  type="text"  class="form-control" placeholder="Surname" name="surname" value="<?php  echo $surname; ?>">
                            </div>
                            
                            <div  class="form-group">
                              <label for="last_name">Other Name</label>
                              <input  type="text"  class="form-control" placeholder="last Name" name="last_name" value="<?php  echo $last_name; ?>">
                            </div>
                            
                            
                            <div class="form-group" >
                              <label for="dob">Date Of Birth *</label>
                                <input  type="text" id="dob" class="form-control" placeholder="Date Of Birth" name="dob" value="<?php  echo $date_of_birth; ?>">
                            </div>
                            
                             <div class="form-group">
                            <label for="phone_number">Phone Number *</label>
                            <input  type="text" class="form-control"  placeholder="Phone Number" name="phone_number" value="<?php echo $phone_number; ?>">
                          </div>
                          
                               <div class="form-group">           
                               <label for="department">Department*</label>
                            <select  class="form-control select2" style="width: 100%;" name="department">
                                <option value=""><?php echo $department_edit; ?></option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Mechnical Engineering">Mechnical Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Cilvil Engineering">Cilvil Engineering</option>
                                <option value="Accounting With Computing">Accounting With Computing </option>
                                <option value="Entreprenurship">Entreprenurship</option>
                                <option value="Business Management">Business Management</option>
                                
                              </select>
                              </div> 
                  </div>
              </div>
              
              <div class="col-sm-6">    
                <div class="box-body">
                  			  <div class="form-group" >
                             <label for="level">level/Year *</label>
                            <select  class="form-control select2" style="width: 100%;" name="level">
                                <option value=""><?php echo $level; ?></option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                            </select>
                            </div>
                            
                            
                            
                             <div class="form-group" >
                            <label for="constituency">Constituency *</label>
                            <input   type="text" class="form-control"  placeholder="Constituency" name="constituency" value="<?php echo $constituency; ?>">
							</div>
                              
                              <div class="form-group">
                              <label for="region">Region *</label>
                              <select  class="form-control select2" style="width: 100%;" name="region">
                             <option value=""><?php echo $region; ?></option>    
                      <option value="Greater Accra">Greater Accra</option>
                      <option value="Ashanti">Ashanti</option>
                      <option value="Central">Central</option>
                      <option value="Brong Ahafo">Brong Ahafo</option>
                      <option value="Northen">Northen </option>
                      <option value="Western">Western</option>
                      <option value="Upper West">Upper West</option>
                      <option value="Upper East">Upper East</option>
                      <option value="Volta">Volta</option>
                      <option value="Eastern">Eastern</option>
                              </select>
                              </div>
                              
                              <div class="form-group" >
                              <label for="email">Email</label>
                              <input  type="email" class="form-control"  placeholder="Email" name="email" value="<?php echo $email; ?>">
								</div>
                               
                                  
                               
                              <div class="form-group">
                      			<label for="member_image">Member Picture </label>
                       			<input type="file" name="member_image">
                      <p class="help-block">Eg. file format png,jpg,jpeg,jif etc.</p>
                    </div>
                     <br>
                   <input type="submit" class="btn btn-primary btn-block btn-flat" value="Register Member">
                   <br>
                </div> 
			      </div>   
              </div>
                
         <!--  </div> 
            </div>-->
          
      	</form>
         <?php
          

     }
     ?>


      
     <!-- </div>-->
      </div>
      </div>
    
      
      <!-- footer here -->
      
      <?php include_once '../includes/footer.php'; ?>