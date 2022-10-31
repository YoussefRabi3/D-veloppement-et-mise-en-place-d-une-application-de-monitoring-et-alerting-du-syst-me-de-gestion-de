
 <?php 
session_start();
 include("connexion.php");
 if(!isset($_SESSION['email']))
 {
    header("Location:login.php");
 }
  ?>

 <!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jquery DataTable | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->   
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-black">
    <!-- Page Loader -->
   
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
        <!-- #END# Search Bar -->
    <!-- Top Bar -->
     <?php include("topbar.php") ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
      <?php include("navbar.php"); ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
    <?php if(isset($_GET['id_f'])) {  ?>
               <!--afficher card de checkbox -->
           <div class="col-md-2">   </div>
                 <div class="col-lg-8 col-md-8  col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="body bg-white">
                         <!--permet de récuperer l'id-->   
                     <?php  
                              $id_f= $_GET['id_f'];                                                                  
                        $sqll = "SELECT * FROM fichier where Id_fichier=$id_f"; 
                        $ress = mysqli_query($_connexion_newdev, $sqll);
                        $roww = mysqli_fetch_assoc($ress);
                       $planning= explode(";",$roww['planning']); ?>
                     <h4 style="color: red" > Le jour d'envoie du fichier <?php echo html_entity_decode($roww['Nom_F']); ?> est  chaque :</h4>
                      <?php
                        $req_planning = "SELECT * FROM `planning1`";
                        $res_planning = mysqli_query($_connexion_newdev, $req_planning);
                        while ($data_planning = mysqli_fetch_array($res_planning))
                         {
                             if(in_array($data_planning['Id_planning'] , $planning)){
                     ?>
                         <input disabled type="checkbox" checked   class="filled-in chk-col-red" id="<?php echo html_entity_decode($data_planning['Id_planning']); ?>"/>


                          <label for="<?php echo html_entity_decode($data_planning['Id_planning']); ?>"><?php echo html_entity_decode($data_planning['Nom_Jour']); ?></label>
                      <?php }  ?>
            
                 
                       
                     
                   
                   

              <?php   }?> 
   </div>
   </div>
    </div>
               <?php }  ?> 
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <?php        
                              $id= $_GET['id'];                                                                
                        $sql = "SELECT * FROM fichier WHERE Id_fichier=$id"; 
                        $res = mysqli_query($_connexion_newdev, $sql);
                        $row = mysqli_fetch_assoc($res);
                        ?>
                            <h2 >
                             <span style="color: green;"><b><u>Nom de projet :</u></b></span> <span style="color: red;"> <?php echo $row['Nom_F'];?> </span>
                            </h2>
                     <h2 >
                            <span style="color: green;"><b><u>Date de projet :</u></b></span>  <span style="color: red;"> <?php echo $row['date_creation'];?> </span>
                            </h2>

                            <ul class="header-dropdown m-r--5">

                                <li class="dropdown">
                                    
                                    <a href="ajouter_fichier.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success pull-left">Ajouter Fichier</a>
                                    
                                    
                                </li>
                            </ul>
                        </div>

                    <?php
                   
                                $id= $_GET['id'];                                                                
                        $sql = "SELECT * FROM fichier where id_Pro=$id";    

                    ?>
                    <?php
                    if($result = mysqli_query($_connexion_newdev, $sql))
                    {
                        if(mysqli_num_rows($result) > 0)
                        {
                    ?>
                           <div class="body">
                            <div class="table-responsive">
                               <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>nom ficheir</th>
                                            <th>Date Création</th>
                                             <th>Show</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                         
                                               <td><?php echo $row["Nom_F"]; ?></td>
                                               <td><?php echo $row["date_creation"]; ?></td>
                                      <td> <a  class="btn btn-info" href="detail_fichier.php?id=<?php echo$_GET['id']?>&id_f=<?php echo $row["Id_fichier"]; ?>">detail</a></td>
                                                                                    
                                                
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>   
                                 <thead>
                                        <tr>
                                          
                                            <th>Nom_Projet</th>
                                            <th>Date_Création</th>
                                            <th>Show</th>
                                           
                                        </tr>
                                   </thead>                       
                             </table>
                        <?php
                            // Free result set
                            mysqli_free_result($result);
                        }
                        else
                        {
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    }
                    else
                    {
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($_connexion_newdev);
                    }
 
                    // Close conection_db
                    mysqli_close($_connexion_newdev);
                    ?>
                
                                   
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
</body>

</html>
