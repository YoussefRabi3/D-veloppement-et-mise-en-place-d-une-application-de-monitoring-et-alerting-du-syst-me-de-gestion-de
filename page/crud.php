<?php 
session_start();
include("connexion.php");
 if(isset($_POST['add']))
 {
 	$Nom_Pro = strip_tags(htmlentities(addslashes($_POST['Nom_Pro'])));
      $date_creation = strip_tags(htmlentities(addslashes($_POST['date_creation'])));
    
      $req_insert = "INSERT INTO `projet`(`Nom_Pro`,`date_creation`) VALUES ('$Nom_Pro','$date_creation')";
      $query_run = mysqli_query($_connexion_newdev, $req_insert);
      if($query_run)
      {
      	$_SESSION['statut']="<script>alert('Projet ajouter avec succès')</script>";
      	header('Location:crud.php');
      }
      else
      {
          $_SESSION['statut']="not seved";
          header('Location:crud.php');
      }	
 
    //récuperation de dernière id de projet 
       
 }

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  	<!-- Modal ADD-->
<div id="addprojet" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content" >
					    <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					                      <h4 class="modal-title">Ajouter projet</h4>
							</div>
					     			 <div class="modal-body">
							         <form action="" method="POST">
							                <div class="modal-header">                      
							                    <h4 class="modal-title">Edit Employee</h4>
							                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							                </div>
							                <div class="modal-body">                                        
							                    <div class="form-group">
							                        <label>Name</label>
							                        <input type="text" name="Nom_Pro"  class="form-control" required>
							                    </div>
							                    <div class="form-group">
							                        <label>date création</label>
							                        <input type="date" name="date_creation" class="form-control" required>
							                    </div>          
							                </div>  
							                </div>
							                <div class="modal-footer">
							                    <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
							                    <input type="submit" class="btn btn-primary" name="add" value="ADD">
							                </div>
							            </form>
	</div>

 </div>
</div>
  <!-- Modal UPDATE-->
<div id="editprojet" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content" >
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ajouter projet</h4>
        </div>
        <div class="modal-body">
        <form action="code.php" method="POST">
          <div class="modal-header">                      
              <h4 class="modal-title">Edit Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          </div>
          <div class="modal-body">                                        
              <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="edit_Nom_Pro"  class="form-control" required>
              </div>
              <div class="form-group">
                  <label>date création</label>
                  <input type="date" name="edit_date_creation" class="form-control" required>
              </div>          
          </div>  
          </div>
          <div class="modal-footer">
              <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-primary" name="update_projet" value="UPDATE">
          </div>
      </form>
  </div>
 </div>
</div>
<!-- project view model -->
<div class="modal fade" id="projetVIEWModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Projet view data </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="student_viewing_data">
        	
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- font  -->
    <div clas="container mt-5">
    	<div class="row">
    		<div class="col-md-12">
    			<div class="card">
    				<?php 
                 if(isset($_SESSION['statut']) && $_SESSION['statut'] !='')
                 { 
                 ?>
                 <h5><?php echo $_SESSION['statut']; ?></h5>
                 <?php
                 unset($_SESSION['status']);

                 }
 
    				 ?>
    				<div class="card-header">
    					<h5>crud projet	
    					<button type="button" class="btn btn-info btn-lg float-right" data-toggle="modal" data-target="#addprojet">Open Modal</button>

    					</h5>
    				</div>
    				<div class="card-body">
											<table class="table">
											  <thead>
											    <tr>
											      <th scope="col">id</th>
											      <th scope="col">name</th>
											      <th scope="col">date_creation</th>
											      <th scope="col">action</th>
											    </tr>
											  </thead>
											  <tbody>
											  	<?php 
											  				$query="SELECT * FROM projet";
											  	      $query_run = mysqli_query($_connexion_newdev, $query);
											  	      if(mysqli_num_rows($query_run) > 0)
											  	      {
											  	      	//while ($row=mysqli_fetch_array($query_run))
											  	      		foreach ($query_run as $row) 
											  	      	 {
											  	      		    ?>
                                        <tr>
                                           <td class="proj_id"><?php echo $row["id_Pro"]; ?></td>
                                           <td><?php echo $row["Nom_Pro"]; ?></td>
                                           <td><?php echo $row["date_creation"]; ?></td>
                                            <td> <a  class="btn btn-success" href="detail_projet.php?id=<?php echo $row["id_Pro"]; ?>">detail</a>
                                                <a  href="#editEmployeeModal" onclick="" class="edit" data-toggle="modal"><i class="material-icons" style="color:Gold" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                                
                                                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i style="color:red" class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>

                                                <a href="#deleteEmployeeModal"class="fa fa-eye" data-toggle="modal"><i style="color:red" class="material-icons" data-toggle="tooltip" title="Delete">&#xf06e;</i></a>
                                                <a href="#" class="badge badge-primary view_btn">view</a>

                                             </td>





                                         </tr>

                                         <?php
											  	      	}

											  	      }
											  	      else
											  	      {
											  	      	echo"<h5> no record found</h5>";
											  	      }
											  	 ?>
											  
											  </tbody>
											</table>
    				</div>
    			</div>
    		</div>
    	</div>
    	
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
    	$(document).ready(function()
    	{
    		$('.view_btn').click(function (e)
    		{
    			 e.preventDefault();
    			 //alert("hello");
    			var proj_id = $(this).closest('tr').find('.proj_id').text();
    			$.ajax({
    				type:"POST",
    				url:"code.php",
    				data:{
    					'checking_viewbtn':true,
    					'project_id':proj_id,
    				},
    				//datatype: "datatype",
    				success: function(response)
    				{
                  console.log(response);	
                  $('.student_viewing_data').html(response);
                  $('#projetVIEWModal').modal('show');
    				}
    			});
    			//console.log(proj_id);
    		})	;
    	});
    </script>
  </body>
</html>