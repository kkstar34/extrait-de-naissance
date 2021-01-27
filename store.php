<?php 
require 'config/config.php';



//pere
$nom_pere = htmlspecialchars($_POST['nom_pere']);
$fonction_pere = htmlspecialchars($_POST['fonction_pere']);
$libelle_nationalite_pere = htmlspecialchars($_POST['nationalite_pere']);
$domicile_pere = htmlspecialchars($_POST['domicile_pere']);
$id_nationalite_pere = htmlspecialchars($_POST['nationalite_pere']);



//mere
$nom_mere = htmlspecialchars($_POST['nom_mere']);
$fonction_mere = htmlspecialchars($_POST['fonction_mere']);
$libelle_nationalite_mere = htmlspecialchars($_POST['nationalite_mere']);
$domicile_mere = htmlspecialchars($_POST['domicile_mere']);
$id_nationalite_mere = htmlspecialchars($_POST['nationalite_mere']);





//mariage 

$numero_mariage = htmlspecialchars($_POST['numero']);
$date_mariage = htmlspecialchars($_POST['date_mariage']);
$lieu_mariage = htmlspecialchars($_POST['lieu_mariage']);
$nom_conjoint = htmlspecialchars($_POST['nom_epouse']);
$date_divorce = htmlspecialchars($_POST['date_divorce']);
if(empty($date_divorce)){
    $date_divorce = "Néant";
}
if(empty($date_mariage)){
    $$date_mariage = "Néant";
}

if(empty($lieu_mariage)){
    $lieu_mariage = "Néant";
}

if(empty($nom_conjoint)){
    $nom_conjoint = "Néant";
}

$liens ='lien';

//nationalite


//


//naissance 


$id_agent = 2;
$heure = htmlspecialchars($_POST['heure_naiss']);
$numero = htmlspecialchars($_POST['numero']);
$nom_enfant = htmlspecialchars($_POST['nom']);
$prenom_enfant = htmlspecialchars($_POST['prenom']);
$date_naissance_enfant = htmlspecialchars($_POST['date_naiss']);
$lieu_naissance_enfant = htmlspecialchars($_POST['lieu_naiss']);
$lieu_justificatif_naissance = htmlspecialchars($_POST['lieu_declaration']);
$sexe_enfant = htmlspecialchars($_POST['sexe']);
$date_deces = htmlspecialchars($_POST['date_deces']);
$lieu_deces = htmlspecialchars($_POST['lieu_deces']);
if(empty($date_deces)){
    $date_deces = "Néant";
}
if(empty($lieu_deces)){
    $lieu_deces = "Néant";
}
$piece_deces = 'pieces';




















/* if (!empty($nom_pere) AND !empty($fonction_pere) AND !empty($image))
{


$pere = $db->prepare("INSERT INTO peres(ID_NATIONALITE,NOM_PERE,PROFESSION_PERE,PIECE_JUSTIFICATIF_PERE) VALUES (?,?,?,?)");

$ok = $pere->execute(array($id_nationalite_pere,$nom_pere,$fonction_pere, $image));



}
else
{
    die('remplir tous les champs');
} */


/* if (!empty($nom_mere) AND !empty($fonction_mere) AND !empty($image))
{


$mere = $db->prepare("INSERT INTO meres(ID_NATIONALITE,NOM_MERE,PROFESSION_MERE,PIECE_JUSTIFICATIF_MERE) VALUES (?,?,?,?)");

$ok = $mere->execute(array($id_nationalite_mere,$nom_mere,$fonction_mere, $image));



}
else
{
    die('remplir tous les champs');
} */

/* if (!empty($date_mariage) AND !empty($lieu_mariage) AND !empty($date_divorce) AND !empty($nom_conjoint) AND !empty($image))
{


$pere = $db->prepare("INSERT INTO mariages(NUMERO,ID_AGENT,DATE_MARIAGE,LIEU_MARIAGE,LIEN_JUSTIFICATIF_MARIAGE,CONJOINT,DATE_DIVORCE, PIECE_JUSTIFICATIF_DIVORCE) VALUES (?,?,?,?,?,?,?,?)");

$ok = $pere->execute(array($numero,$id_agent,$date_mariage,$lieu_mariage,$liens,$nom_conjoint, $date_divorce, $image));



}
else
{
    die('remplir tous les champs');
} */


