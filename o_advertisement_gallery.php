<?php
    session_start();
    if((isset($_SESSION['username'])) &&($_SESSION['role']!= 1)){
          header('Location: index.php');
    }
    else{
        include 'header.php';
    }
?>

<?php 
    if(isset($_POST['go'])){
        $sqlgal = "SELECT * FROM gallery";
        $sqlimg = mysqli_query($connection,$sqlgal) 
            or die ('error getting data');
        
        $db_id = 0;
        while($row = mysqli_fetch_array($sqlimg)){
            $db_id = $row['id'];
        }
    
//Code to Upload Image    
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $file_tmp_name = $_FILES['image']['tmp_name'];
        
        $file_ext = explode('.',$file_name);
        $file_ext = strtolower(end($file_ext));

//print_r($file_ext); 
        $temp = $_SESSION['title'] . "_" . $db_id;
        $temp2 = $_SESSION['title'] . "_" . $db_id . ".". $file_ext;

//echo $temp;
            $UpdateQuery = "INSERT INTO gallery (title, image, adID) 
                            VALUES ('".$_SESSION['title']."', 
                                    '".$temp2."',
                                    '".$_SESSION['edit_add_id']."')";
        
            $uq = mysqli_query($connection,$UpdateQuery);

        $file_name = $temp.".".$file_ext; 
        
        if(move_uploaded_file($file_tmp_name,"uploads/$file_name")){
            echo '<div class="alert alert-success" role="alert">';
            echo "Gallery picture";
            echo ' - is <b> ADDED </b></div>';
        }
//header('Location: o_yourad.php');
    }    
?>

<?php
//DELETE images

    if(isset($_POST['delete'])){
//        echo $_POST['imgToDel'];
        $sqlDel = "DELETE FROM gallery WHERE image = '".$_POST['imgToDel']."'";
        $sqlimg = mysqli_query($connection,$sqlDel) 
            or die ('error getting data');


//DELETE file from folder after checking if they exists
        $file = 'uploads/'.$_POST['imgToDel'];
                if(file_exists($file)){
            unlink('uploads/'.$_POST['imgToDel']);
        }
                   
    }

?>

<html>
<body>
    
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-8">
        <form method="post" enctype="multipart/form-data"> 
            
<!-- Upload Images For gallery            -->
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-2 control-label">Upload Picture</label>
                <div class="col-sm-9">
                    <input type="file" name="image" />
                    <input type="hidden" name="go" />
                    <input type="submit" name="upload" value="Upload" />
                </div>
            </div>
        </form>
        </div>
    </div>
</div>    
</body>

<?php 
        $sqlgal = "SELECT * FROM gallery WHERE adID = '".$_SESSION['edit_add_id']."'";
        $sqlimg = mysqli_query($connection,$sqlgal) 
            or die ('error getting data');
        
        while($row = mysqli_fetch_array($sqlimg)){
            echo '<img class="img-responsive" src="uploads/';
            echo $row['image'];
            echo '">';
            echo '<form method="post" enctype="multipart/form-data">';
            echo '<input type="hidden" name="imgToDel" value="' .$row['image']. '" />';
            echo '<input type="submit" name="delete" value="Delete" />';
            echo '</form>';
    }
?>
<footer>
</footer>
        
</html>