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
    
    if(isset($_POST['search'])){   
        if (isset($_POST['roommateCheck'])) {
            if (isset($_POST['tenantCheck'])) {
//                echo "Both are Checked!";
                $checked = "role";
            }
            else{
//                echo "Roommate Search Checked!";
                $checked = "0";
            }
        }
        else{
            if (isset($_POST['tenantCheck'])) {
//                echo "Tenant Search Checked!";
                $checked = "1";
            }
            else{
                echo " <script type=\"text/javascript\"> 
                        alert ('PLEASE select a search field');
                    </script>";
                $checked = "4";
            }
        }

        if($checked != 4){
            $_SESSION['checked'] = $checked;
            if($_POST['min_rent']==''){
                $_POST['min_rent'] = 0;
            }
            if($_POST['max_rent']==''){
                $_POST['max_rent'] = 99999999999;
            }

            if($_POST['max_rent'] > $_POST['max_rent']){
                echo " <script type=\"text/javascript\"> 
                        alert ('PLEASE select a search field');
                    </script>";
            }
            
            $_SESSION['min_rent'] = $_POST['min_rent'];
            $_SESSION['max_rent'] = $_POST['max_rent'];
            echo "<script type='text/javascript'>window.location.href = 'u_searchResult.php';</script>";
 //            header('Location: u_searchResult.php');
        }
    }
?>


<html>
<body>
<div class="container-fluid">
    <div class="container-fluid">
       <form method="post" enctype="multipart/form-data"> 
            <div class="form-group row">
                <label for="exampleInputName" class="col-sm-offset-5 col-sm-2 control-label"></label>
                    <div class="col-sm-offset-2 col-sm-8">
                        <input type="text" id="big_search" class="form-control " name="update_name" value="" placeholder="search">
                    </div>
            </div>
            <div class="form-group row">

                
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-offset-2 col-sm-4">
                            <label for="exampleInputName" class="col-sm-offset-2 col-sm-10 control-label">Min.</label>
                            <input type="text" class="form-control " name="min_rent" placeholder="min">
                        </div>
                        <div class="col-sm-4">
                            <label for="exampleInputName" class="col-sm-offset-2 col-sm-10 control-label">Max.</label>
                            <input type="text" class="form-control " name="max_rent" placeholder="max">
                        </div>


                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="checkbox" >
                    <label>
                        <input type="checkbox"  name="roommateCheck"> Need Roommate
                    </label>
                    </div>
                    <div class="checkbox">
                    <label>
                        <input type="checkbox"  name="tenantCheck"> Need Tenant
                    </label>
                    </div>
               </div>

                
                <div class="col-sm-5">
                    <label for="exampleInputName" class="col-sm-offset-4 col-sm-8 control-label">Some Filters</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control " name="update_name" value="">
                    </div>
                </div>
            </div>
                       <div class="col-sm-offset-1 col-sm-11">
            <a href="#">EXtra Filters  <strong>+</strong></a>
            </div> 
            <input type="hidden" class="form-control" name="hidden" value="">
            <div class="col-sm-12">
                <input name="search" type="submit" class="btn n-primary btn-lg btn-block" value="Search" /> 
           </div>
       </form>
 

    </div>
</div>
    
</body>

    
<footer class="footer">
     <?php
           include 'footer.php';
    ?>
    
</footer>
        
</html>