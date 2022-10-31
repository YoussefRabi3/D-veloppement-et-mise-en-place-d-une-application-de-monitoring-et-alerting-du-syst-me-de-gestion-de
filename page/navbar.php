 <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

            <div class="user-info">
                 <div class="image">
                    <img src="../images/hps.jfif" width="55" height="55" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span style="font-size: 15px">WELCOME</span> <span  style= "color: black;font-size: 16px; text-transform: uppercase;" ><b><?php echo $_SESSION['name']; ?></div><span style= "color: white;font-size: 16px; text-transform: uppercase;">
                        <?php  echo 'vous etes ' . $_SESSION[" libelle"];?></span>
                     
                   
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
             <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header"><span style= "color: blue;font-size: 20px" ><b><?php echo $_SESSION['email']; ?><b></span></li>
                        
                    <li class="active">
                        <a href="../page/index.php">
                            <i class="material-icons" style='font-size:24px ; color: red;'>home</i>
                            <span>Home</span>
                        </a>
                    </li>

                   <?php if ($_SESSION['id_role']=='3'  OR $_SESSION['id_role']=='1'){ ?>
                    <li class="active">
                        <a href="../page/ajouter_project.php">
                            <i class="material-icons" style='font-size:24px ; color: red;'>library_add</i>
                            <span>Ajouter Projet</span>
                        </a>
                    </li>
                <?php } ?>
                  <?php if ($_SESSION['id_role']=='3' OR $_SESSION['id_role']=='2' OR $_SESSION['id_role']=='1'){ ?>
                    <li class="active">
                        <a href="../page/add_file.php">
                            <i class="material-icons" style='font-size:24px ; color: DeepSkyBlue;'>library_add</i>
                            <span>Ajouter Fichier</span>
                        </a>
                    </li>
                <?php } ?>
                      <?php if ($_SESSION['id_role']=='1' OR $_SESSION['id_role']=='3'){ ?>
                                    <a href="../page/liste_user.php">
                                    <i class='fas fa-user-tie' style='font-size:24px ; color: red;'></i>
                                    <span>List_Users</span>     
                                    </a>
                                  <?php } ?>
                      
                     <li class="active">
                        <a href="../page/liste_projet.php">
                            <i class="material-icons" style='font-size:24px ; color: red;'>library_books</i>
                            <span>liste_projet</span>   
                        </a>
                    </li>
            
                    <li class="active">
                        <a href="../page/liste_fichier.php">
                            <i class="material-icons">library_books</i>
                            <span>liste_Fichier</span>   
                        </a>
                    </li>
                     
                    <?php if ($_SESSION['id_role']=='1'){ ?>
                   
                    <li class="active">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">beenhere</i>
                            <span>ADMIN</span>
                        </a>
                        <ul class="active" class="ml-menu">
                            <li class="active">
                                <a href="javascript:void(0);" class="menu-toggle">
                                     <i class="material-icons"> account_circle</i>
                                    <span>USERS</span>
                                </a>
                               
                                <ul  class="ml-menu">
                                    
                                   
                                    <a href="../page/register.php">
                                    <i class="material-icons" style='font-size:28px ; color: blue;'>group_add</i>
                                    <span>Add_Users</span>     
                                    </a>
                                           <?php if ($_SESSION['id_role']=='1' OR $_SESSION['id_role']=='3'){ ?>
                                    <a href="../page/liste_user.php">
                                    <i class='fas fa-user-tie' style='font-size:24px ; color: red;'></i>
                                    <span>List_Users</span>     
                                    </a>
                                  <?php } ?>
                                </ul>

                            </li>
                            <li class="active">
                                <a href="javascript:void(0);"  class="menu-toggle">
                                    <i class="material-icons">folder</i>
                                    <span>Projet</span>
                                </a>
                                   <ul  class="ml-menu">
                                    
                                    <a href="../page/liste_projet.php">
                                    <i class="material-icons">folder</i>
                                    <span>liste_projet</span>     
                                    </a>
                                   
                                     <a href="../page/liste_fichier.php">
                                    <i class="material-icons">folder_open</i>
                                    <span>list_fichier</span>     
                                    </a>
                                      
                                    <?php } ?>
                                  
                                </ul>
                                
                            </li>
                        </ul>
                    </li>
                
                   
                       
                   
                </ul>
            </div>
            <!-- #Menu -->
      
        </aside>