if (!empty($heure) AND !empty($numero) AND !empty($nom_enfant) AND !empty($prenom_enfant) 

AND !empty($date_naissance_enfant) AND !empty($lieu_naissance_enfant) AND !empty($lieu_justificatif_naissance) AND !empty($sexe_enfant))
{
 
    if($date_naissance_enfant> date("Y-m-d")){

        $erreur = "date invalide";

        

    }else{

        if(isset($_FILES['image']) && !empty($_FILES['image']['name']))
        {
           $nom= $_FILES['image']['name'];
            
           $extension= strrchr($nom[0], ".");
           $chemin_temporaire= $_FILES['image']['tmp_name'][0];
           $destination= 'fichiers/'.$nom[0];
           $extensions_autorisees= array('.jpg','.png','.gif');
           if(in_array($extension, $extensions_autorisees))
           {
              if(move_uploaded_file($chemin_temporaire, $destination))
              {
    
                       $nom = $nom[0];
    
                }else
    
              {
                 echo "Une erreur est survenu";
              }
           }
           else
           {
              echo "Votre fichier doit être de format .jpg, .gif ou .png";
           }
        }
        else
        {
           echo "Veuillez selectionner une image";
        }
    
        if(isset($_FILES['image2']) && !empty($_FILES['image2']['name']))
        {
           $nom2= $_FILES['image2']['name'];
            
           $extension= strrchr($nom2[0], ".");
           $chemin_temporaire= $_FILES['image2']['tmp_name'][0];
           $destination= 'fichiers/'.$nom2[0];
           $extensions_autorisees= array('.jpg','.png','.gif');
           if(in_array($extension, $extensions_autorisees))
           {
              if(move_uploaded_file($chemin_temporaire, $destination))
              {
    
                       $nom2 = $nom2[0];
    
                }else
    
              {
                 echo "Une erreur est survenu";
              }
           }
           else
           {
              echo "Votre fichier doit être de format .jpg, .gif ou .png";
           }
        }
        else
        {
           echo "Veuillez selectionner une image";
        }
    
    
    
    $pere = $db->prepare("INSERT INTO peres(ID_NATIONALITE,NOM_PERE,PROFESSION_PERE,PIECE_JUSTIFICATIF_PERE,DOMICILE_PERE) VALUES (?,?,?,?,?)");
    
    $ok = $pere->execute(array($id_nationalite_pere,$nom_pere,$fonction_pere, $nom,$domicile_pere));
    
    $mere = $db->prepare("INSERT INTO meres(ID_NATIONALITE,NOM_MERE,PROFESSION_MERE,PIECE_JUSTIFICATIF_MERE,DOMICILE_MERE) VALUES (?,?,?,?,?)");
    
    $ok = $mere->execute(array($id_nationalite_mere,$nom_mere,$fonction_mere, $nom2,$domicile_mere));
    
    //le dernier pere enregistré
    
    $dernier_pere = $db->query("SELECT * FROM peres ORDER BY ID_PERE DESC LIMIT 1");
    $dernier_pere = $dernier_pere->fetch();
    
    //derniere mere enregistrée
    $derniere_mere = $db->query("SELECT * FROM meres ORDER BY ID_MERE DESC LIMIT 1");
    $derniere_mere = $derniere_mere->fetch();
    
    
    $id_pere = $dernier_pere['ID_PERE'];
    $id_mere = $derniere_mere['ID_MERE'];
    
    $mariage = $db->prepare("INSERT INTO mariages(NUMERO,ID_AGENT,DATE_MARIAGE,LIEU_MARIAGE,LIEN_JUSTIFICATIF_MARIAGE,CONJOINT,DATE_DIVORCE, PIECE_JUSTIFICATIF_DIVORCE) VALUES (?,?,?,?,?,?,?,?)");
    
    $ok = $mariage->execute(array($numero_mariage,$id_agent,$date_mariage,$lieu_mariage,$liens,$nom_conjoint, $date_divorce, $nom));
    
    
    
    $naissance = $db->prepare("INSERT INTO naissances(NUMERO,ID_PERE,ID_MERE,ID_AGENT,NOM_ENFANT,PRENOM_ENFANT,DATE_NAISSANCE_ENFANT,LIEU_NAISSANCE_ENFANT,LIEU_DECLARATION_ENFANT,DATE_DECLARATION_ENFANT,LIEU_JUSTIFICATIF_NAISSANCE,SEXE_ENFANT,DATE_DECES,LIEU_DECES, PIECE_JUSTIFICATIF_DECES,HEURE_NAISSANCE_ENFANT) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    
    
    $ok = $naissance->execute(array($numero,$id_pere,$id_mere,$id_agent,$nom_enfant,$prenom_enfant,$date_naissance_enfant, $lieu_naissance_enfant, $lieu_justificatif_naissance,$date_naissance_enfant,$lieu_justificatif_naissance,$sexe_enfant,$date_deces, $lieu_deces, $piece_deces, $heure));
    
    
     
    
    $_SESSION['success'] = 'Felicitation enregistrement effectué avec succès';
    
    
    //header('Location: recuperer.php');
    
    
    }
   

}
else
{
    die('remplir tous les champs');
} 




?>