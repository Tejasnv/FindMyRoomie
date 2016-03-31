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
<div class="container-fluid">
    <div class="container-fluid">
        <?php 
            $sqlget = "SELECT * FROM advertisement WHERE role = '1' ORDER BY ID DESC";
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
         }
        ?>
    </div>
</div>
</body>
<footer class="footer">
     <?php
           include 'footer.php';
    ?>
</footer>
</html>