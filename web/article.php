<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="articlecss.css"/>
        <link rel="stylesheet" href="envoie.css"/>
        <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
        <title>News</title>
        <script src="jquery-3.6.0.js"></script>
    </head>
    <body>
        <div style = "display : grid; grid-template-columns : 1fr 1fr;">
            <div class="container">
                <div class="header">
                    <div class=tete>
                        <div class="card">
                            <div class="image">
                                <img src="card.jpg">
                            </div>
                            <div class="content">
                                <div class="title">Augmentation Salariale et promotion</div>
                                    <div class="sub-title">Promotion des associés sénior</div>
                                        <div class="bottom">
                                            <p>Nous offrons notre humble expertise pour tout ceux qui cherchent à être 
                                            accompagnés de façon profesionnelle dans leur besoins de communiquer par des arts
                                            le numériques, la photographie et ceux qui veulent faire parler d'eux.
                                            </p>
                                        </div>
                                </div>
                            </div>

                            <script>
                                $('.card').hover(function(){
                                    if($(this).hasClass("active")){
                                        $('.card .bottom').slideUp(function(){
                                            $('.card').removeClass("active");
                                        });
                                    }else{
                                        $('.card').addClass("active"); 
                                        $('.card .bottom').stop().slideDown();
                                    }
                                });
                            </script>
                        </div>    
                    </div>
                </div>    
                <div class="comment">
                    <?php
                        include("envoieDeCommentaire.php");
                    ?> 
                </div>
            </div>
            
            <div style = "display : block;">
                <form method="post" action="">
                    <label for="pseudo">Pseudo</label><br>
                    <input type="text" id="pseudo" name="pseudo" maxlength="20" pattern="[a-zA-Z0-9.-_]+" 
                    title="caractère autorisés : a-zA-Z0-9.-_"><br/>
                    <br/>
                    <label for="message">Comment</label><br>
                    <textarea id="message" name="message" cols="40" rows="10"></textarea><br>
                    
                    <input class="send" type="submit" value="Post comment">
                </form>
            </div>
        </div>

        <footer>
            <?php include ("../footer.html"); ?>
        </footer>
    </body>
</html>