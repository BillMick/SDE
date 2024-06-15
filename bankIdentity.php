<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "SocialIdentity1.css"/>
        <link rel = "stylesheet" href = "upgrade.css"/>
        <?php require ("header.html");?>
        <title>
            SET BANK IDENTITY
        </title>
    </head>
    <body>

    <?php
        if(isset($_GET['modifyB']))
        { ?>
        <center style = "margin-bottom : 30px;">
            <form style = "padding : 5px;" method = "post" action = "#">
                <legend style = "margin-top : 10px; color : white;">
                    <span class = "fas fa-pen-alt fa-1x" style = "color : black"></span>
                    <strong style = "color : black;">  Bank Identity Modification</strong>
                </legend><hr style = "color : black; margin-bottom : 20px;">
                <span id = "m_message"></span>
                <fieldset>
                    <label>
                        <input style = "border : none; font-size : 25px; margin top : 20px;" type = "tel" name = "registrationNumber1" id = "registrationNumber1" required/>
                        <div style = "height : max-content; font-size : 15px" style = "height : max-content; font-size : 15px" class = "label-text"><b>Registration Number</b></div>
                    </label><br>
                    <center style = "margin-bottom : 10px;">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "web/dashboard.php">Cancel</a>
                        <button id = "modify" class = "col-lg-offset-2 btn btn-primary" type = "submit">Set | <span class = "fa fa-check-square" style = "color : #4f4;"></span></button>
                    </center>
                </fieldset>
            </form>
        </center>
        <?php } ?>
        <center>
            <form style = "float: right; margin-right : 200px;" method = "post" action = "#">
                <fieldset style = "margin-bottom : 20px; width : 500px;" id = "search">
                    <div style = "margin : 10px;">
                        <p>
                            <input class = "form-control" type = "tel" name = "search" id = "search" placeholder = "Enter identity document number" required/>
                        </p>
                        <center style = "margin-bottom : 10px;">
                            <button type = "reset" class = "col-lg-offset-3 btn btn-danger" href = "#">Clear</button>
                            <button id = "login" class = "col-lg-offset-2 btn btn-primary" type = "submit">Check out | <span class = "fas fa-check" style = "color : #4f4;"></span></button>
                        </center>
                    </div>
                    <span id = "staffNumber" style = "font-size : 25px; color : green;font-weight : bolder;"></span>
                </fieldset>
            </form>
        </center>
        <center>
            <form method = "post" action = "#">
                <fieldset id = "fieldset3" style = "border-radius : 12px;">
                    <div style = "margin : 10px;">
                        <legend>
                            <span class = "fas fa-money-check-alt" style = "color : black"></span>
                                <strong>  Bank identity</strong>
                        </legend>
                        <span id = "b_message"></span>
                        <p style = "width : auto;">
                            <input class = "form-control" type = "tel" name = "registrationNumber" id = "registrationNumber" placeholder = "Enter registration number" required/>
                        </p>
                        <p style = "width : auto;">
                            <select class = "form-control" name = "bank" id = "bank" required>
                                <option id = "uba" value = "UBA" selected>United Bank for Africa</option>
                                <option id = "ecobank" value = "Ecobank">ECOBANK</option>
                                <option id = "boa" value = "BOA">Bank of Africa</option>
                                <option id = "diamondBank" value = "Diamond Bank">Diamond Bank</option>
                            </select>
                        </p>
                        <p style = "width : auto;">
                            <input class = "form-control" type = "tel" name = "rib" id = "rib" placeholder = "Enter your bank account identification" required/>
                        </p>
                        <hr/>
                        <center style = "margin-bottom : 10px;">
                            <a class = "col-lg-offset-3 btn btn-danger" href = "web/dashboard.php">Cancel</a>
                            <button id = "login" class = "col-lg-offset-2 btn btn-primary" type = "submit">Save | <span class = "fas fa-check" style = "color : #4f4;"></span></button>
                        </center>
                    </div>
                </fieldset>
            </form>
        </center>
<?php
        if(isset($_POST['registrationNumber']) && isset($_POST['rib']))
            {
                $_POST['registrationNumber'] = strip_tags($_POST['registrationNumber']);
                $_POST['rib'] = strip_tags($_POST['rib']);
                $_POST['bank'] = strip_tags($_POST['bank']);

                try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                    $requete1 = $bdd->prepare("DELETE FROM BankIdentity WHERE registrationNumber = :registrationNumber");
                    $requete1->bindParam(':registrationNumber', $_POST['registrationNumber']);
                    $requete1->execute();
                    $requete = $bdd->prepare("INSERT INTO BankIdentity(registrationNumber, bankName, rib)
                                        VALUES( :registrationNumber, :bankName, :rib)");
                    $requete->bindParam(':registrationNumber',$_POST['registrationNumber']);
                    $requete->bindParam(':bankName',$_POST['bank']);
                    $requete->bindParam(':rib',$_POST['rib']);
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
            } ?>

            <?php
            if(isset($_POST['search']))
            {
                    $_POST['search'] = strip_tags($_POST['search']);

                try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                    $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE identityDocumentNumber = :identityDocumentNumber");
                    $request->bindParam(':identityDocumentNumber',$_POST['search']);
                    $request->execute();
                    $staffNumber = $request->fetch()?>
                        <!-- <script>
                            open("EmployeeProfile.php");
                        </script> -->
                    <script>
                        var search = document.getElementById('staffNumber');
                        search.textContent = "<?php echo $staffNumber['registrationNumber'] ?>";
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

                <?php        //modification
            if (isset($_POST['registrationNumber1']))
            {
                $_POST['registrationNumber1'] = strip_tags($_POST['registrationNumber1']);
                try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                    $requete = $bdd->prepare("SELECT * FROM BankIdentity WHERE registrationNumber = :registrationNumber");
                    $requete->bindParam(':registrationNumber',$_POST['registrationNumber1']);
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
                        $(function()
                        {
                            document.getElementById('registrationNumber').value = "<?php echo $reset['registrationNumber'] ?>";
                            document.getElementById('rib').value = "<?php echo $reset['rib'] ?>";
                            var fromDB = "<?php echo $reset['bankName'] ?>";
                            if(fromDB == 'UBA')
                            {
                                $("#uba").attr("selected", "selected");
                            }
                            else if(fromDB == 'BOA')
                            {
                                $("#boa").attr("selected", "selected");
                            }
                            else if(fromDB == 'Ecobank')
                            {
                                $("#ecobank").attr("selected", "selected");
                            }
                            else if(fromDB == 'Diamond Bank')
                            {
                                $("#diamondBank").attr("selected", "selected");
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