<?php
session_start();

function StaffNumberGeneration($r)
{
    $a = " ";
    if($r == "Accounting")
    {
        $a = "109";
    }
    else if($r == "Sales")
    {
        $a = "108";
    }
    else if($r == "Marketing And Communication")
    {
        $a = "107";
    }
    else if($r == "Financial Officer")
    {
        $a = "106";
    }
    else if($r == "Industrial And Production")
    {
        $a = "105";
    }
    else if($r == "Human Resources")
    {
        $a = "104";
    }
    else if($r == "Procuring")
    {
        $a = "103";
    }
    else if($r == "Legal And Tax")
    {
        $a = "102";
    }
    else if($r == "Performance And Operational Research")
    {
        $a = "100";
    }
    else if($r == "Informatics")
    {
        $a = "101";
    }
    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
    $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE department = :department");
    $request->bindParam(':department',$r);
    $request->execute();
    $b = 0;
    while($request->fetch())
    {
        $b = $b+1;
    }
    $b = "$b";
    $a = ''.$a.''.$b;
    $a = (int) $a;
    return $a;
}

function Encryption($pass)
{
    $list = "azertyuiopqsdfghjklmwxcvbn-0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZéèà ç@&*+/_?.!:;,=";
    $listLength = strlen($list);
    $passLength = strlen($pass);
    $digit = 3;
    $i = 0;
    while($i < $passLength)
    {
        $j = 0;
        while ( $j < ($listLength-$digit) )
        {
            if( $pass[$i] == $list[$j] )
            {
                $pass[$i] = $list[$j+$digit];
                break;
            }
            $j++;
        }
    $i++;
    }
    return $pass;
}

function Salary()
{
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
    $impt = 0;
    $impb = 0;
    $impm = 0;
    while (1)
    {
        if (1)
        {
            $impt = 0;
            $impb = 50000;
            $impm = $impm + $impt*$impb;
            if ($sb >= 0 && $sb <= 50000)
            {
                break;
            }
        }
        
        if (1)
        {
            $impt = 0.1;
            if($sb >= 50001 && $sb <= 130000)
            {
                $impb = $sb;
                $impm = $impm + $impt*$impb;
                break;
            }
            else
            {
                $impb = 130000;
                $impm = $impm + $impt*$impb;
            }
    
        }
        if (1)
        {
            $impt = 0.15;
            if($sb >= 130001 && $sb <= 280000)
            {
                $impb = $sb;
                $impm = $impm + $impt*$impb;
                break;
            }
            else
            {
                $impb = 280000;
                $impm = $impm + $impt*$impb;
            }
        }
        if (1)
        {
            $impt = 0.2;
            if($sb >= 280001 && $sb <= 530000)
            {
                $impb = $sb;
                $impm = $impm + $impt*$impb;
                break;
            }
            else
            {
                $impb = 530000;
                $impm = $impm + $impt*$impb;
            }
        }
        if (1)
        {
            $impt = 0.25;
            $impb = $sb;
            $impm = $impm + $impt*$impb;
            break;
        }
    }

    $salaireFinal = $prime + $indemnitesGrade + $indemnitesPrestations + $avantages + (1 - $cnss - $risk - $allocationVieillesse - $prestationFamiliale - $chargesPatronales)*$sb;
    //Fiche de paie
    echo $salaireFinal;
    include "salaryPDF.php";

}
?>


