<?php 
session_start();
include("connexion.php");

	//code pour l'ajoute
if(isset($_POST['add']))
 {
 
 	$Nom_Pro = strip_tags(htmlentities(addslashes($_POST['Nom_Pro'])));
      $date_creation = strip_tags(htmlentities(addslashes($_POST['date_creation'])));
    
      $req_insert = "INSERT INTO `projet`(`Nom_Pro`,`date_creation`) VALUES ('$Nom_Pro','$date_creation')";
      $query_run = mysqli_query($_connexion_newdev, $req_insert);
      if($query_run)
      {
      	
      	header('Location:liste_projet.php');	
      }
      else
      {
          $_SESSION['statut']="not seved";
          header('Location:liste_projet.php');
      }	
 
    //récuperation de dernière id de projet 
       
 }

// code pour affichage

  if(isset($_POST['checking_viewbtn']))
  {
  	$s_id = $_POST['project_id'];
  	//echo $return = $s_id;
  	  $query="SELECT * FROM projet WHERE id_Pro='$s_id'";
	  $query_run = mysqli_query($_connexion_newdev, $query);
	  if(mysqli_num_rows($query_run) > 0)																											
	  {
	  	//while ($row=mysqli_fetch_array($query_run))
	  	 foreach($query_run as $row) 
	  	 {
	  	 	 echo $return = '
	  	 	 	<h5 style="color :red; font-size: 30px; "> <span style="color:black">ID :</span> : '.$row['id_Pro'].'</h5>
	  	 	 	<h5 style="color :red; font-size: 30px; ">  <span style="color:black"> Nom Projet : </span>'.$row['Nom_Pro'].'</h5>
	  	 	 	<h5 style="color :red; font-size: 30px; ">  <span style="color:black">Date Création :</span>  : '.$row['date_creation'].'</h5>
	  	 	 ';
	     }
	  }
	   else
		{
		echo $return = "<h5> no record found</h5>";
		}
  }








  //code pour modification

   if(isset($_POST['checking_edit_btn']))
  {
  	$s_id = $_POST['project_id'];
  	//echo $return = $s_id;
  	$result_array = [];
  	  $query = "SELECT * FROM projet WHERE id_Pro='$s_id'";
  	
	  $query_run = mysqli_query($_connexion_newdev, $query);
	  if(mysqli_num_rows($query_run) > 0)																											
	  {
	  	//while ($row=mysqli_fetch_array($query_run))
	  	 foreach($query_run as $row) 
	  	 {
	  	 	 array_push($result_array, $row);
	  	 	 header('content-type: application/json');
	  	 	 echo json_encode($result_array);
	     }
	  }
	   else
		{
		echo $return = "<h5> no record found</h5>";
		}
  }


  if(isset($_POST['update_projet']))
  {
  	$id_Pro = $_POST['edit_id'];
  	$Nom_Pro = $_POST['Nom_Pro'];
  	$date_creation = $_POST['date_creation'];
  	$query = "UPDATE projet SET Nom_Pro='$Nom_Pro', date_creation='$date_creation' WHERE 	id_Pro='$id_Pro'";
    $query_run = mysqli_query($_connexion_newdev, $query);
    if($query_run)
    {
    	 //$_SESSION['statut'] ="succesfully update";
        header('Location:liste_projet.php');	
    }
    else
    {
    	//$_SESSION['statut'] ="erreur";
        header('Location:liste_projet.php');	
    }

  }
