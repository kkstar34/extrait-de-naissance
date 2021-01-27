<?php

require 'config/config.php';







?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Imprimer votre extrait</title>
    
    <link rel="stylesheet" type="text/css" href="css/enregistrement.css">
</head>

<body>
    <center>
        <div class="corps">
            <center>
                <img src="images/ci.png" width="150" height="150" classe="ci" align="left" /> <img src="images/abidjan.jpg " width="150 " height="150 " class="abidjan" align="right" />
                <br/><br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
            </center>
                <center>
                    <h1>RETRAIT D'EXTRAIT</h1>
                </center>
                <div class="wrap-input100 valnameate-input col ">
                    <strong><div class="div" style='background-color:green ; color:orange'>
                    <?php 
                
                        if (isset($_SESSION['success'])){
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        }
                    
                    ?>
                    
                    </div>
                    </strong>

                        <center>
                            <h2>Veuillez fournir le numero de votre extrait</h2>
                        </center>
                        <form action="chargerpdf.php" method='post' enctype="multipart/form-data">
                        <label class="text-black">Numéro</label>
                        <input type="number" name="numero" class="activation">

                        
                        <div>
                           
                            <input type="submit" value="Submit" name="valider" class="envoye">
                        </div>
            
                        </form>
                </div>
          

         </div>  
    </center>

</body>

</html>