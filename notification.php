<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <link rel = "stylesheet" href = "upgrade.css"> 
        <title>NotificationPage</title>
        <?php include ("header.html");?>
    </head>
    <body>
        <?php include "Functions.php"; ?>
        <center>
            <form method = "post" action = "#">
                <legend style = "margin-top : 10px; color : white;">
                    <span class = "fab fa-accessible-icon fa-2x" style = "color : black"></span>
                    <strong style = "color : black;">  Set Notification</strong>
                </legend><hr style = "color : black; margin-bottom : 20px;">
                <fieldset>
                    <label>
                        <input style = "border : none; font-size : 15px;" type = "text" name = "notificationText" id = "notificationText" required/>
                        <div style = "height : max-content;" class = "label-text"><b>Tape note here...</b></div>
                    </label><br>
                    <label for = "level" style = "margin-top : 50px;">
                        <div class = "label-text"><b>Level</b><br>
                            <select name = "level" id = "level" required>
                                <option value="Public" selected>Public</option>
                                <option value="Frozen">Frozen</option>
                                <option value="Private">Private</option>
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
            if(isset($_POST['notificationText']) && isset($_POST['level']))
            {
                $_POST['level'] = strip_tags($_POST['level']);
                $_POST['notificationText'] = strip_tags($_POST['notificationText']);
                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                $request = $bdd->prepare("INSERT INTO Notifications(insertionDate, notificationText, sender, notificationStatus)
                                                            VALUES(NOW(), :notificationText, :sender, :notificationStatus)");
                $request->bindParam(':notificationStatus',$_POST['level']);
                $request->bindParam(':sender',$_SESSION['staffNumber']);
                $request->bindParam(':notificationText',$_POST['notificationText']);
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