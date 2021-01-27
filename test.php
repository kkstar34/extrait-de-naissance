<?php 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Extrait</title>
</head>
<body>
    <div class="container mt-2 border border-dark mb-2 pb-2">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-11 mt-5">
                <div class="float-left">
                    <h6 class="mt-2">DEPARTEMENT DE BOUAKE</h6>
                    <hr style="
                        border-top: 1px dashed black;
                        margin-right:50px;
                        margin-left:50px
                    ">
                    <h6 class="ml-1 ">COMMUNE DE BOUAKE</h6>
                   <div class="text-center"><img src="http://localhost/extrait/images/mairie.jpg" alt="" width=80 height=80></div> 
                    <h4 class="ml-4"><strong>ETAT CIVIL</strong></h4>
                    <hr style="
                        border-top: 1px dashed black;
                        margin-right:50px;
                        margin-left:50px
                    ">
                    <h6 class="ml-1">Centre secondaire Bouake 1</h6>
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
                    <h6 class="ml-1 test-justify">Du registre des actes de l'Etat Civil pour l'année 1998</h6>
                </div>
            </div>
          
            <div class="clearfix"></div>
            <br>
            <div class="col-md-4 text-center pt-1">
                <div class="">
                    <strong class="">N° </strong> <span class=""><strong class="">1523</strong></span> Du <span class=""><strong>14/05/199</strong></span>8 DU REGISTRE
                </div> 
                <br>
                <div class="">
                    NAISSANCE DE
                </div> 
                <div class=""><strong>
                    KOUYATE
                </strong>
                 
                </div> 
                <div class="">
                    <strong>
                        Karim./
                    </strong>
                   
                </div> 
            </div>

            <div class="col-md-8">
                <div class="div">Le <strong>douze mai mile neuf cent quatre vingt-dix-huit./.</strong></div><br>
                <div class="div"><strong>à zéro heure cinquante minutes ./.</strong></div><br>
                <div class="div">est né <strong>Karim ./.</strong></div><br>
                <div class="div"><strong>à la Maternité de Sokoura ./.</strong></div><br>
                <div class="div">fils de <strong>KOUYATE Alassane ./.</strong></div><br>
                <div class="div">profession <strong>Employé de commerce ./.</strong></div><br>
                <div class="div">et de <strong>SOUMAHORO DJENEBA</strong></div><br>
                <div class="div">profession <strong>SANS ./.</strong></div>
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
                    Marié le ....................<strong >Néant</strong>...............................................à...........................................<strong >Néant</strong>.........................................................................................................             </div><br>
                    <div class="">avec .......<strong >Néant</strong>......................................................................................................................................................................................................................................</div> <br>
                    <div>Mariage Dissous par décision de divorce en date du..........................<strong >Néant</strong>....................................................................................................................</div><br>
                    <div>Décédé le ..................................<strong >Néant</strong>................à ............................<strong >Néant</strong>...................................................................................................................................</div><br>
                    <div class="div">Certifié le présent extrait conforme aux indictions portées au registre </div>
            </div>
            <div class="col-md-1"></div>
         
            <div class="col-md-10 container mt-5">
                <div class="float-right mb-2">
                    <div>Délivré à Bouake, le 27 Aout 2019</div>
                    
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















<?php if(isset($mere['ID_NATIONALITE']))
{ 
    if($mere['ID_NATIONALITE'] == $nationalite['ID_NATIONALITE'])
    
    {
        
        echo("selected");
    
    
    }


} 


?>  value="

<?php

if(isset($nationalite['ID_NATIONALITE']))
{ 
    echo $nationalite['ID_NATIONALITE'];
    

} ;?>"