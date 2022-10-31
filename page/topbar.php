   <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
               
                     <a class="navbar-brand" class="text-justify" href="index.php" > WELCOME <span  style= "color: red; text-transform: uppercase;" ><b><?php echo $_SESSION['name']; ?><b></span>
                </a>
             
               
            </div>

            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                 
                       
                    <!-- Call Search -->
                      <li><a href="#"><i class="glyphicon glyphicon-user" style="font-size: 20px;" ><span style= "color: red; font-size: 20px;text-transform: uppercase;"><b><?php echo '' .  $_SESSION[" libelle"];  ?></b></i> </span></a></li>
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>

                       <li>
                        <a href="logout.php"><i class="material-icons" style='font-size:25px ;'>input</i>SIGN OUT</a>   
                       </li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                 
                       s
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                     
                </ul>
            </div>
        </div>
    </nav>