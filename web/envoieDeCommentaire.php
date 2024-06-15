<?php
// Partie connexion à la BDD et initialisation/*  */
$mysqli = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
$contenu = '';
//---------------------------------------------------------------------------------------------
// Partie enregistrement
if($_POST)
{
    $_POST['pseudo'] = addslashes($_POST['pseudo']);
    $_POST['message'] = addslashes($_POST['message']);
    if(!empty($_POST['pseudo']) && !empty($_POST['message']))
    {
        $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())") OR DIE ($mysqli->error);
        $contenu .= '';
    }
    else
    {
        $contenu .= '<div class="erreur">Afin de déposer un commentaire, veuillez svp remplir tous les champs du formulaire.</div>';
    }
}
//---------------------------------------------------------------------------------------------
// Partie affichage des commentaires
$resultat = $mysqli->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");    
$contenu .= '<h2>'  . $resultat->num_rows . ' commentaire(s)';
while($commentaire = $resultat->fetch_assoc())
{
    $contenu .= '<div class="message">';
        $contenu .= '<div class="titre">Par: ' . $commentaire['pseudo'] . ', le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</div>';
        $contenu .= '<div class="contenu">' . $commentaire['message'] . '</div>';
    $contenu .= '</div>';
}
//---------------------------------------------------------------------------------------------
// Partie formulaire d'envoi de commentaire
?>
 
<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="envoie.css">
    </head>
    <body>
        <div class="commentaire"><?php echo $contenu; ?></div>
        <form method="post" action="" style = "display : block;">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" maxlength="20" pattern="[a-zA-Z0-9.-_]+" 
            title="caractère autorisés : a-zA-Z0-9.-_"><br/>
            <br/>
            <label for="message">Comment</label><br>
            <textarea id="message" name="message" cols="40" rows="10"></textarea><br>
             
            <input class="send" type="submit" value="Post comment">
        </form>
        
    </body>   
</html>
