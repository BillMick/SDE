<?php
 if (isset($_POST['submit']))
 {
    //  $to = $_POST['name'];
    //  $subject = ;
     $message = $_POST;
    //  $from = "myname@gmail.com";
    //  $headers = "From:" .$_POST['email'];

     if (mail($to, $subject, $message, $headers))
     {
         echo "Mail sent.";
     }
     else 
     {
         echo "Failed";
     }
 }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" href="Texte.css"> 
        <title>Formulaire</title>
    </head>
    <body>
        <form class="tableau">
            <div class="ligne">
                <h3 class="Stitre">Comment</h3>
            </div>
             <div class="ligne">
                <textarea id="zone"  rows="6" cols="30" placeholder="Add text"></textarea>
             </div>  
             <div class="ligne">
                <button class = "button" class = "cancel">Cancel</button>
                <button name = "submit" class = "button" type="submit">Send</button>
             </div>
        </form>
    </body>
    <!-- <script src="Texte.js"></script> -->
</html>