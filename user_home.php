<?php
    session_start();
    if((isset($_SESSION['username'])) &&($_SESSION['role']!= 0)){
          header('Location: index.php');
    }
    else{
//        include 'header.php';
    }
?>
    
<html>
<body>
<h1 class="text-center"> HOLA 
<?php
    echo $_SESSION['username'];
    ?>
    </h1>

    <?php 
        echo "<h3><a href='logout.php' id='logout'>Logout</a></h3>";
        ?>                
</body>

    
<footer class="footer">
</footer>
        
</html>