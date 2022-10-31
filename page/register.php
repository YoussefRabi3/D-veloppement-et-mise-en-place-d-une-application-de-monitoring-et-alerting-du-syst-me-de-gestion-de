<?php 
session_start();
include("connexion.php");
//activer la session dans la page
if(!isset($_SESSION["email"]))
    {
          header("Location:login.php");
    }

  if(isset($_POST["submit"]))
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
    <title>Sign Up | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body class="signup-page">

    <div class="signup-box">

        <div class="card">
            <div class="body">

                <form id="sign_up" method="POST">
                      <img src="../images/hp.jpg" alt=""  class="img-thumbnail">
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="name" placeholder="Name Surname"  required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="confirm" minlength="6" placeholder="Confirm Password" required>
                        </div>
                    </div>
                     <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">check_box</i>
                        </span>
                        <select   name="role"  required  id="pet-select" style="width:292px; height: 27px;">
                            <option value="">--Please choose an option-- </option>
                             <?php
                                    $req_projet = "SELECT * FROM `role`";
                                    $res_projet = mysqli_query($_connexion_newdev, $req_projet);
                                    while ($data_projet = mysqli_fetch_array($res_projet)) {
                                    ?>
                                        <option value="<?php echo html_entity_decode($data_projet['id_role']); ?>"> <?php echo html_entity_decode($data_projet['libelle']); ?> </option>
                                    <?php } ?>
                        </select>   
                    </div>
                        
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                        <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of usage</a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-blue waves-effect" name="submit" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">You already have a membership?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
     

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/examples/sign-up.js"></script>
</body>

</html>