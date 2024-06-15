<?php
    if(isset($_POST['firstname']) && isset($_POST['surname']) && isset($_POST['mail']) && isset($_POST['gender']) && isset($_POST['phoneNumber']) && isset($_POST['birthdate']) && isset($_POST['residence']))
    {
        $_POST['firstname'] = strip_tags($_POST['firstname']);
        $_POST['surname'] = strip_tags($_POST['surname']);
        $_POST['gender'] = strip_tags($_POST['gender']);
        $_POST['mail'] = strip_tags($_POST['mail']);
        $_POST['phoneNumber'] = strip_tags($_POST['phoneNumber']);
        $_POST['birthdate'] = strip_tags($_POST['birthdate']);
        $_POST['residence'] = strip_tags($_POST['residence']);
        //Valider l'upload du fichier
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            if(isset($_FILES['myCV']) && $_FILES['myCV']['error'] == 0)
            {
                $allowed = array("pdf" => "allCV/pdf");//à revoir
                $filename = $_FILES['myCV']['name'];
                $filetype = $_FILES['myCV']['type'];
                $filesize = $_FILES['myCV']['size'];

                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed))
                {
                    die("File extension not agreed .");
                }

                if(in_array($filetype, $allowed))
                {
                    if(file_exists("allCV/".$_FILES['']['name']))
                    {
                        echo $_FILES['myCV']['name']."already exists.";
                    }
                    else
                    {
                        move_uploaded_file($_FILES['myCV']['tmp_name'], "allCV/".$_FILES['myCV']['name']); ?>
                        <script>
                            alert("File successfully loaded !");
                        </script>
            <?php   }
                }
            }
        }
        try
        {
            $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
            $requete = $bdd->prepare("INSERT INTO Guest(insertionDate, firstname, surname, gender, birthdate, residence, phoneNumber, email, cv)
                                VALUES(NOW(), :firstname, :surname, :gender, :birthdate, :residence, :phoneNumber, :email, :cv)");
            $requete->bindParam(':firstname',$_POST['firstname']);
            $requete->bindParam(':surname',$_POST['surname']);
            $requete->bindParam(':gender',$_POST['gender']);
            $requete->bindParam(':birthdate',$_POST['birthdate']);
            $requete->bindParam(':residence',$_POST['residence']);
            $requete->bindParam(':phoneNumber',$_POST['phoneNumber']);
            $requete->bindParam(':email',$_POST['mail']);
            $requete->bindParam(':cv',$_FILES['myCV']['name']);
            $requete->execute();?>
            <script>
                alert("Sucessfully saved ! We will probably contact you.");
            </script>
            <?php
            header("Location: web/site.php");
        }
        catch (PDOException $e)
        {?>
        <script>alert("Server unavailable. Retry later.")</script>
        <?php
        /* echo ''.$e->getMessage(); */
        }
    }

?>