<?php
    session_start();
    include "Functions.php";
    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");

    //Proposer une tâche
    if(isset($_POST['task']) && isset($_POST['duration']))
    {
            $_POST['task'] = strip_tags($_POST['task']);
            $_POST['duration'] = strip_tags($_POST['duration']);
            $_POST['taskDescription'] = strip_tags($_POST['taskDescription']);

        try
        {
            $request = $bdd->prepare("INSERT INTO TasksProposed(PDate, PTime, registrationNumber, taskDesignation, taskDescription, taskDuration) 
                                VALUES(CURDATE(),CURTIME(), :registrationNumber, :taskDesignation, :taskDescription, :taskDuration)");
            $request->bindParam(':registrationNumber',$_SESSION['staffNumber']);
            $request->bindParam(':taskDesignation',$_POST['task']);
            $request->bindParam(':taskDescription',$_POST['taskDescription']);
            $request->bindParam(':taskDuration',$_POST['duration']);
            $request->execute();?>
            <script>
                alert("Sucessfully saved !");
            </script>
            <?php
            header("Location: workPage.php");
        }
        catch (PDOException $e)
        {?>
        <p style = "color : red;">Data insertion failed !</p>
        <?php
        echo ''.$e->getMessage();
        }
    }

    //Supprimer une tâche proposée
    if(isset($_GET["delete"]))
    {
        try
        {
            $d = "Deleted";
            $request = $bdd->prepare("UPDATE TasksProposed SET taskStatus = :taskStatus WHERE id = :id");
            $request->bindParam(':id',$_GET['delete']);
            $request->bindParam(':taskStatus',$d);
            $request->execute();?>
            <?php
            header("Location: workPage.php");
        }
        catch (PDOException $e)
        {?>
        <p style = "color : red;">Failure !</p>
        <?php
        echo ''.$e->getMessage();
        }
    }


/*     if(isset($_GET["beginA"]))
    {
        try
        {
            $number = 1;
            $request = $bdd->prepare("SELECT * FROM TasksAssigned WHERE id = :id");
            $request->bindParam(':id',$_GET['beginA']);
            $request->execute();
            $timerA = $request->fetch()?>
            <script>
                alert("Sucessfully set !");
                var b1 = document.getElementById("<?php echo $timerA['id']; ?>");
                var p1 = document.getElementById("<?php echo $number; ?>");

                var timeoutId;
                var intervalId;

                var h = "<?php $timerA['duration']; ?>";
                alert(h);
                var dec = 0;
                var sec = 0;
                var min = 0;
                var heu = 0;
                p1.textContent = heu + ':' + min + ':' + sec + ':' + dec;
                b1.addEventListener('click', timer);

                function timer()
                {
                    intervalId = setInterval(function(){
                        p1.textContent = heu + ':' + min + ':' + sec + ':' + dec;
                        dec += 1;
                        if(dec >= 10)
                        {
                            dec = 0;
                            sec += 1;
                        }
                        if(sec >= 60)
                        {
                            sec = 0;
                            min += 1;
                        }
                        if(min >= 60)
                        {
                            min = 0;
                            heu += 1;
                        }
                    }, 100)
                }
            </script>
            <?php
            header("Location: workPage.php");
        }
        catch (PDOException $e)
        {?>
        <p style = "color : red;">Data insertion failed !</p>
        <?php
        echo ''.$e->getMessage();
        }
    } */

    //Attribuer une tâche
    if(isset($_POST['taskA']) && isset($_POST['durationA']) && isset($_POST['registrationNumberA']))
    {
            $_POST['taskA'] = strip_tags($_POST['taskA']);
            $_POST['durationA'] = strip_tags($_POST['durationA']);
            $_POST['taskDescriptionA'] = strip_tags($_POST['taskDescriptionA']);
            $_POST['registrationNumberA'] = strip_tags($_POST['registrationNumberA']);
            $_POST['taskStatusA'] = strip_tags($_POST['taskStatusA']);

        try
        {
            $request = $bdd->prepare("INSERT INTO TasksAssigned(ADate, ATime, adminRegistrationNumber, registrationNumber, taskDesignation, taskDescription, taskDuration, taskStatus) 
                                VALUES(CURDATE(),CURTIME(), :adminRegistrationNumber, :registrationNumber, :taskDesignation, :taskDescription, :taskDuration, :taskStatus)");
            $request->bindParam(':adminRegistrationNumber',$_SESSION['staffNumber']);
            $request->bindParam(':registrationNumber',$_POST['registrationNumberA']);
            $request->bindParam(':taskDesignation',$_POST['taskA']);
            $request->bindParam(':taskDescription',$_POST['taskDescriptionA']);
            $request->bindParam(':taskDuration',$_POST['durationA']);
            $request->bindParam(':taskStatus',$_POST['taskStatusA']);
            $request->execute();?>
            <script>
                alert("Task sucessfully assigned !");
            </script>
            <?php
            header("Location: adminOp.php");
        }
        catch (PDOException $e)
        {?>
        <p style = "color : red;">Data insertion failed !</p>
        <?php
        echo ''.$e->getMessage();
        }
    }


    //Modifier mot de passe
    if(isset($_POST['lastPassword']) && isset($_POST['newPassword']))
    {
        $_POST['lastPassword'] = strip_tags($_POST['lastPassword']);
        $_POST['lastPassword'] = Encryption($_POST['lastPassword']);
        $_POST['newPassword'] = strip_tags($_POST['newPassword']);
        $_POST['newPassword'] = Encryption($_POST['newPassword']);

        try
        {
            $f = 0;
            $_SESSION['pass'] = $_POST['newPassword'];
            $requete = $bdd->prepare("UPDATE EmployeeProfile SET psword = :psword, firstConnexion = :firstConnexion WHERE registrationNumber = :registrationNumber AND psword = :lastpsword");
            $requete->bindParam(':registrationNumber',$_SESSION['staffNumber']);
            $requete->bindParam(':lastpsword', $_POST['lastPassword']);
            $requete->bindParam(':psword',$_POST['newPassword']);
            $requete->bindParam(':firstConnexion',$f);
            $requete->execute();?>
            <p style = "color : green;">Data safely updated !</p>
            <script>
                alert("Sucessfully updated !")
            </script>
            <?php
            $requete->closeCursor();
            header("Location: workPage.php");
        }
        catch (PDOException $e)
        { ?>
            <p style = "color : red;">Data insertion failed !</p>
          <?php
            echo ''.$e->getMessage();
        }
    }

    //Send message to someone
    if(isset($_POST['note']))
    {
        $_POST['note'] = strip_tags($_POST['note']);
        $_POST['receiverStaffNumber'] = strip_tags($_POST['receiverStaffNumber']);
        if ($_POST['receiverStaffNumber'] != "")
        {
            $receiver = $_POST['receiverStaffNumber'];
        }
        else
        {
            $receiver = $_SESSION['staffNumber'];
        }
        try
        {
            $requete = $bdd->prepare("INSERT INTO Notepad(insertionDate, sender, receiver, note)
                                        VALUES(NOW(), :sender, :receiver, :note)");
            $requete->bindParam(':sender',$_SESSION['staffNumber']);
            $requete->bindParam(':receiver', $receiver);
            $requete->bindParam(':note',$_POST['note']);
            $requete->execute();?>
            <p style = "color : green;">Data safely updated !</p>
            <script>
                alert("Sucessfully updated !")
            </script>
            <?php
            $requete->closeCursor();
            header("Location: workPage.php");
        }
        catch (PDOException $e)
        { ?>
            <p style = "color : red;">Data insertion failed !</p>
          <?php
            echo ''.$e->getMessage();
        }
    }

    //delete a note
    if(isset($_GET["deleteNote"]))
    {
        try
        {
            $request = $bdd->prepare("DELETE FROM Notepad WHERE id = :id");
            $request->bindParam(':id',$_GET['deleteNote']);
            $request->execute();?>
                        <script>
                document.getElementById("myNotes").style.display = "block";
            </script>
            <?php
            header("Location: workPage.php");?>
        <?php   
        }
        catch (PDOException $e)
        { ?>
        <p style = "color : red;">Data insertion failed !</p>
        <?php
        echo ''.$e->getMessage();
        }
    }

    //Abort a task
    if(isset($_GET["abort"]))
    {
        try
        {
            $request = $bdd->prepare("SELECT * FROM TasksProposed WHERE id = :id");
            $request->bindParam(':id',$_GET['abort']);
            $request->execute();
            $a = $request->fetch();
            if($a)
            {
                $d = "Stopped";
                $request = $bdd->prepare("UPDATE TasksProposed SET taskStatus = :taskStatus WHERE id = :id");
                $request->bindParam(':id',$a['id']);
                $request->bindParam(':taskStatus',$d);
                $request->execute(); 
            }
            else
            {
                $d = "Stopped";
                $request = $bdd->prepare("UPDATE TasksAssigned SET taskStatus = :taskStatus WHERE id = :id");
                $request->bindParam(':id',$_GET['abort']);
                $request->bindParam(':taskStatus',$d);
                $request->execute();
            } ?>
            <?php
            header("Location: workPage.php");
        }
        catch (PDOException $e)
        {?>
        <p style = "color : red;">Failure !</p>
        <?php
        echo ''.$e->getMessage();
        }
    }

    //Begin now a task
/*     if(isset($_GET["now"]))
    {
        try
        {
            $d = date('H:i:s');
            $request = $bdd->prepare("SELECT * FROM TasksProposed WHERE id = :id");
            $request->bindParam(':id',$_GET['now']);
            $request->execute();
            $a = $request->fetch();
            if($a)
            {
                $request1 = $bdd->prepare("UPDATE TasksProposed SET beginningTime = :beginningTime WHERE id = :id");
                $request1->bindParam(':id',$a['id']);
                $request1->bindParam(':beginningTime',$d);
                $request1->execute(); 
            }
            else
            {
                $request2 = $bdd->prepare("UPDATE TasksAssigned SET beginningTime = :beginningTime WHERE id = :id");
                $request2->bindParam(':id',$_GET['abort']);
                $request2->bindParam(':beginningTime',$d);
                $request2->execute();
            } ?>
            <?php
            header("Location: workPage.php");
        }
        catch (PDOException $e)
        {?>
        <p style = "color : red;">Failure !</p>
        <?php
        echo ''.$e->getMessage();
        }
    } */
?>