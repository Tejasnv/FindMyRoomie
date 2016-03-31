    <nav class="nav navbar-nav navbar-right" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="true">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div><!--navbar-header-->
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav ">
                <li><a href="o_adspace.php">Ad Space</a>  </li>
                <li><a href="o_yourad.php">Your Ads</a>  </li>
                <li><a href="o_profile.php">Manage Profile</a>  </li>
                <li>
                    <img claa="img-responsive" width= "70px" src="uploads/<?php echo $_SESSION['id']; ?>.jpg">    
                </li>
            </ul>
        </div><!--collapse navbar-collapse-->
    </nav>