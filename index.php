
<?php 

require 'config/config.php';


$nationalites = $db->query('SELECT * FROM nationalites');

$nationalite = $db->query('SELECT * FROM nationalites');



if (isset($_GET['modifier'])) {
    $numero=$_GET['modifier'];
    if (!empty($numero) AND is_numeric($numero)) {
        $extrait = $db->prepare("SELECT * FROM naissances WHERE numero=?");
        $extrait->execute(array($numero));
        $extrait = $extrait->fetch();
        $pere = $db->prepare("SELECT * FROM peres WHERE ID_PERE = ?");
        $mere = $db->prepare("SELECT * FROM meres WHERE ID_MERE = ?");
        $mere->execute(array($extrait['ID_MERE']));
        $mere = $mere->fetch();

        $pere->execute(array($extrait['ID_PERE']));
        $pere = $pere->fetch();
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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



    

      
    <title>Extrait</title>
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
        <h5 class="text-center text-warning">Naissance</h5>
        <br>
        
        
        <form  id="needs-validation"  enctype="multipart/form-data" method="post" novalidate>
        
            <div class="form-group row border border-dark p-5 ">
                <div class="col-sm-2"></div>
                <label for="inputPassword"  class="col-sm-2 col-form-label" >Numero</label>
                <div class="col-sm-4">
                <input type="number" class="form-control" id="numero"  name="numero" aria-describedby="inputGroupPrepend" value="<?php if(isset($extrait['NUMERO'])){ echo $extrait['NUMERO']; } ;?>" required>
                <div class="invalid-feedback">  
                    Veuillez entrer un numero correct svp.  
                </div>
                <div class="valid-feedback">  
                    numero correct.  
                </div> 
                </div>
            </div>

            <div class="row ">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="firstname">Nom</label>  
                                        <input type="text" id="nom" name="nom" value="<?php if(isset($extrait['NOM_ENFANT'])){ echo $extrait['NOM_ENFANT']; } ;?>" placeholder="nom" class="form-control" aria-describedby="inputGroupPrepend"  required/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer un nom correct svp.  
                                        </div>
                                        <div class="valid-feedback">  
                                            nom correct.  
                                        </div> 
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="prenom">Prenom</label>  
                                        <input type="text" id="prenom" name="prenom" value="<?php if(isset($extrait['PRENOM_ENFANT'])){ echo $extrait['PRENOM_ENFANT']; } ;?>" placeholder="Prenom" class="form-control" aria-describedby="inputGroupPrepend"  required/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer votre prenom svp.  
                                        </div>  
                                        <div class="valid-feedback">  
                                            Prenom correct.  
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  

                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="date_naissance">Date de naissance</label>  
                                        <input type="date" id="date_naiss" name="date_naiss" max="<?php echo date("Y-m-d"); ?>" class="form-control" value="<?php if(isset($extrait['DATE_NAISSANCE_ENFANT'])){ echo $extrait['DATE_NAISSANCE_ENFANT']; } ;?>" aria-describedby="inputGroupPrepend"  required />  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer une date de naissance correcte.  
                                        </div>
                                        <div class="valid-feedback">  
                                            Information correcte.  
                                        </div> 
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="lieu_naiss">Lieu de naissance</label>  
                                        <input type="text" id="lieu_naiss" name="lieu_naiss" class="form-control" aria-describedby="inputGroupPrepend"  value="<?php if(isset($extrait['LIEU_NAISSANCE_ENFANT'])){ echo $extrait['LIEU_NAISSANCE_ENFANT']; } ;?>" required/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer votre lieu de naissance svp.  
                                        </div>  
                                        <div class="valid-feedback">  
                                            lieu correcte.  
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  


                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="heure_naiss">Heure</label>  
                                        <input type="time" id="heure_naiss" name="heure_naiss" class="form-control" value="<?php if(isset($extrait['HEURE_NAISSANCE_ENFANT'])){ echo $extrait['HEURE_NAISSANCE_ENFANT']; } ;?>" aria-describedby="inputGroupPrepend"  required/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer votre heure de naissance svp.  
                                        </div>
                                        <div class="valid-feedback">  
                                            Heure correcte.  
                                        </div> 
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="lieu_declaration">Commune de declaration</label>  
                                    
                                        <select name="lieu_declaration" id="" class="form-control" required>
                                        <option value="">Selectionner...</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'cocody'){echo("selected");}} ?>  value="cocody">Cocody</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'bouake'){echo("selected");}} ?> value="bouake">Bouake</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'adjame'){echo("selected");}} ?> value="adjame">Adjame</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'abobo'){echo("selected");}} ?> value="abobo">Abobo</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'attecoube'){echo("selected");}} ?> value="attecoube">Attecoube</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'plateau'){echo("selected");}} ?> value="plateau">Plateau</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'yopougon'){echo("selected");}} ?> value="yopougon">Yopougon</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'yamoussoukro'){echo("selected");}} ?> value="yamoussoukro">Yamoussoukro</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'koumassi'){echo("selected");}} ?> value="koumassi">Koumassi</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'port-bouet'){echo("selected");}} ?> value="port-bouet">Port-bouet</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'anyama'){echo("selected");}} ?> value="anyama">Anyama</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'marcory'){echo("selected");}} ?> value="marcory">Marcory</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'treichville'){echo("selected");}} ?> value="treichville">Treichville</option>
                                            <option <?php if(isset($extrait['LIEU_DECLARATION_ENFANT'])){ if(strtolower($extrait['LIEU_DECLARATION_ENFANT']) == 'korhogo'){echo("selected");}} ?> value="korhogo">Korhogo</option>
                                        </select>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer Lieu de declaration svp.  
                                        </div>  
                                        <div class="valid-feedback">  
                                            Lieu correct.  
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  



                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="date_declaration"  class="col-sm-2 col-form-label" >Date de declaration</label>
                                <div class="col-sm-4">
                                <input type="date" class="form-control" max="<?php echo date("Y-m-d"); ?>" id="date_declaration" value="<?php if(isset($extrait['DATE_DECLARATION_ENFANT'])){ echo $extrait['DATE_DECLARATION_ENFANT']; } ;?>" name="date_declaration" aria-describedby="inputGroupPrepend" required >
                                <div class="invalid-feedback">  
                                    Veuillez entrer une date svp.  
                                </div>
                                <div class="valid-feedback">  
                                    numero correct.  
                                </div> 
                                </div>
                            </div>

                            <div class="row">  
                            <div class="col-sm-5"></div>
                                <div class="col-sm-4">  
                                    <div class="form-group">  
                                        <label>Sexe</label>                                          
                                    </div>  
                                   
                                    
                                    <label class="text-black "> M </label> <input type="radio"  id="sexe1" name="sexe" value="masculin" <?php if(isset($extrait['SEXE_ENFANT'])){ if(strtolower($extrait['SEXE_ENFANT']) == 'masculin'){echo("checked");}}else{ echo "checked";} ?>> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <label class="text-black "> F </label> <input type="radio"  id="sexe2" name="sexe" value="feminin" <?php if(isset($extrait['SEXE_ENFANT'])){ if(strtolower($extrait['SEXE_ENFANT']) == 'feminin'){echo("checked");}}?> >
                                         
                                </div>
                            
                            </div>

    <br>
                        <div class="border border-dark p-2 m-1">
                            
                            
                            <h5 class="text-center text-warning">Parents</h5>
                            <br>

                            <div class="row ">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="firstname">Nom & prenom pere</label>  
                                        <input type="text" id="nom_pere"  name="nom_pere" value="<?php if(isset($pere['NOM_PERE'])){ echo $pere['NOM_PERE']; } ;?>" class="form-control" aria-describedby="inputGroupPrepend" required />  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer le nom et prenom svp.  
                                        </div>
                                        <div class="valid-feedback">  
                                         correct.  
                                        </div> 
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="lastname">Profession pere</label>  
                                        <input type="text" id="fonction_pere" name="fonction_pere" value="<?php if(isset($pere['PROFESSION_PERE'])){ echo $pere['PROFESSION_PERE']; } ;?>" placeholder="fonction" class="form-control" aria-describedby="inputGroupPrepend"  required/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer la profession svp.  
                                        </div>  
                                        <div class="valid-feedback">  
                                             correct.  
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  
                            

                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="domicile_pere">Domicile du pere</label>  
                                        <input type="text" id="domicile_pere" name="domicile_pere" value="<?php if(isset($pere['DOMICILE_PERE'])){ echo $pere['DOMICILE_PERE']; } ;?>" placeholder="domicile pere" class="form-control" aria-describedby="inputGroupPrepend" required />  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer le domicile svp.  
                                        </div>
                                        <div class="valid-feedback">  
                                             correct.  
                                        </div> 
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6">  
                                    <div class="form-group">  
                                        <label for="sexe">Nationnalite</label>  
                                        <select class="custom-select" name="nationalite_pere" required>  
                                            <option value="">Selectionner</option>  
                                            <?php while($a = $nationalites->fetch() ): ?>

                                                <option <?php if(isset($pere['ID_NATIONALITE'])){ if($pere['ID_NATIONALITE'] == $a['ID_NATIONALITE']){echo("selected");}} ?>  value="<?php if(isset($a['ID_NATIONALITE'])){echo $a['ID_NATIONALITE'];} ;?>"  > <?php echo $a['LIBELLE_NATIONALITE'] ?>  </option>


                                            <?php endwhile ?>
                                        </select>  
                                        <div class="invalid-feedback">Veuillez choisir une nationalite svp</div>  
                                    </div>  
                            </div>
                        </div>
                            <div class="row">  
                                <div class="col-sm-4"></div>
                                    <div class="col-sm-4 col-md-4 col-xs-12">  
                                        <div class="form-group">  
                                            <label>CNI du pere</label>  
                                            <div class="custom-file">  
                                                <input type="file"   name="image" class="custom-file-input" >  
                                                 <label class="custom-file-label" for="validatedCustomFile">Choisir...</label>
                                                <div class="invalid-feedback">Choisir un fichier</div>  
                                            </div>  
                                        </div>                                  
                                    </div>  
                                    <div class="col-sm-4"></div>
                            </div> 
                            
                           
                                
                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="firstname">Nom & prenom mere</label>  
                                        <input type="text" id="nom_mere" name="nom_mere" class="form-control" value="<?php if(isset($mere['NOM_MERE'])){ echo $mere['NOM_MERE']; } ;?>" aria-describedby="inputGroupPrepend"  required/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer le nom et prenom svp.  
                                        </div>
                                        <div class="valid-feedback">  
                                         correct.  
                                        </div> 
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="lastname">Profession mere</label>  
                                        <input type="text" id="fonction_mere" name="fonction_mere"  value="<?php if(isset($mere['PROFESSION_MERE'])){ echo $mere['PROFESSION_MERE']; } ;?>" placeholder="fonction" class="form-control" aria-describedby="inputGroupPrepend"  required/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer la profession svp.  
                                        </div>  
                                        <div class="valid-feedback">  
                                             correct.  
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  
                            

                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="domicile_pere">Domicile de la mere</label>  
                                        <input type="text" name="domicile_mere"  id="domicile_mere" value="<?php if(isset($mere['DOMICILE_MERE'])){ echo $mere['DOMICILE_MERE']; } ;?>" placeholder="domicile pere" class="form-control" aria-describedby="inputGroupPrepend"  required/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer le domicile svp.  
                                        </div>
                                        <div class="valid-feedback">  
                                             correct.  
                                        </div> 
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6">  
                                    <div class="form-group">  
                                        <label for="sexe">Nationnalite</label>  
                                        <select class="custom-select" name="nationalite_mere" required>  
                                            <option value="">Selectionner</option>  
                                            <?php while($b = $nationalite->fetch() ): ?>

                                        <option <?php if(isset($mere['ID_NATIONALITE'])){ if($mere['ID_NATIONALITE'] == $b['ID_NATIONALITE']){echo("selected");}} ?>  value="<?php if(isset($b['ID_NATIONALITE'])){echo $b['ID_NATIONALITE'];} ;?>"  > <?php echo $b['LIBELLE_NATIONALITE'] ?>  </option>

                                        <?php endwhile ?> 
                                                                                </select>  
                                        <div class="invalid-feedback">Veuillez choisir une nationalite svp</div>  
                                    </div>  
                            </div>
                        </div>
                            <div class="row">  
                                <div class="col-sm-4"></div>
                                    <div class="col-sm-4 col-md-4 col-xs-12">  
                                        <div class="form-group">  
                                            <label>CNI de la mere</label>  
                                            <div class="custom-file">  
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="image2">  
                                                <label class="custom-file-label" for="validatedCustomFile">Choisir...</label>  
                                                <div class="invalid-feedback">Choisir un fichier</div>  
                                            </div>  
                                        </div>                                  
                                    </div>  
                                    <div class="col-sm-4"></div>
                            </div> 
                            


                            </div>
                             








                            <br>
                        <div class="border border-dark p-2 m-1">
                            
                            
                            <h5 class="text-center text-warning ">MENTIONS</h5>
                            <br>

                            <div class="row">  
                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="date_mariage">Date de mariage</label>  
                                        <input type="date" id="date_mariage" max="<?php echo date("Y-m-d"); ?>" name="date_mariage" class="form-control" aria-describedby="inputGroupPrepend" />  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer une date de mariage correcte.  
                                        </div>
                                        <div class="valid-feedback">  
                                            Information correcte.  
                                        </div> 
                                    </div>  
                                </div>   
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="lieu_mariage">Lieu Mariage</label>  
                                        <input type="text" id="lieu_mariage" name="lieu_mariage" placeholder="Lieu" class="form-control" aria-describedby="inputGroupPrepend" />  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer le lieu svp.  
                                        </div>  
                                        <div class="valid-feedback">  
                                             correct.  
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  
                            

                            <div class="row">  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="nom_epouse">Nom de l'epoux(se)</label>  
                                        <input type="text" id="nom_epouse" name="nom_epouse"  placeholder="nom epoux(se)" class="form-control" aria-describedby="inputGroupPrepend"/>  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer le domicile svp.  
                                        </div>
                                        <div class="valid-feedback">  
                                             correct.  
                                        </div> 
                                    </div>  
                                </div>  
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="date_divorce">Date de divorce</label>  
                                        <input type="date" id="date_divorce" max="<?php echo date("Y-m-d"); ?>" name="date_divorce" class="form-control" aria-describedby="inputGroupPrepend" />  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer une date de divorce correcte.  
                                        </div>
                                        <div class="valid-feedback">  
                                            Information correcte.  
                                        </div> 
                                    </div>  
                                </div> 
                        </div>
                            
                            
                           
                                
                            <div class="row">  
                            <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="date_deces">Date de décès</label>  
                                        <input type="date" id="date_deces" max="<?php echo date("Y-m-d"); ?>" name="date_deces" class="form-control" aria-describedby="inputGroupPrepend" />  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer une date de deces correcte.  
                                        </div>
                                        <div class="valid-feedback">  
                                            Information correcte.  
                                        </div> 
                                    </div>  
                                </div> 
                                <div class="col-sm-6 col-md-6 col-xs-12">  
                                    <div class="form-group">  
                                        <label for="lieu_deces">Lieu de décès</label>  
                                        <input type="text" id="lieu_deces"  name="lieu_deces" placeholder="fonction" class="form-control" aria-describedby="inputGroupPrepend" />  
                                        <div class="invalid-feedback">  
                                            Veuillez entrer la profession svp.  
                                        </div>  
                                        <div class="valid-feedback">  
                                             correct.  
                                        </div> 
                                    </div>  
                                </div>  
                            </div>  
                            

                            
                            <div class="row">  
                                <div class="col-sm-4"></div>
                                    <div class="col-sm-4 col-md-4 col-xs-12">  
                                        <div class="form-group">  
                                            <label>Piece justificative</label>  
                                            <div class="custom-file">  
                                                <input type="file" class="custom-file-input" id="validatedCustomFile" name="image3">  
                                                <label class="custom-file-label" for="validatedCustomFile">Choisir...</label>  
                                                <div class="invalid-feedback">Choisir un fichier</div>  
                                            </div>  
                                        </div>                                  
                                    </div>  
                                    <div class="col-sm-4"></div>
                            </div> 
                            


                            </div>





                                
                            
                            <div class="row">  
                                <div class="col-sm-12 col-md-12 col-xs-12">  
                                    <div class="float-right">  
                                        <button class="btn btn-danger rounded-0" type="submit" id="send_button">Réinitailiser</button>  
                                        <button class="btn btn-success rounded-0" type="submit">Enregister</button>  
                                    </div>                            
                                </div>  
                            </div>
        </form>
    
    </div>
    <div id="loader"></div>
