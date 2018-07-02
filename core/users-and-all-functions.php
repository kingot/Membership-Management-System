<?php

//now using objected oriented in php and classes
/* ///////////////////////////// check login class //////////////////////////*/

 class login_check{
	
	//checking if username exist for admin 
 public function userExistAdmin($username){
	global $mysqli;
	$query="SELECT admin_id FROM admin WHERE username='$username'";
	$result=$mysqli->query($query);
   if($result->num_rows==1){
	return true;
   }else{
    return false;
   }
}


//...........begin of admin login check..........

public function check_loginAdmin($username, $password){ 

	global $mysqli; 
	$username=$mysqli->real_escape_string($username);
	$password=$mysqli->real_escape_string($password);
  	$query="select admin_id,institutes_tb.institutes_id,username,email,institute_name,institute_logo from admin
			inner join institutes_tb on
			institutes_tb.institutes_id = admin.institutes_id
			where username='$username' AND password='$password'";
  	$result=$mysqli->query($query);
  	if($result->num_rows==0){
  	return false;
  	}else{
  	$admin_id=$result->fetch_array();
   	$_SESSION['admin_id']=$admin_id['admin_id'];
	$_SESSION['username']=$admin_id['username'];
	$_SESSION['email']=$admin_id['email'];
	$_SESSION['institute_name']=$admin_id['institute_name'];
	$_SESSION['institute_logo']=$admin_id['institute_logo'];
	$_SESSION['institutes_id']=$admin_id['institutes_id'];
  
   
	}
}



	//checking if the user is really login bassed 
	//on admin_id
	
  public function logged_in(){
   if(isset($_SESSION['admin_id']) && !empty($_SESSION['admin_id'])){
   return true;
   }else{
   return false;
   }
}


//function checking for admin Id
public function get_admin_id($id){
	global $mysqli;
	$query="SELECT * FROM admin WHERE admin_id=".$_SESSION['admin_id'];
	$result=$mysqli->query($query);
	
	while($rows=$result->fetch_assoc()){
		return $rows['admin_id'];
	}
}




// function to get the admin_user_data

 public function get_admin_user_infor(){ 
 		global $mysqli;
		
		$admin_array=array();
  	$query="SELECT admin_id,username,email FROM admin WHERE admin_id='".$_SESSION['admin_id']."'";
 	$result=$mysqli->query($query);
   
 		
   while($rows=$result->fetch_assoc()){
	   
	   $admin_array['admin_id']=$rows['admin_id'];
	   $admin_array['username']=$rows['username'];
	   $admin_array['email']=$rows['email'];
   }
   return $admin_array;
   
 }
 
 }//end of class
 
 
 

/* ///////////////////////////// change password class //////////////////////////*/
//change password class and functions check

class change_password{
	
	//checking for email

  public function admin_email($email){
	  	global $mysqli;
  $email=$mysqli->real_escape_string($email);
  $query="SELECT email FROM admin WHERE email='$email'";
  
   $result=$mysqli->query($query);
	   if($result->num_rows==1){
	  return true;
	}else{
	if($result->num_rows==0){
	return false;
	}
	} 
  }
 
	public function update_password($hash,$email){
		
		global $mysqli;
		$mysqli->query("UPDATE admin SET password='$hash' WHERE email='$email'");
		
	}
 
}//end of the class





/* ///////////////////////////// regiser chapter class //////////////////////////*/
//the class to register a chapter 

class register_chapter{
	
