<?php //connexion à la base de données istc_bd

require 'config/config.php';
$extrait = $db->query("SELECT * FROM naissances");
$pere = $db->prepare("SELECT * FROM peres WHERE ID_PERE = ?");
$mere = $db->prepare("SELECT * FROM meres WHERE ID_MERE = ?");



if (isset($_GET['supprime'])) {
	$numero=$_GET['supprime'];

	if (!empty($id) AND is_numeric($id)) {
		$db->query("DELETE FROM naissances WHERE numero=$numero");

	}
}

if(isset($_POST['search'])){
	 $search = $_POST['search'];
	 $extrait = $db->query("SELECT * FROM naissances WHERE NOM_ENFANT LIKE '".$search."%' ");
	
}

if(isset($_POST['submit_sup'])){
	 if(isset($_POST['user'])){
		 foreach ($_POST['user'] as $user ) {
		 $db->query("DELETE FROM employe WHERE id_user=$user");
	 }
}
}
?>



<!doctype html>
<html lang="en">


	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
<body>
	
	 <div class="container-fluid">

	 	<div class="bg-dark py-2 pl-2">
	 				<a href="index.php"  class="btn btn-success "><i class="fas fa-plus-circle"></i> Ajouter</a>
	 		<form class="form-inline float-right" action="" method="post">
	 			<input type="text" name="search" class="form-control mr-sm-2" placeholder="rechercher">
	 			<button class="btn btn-success mr-1" type="submit"><i class="fas fa-search"></i></button>
	 		</form>
	 		<div class="clearfix"></div>
	 		
	 	</div>

	 	<!-- notification message -->
	
	 	</div>

	 	<table class="table table-sm mt-3 table-bordered table-striped" id="export">
			<thead class="table-dark">
				<tr>
                    <td><-T-></td>
					<td >Nom Enfant</td>
					<td >Nom Pere</td>
					<td >CNI Pere</td>
					<td >Nom Mere</td>
					<td >CNI Mere</td>
				
					

					<td width="25%">Action</td>
				</tr>
			</thead>
			<tbody class="">

				<?php while($naissance = $extrait->fetch()):?>
                    <?php
                   $pere = $db->prepare("SELECT * FROM peres WHERE ID_PERE = ?");
                   $mere = $db->prepare("SELECT * FROM meres WHERE ID_MERE = ?");
                   $mere->execute(array($naissance['ID_MERE']));
                   $mere = $mere->fetch();

                   $pere->execute(array($naissance['ID_PERE']));
                   $pere = $pere->fetch();
                   
                   ?>
					<tr>
                   <td><input type="checkbox"></td>
                
						<td><?php echo $naissance['NOM_ENFANT'] . ' '.$naissance['PRENOM_ENFANT'] ;?></td>
                        
                        <td><?php echo $pere['NOM_PERE'];?></td>
						<td class="text-center"><a target='_blank' href="fichiers/<?php echo $pere['PIECE_JUSTIFICATIF_PERE'];?>"><img src="fichiers/<?php echo $pere['PIECE_JUSTIFICATIF_PERE'];?>" alt=""  width="60"></a></td>
                        <td><?php echo $mere['NOM_MERE'];?></td>
					    <td class="text-center"><a target='_blank' href="fichiers/<?php echo $mere['PIECE_JUSTIFICATIF_MERE'];?>"><img src="fichiers/<?php echo $mere['PIECE_JUSTIFICATIF_MERE'];?>" alt=""  width="60"></a></td>
					
						<td>
						<div class="d-inline">
						
						
						<form method='POST' action="chargerpdf.php" class="d-inline">
                                
                           
								<a href="index.php?modifier=<?php echo $naissance['NUMERO']?>" class="btn btn-warning"><i class="fas fa-edit"></i>Modifier</a>
                                
								
								
                                <input type="hidden" value="<?php echo $naissance['NUMERO']?>" name="numero">
							   <button type="submit" class="btn btn-success"><i class="fas fa-certificate"></i> Voir l'extrait</button>
                              
								</form>
								<button class="btn btn-danger d-inline" onclick="deleteConfirmation(<?php echo $naissance['NUMERO']?>)" ><i class="fas fa-trash-alt"></i> Supprimer</button>
						
						
						</div>
						
								
								
							
						</td>
					</tr>
				<?php endwhile ?>
			</tbody>
		</table>
		

     </div>
     <button type="submit" class="btn btn-danger ml-2" name="submit_sup"><i class="fas fa-trash"></i>Supp</button>
      </form>

	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
</body>






<script type="text/javascript">
function deleteConfirmation(id) {
        swal({
            title: "Supprimer?",
            text: "êtes vous sûr de suprimer?",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Oui, Supprimer !",
            cancelButtonText: "No, Annuler!",
            reverseButtons: !0
        }).then(function (e) {


            if (e.value === true) {
             

                $.ajax({
                    type: 'POST',
					url: "delete.php" ,
					data : "delete="+ id,
				  
					
                    
                    success: function (results) {

						swal({
                                    title: "Félicitations",
                                    text: "Voulez avez supprimé avec succès",
                                    type: "success",
                                   
                                    confirmButtonText: "Ok",
                                  
                                   
                                }).then(function (e) {

                                    if (e.value === true) {
                                        location.reload();

                                    } else {
                                        e.dismiss;
                                        location.reload();
                                    }

                                }, function (dismiss) {
                                    location.reload();
                                    return false;
                                });
					
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }
</script>
</html>
