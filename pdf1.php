<?php
session_start(); /* 
require_once('tcpdf/config/lang/eng.php'); */
require_once('tcpdf_min/config/tcpdf_config.php');
require_once('tcpdf_min/tcpdf.php');/* 
require_once('header.html'); */

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Daily Tasks Report');
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


$bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
$number = 0;
$status = "Done";
$date = date("y-m-d");
$time = date("H:i:s");
$requete3 = $bdd->prepare("SELECT * FROM TasksProposed WHERE registrationNumber = :r AND taskStatus = :t AND PDate = :pd");
$requete3->bindParam(':r',$_SESSION['staffNumber']);
$requete3->bindParam(':t',$status);
$requete3->bindParam(':pd',$date);/* 
$requete3->bindParam(':taskStatus2',$status2); */
$requete3->execute();
$htmlNE = "<h1>SDE ENTERPRISE</h1>";
$htmlH = "<div style = 'text-align : center; letter-spacing : 3px;'><b><h1><u>Daily Tasks Report</u></h1></b></div>";
$htmlR = "<b>Registration Number :</b> ".$_SESSION['staffNumber'];
$htmlN = "<b>Name :</b> ".$_SESSION['name'];
$htmlD = "<b>Date :</b> ".$date;
$htmlT = "<b>Time :</b> ".$time;
$html1 = "<div><h2><u>Done</u></h2></div>";
$htmlp = "<div><h3><u>Proposed</u></h3></div>";
$pdf->writeHTML($htmlNE, true, 0, true, 0);
$pdf->writeHTML($htmlH, true, 0, true, 0);
$pdf->writeHTML($htmlD, true, 0, true, 0);
$pdf->writeHTML($htmlT, true, 0, true, 0);
$pdf->writeHTML($htmlR, true, 0, true, 0);
$pdf->writeHTML($htmlN, true, 0, true, 0);
$pdf->writeHTML($html1, true, 0, true, 0);
$pdf->writeHTML($htmlp, true, 0, true, 0);
while ($task3 = $requete3->fetch())
{ 
    $number = $number + 1;
    $c = $task3['taskDesignation'];
    $d = $task3['taskDescription'];
    $e = $task3['taskDuration'];
    $f = $task3['taskStatus'];
    $html = "<table>
                <thead>
                    <tr>
                        <th><b>#</b></th><th><b>Task</b></th><th><b>Description</b></th><th><b>Duration</b></th><th><b>Status</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$number</td>
                        <td>$c</td>
                        <td>$d</td>
                        <td>$e</td>
                        <td>$f</td>
                    </tr>
                </tbody>    
            </table>
            ";
            $pdf->writeHTML($html, true, 0, true, 0);
}
$htmla = "<div><h3><u>Assigned</u></h3></div>";
$pdf->writeHTML($htmla, true, 0, true, 0);
$requete3 = $bdd->prepare("SELECT * FROM TasksAssigned WHERE registrationNumber = :r AND taskStatus = :t AND PDate = :pd");
$requete3->bindParam(':r',$_SESSION['staffNumber']);
$requete3->bindParam(':t',$status);
$requete3->bindParam(':pd',$date);
while ($task3 = $requete3->fetch())
{
    $number = $number + 1;
    $c = $task3['taskDesignation'];
    $d = $task3['taskDescription'];
    $e = $task3['taskDuration'];
    $f = $task3['taskStatus'];
    $f = $task3['adminRegistrationNumber'];
    $html = "<table>
                <thead>
                    <tr>
                        <th><b>#</b></th><th><b>Task</b></th><th><b>Description</b></th><th><b>Duration</b></th><th><b>Status</b></th><th><b>Controller</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$number</td>
                        <td>$c</td>
                        <td>$d</td>
                        <td>$e</td>
                        <td>$f</td>
                        <td>$g</td>
                    </tr>
                </tbody>    
            </table>
            ";
            $pdf->writeHTML($html, true, 0, true, 0);
}


$number = 0;
$requete3 = $bdd->prepare("SELECT * FROM TasksProposed WHERE registrationNumber = :r AND taskStatus != :t");
$requete3->bindParam(':r',$_SESSION['staffNumber']);
$requete3->bindParam(':t',$status);
$requete3->execute();
$html1 = "<div><h2><u>Not Done</u></h2></div>";
$htmlp = "<div><h3><u>Proposed</u></h3></div>";
$pdf->writeHTML($html1, true, 0, true, 0);
$pdf->writeHTML($htmlp, true, 0, true, 0);
while ($task3 = $requete3->fetch())
{ 
    $number = $number + 1;
    $a = $task3['PDate'];
    $b = $task3['PTime'];
    $c = $task3['taskDesignation'];
    $d = $task3['taskDescription'];
    $e = $task3['taskDuration'];
    $f = $task3['taskStatus'];
    $html = "<table>
                <thead>
                    <tr>
                        <th><b>#</b></th><th><b>Date</b></th><th><b>Time</b></th><th><b>Task</b></th><th><b>Description</b></th><th><b>Duration</b></th><th><b>Status</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$number</td>
                        <td>$a</td>
                        <td>$b</td>
                        <td>$c</td>
                        <td>$d</td>
                        <td>$e</td>
                        <td>$f</td>
                    </tr>
                </tbody>    
            </table>
            ";
            $pdf->writeHTML($html, true, 0, true, 0);
}
$htmla = "<div><h3><u>Tasks assigned</u></h3></div>";
$pdf->writeHTML($htmla, true, 0, true, 0);
$requete3 = $bdd->prepare("SELECT * FROM TasksAssigned WHERE registrationNumber = :r AND taskStatus != :t");
$requete3->bindParam(':r',$_SESSION['staffNumber']);
$requete3->bindParam(':t',$status);
while ($task3 = $requete3->fetch())
{
    $number = $number + 1;
    $a = $task3['ADate'];
    $b = $task3['ATime'];
    $c = $task3['taskDesignation'];
    $d = $task3['taskDescription'];
    $e = $task3['taskDuration'];
    $f = $task3['taskStatus'];
    $f = $task3['adminRegistrationNumber'];
    $html = "<table>
                <thead>
                    <tr>
                        <th><b>#</b></th><th><b>Task</b></th><th><b>Description</b></th><th><b>Duration</b></th><th><b>Status</b></th><th><b>Controller</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>$number</td>
                        <td>$c</td>
                        <td>$d</td>
                        <td>$e</td>
                        <td>$f</td>
                        <td>$g</td>
                    </tr>
                </tbody>    
            </table>
            ";
            $pdf->writeHTML($html, true, 0, true, 0);
}

// output the HTML content

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('rapport.pdf', 'I');

//============================================================+
// END OF FILE
//==============================================
?>