	public function register_chap($institute_name,$tertiary,$region,$city,$institute_logo){
		global $mysqli;
		
		
		$institute_logo=$_FILES['institute_logo'];
		
		if(empty($institute_name) || empty($tertiary) || empty($region) || empty($city)){
	$error[]='Please all fields are required';
	}else{
   
 if(preg_match('/^[a-zA-Z ]+$/',$city)==false){
   		$error[]='City name must only be in letters '; 
	}
	
	//checking the image
		
		//allowed file extension to upload
		
	$image_name=$_FILES['institute_logo']['name'];
	$file_name_pieces = explode('.', $image_name);
	$file_ext=strtolower(end($file_name_pieces));
	$file_temp=$_FILES['institute_logo']['tmp_name'];
	$file_size=$_FILES['institute_logo']['size'];
	
	if(empty($image_name)){
		$error[]='Please upload your institution logo';
		}
				
	
	$allowed=array('jpg','jpeg','jif','png');
	
	
	
	
	
	if($file_size > 2097152){
		
		$error[]='File size must be 2MB.';
	}
	
	
	if(in_array($file_ext,$allowed)===false){
		$error[]= "Incorrect file type. Allowed: jpg, jpeg, jif, png";
	}
	
	
	if(in_array($file_ext,$allowed)===true){
		
		//upload file here
		$img_path='../images/inst_logo/'.$image_name;
		move_uploaded_file($file_temp,$img_path);
	}
 
}

 if(!empty($error)){
	  echo '<p><ul style="background:#f63"><li>'.implode('</li><li>',$error).'</li></ul><p>';
 }else{
		
	$query = $mysqli->prepare("INSERT INTO institutes_tb(institute_name, 
	tertiary,region,city,institute_logo,date_registered) VALUES (?, ?, ?, ?, ?, NOW())");
	$query->bind_param('sssss', $institute_name,$tertiary,$region,$city,$img_path); 

	$query->execute();
	$_SESSION['institutes_id'] = $query->insert_id;
	
	header("Location: register-step-2.php");


 	}

	}
	
	
	
	
	// selecting image
	
	public function get_image(){
		global $mysqli;
		$query="SELECT institute_logo FROM  institutes_tb WHERE institutes_id=16";
		
		$result=$mysqli->query($query);
		
		while($row=$result->fetch_assoc()){
			
			$image=$row['institute_logo'];
			echo "<img src='$image;'>";
			
		}
		
		
	}
	 
	
	
	//this function register the admin
	
	public function register_admin($institutes_id,$username,$hash,$email){
			global $mysqli;
			
			$confirm_password=$mysqli->real_escape_string($_POST['confirm_password']);
		 $password=$mysqli->real_escape_string($_POST['password']);
		 $username=$mysqli->real_escape_string($username);
		 $email=$mysqli->real_escape_string($email);
			
		if(empty($username) || empty($hash) || empty($confirm_password) || empty($email)){
		$error[]='Please all fields are required';
		}else{
   
   		if(strlen($username)<6){
			$error[]='Username should not be less than 6 letters';
		}
		
 		if(!preg_match('/^[a-zA-Z ]*$/',$username)){
   		$error[]='Username  must only be in letters '; 
	}
	
	if(strlen($hash)<6 AND strlen($hash)>20){ 
		$error[]='Password should not be less than 6 or greater than 20';
	}
	
	if ($password != $confirm_password) {
   		$error[]='Password and confirm password do not match,try again';
}
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		
		$error[]='Invalid email provided, try again';
	}

	
	}
	
	 if(!empty($error)){
		  echo '<p><ul style="background:#f63"><li>'.implode('</li><li>',$error).'</li></ul><p>';
	 }else{
		$mysqli->query("INSERT INTO admin VALUES ('','$institutes_id','$username','$hash','$email')");
	
			echo '
			<div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Complete TEIN Chapter Registration</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
               <p>Thank you for registering your TEIN Chapter, manage your members here <a href="../admin/login-page.php">Admin Login</a></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			 
			
			';
	 }
	
	}
	
}//end of register chapter class




/* ///////////////////////////// register member class //////////////////////////*/
//the class to register a member 


//**********************MEMBER REGISTER FUNCTION**************eben
class register_member{
	
