<div id ="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
                        include "config.php";
                        $sql3="SELECT * FROM settings";
                        $result3=mysqli_query($conn,$sql3);
                        if(mysqli_num_rows($result3)>0){
                            while($row3=mysqli_fetch_assoc($result3))
                            {

                           
                        ?>
                <span><?php echo $row3['footerdesc']; ?></a></span>
            <?php
            
                            }}?>
            
            </div>
        </div>
    </div>
</div>
</body>
</html>
