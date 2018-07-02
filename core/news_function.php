<?php

//***********************News upload registration************************eben
//the class to register a chapter 

class news_upload{
	
	public function news_ups($news_image,$news_title,$news_body){
		global $mysqli;
		
		$news_title=$mysqli->real_escape_string($news_title);
		$news_body=$mysqli->real_escape_string($news_body);
		
		
		if(empty($news_title) || empty($news_body) ){
	$error[]='Please all fields are required';
}else{
   
    if(preg_match('/^[^\_\.\-\+\=]+[a-zA-Z0-9]+$/',$news_title)==false){
   		$error[]='News title must only be in letters '; 
	}

	
 	
	
	if(empty($_FILES['news_image']['name'])==true){
		$error[]='Please upload your institution logo';
	}
	
	//allowed file extension to upload
	
	$allowed=array('jpg','jpeg','jif','png');
	
	$file_name=$_FILES['news_image']['name'];
	$file_ext=@strtolower(end(explode('.', $file_name)));
	$file_temp=$_FILES['news_image']['tmp_name'];
	$file_size=$_FILES['news_image']['size'];
	
	if($file_size > 2097152){
		
		$error[]='File size must be 2MB.';
	}
	
	
	if(in_array($file_ext,$allowed)===false){
		$error[]= "Incorrect file type. Allowed: jpg, jpeg, jif, png";
	}
	
	if(in_array($file_ext,$allowed)===true){
		
		//upload file here
		$path='../images/news_image/'.$file_name;
		move_uploaded_file($file_temp,$path);
		//move_uploaded_file($file_temp,'../images/news_image/'.$file_name);
	}
	
	
 
}

 if(!empty($error)){
	  echo '<p><ul style="background:#f63"><li>'.implode('</li><li>',$error).'</li></ul><p>';
 }else{

 		$string = serialize($allowed);
		$sql=("INSERT INTO news_tb  VALUES('','$path','$news_title','$news_body')");  
		$mysqli->query($sql);
		
		// }else{
			 echo '<p class="pa">News block has been successfully created, &nbsp;&nbsp;<a href="#">Login</a></a>';
		// }
		 
 	}

	}
	
	
	
}//end of register chapter class
//************************End NEWS UPLOADING***********************eben




//************************End NEWS UPLOADING***********************eben
class news_edit{
	
	public function news_ups_edit($news_image,$news_title,$news_body){
		global $mysqli;
		
		$news_title=$mysqli->real_escape_string($news_title);
		$news_body=$mysqli->real_escape_string($news_body);
		
		
		if(empty($news_title) || empty($news_body) ){
	$error[]='Please all fields are required';
}else{
   
	if(empty($_FILES['news_image']['name'])==true){
		$error[]='Please upload your institution logo';
	}
	
	//allowed file extension to upload
	
	$allowed=array('jpg','jpeg','jif','png');
	
	$file_name=$_FILES['news_image']['name'];
	$file_ext=@strtolower(end(explode('.', $file_name)));
	$file_temp=$_FILES['news_image']['tmp_name'];
	$file_size=$_FILES['news_image']['size'];
	
	if($file_size > 2097152){
		
		$error[]='File size must be 2MB.';
	}
	
	
	if(in_array($file_ext,$allowed)===false){
		$error[]= "Incorrect file type. Allowed: jpg, jpeg, jif, png";
	}
	
	if(in_array($file_ext,$allowed)===true){
		
		//upload file here
		$path='images/news_image/'.$file_name;
		move_uploaded_file($file_temp,$path);
		//move_uploaded_file($file_temp,'../images/news_image/'.$file_name);
	}
	
	
 
}

 if(!empty($error)){
	  echo '<p><ul style="background:#f63"><li>'.implode('</li><li>',$error).'</li></ul><p>';
 }else{

 		$string = serialize($allowed);
		$sql=    ("UPDATE news_tb SET news_image='$path', news_title='$news_title', news_body='$news_body' WHERE news_id='$news_id'");
		$mysqli->query($sql);
		
		// }else{
			 echo '<p class="pa">News block has been successfully created, &nbsp;&nbsp;<a href="#">Login</a></a>';
		// }
		 
 	}

	}
	
	
	
}








//**********************NEWS UPLOAD FUNTION************************eben




//**********************NEWS UPLOAD FUNTION************************eben

