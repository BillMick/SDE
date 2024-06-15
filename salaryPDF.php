<?php session_start();

$bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
        //allocations positives
    //salaire de base
    /* $request = $bdd->prepare("SELECT * FROM BaseSalary WHERE grade = :grade");
    $request->bindParam(':grade',$_SESSION['grade']);
    $request->execute();
    $baseAll = $request->fetch(); *//* 
    $sb = $baseAll['baseSalary']; */
    $sb = 100000;
    //prime
    $s = 1;
    $s1 = 0;
    $prime = 0;
    /* $request = $bdd->prepare("SELECT * FROM Prime WHERE id = :id AND primeStatus = :primeStatus");
    $request->bindParam(':id',$_SESSION['staffNumber']);
    $request->bindParam(':primeStatus',$s);
    $request->execute();
    while ($primeAll = $request->fetch())
    {
        $prime = $prime + $primeAll['prime'];
    } */
                //Mise à jour de la table des primes
    /* $request = $bdd->prepare("UPDATE Prime SET primeStatus = :p WHERE registrationNumber = :registrationNumber AND primeStatus = :p1");
    $request->bindParam(':id',$_SESSION['staffNumber']);
    $request->bindParam(':p',$s1);
    $request->bindParam(':p1',$s);
    $request->execute(); */
    //avantages (liés au poste)
    $avantages = 0;/* 
    $request = $bdd->prepare("SELECT * FROM PostAdvantages WHERE post = :post");
    $request->bindParam(':post',$_SESSION['post']);
    $request->execute();
    $postAll = $request->fetch();
    $avantages = $postAll['advantages']; */
    //indemnités (liées au grade)
    $indemnitesGrade = 0;/* 
    $request = $bdd->prepare("SELECT * FROM GradeIndemnity WHERE grade = :grade");
    $request->bindParam(':grade',$_SESSION['grade']);
    $request->execute();
    $gradeAll = $request->fetch();
    $indemnitesGrade = $gradeAll['indemnity']; */
    //indemnités (liées aux prestations)
    $indemnitesPrestations = 0;/* 
    $request = $bdd->prepare("SELECT * FROM PrestationsIndemnity WHERE registrationNumber = :registrationNumber AND prestationStatus = :prestationStatus");
    $request->bindParam(':registrationNumber',$_SESSION['staffNumber']);
    $request->bindParam(':prestationStatus',$s);
    $request->execute();
    $prestAll = $request->fetch();
    while ($primeAll = $request->fetch()) *//* 
    {
        $indemnitesPrestations = $indemnitesPrestations + $prestAll['indemnity'];
    }
                    //Mise à jour de la table des indemnités pour prestations
    $request = $bdd->prepare("UPDATE PrestationsIndemnity SET indemnityStatus = :p WHERE registrationNumber = :registrationNumber AND primeStatus = :p1");
    $request->bindParam(':id',$_SESSION['staffNumber']);
    $request->bindParam(':p',$s1);
    $request->bindParam(':p1',$s);
    $request->execute(); */


        //Retranchements
    //retranchement
    $saisie = 0;
    $accompte;
    $cnss = 0.04;
    $risk = 0.09;
    $allocationVieillesse = 0.064;
    $prestationFamiliale = 0.02;
    $chargesPatronales = 0.036;/* 
    $request = $bdd->prepare("SELECT * FROM Retrenchments");
    $request->execute();
    $retrenchmentAll = $request->fetch();
    $cnss = $retrenchmentAll['cnss'];
    $risk = $retrenchmentAll['risk'];
    $allocationVieillesse = $retrenchmentAll['allocationVieillesse'];
    $prestationFamiliale = $retrenchmentAll['prestationFamiliale'];
    $chargesPatronales = $retrenchmentAll['chargesPatronales']; */
    //impôts sur le revenu personnel


    $salaireFinal = $prime + $indemnitesGrade + $indemnitesPrestations + $avantages + (1 - $cnss - $risk - $allocationVieillesse - $prestationFamiliale - $chargesPatronales)*$sb;
    //Fiche de paie
    /* echo $salaireFinal; */


/* 
require_once('tcpdf/config/lang/eng.php'); */
require_once('tcpdf_min/config/tcpdf_config.php');
require_once('tcpdf_min/tcpdf.php');/* 
require_once('header.html'); */

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Fiche de paie');
$pdf->SetSubject('');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);
// set font
$pdf->SetFont('courier', '', 11);

// add a page
$pdf->AddPage();
// récupérer la valeur de la variable nom du formulaire.

$date = date("j F y");
$time = date("H:i:s");
$htmlNE = "<div><b>REPUBLIQUE DU BENIN</b></div><h1>SDE ENTERPRISE</h1><br>
<div><b>IFU N°142552920531056</b></div>";
$htmlH = "<div style = 'text-align : center; letter-spacing : 3px;'><b><h1><u>Fiche de paie</u></h1></b></div>";
$htmlR = "<b>Registration Number :</b> ".$_SESSION['staffNumber'];
$htmlN = "<b>Name :</b> ".$_SESSION['name'];
$htmlD = "<b>Date :</b> ".$date;
$htmlT = "<b>Time :</b> ".$time;
$pdf->writeHTML($htmlNE, true, 0, true, 0);
$pdf->writeHTML($htmlH, true, 0, true, 0);
$pdf->writeHTML($htmlD, true, 0, true, 0);
$pdf->writeHTML($htmlT, true, 0, true, 0);
$pdf->writeHTML($htmlR, true, 0, true, 0);
$pdf->writeHTML($htmlN, true, 0, true, 0);
$htmlB = "<b>Relevé d'Identité Bancaire :</b> ".$_SESSION['rib']."<br><b>Banque : </b>".$_SESSION['bankName'];
$pdf->writeHTML($htmlB, true, 0, true, 0);


