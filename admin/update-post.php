<?php include "header.php"; 
include "config.php";
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <?php 
    $p_id=$_GET['id'];
    $sql2="SELECT * FROM `POST` WHERE post_id=$p_id";
    $result2=mysqli_query($conn,$sql2);
    if(mysqli_num_rows($result2)>0)
    {
        while($row=mysqli_fetch_assoc($result2))
        {
      
    ?>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="save-update-data.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id']  ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['title']  ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?php echo trim($row['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <?php
                                include "config.php";
                                $sql="SELECT * FROM `category`";
                                $result=mysqli_query($conn,$sql);
                                if(mysqli_num_rows($result)>0){
                                    
  
                         while($row1=mysqli_fetch_assoc($result))
                         {
                         $selected="";

                         if($row1['category']==$row['category_name']){
                           $selected="selected";
                             }
                                 ?>
  
                                       
                                        <option value="<?php echo $row1['category_id'] ?>"  <?php echo $selected ?> ><?php echo $row1['category_name'] ?></option>

                                        <?php
                                    }
                                }

                                
                                 
                                ?>
                             
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <!-- <input type="file" name="new-image" accept="image/*" onclick="loadFile(event)">
                
                <img id="output" src="upload/<?php //echo $row['post_img']; ?>" height="150px">
                <p><?php //echo $row['post_img']; ?></p>
                -->
            
                <input type="hidden" name="old-image" class="form-control" value="<?php echo $row['post_img'] ?>" >
    <input type="file" name="new-image" onchange="loadFile(event)">
</br>
    <img height="100px" width="100px" id="output" alt=""  src="upload/<?php echo $row['post_img']; ?>" >

            
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <?php       
        }
    }
    ?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>

<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };
</script>