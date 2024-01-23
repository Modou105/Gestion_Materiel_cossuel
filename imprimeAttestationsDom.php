<?php
require('rotation.php');
include('MyCossuelAppFunctions/AfficheDateFrancais.php');
require('Configurations/MaConnexion.php');
require('Configurations/MaSession.php');
$con=new Connexion();
$sess=new Session();
$connex=$con->EtablirUneConnexion();
class PDF extends PDF_Rotate
{
function Header()
{
    //Put the watermark
    $this->SetFont('Arial','B',40);
    $this->SetTextColor(206,206,206);
    $this->RotatedText(25,230,'ATTESTATION DE CONFORMITE',45);
}

function RotatedText($x, $y, $txt, $angle)
{
    //Text rotated around its origin
    $this->Rotate($angle,$x,$y);
    $this->Text($x,$y,$txt);
    $this->Rotate(0);
}
}


   
$pdf = new PDF();
$pdf->AddPage();
$pdf->Image('images/logocossuel.png',55,10,90);
$pdf->SetLineWidth(0.5);
$pdf->SetDrawColor(255,228,54);
$pdf->Line(10,45,200,45);
$pdf->Line(10,55,200,55);
$pdf->Ln(38);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,5,'ATTESTATION DE CONFORMITE',0,0,'C');

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5,'USAGE DOMESTIQUE',0,0,'C');
$reqInfosAttestation=$connex->prepare("select attestations.IdAttestation, attestations.NumeroAttestation, attestations.DateDelivrance, electriciens.PrenomElectricien, electriciens.NomElectricien, electriciens.TelephoneElectricien, electriciens.NumeroPieceElec, proprietaires.PrenomProprietaire, proprietaires.NomProprietaire, proprietaires.NumeroPieceProp, installations.Numero, installations.Rue, installations.Complement, installations.BP, installations.Latitude, installations.Longitude,demandes.NumeroDemande, demandes.PuissanceDemandee,agences.NomAgence, localites.NomLocalite, agents.MatriculeAgent, agents.PrenomAgent, agents.NomAgent from attestations, dossiers, demandes, installations, proprietaires, electriciens, agents, agences, affectations_dossiers, affectations_agents, localites where attestations.IdDossier=dossiers.IdDossier and dossiers.IdDossier=affectations_dossiers.IdDossier and affectations_dossiers.IdAgentAffectant=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.Idagence=agences.IdAgence and agences.IdLocalite=localites.IdLocalite and dossiers.IdDemande=demandes.IdDemande and demandes.IdInstallation=installations.IdInstallation and demandes.IdProprietaire=proprietaires.IdProprietaire and demandes.IdElectricien=electriciens.IdElectricien and attestations.IdAttestation='".$_GET['idatt']."'");
$reqInfosAttestation->execute();
$resultInfo=$reqInfosAttestation->fetch();
$pdf->Ln(10);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(30,5,'Attestation No:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,$resultInfo['NumeroAttestation'],0,0);

$pdf->SetFont('Arial','I',10);
$pdf->Cell(30,5,utf8_decode('Délivrée le:'),0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(40,5,Datefr($resultInfo['DateDelivrance']),0,0);

$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,5,'Expire le:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,5,Datefr(date('Y-m-d',strtotime($resultInfo['DateDelivrance'].'1 years'))),0,0);

$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(70,5,'Installateur/Bureau de Controle:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(120,5,$resultInfo['PrenomElectricien'].' '.$resultInfo['NomElectricien'],0,0);

$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(70,5,utf8_decode('Téléphone:'),0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(55,5,$resultInfo['TelephoneElectricien'],0,0);

$pdf->SetFont('Arial','I',10);
$pdf->Cell(20,5,'Num CNI:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,5,$resultInfo['NumeroPieceElec'],0,0,'R');

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(255,228,54);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,8,'INSTALLATION ELECTRIQUE',0,0,'C',true);

$pdf->Ln(10);
$pdf->SetFont('Arial','I',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(25,5,utf8_decode('Propriètaire:'),0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,5,$resultInfo['PrenomProprietaire'].' '.$resultInfo['NomProprietaire'],0,0);

$pdf->SetFont('Arial','I',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(20,5,'Num CNI:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(45,5,$resultInfo['NumeroPieceProp'],0,0,'R');

$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,'Adresse           No:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,$resultInfo['Numero'],0,0);

$pdf->Cell(20,5,'Rue:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,5,$resultInfo['Rue'],0,0);

$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,5,'',0,0);

$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,5,utf8_decode('Complément:'),0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,$resultInfo['Complement'],0,0);

$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,5,'',0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(25,5,'BP:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,$resultInfo['BP'],0,0);

$pdf->Cell(20,5,utf8_decode('Localité:'),0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,5,$resultInfo['NomLocalite'],0,0);

$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,'G.P.S.               Latitude:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,$resultInfo['Longitude'],0,0);

$pdf->Cell(20,5,'Longitude:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(30,5,$resultInfo['Latitude'],0,0);

$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,5,utf8_decode('Puissance demandée:'),0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(60,5,$resultInfo['PuissanceDemandee'].' '.'KW',0,0);

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(255,228,54);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,8,'INFORMATIONS COSSUEL',0,0,'C',true);

$pdf->Ln(10);
$pdf->SetFont('Arial','I',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,5,'Agence:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,$resultInfo['NomAgence'],0,0);
$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,5,'Numero Demande:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,$resultInfo['NumeroDemande'],0,0);
$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,5,'Numero Dossier:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,'000517',0,0);
$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,5,'Code Client:',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,5,'5454654545456454541545454545645',0,0);
$pdf->Ln(8);
$pdf->SetFont('Arial','I',10);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(40,5,utf8_decode('Référent Technique:'),0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(115,5,'('.$resultInfo['MatriculeAgent'].') '.$resultInfo['PrenomAgent'].' '.$resultInfo['NomAgent'],0,0);

$pdf->Image('Gestqrcode/qrcodes_Attestations/Attestation'.$resultInfo['IdAttestation'].'.png',166,165,35);

$pdf->Ln(10);
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(255,228,54);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,8,"LA DUREE DE VALIDITE DE CETTE ATTESTATION EST D'UN (01) AN" ,1,1,'C');
$pdf->Ln(3);
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(255,255,255);
$pdf->MultiCell(0,5,utf8_decode("L'installateur soussigné atteste que l'installation éléctronique, objet de cette attestation est conforme aux prescriptions de sécurité en vigueur et que les parties rénovées sont compatibles avec celles non rénovées."),0,2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,utf8_decode("Le signataire reconnait avoir pris connaissance et accepte le réglement d'intervention du COSSUEL"),0,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,"NB :",0,0);
$pdf->SetFont('Arial','I',10);
$pdf->Cell(50,10,"Cette attestation ne donne pas obligatoirement le droit d'obtention d'un compteur :",0,0);

$pdf->SetY(-41);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,5,utf8_decode("Comité Sénégalaise pour la Sécurité des Usagers de l'Electricité (COSSUEL)"),'T',0,'C');
$pdf->SetY(-36);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,5,utf8_decode("Organisme agréé par le Ministère chargé de l'Energie suuivant le decret No 0022609 du 22 Août 2019"),0,0,'C');
$pdf->SetY(-31);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,5,utf8_decode("Adresse: 2 Rue Wagane Diouf, Immeuble Mame Alassane FALL, 7ème étage DAKAR SENEGAL"),0,0,'C');
$pdf->SetY(-26);
$pdf->SetFont('Arial','I',8);
$pdf->Cell(0,5,utf8_decode("Téléphone: (+221) 76 644 76 02/ 33 842 01 81  Email: cossuel@cossuel.sn"),0,0,'C');
$connex=NULL;
$pdf->Output();
?>

