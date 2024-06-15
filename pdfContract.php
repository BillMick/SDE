<?php
session_start(); /* 
require_once('tcpdf/config/lang/eng.php'); */
require_once('tcpdf_min/config/tcpdf_config.php');
require_once('tcpdf_min/tcpdf.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('');
$pdf->SetTitle('Employment Contract');
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


$preavis = "<table>
                <thead>
                    <tr>
                        <th><b>#</b></th>
                        <th><b>Délai de</b></th>
                        <th><b>Préavis</b></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ancienneté de service</td>
                        <td>Employeur</td>
                        <td>Salarié</td>
                    </tr>
                    <tr>
                        <td><b>Inférieur à 5 ans</b></td>
                        <td>1 mois</td>
                        <td>1 mois</td>
                    </tr>
                    <tr>
                        <td><b>Entre 5 et 10 ans</b></td>
                        <td>4 mois</td>
                        <td>1 mois</td>
                    </tr>
                    <tr>
                        <td><b>Supérieur à 10 ans</b></td>
                        <td>6 mois</td>
                        <td>3 mois</td>
                    </tr>
                </tbody>    
            </table>
            ";


            $pasDeLieuFixe = "Ou à défaut de lieu de travail fixe ou prédominant: Le salarié sera occupé à divers endroits 
            et plus particulièrement à l'étranger ainsi qu'au siège ou, le cas échéant, au domicile de l'employeur.
            <p>L'mployeur se réserve toutefois le droit de changer le lieu de travail du/de la salarié(e) sur le territoire 
            du Grand Duché de Luxembourg  pour les besoins du service. Le/la salarié(e) accepte une telle modification de son 
            lieu de travail et ne s'oppose pas à mutation temporaire à l'étranger si les besoins de l'employeur le requièrent.</p>";
            
            $beginPart = "<p style = 'text-indent : 20px;'>Les parties soussignées:</p>\n<p style = 'text-indent : 20px;'>1. $gender Madame/Monsieur/La Société <b>$name</b> 
            demeurant/établi(e) et ayant son siège social à <b>$residenceChief</b> représenté(e) par <b>$representant</b> 
            et Madame/Monsieur <b>$nameEmp</b> demeurant à $residence ont conclut le présent <b>$contrat</b></p>.";

            $article1 = "<p><b><U>Article 1er:</U> Date d'entrée de service</b><p>\n<p style = 'text-indent : 20px;'>La date de début de l'exécution 
            du présent contrat de travail est fixée au $hiringDate [pendant une durée de..]$direIciLaDureeSiCDD.</p>";
            
            $article2 = "<b><U>Article 2:</U> Période d'essai (voir article du code)</b>\n<p style = 'text-indent : 20px;'>
            Le présent contrat de travail 
            prévoit une période d'essai de $period semaines/mois allant du $debutEssai au $finEssai.</p><p style = 'text-indent : 20px;'>
            Si le contrat 
            n'est pas rompu au plus tard $nombreDeJours jours avant la fin de la période d'essai par l'une des deux (02) 
            parties, il est à considérer comme définitif et à durée $typeContrat à partir de la date indiquée d'entrée en 
            service.</p>";
            
            $article3 = "<p><b><U>Article 3:</U> Nature de l'emploi occupé et description des fonctions/tâches assignées</b></p>\n
            <p style = 'text-indent : 20px;'>Le/la salarié(e) est engagé(e) en qualité de $fonction. Dans l'exercice de cette fonction, le/la salarié(e) est 
            amené(e) à: $descriptionDesTaches.</p>
            <p style = 'text-indent : 20px;'>L'employeur se réserve le droit d'affecter le/la salarié(e) à une autre fonction et ce, selon les besoins de l'employeur 
            et en considération de la formation et des qualifications du/de la salarié(e).</p>";
            
            $article4 = "<p><b><U>Article 4:</U> Lieu de travail</b></p>\n
            <p style = 'text-indent : 20px;'>Le lieu de travail est $lieuDeTravail.\n$pasDeLieuFixe.</p>";
            
            $article5 = "<p><b><U>Article 5:</U> Durée et horaire de travail</b><p>\n<p style = 'text-indent : 20px;'>La durée de travail est de $nombreHeures 
            par semaine, réparties sur $nombreJoursOuvrables.</p><p style = 'text-indent : 20px;'>L'horaire de travail ets de $debutH1 à $finH1 heures et de 
            $debutH2 à $finH2 heures.</p>
            Ou
            $Tableau.
            Les horaires de travail pourront varier en fonction de besoins de l'entreprise.";
            
            $article6 = "<p><b><U>Article 6:</U> Salaire [et, le cas échéant, compléments ou accessoires de salaire]</b></p>\n
            <p style = 'text-indent : 20px;'>Le salaire initial brut est fixé à $salaireBrut$ à l'indice $indiceSalaire. Il sera payé à la fin du mois, déduction 
            faite des charges sociales et fiscales prévues par la loi.</p><p style = 'text-indent : 20px;'>Le/la salarié(e) a droit aux compléments ou accessoires 
            suivants: $complements.</p>";
            
            $article7 = "<p><b><U>Article 7:</U> Congé annuel payé</b></p>\n
            <p style = 'text-indent : 20px;'>Le/la salarié(e) a droit à un congé ordinaire de recréation de $nombreDeJoursConge jours ouvrables par année. 
            Le/la salarié(e) a droit à un douxième  du congé annuel par mois de travail entier.</p>";
            
            $article8 = "<p><b><U>Article 8:</U> Régime complémentaire de pension</b></p>\n
            <p style = 'text-indent : 20px;'>Le/la salarié(e) bénéficie du régime complémentaire de pension [à contributions définies ou à prestations définies], 
            mis en place par l'employeur et donnant droit à des prestations en matière de retraite, décès, vie, survie et 
            invalidité tel que décrit dans les règles y relatives.</p>";
            
            $article9 = "<p><b><U>Article 9:</U> Maladie</b></p>\n
            <p style = 'text-indent : 20px;'>Le/la salarié(e) incapable de travailler pour cause de maladie 
            ou d'accident est obligé d'avertir, personnellement ou par personne imposée, l'employeur dès le premier jour de 
            son absence en indiquant si possible la durée prévisible de l'absence. Le troisième jour de son absence au plus tard, 
            le/la salarié(e) est obligé de soumettre à la société un certificat médical attestant son incapacité de travail et 
            sa durée prévisible.</p>";

            $article10 = "<p><b><U>Article 10:</U> Délai à respecter en cas de rupture du contrat avec préavis</b></p>\n
            <p style = 'text-indent : 20px;'>En dehors de l'hypothèse visée à l'article 1 et de celle d'un licenciement pour faute grave, l'employeur 
            ou le/la salarié(e) qui résilie le contrat de travail doit respecter un délai de préavis.</p><p>Celui-ci est 
            en fonction de l'ancienneté de service du salarié et se détermine comme suit: $preavis</p>";
            
            $article11 = "<p><b><U>Article 11:</U> Clauses dérogatoires et/ou supplémentaires</b></p>\n
            <p style = 'text-indent : 20px;'>Les parties conviennent 
            des clauses dérogatoires et/ou supllémentaires suivantes:</p>
            <ol>
                <li><b>Clause de non concurrence:</b>\n$clauseDeNonConcurrence</li>
                <li><b>Clause de confidentialité:</b>\n$clauseDeConfidentialite</li>
                <li><b>Clause relative aux communications électroniques:</b>\n$clauseRelativeAuxCommunications</li>
            </ol>";
            $endPart = "<p style = 'text-indent : 20px;'>Le présent contrat de travail est régi par le Code du Travail et/ou par 
            les dispositions de la convention collective aplicable à l'entreprise.</p><p>Fait en double exemplaire et signé à 
            $lieu le $date.</p><br/>";
            $salarie = "Le/la salarié(e)";
            $employeur = "L'employeur";

            $htmlH = '        <div class = "containerEmp">
            <div class = "containerHeader">
                <div style = "margin : auto;"><!-- <img src="Images/1.png" alt="Something"> --><span class = "fas fa-cubes fa-4x"></span></div>
                <div style = "margin : auto; display : grid; grid-template-rows:20% 20% 40% 20%;">
                    <div style = "font-size : 15px;"><b>REPUBLIQUE DU BENIN</b></div>
                    <div style = "font-size : 15px;"><b>SDE ENTERPRISE</b></div>
                    <div><h1><b>CONTRAT DE TRAVAIL</b></h1></div>
                    <div style = "font-size : 10px;"><b>IFU N°142552920531056</b></div>
                </div>
                <div style = "margin : auto;"><span class = "fas fa-file-contract fa-4x"></span></div>
            </div>';
$pdf->writeHTML($htmlH,true,0,true,0);
$pdf->writeHTML($beginPart, true, 0, true, 0);
$pdf->writeHTML($article1, true, 0, true, 0);
$pdf->writeHTML($article2, true, 0, true, 0);
$pdf->writeHTML($article3, true, 0, true, 0);
$pdf->writeHTML($article4, true, 0, true, 0);
$pdf->writeHTML($article5, true, 0, true, 0);
$pdf->writeHTML($article6, true, 0, true, 0);
$pdf->writeHTML($article7, true, 0, true, 0);
$pdf->writeHTML($article8, true, 0, true, 0);
$pdf->writeHTML($article9, true, 0, true, 0);
$pdf->writeHTML($article10, true, 0, true, 0);
$pdf->writeHTML($article11, true, 0, true, 0);
$pdf->writeHTML($endPart, true, 0, true, 0);



// output the HTML content

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example.pdf', 'I');

//============================================================+
// END OF FILE
//==============================================
?>