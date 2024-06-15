<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <link rel = "stylesheet" href = "lock12.css"> 
        <link rel = "stylesheet" href = "workPage1.css">
        <link rel = "stylesheet" href = "upgrade.css">
        <title>DashLockPage</title>
        <?php include ("header.html");?>
    </head>
    <body class="">
    <!-- <body class="imo"> -->
        <?php include "Functions.php"; ?>
        <center>
            <form method = "post" action = "#">
                <legend style = "margin-top : 10px; color : white;">
                    <span class = "fas fa-shield-alt fa-2x" style = "color : black"></span>
                    <strong style = "color : black;">  Sudo su</strong>
                </legend><hr style = "color : black; margin-bottom : 20px;">
                <span id = "m_message"></span>
                <fieldset class="">
                <!-- <fieldset class="ima"> -->
                    <label>
                        <input style = "border : none; font-size : 25px;" type = "password" name = "pass" id = "pass" required/>
                        <div style = "height : max-content;" class = "label-text"><b>Your password</b></div><br>
                    </label><br>
                    <center style = "margin-bottom : 10px;">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "workPage.php">Cancel</a>
                        <button id = "up" class = "col-lg-offset-2 btn btn-primary" type = "submit">Set | <span class = "fa fa-check-square" style = "color : #4f4;"></span></button>
                    </center>
                </fieldset>
            </form>
        </center>
        <?php
            if(isset($_POST['pass']))
            {
                $_POST['pass'] = strip_tags($_POST['pass']);
                $_POST['pass'] = Encryption($_POST['pass']);
                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :registrationNumber");
                $request->bindParam(':registrationNumber',$_SESSION['staffNumber']);
                $request->execute();
                $result = $request->fetch();
                if($result['psword'] != $_POST['pass'])
                { ?>
                    <script>
                        var no_m = document.getElementById('m_message');
                        no_m.style.color = 'red';
                        no_m.textContent = "You're not authorized !";
                    </script>
                    <?php
                }
                else
                {
                    ?>
                    <script>
                        open("web/dashboard-1.php", true);
                    </script>
                    <?php 
                }
            } ?>
            <script src = "FormControl.js"></script>

        <footer>
                <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>