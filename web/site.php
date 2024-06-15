<?php



?>

<!DOCTYPE html>
	<html>
		<head>
			<title>site</title>
			<meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
			<link rel="stylesheet" href="site.css"/>
            <link rel="stylesheet" href="bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="Font awesome/css/all.min.css">
            <link rel="stylesheet" href="diaporama.css"> 
            <script src="jquery-3.6.0"></script>
		</head>
		<body>
            <header>
                <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                    <a class="navbar-brand" href="#">SDE</a>
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="team.html">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about1">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="../lock.php">Login</a></li>
                    </ul>
                </nav>
            </header>

            <section class="container-fluid banner">
               
                <main>
                    <h1>Bienvenue sur le site officiel de la SDE entreprise</h1>
                    <div class="diapo">
                        <div class="im">
                            <div class="image active">
                                <img src="ban1.jpg" style="max-width: 100%; max-height: 850px;"alt="im1">
                                <div class="caption">
                                    <h2>Une entreprise à l'écoute</h2>
                                </div>
                            </div>
                            <div class="image">
                                <img src="ban2.jpg" style="max-width: 100%; max-height: 850px;"alt="im2">
                                <div class="caption">
                                    <h2>Nous vous accompagnons <br/>dans votre parcours</h2>
                                </div>
                            </div>
                        </div>
                        <i id="nav-gauche" class="fas fa-chevron-left curseur"></i>   
                        <i id="nav-droite" class="fas fa-chevron-right curseur"></i> 
                    </div>
                </main>


                <div class="linear-banner">
                    <a href="#contact"><button class="btn btn-custom"> Contactez nous! </button></a>
                </div> 


            </section> 

            <!-- àpropos -->
            <section class="container-fluid about">
                <div class="container">
                    <div class="row">
                    <h2 id="about1">About us</h2>
                    <hr class="separator">
                        <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                            <h2>Qui sommes nous?</h2>
                                <p>
                                Nous offrons notre humble expertise pour tout ceux qui cherchent à être 
                                accompagnés de façon profesionnelle dans leur besoins de communiquer par des arts
                                le numériques, la photographie et ceux qui veulent faire parler d'eux.
                                </p>
                        </article> 
                        <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                            <h2>Vision</h2>
                                <p>
                                Nous offrons notre humble expertise pour tout ceux qui cherchent à être 
                                accompagnés de façon profesionnelle dans leur besoins de communiquer par des arts
                                le numériques, la photographie et ceux qui veulent faire parler d'eux.
                                </p>
                        </article>
                        <article class="col-md-4 col-lg-4 col-xs-12 col-sm-12">
                            <h2>Nos offres</h2>
                                <p>
                                Nous offrons notre humble expertise pour tout ceux qui cherchent à être 
                                accompagnés de façon profesionnelle dans leur besoins de communiquer par des arts
                                le numériques, la photographie et ceux qui veulent faire parler d'eux.
                                </p>
                        </article>    
                     </div>
                </div>
            </section>
            <br/>
            <br/>
            <br/>


            <h2 class="sde">SDE</h2>
            <br/>
            <br/>
            <br/>

            <h1 class="val"> NOS VALEURS </h1>
            <br/>
            <br/>
            <br/>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="card h-100">
                        <img src="work.jpg" class="card-img-top" alt="respo">
                        <div class="card-body">
                            <div class="cote"><h5 class="titre">R</h5><h5 class="card-title">esponsabilité</h5> </div>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="client.jpg" class="card-img-top" alt="clie">
                        <div class="card-body">
                            <div class="cote"><h5 class="titre">C</h5><h5 class="card-title">ulture client</h5> </div>
                            <p class="card-text">This is a short card.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="integrite.jpg" class="card-img-top" alt="inte">
                        <div class="card-body">
                            <div class="cote"><h5 class="titre">I</h5><h5 class="card-title">ntégrité</h5></div>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="innov.jpg" class="card-img-top" alt="inov">
                        <div class="card-body">
                            <div class="cote"><h5 class="titre">I</h5><h5 class="card-title">nnovation</h5></div>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="perfomance.jpg" class="card-img-top" alt="perf">
                        <div class="card-body">
                            <div class="cote"><h5 class="titre">P</h5><h5 class="card-title">erformancce</h5> </div></div>
                            <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <br/>
            <br/> 

            <h1 class="val"> PORTAIL CARRIERE </h1>
            <br/>
            <br/>
            <br/>
            <div class="card mb-3" style="max-width: 1500px; max-height: 450px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="Career.jpg" class="card-img" style="max-width: 500px; max-height: 450px;"alt="carrière">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <div class="cote"><h5 class="titre">V</h5><h5 class="card-title">oulez vous faire valoir vos compétences?</h5></div>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Last updated 3 days ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
                


            <div class="linear-banner">
                <a class="btn btn-custom1" href = "../joinUs.php"> Rejoignez-nous </a>
            </div>
            <br/>
            <br/>
            <br/> 

                
                <div class="tab">
                    <h2 id="contact">Contacts</h2>
                </div>
                
                <br/>
                <br/>    

                <h1 class="heure">Heure d'ouverture</h1>
                <br/>
                    <p>Notre agence est ouvert du lundi au samedi aux heures locales (GMT+1) définies comme suit:</p>
                    <br/>
                    <br/> 

                    <div class="edt">
