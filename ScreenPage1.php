<?php
session_start();
$bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");

//Confirmer une tâche proposée faite A REVOIR
    if(isset($_GET["done"]))
    {
        try
        {
            $d1 = "Done";
            $request = $bdd->prepare("UPDATE TasksProposed SET taskStatus = :taskStatus WHERE id = :id");
            $request->bindParam(':id',$_GET['done']);
            $request->bindParam(':taskStatus', $d1);/* 
            $request->bindParam(':ending',CURTIME()); */
            $request->execute();?>
            <script>
                alert("Done !");
            </script>
            <?php
            header("Location: workPage.php");
        }
        catch (PDOException $e)
        {?>
        <script>alert("Server unavailable. Retry later !");</script>
        <?php
        /* echo ''.$e->getMessage(); */
        }
    }

    //Confirmer une tâche assignée faite A REVOIR
    if(isset($_GET["doneA"]))
    {
        try
        {
            $d = "Done";/* 
            $date = date("H:i:s"); *//* 
            echo $date; */
            $request = $bdd->prepare("UPDATE TasksAssigned SET taskStatus = :taskStatus WHERE id = :id");
            $request->bindParam(':id',$_GET['doneA']);
            $request->bindParam(':taskStatus',$d);/* 
            $request->bindParam(':adtime',$date); */
            $request->execute();?>
            <script>
                alert("Done !");
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

    ?>