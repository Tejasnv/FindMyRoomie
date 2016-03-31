<?php
    session_start();
    if((isset($_SESSION['username'])) &&($_SESSION['role']!= 0)){
          header('Location: index.php');
    }
    else{
        include 'header.php';
    }
?>
<html>    
    
    
<body>

<?php 
    $sqlget = "SELECT * FROM users WHERE name = '".$_SESSION['username']."' ";
    $sqldata = mysqli_query($connection,$sqlget) 
        or die ('error getting data');
    
        while($row = mysqli_fetch_array($sqldata)){
//          $id = $row["id"];
            $db_name = $row['name'];
            $db_email = $row['email'];
            $db_id = $row['id'];
        }
    
    if(isset($_POST['update'])){
//Check for Password with reEntered Password and continue if MATCHED
        if($_POST['update_password'] == $_POST['update_re_password'] ){
            
//Successful Upgrade message 
        echo '<div class="alert alert-success" role="alert">';
        print_r($db_name);
        echo ' - is <b> UPDATED </b></div>';
     
//Update Owner Password   
            if($_POST['update_password'] != ""){
                    $UpdateQuery = "UPDATE users SET password = '".$_POST['update_password']."' WHERE id = '".$_POST['hidden']."'";
                    $uq = mysqli_query($connection,$UpdateQuery);
            }    
            
//Update Owner Profile 
        $UpdateQuery = "UPDATE users SET name = '".$_POST['update_name']."',email = '".$_POST['update_email']."' WHERE id = '".$_POST['hidden']."'";
        $uq = mysqli_query($connection,$UpdateQuery);
    
    
//Update publisher as we update Owner Profile
        $UpdatePublisher = "UPDATE advertisement SET publisher = '".$_POST['update_name']."' WHERE publisher = '".$db_name."'";
        $up = mysqli_query($connection,$UpdatePublisher);


            $db_name = $_POST['update_name'];
            $db_email = $_POST['update_email'];
            $_SESSION['username'] = $_POST['update_name'];
//            $_SESSION['email'] = $_POST['update_email'];
        }
        
//Error While Upgrade message 
        else{
                echo '<div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Password should match
                    </div>';
            }
    }

//Code to Upload Image    
    if(isset($_POST['upload'])){
        $file_name = $_FILES['image']['name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];
        $file_tmp_name = $_FILES['image']['tmp_name'];

        $file_ext = explode('.',$file_name);
//        $file_ext = end($file_ext);
        $file_ext = strtolower(end($file_ext));        
        print_r($file_ext); 

        $file_name = $db_id.".jpg"; 
        
        if(move_uploaded_file($file_tmp_name,"uploads/$file_name")){
            echo '<div class="alert alert-success" role="alert">';
            echo "Profile picture";
            echo ' - is <b> UPDATED </b></div>';
        }
    
        
    }

?>

    
<div class="container-fluid">
        <form method="post" enctype="multipart/form-data"> 
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control " name="update_name" value="<?php echo $db_name ?>">
                    </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="update_email" value="<?php echo $db_email ?>">
                    </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="update_password" placeholder="Password">
                    </div>  
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-2 control-label">ReEnter Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="update_re_password" placeholder="Password">
                    </div>  
            </div>
<!----- Code to Upload Profile Pictur ----->    
        <div class="form-group row">
            <label for="exampleInputName" class="col-sm-2 control-label">Upload Profile Picture</label>
                <div class="col-sm-6">
                    <input type="file" name="image" />
                    <input type="submit" name="upload" value="Upload" />
                </div>
        </div>
            <input type="hidden" class="form-control" name="hidden" value="<?php echo $db_id ?>">
            <div class="col-sm-offset-2 col-sm-6">
                <input name="update" type="submit" class="btn btn-primary btn-lg btn-block" value="Update" /> 
            </div>
        </form>
</div>    
</body>

<footer>
    
</footer>
        
</html>