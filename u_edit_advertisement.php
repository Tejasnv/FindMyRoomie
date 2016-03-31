<?php
    session_start();
    if((isset($_SESSION['username'])) &&($_SESSION['role']!= 0)){
          header('Location: index.php');
    }
    else{
        include 'header.php';
    }
?>


<?php 
        $sqlget = "SELECT * FROM advertisement WHERE id = '".$_SESSION['edit_add_id']."'";
        $sqldata = mysqli_query($connection,$sqlget) 
            or die ('error getting data');
        while($row = mysqli_fetch_array($sqldata)){
            $db_title = $row['title'];
            $db_address = $row['address'];
            $db_description = $row['description'];
            $db_rent = $row['rent'];
        }
    if(isset($_POST['update'])){
            $UpdateQuery = "UPDATE advertisement SET 
                            title = '".$_POST['update_title']."',
                            address = '".$_POST['update_address']."',
                            description = '".$_POST['update_description']."', 
                            rent = '".$_POST['update_rent']."'
                            WHERE id = '".$_SESSION['edit_add_id']."'";
            $uq = mysqli_query($connection,$UpdateQuery)
                    or die ('error getting data');
        
            $db_title = $_POST['update_title'];
            $db_address = $_POST['update_address'];
            $db_description = $_POST['update_description'];
            $db_rent = $_POST['update_rent'];
    
//Change Session Title for consistency        
        $_SESSION['title'] = $_POST['update_title'];

        
//Update Title at Gallery Database 
        $UpdateImgTitle = "UPDATE gallery SET title = '".$_POST['update_title']."' WHERE title = '".$_SESSION['title']."'";
        $uImgTitle = mysqli_query($connection,$UpdateImgTitle)
                    or die ('error getting data');
            

        
        
//Add Images        

        header('Location: u_advertisement_gallery.php');


    } 

?>
    
<html>    
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data"> 
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-3 control-label">Title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control " name="update_title" value="<?php echo $db_title; ?>">
                    </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="update_address" value="<?php echo $db_address; ?>">
                    </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="update_description" rows="8" placeholder=""><?php echo $db_description; ?>
                        </textarea>
                    </div>  
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-3 control-label">Rent</label>
                    <div class="col-sm-4">
                        <input type="number" class="form-control" name="update_rent" value="<?php echo $db_rent; ?>">
                    </div>
            </div>
            <div class="col-sm-offset-3 col-sm-9">
                <input name="update" type="submit" class="btn btn-primary btn-lg btn-block" value="Update" /> 
            </div>
        </form>
        </div>
        <div class="col-sm-4">
            <div class="embed-responsive embed-responsive-4by3">
                <address>
                    <?php echo $db_address; ?>
                </address>
            </div>
        </div>
    </div>    
</div>    
</body>

    
<footer style="margin-top: 131px;">
    <?php
        include 'footer.php';
    ?>
   </footer>
        
</html>