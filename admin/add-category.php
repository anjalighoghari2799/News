<?php include "header.php"; ?>
<?php
if(isset($_POST['save'])){
                include "config.php";
                $caten=$_POST['cate'];
                $sql="INSERT INTO `category`(`category_name`) VALUES ('$caten')";
                $result=mysqli_query($conn,$sql);
                if($result){
                    header("location:http://localhost/news-site/admin/category.php");
                }
               
}
                ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
             
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
              
                  <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cate" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
