<?php //session_start(); $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dashboard1.css"/>
    <!-- <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="Font awesome/css/all.min.css">
    <script src="../My CDN/jquery-3.6.0.js"></script>
    <title>Dashboard</title>
</head>
<body>
    
        <div class="container">
            <div class="navigation">
                <ul>
                    <li>
                        <div style = "display : grid; grid-template-columns : 20% 60%;">
                                <div class="icon"><i class="fas fa-dragon fa-2x" aria-hidden="true" style = "margin-top : 40px;"></i></div>
                                <div class="title"><h2><?php echo $_SESSION['name']; ?></h2></div>
                        </div>
                    </li>
                    <li>
                        <div style = "display : grid; grid-template-columns : 75% 25%;">
                            <div><a href="../SocialIdentity.php">
                            <span class="icon"><i class="fas fa-user" aria-hidden="true"></i></span>
                            <span class="title">Set Social Identity</span>
                            </a></div> <!-- Ne pas oublier la modification du profile ou des données -->
                            <div><a href = "../SocialIdentity.php?modify=<?php echo '1'; ?>"><span style = "text-align : left; margin-top : 20px;" class = "fas fa-pen"></span></a></div>
                        </div>
                    </li>
                    <li>
                    <div style = "display : grid; grid-template-columns : 80% 20%;">
                            <div><a href="../EmployeeProfile.php">
                            <span class="icon"><i class="fas fa-user-tie" aria-hidden="true"></i></span>
                            <span class="title">Set Employee Profile</span>
                            </a></div> <!-- Ne pas oublier la modification du profile ou des données -->
                            <div><a href = "../EmployeeProfile.php?modifyP=<?php echo '2'; ?>"><span style = "text-align : left; margin-top : 20px;" class = "fas fa-pen"></span></a></div>
                        </div>
                    </li>
                    <li>
                        <div style = "display : grid; grid-template-columns : 70% 30%;">
                            <div><a href="../bankIdentity.php">
                            <span class="icon"><i class = "fas fa-money-check-alt" aria-hidden="true"></i></span>
                            <span class="title">Set Bank Identity</span>
                            </a></div> <!-- Ne pas oublier la modification du profile ou des données -->
                            <div><a href = "../bankIdentity.php?modifyB=<?php echo '3'; ?>"><span style = "text-align : left; margin-top : 20px;" class = "fas fa-pen"></span></a></div>
                        </div>
                    </li>
                    <li>
                        <a href="../adminOp.php">
                        <span class="icon"><i class="fa fa-cog" aria-hidden="true"></i></span>
                        <span class="title">Assign task</span>
                        </a>
                    </li>
                    <li>
                        <a href="../upgrade.php">
                        <span class="icon"><i class="fab fa-accessible-icon fa-2x" aria-hidden="true"></i></span>
                        <span class="title">Set Access Degree</span>
                        </a>
                    </li>
                    <li>
                        <a href="../workStatus.php">
                        <span class="icon"><i class="fas fa-broom fa-2x" aria-hidden="true"></i></span>
                        <span class="title">Set Work Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="../notification.php">
                        <span class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <span class="title">Send Notification</span>
                        </a>
                    </li>
                    <li>
                        <a href="../workPage.php">
                        <span class="icon"><i class="fas fa-igloo fa-2x" aria-hidden="true"></i></span>
                        <span class="title">Get back</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" id = "off">
                        <span class="icon"><i class="fas fa-sign-out-alt fa-2x" aria-hidden="true"></i></span>
                        <span class="title">Sign Out</span>
                        </a>
                            <!-- Script pour sign out -->
                            <script>
                                var sign = document.getElementById('off');
                                sign.addEventListener('click',function()
                                {
                                    close();
                                    open("../lock.php", true);
                                }, true);
                            </script>
                    </li>
                    <li id = "salary">
                        <a href="../dataModification.php">
                        <span class="icon"><i class="fas fa-pen-alt fa-1x" aria-hidden="true"></i></span>
                        <span class="title">Modify Salary Default Data</span>
                        </a>
                    </li>
                        <?php $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                        $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :registrationNumber");
                        $request->bindParam(':registrationNumber',$_SESSION['staffNumber']);
                        $request->execute();
                        $result = $request->fetch();
                            
                        if($result['accessDegree'] != 0)
                            { ?>
                                <script>
                                    var dash = document.getElementById('salary');
                                    dash.style.display = "none";
                                </script>
                                <?php
                        }?>
                </ul>
            </div>

            <div class="main">
                <div class="topbar">
                    <div class="toggle" onclick="toggleMenu();"></div>
                    <form action="researchAll.php" method="post">
                    <div style = "display : grid, grid-template-columns : 80% 20%;" class="search">
                            <div>
                                <label>
                                    <input name = "search" type="text" placeholder="search here">
                                </label>
                            </div>
                        <div><button type="submit"><i class="fa fa-search" aria-hidden="true">Search</i></button></div>
                    </div>
                    </form>
                    <div class="user">
                        <img src="moi.jpg">
                    </div>
                 </div>

                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers">
                            <?php
                               $d = 3;
                                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                               $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE accessDegree = :a");
                               $request->bindParam(':a',$d);
                                $request->execute();
                                $n = 0;
                                while($request->fetch())
                                {
                                   $n = $n+1;
                                }
                                echo $n.' <b>Workmen</b>'; ?><br>
                         <?php 
                            $d = 3;
                               $request = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE accessDegree != :a");
                               $request->bindParam(':a',$d);
                               $request->execute();
                               $n = 0;
                               while($request->fetch())
                               {
                                   $n = $n+1;
                               }
                               echo $n.' <b>Administrators</b>';
                            ?>
                            </div>
                            <div class="cardName">Employees</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="card">
                        <div>
                            <div class="numbers">
                            <?php
                               $d = date("y-m-d");
                               $request = $bdd->prepare("SELECT * FROM TasksAssigned WHERE ADate = :a");
                               $request->bindParam(':a',$d);
                               $request->execute();
                               $n = 0;
                               while($request->fetch())
                               {
                                   $n = $n+1;
                               }
                               echo $n.' <b>Tasks assigned</b>';
                            ?><br/>
                            <?php
                               $d = date("y-m-d");
                                $request = $bdd->prepare("SELECT * FROM TasksProposed WHERE PDate = :a");
                               $request->bindParam(':a',$d);
                               $request->execute();
                               $n = 0;
                               while($request->fetch())
                               {
                                   $n = $n+1;
                               }
                               echo $n.' <b>Tasks proposed</b>';
                            ?>
                            </div>
                            <div class="cardName">Task</div>
                        </div>
                        <div class="iconBox">
                            <i class="fa fa-comment" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>

                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <span id = "m_activity" style = "color : green; font-size : 15px; display : none;"></span><!-- Message de réussite des opérations -->
                        </div>
                        <div style = "margin-bottom : 20px;display : grid; grid-template-columns : 1fr 1fr 1fr 1fr;">
                            <div><button id = "allEmployees" class="btn">List All Employees</button></div>
                            <div><button id = "todayTasks" class="btn">Display today tasks</button></div>
                            <div><button id = "allTasks1" class="btn">Display all tasks</button></div>
                            <div><a href = "../Arrivals.php" id = "arrivals" class="btn">Display Hours</a></div>
                        </div>

                            <!-- Affichage de tous les employés -->
                        <div class = "animate" id = "displayAllEmployees">
                            <h2>All Employee List</h2>
                            <div class = "grid-container bg-dark p-2">
                                <div><b>Name</b></div>
                                <div><b>Registration number</b></div>
                                <div><b>Status</b></div>
                                <div><b>Access Degree</b></div>
                                <div><b>Tâches effectuées</b></div>
                            </div>
                            <?php
                            try
                            {
                               $f1 = 0;
                               $f2 = 1;
                               $request1 = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE firstConnexion = :f1 OR firstConnexion = :f2");
                               $request1->bindParam(':f1',$f1);
                               $request1->bindParam(':f2',$f2);
                               $request1->execute();
                               while ($result = $request1->fetch())
                               { 
                                   $request2 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :i");
                                   $request2->bindParam(':i',$result['identityDocumentNumber']);
                                   $request2->execute();
                                   $result2 = $request2->fetch();
                                    $firstname = $result2['firstname'];
                                   $surname = $result2['surname'];
                                   $c = $firstname.' '.$surname;
                                    
                                    ?>
                                    <div class = "grid-containerC p-2 bg-light">
                                        <div class = "gridTaskP"><b><?php echo $c; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['registrationNumber']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['workStatus']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['accessDegree']; ?></b></div>
                                        <div class = "gridTaskP"><b>
                                    <?php
                                        
                                       $d = date("y-m-d");
                                        $done = "Done";
                                        $request = $bdd->prepare("SELECT * FROM TasksProposed WHERE PDate = :a AND registrationNumber = :r AND taskStatus = :t");
                                       $request->bindParam(':a',$d);
                                       $request->bindParam(':r',$result['registrationNumber']);
                                       $request->bindParam(':t',$done);
                                       $request->execute();
                                       $t = 0;
                                        while($request->fetch())
                                       {
                                           $t = $t+1;
                                       }
                                       $request = $bdd->prepare("SELECT * FROM TasksAssigned WHERE ADate = :a");
                                        $request->bindParam(':a',$d);
                                       $request->execute();
                                       while($request->fetch())
                                       {
                                           $t = $t+1;
                                       }
                                        echo $t;
                                    ?></b></div>
                                    </div>
                                <?php
                                    }
                                 }
                                   catch (PDOException $e)
                                 {
                                ?>
                                <p style = "color : red;">Data displaying failed !</p>
                            <?php
                               echo ''.$e->getMessage();
                           } ?>
                        </div>

                            <!-- All tasks -->
                        <div class = "animate" id = "displayAllTasks"><!-- 
                            <div style = "font-size : 20px; margin-top : 40px;"><b>All Tasks Proposed</b></div> -->
                            <h2>All Tasks Proposed</h2>
                            <div class = "grid-containerT bg-dark p-2">
                                <div><b>#</b></div>
                                <div><b>Registration Number</b></div>
                                <div><b>Name</b></div>
                                <div><b>Date</b></div>
                                <div><b>Time</b></div>
                                <div><b>Task</b></div>
                                <div><b>Description</b></div>
                                <div><b>Duration</b></div>
                                <div><b>Status</b></div>
                            </div>
                            <?php
                           try
                            {
                                //Tâches proposées
                               $c = 0;
                                $request1 = $bdd->prepare("SELECT * FROM TasksProposed");
                                $request1->execute();
                               while ($result = $request1->fetch())
                                { $c = $c + 1;?>
                                    <div class = "grid-containerCT p-2 bg-light">
                                        <div class = "gridTaskP"><b><?php echo $c; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['registrationNumber']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php 
                                            $req = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :a");
                                            $req->bindParam(':a',$result['registrationNumber']);
                                            $req->execute();
                                            $reqR = $req->fetch();
                                            $req1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :a");
                                            $req1->bindParam(':a',$reqR['identityDocumentNumber']);
                                            $req1->execute();
                                            $reqR1 = $req1->fetch();
                                            echo $reqR1['firstname'].' '.$reqR1['surname'];
                                        ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['PDate']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['PTime']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDesignation']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDescription']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDuration']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskStatus']; ?></b></div>
                                    </div>
                                <?php
                                } ?><!-- 
                                <div style = "font-size : 20px; margin-top : 40px;"><b>All Tasks Assigned</b></div> -->
                                <h2>All Tasks Assigned</h2>
                                <div class = "grid-containerTA bg-dark p-2">
                                    <div><b>#</b></div>
                                    <div><b>Registration Number</b></div>
                                    <div><b>Name</b></div>
                                    <div><b>Date</b></div>
                                    <div><b>Time</b></div>
                                    <div><b>Task</b></div>
                                    <div><b>Description</b></div>
                                    <div><b>Duration</b></div>
                                    <div><b>Status</b></div>
                                    <div><b>Controller</b></div>
                                </div>

                                <?php
                                //Tâches assignées
                               $request1 = $bdd->prepare("SELECT * FROM TasksAssigned");
                                $request1->execute();
                                $c = 0;
                                while ($result = $request1->fetch())
                                { $c = $c + 1;?>
                                    <div class = "grid-containerCTA p-2 bg-light">
                                        <div class = "gridTaskP"><b><?php echo $c; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['registrationNumber']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php 
                                        
                                            $req = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :a");
                                            $req->bindParam(':a',$result['registrationNumber']);
                                            $req->execute();
                                            $reqR = $req->fetch();
                                            $req1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :a");
                                            $req1->bindParam(':a',$reqR['identityDocumentNumber']);
                                            $req1->execute();
                                            $reqR1 = $req1->fetch();
                                            echo $reqR1['firstname'].' '.$reqR1['surname'];
                                        ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['ADate']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['ATime']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDesignation']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDescription']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDuration']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskStatus']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['adminRegistrationNumber']; ?></b></div>
                                    </div>
                                <?php
                               }
                           }
                            catch (PDOException $e)
                            {?>
                                <p style = "color : red;">Data displaying failed !</p>
                            <?php
                               echo ''.$e->getMessage();
                            } ?>
                        </div>

                            <!-- Today tasks -->
                        <div class = "animate" id = "displayTodayTasks">
                            <h2>Today Tasks Proposed</h2>
                            <div class = "grid-containerPo bg-dark p-2">
                                <div><b>#</b></div>
                                <div><b>Registration Number</b></div>
                                <div><b>Name</b></div>
                                <div><b>Time</b></div>
                                <div><b>Task</b></div>
                                <div><b>Description</b></div>
                                <div><b>Duration</b></div>
                                <div><b>Status</b></div>
                            </div>
                            <?php
                            try
                            {
                                /* Tâches proposées */
                               $c = 0;
                                $d = date("y-m-d");
                               $request1 = $bdd->prepare("SELECT * FROM TasksProposed WHERE PDate = :p");
                               $request1->bindParam(':p',$d);
                               $request1->execute();
                               while ($result = $request1->fetch())
                               { $c = $c + 1;?>
                               <div class = "grid-containerPo p-2 bg-light">
                                        <div class = "gridTaskP"><b><?php echo $c; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['registrationNumber']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php 
                                            $req = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :a");
                                            $req->bindParam(':a',$result['registrationNumber']);
                                            $req->execute();
                                            $reqR = $req->fetch();
                                            $req1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :a");
                                            $req1->bindParam(':a',$reqR['identityDocumentNumber']);
                                            $req1->execute();
                                            $reqR1 = $req1->fetch();
                                            echo $reqR1['firstname'].' '.$reqR1['surname'];
                                        ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['PTime']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDesignation']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDescription']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDuration']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskStatus']; ?></b></div>
                                    </div>
                                <?php
                               } 
                           }
                           catch (PDOException $e)
                            {?>
                                <p style = "color : red;">Data displaying failed !</p>
                            <?php
                               echo ''.$e->getMessage();
                            }?>
                            <h2>Today Tasks Assigned</h2>
                            <div class = "grid-containerAo bg-dark p-2">
                                <div><b>#</b></div>
                                <div><b>Registration Number</b></div>
                                <div><b>Name</b></div>
                                <div><b>Time</b></div>
                                <div><b>Task</b></div>
                                <div><b>Description</b></div>
                                <div><b>Duration</b></div>
                                <div><b>Status</b></div>
                                <div><b>Controller</b></div>
                            </div>
                            <?php
                           try
                            {
                               $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                                /* Tâches assignées */
                               $c = 0;
                               $d = date("y-m-d");
                               $request1 = $bdd->prepare("SELECT * FROM TasksAssigned WHERE ADate = :p");
                               $request1->bindParam(':p',$d);
                                $request1->execute();
                               while ($result = $request1->fetch())
                                { $c = $c + 1;?>
                                    <div class = "grid-containerAo p-2 bg-light">
                                        <div class = "gridTaskP"><b><?php echo $c; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['registrationNumber']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php 
                                        
                                            $req = $bdd->prepare("SELECT * FROM EmployeeProfile WHERE registrationNumber = :a");
                                            $req->bindParam(':a',$result['registrationNumber']);
                                            $req->execute();
                                            $reqR = $req->fetch();
                                            $req1 = $bdd->prepare("SELECT * FROM SocialIdentity WHERE identityDocumentNumber = :a");
                                            $req1->bindParam(':a',$reqR['identityDocumentNumber']);
                                            $req1->execute();
                                            $reqR1 = $req1->fetch();
                                            echo $reqR1['firstname'].' '.$reqR1['surname'];
                                        ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['ATime']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDesignation']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDescription']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskDuration']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['taskStatus']; ?></b></div>
                                        <div class = "gridTaskP"><b><?php echo $result['adminRegistrationNumber']; ?></b></div>
                                    </div>
                                <?php
                               } 
                           }
                           catch (PDOException $e)
                           {?>
                                <p style = "color : red;">Data displaying failed !</p>
                            <?php
                               echo ''.$e->getMessage();
                           }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!--  <script>
            function toggleMenu(){
                let toggle = document.querySelector('.toggle');
                let navigation = document.querySelector('.navigation');
                let main = document.querySelector('.main');
                toggle.classList.toggle('active');
                navigation.classList.toggle('active');
                main.classList.toggle('active');
            }
         </script>-->
    <script src = "dashboard.js"></script>


</body>
</html>