<?php
    //Fonction de reconnaissance d'identité lors d'une connexion à son compte
    //étant recueillis le matricule et le mot de passe dans un premier temps
    $staffNumber = "0000";
    $pass = "password";
    $pass = Encryption($pass);
    try
    {
        $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
        $requete = $bdd->prepare("SELECT staffNumber FROM Staff WHERE staffNumber = :staffNumber AND pass = :pass");
        $requete->bindParam(':staffNumber',$staffNumber);
        $requete->bindParam(':pass',$pass);
        $requete->execute();
        $result = $requete->fetch();
        if (!$result)
        {
            echo 'Access denied !';//On pourrait utiliser un element html pour mettre des couleurs.
        }
        else
        {
            session_start();
            $_SESSION['id'] = $staffNumber;
            $_SESSION['pass'] = $pass;
            //Afficher un message pour confirmation par pass vocal en remplaçant le tableau d'affichage par
            //les outils pour la synthèse vocale...avec JS
            //Colorer éventuellement la div en vert ou en rouge si succès ou échec de connexion
            echo "Now identify your vocal pass.";
        }

        
        ?>
        <p style = "color : green;">Vocal pass setting !<br/>Read the display sentence:<br/>
        echo $sentence</p>
        <script>
            
        </script>
        <?php
    }
    catch (PDOException $e)
    {?>
        <p style = "color : red;">Connexion failed !</p>
        <?php
        echo ''.$e->getMessage();
    } 



?>