<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "SocialIdentity1.css"/>
        <?php require ("header.html");?>
        <title>
            JoinUs Form
        </title>
    </head>
    <body>
    <!-- Commentaires -->
        <!-- Mettre ici des images de publicité pour la banque... -->
        <!--<p>Veuillez remplir ce formulaire :</p>-->
        <?php

        ?>
        <div class = "formback">
            <form class = "col-lg-offset-3-col-lg-6" method = "post" action = "JoinUsScreenPage.php" enctype = "multipart/form-data">
                <fieldset id = fieldset3>
                <div style = "margin-left : 10px; margin-right : 10px;">
                <legend><span class = "fab fa-phoenix-framework fa-3x"></span><strong>  Join Us</strong> </legend>
                    <hr/>
                    <p>
                        <label for = "firstname">Firstname :</label><br/>
                        <input class = "form-control" type = "text" name = "firstname" id = "firstname" placeholder = "Elsie" autofocus required/> <!--J'ai enlev l'attribut name-->
                    </p>
                    <p>
                        <label for = "surname">Surname :</label><br/>
                        <input class = "form-control" type = "text" name = "surname" id = "surname" placeholder = "DAGA" required/> <!--J'ai enlev l'attribut name-->
                    </p>
                    <p>
                        <strong>Gender :</strong><br/>
                        <input type = "radio" name = "gender" value = "Woman" id = "woman" checked required/>
                        <label for = "woman">Woman</label><br/>
                        <input type = "radio" name = "gender" value = "Man" id = "man"/>
                        <label for = "man">Man</label><br/>
                        <input type = "radio" name = "gender" value = "No binary" id = "noBinary"/>
                        <label for = "noBinary">No binary</label><br/>
                    </p>
                    <p>
                        <label for = "mail">Mail :</label><br/>
                        <input class = "form-control" type = "email" name = "mail" id = "mail" placeholder = "elsie@gmail.com" required/> <!--J'ai enlev l'attribut name-->
                    </p>
                    <p>
                        <label for = "phoneNumber">Phone number :</label><br/>
                        <input class = "form-control" type = "tel" name = "phoneNumber" id = "phoneNumber" placeholder = "0022994613817"/> <!--J'avais enlevé l'attribut name-->
                    </p>
                    <p>
                        <label for = "birthdate">Birthdate :</label><br/>
                        <input class = "form-control" type = "date" name = "birthdate" id = "birthdate" required/>
                    </p>
                    <p>
                        <label for = "residence">Residence :</label><br/>
                        <input class = "form-control" type = "text" name = "residence" id = "residence" placeholder = "Bénin Cotonou M/DAGA Lot 246" required/> <!--J'ai enlev l'attribut name-->
                    </p>
                    <hr/>
                    <p>
                        <label for="cv"> <span class = "fas fa-file-pdf fa-2x"></span>  Add my CV</label>
                        <input class = "form-control" type = "file" name = "myCV" id = "myCV" required/>
                    </p>
                    <center style = "margin-bottom: 15px;">
                        <a class = "btn btn-danger" href = "web/site.php"></span>Cancel</a>
                        <button class = "btn btn-primary" type = "submit">Set form | <span class = "fa fa-check-square" style = "color : #4f4;"></span></button>
                    </center>
                </fieldset>

                </div>

            </form>
        </div>
            <?php



            if(isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['gender']) && isset($_POST['phoneNumber']) && isset($_POST['birthdate']) && isset($_POST['identityDocument']) && isset($_POST['identityDocumentNumber']) && isset($_POST['parentName']) && isset($_POST['parentPhoneNumber']) && isset($_POST['country']) && isset($_POST['residence']))
            {
                    $_POST['firstname'] = strip_tags($_POST['firstname']);
                    $_POST['surname'] = strip_tags($_POST['surname']);
                    $_POST['mail'] = strip_tags($_POST['mail']);
                    $_POST['gender'] = strip_tags($_POST['gender']);
                    $_POST['phoneNumber'] = strip_tags($_POST['phoneNumber']);
                    $_POST['birthdate'] = strip_tags($_POST['birthdate']);
                    $_POST['identityDocument'] = strip_tags($_POST['identityDocument']);
                    $_POST['identityDocumentNumber'] = strip_tags($_POST['identityDocumentNumber']);
                    $_POST['country'] = strip_tags($_POST['country']);
                    $_POST['residence'] = strip_tags($_POST['residence']);
                    $_POST['maritalStatus'] = strip_tags($_POST['maritalStatus']);
                    $_POST['numberOfChildren'] = strip_tags($_POST['numberOfChildren']);
                    $_POST['parentName'] = strip_tags($_POST['parentName']);
                    $_POST['parentPhoneNumber'] = strip_tags($_POST['parentPhoneNumber']);
                    ?>
<!--                     <div>
                        <div style = "text-align : justify; margin-left : 600px;"><h3>Vérification des données</h3>
                            <?php
                            /* foreach ($_POST as $key => $value)
                            {
                                printf("<strong>%s</strong>   :   %s", $key,$value);
                            } */?>
                        </div>
                        <center style = "margin-top : 10px;"><button class = "btn btn-primary" id = "ok"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Continue</button></center>
                    </div> -->
                    <script>
                        /* var ok = document.getElementById("ok");
                        ok.document.addEventListener("onclick",fok);
                        function fok()
                        {
                            history.back();
                        } */
                    </script>
                    <?php
                    try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                    $requete = $bdd->prepare("INSERT INTO Guest(insertionDate, firstname, surname, birthdate, identityDocument,
                                        identityDocumentNumber, residence, phoneNumber, email, photo, maritalStatus, numberOfChildren, parentName, parentPhoneNumber) 
                                        VALUES(NOW(), :firstname, :surname, :birthdate, :identityDocument, :identityDocumentNumber, 
                                        :residence, :phoneNumber, :email, :photo, :maritalStatus, :numberOfChildren, :parentName, :parentPhoneNumber)");
                    $requete->bindParam(':firstname',$_POST['firstname']);
                    $requete->bindParam(':surname',$_POST['surname']);
                    $requete->bindParam(':birthdate',$_POST['birthdate']);
                    $requete->bindParam(':residence',$_POST['residence']);
                    $requete->bindParam(':phoneNumber',$_POST['phoneNumber']);
                    $requete->bindParam(':email',$_POST['mail']);
                    $requete->execute();?>
                    <p style = "color : green;">Data safely inserted !</p>
                    <script>
                        alert("Sucessfully saved !")
                    </script>
                    <?php
                }
                catch (PDOException $e)
                {?>
                <p style = "color : red;">Data insertion failed !</p>
                <?php
                echo ''.$e->getMessage();
                }
            }
                ?>
        <footer>
            <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>