<!--                         <div class="tableau">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Jours</th>
                                        <th>Heures</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lundi</td>
                                        <td>08H - 17H</td>
                                    </tr>
                                    <tr>
                                        <td>Mardi</td>
                                        <td>08H - 17H</td>
                                    </tr>
                                    <tr>
                                        <td>Mercredi</td>
                                        <td>08H - 17H</td>
                                    </tr>
                                    <tr>
                                        <td>Jeudi</td>
                                        <td>08H - 17H</td>
                                    </tr>
                                    <tr>
                                        <td>Vendredi</td>
                                        <td>08H - 17H</td>
                                    </tr>
                                    <tr>
                                        <td>Samedi</td>
                                        <td>09H - 14H</td>
                                    </tr>
                                    <tr>
                                        <td>Dimanches</td>
                                        <td>Fermées</td>
                                    </tr>
                                </tbody>    

                            </table>
                        </div> -->

                        <div  style = "display : grid; place-items : justify; grid-template-columns: repeat(2,20%);grid-template-rows: repeat(8,7%);">
                            <div  style = "font-size : 20px; padding-left : 10px; margin : 1px;border : solid 1px;"><b>Jours</b></div>
                            <div  style = "font-size : 20px; padding-left : 10px; margin : 1px;border : solid 1px;"><b>Heures</b></div>
                        
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;"><b>Lundi</b></div>
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;">08H - 17H</div>
                        
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;"><b>Mardi</b></div>
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;">08H - 17H</div>
                        
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;"><b>Mercredi</b></div>
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;">08H - 17H</div>
                        
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;"><b>Jeudi</b></div>
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;">08H - 17H</div>
                        
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;"><b>Vendredi</b></div>
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;">08H - 17H</div>
                        
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;"><b>Samedi</b></div>
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;">09H - 14H</div>
                        
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;"><b>Dimanches</b></div>
                            <div  style = "padding-left : 10px; margin : 1px;border : solid 1px;">Fermées</div>
                        </div>
                            
                        
                        <div class="card" style="width: 100%; height:500px;">
                            <div class="card-body">
                                <h5 class="card-title1">Centre d'appel</h5><br/><br/><br/><br/>
                                <h3 class="card-title">+229 23 33 69 00</h3><br/><br/><br/><br/>
                                <p class="card-texte">Disponible aux heures d'ouverture de notre agence*</p><br/>
                            </div>
                        </div>
                    </div>
                <br/>
				<br/>
<!-- footer -->

            <footer class="container-fluid footer">
               
			<h6>copyright SDE 2021</h6>
            </footer>


            
            <script src="diaporama.js"></script>

        </body>
    </html>
