<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="Tasks.css"> 
        <title>Tasks</title>
        <?php include ("header.html");?>
    </head>
    <body>
        <!-- Tasks generation -->
        <center>
            <form id = "">
                <fieldset id = "task">
                    <legend style = "text-align : center;">
                        <span class = "fas fa-list" style = "color : black"></span>
                            <strong>  List Tasks</strong>
                    </legend>
                    <hr>
                        <p>
                            <input class = "form-control" type = "text" name = "task" id = "taskN" placeholder = "Task designation..." autofocus required/>
                        </p>
                        <p>
                            <input class = "form-control" type = "tel" name = "duration" id = "duration" placeholder = "Task duration"/>
                        </p>

                        <p>
                            <input class = "form-control" type = "text" name = "taskDescription" id = "taskDescription" placeholder = "Task description..." />
                        </p>
                        <center style = "margin-bottom : 10px">
                            <button class = "btn btn-primary" type = "submit" name = "confirm" id = confirm><span class = "fas fa-check" style = "color : #e2fcfb">
                            </span> Confirm task</button>
                        </center>
                </fieldset>
            </form>
        </center>
                
        <script src="script.js"></script>

        <footer>
                <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>