/**
* 
*/
class news_views{
	
 		

public function newsview(){
	global $mysqli;
	$query = "SELECT * FROM news_tb ORDER BY news_id DESC LIMIT 6"; 
       //DESC LIMIT 6
            $result=$mysqli->query($query);
                        
            while($row = $result->fetch_assoc()){
                 $news_id= $row["news_id"] ;
                 $news_title= $row['news_title'];
                 $news_body=$row['news_body'];
                 $news_image=$row['news_image'];

                 $news_body = substr($news_body,0,150);
    			 $news_body = substr($news_body,0,strrpos($news_body," "));
                        ?>
         <div class="col-sm-6">
             <div class="media service-box wow fadeInRight">
                 <div class="pull-left">
                 	
                      <?php echo '<img src="Tein-NDC-project/'.$news_image.'" alt="" style="width:128;height:128px">', PHP_EOL;  ?>
                   
                 </div> 
             	<div class="media-body">
             		<!--<a href="ndc_news/see_news.php#row1">seee page</a>-->
             		<a href="ndc_news/see_news.php?news_id=<?php echo $news_id; ?>">
                      <h4 class="media-heading"><!--title--><?php echo $news_title;   ?></h4>
                        <p><?php echo $news_body;   ?></p>
                    </a>
             	</div>
             </div>
         </div>
                                <?php             
            }

	 	}

	}


//**********************NEWS SEE ALL FUNTION************************eben

/**
* 
*/
class news_all_views{
	
 		

public function newsallview(){
	global $mysqli;
	$query = "SELECT * FROM news_tb ORDER BY news_id DESC LIMIT 100"; 
       //DESC LIMIT 6
            $result=$mysqli->query($query);
                        
            while($row = $result->fetch_assoc()){
                 $news_id= $row["news_id"] ;
                 $news_title= $row['news_title'];
                 $news_body=$row['news_body'];
                 $news_image=$row['news_image'];

                 $news_body = substr($news_body,0,150);
    			 $news_body = substr($news_body,0,strrpos($news_body," "));
                        ?>
         <div class="col-sm-6">
             <div class="media service-box wow fadeInRight">
                 <div class="pull-left">
                 	
                      <?php echo '<img src="'.$news_image.'" alt="" style="width:128;height:128px">', PHP_EOL;  ?>
                    
                 </div> 
             	<div class="media-body">
             		<!--<a href="ndc_news/see_news.php#row1">seee page</a>-->
             		<a href="see_news.php?news_id=<?php echo $news_id; ?>">
                      <h4 class="media-heading"><!--title--><?php echo $news_title;   ?></h4>
                        <p><?php echo $news_body;   ?></p>
                    </a>
             	</div>
             </div>
         </div>
                                <?php             
            }

	 	}

	}


//**********************END OF NEWS UPLOAD FUNCTION*****************eben
class news_update{
	
 		

public function newsupdate($news_image,$news_title,$news_body){

if(isset($_FILES['news_image'])&&isset($_POST['news_title'])&&isset($_POST['news_body']) ){
 global $mysqli;
 //instantiation the class
	$news_title=$mysqli->real_escape_string($news_title);
    $news_body=$mysqli->real_escape_string($news_body);
    
    
    if(empty($news_title) || empty($news_body) ){
  $error[]='Please all fields are required';
}else{
   
  if(empty($_FILES['news_image']['name'])==true){
    $error[]='Please upload your institution logo';
  }
  //allowed file extension to upload
  $allowed=array('jpg','jpeg','jif','png');
  $file_name=$_FILES['news_image']['name'];
  $file_ext=@strtolower(end(explode('.', $file_name)));
  $file_temp=$_FILES['news_image']['tmp_name'];
  $file_size=$_FILES['news_image']['size'];
  
  if($file_size > 2097152){
    $error[]='File size must be 2MB.';
  }
  
  if(in_array($file_ext,$allowed)===false){
    $error[]= "Incorrect file type. Allowed: jpg, jpeg, jif, png";
  }
  
  if(in_array($file_ext,$allowed)===true){
    
    //upload file here
    $path='../images/news_image/'.$file_name;
    move_uploaded_file($file_temp,$path);
    //move_uploaded_file($file_temp,'../images/news_image/'.$file_name);
  }
  
  
 
}

 if(!empty($error)){
    echo '<p><ul style="background:#f63"><li>'.implode('</li><li>',$error).'</li></ul><p>';
 }else{

    $string = serialize($allowed);
    $sql=    ("UPDATE news_tb SET news_image='$path', news_title='$news_title', news_body='$news_body' WHERE news_id='$news_id'");
    $mysqli->query($sql);

      if ($mysqli->query($sql)) {
        header("Location: ../register-step-1.php");
      }
     
    // }else{
       echo '<p class="pa">News block has been successfully Updated, &nbsp;&nbsp;<a href="#">Login</a></a>';
    // }
     
 		 }

	   }
	}
}
//**********************NEWS UPLOAD FUNTION************************eben