	public function member_register($institutes_id,$admin_id,$surname,$last_name,$level,$constituency,$phone_number,$student_number,$first_name,$dob,$department,$region,$email,$member_image){
		global $mysqli;
		
   $surname=$mysqli->real_escape_string($surname);
   $last_name=$mysqli->real_escape_string($last_name);
   $level=$mysqli->real_escape_string($level);
   $constituency=$mysqli->real_escape_string($constituency);
   $phone_number=$mysqli->real_escape_string( $phone_number);
   //$date_registered=$mysqli->real_escape_string($date_registered);
   $student_number=$mysqli->real_escape_string($student_number);
   $first_name=$mysqli->real_escape_string($first_name);
   $dob=$mysqli->real_escape_string($dob);
   $department=$mysqli->real_escape_string($department);
   $region=$mysqli->real_escape_string($region);
   $email=$mysqli->real_escape_string($email);
   //$semester=$mysqli->real_escape_string ($semester);
   $member_image=$_FILES['member_image'];
  
		
		
		if(empty($surname)|| empty($level)|| empty($constituency)||
			 empty($phone_number)|| empty($student_number)|| empty($first_name)||
			  empty($dob)|| empty($department)|| empty($region)|| empty($email)){
	$error[]='Please all fields are required';
}else{
   
	if(!preg_match('/^[a-zA-Z ]*$/',$surname)){
   		$error[]='surname  must only be in letters '; 
	}
	
	if(!preg_match('/^[a-zA-Z ]*$/',$last_name)){
   		$error[]='Last Name  must only be in letters '; 
	}
	
	if(!preg_match('/^[a-zA-Z ]*$/',$first_name)){
   		$error[]='First Name  must only be in letters '; 
	}
	
	if(!preg_match('/^[a-zA-Z ]*$/',$constituency)){
   		$error[]='constituency  must only be in letters '; 
	}
	
	
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		
		$error[]='Invalid email provided, try again';
	}

	
	if(!preg_match('/^[0-9]*$/',$phone_number)){
   		$error[]='Phone number  must only be in numbers '; 
	}
	
	if(!preg_match('/^[0-9]*$/',$student_number)){
   		$error[]='Phone number  must only be in numbers '; 
	}
	
	//checking the image
		
		//allowed file extension to upload
		
	$image_name=$_FILES['member_image']['name'];
	$file_name_pieces = explode('.', $image_name);
	$file_ext=strtolower(end($file_name_pieces));
	$file_temp=$_FILES['member_image']['tmp_name'];
	$file_size=$_FILES['member_image']['size'];
	
	/*if(empty($image_name)){
		$error[]='Please upload member image';
		}*/
				
	
	$allowed=array('jpg','jpeg','jif','png');
	
	
	
	
	
	if($file_size > 2097152){
		
		$error[]='File size must be 2MB.';
	}
	
	
/*	if(in_array($file_ext,$allowed)===false){
		$error[]= "Incorrect file type. Allowed: jpg, jpeg, jif, png";
	}*/
	
	
	//if(in_array($file_ext,$allowed)===true){
		
		//upload file here
		$img_path='../images/profile/'.$image_name;
		move_uploaded_file($file_temp,$img_path);
		
		
@$target_file = '../images/profile/'.$image_name;
@$resized_file = '../images/profile/'.$image_name;
@$wmax = 128;
@$hmax = 128;
@$this->img_resize($target_file, $resized_file, $wmax, $hmax, $file_ext);
//$this->create_thumb($img_path, $file_ext, $destination);
	//}
 @unlink($file_temp);
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
		
		// }else{
			$mysqli->query("INSERT INTO members_tb VALUES ('','$institutes_id','$admin_id','$student_number','$surname','$first_name','$last_name','$dob','$level','$department','$constituency','$region','$phone_number','$email','$img_path',NOW())");
			
			 echo '
			 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Member Added</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> Member is successfully added.  &nbsp;&nbsp;<a href="view-members.php">view members</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			 
			 
			
			 
			 ';
		// }
		 
 	}

	}
	
	
	
	
	//resize image function 
public function img_resize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $scale_ratio = $w_orig / $h_orig;
    if (($w / $h) > $scale_ratio) {
           $w = $h * $scale_ratio;
    } else {
           $h = $w / $scale_ratio;
    }
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagejpeg($tci, $newcopy, 80);
}
	
//directory means :where the image is to be upload to
  //image means :the image file ext
  //destination :where the thumbnail will be generated.
