<?php

require "vendor/autoload.php";
use mikehaertl\wkhtmlto\Pdf;
require 'config/config.php';
ob_start();

$numero = htmlspecialchars($_POST['numero']);

$extrait = $db->query("SELECT * FROM naissances WHERE numero=$numero");
$extrait = $extrait->fetch();

if(!empty($extrait['NUMERO'])){
    $id_mere = $extrait['ID_MERE'];

    $mere =  $db->query("SELECT * FROM meres WHERE ID_MERE=$id_mere");
    $mariage =  $db->query("SELECT * FROM mariages WHERE NUMERO=$numero");
    $mariage = $mariage->fetch();
    $mere = $mere->fetch();
    
    $id_pere = $extrait['ID_PERE'];
    
    $pere =  $db->query("SELECT * FROM peres WHERE ID_PERE=$id_pere");
    
    $pere = $pere->fetch();

    require 'pdfhtml.php';

    $content = ob_get_clean();

    $pdf = new Pdf();
    $pdf->addPage($content);
    $pdf->binary = 'C:\Program Files\wkhtmltopdf\bin\wkhtmltopdf';


    $pdf->send();
}else{
    echo "numero n'existe pas!";
}
    




?>

