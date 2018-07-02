<?php
/*$host='localhost';
$userName='root';
$password='';
$db='tein_db';
$mysqli= new mysqli($host, $userName, $password, $db);

if($mysqli->connect_errno){
	die('Sorry, we have some problems');
}*/            


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
$admin_id=$_SESSION['admin_id'];
$institutes_id=$_SESSION['institutes_id'];

	
 }


                        
   

if (isset($_POST['search_term'])) {
    $search_term =$_POST['search_term'];
	$search_term=$mysqli->real_escape_string($search_term);

    
    if (!empty($search_term)) {
        # code...
        $query = $mysqli->query("select * from members_tb where institutes_id='$institutes_id' AND admin_id='$admin_id' AND student_number like '%$search_term%'");
                    
                    $result_count =  $query->num_rows;

                    $suffix = ($result_count !=1) ? 's' : '';
                    if ($result_count>=1) {
                      # code...
                       ?>
					   
					   	<div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-refresh fa-spin"></i> searching...</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php    echo '<p>Your search for  '. $search_term.'  returned '.  $result_count. '  result' .$suffix.'</p>' ; ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
					   
					   
					 <?php 
                    
                    
                    ?>
                   
                  <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="color:green">Showing TEIN Registered Memebers</h3>
                  	<?php //include_once '../includes/search-member-form.php'; ?>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Department</th>
                        <th>Constituency</th>
                        <th>Contact</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                <?php
				
		while($rows=$query->fetch_array()){
			$member_id=$rows['member_id'];
			$student_number=$rows['student_number'];
			$surname=$rows['surname'];
			$first_name=$rows['first_name'];
			$level=$rows['level'];
			$department=$rows['department'];
			$constituency=$rows['constituency'];
			$phone_number=$rows['phone_number'];
			//$member_id=$rows['member_id'];
		?>
                   
                      <tbody>
                      <tr>
                        <!--<td><?php //echo $member_id; ?></td>-->
                        <td><?php echo $student_number; ?></td>
                        <td><?php echo $first_name.' '.$surname ?></td>
                        <td> <?php echo $level; ?></td>
                        <td> <?php echo $department; ?></td>
                        <td> <?php echo $constituency; ?></td>
                        <td> <?php echo $phone_number; ?></td>
                        <td><i class="fa fa-edit"></i><?php echo '<a href="edit-members.php?edit=edit&member_id='.$rows['member_id'].'"> Edit</a>';?> </td>
                        <td><i class="fa fa-trash-o"></i> 
                       
	 <a onclick="return confirm('Do you really want to delete this member?');" <?php echo ' href="view-members.php?del=del&member_id='.$rows['member_id'].'"> Trash</a>';?></td>
                      </tr>
                      </tbody> 
                     
                     <?php
                      }
                      ?>
                      
                    <tfoot>
                       <tr>
                       
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Level</th>
                        <th>Department</th>
                        <th>Constituency</th>
                        <th>Contact</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         	
    
      


       <?php
         }
        
        
    }
}

    



?> 
   