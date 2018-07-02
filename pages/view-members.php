<?php
 include_once '../core/initialize-all-pages.php'; 
  //include_once 'responds.php';
  
  if(isset($_GET['member_id']) && !empty($_GET['member_id'])){
	  $member_id=$_GET['member_id'];
	  del_member($member_id);
	 
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
$admin_email=$_SESSION['email'];
$admin_institute=$_SESSION['institute_name'];
$admin_image=$_SESSION['institute_logo'];
$admin_id=$_SESSION['admin_id'];
$institutes_id=$_SESSION['institutes_id'];

	
 }

?>

<!DOCTYPE html>
<html>
  <head>
    <?php include_once '../includes/admin-header-stylesheet2.php'; ?>
    
    <script>
	
/*$(document ).ready(function() {
$('#data').dataTable();

});*/
	</script>
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
        
       <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Registered Members</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p>Please the list below is the registered TEIN members. Update members information or Delete members</p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
           
           <?php  
		    
		   $members= new get_members_data;
		   
		  $members->get_members($institutes_id,$admin_id);
		   ?>
           </div>
       		
           
          
      <!-- footer here -->
      <?php include_once '../includes/foooter2.php'; ?>