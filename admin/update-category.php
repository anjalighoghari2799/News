<?php include "header.php"; 
include "config.php";
if(isset($_POST['submit']))
{
$cname=$_POST['cat_name'];
$cid=$_GET['id'];
$sql1="UPDATE category SET category_name='{$cname}' WHERE category_id={$cid}";
$result1=mysqli_query($conn,$sql1);
if($result1)
{
    header("location:http://localhost/news-site/admin/category.php");
}else{
    echo "NOT SUCCESS - 500";
}


}
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
              <?php 
                include "config.php";
                $cid=$_GET['id'];
                $sql="SELECT * FROM `category` WHERE category_id=$cid";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {
                 while($row=mysqli_fetch_assoc($result))
                {

?>
                  <form action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id'] ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'] ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                </div>
              </div>
            </div>
          </div>
          <?php      
    }
}
?>
<?php include "footer.php"; ?>
