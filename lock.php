<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <link rel = "stylesheet" href = "workPage1.css"> 
        <link rel = "stylesheet" href = "lock12.css"> 
        <title>LockPage</title>
        <?php include ("header.html");?>
    </head>
    <body>
        <?php include "Functions.php"; ?>
            <center>
                <form method = "post" action = "#">
                    <fieldset id = "fieldset3">
                    <div class="" style = "margin : 10px;">
                        <legend>
                            <span class = "fas fa-lock" style = "color : black"></span>
                                <strong>  Access Verification</strong>
                        </legend>
                        <span id = "m_message"></span>
                        <div style = "width : auto;">
                            <input class = "form-control" type = "tel" name = "staffNumber" id = "staffNumber" placeholder = "Enter your staff number" required/>
                        </div>
                        <br/>
                        <div style = "width : auto;">
                            <input class = "form-control" type = "password" name = "pass" id = "pass" placeholder = "Enter your password" required/>
                            <span id = "pass_m"></span>
                        </div>
                        <hr/>
                        <center style = "margin-bottom : 10px;">
                            <a class = "col-lg-offset-3 btn btn-danger" href = "#">Cancel</a>
                            <button id = "login" class = "col-lg-offset-2 btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Log in</button>
                        </center>
                </div>
                    </fieldset>
                </form>
            </center>
        <?php
            if(isset($_POST['staffNumber']) && isset($_POST['pass']))
            {
                $_POST['pass'] = strip_tags($_POST['pass']);
                $_POST['staffNumber'] = strip_tags($_POST['staffNumber']);
                $_POST['pass'] = Encryption($_POST['pass']);
                print_r($_POST);
                try{
                    $bdd = new PDO("mysql:host=127.0.0.1;dbname=EDLProject","root","");
                    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    echo 'Connexion réussie';
                }
                catch(PDOException $e){
                  echo "Erreur : " . $e->getMessage();
                }
                $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :registrationNumber");
                $request->bindParam(':registrationNumber',$_POST['staffNumber']);
                $request->execute();
                $result = $request->fetch();
                if($result['psword'] != $_POST['pass'] || $result['workStatus'] != "available")
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
                    $_SESSION['staffNumber'] = $_POST['staffNumber'];
                    $_SESSION['pass'] = $_POST['pass'];
                    $_SESSION['post'] = $result['post'];
                    $_SESSION['grade'] = $result['grade'];
                    $_SESSION['department'] = $result['department'];//ajouter ici les données pour le view profile
                    $request1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :identityDocumentNumber");
                    $request1->bindParam(':identityDocumentNumber',$result['identityDocumentNumber']);
                    $request1->execute();
                    $result1 = $request1->fetch();
                    $_SESSION['name'] = $result1['firstname'].' '.$result1['surname'];
                    $request = $bdd->prepare("SELECT * FROM BankIdentity WHERE registrationNumber = :registrationNumber");
                    $request->bindParam(':registrationNumber',$_POST['staffNumber']);
                    $request->execute();
                    $result = $request->fetch();
                    $_SESSION['rib'] = $result['rib'];
                    $_SESSION['bankName'] = $result['bankName'];


                    ?>
                    <script>
                        window.open("workPage.php");
                        close();
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