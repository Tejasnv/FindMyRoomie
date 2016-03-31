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
    if(isset($_POST['edit'])){
          $_SESSION['edit_add_id'] = $_POST['hidden'];
          header('Location: u_edit_advertisement.php');
    }

    if(isset($_POST['delete'])){
        echo  "<h2>Title \"<b>" .$_POST['hidden_title'] . "</b>\" has been DELETED</h2>";
    
//Delete advertisement    
        $sqlget = "DELETE
        FROM advertisement WHERE id = '". $_POST['hidden']."' ";
        $sqldata = mysqli_query($connection,$sqlget) 
                        or die ('error getting data');

        
//DELETE file from folder after checking if they exists        
        $sqlgal = "SELECT * FROM gallery 
                    WHERE adID = '".$_SESSION['edit_add_id']."'";
        $sqlimg = mysqli_query($connection,$sqlgal) 
            or die ('error getting data');
        
        
  $sqlDel = "DELETE FROM gallery WHERE id = '".$_SESSION['edit_add_id']."'";
                while($row = mysqli_fetch_array($sqlimg)){
            $file = 'uploads/'.$row['image'];
                if(file_exists($file)){
            unlink('uploads/'.$row['image']);
                }
        }
        
//Delete advertisement Gallery        
        $sqlDel = "DELETE FROM gallery 
                    WHERE adID = '".$_SESSION['edit_add_id']."'";
        $sqlimg = mysqli_query($connection,$sqlDel) 
            or die ('error getting data');
 
    
/*        $sqlDel = "DELETE FROM gallery WHERE id = '".$_SESSION['edit_add_id']."'";
        $sqlimg = mysqli_query($connection,$sqlDel) 
            or die ('error getting data');


//DELETE file from folder after checking if they exists
        $file = 'uploads/'.$_POST['imgToDel'];
                if(file_exists($file)){
            unlink('uploads/'.$_POST['imgToDel']);
        }

  */  
    }

?>


<html>    
<body>
    
<div class="container-fluid">
    <a href="u_advertisement.php">click here to add</a>
</div>    

<div class="container-fluid">
<div class="container-fluid">
    <?php 
        $sqlget = "SELECT * FROM advertisement WHERE publisher = '".$_SESSION['username']."' ORDER BY ID DESC";
        $sqldata = mysqli_query($connection,$sqlget) 
            or die ('error getting data');
    
//Google maps Precursor
    $gmaps = "http://maps.google.com/?q=";

             while($page = mysqli_fetch_array($sqldata)){
                    echo  "<div class='row'><h2><b>" .$page ['title'] . "</b></h2><div class='col-sm-8'>";
                    echo  $page ['description'];
                    echo  "<br>Rent : $ ".$page ['rent'];
                    echo  '<h5> <a href= "'. $gmaps . $page ['address'] .'" target ="blank">' .$page ['address']. "</a></h5>";
                    echo "Published by " . $page['publisher'];
                    echo "</div><div class='col-sm-4'>";
//Show Image    
            $sqlgal = "SELECT * FROM gallery WHERE title = '".$page ['title'] ."'";
            $sqlimg = mysqli_query($connection,$sqlgal) 
                or die ('error getting data');
         
             
            if($row = mysqli_fetch_array($sqlimg)){
        
                echo '<img class="img-responsive" src="uploads/';
                echo $row['image'];
                echo '">';
      
        }
         
            echo "</div></div>";
                 echo '<form method="post"><div >
                        <input type="hidden" class="form-control" name="hidden_title" value="';
            
            echo  $page['title'] ;               
            echo '"> <input type="hidden" class="form-control" name="hidden" value="';

//Get it of the Add to Edit
            
            echo  $page['id'] ;               
            echo '">  <input name="edit" type="submit" class="btn btn-primary" value="Edit" /> 
                      <input name="delete" type="submit" class="btn btn-danger" value="Delete" /> 
                      </div></form>';

         }
/* 
    while($page = mysqli_fetch_array($sqldata)){
                echo  "<h2><b>" .$page ['title'] . "</b></h2>";
                echo  $page ['description'];
                echo  "<h5>" .$page ['address'] . "</h5>";

                
            echo '<form method="post"><div >
                        <input type="hidden" class="form-control" name="hidden_title" value="';
            
            echo  $page['title'] ;               
            echo '"> <input type="hidden" class="form-control" name="hidden" value="';

//Get it of the Add to Edit
            
            echo  $page['id'] ;               
            echo '">  <input name="edit" type="submit" class="btn btn-primary" value="Edit" /> 
                      <input name="delete" type="submit" class="btn btn-danger" value="Delete" /> 
                      </div></form>';
     }
*/     
     
    ?>
    
</div><!--Container Fluid End-->
</div>
    
</body>

    
<footer class="footer">
    <?php
           include 'footer.php';
    ?>
    
</footer>
        
</html>