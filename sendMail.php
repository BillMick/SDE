<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "SocialIdentity1.css"/>
        <?php require ("header.html");?>
        <title>
            SET BANK IDENTITY
        </title>
    </head>
    <body>

        <center>
            <form style = "float: right; margin-right : 200px;" method = "post" action = "#">
                <fieldset style = "margin-bottom : 20px; width : 500px;" id = "searchbox">
                    <div style = "margin : 10px;">
                        <p>
                            <input class = "form-control" type = "tel" name = "search" id = "search" placeholder = "Enter identity document number" required/>
                        </p>
                        <center style = "margin-bottom : 10px;">
                            <button type = "reset" class = "col-lg-offset-3 btn btn-danger">Clear</button>
                            <button id = "login" class = "col-lg-offset-2 btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Log in</button>
                        </center>
                    </div>
                    <span id = "staffNumber" style = "font-size : 20px; color : green;"></span>
                </fieldset>
            </form>
        </center>
        <center>
            <form method = "post" action = "#">
                <fieldset id = "fieldset3">
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
                                <option value = "uba" selected>United Bank for Africa</option>
                                <option value = "ecobank">ECOBANK</option>
                                <option value = "boa">Bank of Africa</option>
                                <option value = "diamondBank">Diamond Bank</option>
                            </select>
                        </p>
                        <p style = "width : auto;">
                            <input class = "form-control" type = "tel" name = "rib" id = "rib" placeholder = "Enter your bank account identification" required/>
                        </p>
                        <hr/>
                        <center style = "margin-bottom : 10px;">
                            <button class = "col-lg-offset-3 btn btn-danger" type = "reset">Clear form</a>
                            <button id = "login" class = "col-lg-offset-2 btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Log in</button>
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
                    ?>
                    <div>
                        <div style = "text-align : justify; margin-left : 600px;"><h3>Vérification des données</h3>
                            <?php
                            foreach ($_POST as $key => $value)
                            {
                                printf("<strong>%s</strong>   :   %s", $key,$value);?>
                                <br/>
                                <?php
                            }?>
                        </div>
                        <center style = "margin-top : 10px;"><button class = "btn btn-primary" id = "ok"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Continue</button></center>
                    </div>
                    <script>
                        var ok = document.getElementById("ok");
                        ok.document.addEventListener("onclick",fok);
                        function fok()
                        {
                            history.back();
                        }
                    </script>
                    <?php
                    try
                {
                    $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                    $requete = $bdd->prepare("INSERT INTO BankIdentity(registrationNumber, bankName, rib)
                                        VALUES( :registrationNumber, :bankName, :rib)");
                    $requete->bindParam(':registrationNumber',$_POST['registrationNumber']);
                    $requete->bindParam(':bankName',$_POST['bankName']);
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

        <footer>
            <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>