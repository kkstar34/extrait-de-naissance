<?php 

require 'config/config.php';


$nationalites = $db->query('SELECT * FROM nationalites');

$nationalite = $db->query('SELECT * FROM nationalites');
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>enregistrement</title>
    
    <link rel="stylesheet" type="text/css" href="css/enregistrement.css">
</head>

<body>
    <center>
        <div class="corps">
            <center>
                <img src="images/ci.png" width="150" height="150" classe="ci" align="left" /> <img src="images/abidjan.jpg" width="150 " height="150 " class="abidjan" align="right" />
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
                    <h1>DECLARATION DE NAISSANCE</h1>
                </center>
                <div class="wrap-input100 valnameate-input col">
                    

                        <center>
                            <h2>NAISSANCE</h2>
                        </center>
                        <form action="store.php" method='post' enctype="multipart/form-data">
                        <label class="text-black">Numéro</label>
                        <input type="number" name="numero" class="activation">

                        <div class="row">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label class="alignement_labelg" class="colone">Nom</label>
                            <input type="text" name="nom" class="activation alignement">
                            <label class="alignement_labeld">Prenom(s)</label>
                            <input type="text" name="prenom" class="activation alignementp">
                        </div>
                        <div>
                            <label class="alignement_labelg" class="colone">Date de naissance</label>
                            <input type="date" name="date_naiss" class="activation alignement">
                            <label class="alignement_labeld">Lieu de naissance</label>
                            <input type="text" name="lieu_naiss" class="activation alignement">

                        </div>
                        <div>
                            <label class="alignement_labelg">Heure de naissance</label>
                            <input type="time" name="heure_naiss" class="activation">
                            <label class="alignement_labellieu">Lieu déclaration</label>
                            <input type="text" name="lieu_declaration" class="activation alignement">

                        </div>
                        <div>

                            <label class="text-black ">date de déclaration</label>
                            <input type="date" name="date_declaration" class="activation">

                            <h3>Sexe</h3>
                            <label class="text-black ">M</label><input type="radio" name="sexe" value="masculin" checked> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label class="text-black ">F</label><input type="radio" name="sexe" value="feminin">

                        </div>

                        
                        <center>
                            <h2>PARENTS</h2>
                        </center>
                        <div>
                            <label class="text-black">Nom du père</label>
                            <input type="text" name="nom_pere" class="activation">
                            <label class="text-black">Fonction du père</label>
                            <input type="text" name="fonction_pere" class="activation"><br/>
                            <label class="text-black">Domicile du père</label>
                            <input type="text" name="domicile_pere" class="activation">
                            <label class="text-black" class="activation">Nationalité</label>
                            <select name="nationalite_pere" class="activation">
                            <?php while($a = $nationalites->fetch() ): ?>

                                <option class="activation"><?php echo $a['LIBELLE_NATIONALITE'] ?></option>

                            <?php endwhile ?>
                            </select>
                            <br>
                            <label class="text-black" class="activation">CNI DU PERE</label>
                            <input type="file" name="cni_pere" placeholder="Image...">
                            <br>
                            <label class="text-black" class="activation">Nom de la mère</label>
                            <input type="text" name="nom_mere" class="activation">
                            <label class="text-black">Fonction de la mère</label>
                            <input type="text" name="fonction_mere" class="activation">
                            <label class="text-black" class="activation">Domicile de la mère</label>
                            <input type="text" name="domicile_mere" class="activation">
                            <label class="text-black" class="activation">Nationalité</label>
                            <select name="nationalite_mere" class="activation">
                            <?php while($b = $nationalite->fetch() ): ?>

                                <option class="activation"><?php echo $b['LIBELLE_NATIONALITE'] ?></option>

                            <?php endwhile ?>
                           
                            </select>
                            <br>
                            <label class="text-black" class="activation">CNI DE LA MERE</label>
                            <input type="file" name="cni_mere" placeholder="Image...">
                            <br>
                        </div>
                        
            
                        <center>
                            <h1>MENTIONS</h1>
                        </center>
            
                        <div>
                            <label class="text-black ">Date de mariage</label>
                            <input type="date" name="date_mariage">
                            <label class="text-black ">Lieu du mariage</label>
                            <input type="text" name="lieu_mariage">
                            <label class="text-black ">Nom de l'épous(e)</label>
                            <input type="text" name="nom_epouse">
                            <label class="text-black">Date de divorce</label>
                            <input type="date" name="date_divorce">
                            <label class="text-black">Date du déces</label>
                            <input type="date" name="date_deces">
                            <label class="text-black">Lieu du déces</label>
                            <input type="text" name="lieu_deces">
                            <input type="file" name="image" placeholder="Image...">
            
                        </div>
                        <div>
                            <input type="reset" value="Réinitialiser" class="envoye">
                            <input type="submit" value="Submit" name="valider" class="envoye">
                        </div>
            
                        </form>
                </div>
          

         </div>  
    </center>

</body>

</html>