<?php 
include "config.php";
if(isset($_POST['submit'])){
    $user_id=mysqli_real_escape_string($conn,$_POST['user_id']);
    $fname=mysqli_real_escape_string($conn,$_POST['f_name']);
    $lname=mysqli_real_escape_string($conn,$_POST['l_name']);
    $uname=mysqli_real_escape_string($conn,$_POST['username']);

    //$pass=mysqli_real_escape_string($conn,md5($_POST['password']));
    $urole=mysqli_real_escape_string($conn,$_POST['role']);

 $sql1="UPDATE user SET first_name='{$fname}',last_name='{$lname}',username='{$uname}',role='{$urole}' WHERE user_id={$user_id}";

$result=mysqli_query($conn,$sql1);

if($result){
    header("location:http://localhost/news-site/admin/users.php");
}else{
    echo "NOT SUCCESS - 500";
}


}?>