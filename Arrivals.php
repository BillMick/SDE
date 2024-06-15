<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="dashboard1.css"/>
        <?php include ("header.html");?>
        <title>
            Arrivals
        </title>
    </head>
    <body>
                            
                            
                            <!-- Les heures d'arrivée et de départ -->
                            <h2>Arrivals and Leaving Hours</h2>
                            <div style = "display : grid; grid-template-columns:repeat(4,1fr);">
                                <div><b>Today</b></div>
                                <div><b>Registration number</b></div>
                                <div><b>ArrivalTime</b></div>
                                <div><b>Leaving Time</b></div>
                            </div>
                            <?php
                            try
                            {/* 
                                $date = date("y-m-d"); */
                                $bdd = new PDO("mysql:host=localhost;dbname=EDLProject","root","");
                                $request3 = $bdd->prepare("SELECT * FROM Arrivals");/* 
                                $requete3->bindParam(':today',$date); */
                                $request3->execute();
                                while ($result3 = $request3->fetch())
                                { 
                                    
                                    ?>
                                    <div style = "display : grid; grid-template-columns:repeat(4,1fr);">
                                        <div class = "gridTaskP"><strong><?php echo $result3['today']; ?></strong></div>
                                        <div class = "gridTaskP"><strong><?php echo $result3['registrationNumber']; ?></strong></div>
                                        <div class = "gridTaskP"><strong><?php echo $result3['arrivalTime']; ?></strong></div>
                                        <div class = "gridTaskP"><strong><?php echo $result3['leavingTime']; ?></strong></div>
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

        <footer>
            <?php include ("footer.html"); ?>
        </footer>
    </body>
</html>