// code pour supprimer un projet 
  if(isset($_POST['delete_project']))
  {
  	$id_Pro = $_POST['project_id'];
  	$query = "DELETE FROM projet WHERE id_Pro = '$id_Pro'";
  	$query_run = mysqli_query($_connexion_newdev, $query);
  	 if($query_run)
    {
    	 //$_SESSION['statut'] ="succesfully update";
        header('Location:liste_projet.php');	
    }
    else
    {
    	//$_SESSION['statut'] ="erreur";
        header('Location:liste_projet.php');	
    }
  }


  //code pour supprimer un fichier 
  if(isset($_POST['delete_fichier']))
  {
  	$Id_fich = $_POST['fichier_id'];
  	$query = " DELETE FROM fichier WHERE Id_fichier = '$Id_fich'";
  	$query_run = mysqli_query($_connexion_newdev, $query);
  	 if($query_run)
    {
    	 //$_SESSION['statut'] ="succesfully update";
        header('Location:liste_fichier.php');	
    }
    else
    {
    	 echo " problème serveur ";
    	//$_SESSION['statut'] ="erreur";
        header('Location:liste_fichier.php');	
    }

  }



  //code pour modification des fichier

   if(isset($_POST['checking_edit_btn_Fich']))
  {
  	$s_id = $_POST['fichier_id'];
  	//echo $return = $s_id;
  	$result_array = [];
  	  $query = "SELECT * FROM fichier WHERE Id_fichier='$s_id'";
  	
	  $query_run = mysqli_query($_connexion_newdev, $query);
	  if(mysqli_num_rows($query_run) > 0)																											
	  {
	  	//while ($row=mysqli_fetch_array($query_run))
	  	 foreach($query_run as $row) 
	  	 {
	  	 	 array_push($result_array, $row);
	  	 	 header('content-type: application/json');
	  	 	 echo json_encode($result_array);
	     }
	  }
	   else
		{
		echo $return = "<h5> no record found</h5>";
		}
  }




  if(isset($_POST['update_fichier']))
  {
  	$id_Fich = $_POST['edit_id'];
  	$Nom_F = $_POST['Nom_F'];
  	$date_creation = $_POST['date_creation'];
  	$query = "UPDATE fichier SET Nom_F='$Nom_F',date_creation='$date_creation' WHERE Id_fichier ='$id_Fich'";
    $query_run = mysqli_query($_connexion_newdev, $query);
    if($query_run)
    {
    	 //$_SESSION['statut'] ="succesfully update";
        header('Location:liste_fichier.php');	
    }
    else
    {
    	//$_SESSION['statut'] ="erreur";
         header('Location:liste_fichier.php');	
    }

  }
 

 // code pour affichage

  if(isset($_POST['checking_viewbtn_file']))
  {
  	$s_id = $_POST['fichier_id'];
  	//echo $return = $s_id;
  	  $query="SELECT * FROM fichier WHERE Id_fichier='$s_id'";
	  $query_run = mysqli_query($_connexion_newdev, $query);
	  if(mysqli_num_rows($query_run) > 0)																											
	  {
	  	//while ($row=mysqli_fetch_array($query_run))
	  	 foreach($query_run as $row) 
	  	 {
	  	 	 echo $return = '
	  	 	 	<h5 style="color :red; font-size: 30px; "> <span style="color:black">ID :</span> : '.$row['Id_fichier'].'</h5>
	  	 	 	<h5 style="color :red; font-size: 30px; ">  <span style="color:black"> Nom Fichier : </span>'.$row['Nom_F'].'</h5>
	  	 	 	<h5 style="color :red; font-size: 30px; ">  <span style="color:black">Date Création :</span>  : '.$row['date_creation'].'</h5>
	  	 	 ';
	     }
	  }
	   else
		{
		echo $return = "<h5> no record found</h5>";
		}
  }




//code pour supprimer un un utilisateur 
  if(isset($_POST['delete_utilisateur']))
  {
  	$id = $_POST['id_authe'];
  	$query = " DELETE FROM authentification WHERE id = '$id'";
  	$query_run = mysqli_query($_connexion_newdev, $query);
  	 if($query_run)
    {
    	 //$_SESSION['statut'] ="succesfully update";
        header('Location:liste_user.php');	
    }
    else
    {
    	 
    	//$_SESSION['statut'] ="erreur";
        header('Location:liste_user.php');	
    }

  }






////////update user afficher informations

   if(isset($_POST['checking_edit_btn_user']))
  {
  	$id_user = $_POST['id'];
  	//echo $return = $s_id;
  	$result_array = [];
  	  $query = "SELECT * FROM authentification WHERE id='$id_user'";
  	
	  $query_run = mysqli_query($_connexion_newdev, $query);
	  if(mysqli_num_rows($query_run) > 0)																											
	  {
	  	//while ($row=mysqli_fetch_array($query_run))
	  	 foreach($query_run as $row) 
	  	 {
	  	 	 array_push($result_array, $row);
	  	 	 header('content-type: application/json');
	  	 	 echo json_encode($result_array);
	     }
	  }
	   else
		{
		echo $return = "<h5> no record found</h5>";
		}
  }



  if(isset($_POST['update_user']))
  {
  	$id = $_POST['id'];
  	$name = $_POST['name'];
  	$email = $_POST['email'];
  	$password = md5($_POST['password']);
  	$confirmpassword = md5($_POST['confirmpassword']);
  	$query = " UPDATE authentification SET name='$name',email='$email',password='$password',confirmpassword='$confirmpassword' WHERE id='$id' ";
    $query_run = mysqli_query($_connexion_newdev, $query);
    if($query_run)
    {
    	 //$_SESSION['statut'] ="succesfully update";
        header('Location:liste_user.php');	
    }
    else
    {
    	//$_SESSION['statut'] ="erreur";
         header('Location:liste_user.php');	
    }

  }

  
  if(isset($_POST['update_projet']))
  {
  	$id_Pro = $_POST['edit_id'];
  	$Nom_Pro = $_POST['Nom_Pro'];
  	$date_creation = $_POST['date_creation'];
  	$query = "UPDATE projet SET Nom_Pro='$Nom_Pro', date_creation='$date_creation' WHERE 	id_Pro='$id_Pro'";
    $query_run = mysqli_query($_connexion_newdev, $query);
    if($query_run)
    {
    	 //$_SESSION['statut'] ="succesfully update";
        header('Location:liste_projet.php');	
    }
    else
    {
    	//$_SESSION['statut'] ="erreur";
        header('Location:liste_projet.php');	
    }

  }


// code pour suppression de setails projet

    if(isset($_POST['button_delete_details']))
  {
    $id = $_POST['Id_fichier'];
    $query = " DELETE FROM fichier WHERE Id_fichier= '$id'";
    $query_run = mysqli_query($_connexion_newdev, $query);
     if($query_run)
    {
         //$_SESSION['statut'] ="succesfully update";
        header('Location:detail_projet.php');  
    }
    else
    {
         
        //$_SESSION['statut'] ="erreur";
        header('Location:liste_user.php');  
    }

  }
  
 ?>