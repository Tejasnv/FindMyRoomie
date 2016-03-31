<?php
    session_start();
    include 'header.php';
?>
<?php
    if(isset($_SESSION['username'])){ 
        if(($_SESSION['role'])==0){
        	echo "<script type='text/javascript'>window.location.href = 'http://tejasvarsekar.com/fmr/u_home.php';</script>";
//            header('Location: u_home.php');
            echo " a";
            exit;
//      header('Location: user_home.php');

        }
        else if(($_SESSION['role'])==1){
        	echo "<script type='text/javascript'>window.location.href = 'http://tejasvarsekar.com/fmr/o_adspace.php';</script>";
        
//            header('Location:http://tejasvarsekar.com/fmr/o_adspace.php');
            exit;
        }
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
                    $db_role = $row['role'];
                    $db_id = $row['id'];
                    $db_active = $row['active'];
                    if($password == $db_password && $username == $db_name ){
                        if($db_active == 1){
                                $_SESSION['username'] = $username;
                                $_SESSION['role'] = $db_role;
                                $_SESSION['id'] = $db_id;
                                if($db_role == 0){
                                	echo "<script type='text/javascript'>window.location.href = 'http://tejasvarsekar.com/fmr/u_home.php';</script>";
// header('Location: u_home.php');
        //                              header('Location: user_home.php');
                                }
                                else if($db_role == 1){
                                	echo "<script type='text/javascript'>window.location.href = 'http://tejasvarsekar.com/fmr/o_adspace.php';</script>";
//                                    header('Location:  o_adspace.php');
                                }
                                 exit();
                            }
                            else{
                                echo "<script>alert ('Sorry Your Account is not activated!')</script>";
                            }
                        }
                    }
                }                    
?>
<!--
<head>
    <script src="/js/application.js" type="text/javascript"></script>
</head>
-->
<body id="home">
    <div id="googlemaps">
    </div>
<div  class="container-fluid">
                    <div id="log" class="row">
                        <div class="col-xs-12 col-md-4 col-sm-10 col-md-offset-4 col-sm-offset-1 form-top ">
                             <div class="col-sm-12 col-md-5" style="width:100% margin-left:auto">
                        	<div class="form-top-left">
                                    <img src="images/FMR-logo.png" class="img-responsive" alt="Responsive image" width="100%" style=" margin-left: auto;
    margin-right: -15%;">
                        <!--			<h3>LOGO <br/> GOES <br/> HERE</h3>
                        -->	</div>
                            </div>
                            <div class=" col-sm-12 col-md-7 text-center">
                                <div class="row">
                            		<form method="post">
                                    <div class="form-group ">
                                            <label for="exampleInputName" class="col-sm-12">User Name</label>
                                            <input type="text" class="form-control" name="name" placeholder="User Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input name="login" type="submit" class="btn btn-primary btn-lg btn-block" value="Login" /> 
                                    </div>
                                 </form>
                                </div>
			                    <p>
                                    click <a href="register.php">here </a>to Register.
                                </p> 
                            </div>
                        </div>
                    </div>
    </div>             
        <script>
        var position = [37.388784, -121.930899];
        function initialize() {

            var myOptions = {
                zoom: 14  ,
                streetViewControl: true,
                scaleControl: true,
                mapTypeId: google.maps.MapTypeId.TERRAIN 
            };

/*        function initMap() {
             
                var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                center: {lat: 42.3726399, lng: -71.1096528}
              });

              var bikeLayer = new google.maps.BicyclingLayer();
              bikeLayer.setMap(map);
            }    
*/   
            var map = new google.maps.Map(document.getElementById('googlemaps'),
                myOptions);

            latLng = new google.maps.LatLng(position[0], position[1]);

            map.setCenter(latLng);

            marker = new google.maps.Marker({
                position: latLng,
                map: map,
                draggable: false,
                animation: google.maps.Animation.DROP
            });
            
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</body>
</html>

