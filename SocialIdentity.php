<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head><!-- 
        <link rel = "stylesheet" href = "SocialIdentity1.css"/> -->
        <link rel="stylesheet" href="socialModification.css"/>
        <?php require ("header.html");?>
        <title>
            SET SOCIAL IDENTITY
        </title>
    </head>
    <body>
    <!-- Commentaires -->
        <!-- Mettre ici des images de publicité pour la banque... -->
        <!--<p>Veuillez remplir ce formulaire :</p>-->
        <?php
        if(isset($_GET['modify']))
        { ?>
        <center>
            <form method = "post" action = "#">
                <legend style = "margin-top : 10px; color : white;">
                    <span class = "fas fa-pen-alt fa-1x" style = "color : black"></span>
                    <strong style = "color : black;">  Social Identity Modification</strong>
                </legend><hr style = "color : black; margin-bottom : 20px;">
                <span id = "m_message"></span>
                <fieldset>
                    <label>
                        <input style = "border : none; font-size : 25px; margin top : 20px;" type = "tel" name = "registrationNumber" id = "registrationNumber" required/>
                        <div style = "height : max-content; font-size : 15px" style = "height : max-content; font-size : 15px" class = "label-text"><b>Registration Number</b></div>
                    </label><br>
                    <center style = "margin-bottom : 10px;">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "workPage.php">Cancel</a>
                        <button id = "modify" class = "col-lg-offset-2 btn btn-primary" type = "submit">Set | <span class = "fa fa-check-square" style = "color : #4f4;"></span></button>
                    </center>
                </fieldset>
            </form>
        </center>
        
        <?php
        }
        ?>

        <center class = "formback">
            <form class = "col-lg-offset-3-col-lg-6" method = "post" action = "#">
                <fieldset id = "fieldset3" style = "margin-left : 10px; margin-right : 10px; margin-top : 20px;">
                    <legend style = "margin-top : 10px; margin-bottom : 10px;"><span class = "fas fa-user fa-2x"></span><strong>  Social Identity Form</strong> </legend>
                    <label for = "firstname">
                        <input style = "border : none; font-size : 15px;" type = "text" name = "firstname" id = "firstname"required/>
                        <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Firstname</b></div>
                    </label><hr style = "color : black; ">
                    <label for = "surname">
                        <input style = "border : none; font-size : 15px;" type = "text" name = "surname" id = "surname" required/>
                        <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Surname</b></div>
                    </label><hr style = "color : black; ">

                        <strong>Gender :</strong><br/>
                        <input type = "radio" name = "gender" value = "Woman" id = "woman" required/>
                        <label for = "woman">Woman</label><br/>
                        <input type = "radio" name = "gender" value = "Man" id = "man"/>
                        <label for = "man">Man</label><br/>
                        <input type = "radio" name = "gender" value = "No binary" id = "noBinary"/>
                        <label for = "noBinary">No binary</label><hr style = "color : black; ">

                        <label for = "mail">
                            <input style = "border : none; font-size : 15px;" type = "email" name = "mail" id = "mail" required/>
                            <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Mail</b></div>
                        </label><hr style = "color : black; ">

                        <label for = "phoneNumber">
                            <input style = "border : none; font-size : 15px;" type = "tel" name = "phoneNumber" id = "phoneNumber" required/> <!--J'avais enlevé l'attribut name-->
                            <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Phone Number</b></div>
                        </label><hr style = "color : black; ">
    
                        <label for = "birthdate">
                            <input style = "border : none; font-size : 15px;" type = "date" name = "birthdate" id = "birthdate" required/> <!--J'ai enlev l'attribut name-->
                            <div><b>Birthdate</b></div>
                        </label><hr style = "color : black; ">

                        <strong>Identity Document :</strong><br/>
                        <input type = "radio" name = "identityDocument" value = "ID Card" id = "idCard" required/>
                        <label for = "id">ID Card</label><br/>
                        <input type = "radio" name = "identityDocument" value = "Passport" id = "passport"/>
                        <label for = "passport">Passport</label><br/>
                        <input type = "radio" name = "identityDocument" value = "Biometric Card" id = "biometricCard"/>
                        <label for = "biometric">Biometric Card</label><hr style = "color : black; ">

                        <label for = "identityDocumentNumber">
                            <input style = "border : none; font-size : 15px;" type = "tel" name = "identityDocumentNumber" id = "identityDocumentNumber" required/>
                            <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Identity Document Number</b></div>
                        </label><hr style = "color : black; ">

                        <label for="country">Country :</label><br />
                        <select style = "border : none; font-size : 15px;" name="country" id="country" selected required>
                            <optgroup label = "Africa">
                                <option id = "benin" value="Benin" selected>Benin</option>
                                <option id = "ghana" value="Ghana">Ghana</option>
                                <option id = "southAfrica" value="South Africa">South Africa</option>
                            </optgroup>
                        </select><hr style = "color : black; ">
                    
                        <label for = "residence">
                            <input style = "border : none; font-size : 15px;" type = "text" name = "residence" id = "residence" required/>
                            <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Residence</b></div>
                        </label><hr style = "color : black; ">

                        <strong>Marital status :</strong><br/>
                        <input type = "radio" name = "maritalStatus" value = "Unmarried" id = "unmarried" checked/>
                        <label for = "unmarried">Unmarried</label><br/>
                        <input type = "radio" name = "maritalStatus" value = "Married" id = "married"/>
                        <label for = "married">Married</label><br/>
                        <input type = "radio" name = "maritalStatus" value = "Divorced" id = "divorced"/>
                        <label for = "divorced">Divorced</label><hr style = "color : black; ">

                        <label for = "numberOfChildren">
                            <input style = "border : none; font-size : 15px;" type = "tel" name = "numberOfChildren" id = "numberOfChildren" placeholder = "none"/>
                            <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Number of children</b></div>
                        </label><hr style = "color : black; ">

                            <!--                     <p>
                        <strong>Working or want this job for a religious order ?</strong><br/>
                        <input type = "radio" name = "memberOfReligiousOrder" value = "no" id = "no" checked/>
                        <label for = "no">No</label><br/>
                        <input type = "radio" name = "memberOfReligiousOrder" value = "yes" id = "yes"/>
                        <label for = "yes">Yes</label><br/>
                    </p> -->
                        <button class = "btn btn-outline-dark" type="file" name="photo" id = photo><span class = "fas fa-image" style = "color : #000">
                        </span> Add photo</button><hr style = "color : black; ">

                    <fieldset style = "display : block;">
                        <legend> <strong>Parent to contact in alternative case</strong> </legend>

                            <label for = "parentName">
                                <input style = "border : none; font-size : 15px;" type = "text" name = "parentName" id = "parentName" placeholder = "Hercule Poirot" required/>
                                <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Name</b></div>
                            </label><hr style = "color : black; ">

                            <label for = "parentPhoneNumber">
                                <input style = "border : none; font-size : 15px;" type = "tel" name = "parentPhoneNumber" id = "parentPhone" placeholder = "0029994827460"/>
                                <div style = "height : max-content; font-size : 15px" class = "label-text"><b>Phone number</b></div>
                            </label><hr style = "color : black;">

                    </fieldset>
                    <center style = "margin-bottom: 15px;">
                        <a class = "btn btn-danger" href = "web/dashboard.php"></span>Cancel</a>
                        <button class = "btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Set form</button>
                    </center>
                </fieldset>
            </form>
        </center>


            <?php
            //enregistrement d'une personne
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

                try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                    $requete2 = $bdd->prepare("DELETE FROM SocialIdentity WHERE identityDocumentNumber = :identityDocumentNumber");
                    $requete2->bindParam(':identityDocumentNumber',$_POST['identityDocumentNumber']);
                    $requete2->execute();
                    $requete = $bdd->prepare("INSERT INTO SocialIdentity(insertionDate, firstname, surname, gender, birthdate, identityDocument,
                                        identityDocumentNumber, country, residence, phoneNumber, email, photo, maritalStatus, numberOfChildren, parentName, parentPhoneNumber) 
                                        VALUES(NOW(), :firstname, :surname, :gender, :birthdate, :identityDocument, :identityDocumentNumber, :country,
                                        :residence, :phoneNumber, :email, :photo, :maritalStatus, :numberOfChildren, :parentName, :parentPhoneNumber)");
                    $requete->bindParam(':firstname',$_POST['firstname']);
                    $requete->bindParam(':surname',$_POST['surname']);
                    $requete->bindParam(':gender',$_POST['gender']);
                    $requete->bindParam(':birthdate',$_POST['birthdate']);
                    $requete->bindParam(':identityDocument',$_POST['identityDocument']);
                    $requete->bindParam(':identityDocumentNumber',$_POST['identityDocumentNumber']);
                    $requete->bindParam(':country',$_POST['country']);
                    $requete->bindParam(':residence',$_POST['residence']);
                    $requete->bindParam(':phoneNumber',$_POST['phoneNumber']);
                    $requete->bindParam(':email',$_POST['mail']);
                    $requete->bindParam(':photo',$_POST['photo']);
                    $requete->bindParam(':maritalStatus',$_POST['maritalStatus']);
                    $requete->bindParam(':numberOfChildren',$_POST['numberOfChildren']);
                    $requete->bindParam(':parentName',$_POST['parentName']);
                    $requete->bindParam(':parentPhoneNumber',$_POST['parentPhoneNumber']);
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


            //modification
            if (isset($_POST['registrationNumber']))
            {
                $_POST['registrationNumber'] = strip_tags($_POST['registrationNumber']);
                try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                    $requete = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :registrationNumber");
                    $requete->bindParam(':registrationNumber',$_POST['registrationNumber']);
                    $requete->execute();
                    $identity = $requete->fetch();
                    $requete1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :identityDocumentNumber");
                    $requete1->bindParam(':identityDocumentNumber',$identity['identityDocumentNumber']);
                    $requete1->execute();
                    $reset = $requete1->fetch();
                    ?>
                    <script>
                        document.getElementById('firstname').value = "<?php echo $reset['firstname'] ?>";
                        document.getElementById('surname').value = "<?php echo $reset['surname'] ?>";
                            <?php 
                            if ($reset['gender'] == 'Woman')
                            { ?>
                                document.getElementById('woman').setAttribute("checked","checked");
                        <?php    }
                            else if ($reset['gender'] == 'Man')
                            { ?>
                                document.getElementById('man').setAttribute("checked","checked");
                        <?php    }
                            else
                            { ?>
                                document.getElementById('noBinary').setAttribute("checked","checked");
                        <?php    }
                            
                            if ($reset['identityDocument'] == 'ID Card')
                            { ?>
                                document.getElementById('idCard').setAttribute("checked","checked");
                        <?php    }
                            else if ($reset['identityDocument'] == 'Passport')
                            { ?>
                                document.getElementById('passport').setAttribute("checked","checked");
                        <?php    }
                            else
                            { ?>
                                document.getElementById('biometricCard').setAttribute("checked","checked");
                        <?php    }
                            if ($reset['maritalStatus'] == 'Unmarried')
                            { ?>
                                document.getElementById('unmarried').setAttribute("checked","checked");
                        <?php    }
                            else if ($reset['maritalStatus'] == 'Married')
                            { ?>
                                document.getElementById('married').setAttribute("checked","checked");
                        <?php    }
                            else
                            { ?>
                                document.getElementById('divorced').setAttribute("checked","checked");
                        <?php    }
                        if ($reset['country'] == 'Benin')
                            { ?>
                                document.getElementById('benin').setAttribute("selected","selected");
                        <?php    }
                            else if ($reset['country'] == 'Ghana')
                            { ?>
                                document.getElementById('ghana').setAttribute("selected","selected");
                        <?php    }
                            else
                            { ?>
                                document.getElementById('southAfrica').setAttribute("selected","selected");
                        <?php    } ?>
                        document.getElementById('identityDocumentNumber').value = "<?php echo $reset['identityDocumentNumber'] ?>";
                        document.getElementById('country').value = "<?php echo $reset['country'] ?>";
                        document.getElementById('residence').value = "<?php echo $reset['residence'] ?>";
                        document.getElementById('phoneNumber').value = "<?php echo $reset['phoneNumber'] ?>";
                        document.getElementById('mail').value = "<?php echo $reset['email'] ?>";
                        document.getElementById('numberOfChildren').value = "<?php echo $reset['numberOfChildren'] ?>";
                        document.getElementById('parentName').value = "<?php echo $reset['parentName'] ?>";
                        document.getElementById('parentPhone').value = "<?php echo $reset['parentPhoneNumber'] ?>";
                        //on va remplir les cases
                    </script>


                    <script>
                        $(function()
                        {
                            var fromDB = "<?php echo $reset['country'] ?>";
                            if(fromDB == 'Benin')
                            {
                                $("#benin").attr("selected", "selected");
                            }
                            else if(fromDB == 'Ghana')
                            {
                                $("#ghana").attr("selected", "selected");
                            }
                            else
                            {
                                $("#southAfrica").attr("selected", "selected");
                            }
                        });
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