/**
* 
*/
class news_update_select{
	
 		

public function newsupdateselect(){
	global $mysqli;
	 $news_id=$_GET['news_id'];
	$query = "SELECT * FROM news_tb where news_id='$news_id' "; 
       //DESC LIMIT 6
            $result=$mysqli->query($query);
                        
            while($row = $result->fetch_assoc()){
                 $news_id= $row["news_id"] ;
                 $news_title= $row['news_title'];
                 $news_body=$row['news_body'];
                 $news_image=$row['news_image'];

       }

    }
       
}
//**********************END OF NEWS UPLOAD FUNCTION*****************eben


//********************** VIEW NEWS FUNCTION*************************eben
class news_views_echo{
	
public function newsviewecho(){
	global $mysqli;
	$query = "SELECT * FROM news_tb ORDER BY news_id DESC  "; 
       //DESC LIMIT 6
            $result=$mysqli->query($query);
            ?>
             <h1>UPLOADED NEWS</h1><hr />
             	<?php
              echo '<table border=1 width=100% margin-left= 20px>', PHP_EOL;
		echo '<tr><th width=10%>NEWS ID</th><th width=13%>NEWS IMAGE</th><th width=15%>NEWS TITLE</th><th width=42%>NEWS BODY</th><th width=10%>EDIT</th><th width=10>DELETE</th></tr></table>', PHP_EOL;
            while($row = $result->fetch_assoc()){
                 $news_id= $row["news_id"] ;
                 $news_title= $row['news_title'];
                 $news_body=$row['news_body'];
                 $news_image=$row['news_image'];
                 $news_body = substr($news_body,0,150);
    			 $news_body = substr($news_body,0,strrpos($news_body," "));
    			 		echo '<table border=1 width=100%>', PHP_EOL;
                      	echo '<tr>';
                      	echo '<td width=10%>',$news_id, '</td>', PHP_EOL;
						echo '<td width=13%><img src="'.$news_image.'" alt="HTML5 Icon" style="width:128;height:128px"> </td>', PHP_EOL;
						echo '<td width=15%>', $news_title, '</td>', PHP_EOL;
						echo '<td width=42%>', $news_body, '</td>', PHP_EOL;
                       	?>
                      	<td width=10%> <a  href="Edit_ndc_news.php?news_id=<?php echo $news_id; ?>" onclick="return confirm('Are you sure you wish to Edit this Record?');">Edit</a></td>
                       	<td width=10%> <a  href="delete_ndc_news.php?news_id=<?php echo $news_id; ?>" onclick="return confirm('Are you sure you wish to delete this Record?');">Delete</a></td>
                       	<?php
                     echo '</td></tr>', PHP_EOL;
                      echo '</table>', PHP_EOL;
               }
			}
   		 }
//**********************END OF VIEW NEWS FUNCTION*****************eben


//********************** SINGLE NEWS LINK FUNCTION*****************eben
class views_echo{
	
public function viewecho($news_id){
	global $mysqli;
	$news_id=(int)$news_id;
	$query = "SELECT * FROM news_tb ORDER BY news_id DESC  "; 
       //DESC LIMIT 6
            $result=$mysqli->query($query);
           
           while($row = $result->fetch_assoc()){
                 $news_id= $row["news_id"] ;
                 $news_title= $row['news_title'];
                 $news_body=$row['news_body'];
                 $news_image=$row['news_image'];
                 

    			 return $result;		
                       
   
               }
			}
   		 }


//**********************END OF SINGLE NEWS LINK FUNCTION*****************eben

//********************** DELETE NEWS FUNCTION*********************eben
	function delete_news($news_id){
	global $mysqli;
	$news_id=(int)$news_id;
	$news_id= addslashes($_POST['news_id']);
	$sql = "DELETE FROM news_tb WHERE news_id = '$news_id'";
	 $mysqli->query($sql);
}
//**********************END OF DELETE NEWS FUNCTION*****************eben		


//**********************ADMIN BACKEND FUNCTION*********************eben

//**********************END OF ADMIN BACKEND FUNCTION**************eben









