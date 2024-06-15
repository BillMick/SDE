<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <link rel = "stylesheet" href = "upgrade.css"> 
        <title>UpgradePage</title>
        <?php include ("header.html");?>
    </head>
    <body>
        <?php include "Functions.php"; ?>
        <center>
            <form method = "post" action = "#">
                <legend style = "margin-top : 10px; color : white;">
                    <span class = "fab fa-accessible-icon fa-2x" style = "color : black"></span>
                    <strong style = "color : black;">  Work Status Modification</strong>
                </legend><hr style = "color : black;">
                <fieldset>
                    <label>
                        <input type = "tel" name = "registrationNumber" id = "registrationNumber" required/>
                        <div style = "height : max-content;" class = "label-text"><b>Staff Number</b></div>
                    </label><br>
                    <label for = "degree" style = "margin-top : 25px;">
                        <div class = "label-text"><b>WorkStatus</b><br>
                            <select name = "status" id = "status" required>
                                <option value="available" selected>Available</option>
                                <option value="unavailable">Unavailable</option>
                                <option value="frozen">Frozen</option>
                                <option value="dismiss">Dismiss</option>
                            </select></div>
                    </label><br>
                    <center style = "margin-bottom : 10px;">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "web/dashboard.php">Cancel</a>
                        <button id = "up" class = "col-lg-offset-2 btn btn-primary" type = "submit">Set | <span class = "fa fa-check-square" style = "color : #4f4;"></span></button>
                    </center>
                </fieldset>
            </form>
        </center>


        <?php
        try
        {
            if(isset($_POST['registrationNumber']) && isset($_POST['status']))
            {
                $_POST['status'] = strip_tags($_POST['status']);
                $_POST['registrationNumber'] = strip_tags($_POST['registrationNumber']);
                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                $request = $bdd->prepare("UPDATE EmployeeProfile SET workStatus = :workStatus WHERE registrationNumber = :registrationNumber");
                $request->bindParam(':workStatus',$_POST['status']);
                $request->bindParam(':registrationNumber',$_POST['registrationNumber']);
                $request->execute();?>
                <?php 
/*                 header("Location: web/dashboard.php"); */
            }
        }
        catch (PDOException $e)
        {?>
            <p style = "color : red;">Data insertion failed !</p>
            <?php
            echo ''.$e->getMessage();
        } ?>
 <!-- Message pour les cases vides. -->
        <footer>
                <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>