$hsb = "<b>Salaire de base</b>";
$hprime = "<b>Prime</b>";
$hindemnitesGrade = "<b>Indemnités de Grade</b>";
$hindemnitesPrestations = "<b>Indemnités de Prestations</b> ";
$havantages = "<b>Avantages</b>";
$total1 = $sb + $prime + $indemnitesPrestations + $indemnitesGrade + $avantages;

$hchargesPatronales = "<b>Charges Patronales</b>";
$hcnss = "<b>Caisse Nationale de Sécurité Sociale :</b> ";
$hrisk = "<b>Risques Professionnelles</b>";
$hallocationVieillesse = "<b>Allocations de Vieillesse</b>";
$hprestationFamiliale = "<b>Prestations Familiales</b>";
$hsaisie = "<b>Saisie</b>";
$haccompte = "<b>Accompte</b>";
$himpm = "<b>Impôts sur le revenu personnel</b>";
$total2 = $sb * ($chargesPatronales + $cnss + $risk + $allocationVieillesse + $prestationFamiliale + $saisie + $accompte);//+$impm
$hsalaireFinal = "<b>Salaire de base</b>";

$cnss1 = $cnss*$sb;
$risk1 = $risk*$sb;
$allocationVieillesse1 = $allocationVieillesse*$sb;
$prestationFamiliale1 = $prestationFamiliale*$sb;
$chargesPatronales1 = $chargesPatronales*$sb;
$saisie1 = $saisie*$sb;
$accompte1 = $accompte*$sb;
$impm1 = $impm*$sb;


$hfiche1 = "<div><h3>Salaire Brut</h3></div>";
$fiche1 = " <table>
                <thead>
                    <tr>
                        <th><b>#</b></th>
                        <th><b>Montant</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>$hsb</b></td>
                        <td>$sb</td>
                    </tr>
                    <tr>
                        <td><b>$hprime</b></td>
                        <td>$prime</td>
                    </tr>
                    <tr>
                        <td><b>$hindemnitesGrade</b></td>
                        <td>$indemnitesGrade</td>
                    </tr>
                    <tr>
                        <td><b>$hindemnitesPrestations</b></td>
                        <td>$indemnitesPrestations</td>
                    </tr>
                    <tr>
                        <td><b>$havantages</b></td>
                        <td>$avantages</td>
                    </tr>
                    <tr>
                        <td><b>Total 1</b></td>
                        <td><b>$total1</b></td>
                    </tr>
                </tbody>    
            </table>";
$pdf->writeHTML($hfiche1, true, 0, true, 0);
$pdf->writeHTML($fiche1, true, 0, true, 0);

$hfiche2 = "<div><h3>Retenus Facultatives et obligatoires</h3></div>";
$fiche2 = " <table>
                <thead>
                    <tr>
                        <th><b>#</b></th>
                        <th><b>Taux</b></th>
                        <th><b>Montant</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><b>$hcnss</b></td>
                        <td>$cnss</td>
                        <td>$cnss1</td>
                    </tr>
                    <tr>
                        <td><b>$hrisk</b></td>
                        <td>$risk</td>
                        <td>$risk1</td>
                    </tr>
                    <tr>
                        <td><b>$hallocationVieillesse</b></td>
                        <td>$allocationVieillesse</td>
                        <td>$allocationVieillesse1</td>
                    </tr>
                    <tr>
                        <td><b>$hprestationFamiliale</b></td>
                        <td>$prestationFamiliale</td>
                        <td>$prestationFamiliale1</td>
                    </tr>
                    <tr>
                        <td><b>$hchargesPatronales</b></td>
                        <td>$chargesPatronales</td>
                        <td>$chargesPatronales1</td>
                    </tr>
                    <tr>
                        <td><b>$hsaisie</b></td>
                        <td>$saisie</td>
                        <td>$saisie1</td>
                    </tr>
                    <tr>
                        <td><b>$haccompte</b></td>
                        <td>$accompte</td>
                        <td>$accompte1</td>
                    </tr>
                    <tr>
                        <td><b>$himpm</b></td>
                        <td>$impm</td>
                        <td>$impm1</td>
                    </tr>
                    <tr>
                        <td><b>Total 2</b></td>
                        <td></td>
                        <td><b>$total2</b></td>
                    </tr>
                </tbody>    
                </table>";

$pdf->writeHTML($hfiche2, true, 0, true, 0);
$pdf->writeHTML($fiche2, true, 0, true, 0);

$fichet = " <table>
                <tbody>
                    <tr>
                        <td><h3><b>Salaire Final Dû</b></h3></td>
                        <td>------------></td>
                        <td><h2><b>$salaireFinal</b></h2></td>
                    </tr>
                </tbody>    
                </table>";
$pdf->writeHTML($fichet, true, 0, true, 0);

// output the HTML content

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Fiche de paie.pdf', 'I');

//============================================================+
// END OF FILE
//==============================================