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

if(isset($_POST['institutes_id']) && isset($_POST['admin_id']) && isset($_POST['member_id']) && isset($_POST['amount'])){
  	
	$institutes_id=$_POST['institutes_id'];
	$admin_id=$_POST['admin_id'];
	$member_id=$_POST['member_id'];
  // $dues=htmlentities($_POST['dues']);
   $amount=htmlentities($_POST['amount']);
 
 
   $error=array();
   
 //instantiation the class

  $dues_payment = new pay_id_card;

  $dues_payment->pay_idcard($institutes_id,$admin_id,$member_id,$amount);
  
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
				
                 
 // }
?>
        
        <div class="row">
         <p style="margin-left:20px"><a href="#"><i class="fa fa-step-backward"></i> Go Back</a></p>
       <form action="" method="post">
        
         <div class="box box-success box-solid">
         		
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;&nbsp;Paying ID card for &nbsp;<span style="color:yellow; font-size:18px; font-weight:bold"><?php echo $first_name.' '.$surname; ?></span></h3>
                </div><!-- /.box-header -->
                
              <div class="col-sm-6">
                <div class="box-body">
                  
                  <div   class="form-group">
                                <input type="hidden" class="form-control" name="institutes_id" value="<?php echo @$admin_institutes_id; ?>">
                            </div>
                            
                            <div   class="form-group">
                                <input type="hidden" class="form-control" name="admin_id" value="<?php echo @$admin_id; ?>">
                            </div>
                            
                             <div   class="form-group">
                                <input type="hidden" class="form-control" name="member_id" value="<?php echo @$member_id; ?>">
                            </div>
                            
                            <!-- <div class="form-group">
                              <label for="dues">Dues Payment *</label>
                              <select  class="form-control select2" style="width: 100%;" name="dues">
                                <option  value="">Select Semester Payment</option>
                                <option value="1">First Semester </option>
                                <option value="2">Second Semester </option>
                                <option value="3">Third Semester</option>
                                 <option value="4">Fourth Semester </option>
                                <option value="5">Fifth Semester</option>
                                 <option value="6">Sixth Semester </option>
                                <option value="7">Seventh Semester</option>  
                                <option value="8">Eight Semester</option>  
                              </select>
                              
                              </div>-->
                              
                            
                             <div class="form-group" >
                            <label for="amount">Amount *</label>
                            <input   type="text" class="form-control"  placeholder="GHs" name="amount">
                             </div>
                           
              
                         
                     <br>
                   <input type="submit" class="btn btn-primary btn-block btn-flat" value="Submit Pay">
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