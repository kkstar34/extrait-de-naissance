<?php
require "vendor/autoload.php";
use NumberToWords\NumberToWords;
setlocale(LC_TIME, 'fra_fra');
// create the number to words "manager" class
$numberToWords = new NumberToWords();

// build a new number transformer using the RFC 3066 language identifier
$numberTransformer = $numberToWords->getNumberTransformer('fr');
//date 
$date1 = $extrait['DATE_NAISSANCE_ENFANT'];
$date = date_create($date1);
$mois = strftime("%B", strtotime($date1));

$jour =  $date->format('d');
$jour = $numberTransformer->toWords($jour);

$annee1 = $date->format('Y');
$annee = $numberTransformer->toWords($annee1);
$date = $jour . " ". $mois ." " .$annee;



//heure

$time1 = $extrait['HEURE_NAISSANCE_ENFANT'];
$time = date_create($time1);
$heure =  $time->format('H');

$heure = $numberTransformer->toWords(intval($heure));
$minutes =  $time->format('i');
$minutes = $numberTransformer->toWords($minutes);

if($heure == 'un'){
    $heure = 'une';
}

$heure = $heure. ' heure '. $minutes . ' minutes';


//les logos

$communes = ['cocody','bouake','adjame','abobo','attecoube','plateau','yopougon','yamoussoukro','koumassi','port-bouet','anyama','marcory',
'treichville','korhogo'
];

$logo = 'ci.png';

foreach ($communes as $commune){
    $com = strtolower($extrait['LIEU_DECLARATION_ENFANT']);
  
    if($commune == $com){
    
        $logo = $com.'.jpg';
       
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Extrait | PDF</title>
</head>
<body>
    <div class="container mt-2 border border-dark mb-2 pb-2">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11 mt-5">
                <div class="float-left">
                    <h6 class="mt-2">DEPARTEMENT DE <?= strtoupper($extrait['LIEU_NAISSANCE_ENFANT']) ?></h6>
                    <hr style="
                        border-top: 1px dashed black;
                        margin-right:50px;
                        margin-left:50px
                    ">
                    <h6 class="ml-1 ">COMMUNE DE <?= strtoupper($extrait['LIEU_NAISSANCE_ENFANT']) ?></h6>
                   <div class="text-center"><img src="http://localhost/extrait/images/<?= $logo ?>" alt="" width=80 height=80></div> 
                    <h4 class="ml-4"><strong>ETAT CIVIL</strong></h4>
                    <hr style="
                        border-top: 1px dashed black;
                        margin-right:50px;
                        margin-left:50px
                    ">
                    <h6 class="ml-1">Centre secondaire <?= strtoupper($extrait['LIEU_NAISSANCE_ENFANT']) ?></h6>
                    <hr style="
                        border-top: 1px dashed black;
                        margin-right:50px;
                        margin-left:50px
                    ">
                </div>
                <div class="float-right ">
                    <h6 class="text-center ">REPUBLIQUE DE COTE D'IVOIRE</h6>
                    <hr style="
                        border-top: 1px dashed black;
                        margin-right:170px;
                        margin-left:170px
                    ">
                    <h2 class="text-center" style="letter-spacing: 3px;"><strong>EXTRAIT</strong></h2>
                    <h6 class="ml-1 test-justify">Du registre des actes de l'Etat Civil pour l'année <?= $annee1 ?></h6>
                </div>
            </div>
          
            <div class="clearfix"></div>
            <br>
            <div class="col-md-4 text-center pt-1">
                <div class="">
                    <strong class="">N° </strong> <span class=""><strong class=""><?= $numero ?></strong></span> Du <span class=""><strong><?= $extrait['DATE_DECLARATION_ENFANT'] ?></strong></span> DU REGISTRE
                </div> 
                <br>
                <div class="">
                    NAISSANCE DE
                </div> 
                <div class=""><strong>
                <?= $extrait['NOM_ENFANT'] ?>
                </strong>
                 
                </div> 
                <div class="">
                    <strong>
                    <?= $extrait['PRENOM_ENFANT'] ?>./
                    </strong>
                   
                </div> 
            </div>

            <div class="col-md-8">
                <div class="div">Le <strong><?= $date ?>./. </strong></div><br>
                <div class="div">à<strong> <?= $heure ?> ./.</strong></div><br>
                <div class="div">est né <strong><?= $extrait['PRENOM_ENFANT'] ?>./.</strong></div><br>
                <div class="div"><strong>à la Maternité de <?= $extrait['LIEU_NAISSANCE_ENFANT'] ?>./.</strong></div><br>
                <div class="div"><?php if($extrait['SEXE_ENFANT']=="masculin" ){
                    echo "fils de ";}else{
                        echo "fille de " ;
                    }
                 ?><strong><?= $pere['NOM_PERE'] ?> ./.</strong></div><br>
                <div class="div">profession <strong><?= $pere['PROFESSION_PERE'] ?> ./.</strong></div><br>
                <div class="div">et de <strong><?= $mere['NOM_MERE'] ?> </strong></div><br>
                <div class="div">profession <strong><?= $mere['PROFESSION_MERE'] ?>./.</strong></div>
            </div>
            <br>
            <div class="col-md-2 "></div>
            <div class="col-md-8 mt-1 pt-1">
                <hr style="border-top: 3px double black;">
                
            </div>
            <div class="col-md-2"></div>
            
            <div class="col-md-1"></div>
            <div class="col-md-10 container" >
                
                <h2 style="letter-spacing: 3px;" class="text-center"><strong>MENTIONS</strong></h2>
                <div>
                    Marié le ....................<strong ><?php if(isset($mariage['DATE_MARIAGE'])){echo $mariage['DATE_MARIAGE'];}else{
                        echo "Néant";
                    }   ?></strong>...............................................à...........................................<strong ><?php if(isset($mariage['LIEU_MARIAGE'])){echo $mariage['LIEU_MARIAGE'];}else{
                        echo "Néant";
                    }   ?></strong>.........................................................................................................             </div><br>
                    <div class="">avec .................................................<strong ><?php if(isset($mariage['CONJOINT'])){echo $mariage['CONJOINT'];}else{
                        echo "Néant";
                    }   ?></strong>......................................................................................................................................................................................................</div> <br>
                    <div>Mariage Dissous par décision de divorce en date du..........................<strong ><?php if(isset($mariage['DIVORCE'])){echo $mariage['DIVORCE'];}else{
                        echo "Néant";
                    }   ?></strong>....................................................................................................................</div><br>
                    <div>Décédé le ..................................<strong ><?= $extrait['DATE_DECES'] ?></strong>................à ............................<strong ><?= $extrait['LIEU_DECES'] ?></strong>...................................................................................................................................</div><br>
                    <div class="div">Certifié le présent extrait conforme aux indictions portées au registre </div>
            </div>
            <div class="col-md-1"></div>
         
            <div class="col-md-10 container mt-5">
                <div class="float-right mb-2">
                    <div>Délivré à <?= $extrait['LIEU_DECLARATION_ENFANT'] ?>, le <?php setlocale(LC_TIME, 'fra_fra'); echo utf8_encode(strftime('%A %d %B %Y, %H:%M'));   ?></div>
                    
                    <div class="div"><strong>L'Officier de l'Etat civil,</strong></div>
                    (signature)
                </div>
                <div class="float-left">
                <div class=""><img src="http://localhost/extrait/images/code_bare.png" alt="" width=150 height=80></div> 
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-1"></div>
        </div>
        
    </div>
</body>
</html>