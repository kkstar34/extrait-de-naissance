<?php

require 'config/config.php';







?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <style type="text/css">
            #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.75) url(images/loader.gif) no-repeat center center;
            z-index: 10000;
            }
</style>


    <title>Imprimer votre extrait</title>
    

</head>

<body>
<div class="container mt-2 border border-dark mb-2 pb-2">
  <div class="float-right"><img src="images/abidjan.jpg"  class="img-fluid" alt=""></div>
  <div class="float-left"><img src="images/ci.png" class="img-fluid" alt=""></div>
  <div class="clearfix"></div>
  <h1 class="text-center"><strong>DECLARATION DE NAISSANCE</strong></h1>
    <br>
    <div class="mb-2 pb-2">
    
         <div id="success">

         </div>
        <h5 class="text-center text-warning">IMPRIMEZ VOTRE EXTRAIT</h5>
        <br>
        
        <strong><div class="div" style='background-color:green ; color:orange'>
                    <?php 
                
                        if (isset($_SESSION['success'])){
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                    
                    ?>
                    
                    </div>
                    </strong>
        <form  id="needs-validation"  enctype="multipart/form-data" action="chargerpdf.php" method="post"  novalidate>
        
            <div class="form-group row border border-dark p-5 ">
                <div class="col-sm-2"></div>
                <label for="inputPassword"  class="col-sm-2 col-form-label" ><strong>Numero</strong> </label>
                <div class="col-sm-4">
                <input type="number" class="form-control" id="numero"  name="numero" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">  
                    Veuillez entrer un numero correct svp.  
                </div>
                <div class="valid-feedback">  
                    numero correct.  
                </div> 
                </div>
            </div>
        
            <div class="row">  
                                <div class="col-sm-12 col-md-12 col-xs-12">  
                                    <div class="float-right">   
                                        <button class="btn btn-success rounded-0" type="submit">IMPRIMER</button>  
                                    </div>                            
                                </div>  
                            </div>
        </form>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>





</body>

</html>


