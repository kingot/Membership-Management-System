<?php
 include_once '../core/initialize-all-pages.php'; ?>
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

if(isset($_POST['institutes_id']) && isset($_POST['admin_id']) && isset($_POST['surname'])&& isset($_POST['last_name'])&& isset($_POST['level'])
		&& isset($_POST['constituency'])&& isset($_POST['phone_number']) && isset($_POST['student_number'])&& isset($_POST['first_name'])&& isset($_POST['dob'])&& isset($_POST['department'])&& isset($_POST['region'])&& isset($_POST['email'])&& isset($_FILES['member_image'])){
	
   $institutes_id=htmlentities($_POST['institutes_id']);
    $admin_id=htmlentities($_POST['admin_id']);
	$surname=htmlentities($_POST['surname']);
   $last_name=htmlentities($_POST['last_name']);
  $level=htmlentities($_POST['level']);
   $constituency=htmlentities($_POST['constituency']);
   $phone_number=htmlentities($_POST['phone_number']);
 // $date_registered=htmlentities($_POST['date_registered']);
   
  $student_number=htmlentities($_POST['student_number']);
   $first_name=htmlentities($_POST['first_name']);
   $dob=htmlentities($_POST['dob']); 
   $department=htmlentities($_POST['department']);
   $region=htmlentities($_POST['region']);
   $email=htmlentities($_POST['email']);
  // $semester=htmlentities($_POST['semester']);
  $member_image=$_FILES['member_image'];
   //$agree=@$_POST['agree'];
  
   $error=array();
 //instantiation the class

  $member_register= new register_member;

 
 
  $member_register->member_register($institutes_id,$admin_id,$surname,$last_name,$level,$constituency,$phone_number,$student_number,$first_name,$dob,$department,$region,$email,$member_image);
  
}

?>

        
        <div class="row">
       <form action="" method="post" enctype="multipart/form-data">
         
         <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;&nbsp;Register new member</h3>
                </div><!-- /.box-header -->
                
              <div class="col-sm-6">
                <div class="box-body">
                  
                  			<div   class="form-group">
                                <input type="hidden" class="form-control" name="institutes_id" value="<?php echo @$admin_institutes_id; ?>">
                            </div>
                            
                            <div   class="form-group">
                                <input type="hidden" class="form-control" name="admin_id" value="<?php echo @$admin_id; ?>">
                            </div>
                            
                            <div  class="form-group">
                                  <label for="student_number">Student Number *</label>
                                 <input  type="text"  class="form-control" placeholder="Student Number" name="student_number" value="<?php if(isset($student_number)){ echo $student_number;} ?>">
                            </div>
                            <div  class="form-group">
                              <label for="first_name">First Name *</label>
                                <input  type="text"  class="form-control" placeholder="First Name" name="first_name" value="<?php if(isset($first_name)){ echo $first_name;} ?>">
                            </div>
                            
                            <div  class="form-group">
                              <label for="surname">Surname *</label>
                              <input  type="text"  class="form-control" placeholder="Surname" name="surname" value="<?php if(isset($surname)){ echo $surname;} ?>">
                            </div>
                            
                            <div  class="form-group">
                              <label for="last_name">Other Name</label>
                              <input  type="text"  class="form-control" placeholder="last Name" name="last_name" value="<?php if(isset($last_name)){ echo $last_name;} ?>">
                            </div>
                            
                            
                            <div class="form-group" >
                              <label for="dob">Date Of Birth *</label>
                                <input  type="text" id="dob" class="form-control" placeholder="Date Of Birth" name="dob" value="<?php if(isset($dob)){ echo $dob;} ?>">
                            </div>
                            
                             <div class="form-group">
                            <label for="phone_number">Phone Number *</label>
                            <input  type="text" class="form-control"  placeholder="Phone Number" name="phone_number" value="<?php if(isset($phone_number)){ echo $phone_number;} ?>">
                          </div>
                          
                               <div class="form-group">           
                               <label for="department">Department*</label>
                            <select  class="form-control select2" style="width: 100%;" name="department" value="<?php if(isset($department)){ echo $department;} ?>">
                                <option value="">Select Your Departmemt</option>
                                <option value="Computer Science">Computer Science</option>
                                <option value="Mechnical Engineering">Mechnical Engineering</option>
                                <option value="Electrical Engineering">Electrical Engineering</option>
                                <option value="Cilvil Engineering">Cilvil Engineering</option>
                                <option value="northen">Accounting With Computing </option>
                                <option value="western">Entreprenurship</option>
                                <option value="bolgatanga">Business Management</option>
                                <option value="eastern">Eastern</option>
                                <option value="ho">Ho</option>
                                <option value="i">I forgot</option>
                              </select>
                              </div> 
                  </div>
              </div>
              
              <div class="col-sm-6">    
                <div class="box-body">
                  			  <div class="form-group" >
                             <label for="level">level/Year *</label>
                            <select  class="form-control select2" style="width: 100%;" name="level" value="<?php if(isset($level)){ echo $level;} ?>">
                                <option  value="">Select Your Level</option>
                                <option value="1">1st Year</option>
                                <option value="2">2nd Year</option>
                                <option value="3">3rd Year</option>
                                <option value="4">4th Year</option>
                            </select>
                            </div>
                            
                        
                            
                             <div class="form-group" >
                            <label for="constituency">Constituency *</label>
                            <input   type="text" class="form-control"  placeholder="Constituency" name="constituency" value="<?php if(isset($constituency)){ echo $constituency;} ?>">
							</div>
                              
                              <div class="form-group">
                              <label for="region">Region *</label>
                              <select  class="form-control select2" style="width: 100%;" name="region" value="<?php if(isset($region)){ echo $region;} ?>">
                                     <option value="">Select Region </option>
                             
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
                              <input  type="email" class="form-control"  placeholder="Email" name="email" value="<?php if(isset($email)){ echo $email;} ?>">
								</div>
                               
                               
                               
                              <div class="form-group">
                      			<label for="member_image">Member Picture *</label>
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
       


      
     <!-- </div>-->
      </div>
      </div>
    
      
      <!-- footer here -->
      
      <?php include_once '../includes/footer.php'; ?>