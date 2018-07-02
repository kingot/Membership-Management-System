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
$admin_email=$_SESSION['email'];
$admin_institute=$_SESSION['institute_name'];
$admin_image=$_SESSION['institute_logo'];
//$admin_id=$admin['admin_id'];

	
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

       
      
         
         <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Help Page</h3>
                  <div class="box-tools pull-right">
                     <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div>
                 <div class="box-body">
                 <p>Welcome to the <b>NDC Tertiary Education Institution Network(TEIN)  Chapters Online Management System</b>. 
                  This Page will help you find assistance and information.</p>
                  
                  <p>NDC TEIN CHAPTERS system is aims to promote the Tertiary Institution orginazatin across the nation 
                    to the supreme level.</p>
                  <p>Basis for the development of NDC TEIN online Management System was the  experince of a number of 
                    TEIN members consisting of Tertiary Students. Having analyzed  the way of data management among the
                     various Chapters across the country, developed this system for effective data management of the 
                     Chapter.NDC TEIN CHAPTERS system offer the chapters an ideal registeration tool applicable in any 
                     part of Ghana.
                   </p>
                   <p>What are the benefits of using the TEIN NDC System?</p>
                   <p>TEIN NDC System is unique in its use. It was engineered to become a perfect online data management
                    tool. When using the TEIN NDC System, you are able to:</p>
                    <p>
                       <ul>
                                <li>communicate with other Chapters with ease!</li>
                                <li>register the members of all the various chapters.</li>
                                <li>manage the dues payment of the members in your chapter.</li>
                                <li>organise events and promote unity among the various Chapters across the nation.</li>
                                <li>conveniently store details of all the member in the database.</li>
                            </ul>   
                    </p>
                    <h3>STEPS FOR REGISTRATION</h3>
                    <p>In order to open a NDC TEIN CHAPTERS system account, you need to complete the registration process.</p>
                    <p>Registration and account access</p>
                    
                            <ul>

                              <li>How do I register for an account?</li>
                                <ol>
                                   <p>&nbsp;</p>
                                <li>To register for TEIN CHAPTERS system account you need to click the “Create  TEIN CHAPTERS
                                 Account” button in the middle portion of the NDC TEIN CHAPTERS home page</li>
                                 <img src="../images/help_images/chapter_register.png" alt="" style="width:128;height:128px"/>
                                 <p>&nbsp;</p>
                                <li><p>and then enter your chapter details.</p></li>
                                <img src="../images/help_images/chapter_register1.png" alt="" style="width:128;height:400px"/>
                                <p>&nbsp;</p>
                              <li>But if already registered, click the “Admin login” button in the right top portion of the NDC 
                                TEIN CHAPTERS home page</li>
                              <img src="../images/help_images/admin_but.png" alt="" style="width:128;height:128px"/>
                              <p>&nbsp;</p>
                              <li>and then log in details.</p>
                                 <img src="../images/help_images/admin_log.png" alt="" style="width:128;height:400px"/>
                              </ol>
                            </ul> 
                               <p>&nbsp;</p>
                    <h3>STEPS FOR MANAGING AN ACCOUNT</h3>
                          
                            <p>How do i manage my chapter Account as an Admin</p>
                            
                             <ul>
                                <p>&nbsp;</p>
                                <li>New member - Registration of new members.</li>
                                <img src="../images/help_images/new_mem.png" alt="" style="width:128;height:100px"/>
                                <p>&nbsp;</p>
                                <li>Pay Dues - Payment of Dues for members.</li>
                                <img src="../images/help_images/dues.png" alt="" style="width:128;height:100px"/>
                                <p>&nbsp;</p>
                                 <li>View Members - Edit or delete members of the chapter.</li>
                                 <img src="../images/help_images/veiw_mem.png" alt="" style="width:128;height:100px"/>
                                <p>&nbsp;</p>
                                  <li>View Paid Dues - View members dues payment status.</li>
                                  <img src="../images/help_images/view_dues.png" alt="" style="width:100;height:90px"/>
                                <p>&nbsp;</p>
                                <li> live Search</li>
                              <div id="row">

                                  <div class="col-sm-4">
                                      <div class="media service-box wow fadeInRight">

                                <img src="../images/help_images/live.png" alt="" style="width:128;height:160px"/>
                                      </div>
                                </div>
                                  <p>&nbsp;</p> 
                                <div class="col-sm-8">
                                  <div class="media service-box wow fadeInRight">
                                 <ol>          
                                      <li>Search Members - Instant Search of members for easy editing and Deleting.</li>
                                      
                                       <p>&nbsp;</p>     
                                      <li>Search Pay Dues - Instant Search of members for easy payment of dues.</li> 
                                      
                                       <p>&nbsp;</p>  
                                      <li>Search Paid Dues - Instant Search of members Dues payment records and accessment.</li>
                                      
                                       <p>&nbsp;</p>  
                                  </ol>
                                    </div>
                               </div>
                          </div>
                                      
                                      <li>Generate Report - Provide option for record printing and accessment.</li>
                                      <img src="../images/help_images/report.png" alt="" style="width:128;height:100px"/>
                                       <p>&nbsp;</p>  
                                       
                                      <li>Log out - log out the admin to System Homepage.</li>
                                      <img src="../images/help_images/log_out.png" alt="" style="width:128;height:100px"/>
                               
                       </ul> 
                           <p>&nbsp;</p>

                          <p> The Dashboard provide minimum information about the Record of all members of the chapter</p>
                </div>
         </div>
      </div><!-- /.content-wrapper -->
      
      <!-- footer here -->
      <?php include_once '../includes/footer.php'; ?>