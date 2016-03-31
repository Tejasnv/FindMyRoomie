<html>
<header>
        <meta charset="utf-8">
     
<!-- jQuerry For Range Selector   ---->

<!---->    
    
       <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto+Mono' rel='stylesheet' type='text/css'>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

        <title>
            FMR
        </title>
        <div id ="top">
                <a href="index.php" >
                <div id="head" class="row">
                    <div class="col-sm-2 text-left">
                    <?php
                        if(isset($_SESSION['username'])){
                            echo "<h3> Hello <b>" . $_SESSION['username'] . "</h3>";
                        }
                    ?>
                    </div>
                    <div class="col-sm-8">
                        <h2>
                            <b>Header / LOGO / Whatever</b>
                        </h2>
                    </div>
                    <div class="col-sm-2 text-right">
                    <?php
                        if(isset($_SESSION['username'])){
                            echo "<h3><a href='logout.php' id='logout'>Logout</a></h3>";
                        }
                    ?>

                    </div>
                </div>
            </a>
        </div>
    <div class="container-fluid">
    <?php 
    if((isset($_SESSION['username'])) &&($_SESSION['role']== 1)){
        include 'o_menu.php';
    }
    else if((isset($_SESSION['username'])) &&($_SESSION['role']== 0)){
        include 'u_menu.php';
    }

    ?>    

    </div>
</header>
<?php
    include("connection.php");
?>