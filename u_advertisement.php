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
    if(isset($_POST['title'])){
    
        $sqlget = "SELECT * FROM advertisement";
        $sqldata = mysqli_query($connection,$sqlget) 
            or die ('error getting data');
        

        $UpdateQuery = "INSERT INTO 
                        advertisement (title, address, description,rent, publisher,role) 
                        VALUES ('".$_POST['title']."', '".$_POST['address']."',
                                '".$_POST['description']."','".$_POST['rent']."',
                                '".$_SESSION['username']."','".$_SESSION['role']."')";
            $uq = mysqli_query($connection,$UpdateQuery);
        $_SESSION['title'] = $_POST['title'];

        
        $editID = "SELECT id FROM advertisement ORDER BY id DESC LIMIT 1";
        $sqlID = mysqli_query($connection,$editID) 
            or die ('error getting data');

        if($row = mysqli_fetch_array($sqlID)){
//            echo $row['id'];
            $_SESSION['edit_add_id'] = $row['id'];
    }

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
                        <input type="text" class="form-control " name="title" placeholder="Enter Title">
                    </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="address" placeholder="Enter Address">
                    </div>
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-3 control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="description" rows="5" placeholder="Enter Description"></textarea>
                        </textarea>
                    </div>  
            </div>
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-3 control-label">Rent</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="rent" placeholder="$ 0">
                    </div>
            </div>
    
            <div class="col-sm-offset-3 col-sm-9">
                <input name="create" type="submit" class="btn btn-primary btn-lg btn-block" value="Create" /> 
            </div>
        </form>

        </div>
        <div class="col-sm-4">
            <div id="googlemaps">
            </div>
        </div>
</div>    
</body>

    
<footer>
</footer>
        
</html>