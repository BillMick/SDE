<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require( "PDF/fpdf.php") ;
   $db= new PDO("mysql:host=localhost;dbname=EDLProject","root","");
    class myPDF extends FPDF {
        function header()
        {
            $this->Image("Images/2.jpg", 10, 6,10,);
            $this->SetFont('Times', 'B', 14);
            $this->Cell(276, 5, 'RAPPORT DES TRAVAUX JOURNALIERS', 0, 0, 'C');
            $this->Ln();
            $this->SetFont('Times', 'B', 14);
            $this->Cell(276, 10, 'TABLEAU DES TACHES EFFECTUEES', 0, 0, 'C');
            $this->Ln(2);
        }
         function footer()
        {
            $this->SetY(-15);
            $this->SetFont('Times', 'B', 8);
            $this->Cell(0, 10, 'Page'.$this->PageNo().'/{nb}', 0, 0, 'C');
        }
          function headerTable()
        {
            $this->SetY(40);
            $this->SetFont('Times', 'B', 12);/* 
            $this->Cell(20, 10, 'ID', 1, 0, 'C'); */
            $this->Cell(40, 10, 'NAME', 1, 0, 'C');
            $this->Cell(40, 10, 'PRENOM', 1, 0, 'C');
            $this->Cell(60, 10, 'EMAIL', 1, 0, 'C');
            $this->Cell(36, 10, 'POSTE', 1, 0, 'C');/* 
            $this->Cell(50, 10, 'STATUS', 1, 0, 'C'); */
            $this->Ln();
        }
        function viewTable($db){
            $this->SetFont('Times', '', 12);/* 
            $dat=date("d-m-Y"); */
            $stmt = $db->query("SELECT *from TasksAssigned ");
            while($data =$stmt->fetch(PDO::FETCH_OBJ)){
                $this->SetFont('Times', 'B', 12);/* 
                $this->Cell(20, 10, $data->id, 1, 0, 'C'); */
                $this->Cell(40, 10, $data->taskDesignation, 1, 0, 'L');
                $this->Cell(40, 10, $data->taskDescription, 1, 0, 'L');
                $this->Cell(60, 10, $data->taskDuration, 1, 0, 'L');
                $this->Cell(36, 10, $data->adminRegistrationNumber, 1, 0, 'L');/* 
                $this->Cell(50, 10, $data->status, 1, 0, 'L'); */
                $this->Ln();
            }
        }  
    }
        
        $pdf =new myPDF();
        $pdf->AliasNbPages();
        $pdf->AddPage('L','A4',0);
        $pdf->headerTable();
        $pdf->viewTable($db); 
        $pdf->Output();
    
    ?>
</body>
</html>