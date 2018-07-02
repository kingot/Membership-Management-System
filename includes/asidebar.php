<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $admin_image; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $admin_username; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search By Students ID Or Name">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>-->
          
          
          
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
           
          
            <li>
              <a href="../pages/new-member.php">
                  <i class="ion ion-person-add"></i><span>New Member</span> <small class="label pull-right bg-green">new</small>
              </a>
            </li>
            
            <li>
              <a href="../pages/pay-dues.php">
                <i class="fa fa-money"></i> <span>Pay Dues</span> 
              </a>
            </li>
            
             <li>
              <a href="../pages/pay-idcards.php">
                <i class="fa fa-money"></i> <span>Pay ID Card</span> 
              </a>
            </li>
            
            <li>
              <a href="../pages/view-members.php">
                <i class="fa fa-th"></i> <span>View Memebers</span>
              </a>
            </li>
             <li>
              <a href="../pages/view-paid-dues-members.php">
                <i class="fa fa-th"></i><span>View Dues Paid</span> 
              </a>
            </li>
            
            <li>
              <a href="../pages/view-idcard-paid-members.php">
                <i class="fa fa-th"></i><span>View ID Card Paid</span> 
              </a>
            </li>
            
            <li class="treeview">
              <a href="#">
               <i class="fa fa-circle-o"></i>
                <span>Live Search</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../pages/search-members.php"><i class="fa fa-refresh fa-spin"></i> Search - Members</a></li>
                  <li><a href="../pages/search-pay-dues.php"><i class="fa fa-refresh fa-spin"></i> Search - Pay Dues</a></li>
                <li><a href="../pages/search-paid-dues.php"><i class="fa fa-refresh fa-spin"></i> Search - Paid Dues Members</a></li>
                 <li><a href="../pages/search-level-page.php"><i class="fa fa-refresh fa-spin"></i> Search - Student Level</a></li>
                
              </ul>
            </li>
           
            <li>
              <a href="../pages/generate-reports.php">
                <i class="fa fa-print"></i> <span>Generate Report</span> 
              </a>
            </li>
           <li>
              <a href="../pages/help.php">
                <i class="fa fa-question-circle"></i> <span>Help</span> 
              </a>
            </li>
          
          
            <li>
              <a href="../admin/logout.php">
                <i class="fa fa-sign-out"></i> <span>Log out</span> <small class="label pull-right bg-green"></small>
              </a>
            </li>
            
            
        </section>
        <!-- /.sidebar -->
      </aside>