public function create_thumb($directory, $image, $destination) {
  $image_file = $image;
  $image = $directory.$image;

  if (file_exists($image)) {

    $source_size = getimagesize($image);

    if ($source_size !== false) {

      $thumb_width = 100;
      $thumb_height = 100;

      switch($source_size['mime']) {
        case 'image/jpeg':
             $source = imagecreatefromjpeg($image);
        break;
        case 'image/png':
             $source = imagecreatefrompng($image);
        break;
        case 'image/gif':
             $source = imagecreatefromgif($image);
        break;
      }

      $source_aspect = round(($source_size[0] / $source_size[1]), 1);
      $thumb_aspect = round(($thumb_width / $thumb_height), 1);

      if ($source_aspect < $thumb_aspect) {
        $new_size = array($thumb_width, ($thumb_width / $source_size[0]) * $source_size[1]);
        $source_pos = array(0, ($new_size[1] - $thumb_height) / 2);
      } else if ($source_aspect > $thumb_aspect) {
        $new_size = array(($thumb_width / $source_size[1]) * $source_size[0], $thumb_height);
        $source_pos = array(($new_size[0] - $thumb_width) / 2, 0);
      } else {
        $new_size = array($thumb_width, $thumb_height);
        $source_pos = array(0, 0);
      }

      if ($new_size[0] < 1) $new_size[0] = 1;
      if ($new_size[1] < 1) $new_size[1] = 1;

      $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
      imagecopyresampled($thumb, $source, 0, 0, $source_pos[0], $source_pos[1], $new_size[0], $new_size[1], $source_size[0], $source_size[1]);

      switch($source_size['mime']) {
        case 'image/jpeg':
             imagejpeg($thumb, $destination.$image_file);
        break;
        case 'image/png':
              imagepng($thumb, $destination.$image_file);
        break;
        case 'image/gif':
             imagegif($thumb, $destination.$image_file);
        break;
      }


    }

  }
}
	
	
	//update or edit member informationn function
	
	public function member_register_edit($member_id,$surname,$last_name,$level,$constituency,$phone_number,$student_number,$first_name,$dob,$department,$region,$email,$member_image){
		global $mysqli;
		
   $surname=$mysqli->real_escape_string($surname);
   $last_name=$mysqli->real_escape_string($last_name);
   $level=$mysqli->real_escape_string($level);
   $constituency=$mysqli->real_escape_string($constituency);
   $phone_number=$mysqli->real_escape_string( $phone_number);
   //$date_registered=$mysqli->real_escape_string($date_registered);
   $student_number=$mysqli->real_escape_string($student_number);
   $first_name=$mysqli->real_escape_string($first_name);
   $dob=$mysqli->real_escape_string($dob);
   $department=$mysqli->real_escape_string($department);
   $region=$mysqli->real_escape_string($region);
   $email=$mysqli->real_escape_string($email);
  // $semester=$mysqli->real_escape_string ($semester);
   $member_image=$_FILES['member_image'];
  
		
		
		if(empty($surname)|| empty($level)|| empty($constituency)||
			 empty($phone_number)|| empty($student_number)|| empty($first_name)||
			  empty($dob)|| empty($department)|| empty($region)|| empty($email)){
	$error[]='Please all fields are required';
}else{
   
	if(!preg_match('/^[a-zA-Z ]*$/',$surname)){
   		$error[]='surname  must only be in letters '; 
	}
	
	if(!preg_match('/^[a-zA-Z ]*$/',$last_name)){
   		$error[]='Last Name  must only be in letters '; 
	}
	
	if(!preg_match('/^[a-zA-Z ]*$/',$first_name)){
   		$error[]='First Name  must only be in letters '; 
	}
	
	if(!preg_match('/^[a-zA-Z ]*$/',$constituency)){
   		$error[]='constituency  must only be in letters '; 
	}
	
	
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		
		$error[]='Invalid email provided, try again';
	}

	
	if(!preg_match('/^[0-9]*$/',$phone_number)){
   		$error[]='Phone number  must only be in numbers '; 
	}
	
	if(!preg_match('/^[0-9]*$/',$student_number)){
   		$error[]='Phone number  must only be in numbers '; 
	}
	
	//checking the image
		
		//allowed file extension to upload
		
	$image_name=$_FILES['member_image']['name'];
	$file_name_pieces = explode('.', $image_name);
	$file_ext=strtolower(end($file_name_pieces));
	$file_temp=$_FILES['member_image']['tmp_name'];
	$file_size=$_FILES['member_image']['size'];
	
	/*if(empty($image_name)){
		$error[]='Please upload member image';
		}*/
				
	
	$allowed=array('jpg','jpeg','jif','png');
	
	
	
	
	
	if($file_size > 2097152){
		
		$error[]='File size must be 2MB.';
	}
	
	/*
	if(in_array($file_ext,$allowed)===false){
		$error[]= "Incorrect file type. Allowed: jpg, jpeg, jif, png";
	}*/
	
	
	//if(in_array($file_ext,$allowed)===true){
		
		//upload file here
		$img_path='../images/profile/'.$image_name;
		move_uploaded_file($file_temp,$img_path);
		
@$target_file = '../images/profile/'.$image_name;
@$resized_file = '../images/profile/'.$image_name;
@$wmax = 128;
@$hmax = 128;
@$this->img_resize($target_file, $resized_file, $wmax, $hmax, $file_ext);

// unlink($img_path);

	//}
 
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
		
		// }else{
			$mysqli->query("UPDATE members_tb SET student_number='$student_number',surname=	'$surname',first_name='$first_name',last_name='$last_name',date_of_birth='$dob',level='$level',department='$department',constituency='$constituency',region='$region',phone_number='$phone_number',email='$email',picture='$img_path' WHERE member_id='$member_id'");
			
			 echo '
			 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Member Informtion updated</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> Member information is successfully updated.  &nbsp;&nbsp;<a href="view-members.php">view members</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
			 
			 
			
			 
			 ';
		// }
		 
 	}

	}
	
	
	
	
	
	
}//end of class



