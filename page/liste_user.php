<?php 
session_start();
 include("connexion.php");
//activer la session dans la page
if(!isset($_SESSION["email"]))
    {
          header("Location:login.php");
    }

  if(isset($_POST["add"]))
  {
    $name=$_POST["name"];
    $email=$_POST["email"];
    $password=md5($_POST["password"]);
    $confirmpassword=md5($_POST["confirm"]);
    $role=$_POST["role"];
    $sql=mysqli_query($_connexion_newdev,"SELECT * FROM authentification WHERE email='$email' OR name='$name'");
    if(mysqli_num_rows($sql)>0)
    {
      echo "<script>alert('password incorrect')</script>";
    }
    else
    {
        if($password == $confirmpassword)
        {
            $query="INSERT INTO authentification VALUES('','$name','$email','$password','$confirmpassword','$role')";
            mysqli_query($_connexion_newdev,$query);
            echo "<script>alert('registration succefull')</script>";
        }
        else
        {
             echo "<script>alert('Password does not match')</script>";
        }
        
    }
    header("location:liste_user.php");
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

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

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
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
     <?php include("topbar.php") ?>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
      <?php include("navbar.php"); ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <aside id="rightsidebar" class="right-sidebar">
            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
            </ul>
           
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                        <p>GENERAL SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Report Panel Usage</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Email Redirect</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>SYSTEM SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Notifications</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Auto Updates</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                        <p>ACCOUNT SETTINGS</p>
                        <ul class="setting-list">
                            <li>
                                <span>Offline</span>
                                <div class="switch">
                                    <label><input type="checkbox"><span class="lever"></span></label>
                                </div>
                            </li>
                            <li>
                                <span>Location Permission</span>
                                <div class="switch">
                                    <label><input type="checkbox" checked><span class="lever"></span></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>
 <!--code pour editer le fichier -->
    <div  id="edituser" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="border: 7px solid DeepSkyBlue;">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title" ><h1 style="color:DeepSkyBlue;text-align: center; "><u>MODIFIER UTILISATEUR</u></h1></h4>
        </div>
        <div class="modal-body">
        <form action="code.php" method="POST">
          <div class="modal-body">     
           <input type="hidden" name="id" id="id">                                   
              <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="name" id="edit_Name_user" class="form-control" required style="border: 2px solid DeepSkyBlue;">
              </div>
              <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" id="edit_mail_user" class="form-control" required style="border: 2px solid DeepSkyBlue;">
              </div>    
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" id="edit_password_user" class="form-control" required style="border: 2px solid DeepSkyBlue;">
              </div> 
                <div class="form-group">
                  <label>Confirm Password   </label>
                  <input type="password" name="confirmpassword" id="edit_confirmPass_user" class="form-control" required style="border: 2px solid DeepSkyBlue;">
              </div>                                                                                                                                 
          </div>  
          </div>
          <div class="modal-footer">
              <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel"style="padding: 16px 32px;">
              <input type="submit" class="btn btn-primary" name="update_user" value="UPDATE"style="padding: 16px 32px;">
          </div>
      </form>
  </div>
 </div>
</div>

  <!-- #modal delete project -->
<div id="deleteprojetModal_auth" class="modal fade">
    <div class="modal-dialog" style="border: 7px solid red;">
        <div class="modal-content">
            <form action="code.php" method="POST">
                <div class="modal-header">                      
                <h4 class="modal-title" ><h2 style="color:red;text-align: center; "><u>DELETE PROJET</u></h2></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">    
                <input type="hidden" name="id_authe" id="delete_id">                
                    <p style="color: black; text-align: center; font-size: 25px;">Êtes-vous sûr de vouloir supprimer ces enregistrements ?</p>
                    <p class="text-warning"  style="color: red; text-align: center;  font-size: 20px;"><small><u> ATTENTION ! Cette action ne peut pas être annulée !!</u></small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" style="padding: 16px 32px;">
                    <input type="submit" name="delete_utilisateur" class="btn btn-danger" value="Delete" style="padding: 16px 32px;">
                </div>
            </form>
        </div>
    </div>
</div>

<div id="add_user_proj" class="modal fade"  >
    <div class="modal-dialog"  style="border: 7px solid DarkOrange;text-align: center;">
        <div class="modal-content" >
        
            <form id="" method="POST">
                <div class="modal-header" >                      
                <h4 class="modal-title"><h2 style="color:DarkOrange;text-align: center; "><u>ADD USERS</u></h2></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                    <div class="signup-page" >
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Full Name"   required autofocus>
                        </div>
                    </div>
                    <div class="signup-page" >
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div  class="signup-page" class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="signup-page" class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                     
                     <div>
                            <select  name="role" required  id="pet-select">
                            <option value="" >--Please choose an option-- </option>
                             <?php
                                    $req_projet = "SELECT * FROM `role`";
                                    $res_projet = mysqli_query($_connexion_newdev, $req_projet);
                                    while ($data_projet = mysqli_fetch_array($res_projet)) {
                                    ?>
                                        <option value="<?php echo html_entity_decode($data_projet['id_role']); ?>"> <?php echo html_entity_decode($data_projet['libelle']); ?> </option>
                                    <?php } ?>
                              </select> 
                        </div>
                        
                     <br>

                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button  class=" btn-lg bg-DarkOrange waves-effect" style="text-align: center; width: 360px; background-color: DarkOrange; " name="add" type="submit">SIGN UP</button><br><br>

            </form>
        
   
        
    </div>
</div>
</div>
    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        
            <!-- #END# Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                     <div class="header">
                            <h2 style="color: Crimson;">
                                <b><u>LISTE DES PROJETS :</ u></b>
                            </h2>
                        
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">

                                     <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                       
                                    <!--<a href="ajouter_project.php" class="btn btn-success pull-left">AJOUTER PROJET</a>-->
                                   <!--  <button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#addprojet" id="btnn">AJOUTER PROJET</button>-->
                                           <?php if ($_SESSION['id_role']=='1' ){ ?>  
                                           <a href="" class="btn btn-warning add_user" data-toggle="modal"><i style="font-size:23px;color:white;" class="material-icons" data-toggle="tooltip" title="Delete">&#xe7fe;</i></a>
                                    </a>    <?php } ?>

                                </li>
                            </ul>
                        </div>

                    <?php
                    include("connexion.php");
                                                     
                        $sql =" SELECT * FROM authentification a INNER JOIN role r ON a.id_role = r.id_role ORDER BY id DESC";                                                   
                       /* $sql = "SELECT Id_fichier,Nom_F,date_creation ,Id_planning,Nom_Jour FROM fichier INNER JOIN planning1 ON fichier.Id_fichier = planning1.Id_planning";*/
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
                                            <th> id</th>
                                            <th>name</th>
                                            <th>email</th>
                                            
                                              <th>password</th>
                                             <th>confirmpassword </th>
                                             <th>role</th>
                                             <?php if ($_SESSION['id_role']=='1' ){ ?>  
                                             <th>Update</th>

                                             <th>Delete</th>
                                              <?php } ?>
                                           
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php
                                        while($row = mysqli_fetch_array($result))
                                        {
                                        ?>
                                        <tr>
                                           <td class="id_auth"><?php echo $row["id"]; ?></td>
                                               <td><?php echo $row["name"]; ?></td>
                                               <td><?php echo $row["email"]; ?></td>
                                               <td><?php echo $row["password"]; ?></td>
                                               <td><?php echo $row["confirmpassword"]; ?></td>
                                                <td><?php echo $row["libelle"]; ?></td>
                                               
                                               
                                                
                                                
                                             
                                               <!-- <a  class="btn btn-success" href="liste_fichier.php?id=<?php// echo $row["Id_fichier"]; ?>">
                                             detail</a>
                                          <a   class="btn btn-info" href="update_file.php?id=<?php// echo $row["Id_fichier"]; ?>">
                                             update</a>-->
                                         
                                         
                                            <?php if ($_SESSION['id_role']=='1' ){ ?>  
                                              <td>
                                              <a href="" class="btn btn-primary edit_btn_user" data-toggle="modal"><i <i style="font-size:23px;color:white;" class="material-icons" style="color:Gold" data-toggle="tooltip" title="Edit">&#xE254;</i></a> 
                                              </td>
                                          
                                                 <td>
                                                    <a href="" class="btn btn-danger delete_btnn" data-toggle="modal"><i style="font-size:23px;color:white;" class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                                </td>
                                                        <?php } ?>                            
                                                
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>   
                                 <thead>
                                        <tr>
                                            <th> id</th>
                                            <th>name</th>
                                            <th>email</th>
                                              <th>password</th>
                                             <th>confirmpassword </th>
                                               <th>role</th>
                                             <?php if ($_SESSION['id_role']=='1' ){ ?>  
                                             <th>Update</th>

                                             <th>Delete</th>
                                              <?php } ?>
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
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

     <script>
        // code pour affchier les données dans des zone de text pour modifier
        $(document).ready(function()
        {
            $('.delete_btnn').click(function (e) 
            {
              e.preventDefault();

              var id_auth = $(this).closest('tr').find('.id_auth').text();          
               $('#delete_id').val(id_auth);
               $('#deleteprojetModal_auth').modal('show');
            });

            $('.add_user').click(function (e) 
            {
              e.preventDefault();

              var id_auth = $(this).closest('tr').find('.id_auth').text();          
               $('#delete_id').val(id_auth);
               $('#add_user_proj').modal('show');
            });


            $('.edit_btn_user').click(function (e)
            {
                 e.preventDefault();    
                 //alert("hello");
               var id_auth = $(this).closest('tr').find('.id_auth').text();   
                $.ajax({
                    type: "POST",
                    url: "code.php",
                    data:{
                        'checking_edit_btn_user': true,
                        'id': id_auth,
                    },
                    //datatype: "datatype",
                    success: function (response){
                        $.each(response, function (key, value)
                        {
                           $('#id').val(value['id']);
                           $('#edit_Name_user').val(value['name']);
                           $('#edit_mail_user').val(value['email']);
                           $('#edit_password_user').val(value['password']);
                           $('#edit_confirmPass_user').val(value['confirmpassword']);
                           
                        });                                     
                  //   console.log(response);    
                  //afichage de pop
                     $('#edituser').modal('show');
                    }
                });
               
            });  
 

           

            
         
        });
         //code pour modifier des informations
            
    </script>


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


    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <script src="../js/pages/examples/sign-up.js"></script>

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
