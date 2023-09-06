<?php 
include "config.php";

if( $_SESSION["user_role"]=='0'){
    header("location:http://localhost/news-site/admin/post.php");
  }

$u_id=$_GET['id'];
$sql="DELETE FROM `user` WHERE user_id='$u_id'";
$result=mysqli_query($conn,$sql);
if($result)
{
    header("location:http://localhost/news-site/admin/users.php");
}



?>