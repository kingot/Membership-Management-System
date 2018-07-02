
<?php 
ob_start();
	include_once 'core/connect.php'; 
	include_once 'core/users-and-all-functions.php'; 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
global $mysqli;
		$query="SELECT institute_logo FROM  institutes_tb WHERE institutes_id=33 ";
		
		$result=$mysqli->query($query);
		
		while($row=$result->fetch_assoc()){
			
			$image=$row['institute_logo'];
			
			
		}

//$register->get_image();
?>
<hr>
<?php echo  $image; ?>
<img src="<?php echo $image; ?>"/>

</body>
</html>