<?php 


require('fpdf/fpdf.php');
require 'config/config.php';
// setlocale(LC_TIME, 'fr_FR.UTF8');
// setlocale(LC_TIME, 'fr_FR');
// setlocale(LC_TIME, 'fr');
setlocale(LC_TIME, 'fra_fra');

$image1 = "images/ci.png";
$image2 = "images/abidjan.jpg";
if ($_POST['valider']){

$date = strftime('%A %d %B %Y, %H:%M'); 

$numero = $_POST['numero'];

if (!empty($numero)) {


$extrait = $db->query("SELECT * FROM naissances WHERE numero=$numero");
$extrait = $extrait->fetch();

if($extrait != false){

$id_mere = $extrait['ID_MERE'];

$mere =  $db->query("SELECT * FROM meres WHERE ID_MERE=$id_mere");

$mere = $mere->fetch();

$id_pere = $extrait['ID_PERE'];

$pere =  $db->query("SELECT * FROM peres WHERE ID_PERE=$id_pere");

$pere = $pere->fetch();


$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial', '', 12);
$pdf->Image('images/abidjan.jpg',10,10,-300);
$pdf->Cell(55, 50, 'Nom & Prenom', 0, 0);
$pdf->Cell(58, 50, ': '.$extrait['NOM_ENFANT'].' ' .$extrait['PRENOM_ENFANT'] , 0, 0);
$pdf->Cell(25, 50, 'Date Naissance', 0, 0);
$pdf->Cell(52, 50, '   :      '. $extrait['DATE_NAISSANCE_ENFANT'].' A '.$extrait['HEURE_NAISSANCE_ENFANT'], 0, 1);
$pdf->Cell(55, 10, 'Lieu Naissance', 0, 0);
$pdf->Cell(58, 10, ': '. $extrait['LIEU_NAISSANCE_ENFANT'], 0, 1);
$pdf->Cell(55, 5, 'Pere (NOM & PRENOM)', 0, 0);
$pdf->Cell(58, 5, ': '. $pere['NOM_PERE'], 0, 0);
$pdf->Cell(25, 5, 'Mere', 0, 0);
$pdf->Cell(58, 5, ': '. $mere['NOM_MERE'], 0, 1);
$pdf->Line(10, 40, 200, 40);

$pdf->Ln(0);
$pdf->Cell(55, 8, 'Numero', 0, 0);
$pdf->Cell(58, 8, ': 1253', 0, 1);

$pdf->Cell(55, 8, 'Nom conjoint', 0, 0);
$pdf->Cell(58, 8, ': non-defini', 0, 1);

$pdf->Cell(55, 8, 'Date deces', 0, 0);
$pdf->Cell(58, 8, ': non-definie', 0, 1);

$pdf->Cell(55, 8, 'Lieu deces', 0, 0);
$pdf->Cell(58, 8, ': non-defini', 0, 1);

$pdf->Line(10, 125, 200, 125);

$pdf->Ln(10);//Line break
$pdf->Cell(55, 5, 'Maire', 0, 0);
$pdf->Cell(58, 5, ': Nicolas Djibo', 0, 1);

$pdf->Line(155, 150, 195, 150);
$pdf->Ln(5);//Line break
$pdf->Cell(140, 5, ' etabli le ' .$date, 0, 0);
$pdf->Cell(50, 5, ': Signature', 0, 1, 'C');

$pdf->Output();
}else{
    echo "ce numero d'extrait n'existe pas";
}
}

}

?>