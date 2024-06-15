<!DOCTYPE html>
<html>
    <head>
        <meta charset = "utf-8"/>
        <?php include ("header.html");?>
        <title>
            DB Operations
        </title>
    </head>
    <body>
        <h1>Ceci n'est qu'une page de recours pour des opérations 
        et tests sur ma base de données</h1>
        <?php
        try
        {
            /*$bdd = new PDO("mysql:host=localhost","root","");
            $requete = $bdd->prepare("CREATE DATABASE EDLProject");
            $requete->execute();*/

             $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
/*            $requete1 = $bdd->prepare("CREATE TABLE SocialIdentity(
                insertionDate DATETIME NOT NULL,
                firstname VARCHAR(30) NOT NULL,
                surname VARCHAR(30) NOT NULL,
                birthdate DATE NOT NULL,
                document VARCHAR(15) NOT NULL,
                documentNumber INT UNSIGNED NOT NULL,
                residence TEXT NOT NULL,
                phoneNumber INT UNSIGNED NOT NULL,
                email VARCHAR(30) NOT NULL,
                photo TEXT,
                parentName VARCHAR(35) NOT NULL,
                parentPhoneNumber INT UNSIGNED NOT NULL)
                ");
            $requete1->execute(); */

/*             $requete2 = $bdd->prepare("DELETE FROM TasksProposed");
            $requete2->execute(); */
/*             $requete1 = $bdd->prepare("CREATE TABLE BankANDDoc(
                registrationNumber INT,
                identityDocumentNumber INT)
                ");
            $requete1->execute(); */
                /*Tété Kpégo Laurelle*/
/*             $requete3 = $bdd->prepare("CREATE TABLE TasksProposed(
                PDate DATETIME NOT NULL,
                registrationNumber INT UNSIGNED NOT NULL,
                taskDesignation TEXT NOT NULL,
                taskDescription TEXT,
                taskDuration TIME NOT NULL)
                ");
            $requete3->execute();*/
/*            PDate, registrationNumber, taskDesignation, taskDescription, TaskDuration*/
/*                 $requete4 = $bdd->prepare("CREATE TABLE Guest(
                    insertionDate DATETIME NOT NULL,
                    firstname VARCHAR(30) NOT NULL,
                    surname VARCHAR(30) NOT NULL,
                    gender VARCHAR(10) NOT NULL,
                    birthdate  DATE NOT NULL,
                    residence TEXT NOT NULL,
                    phoneNumber INT UNSIGNED NOT NULL,
                    email TEXT NOT NULL,
                    cv VARCHAR(20) NULL)
                    ");
                    $requete4->execute(); */
                    /* $requete4 = $bdd->prepare("CREATE TABLE BaseSalary(
                        grade INT UNSIGNED NOT NULL,
                        baseSalary INT UNSIGNED NOT NULL)
                        ");
                        $requete4->execute();

                        $requete4 = $bdd->prepare("CREATE TABLE PostAdvantages(
                            post VARCHAR(40) NOT NULL,
                            advantages INT UNSIGNED NOT NULL)
                            ");
                            $requete4->execute();
                            $requete4 = $bdd->prepare("CREATE TABLE GradeIndemnity(
                                grade VARCHAR(40) NOT NULL,
                                indemnity INT UNSIGNED NOT NULL)
                                ");
                                $requete4->execute();
                                $requete4 = $bdd->prepare("CREATE TABLE PrestationsIndemnity(
                                    registrationNumber INT UNSIGNED NOT NULL,
                                    indemnity INT UNSIGNED NOT NULL,
                                    indemnityStatus INT UNSIGNED NOT NULL DEFAULT 1,
                                    reason TEXT NOT NULL)
                                    ");
                                    $requete4->execute(); */

                      /*               $requete4 = $bdd->prepare("CREATE TABLE Retrenchments(
                                        grade VARCHAR(40) NOT NULL,
                                        cnss INT UNSIGNED NOT NULL,
                                        risk INT UNSIGNED NOT NULL,
                                        allocationVieillesse INT UNSIGNED NOT NULL DEFAULT 1,
                                        familyPrestation INT UNSIGNED NOT NULL)
                                        ");
                                        $requete4->execute();
                                        $requete4 = $bdd->prepare("CREATE TABLE Arrivals(
                                            today DATE NOT NULL,
                                            registrationNumber INT UNSIGNED NOT NULL,
                                            arrivalTime TIME NOT NULL,
                                            leavingTime TIME)
                                            ");
                                            $requete4->execute(); */
                                            $requete4 = $bdd->prepare("CREATE TABLE LatelyComing(
                                                today DATE NOT NULL,
                                                registrationNumber INT UNSIGNED NOT NULL,
                                                note VARCHAR(40) NOT NULL DEFAULT 'You are late to your post.')
                                                ");
                                                $requete4->execute();

/*             $requete4 = $bdd->prepare("CREATE TABLE TasksAssigned(
                ADate DATE NOT NULL,
                ATime TIME NOT NULL,
                adminRegistrationNumber INT UNSIGNED NOT NULL,
                registrationNumber INT UNSIGNED NOT NULL,
                taskDesignation TEXT NOT NULL,
                taskDescription  TEXT NOT NULL,
                takDuration TIME NOT NULL,
                taskStatus TEXT NOT NULL)
                ");
            $requete4->execute(); */
            /*insertionDate, firstname, surname, gender, birthdate, residence, phoneNumber, email, cv
            $request = $bdd->prepare("INSERT INTO TasksAssigned taskDesignation, taskDescription, taskDuration, taskStatus)

            $requete5 = $bdd->prepare("CREATE TABLE Track(
                actionDate DATETIME NOT NULL,
                registrationNumber INT UNSIGNED NOT NULL,
                operation VARCHAR(30) NOT NULL)
                ");
            $requete5->execute();

            $requete6 = $bdd->prepare("CREATE TABLE HiringDate(
                HiringDate DATETIME NOT NULL,
                registrationNumber INT UNSIGNED NOT NULL,
                operation VARCHAR(30) NOT NULL)
                ");
            $requete6->execute();

            $requete7 = $bdd->prepare("CREATE TABLE Temporary(
                registrationDate DATETIME NOT NULL,
                registNum INT UNSIGNED NOT NULL,
                psword VARCHAR(15) NOT NULL)
                ");
            $requete7->execute();

            $requete8 = $bdd->prepare("CREATE TABLE Prime(
                registrationDate DATETIME NOT NULL,
                prime INT UNSIGNED NOT NULL,
                reason VARCHAR(15) NOT NULL)
                ");
            $requete8->execute();

            $requete9 = $bdd->prepare("CREATE TABLE Request(
                requestDate DATETIME NOT NULL,
                registrationNumber INT UNSIGNED NOT NULL,
                requestPeriod TEXT NOT NULL)
                ");
            $requete9->execute();

            $requete10 = $bdd->prepare("CREATE TABLE Justification(
                jutificationDate DATETIME NOT NULL,
                registrationNumber INT UNSIGNED NOT NULL,
                justificationType VARCHAR(15) NOT NULL,
                proof VARCHAR(100) NOT NULL,
                actionDate DATE NOT NULL)
                ");
            $requete10->execute();

            $requete11 = $bdd->prepare("CREATE TABLE WorkReport(
                workReportDate DATETIME NOT NULL,
                registrationNumber INT UNSIGNED NOT NULL,
                assignment VARCHAR(40) NOT NULL,
                assignmentDate DATETIME NOT NULL,
                details TEXT NOT NULL,
                achievement VARCHAR(10) DEFAULT 'Succeeded')
                ");
            $requete11->execute();

            $requete12 = $bdd->prepare("CREATE TABLE Inspection(
                inspecDate DATE NOT NULL,
                registrationNumber INT UNSIGNED NOT NULL,
                arrivalHour TIME NOT NULL,
                leavingHour TIME NOT NULL,
                surplus INT UNSIGNED NOT NULL)
                ");
            $requete12->execute();

            $requete13 = $bdd->prepare("CREATE TABLE Departments(
                departmentName DATE NOT NULL,
                numberOfPost INT UNSIGNED NOT NULL,
                grade VARCHAR(20) NOT NULL,
                schedule INT UNSIGNED NOT NULL,
                salary FLOAT UNSIGNED NOT NULL)
                ");
            $requete13->execute(); */

                echo "Requêtes acceptées et exécutées !";
        }
        catch (PDOException $e)
        {
            echo 'Problème d\'exécution de la requête: ' .$e->getMessage();
        }
        ?>
        <footer>
            <?php include ("footer.html");?>
        </footer>
    </body>
</html>