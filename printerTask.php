<?php /* session_start(); */ ?>
<!-- <!DOCTYPE html>
<html lang="fr">
    <head> -->
<!--         <title>Print Tasks</title>
    </head> -->
    <!-- <body> -->


    <?php
    require "PDF/fpdf.php";
    
    class myPDF extends FPDF
    {
        function header()
        {
            $this->Image('Images/1.png',10,6);
        } 

        function footer()
        {
            /* include ("footer.html"); */
        }

        //tâches du jour assignées faites
        function headerTable()
        {
            $this->SetFont('Times','B',12);
            $this->Cell(10,10,'#',1,0,'C');
            $this->Cell(30,10,'Task',1,0,'C');
            $this->Cell(40,10,'Description',1,0,'C');
            $this->Cell(20,10,'Duration',1,0,'C');
            $this->Cell(20,10,'Controller',1,0,'C');
            $this->Ln();
        }
        function viewTable()
        {
            $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
            $this->SetFont('Times','',12);
            $n = 0;
            $result = $bdd->query("SELECT * FROM TasksAssigned");
            while($data = $result->fetch(PDO::FETCH_OBJ))
            {
                $this->SetFont('Times','B',12);
                $n = $n + 1;
                $this->Cell(10,10,$n,1,0,'C');
                $this->Cell(30,10,$data->taskDesignation,1,0,'L');
                $this->Cell(40,10,$data->taskDescription,1,0,'L');
                $this->Cell(20,10,$data->taskDuration,1,0,'L');
                $this->Cell(20,10,$data->adminRegistrationNumber,1,0,'L');
                $this->Ln();
            }
         }


        //Tâches du jour proposées faites
        /* function headerTable1()
        {
            $this->Cell(10,10,'#',1,0,'C');
            $this->Cell(30,10,'Task',1,0,'C');
            $this->Cell(40,10,'Description',1,0,'C');
            $this->Cell(20,10,'Duration',1,0,'C');
            $this->Ln();
        }
        function viewTable1($bdd)
        {
            $n = 0;
            $result = $bdd->query("SELECT * FROM TasksProposed WHERE taskStatus = 'Done'");
            while($data = $result->fetch(PDO::FETCH_OBJ))
            {
                $n = $n + 1;
                $this->Cell(10,10,$n,1,0,'C');
                $this->Cell(30,10,$data->taskDesignation,1,0,'L');
                $this->Cell(40,10,$data->taskDescription,1,0,'L');
                $this->Cell(20,10,$data->taskDuration,1,0,'L');
                $this->Ln();
            }
        }
        

        //Tâches assignées non faites
        function headerTable2()
        {
            $this->Cell(10,10,'#',1,0,'C');
            $this->Cell(20,10,'Date',1,0,'C');
            $this->Cell(30,10,'Task',1,0,'C');
            $this->Cell(40,10,'Description',1,0,'C');
            $this->Cell(20,10,'Duration',1,0,'C');
            $this->Cell(20,10,'Status',1,0,'C');
            $this->Cell(20,10,'Controller',1,0,'C');
            $this->Ln();
        }
        function viewTable2($bdd)
        {
            $n = 0;
            $result = $bdd->query("select * from TasksAssigned where taskStatus != 'Done'");
            while($data = $result->fetch(PDO::FETCH_OBJ))
            {
                $n = $n + 1;
                $this->Cell(10,10,$n,1,0,'C');
                $this->Cell(20,10,$data->ADate,1,0,'L');
                $this->Cell(30,10,$data->taskDesignation,1,0,'L');
                $this->Cell(40,10,$data->taskDescription,1,0,'L');
                $this->Cell(20,10,$data->taskDuration,1,0,'L');
                $this->Cell(20,10,$data->taskStatus,1,0,'L');
                $this->Cell(20,10,$data->adminRegistrationNumber,1,0,'L');
                $this->Ln();
            }
        }
        
        
        //Tâches proposées non faites
        function headerTable3()
        {
            $this->Cell(10,10,'#',1,0,'C');
            $this->Cell(20,10,'Date',1,0,'C');
            $this->Cell(30,10,'Task',1,0,'C');
            $this->Cell(40,10,'Description',1,0,'C');
            $this->Cell(20,10,'Duration',1,0,'C');
            $this->Cell(20,10,'Status',1,0,'C');
            $this->Ln();
        }
        function viewTable3($bdd)
        {
            $n = 0;
            $result = $bdd->query("select * from TasksProposed");
            while($data = $result->fetch(PDO::FETCH_OBJ))
            {
                $n = $n + 1;
                $this->Cell(10,10,$n,1,0,'C');
                $this->Cell(20,10,$data->PDate,1,0,'L');
                $this->Cell(30,10,$data->taskDesignation,1,0,'L');
                $this->Cell(40,10,$data->taskDescription,1,0,'L');
                $this->Cell(20,10,$data->taskDuration,1,0,'L');
                $this->Cell(20,10,$data->taskStatus,1,0,'L');
                $this->Ln();
            }
        } */


    }

    $pdf = new myPDF();
    $pdf->AliasNbPages();
    $pdf->AddPage('L','A4',0);
    $pdf->headerTable();
    $pdf->viewTable();
    //$pdf->headerTable1();
    /* $pdf->viewTable1($bdd);
    $pdf->headerTable2();
    $pdf->viewTable2($bdd);
    $pdf->headerTable3();
    $pdf->viewTable3($bdd); */
    $pdf->Output();

?>


<!--     </body>
</html> -->