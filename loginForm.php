<?php session_start(); ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <link rel = "stylesheet" href = "loginForm1.css"> 
        <title>LoginFormTest</title>
        <?php include ("header.html");?>
    </head>
    <body>
        <center>
            <button class = "accordion">Section 1</button>
            <div class = "panel">Mens Molem Agitat ...</div>
            <button class = "accordion">Section 2</button>
            <div class = "panel">L'esprit donne vie à la matière</div>
            <button class = "accordion">Section 3</button>
            <div class = "panel">Lorem ipsum...un texte en vrai</div>
        </center>
<p></p>
    <center>
        <form style = " border-radius : 10px; background-color : black; width : max-content; min-width : 350px; height : max-content; min-height : 430px">
            <legend style = "margin-top : 10px; color : white;">Form Setting</legend><hr style = "color : white;">
            <fieldset>
                <label>
                    <input type="text" name = "name" id = "name" required/>
                    <div class = "label-text">Username</div>
                </label><br>
                <label>
                    <input type="email" name = "email" id = "email" required/>
                    <div class = "label-text">Email</div>
                </label><br>
                <label>
                    <input type="tel" name = "phone" id = "phone" required/>
                    <div class = "label-text">Phone Number</div>
                </label><br>
                <button type = "submit" value = "Submit">Submit</button>
            </fieldset>
        </form>
    </center>



<script>
    var acc =document.getElementsByClassName("accordion");
    var i;
    for(i=0;i<acc.length;i++)
    {
        acc[i].addEventListener("click", function()
        {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block")
            {
                panel.style.display = "none";
            }
            else
            {
                panel.style.display = "block";
            }
        });
    }
</script>

    </body>
</html>