<!DOCTYPE html>
<html>
<head>
    <?php include ("header.html");?>
    <title>Carousel</title>
</head>
<body>
    <main>
        <h1>diaporama</h1>
        <div class="diapo">
            <div class="im">
                <div class="image active">
                    <img src="accueil1.png" alt="im1">
                    <div class="caption">
                        <h2>Image1</h2>
                    </div>
                </div>
                <div class="image">
                    <img src="accueil2.png" alt="im2">
                    <div class="caption">
                        <h2>Image2</h2>
                    </div>
                </div>
            </div>
            <i id="nav-gauche" class="fas fa-chevron-left "></i>   
            <i id="nav-droite" class="fas fa-chevron-right "></i> 
        </div>
    </main>
    <!-- <script src="https://kit.fontawesome.com/fad7903e22.js" crossorigin="anonymous"> -->
    <script src="diaporama.js"></script>
    <footer>
                <?php include ("footer.html"); ?>
    </footer>
</body>
</html>