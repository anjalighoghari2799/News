<?php 
include "config.php";
$cid=$_GET['id'];
$sql="DELETE FROM `category` WHERE category_id={$cid}";
$result=mysqli_query($conn,$sql);
if($result){
    header("location:http://localhost/news-site/admin/category.php");
}

?>