<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="login2.0css.css"/>
    <title>Connexion</title>
</head>
 <body>

    <div class="container" >
    <img src="contact.jpg"/>
        <div class="row"> 
            <div class="col-lg-6 m-auto">
                <div class="card bg-dark mt-0">    
                    <div class="card-title bg-primary text-white mt-5">
                        <h3 class="text-center py-3"> Login Interface </h3>
                    </div>
                    <div class="card-body">
                    
                        <form action="process.php" method="post">

                            <input type="text" name="Uname" placeholder="Username" class="form-control mb-3">
                            <input type="password" name="Pword" placeholder="Password" class="form-control mb-3">
                            <button class="btn btn-success mt-3" name="Login">Login</button> 
                        </form> 
                    </div>
                </div>     
            </div>     
        </div>
    </div>     
</body>
</html>