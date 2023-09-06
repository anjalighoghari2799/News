<!DOCTYPE html>
<?php
include "config.php";
$page=basename($_SERVER['PHP_SELF']);
switch($page){
case "single.php":
if(isset($_GET['id'])){
    $sql2="SELECT * FROM post WHERE post_id={$_GET['id']}";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $ptitle=$row2['title'];
}else
{echo "NO RESULT FOUND";
}break;
case "category.php":
    if(isset($_GET['cid'])){
        $sql2="SELECT * FROM category WHERE category_id={$_GET['cid']}";
        $result2=mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
        $ptitle=$row2['category_name'];
    }else
    {echo "NO RESULT FOUND";
    }break;
    case "author.php":
        if(isset($_GET['aid'])){
            $sql2="SELECT * FROM user WHERE user_id={$_GET['aid']}";
            $result2=mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
            $ptitle=$row2['username'];
        }else
        {
            echo "NO RESULT FOUND";
        }break;
        case "single.php":
            if(isset($_GET['id'])){
                $sql2="SELECT * FROM post WHERE post_id={$_GET['id']}";
                $result2=mysqli_query($conn,$sql2);
                $row2=mysqli_fetch_assoc($result2);
                $ptitle=$row2['title'];
            }else
            {
                echo "NO RESULT FOUND";
            }break;
            case "search.php":
                if(isset($_GET['search'])){
                
                    $ptitle=$_GET['search'];
                }else
                {
                    echo "NO RESULT FOUND";
                }break;
                default:
                $ptitle="NEWS SITE";
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $ptitle ?></title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
            <?php
                        include "config.php";
                        $sql3="SELECT * FROM settings";
                        $result3=mysqli_query($conn,$sql3);
                        if(mysqli_num_rows($result3)>0){
                            while($row3=mysqli_fetch_assoc($result3))
                            {

                           
                        ?>
                <a href="index.php" id="logo"><img src="admin/images/<?php echo $row3['logo']; ?>"></a>
                <?php }}?>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?php include "config.php";
                    if(isset($_GET['cid'])){
                        $cid=$_GET['cid'];
                    }
               
                $sql="SELECT * FROM category WHERE post > 0";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    $active="";
                    ?>
                <ul class='menu'>
                <li><a class='<?php echo $active ?>' href='http://localhost/news-site/index.php'>HOME</a></li>

                    <?php while($row=mysqli_fetch_assoc($result)) { 
                   if(isset($_GET['cid'])){
                     if($row['category_id'] == $cid){
                        $active="active";
                    }else{
                        $active="";
                    }
                }
                   ?>

                    <li><a class='<?php echo $active ?>' href='category.php?cid=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a></li>
                     <?php } ?>
                </ul>
            <?php } ?>
            </div>

        </div>
    </div>
</div>
<!-- /Menu Bar -->
