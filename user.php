<?php
    session_start();
    include 'header.php';
?>
<html>    
<body>

<h1>
<?php
  if((isset($_SESSION['username'])) &&($_SESSION['role']!= 0)){
        header('Location: index.php');
    }
?>
Hola Renter
</h1>
    
</body>

<footer>
    
</footer>
        
</html>


