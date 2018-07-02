
<?php
  include_once '../core/initialize-all-pages.php'; 

  
  if(isset($_GET['news_id']))
  {
    
  $news_id=$_GET['news_id'];
  $delete=$mysqli->query("DELETE FROM news_tb WHERE news_id='$news_id'");
  if($delete)
  {
      header("Location:../ndc_news/register-step-1.php");
  }
  else
  {
      echo $mysqli->error();
  }
  }else{
    echo "is not set";
    
  } 
?>
