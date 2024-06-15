<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "EmployeeProfile1.css"/>
        <link rel = "stylesheet" href = "upgrade.css"/>
        <?php include ("header.html");?>
        <title>
            SET EMPLOYEE PROFILE
        </title>
    </head>
    <body class="ime">

    <?php
        if(isset($_GET['modifyP']))
        { ?>
        <center style = "margin-bottom : 30px;">
            <form style = "padding : 5px;" method = "post" action = "#">
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
    <?php
        if(isset($_POST['department']) && isset($_POST['job']) && isset($_POST['identityDocumentNumber']) && isset($_POST['grade']) && isset($_POST['hiringDate']) && isset($_POST['status']))
        {
            $_POST['department'] = strip_tags($_POST['department']);
            $_POST['job'] = strip_tags($_POST['job']);
            $_POST['grade'] = strip_tags($_POST['grade']);
            $_POST['hiringDate'] = strip_tags($_POST['hiringDate']);
            $_POST['status'] = strip_tags($_POST['status']);
            $_POST['identityDocumentNumber'] = strip_tags($_POST['identityDocumentNumber']);

            try
            {
                $c = "Voice";
                $d = 3;
                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                $requete2 = $bdd->prepare("DELETE FROM EmployeeProfile WHERE identityDocumentNumber = :identityDocumentNumber");
                $requete2->bindParam(':identityDocumentNumber',$_POST['identityDocumentNumber']);
                $requete2->execute();
                $requete1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :identityDocumentNumber");
                $requete1->bindParam(':identityDocumentNumber',$_POST['identityDocumentNumber']);
                $requete1->execute();
                $result = $requete1->fetch();
                include "Functions.php";
                $number = StaffNumberGeneration($_POST['department']);
                echo $number;
                if(!$result)
                {
                    echo "Disabled data !";
                }
                $r = Encryption($result['birthdate']);
                $requete = $bdd->prepare("INSERT INTO EmployeeProfile(identityDocumentNumber, registrationNumber, registrationDate, hiringDate, department, grade, post,
                                    psword, accessDegree, vocalPass, workStatus)
                                    VALUES(:identityDocumentNumber, :registrationNumber, NOW(), :hiringDate, :department, :grade, :post, 
                                    :psword, :accessDegree, :vocalPass, :workStatus)");
                $requete->bindParam(':identityDocumentNumber',$_POST['identityDocumentNumber']);
                $requete->bindParam(':registrationNumber',$number);
                $requete->bindParam(':department',$_POST['department']);
                $requete->bindParam(':post',$_POST['job']);
                $requete->bindParam(':grade',$_POST['grade']);
                $requete->bindParam(':hiringDate',$_POST['hiringDate']);
                $requete->bindParam(':workStatus',$_POST['status']);
                $requete->bindParam(':accessDegree',$d);
                $requete->bindParam(':vocalPass',$c);
                $requete->bindParam(':psword',$r);
                $requete->execute();
                include ("EmployeeMailer.php");
                ?>
                <p style = "color : green;">Data safely inserted !</p>
                <script>
                    //open("mailer.php",true)
                    /* alert("Employee Profile successfully set !"); */
                    open("bankIdentity.php");
                </script>

                    <?php
            }
            catch (PDOException $e)
            { ?>
                <p style = "color : red;">Data insertion failed !</p>
                <?php
                echo ''.$e->getMessage();
            }
        }
            ?>
    <center>
        <div class = "formback">
            <form method = "post" action = "#">
                <fieldset id = "fieldset3">
                    <div style = "margin-left : 10px; margin-right : 10px;">
                        <legend>
                            <span class = "fas fa-user-tie fa-3x"></span><strong>  Employee Profile Setting</strong>
                        </legend>
                        <span id = "e_message"></span>
                            <p>
                                <label for = "identityDocumentNumber">Identity Document Number :</label><br/>
                                <input class = "form-control" type = "tel" name = "identityDocumentNumber" id = "identityDocumentNumber" placeholder = "Enter employee identity document number..." required/> <!--J'ai enlev l'attribut name-->
                            </p>
                            <p>
                                <label for = "department">Department :</label><br/>
                                <select class = "form-control" name="department" id="department" required>
                                    <option id = "accounting" value = "Accounting">Accounting Department</option>
                                    <option id = "sales" value = "Sales">Sales Department</option>
                                    <option id = "marketingAndCommunication" value = "Marketing And Communication">Marketing and Communication Department</option>
                                    <option id = "financialOfficer" value = "Financial Officer">Financial Officer</option>
                                    <option id = "industrialAndProduction" value = "Industrial And Production">Industrial and Production Service</option>
                                    <option id = "humanResources" value = "Human Resources">Human Resources Department</option>    
                                    <option id = "procuring" value = "Procuring">Procuring Department</option>
                                    <option id = "legalAndTax" value = "Legal And Tax">Legal and Tax Department</option>
                                    <option id = "informatics" value = "Informatics">IT Department</option>
                                    <option id = "performanceAndRO" value = "Performance And Operational Research">Performance and Operational Research Department</option>
                                </select>
                            </p>
                            <p>
                                <label for = "job">Post :</label><br/>
                                <input class = "form-control" type = "text" name = "job" id = "job" placeholder = "Accountant" required/> <!--J'ai enlev l'attribut name-->
                            </p>
                            <p>
                                <label for = "grade">Grade :</label><br/>
                                <select class = "form-control" name = "grade" id = "grade" required>
                                    <option id = "worker" value = "Worker">Worker</option>
                                    <option id = "bachelorDegree" value = "Bachelor Degree">Bachelor Degree</option>
                                    <option id = "technician" value = "Technician">Technician</option>
                                    <option id = "seniorTechnician" value = "Senior Technician">Senior technician</option>
                                    <option id = "masterDegree" value = "Master Degree">Master Degree</option>
                                    <option id = "engineer" value = "Engineer">Engineer</option>
                                    <option id = "doctorDegree" value = "Doctor Degree">Doctor Degree</option>
                                </select><!-- On devrait avoir pour chaque département une liste de poste-->
                            </p><!-- 
                            <p>
                                <label for = "schedule">Monthly Schedule in hours:</label><br/>
                                <input class = "form-control" type = "tel" name = "schedule" id = "schedule" placeholder = "250" required/>
                            </p> -->
                            <p>
                                <label for = "hiringDate">Hiring date :</label><br/>
                                <input class = "form-control" type = "date" name = "hiringDate" id = "hiringDate" required/> <!--J'ai enlev l'attribut name-->
                            </p>
                            <p>
                                <label for="status">Status :</label><br />
                                <select class = "form-control" name="status" id="status" required>
                                    <option id = "available" value = "available">Available</option>
                                    <option id = "unavailable" value = "unavailbale">Unavailable</option>
                                    <option id = "dismiss" value = "dismiss">Dismiss</option>
                                </select>
                            </p>
                        <center style = "margin-bottom: 15px;">
                            <button class = "btn btn-danger col-lg-offset-3" type = "reset"></span>Reset all</button>
                            <button class = "btn btn-primary" type = "submit" id = "setEmployee"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Hire</button>
                        </center>
                    </div>
                </fieldset>
            </form>
        </div>
    </center>
<script>
/*     var ok = document.getElementById("ok");
    ok.document.addEventListener('click',fok);
    function fok()
    {
        open("SocialIdentity.php");
    } */
</script>


    <?php        //modification
            if (isset($_POST['registrationNumber']))
            {
                $_POST['registrationNumber'] = strip_tags($_POST['registrationNumber']);
                try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                    $requete = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :registrationNumber");
                    $requete->bindParam(':registrationNumber',$_POST['registrationNumber']);
                    $requete->execute();
                    $reset = $requete->fetch();
                    /* $requete2 = $bdd->prepare("DELETE FROM SocialIdentity WHERE identityDocumentNumber = :identityDocumentNumber");
                    $requete2->bindParam(':identityDocumentNumber', $identity['identityDocumentNumber']);
                    $requete2->execute();
                    $requete1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :identityDocumentNumber");
                    $requete1->bindParam(':identityDocumentNumber',$identity['identityDocumentNumber']);
                    $requete1->execute();
                    $reset = $requete1->fetch();*/
                    ?>
                    <script>
                        document.getElementById('identityDocumentNumber').value = "<?php echo $reset['identityDocumentNumber'] ?>";
                        document.getElementById('job').value = "<?php echo $reset['post'] ?>";
                        //on va remplir les cases
                    </script>

                    <script>
                        $(function()
                        {
                            var fromDB = "<?php echo $reset['grade'] ?>";
                            if(fromDB == 'Worker')
                            {
                                $("#worker").attr("selected", "selected");
                            }
                            else if(fromDB == 'Technician')
                            {
                                $("#technician").attr("selected", "selected");
                            }
                            else if(fromDB == 'Senior Technician')
                            {
                                $("#seniorTechnician").attr("selected", "selected");
                            }else if(fromDB == 'Engineer')
                            {
                                $("#engineer").attr("selected", "selected");
                            }else if(fromDB == 'Master Degree')
                            {
                                $("#masterDegree").attr("selected", "selected");
                            }else if(fromDB == 'Doctor Degree')
                            {
                                $("#doctorDegree").attr("selected", "selected");
                            }
                            else if(fromDB == 'Bachelor Degree')
                            {
                                $("#bachelorDegree").attr("selected", "selected");
                            }
                        });
                    </script>

                    <script>
                        $(function()
                        {
                            var fromDB = "<?php echo $reset['workStatus'] ?>";
                            if(fromDB == 'Available')
                            {
                                $("#available").attr("selected", "selected");
                            }
                            else if(fromDB == 'Unavailable')
                            {
                                $("#unavailable").attr("selected", "selected");
                            }
                            else
                            {
                                $("#dismiss").attr("selected", "selected");
                            }
                        });
                    </script>

<script>
                        $(function()
                        {
                            var fromDB = "<?php echo $reset['department'] ?>";
                            if(fromDB == 'Accounting')
                            {
                                $("#worker").attr("selected", "selected");
                            }
                            else if(fromDB == 'Sales')
                            {
                                $("#sales").attr("selected", "selected");
                            }
                            else if(fromDB == 'Marketing And Communication')
                            {
                                $("#marketingAndCommunication").attr("selected", "selected");
                            }else if(fromDB == 'Financial Officer')
                            {
                                $("#financialOfficer").attr("selected", "selected");
                            }else if(fromDB == 'Industrial And Production')
                            {
                                $("#industrialAndProduction").attr("selected", "selected");
                            }else if(fromDB == 'Human Resources')
                            {
                                $("#humanResources").attr("selected", "selected");
                            }
                            else if(fromDB == 'Procuring')
                            {
                                $("#procuring").attr("selected", "selected");
                            }
                            else if(fromDB == 'Legal And Tax')
                            {
                                $("#legalAndTax").attr("selected", "selected");
                            }
                            else if(fromDB == 'Informatics')
                            {
                                $("#informatics").attr("selected", "selected");
                            }
                            else if(fromDB == 'Performance And Operational Research')
                            {
                                $("#performanceAndRO").attr("selected", "selected");
                            }
                            else if(fromDB == 'Accounting')
                            {
                                $("#accounting").attr("selected", "selected");
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