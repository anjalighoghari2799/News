<?php include 'header.php'; ?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
               
                <div class="post-container">
                    <?php
                $search=mysqli_real_escape_string($conn,$_GET['search']);

                    
                    ?>
                  <h2 class="page-heading">search :<?php echo $search ?></h2>
                  <?php
                 
                include "config.php";

                
                $limit = 3;

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;  
                }
                $offset = ($page - 1) * $limit;
                $sql = "SELECT post.post_id,post.title,post.description,category.category_id,category.category_name AS category,
                post.post_date,post.post_img,user.user_id,user.username AS author 
                FROM `post` JOIN category ON post.category=category.category_id 
                JOIN user ON post.author=user.user_id 
                WHERE post.title LIKE '%{$search}%' OR 
                post.description LIKE '%{$search}%' ";
                $result = mysqli_query($conn, $sql) or die('NOT RECORD FOUND');
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                            <a class="post-img" href="single.php?id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" height="200px" width="200px" /></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                <h3><a href='single.php?id=<?php echo $row['post_id']; ?>'></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='category.php?cid=<?php echo $row['category_id']; ?>'><?php echo $row['category']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='author.php?aid=<?php echo $row['user_id'] ?>'><?php echo $row['author']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                           
                                           <?php echo $row['post_date']; ?>
                                                </span>
                                            </div>
                                            <p class="description"><?php echo substr($row['description'], 0, 130) . "..."; ?></p>
                                            <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id']; ?>'>read more</a>
                                        </div>
                            </div>
                        </div>
                    </div>
                    <?php }
                }else{
                    echo"<h2>NO RECORD FOUND....X</h2>";
                }
                
                
                
                ?>
                    
                    <!-- <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul> -->
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
