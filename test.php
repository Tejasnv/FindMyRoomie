<?php
    session_start();
    include 'header.php';
?>

<?php
    if(isset($_SESSION['username'])){
        header('Location: user.php');
    }
?>
<?php

    if (!$connection) {
            die("Database connection failed: " . mysql_error());
        }
            if(isset($_POST['login'])){
            
            $username = strip_tags($_POST['name']);
            $password = strip_tags($_POST['password']);
            
            $username = stripslashes($_POST['name']);
            $password = stripslashes($_POST['password']);
      
            $username = mysqli_real_escape_string($connection,$_POST['name']);
            $password = mysqli_real_escape_string($connection,$_POST['password']);
//            $password =md5($password);

                $sqlget = "SELECT * FROM users ";
                $sqldata = mysqli_query($connection,$sqlget) 
                    or die ('error getting data');
                while($row = mysqli_fetch_array($sqldata)){
//                    $id = $row["id"];
                    $db_password = $row['password'];
                    $db_name = $row['name'];
                    if($password == $db_password && $username == $db_name ){
                        $_SESSION['username'] = $username;
                        $_SESSION['id'] = $id;
                        header("Location: user.php");   
                        exit();
                        }
                    }
                } 
?>


<html>    
<body>
    
<div id="log" > 
    <div class="col-md-offset-4 col-md-1">
        <h1>Logo goes here</h1>
    </div>
    <div class="col-md-3">
        <form method="post"> 
            <div class="form-group">
                <label for="exampleInputName">User Name</label>
                <input type="text" class="form-control" name="name" placeholder="User Name">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
              </div>
                        <input name="login" type="submit" class="btn btn-primary btn-lg btn-block" value="Login" /> 
         </form>
        click <a href="register.php">here </a>to Register.
    </div>
</div>     
</body>

<footer>
    
</footer>
        
</html>