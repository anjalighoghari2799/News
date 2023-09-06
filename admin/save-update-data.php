<?php
include "config.php";
if(empty($_FILES['new-image']['name'])){
    $file_name=$_POST['old-image'];
}else{
    $errors=array();
    $file_name=$_FILES['new-image']['name'];
    $file_tmp=$_FILES['new-image']['tmp_name'];
    $file_size=$_FILES['new-image']['size'];
    $file_type=$_FILES['new-image']['type'];
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
        move_uploaded_file($file_tmp,"upload/".$file_name);

    }else{
        print_r($errors);
        die();
    }
}
$date=date("d,M,Y");

  $sql="UPDATE post SET title='{$_POST["post_title"]}',description='{$_POST["postdesc"]}',category={$_POST["category"]},post_date='$date',post_img='{$file_name}' WHERE post_id='{$_POST["post_id"]}'";

$result=mysqli_query($conn,$sql);
 if($result){
    header("location:http://localhost/news-site/admin/post.php");
} else
{
    echo "<div class='alert alert-denger'>queru failed</div>";
}





?>