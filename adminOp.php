<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "SocialIdentity1.css"/>
        <?php require ("header.html");?>
        <title>
            ATTRIUATE TASKS
        </title>
    </head>
    <body>

<!-- Tasks generation -->
<center>
    <form id = "listTasks" method = "post" action = "ScreenPage.php">
        <fieldset id = "fieldset3" style = "width : 500px">
        <div>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <a class="navbar-brand" href="#"></a>
                <ul class="navbar-nav">
                <li style = "display : none;" class="nav-item"><button class="btn btn-danger" id = "closeL" style = "display : right;"><span class = "fas fa-times" style = "color : white"></span></button></li>
                </ul>
            </nav>
        </div>
        <div style = "margin : 10px;">
            <legend style = "text-align : center;">
                <span class = "fas fa-list" style = "color : black"></span>
                    <strong>  Assignment Task Box</strong>
            </legend>
            <hr>
                <p>
                    <input class = "form-control" type = "tel" name = "registrationNumberA" id = "registrationNumberA" placeholder = "Enter employee staff number..." autofocus required/>
                </p>
                <p>
                    <input class = "form-control" type = "text" name = "taskA" id = "taskA" placeholder = "Task designation..." autofocus required/>
                </p>
                <p>
                    <input class = "form-control" type = "time" name = "durationA" id = "durationA" placeholder = "Task duration...(in minutes)"/>
                </p>
                <p>
                    <input class = "form-control" type = "text" name = "taskDescriptionA" id = "taskDescriptionA" placeholder = "Task description..." />
                </p>
                <p>
                    <strong>Task status :</strong><br/>
                    <input type = "radio" name = "taskStatusA" value = "Set" id = "set" checked/>
                    <label for = "set">Set</label><br/>
                    <input type = "radio" name = "taskStatusA" value = "Frozen" id = "frozen"/>
                    <label for = "frozen">Frozen</label><br/>
                </p>
                <center style = "margin-bottom : 10px;">
                    <button class = "btn btn-secondary" type = "reset" name = "reset" id = reset>Clear</button>
                    <button class = "btn btn-primary" type = "submit" name = "confirm" id = confirm><span class = "fas fa-check" style = "color : #e2fcfb">
                    </span> Confirm task</button>
                </center>
        </div>
        </fieldset>
    </form>
</center>


        <footer>
            <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>