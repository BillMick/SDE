<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="AccessAutorisation.css"> 
        <title>Home</title>
        <?php include ("header.html");?>
    </head>
    <body>
        <form>
            <fieldset id = "fieldset3" style = "border : solid; height : 490px">
                <legend>
                    <span class = "fas fa-pen-alt fa-1x" style = "color : black"></span>
                        <strong>  Notepad</strong>
                </legend>
                <div>
                    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                        <a class="navbar-brand" href="#"></a>
                        <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="#"><span class = "fas fa-redo-alt" style = "color : white"></a></li>
                        <li class="nav-item"><a class="nav-link" ><span class = "fas fa-save" style = "color : white"></span></a></li>
                        <li class="nav-item"><a class="nav-link" href="#"><span class = "fas fa-list" style = "color : white"></span></a></li>
                        <li class="nav-item"><a id = "close" style = "margin-left : 130px;" class="nav-link" href="#"><span class = "fas fa-times" style = "color : white"></span></a></li>
                        </ul>
                    </nav>
                </div>
                <hr>
                <div style = "width : auto;">
                    <textarea style = "border : none;" class = "form-control" type = "text" name = "note" id = "note" cols = "30" rows = "12" placeholder = ">> Tape your note" required></textarea>
                </div>
            </fieldset>
        </form>
        <footer>
            <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>