///////// pull member data class ////////////////////////////

class get_members_data{
	
	public function get_members($institutes_id,$admin_id){
		global $mysqli;
		
		$query="select * from members_tb where institutes_id='$institutes_id' AND admin_id='$admin_id' ORDER BY member_id DESC LIMIT 100";
		
		$result=$mysqli->query($query);
		
		$num_rows=$result->num_rows;
		
			if($num_rows==0){
				
				echo '
					 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Members Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> You currently have no registered memmbers in your TEIN chapter.  &nbsp;&nbsp;<a href="new-member.php">Register Members</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
				';
			}else{
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
				
		while($rows=$result->fetch_array()){
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
	
	
	
	
	
	///////////////// function to show pay dues page //////////////////////////

public function get_members_dues($institutes_id,$admin_id){
		global $mysqli;
		
		$query="select * from members_tb where institutes_id='$institutes_id' AND admin_id='$admin_id' ORDER BY member_id DESC LIMIT 100";
		
		$result=$mysqli->query($query);
		
		$num_rows=$result->num_rows;
		
			if($num_rows==0){
				
				echo '
					 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Members Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> You currently have no registered memmbers in your TEIN chapter.  &nbsp;&nbsp;<a href="new-member.php">Register Members</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
				';
			}else{
				?>
                
                  <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="color:green">Showing TEIN Registerd Memebers And Paying Dues Link</h3>
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
                        <th>Pay Dues</th>
                       	 <th>Update Dues</th>
                      </tr>
                    </thead>
                <?php
				
		while($rows=$result->fetch_array()){
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
                        <td><i class="fa fa-money"></i>
                       
	 <a onclick="return confirm('You are about to pay dues. Are you Sure?');" <?php echo ' href="pay-dues-page.php?pay=pay&member_id='.$rows['member_id'].'"> Pay Dues</a>';?></td>
     <td><i class="fa fa-money"></i>
                       
	 <a onclick="return confirm('You are about to Update dues. Are you Sure?');" <?php echo ' href="pay-dues-update.php?pay=pay&member_id='.$rows['member_id'].'"> Update Dues</a>';?></td>
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
                        <th>Pay Dues</th>
                      	 <th>Update Dues</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         	
    
      
        
		<?php
		
	}
	}	
	

	

}//end of class




//////////// other non class functions//////////////////////////////////////////////////////
//delete member 

function del_member($member_id){
	global $mysqli;
	$member_id=(int)$member_id;
		$mysqli->query("DELETE FROM members_tb WHERE member_id='$member_id'");
	}
	
function get_member_id($member_id){
		 global $mysqli;
		  $member_id=(int)$member_id;
		 $mysqli->query("SELECT member_id FROM members_tb WHERE member_id='$member_id'");
	}




//////////////// class to manage dues payment ///////////////////////////////////////////

class dues_pay{

 
  public function duespay($institutes_id,$admin_id,$member_id,$amount){
    global $mysqli;
    
    //$dues=$mysqli->real_escape_string($dues);
    $amount=$mysqli->real_escape_string($amount);

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
		
			
			 $mysqli->query("INSERT INTO dues_tb VALUES('','$institutes_id','$admin_id','$member_id','$amount')");
    
    
    
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
		//}
    
      
    // }
     
  }
  }
  
  
  
  
  //function to display paid dues members
  public function get_paid_des($admin_id,$institutes_id){
		global $mysqli;
		
		$query="select  dues_tb.admin_id,members_tb.member_id,dues_tb.member_id, dues_tb.institutes_id,student_number,surname,first_name,level,department,
				 amount from  members_tb
				 INNER JOIN dues_tb ON members_tb.member_id=dues_tb.member_id
				  WHERE dues_tb.admin_id='$admin_id' AND dues_tb.institutes_id='$institutes_id' ORDER BY members_tb.member_id DESC LIMIT 100";
		
		$result=$mysqli->query($query);
		
		$num_rows=$result->num_rows;
		
			if($num_rows==0){
				
				echo '
					 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Dues Payment Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> No member of your chapter have paid his dues.  &nbsp;&nbsp;<a href="pay-dues.php">pay dues.</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
				';
			}else{
				?>
                
                  <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="color:green">Showing Piad Dues Members</h3>
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
                        <th>Dues Paid Amout (GHs)</th>
                 
                      </tr>
                    </thead>
                <?php
				
		while($rows=$result->fetch_array()){
			//$member_id=$rows['member_id'];
			$student_number=$rows['student_number'];
			$surname=$rows['surname'];
			$first_name=$rows['first_name'];
			$level=$rows['level'];
			$department=$rows['department'];
			$amount=$rows['amount'];

			//$member_id=$rows['member_id'];
		?>
                   
                      <tbody>
                       <tr>
                        <!--<td><?php //echo $member_id; ?></td>-->
                        <td><?php echo $student_number; ?></td>
                        <td><?php echo $first_name.' '.$surname ?></td>
                        <td> <?php echo $level; ?></td>
                        <td> <?php echo $department; ?></td>
                       
                        <td> <?php echo $amount.'.00'; ?></td>
                   
                       </td>
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
                        <th>Dues Paid Amout (GHs)</th>
                  
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         	
    
      
        
		<?php
		
	}
	}
	
	
  
  
  
  
  
  // checking if the person has paid a smester dues
  
  public function check_paid_dues_sem_1($member_id){
	  global $mysqli;
	  
	  $result=$mysqli->query("SELECT COUNT(semester_one) FROM dues_tb WHERE member_id='$member_id' AND semester_one=1");
	  if($result){
		  return true;
	  }else{
		 return false; 
	  }
  }
  
  
 
  
  
  
}//end of class

////////////////////////////////////




//////////////////// a class for the dashboad display of members////////////////////////////
//////////////////// total members, paid dues members and chapters /////////////////////////

class dashboard{
	
	//get registered members
	public function get_members_dashboard($institutes_id,$admin_id){
		global $mysqli;
		
		$query="select * from members_tb where institutes_id='$institutes_id' AND admin_id='$admin_id' ORDER BY member_id DESC LIMIT 5";
		
		$result=$mysqli->query($query);
		
		$num_rows=$result->num_rows;
		
			if($num_rows==0){
				
				echo '
					 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Members Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> You currently have no registered memmbers in your TEIN chapter.  &nbsp;&nbsp;<a href="new-member.php">Register Members</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
				';
			}else{
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
				
		while($rows=$result->fetch_array()){
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
                        <td><i class="fa fa-edit"></i><?php echo '<a href="../pages/edit-members.php?edit=edit&member_id='.$rows['member_id'].'"> Edit</a>';?> </td>
                        <td><i class="fa fa-trash-o"></i> 
                       
	 <a onclick="return confirm('Do you really want to delete this member?');" <?php echo ' href="../pages/view-members.php?del=del&member_id='.$rows['member_id'].'"> Trash</a>';?></td>
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
	


	//get paid dues members
	 public function get_paid_des_dashboard($admin_id,$institutes_id){
		global $mysqli;
		
			
		$query="select dues_tb.admin_id,members_tb.member_id,dues_tb.member_id, dues_tb.institutes_id,student_number,surname,first_name,level,department,
				 amount from  members_tb
				 INNER JOIN dues_tb ON members_tb.member_id=dues_tb.member_id
				  WHERE dues_tb.admin_id='$admin_id' AND dues_tb.institutes_id='$institutes_id' ORDER BY members_tb.member_id DESC LIMIT 5";
		
		$result=$mysqli->query($query);
		
		$num_rows=$result->num_rows;
		
			if($num_rows==0){
				
				echo '
					 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Dues Payment Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> No member of your chapter have paid his dues.  &nbsp;&nbsp;<a href="pay-dues.php">pay dues.</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
				';
			}else{
				?>
                
                  <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="color:green">Showing Piad Dues Members</h3>
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
                        <th>Dues Paid Amout (GHs)</th>
                   
                      </tr>
                    </thead>
                <?php
				
		while($rows=$result->fetch_array()){
			//$member_id=$rows['member_id'];
			$student_number=$rows['student_number'];
			$surname=$rows['surname'];
			$first_name=$rows['first_name'];
			$level=$rows['level'];
			$department=$rows['department'];
			$amount=$rows['amount'];
	
			//$member_id=$rows['member_id'];
		?>
                   
                      <tbody>
                       <tr>
                        <!--<td><?php //echo $member_id; ?></td>-->
                        <td><?php echo $student_number; ?></td>
                        <td><?php echo $first_name.' '.$surname ?></td>
                        <td> <?php echo $level; ?></td>
                        <td> <?php echo $department; ?></td>
                       
                        <td> <?php echo $amount.'.00'; ?></td>
                   
                       </td>
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
                        <th>Dues Paid Amout (GHs)</th>
                
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         	
    
        
		<?php
		
	}
	}
	



//functon to display current registered members

public function get_members_current_dashboard($institutes_id,$admin_id){
		global $mysqli;
		
		$query="select * from members_tb where institutes_id='$institutes_id' AND admin_id='$admin_id' ORDER BY member_id DESC LIMIT 8";
		
		$result=$mysqli->query($query);
		
		$num_rows=$result->num_rows;
		
			if($num_rows==0){
				
				echo '
					 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Members Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> You currently have no registered memmbers in your TEIN chapter.  &nbsp;&nbsp;<a href="new-member.php">Register Members</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
				';
			}else{
				?>
                
                    <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                        <span class="label label-danger">8 New Members</span>
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                     <ul class="users-list clearfix">
                <?php
				
		while($rows=$result->fetch_array()){
			$member_id=$rows['member_id'];
			$student_number=$rows['student_number'];
			$first_name=$rows['first_name'];
			$picture=$rows['picture'];
			$level=$rows['level'];
		
			//$member_id=$rows['member_id'];
		?>
                   
      				
                        <li>
                          <img src="<?php echo $picture; ?>" alt="User Image" style="width:120px; height:100px;">
                          <a class="users-list-name" href="#"><?php echo $first_name; ?></a>
                          <span class="users-list-date"><?php echo 'Level '.$level; ?></span>
                        </li>
                     
                     <?php
                      }
                      ?>
                      
                 </ul><!-- /.users-list -->
                      
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="../pages/view-members.php">View All Members</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
         	
    
      
        
		<?php
		
	}
	}


	
	
	///////////////////// function to count number of rows /////////////////////////
	
	/////////////////// count registered members //////////////////////////////////
	
	public function get_members_count($institutes_id,$admin_id){
		global $mysqli;
		
		$query="select * from members_tb where institutes_id='$institutes_id' AND admin_id='$admin_id'";
		
		$result=$mysqli->query($query);
		
		$num_rows_members=$result->num_rows;
		
		echo $num_rows_members;
		
	}
	
	////////////////// count dues paid ////////////////////////////////
	
	 public function get_paid_dues_count($admin_id,$institutes_id){
		global $mysqli;
		
		$query="select dues_tb.admin_id,members_tb.member_id,dues_tb.member_id, dues_tb.institutes_id,student_number,surname,first_name,level,department,
				 amount from  members_tb
				 INNER JOIN dues_tb ON members_tb.member_id=dues_tb.member_id
				  WHERE dues_tb.admin_id='$admin_id' AND dues_tb.institutes_id='$institutes_id'";
		
		$result=$mysqli->query($query);
		
		$num_rows_dues=$result->num_rows;
		
		echo $num_rows_dues;
		
	 }
	
		//count paid id cards
	 public function get_paid_idcard_count($admin_id,$institutes_id){
		global $mysqli;
		
		$query="select card_tb.admin_id,members_tb.member_id,card_tb.member_id, card_tb.institutes_id from  members_tb
				 INNER JOIN card_tb ON members_tb.member_id=card_tb.member_id
				  WHERE card_tb.admin_id='$admin_id' AND card_tb.institutes_id='$institutes_id'";
		
		$result=$mysqli->query($query);
		
		$num_rows_card=$result->num_rows;
		
		echo $num_rows_card;
		
	 }
	
	
	//////////////////// counting all chapter registered //////////////////////////
	
	public function count_chapters(){
		global $mysqli;
		
		$query="select * from institutes_tb";
		
		$result=$mysqli->query($query);
		
		$num_rows_chapters=$result->num_rows;
		
		echo $num_rows_chapters;
		
	}	

	
	//////////////////// just querying all members and all dues from tables//////////////////////////
	
	public function count_members(){
		global $mysqli;
		
		$query="select * from members_tb";
		
		$result=$mysqli->query($query);
		
		$num_rows_members=$result->num_rows;
		
		echo $num_rows_members;
		
	}	
	
	
	public function count_dues_paid(){
		global $mysqli;
		
		$query="select * from dues_tb";
		
		$result=$mysqli->query($query);
		
		$num_rows_dues=$result->num_rows;
		
		echo $num_rows_dues;
		
	}	
	
	

}//end of the class






//////////////////a class to manage paying ID cards ///////////////////////

class pay_id_card{
	
	// get members to pay
	
	
public function get_members_dues_id_card($institutes_id,$admin_id){
		global $mysqli;
		
		$query="select * from members_tb where institutes_id='$institutes_id' AND admin_id='$admin_id' ORDER BY member_id DESC LIMIT 100";
		
		$result=$mysqli->query($query);
		
		$num_rows=$result->num_rows;
		
			if($num_rows==0){
				
				echo '
					 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Members Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> You currently have no registered memmbers in your TEIN chapter.  &nbsp;&nbsp;<a href="new-member.php">Register Members</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
				';
			}else{
				?>
                
                  <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="color:green">Showing TEIN Registerd Memebers And Paying Of ID Card</h3>
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
                        <th>Pay ID Card</th>
                       	
                      </tr>
                    </thead>
                <?php
				
		while($rows=$result->fetch_array()){
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
                        <td><i class="fa fa-money"></i>
                       
	 <a onclick="return confirm('You are about to pay ID Card. Are you Sure?');" <?php echo ' href="pay-idcards-page.php?pay=pay&member_id='.$rows['member_id'].'"> Pay ID Card</a>';?></td>
    
                       
	
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
                        <th>Pay ID Card</th>
                      	
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         	
    
      
        
		<?php
		
	}
	}	
	
	
	
	//function to pay ID Cards
	 public function pay_idcard($institutes_id,$admin_id,$member_id,$amount){
    global $mysqli;
    
    //$dues=$mysqli->real_escape_string($dues);
    $amount=$mysqli->real_escape_string($amount);

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
		
			
			 $mysqli->query("INSERT INTO card_tb VALUES('','$institutes_id','$admin_id','$member_id','$amount')");
    
    
    
       echo '
	   		<div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">ID Card Payment Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> Thank you for paying for your card.  &nbsp;&nbsp;<a href="view-idcard-paid-members.php">View all ID Cards Payment</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	   ';
		//}
    
      
    // }
     
  }
  }
  
  
	
	//function to get paid idcards members
	 public function get_paid_idcards($admin_id,$institutes_id){
		global $mysqli;
		
		$query="select  card_tb.admin_id,members_tb.member_id,card_tb.member_id, card_tb.institutes_id,student_number,surname,first_name,level,department,
				 amount from  members_tb
				 INNER JOIN card_tb ON members_tb.member_id=card_tb.member_id
				  WHERE card_tb.admin_id='$admin_id' AND card_tb.institutes_id='$institutes_id' ORDER BY members_tb.member_id DESC LIMIT 100";
		
		$result=$mysqli->query($query);
		
		$num_rows=$result->num_rows;
		
			if($num_rows==0){
				
				echo '
					 <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Dues Payment Status</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                 <p> No member of your chapter have paid his ID Cards.  &nbsp;&nbsp;<a href="pay-idcards.php">pay dues.</a></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
				';
			}else{
				?>
                
                  <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="color:green">Showing Piad ID Card Members</h3>
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
                        <th>ID Card Amout (GHs)</th>
                 
                      </tr>
                    </thead>
                <?php
				
		while($rows=$result->fetch_array()){
			//$member_id=$rows['member_id'];
			$student_number=$rows['student_number'];
			$surname=$rows['surname'];
			$first_name=$rows['first_name'];
			$level=$rows['level'];
			$department=$rows['department'];
			$amount=$rows['amount'];

			//$member_id=$rows['member_id'];
		?>
                   
                      <tbody>
                       <tr>
                        <!--<td><?php //echo $member_id; ?></td>-->
                        <td><?php echo $student_number; ?></td>
                        <td><?php echo $first_name.' '.$surname ?></td>
                        <td> <?php echo $level; ?></td>
                        <td> <?php echo $department; ?></td>
                       
                        <td> <?php echo $amount.'.00'; ?></td>
                   
                       </td>
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
                        <th>ID Card Amout (GHs)</th>
                  
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
         	
    
      
        
		<?php
		
	}
	}
	
	
	
}// end the class



  
?>