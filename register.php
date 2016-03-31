<?php
    include 'header.php';
?>

<?php
    if(isset($_POST['name'])){ 
        if(isset($_POST['role'])){
            if($_POST['password'] == $_POST['confirm_password']){
            
                $sqlget = "SELECT * FROM users";
                $sqldata = mysqli_query($connection,$sqlget) 
                    or die ('error getting data');

                $add = 1;
                  while($page = mysqli_fetch_array($sqldata)){
                      if($page ['name'] == $_POST['name']){
                            $add = 0;
                      }
                }
           
                if($add == 0){
                    echo "<script> alert ('User already Exist')</script>";
                }
            
//User name is Unique
                else if($add == 1){
                
//Generate random Code
                    $code = rand (11111111,99999999);
//                    echo $code;
            
//Send Activation email
                    $to = $_POST['email'];
                    $subject = "Activate your account";
                    $headers= "From : FMR.info";
                    $body = "Hello,</br></br>You registered and need to activate your account,Click on link below or paste it into the URL bar of your browser\n\nhttp://tejasvarsekar.com/fmr/activate.php?code=$code</br></br>Thanks!";    
                
                    if(!mail($to,$subject,$body,$headers)){
                        echo "Some error!!!'\n'We Couldn't sign in at this time, Please try again later.";
                    }    
                    else{
//		      mail('tejasvarsekar@gmail.com','My subject3','Hello,</br></br>You registered and need to activate your account,Click on link below or paste it into the URL bar of your browser \n\n http://tejasvarsekar.com/fmr/activate.php?code='.$code.'</br></br>Thanks!');
		
  	      mail($to,$subject ,'Hello,</br></br>You registered and need to activate your account,Click on link below or paste it into the URL bar of your browser \n\n http://tejasvarsekar.com/fmr/activate.php?code='.$code.'</br></br>Thanks!');
//	   		        mail($to,$subject,$body,$headers);
                        $UpdateQuery = "INSERT INTO 
                                    users (name, email, password, role,code,active) 
                                    VALUES ('".$_POST['name']."', '".$_POST['email']."', 
                                            '".$_POST['password']."','".$_POST['role']."',
                                            '$code','0')";
                        $uq = mysqli_query($connection,$UpdateQuery);
                        echo "You have been registered successfully, Please check your email (".$_POST['email'].") to activate your account.";
                       // echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";

//		echo $to;
//		echo $subject;
//		echo $headers;
//	        echo     $body;
                    }
                }
        }
        else{
                echo "<script> alert ('Passwords dont Match')</script>";
        }
        
    }
        
    else{
                echo "<script> alert ('Please Select a Role')</script>";
    }
}
        
?>


<html>    
<body>
    
<div id="register" > 
    <div class="wrapper container">
        <form method="post"> 
            <div class="form-group required row">
                <label for="exampleInputName" class="col-sm-2 control-label">User Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control " name="name" placeholder="User Name" required>
                    </div>
            </div>
            <div class="form-group required row">
                <label for="exampleInputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" placeholder="Valid Email">
                    </div>
            </div>
            <div class="form-group required row">
                <label for="exampleInputName" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>  
            </div>
            <div class="form-group required row">
                <label for="exampleInputPassword1" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                    </div>
            </div>
            <div class="form-group required row">
                <label for="exampleInputName" class="col-sm-2 control-label">Select Role</label>
                     <div class="col-sm-6">
                        <div class="radio">
                          <label><input type="radio" name="role" value="0">Renter</label>
                        </div>
                        <div class="radio">
                          <label><input type="radio" name="role"  value="1">Owner</label>
                        </div>
                    </div>
            </div>

            <div class="col-sm-offset-2 col-sm-6">
                <input name="update" type="submit" class="btn btn-primary btn-lg btn-block" value="Login" /> 
            </div>
        </form>
        
    </div>
    
</div>     
</body>

<footer>
    
</footer>
        
</html>


