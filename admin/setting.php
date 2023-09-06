<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Website Settings</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                <?php  
                include "config.php";
                $sql="SELECT * FROM settings";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)){
                    while($row=mysqli_fetch_assoc($result))
                    {
                   
                
                    
                ?>
                  <!-- Form -->
                  <form  action="save-setting.php" method="POST" enctype="multipart/form-data">
                   
                   
                      <div class="form-group">
                          <label for="post_title">Website Name</label>
                          <input type="text" name="websitename" class="form-control" value="<?php echo $row['websitename'] ?>" autocomplete="off" required>
                      </div>
                      
                      <div class="form-group">
                          <label for="exampleInputPassword1">Website Logo</label>
                          <input type="file" name="logo" required>
                          <img src="images/<?php echo $row['logo']?>" width="100px">
                          <input type="hidden" name="old_logo" value="<?php echo $row['logo']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Footer Description</label>
                          <textarea name="footerdesc" class="form-control" rows="4" required><?php echo $row['footerdesc'] ?></textarea>
                      </div>
                      
                      <input type="submit" name="submit" class="btn btn-primary" value="Save"  required />
                  </form>
                  <!--/Form -->
                <?php     
                    }
                  }
                   ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