</div> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
<!-- SweetAlert2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<script type="text/javascript">  
        (function () {  
            'use strict';  
            window.addEventListener('load', function () {  
                
                var spinner = $('#loader');
                var form = document.getElementById('needs-validation');  
                form.addEventListener('submit', function (event) {  
                    if (form.checkValidity() === false) {  
                        event.preventDefault();  
                        event.stopPropagation();  
                    } else{
                        event.preventDefault();
                        spinner.show();
                        var data = new FormData();
                    //Form data
                    var form_data = $('#needs-validation').serializeArray();
                                
                    $.each(form_data, function (key, input) {
                        data.append(input.name, input.value);
                    });
                   
                    //File data
                   //File data
                    var file_data = $('input[name="image"]')[0].files;
                    for (var i = 0; i < file_data.length; i++) {
                        data.append("image[]", file_data[i]);
                    }
                  
                    var file_data = $('input[name="image2"]')[0].files;
                    for (var i = 0; i < file_data.length; i++) {
                        data.append("image2[]", file_data[i]);
                    }

                   

                 
                      
                    $.ajax({
                        url:"store.php",
                        method:"POST",
                        processData: false,
                        contentType: false,
                        data: data,
                        success:function(response){
                            spinner.hide();
                            swal({
                                    title: "Félicitations",
                                    text: "Voulez vous imprimer votre extrait ?",
                                    type: "success",
                                    showCancelButton: !0,
                                    confirmButtonText: "Oui",
                                    cancelButtonText: "Non, Faire une autre saisie!",
                                    reverseButtons: !0
                                }).then(function (e) {

                                    if (e.value === true) {
                                        window.location.replace("recuperer.php");

                                    } else {
                                        e.dismiss;
                                        location.reload();
                                    }

                                }, function (dismiss) {
                                    location.reload();
                                    return false;
                                });
                            
                        },
                        error:function(){
                            swal({
                                    title: "Echec",
                                    text: "Erreur lors de l'enregistrement, réessayez",
                                    type: "Warning",
                                    showCancelButton: !0,
                                    confirmButtonText: "Oui !",
                                    cancelButtonText: "Non !",
                                    reverseButtons: !0
                                }).then(function (e) {

                                    if (e.value === true) {
                                        location.reload();

                                    } else {
                                        e.dismiss;
                                    }

                                }, function (dismiss) {
                                    return false;
                                });
                            
                        },
                        complete:function(){
                            setTimeout(function(){
                            $('#success').html('');
                            }, 5000);
                        }
                        });
                    }
                    form.classList.add('was-validated');  
                }, false);  
            }, false);  
        })();  
</script>  
</body>
</html>