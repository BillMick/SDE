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
                    <strong style = "color : black;">  Access Degree</strong>
                </legend><hr style = "color : black;">
                <fieldset>
                    <label>
                        <input type = "tel" name = "registrationNumber" id = "registrationNumber" required/>
                        <div style = "height : max-content;" class = "label-text"><b>Staff Number</b></div>
                    </label><br>
                    <label for = "degree" style = "margin-top : 25px;">
                        <div class = "label-text"><b>Degree</b><br>
                            <select name = "degree" id = "degree" required>
                                <option value="3" selected>Default</option>
                                <option value="2">Administrator-level 1</option>
                                <option value="1">Administrator-level 2</option>
                                <option value="0">Root</option>
                            </select></div>
                    </label><br>
                    <center style = "margin-bottom : 10px;">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "web/dashboard.php">Cancel</a>
                        <button id = "up" class = "col-lg-offset-2 btn btn-primary" type = "submit">Set | <span class = "fa fa-check-square" style = "color : #4f4;"></span></button>
                    </center>
                </fieldset>
            </form>
        </center>



<!--         <center>
            <form method = "post" action = "#">
                <fieldset id = "fieldset3">
                <div style = "margin : 10px;">
                    <legend>
                        <span class = "fab fa-accessible-icon fa-2x" style = "color : black"></span>
                            <strong>  Access Degree Configuration</strong>
                    </legend>
                    <hr/>
                    <span id = "m_alert"></span>
                    <div style = "width : auto;">
                        <input class = "form-control" type = "tel" name = "registrationNumber" id = "registrationNumber" placeholder = "Enter employee staff number" required/>
                    </div>
                    <br/>
                    <label for="degree">Level :</label><br/>
                    <select class = "form-control" name="degree" id="degree" required>
                        <option value="3" selected>Default</option>
                        <option value="2">Administrator-level 1</option>
                        <option value="1">Administrator-level 2</option>
                        <option value="0">Root</option>
                    </select>
                    <hr/>
                    <center style = "margin-bottom : 10px;">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "web/dashboard.php">Cancel</a>
                        <button id = "up" class = "col-lg-offset-2 btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Set</button>
                    </center>
            </div>
                </fieldset>
            </form>
        </center> -->
        <?php
        try
        {
            if(isset($_POST['registrationNumber']) && isset($_POST['degree']))
            {
                $_POST['degree'] = strip_tags($_POST['degree']);
                $_POST['degree'] = (int)$_POST['degree'];
                $_POST['registrationNumber'] = strip_tags($_POST['registrationNumber']);
                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                $request = $bdd->prepare("UPDATE EmployeeProfile SET accessDegree = :accessDegree WHERE registrationNumber = :registrationNumber");
                $request->bindParam(':accessDegree',$_POST['degree']);
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