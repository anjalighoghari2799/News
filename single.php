<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                  <?php
                include "config.php";
                
                $pid=$_GET['id'];
                $sql="SELECT post.viewcount, post.post_id,post.title,post.description,category.category_id,category.category_name AS category,post.post_date,post.post_img,user.user_id,user.username AS author FROM `post` JOIN category ON post.category=category.category_id JOIN user ON post.author=user.user_id WHERE post.post_id={$pid}";
               
                $result=mysqli_query($conn,$sql) or die("query not fier");
               if(mysqli_num_rows($result)>0)
               {
                while($row=mysqli_fetch_assoc($result)) 
                {     
                    $viewcount =$row['viewcount'];
                    ?>
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $row['title']; ?></h3>
                            <h3> VIEW : <?php echo $row['viewcount']; ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $row['category']; ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php?aid=<?php echo $row['user_id'] ?>'><?php echo $row['author']; ?></a>                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date']; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/>
                            <p class="description">
                            <?php echo $row['description']; ?></p>
                        </div>
                    </div>
                    <?php }
               }
               ?>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>

    

  <?php
    $viewcount=$viewcount+1;
     $query = "UPDATE `post` SET `viewcount`='$viewcount' ";
   $resultupdate = mysqli_query($conn,$query);

?>
  
<?php include 'footer.php'; ?>
