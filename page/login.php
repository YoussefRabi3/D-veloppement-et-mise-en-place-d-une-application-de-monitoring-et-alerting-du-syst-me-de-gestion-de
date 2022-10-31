<?php 

session_start();
if(isset($_SESSION["email"]))
    {
          header("Location:index.php");
    }
    

  include("connexion.php");
  if(isset($_POST['submit']))
  {
    $id_role=$_POST['id_role'];
    $libelle=$_POST['libelle'];
    $email= $_POST['email'];                                                                                                    
    $password= md5($_POST['password']);
    $sql=mysqli_query($_connexion_newdev,"SELECT * FROM authentification a INNER JOIN role r ON a.id_role = r.id_role WHERE email = '$email' AND password='$password'");
    $num  = mysqli_num_rows($sql);
    
    if($num>0)
    {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
        $_SESSION["email"] = $row['email'];
        $_SESSION["password"] = $row['password'];
        $_SESSION["id_role"] = $row['id_role'];
        $_SESSION[" libelle"] = $row['libelle'];
        header("Location:index.php");
    }
    else
    {
        echo '<script type = "text/javascript">';
        echo 'alert("invalid username or password !");';
        echo 'window.location.href = "login.php"';
        echo  '</script>';

          
    }
}
    
   

   
 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"></a> 

        </div>
        <div class="card">
            <div class="body">
                <form   method="POST" action="login.php">
                    <img src="../images/hp.jpg" alt=""  class="img-thumbnail">
                    <div class="msg">Sign in to start your session</div>
                    <div class="form-line">
                            <input type="hidden"  class="form-control" name="id_role" autofocus>
                             <input type="hidden"  class="form-control" name="libelle" autofocus>   
                        </div>

                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-xs-12">
                            <button class="btn btn-block bg-pink waves-effect" name="submit" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="register.php">Register Now!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.php">Forgot Password?</a>
                        </div>
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
    <script src="../js/pages/examples/sign-in.js"></script>
</body>

</html>