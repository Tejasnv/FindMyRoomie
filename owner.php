<?php
    session_start();
    if((isset($_SESSION['username'])) &&($_SESSION['role']!= 1)){
          header('Location: index.php');
    }
    else{
        include 'header.php';
    }
?>
<html>    
<body>
<?php
    if(isset($_POST['upload'])){
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $file_tmp_name = $_FILES['image']['tmp_name'];
        
        if(move_uploaded_file($file_tmp_name,"uploads/$file_name")){
            echo "File is uploaded";
        }
    }
    
     $sqlget = "SELECT * FROM user WHERE id = '".$_SESSION['edit_add_id']."'";
        $sqldata = mysqli_query($connection,$sqlget) 
            or die ('error getting data');

        while($row = mysqli_fetch_array($sqldata)){
            $db_title = $row['title'];
            $db_address = $row['address'];
            $db_description = $row['description'];
        }

    if(isset($_POST['update'])){
            $UpdateQuery = "UPDATE advertisement SET title = '".$_POST['update_title']."',address = '".$_POST['update_address']."',description = '".$_POST['update_description']."' WHERE id = '".$_SESSION['edit_add_id']."'";
            $uq = mysqli_query($connection,$UpdateQuery);

        
    
    
?>
    

<!----- Code to Upload Profile Pictur ----->    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group row">
            <label for="exampleInputName" class="col-sm-2 control-label">Upload Profile Picture</label>
                <div class="col-sm-6">
                    <input type="file" name="image" />
                <input type="submit" name="upload" value="Upload" />
            </div>
        </div>
    </form>            
</body>
<footer>
</footer> 
</html>