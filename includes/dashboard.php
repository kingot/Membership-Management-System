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
<section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="admin-page.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red" >
                <div class="inner" style="background:red">
                <div class="icon">
				
					</div>
                   
                  <h3>
                   <?php
               $dashboard= new dashboard;
			   
			   $dashboard-> get_members_count($institutes_id,$admin_id);
			   
			   ?> 
                  </h3>
                  <p>Registered Members</p>
                </div>
                <div class="icon">
                 <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <div class="icon">
				<i class="fa fa-money"></i>
					</div>
                  <h3>
                   <?php
               $dashboard= new dashboard;
			   
			   $dashboard->  get_paid_dues_count($admin_id,$institutes_id);
			   
			   ?> 
                  </h3>
                  <p>Dues Paid</p>
                </div>
                <div class="icon">
                
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-black">
                <div class="inner">
                 <div class="icon">
				<i class="fa fa-object-group"></i>
					</div>
               
                  <h3>
                  <?php
               $dashboard= new dashboard;
			   
			   $dashboard->  count_chapters();
			   
			   ?> 
                  </h3>
                  <p>Registerd Chapters</p>
                </div>
                <div class="icon">
                  
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>
                   <?php
               $dashboard= new dashboard;
			   
			   $dashboard->  get_paid_idcard_count($admin_id,$institutes_id);
			   
			   ?> 
                  </h3>
                  
                  <p>Paid ID Cards</p>
                </div>
                <div class="icon">
                 
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->
          
          <!-- Main row -->
              
              <!-- Map box -->
             
              
             

              <!-- Calendar -->
			<div class="row">
            
               <div class="col-sm-6">
               <?php
               $dashboard= new dashboard;
			   
			   $dashboard->get_members_current_dashboard($institutes_id,$admin_id);
			   
			   ?> 
                </div>
                
                
            <div class="col-sm-6">
		             
              <div class="box box-solid bg-green-gradient">
                <div class="box-header">
                  <i class="fa fa-calendar"></i>
                  <h3 class="box-title">Calendar</h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <div class="btn-group">
                      <button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></button>
                 
                    </div>
                    <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <!--The calendar -->
                  <div id="calendar" style="width: 100%"></div>
                </div><!-- /.box-body -->
                <div class="box-footer text-black">
                <br> <br> <br>
           			<p>Calander Plan...comming soon!</p>
                </div>
              </div><!-- /.box -->
              </div>
              
                </div><!-- end of calender and oter row-->
                
                
                <!-- showing registered members-->
                <div class="row">
                	<div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Registered Members</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p>Showing Registered Members <a href="../pages/view-members.php">See All Members</a><p>
                 
                 <?php 
				 $dashboard= new dashboard;
				 $dashboard->get_members_dashboard($institutes_id,$admin_id);
				 ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
             
                </div><!--end of row -->
                
                
                <!-- showing paid dues members-->
                <div class="row">
                	<div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Paid Dues Members</h3>
                  <div class="box-tools pull-right">
                     <button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p>Showing Paid Dues Members <a href="../pages/view-paid-dues-members.php">See All Members</a><p>
                 <?php
				 $dashboard= new dashboard;
				 $dashboard->get_paid_des_dashboard($admin_id,$institutes_id);
				 ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              
              
                </div><!--end of row -->