<?php
include "config.php";
if(empty($_FILES['logo']['name'])){
    $file_name=$_POST['old-logo'];
}else{
    $errors=array();
    $file_name=$_FILES['logo']['name'];
    $file_tmp=$_FILES['logo']['tmp_name'];
    $file_size=$_FILES['logo']['size'];
    $file_type=$_FILES['logo']['type'];
    $file_arr=explode('.',$file_name);
    $file_ext=end( $file_arr);
    $extensions=array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions)===false)
    {
        $errors[]="This extensions file not aalows ,please choose a png or jpeg file";

    }
    if($file_size>2097152){
        $errors[]="file size must be 2mb or lower";
    }
    if(empty($server)==true){
        move_uploaded_file($file_tmp,"images/".$file_name);

    }else{
        print_r($errors);
        die();
    }
}

  $sql="UPDATE settings SET websitename='{$_POST["websitename"]}',logo='$file_name',footerdesc='{$_POST["footerdesc"]}'";

$result=mysqli_query($conn,$sql);
 if($result){
    header("location:http://localhost/news-site/admin/setting.php");
} else
{
    echo "<div class='alert alert-denger'>queru failed</div>";
}





?>