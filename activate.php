<?php
    include 'header.php';
?>

<?php
    $code = $_GET['code'];

    if(!$code){
        echo "No code supplied";
    }
    else{
        $check= "SELECT * FROM users WHERE code = '".$code."' ";
        $sqlcheck = mysqli_query($connection,$check)
        or die ('error getting data');

        if($row = mysqli_fetch_array($sqlcheck)){
//            echo $row['active'];
            if($row['active']== "1"){
                echo "You have already activated your account";
            }
            else if($row['active']== 0){
                 $UpdateUser = "UPDATE users SET active = '1' WHERE code = '".$code."'";
                 $uq = mysqli_query($connection,$UpdateUser);
                echo "Your account has been activated!";
            }
         }
    }
?>


