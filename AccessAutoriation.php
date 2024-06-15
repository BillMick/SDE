<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href = "AccessAutorisation.css"/>
        <?php require ("header.html");?>
        <title>
            Access verification
        </title>
    </head>
    <body>
        <div class = "first">
            <div class = "includeIn"><span id = "clockStandBy"></span></div>
                <script>
                var time = document.getElementById("clockStandBy");
                var timeR = setInterval(Clock,1000);

                function Clock()
                {
                    var d = new Date();
                    time.innerHTML = d.toLocaleTimeString();
                }
                </script>
            
            
            
            <div class = "fieldset">
            <form>
                <fieldset id = "fieldset3">
                    <legend>
                        <span class = "fas fa-user-tie fa-2x" style = "color : black"></span>
                            <strong>  Access Verification</strong>
                    </legend>
                    <div style = "width : auto;">
                        <input class = "form-control" type = "tel" name = "staffNumber" id = "staffNumber" placeholder = "Enter your staff number" required/>
                    </div>
                    <br/>
                    <div style = "width : auto;">
                        <input class = "form-control" type = "password" name = "pass" id = "pass" placeholder = "Enter your password" required/>
                    </div>
                    <hr/>
                    <div class = "col-lg-offset-4-col-lg-4">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "#">Cancel</a>
                        <button class = "col-lg-offset-2 btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Log in</button>
                    </div>
                </fieldset>
            </form>
        
            <form>
                <fieldset id = "fieldset3">
                    <legend>
                        <span class = "fas fa-user-tie fa-2x" style = "color : black"></span>
                            <strong>  Vocal Pass</strong>
                    </legend>
                    <div style = "width : auto;">
                        <p class = "form-control" id = "sentence" style = "color : olive;"><strong>The sentence you've to read.</strong></p>
                    </div>
                    <div style = "width : 250px; width : auto;">
                    <button class = "col-lg-offset-2 btn btn-secondary" type = "submit"><span class = "fa fa-microphone" style = "color : #4f4;"></span></button>
                    </div>
                    <hr/>
                    <div class = "col-lg-offset-4-col-lg-4">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "#">Cancel</a>
                        <button class = "col-lg-offset-2 btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Log in</button>
                    </div>
                </fieldset>
            </form>

            <form>
                <fieldset id = "fieldset3">
                    <legend>
                        <span class = "fas fa-user-tie fa-2x" style = "color : black"></span>
                            <strong>  Password setting</strong>
                    </legend>
                    <div style = "width : auto;">
                        <input class = "form-control" type = "password" name = "lastPassword" id = "lastPassword" placeholder = "Enter your last password" required/>
                    </div>
                    <br/>
                    <div style = "width : auto;">
                        <input class = "form-control" type = "password" name = "newPassword" id = "newPassword" placeholder = "Enter your new password" required/>
                    </div>
                    <hr/>
                    <div class = "col-lg-offset-4-col-lg-4">
                        <a class = "col-lg-offset-3 btn btn-danger" href = "#">Cancel</a>
                        <button class = "col-lg-offset-2 btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Log in</button>
                    </div>
                </fieldset>
            </form>
            </div>
        </div>

        <footer>
            <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>