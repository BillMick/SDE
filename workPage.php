<?php session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel = "stylesheet" href = "workPage1.css"> 
        <title>WorkPage</title>
        <?php include ("header.html");?>
    </head>
    <body style = "background-image: url(im2.png); background-repeat: no-repeat; background-size: 100% 100%;">
        <?php include "Functions.php"; ?>

        <!-- Filtre de standBy -->
        <div>
            <div id = "includeIn"><span id = "clockStandBy"></span></div>
                <div class = "menuBarGrid">
                    <!-- Menu déroulant -->
                    <div style = "" id = "contenu">
                        <div class = "icone">
                            <a href = "#"><span id = "iconemenu" class = "fas fa-bars fa-2x" style = "color :white; float : left; margin : 12px"></span></a>
                        </div>
                        <div id = "menu" class = "animate">
                            <ul>
                                <!--  -->
                                <li class = "menus"><a class = "Tmenu" id = "TasksInterface" href = "#"><span id = "iconemenu" class = "fas fa-bars fa-1x" style = "color : #04AA6D;"></span>  List Tasks</a></li><!-- 
                                <li class = "menus"><a class = "Tmenu" href = "#"><span id = "iconemenu" class = "fas fa-book fa-1x" style = "color : #04AA6D;"></span>  Documents</a></li> -->
                                <li class = "menus"><a class = "Tmenu" href = "printerTask.php"><span id = "iconemenu" class = "fas fa-book fa-1x" style = "color : #04AA6D;"></span>  Print today tasks</a></li>
                                <li class = "menus"><a class = "Tmenu" id = "standByLink" href = "#"><span id = "iconemenu" class = "fas fa-leaf fa-1x" style = "color : #04AA6D;"></span>  Standby mode</a></li>
                                <li id = "myDash" class = "menus"><a class = "Tmenu" href = "lockDash.php"><span id = "iconemenu" class = "fas fa-columns fa-1x" style = "color : #04AA6D;"></span>  Dashboard</a></li>
                                <li id = "off" class = "menus"><span class = "Tmenu fas fa-sign-out-alt fa-1x" style = "color : #04AA6D;"></span>  Sign out</li>
                            </ul>
                            <!-- Script pour sign out -->
                            <script>
                                var sign = document.getElementById('off');
                                sign.addEventListener('click',function()
                                {
                                    close();
                                    open("lock.php", true);
                                }, true);
                            </script>
                        </div>
                    </div>
                    <!-- Barre de menu -->
                    <div style = "margin-left : 5px; margin-right : 100px; display : inline;position : absolute; z-index : 2;" class = "col-md-12">
                        <nav class = "navbar navbar-expand-md navbar-dark bg-dark 04AA6D">
                            <a class = "navbar-brand" href = "#"></a>
                            <ul class = "navbar-nav">
                            <li class = "nav-item"><a class = "nav-link" href = "web/site.php"><span class = "fas fa-home" style = "color: white;">  Home</span></a></li>
                            <li class = "nav-item"><a class = "nav-link" id = "news" href = "web/article.php"><span class = "fas fa-newspaper" style = "color : white;">  News</span></a></li>
                            <li class = "nav-item"><a class = "nav-link" href="#"><span id = "n_not" style = "color : green;">
                            <?php
                                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                                $request = $bdd->prepare("SELECT * FROM Notepad WHERE receiver = :a AND sender != :a");
                                $request->bindParam(':a',$_SESSION['staffNumber']);
                                $request->execute();
                                $n = 0;
                                $d = date("y-m-d");
                                while($request->fetch())
                                {
                                    $n = $n+1;
                                }
                                echo $n; 
                                if ($n == 0)
                                { ?>
                                    <script>
                                        document.getElementById("n_not").textContent = "";
                                    </script>
                                    <?php
                                }
                            ?>
                            </span><span id = "notesDisplay" class = "fas fa-book-open" style = "color : white;">  Notepad</span><span id = "notepadDisplay" class = "fas fa-plus"></span></a></li>
                            <li class = "nav-item"><a class = "nav-link" id = "notification" href = "#"><span class = "fas fa-bell" style = "color : white;">  Notification</span>
                            <span id = "n_notif" style = "color : red;">
                                <?php
                                $a = "Public";
                                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                                $request = $bdd->prepare("SELECT * FROM Notifications WHERE notificationStatus = :a");
                                $request->bindParam(':a',$a);
                                $request->execute();
                                $n = 0;
                                while($request->fetch())
                                {
                                    $n = $n + 1;
                                }
                                $request1 = $bdd->prepare("SELECT * FROM LatelyComing WHERE registrationNumber = :a AND today = :today");
                                $request1->bindParam(':a',$_SESSION['staffNumber']);
                                $request1->bindParam(':today',$d);
                                $request1->execute();
                                while($request1->fetch())
                                {
                                    $n = $n + 1;
                                }
                                echo $n; 
                                if ($n == 0)
                                { ?>
                                    <script>
                                        document.getElementById("n_notif").textContent = "";
                                    </script>
                                    <?php
                                }
                            ?><br>
                            </span></a></li>
                            <!-- paramétrage personnel -->
                            <li class = "nav-item"><a id = "usercog" class = "nav-link"><span class = "fas fa-user-cog fa-1x" style = "color: white;">  User Cog</span></a></li>
                            <!-- profil personnel -->
                            <li class = "nav-item"><a id = "profile" class = "nav-link"><span class = "fas fa-user-tie fa-1x" style = "color: white;">  View Profile</span></a></li>
                            <li class = "nav-item"><a href = "pdf1.php" class = "nav-link"><span class = "fas fa-print fa-1x" style = "color: white;">  Tasks PDF</span></a></li>
                            <!-- Horloge -->
                            <li style = "width : auto;"><span id = "clock" style = "color : white;"></span></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Personnal cog parameters -->
                    <div id = "menucog" class = "animate">
                        <ul>
                            <!-- <i id="nav-setting" >Profile</i> -->
                            <li class = "cogmenus"><a class = "cogTmenu" href = "#"><span id = "iconemenu" class = "fas fa-user fa-1x" style = "color : #04AA6D;"></span>  Profile</a></li>
                            <li class = "cogmenus"><a class = "cogTmenu" href = "#"><span id = "iconemenu" class = "fas fa-cog fa-1x" style = "color : #04AA6D;"></span>  Settings</a></li>
                            <li class = "cogmenus"><a class = "cogTmenu" id = "mPass" href = "#"><span id = "iconemenu" class = "fas fa-key fa-1x" style = "color : #04AA6D;"></span>  Modify password</a></li>
                        </ul>
                    </div>
                    <!-- Chargement des données personnelles -->
                    <div id = "view" class = "profileContainer p-2 animate">
                        <div class = "profileVContainer"><div class = "pV"><img src="Images/9.png" alt="profile" class = "avatar"></div>
                        <div div class = "pV"><?php echo $_SESSION['name'] ?></div></div>
                        <hr style = "color : white; opacity : 1; height : 1px;">
                        <div class = "profileVContainer1"><b>Registration number :</b><div><?php echo $_SESSION['staffNumber'] ?></div></div>
                        <div class = "profileVContainer1"><b>Department :</b><div><?php echo $_SESSION['department'] ?></div></div>
                        <div class = "profileVContainer1"><b>Grade :</b><div><?php echo $_SESSION['grade'] ?></div></div>
                        <div class = "profileVContainer1"><b>Post :</b><div><?php echo $_SESSION['post'] ?></div></div>
                        <div class = "profileVContainer1"><a href = "salaryPDF.php"><b>My Pay Statement</b></a></div>
                    </div>
                    <!-- Affichage des notules -->
                    <div class = "animate" id = "myNotes">
                        <?php
                            try
                            {
                                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                                $n = 0;
                                $in1 = 0;
                                $requete1 = $bdd->prepare("SELECT * FROM Notepad WHERE receiver = :receiver");
                                $requete1->bindParam(':receiver',$_SESSION['staffNumber']);
                                $requete1->execute();
                                ?>
                                
                                <!-- <div style = "margin-top : 80px;"><strong style = "font-size : 30px; color : blue;">My notes</strong></div> -->

                                <?php
                                while ($task1 = $requete1->fetch())
                                { 
                                    $n +=1; ?>
                                    <div class = "oneNoteContainer accordion">
                                        <div><button style = "outline : none; border : none"><b>Note <?php echo $n ?></b></button></div>
                                        <div><a name = "noteDeleted" href="ScreenPage.php?deleteNote=<?php echo $task1["id"]; ?>"><span id = "noteDeleted" class = "fas fa-trash"></span></a></div>
                                    </div>
                                    <div class = "panel"><?php echo $task1['note'] ?></div>
                                    <?php
                                    $in1 = 1;
                                }
                                if (!$task1 && $in1 == 0)
                                { ?>
                                    <div class = "accordion"><b>Empty...</b></div>
                        <?php   }
                                $requete1->closeCursor();
                            }
                            catch (PDOException $e)
                            {
                                echo ''.$e->getMessage();
                            } ?>
                    </div>
                    <!-- Affichage des notifications -->
                    <div class = "animate" id = "myNotifications">
                        <?php
                            try
                            {
                                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                                $n = 0;
                                $in = 0;
                                $d = date("y-m-d");
                                $a = "Public";
                                $requete1 = $bdd->prepare("SELECT * FROM Notifications WHERE notificationStatus = :notificationStatus");
                                $requete1->bindParam(':notificationStatus',$a);
                                $requete1->execute();
                                $requete2 = $bdd->prepare("SELECT * FROM LatelyComing WHERE registrationNumber = :registrationNumber AND today = :today");
                                $requete2->bindParam(':registrationNumber',$_SESSION['staffNumber']);
                                $requete2->bindParam(':today',$d);
                                $requete2->execute();
                                while ($r = $requete2->fetch())
                                { 
                                    $n +=1; ?>
                                    <div class = "accordion1"><!-- notifContainer ici -->
                                        <div><button style = "outline : none; border : none"><b>Notification <?php echo $n; ?></b></button></div>
                                        <div style = "font-size : 12px;"><?php $i = '<b>FROM </b>'.$r['supervisor'].'<b> TODAY </b>'; echo $i; ?></div>
                                    </div>
                                    <div class = "panel"><?php echo $r['note'] ?></div>
                                    <?php
                                    $in = 1;
                                }
                                ?>
                                
                                <!-- <div style = "margin-top : 80px;"><strong style = "font-size : 30px; color : blue;">My notes</strong></div> -->

                                <?php
                                while ($not = $requete1->fetch())
                                { 
                                    $n +=1; ?>
                                    <div class = "accordion1"><!-- notifContainer ici -->
                                        <div><button style = "outline : none; border : none"><b>Notification <?php echo $n; ?></b></button></div>
                                        <div style = "font-size : 12px;"><?php $i = '<b>FROM </b>'.$not['sender'].'<b> THE </b>'.$not['insertionDate']; echo $i; ?></div>
                                    </div>
                                    <div class = "panel"><?php echo $not['notificationText'] ?></div>
                                    <?php
                                    $in = 1;
                                }
                                if ((!$not || !$r) && $in == 0)
                                { ?>
                                    <div class = "accordion1"><b>Empty...</b></div>
                            <?php   }
                                $requete1->closeCursor();
                            }
                            catch (PDOException $e)
                            {
                                echo ''.$e->getMessage();
                            } ?>
                    </div>
                </div>
            </div>
        </div>
        <div>
        <?php //commencer une tâche
        if(isset($_GET["beginA"]) && isset($_GET['beginN']))
        {
            try
            {
                $a = "In progress";
                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                $request = $bdd->prepare("SELECT * FROM TasksAssigned WHERE id = :id AND taskDesignation = :taskDesignation");
                $request->bindParam(':id',$_GET['beginA']);
                $request->bindParam(':taskDesignation',$_GET['beginN']);
                $request->execute();
                $timerA = $request->fetch();
                if (!$timerA)
                {
                    $request = $bdd->prepare("SELECT * FROM TasksProposed WHERE id = :id AND taskDesignation = :taskDesignation");
                    $request->bindParam(':id',$_GET['beginA']);
                    $request->bindParam(':taskDesignation',$_GET['beginN']);
                    $request->execute();
                    $timerA = $request->fetch();
                    $req = $bdd->prepare("UPDATE TasksProposed SET taskStatus = :taskStatus WHERE id = :id");
                    $req->bindParam(':id',$timerA['id']);
                    $req->bindParam(':taskStatus', $a);
                    $req->execute();
                }
                else
                {
                    $req = $bdd->prepare("UPDATE TasksAssigned SET taskStatus = :taskStatus WHERE id = :id");
                    $req->bindParam(':id',$timerA['id']);
                    $req->bindParam(':taskStatus', $a);
                    $req->execute();
                }
                ?>
                <!-- Pour affichage de la tâche courante -->
                <center>
                    <div class = "animate centerBox box" id = "currentTaskBox">
                        <!-- affichage de la tâche en cours et de le minuteur correspondant  -->
                        <div style = "display : grid; grid-template-columns : 80% 20%;"><h2>Current task</h2><span class = "fas fa-times fa-2x" style = "cursor : pointer; color : red;" id = "closeCurrentTask"></span></div>
                        <hr style = "color : white; opacity : 1;">
                        <div><span id = "taskName" style = "font-size : 25px;"><b>Nom de la tâche</b></span></div>
                        <b><span id = "duration">Duration</span></b><br>
                        <b><span id = "timeAlert" style = "font-size : 25px; color : rgb(0, 255, 17);"></span></b>
                        <center>
                            <a id = "abort" class = "btn btn-danger" name = "abort" href="ScreenPage.php?abort=<?php echo $timerA["id"]; ?>">Abort</a>
                            <button id = "b1" class = "btn btn-primary" type = "">Begin this task | <span class = "fas fa-clock" style = "color : #000;"></span></button>
                        <!-- Heure de début d'une tâche -->
                        </center>
                    </div>
                </center>
                <!-- Pour fermer le current task box -->
                <script>
                    document.getElementById('closeCurrentTask').onclick = function()
                    {
                        document.getElementById('currentTaskBox').style.display = "none";
                    };
                </script>
                <script>
                    var b = document.getElementById('currentTaskBox');
                    var abort = document.getElementById("abort");
                    abort.onclick = function()
                    {
                        b.style.display = "none";
                    };
                    b.style.display = "inline-block";
                    b.querySelector('#taskName').textContent = "<?php echo $timerA['taskDesignation'] ?>";
                    b.querySelector('#duration').textContent = "<?php echo $timerA['taskDuration'] ?>";
                    /* var c = document.getElementById('') */

                    var b1 = document.getElementById('b1');
                    var p1 = document.getElementById('timeAlert');

                    var timeoutId;
                    var intervalId;
                    var dec = 0;
                    var sec = 0;
                    var min = 0;
                    var heu = 0;
                    p1.textContent = heu + ':' + min + ':' + sec + ':' + dec;
                    b1.addEventListener('click', timer);

                    function timer()
                    {
                        /* intervalId =  */setInterval(function(){
                            p1.textContent = heu + ':' + min + ':' + sec + ':' + dec;
                            dec += 1;
                            if(dec >= 10)
                            {
                                dec = 0;
                                sec += 1;
                            }
                            if(sec >= 60)
                            {
                                sec = 0;
                                min += 1;
                            }
                            if(min >= 60)
                            {
                                min = 0;
                                heu += 1;
                            }

                        }, 100);
                        //structure de comparaison
                        setInterval(function()
                        {
                            if(sec < 10)
                            {
                                var s = '0'+p1.textContent[4];
                            }
                            else
                            {
                                var s = sec;
                            }
                            if(min < 10)
                            {
                                var m = '0'+p1.textContent[2];
                            }
                            else
                            {
                                var m = min;
                            }
                            if(heu < 10)
                            {
                                var h = '0'+p1.textContent[0];
                            }
                            else
                            {
                                var h = heu;
                            }
                            var t = h + ':' + m + ':' + s;
                            if (t == "<?php echo $timerA['taskDuration'] ?>")
                            {
                                alert("You'd have finished...");
                                p1.style.color = "red";
                            }
                        },1000);
                    }
                </script> <!-- il reste la signalisation du retard -->
            <?php
            }
            catch (PDOException $e)
            {?>
                <p style = "color : red;">Data insertion failed !</p>
            <?php
                echo ''.$e->getMessage();
            }
        } ?>


        <!-- Bloc note -->
        <center>
            <form class = "animate" id = "notepad" method = "post" action = "ScreenPage.php">
                <fieldset id = "fieldset3" class = "box">
                <div>
                    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                        <a class="navbar-brand" href="#"></a>
                        <ul class="navbar-nav">
                            <li class = "nav-item1"><button style = "margin-right : 5px;" class = "btn btn-secondary" type = "reset"><span class = "fas fa-redo-alt" style = "color : white"></span></button></li>
                            <li class="nav-item1"><button style = "margin-right : 5px;" class = "btn btn-primary" type = "submit" ><span class = "fas fa-save" style = "color : white"></span></button></li>
                            <!-- <li class="nav-item"><a class="nav-link" href="#"><span class = "fas fa-list" style = "color : white"></span></a></li> -->
                            <li class="nav-item1"><button style = "margin-right : 5px;" class = "btn btn-primary" type = "submit" ><span class = "fab fa-telegram fa-1x" style = "color : white"></span></button></li>
                            <li class="nav-item1"><button style = "margin-right : 5px;" class="btn btn-danger" id = "close" ><span class = "fas fa-times" style = "color : white"></span></button></li>
                        </ul>
                    </nav>
                </div>
                    <legend style = "text-align : center;">
                        <span class = "fas fa-pen-alt fa-1x" style = "color : black"></span>
                            <strong>  Notepad</strong>
                    </legend>
                    <hr>
                    <div id = "whoseNote" style = "border-style : solid; width : auto;">
                        <input class = "form-control" type = "tel" name = "receiverStaffNumber" id = "receiverStaffNumber" placeholder = "Enter possibly receiver staff number..."/>
                    </div>
                    <div id = "notepadBox" style = "width : auto;"> 
                        <textarea style = "overflow : scroll; border : none; font-size : 15px;" class = "form-control" type = "text" name = "note" id = "note" cols = "15" rows = "10" placeholder = ">> Tape your note" required></textarea>
                    </div>
                </fieldset>
            </form>
        </center>

        <!-- Tasks generation -->
        <center>
            <form class = "animate" id = "listTasks" method = "post" action = "ScreenPage.php">
                <fieldset id = "fieldset3" class = "box" style = "width : 500px">
                <div>
                    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                        <a class="navbar-brand" href="#"></a>
                        <ul class="navbar-nav">
                        <li class="nav-item"><button class="btn btn-danger" id = "closeL" style = "display : right;"><span class = "fas fa-times" style = "color : white"></span></button></li>
                        </ul>
                    </nav>
                </div>
                <div style = "margin : 10px;">
                    <legend style = "text-align : center;">
                        <span class = "fas fa-list" style = "color : black"></span>
                            <strong>  List Tasks</strong>
                    </legend>
                    <hr>
                        <p>
                            <input class = "form-control" type = "text" name = "task" id = "task" placeholder = "Task designation..." autofocus required/>
                        </p>
                        <p>
                            <input class = "form-control" type = "time" name = "duration" id = "duration" placeholder = "Task duration...(in minutes)"/>
                        </p>
                        <p>
                            <input class = "form-control" type = "text" name = "taskDescription" id = "taskDescription" placeholder = "Task description..." />
                        </p>
                        <center style = "margin-bottom : 10px;">
                            <button class = "btn btn-secondary" type = "reset" name = "reset" id = reset>Clear</button>
                            <button class = "btn btn-primary" type = "submit" name = "confirm" id = confirm>Confirm task |<span class = "fas fa-check" style = "color : green">
                            </span></button>
                        </center>
                </div>
                </fieldset>
            </form>
        </center>
        
        <!-- Interface de modification du mot de passe -->
        <center>
            <form class = "animate" id = "passInterface" action = "ScreenPage.php" method = "post">
                <fieldset id = "fieldset3" class = "box">
                    <div>
                        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                            <a class="navbar-brand" href="#"></a>
                            <ul class="navbar-nav">
                            <li class="nav-item"><button class="btn btn-danger" id = "closeP" style = "display : right;"><span class = "fas fa-times" style = "color : white"></span></button></li>
                            </ul>
                        </nav>
                    </div>
                    <div style = "margin: 10px; margin-top : 0px;">
                        <legend>
                            <span class = "fas fa-lock" style = "color : black"></span>
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
                        <center>
                            <button class = "col-lg-offset-3 btn btn-danger" type = "reset">Reset</a>
                            <button style = "margin-left : 7px;" class = "col-lg-offset-2 btn btn-primary" type = "submit"><span class = "fa fa-check-square" style = "color : #4f4;"></span>  Set</button>
                        </center style = "margin-bottom : 10px;">
                    </div>
                </fieldset>
            </form>
        </center>
        </div>

        <!-- Chargement des tâches -->
        <?php
        try
        {
            $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
            $status = "Set";
            $status1 = "In progress";
            $status2 = "Stopped";
            $number = 0;
            //$d = date("y-m-d");
            $requete2 = $bdd->prepare("SELECT * FROM TasksAssigned WHERE registrationNumber = :registrationNumber AND (taskStatus = :taskStatus OR taskStatus = :taskStatus1 OR taskStatus = :taskStatus2)");
            $requete2->bindParam(':registrationNumber',$_SESSION['staffNumber']);
            $requete2->bindParam(':taskStatus',$status);
            $requete2->bindParam(':taskStatus1',$status1);
            $requete2->bindParam(':taskStatus2',$status2);
            $requete2->execute();
            ?>
            
            <div style = "margin-top : 80px;"><strong style = "font-size : 30px; color : white;">Tasks Assigned</strong></div>
            <div class = "grid-container bg-dark p-2">
                <div class = "grid-item">#</div>
                <div class = "grid-item">Task</div>
                <div class = "grid-item">Description</div>
                <div class = "grid-item">Duration</div>
                <div class = "grid-item">Begin</div>
                <div class = "grid-item">Done</div>
                <div class = "grid-item">Controller</div>
            </div>
            <?php
            while ($task2 = $requete2->fetch())
            { 
                $number +=1; ?>
                <div class = "grid-containerC p-2 bg-light">
                    <div class = "gridTaskP"><strong><?php echo $number; ?></strong></div>
                    <div class = "gridTaskP"><strong><?php echo $task2['taskDesignation']; ?></strong></div>
                    <div class = "gridTaskP"><strong><?php echo $task2['taskDescription']; ?></strong></div>
                    <div class = "gridTaskP"><strong><?php echo $task2['taskDuration']; ?></strong></div>
                    <div class = "gridTaskP"><a style = "width : auto;" name = "beginA" class = "form-control btn btn-primary" href="workPage.php?beginA=<?php echo $task2["id"]; ?>&beginN=<?php echo $task2['taskDesignation']; ?>"><span class = "fas fa-hourglass-start"></span></a></div>
                    <div class = "gridTaskP"><a  style = "width : auto;" name = "doneA" class = "form-control btn btn-success" href="ScreenPage1.php?doneA=<?php echo $task2["id"]; ?>"><span class = "fas fa-thumbs-up"></span></a></div>
                    <div class = "gridTaskP"><strong><?php echo $task2['adminRegistrationNumber']; ?></strong></div>
                </div>
                <?php
            }
            $requete2->closeCursor();
        }
        catch (PDOException $e)
        {
            echo ''.$e->getMessage();
        }
                        
        try
        {
            $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
            $status = "Set";
            $status1 = "In progress";
            $status2 = "Stopped";
            //$d = date("y-m-d");
            $requete3 = $bdd->prepare("SELECT * FROM TasksProposed WHERE registrationNumber = :registrationNumber AND (taskStatus = :taskStatus OR taskStatus = :taskStatus1 OR taskStatus = :taskStatus2)");
            $requete3->bindParam(':registrationNumber',$_SESSION['staffNumber']);
            $requete3->bindParam(':taskStatus',$status);
            $requete3->bindParam(':taskStatus1',$status1);
            $requete3->bindParam(':taskStatus2',$status2);

            $requete3->execute();
            ?>
            
            <div style = "margin-top : 40px;"><strong style = "font-size : 30px; color : rgb(255, 255, 255);">Tasks Proposed</strong></div>
            <div class = "grid-container bg-dark p-2">
                <div class = "grid-item">#</div>
                <div class = "grid-item">Task</div>
                <div class = "grid-item">Description</div>
                <div class = "grid-item">Duration</div>
                <div class = "grid-item">Begin</div>
                <div class = "grid-item">Done</div>
                <div class = "grid-item">Delete</div>
            </div>
            <?php
            while ($task3 = $requete3->fetch())
            { 
                $number +=1; ?>
                <div class = "grid-containerC p-2 bg-light" id = "<?php echo $task3["id"]; ?>">
                    <div class = "gridTaskP"><strong><?php echo $number; ?></strong></div>
                    <div class = "gridTaskP"><strong><?php echo $task3['taskDesignation']; ?></strong></div>
                    <div class = "gridTaskP"><strong><?php echo $task3['taskDescription']; ?></strong></div>
                    <div class = "gridTaskP"><strong><?php echo $task3['taskDuration']; ?></strong></div>
                    <div class = "gridTaskP"><a style = "width : auto;" name = "beginA" class = "form-control btn btn-primary" href="workPage.php?beginA=<?php echo $task3["id"]; ?>&beginN=<?php echo $task3['taskDesignation']; ?>"><span class = "fas fa-hourglass-start"></span></a></div>
                    <div class = "gridTaskP"><a style = "width : auto;" name = "done" class = "form-control btn btn-success" href="ScreenPage1.php?done=<?php echo $task3["id"]; ?>"><span class = "fas fa-thumbs-up"></span></a></div>
                    <div class = "gridTaskP"><a style = "width : auto;" name = "delete" class = "form-control btn btn-danger" href="ScreenPage.php?delete=<?php echo $task3["id"]; ?>"><span class = "fas fa-trash"></span></a></div>
                </div>
             <?php
            }
            $requete2->closeCursor();
        }
        catch (PDOException $e)
        {?>
            <p style = "color : red;">Data displaying failed !</p>
         <?php
            echo ''.$e->getMessage();
        } ?>


        <script src="workPage1.js"></script>
        <script src="FormControl.js"></script>

        <!-- /* Masquage du dashboard et autres*/ -->
        <?php
            $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
            $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :registrationNumber");
            $request->bindParam(':registrationNumber',$_SESSION['staffNumber']);
            $request->execute();
            $result = $request->fetch();
            //dashboard authorised ?
            if($result['accessDegree'] == 3)
            { ?>
                <script>
                    var dash = document.getElementById('myDash');
                    dash.style.display = "none";
                </script>
                <?php
            }
            //modification du mot de passe standard
            if($result['firstConnexion'] == 1)
            { ?>
                <script>alert("You have to change your password.");
                document.getElementById("passInterface").style.display = "inline-block"; </script>
                <?php
            }

            //Heure d'arrivée et vérification de retard
            $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
            $d = date("H:i:s");
            $date = date("y-m-d");
            $request1 = $bdd->prepare("INSERT INTO Arrivals(today, registrationNumber, arrivalTime)
            VALUES(CURDATE(), :registrationNumber, CURTIME())");
            $request1->bindParam(':registrationNumber',$_SESSION['staffNumber']);
            $request1->execute();
            if ($d > "08:00:00" || $d > "15:00:00")
            {
                $request = $bdd->prepare("SELECT * FROM LatelyComing WHERE today = :today AND registrationNumber = :registrationNumber");
                $request->bindParam(':registrationNumber',$_SESSION['staffNumber']);
                $request->bindParam(':today',$date);
                $request->execute();
                $v = $request->fetch();
                if (!$v)
                {
                    $req = $bdd->prepare("INSERT INTO LatelyComing(today, registrationNumber)
                               VALUES(:today, :registrationNumber)");
                    $req->bindParam(':registrationNumber',$_SESSION['staffNumber']);
                    $req->bindParam(':today',$date);
                    $req->execute();
                }?>
                    <script>alert("You're late.");</script>
                <?php
            }
            
        ?>

        <footer>
            <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>