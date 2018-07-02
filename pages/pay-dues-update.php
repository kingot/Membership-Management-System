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

if(isset($_POST['amount'])){
  	
	//$institutes_id=$_POST['institutes_id'];
	//$admin_id=$_POST['admin_id'];
	//$member_id=$_POST['member_id'];
  // $dues=htmlentities($_POST['dues']);
   $amount=htmlentities($_POST['amount']);
 
 
   $error=array();
   
    if(empty($amount)){

    $error[]='Please all fields are required';
}else{

  if(!preg_match('/^[0-9]*$/',$amount)){
      $error[]='Amount must only be in numbers '; 
    }
	
}

 if(!empty($error)){
    echo '
		<div class="box box-warning box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Errors</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p><ul style="color:red"><li>'.implode('</li><li>',$error).'</li></ul><p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
		';
 }else{
		
			
			 $mysqli->query("UPDATE dues_tb SET amount='$amount' WHERE member_id='$member_id'");
			 
			  echo '
	   		<div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Dues Status: Semester Dues</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> Thank you for paying your semester dues.  &nbsp;&nbsp;<a href="view-paid-dues-members.php">view paid dues members</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	   ';
 }
   
 //instantiation the class

/*  $dues_payment = new dues_pay;

  $dues_payment->duespay($institutes_id,$admin_id,$member_id,$amount);
  */
}


?>
<?php
	
	 
	  $query = "select dues_tb.admin_id,members_tb.member_id,dues_tb.member_id, dues_tb.institutes_id,amount, 
	  			student_number,surname,first_name,level,department,
				 amount from  members_tb
				 INNER JOIN dues_tb ON members_tb.member_id='$member_id'
				  WHERE dues_tb.admin_id='$admin_id' AND dues_tb.institutes_id='$admin_institutes_id'"; 
       
            $result=$mysqli->query($query);
                        
            while($row = $result->fetch_array()){
                 $student_number= $row["student_number"] ;
                 $first_name= $row['first_name'];
                 $surname=$row['surname'];
                $amount=$row['amount'];
				
                 
 }
?>
        
        <div class="row">
         <p style="margin-left:20px"><a href="pay-dues.php"><i class="fa fa-step-backward"></i> Go Back</a></p>
       <form action="" method="post">
        
         <div class="box box-success box-solid">
         		
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;&nbsp;Paying rest of dues for &nbsp;<span style="color:yellow; font-size:18px; font-weight:bold"><?php echo $first_name.' '.$surname; ?></span></h3>
                </div><!-- /.box-header -->
                
              <div class="col-sm-6">
              
                <div class="box-body">
                              
                            
                             <div class="form-group" >
                            <label for="amount">Amount *</label>
                            <input   type="text" class="form-control"  placeholder="GHs" name="amount" value="<?php echo $amount; ?>">
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
          

    
     ?>


      
     <!-- </div>-->
      </div>
      </div>
    
      
      <!-- footer here -->
      
      <?php include_once '../includes/footer.php'; ?>