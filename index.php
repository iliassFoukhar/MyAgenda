<!DOCTYPE HTML>
<html lang="fr">
    <head>
        <title>Agenda</title>
        <meta charset="utf-8"/>
        <meta name="author" content="Iliass Foukhar & Hamza Benjelloun"/>
        <meta name="description" content ="Publiez du contenu dans les agendas de vos amis"/>
        <meta name="keywords" content="agenda, amis, reseau, social"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Varela+Round&display=swap" rel="stylesheet">
        <!-- Bootstrap   -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	   <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
        <link href="main.css" type="text/css" rel="stylesheet"/>

    </head>
    <body>
    <!-- NavBar -->
        
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php" style="color : orange; font-family : 'Varela Round';">My Agenda</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="join.php">Join</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="login.php">Connect</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
            <!-- Slider -->
        <div id="slides" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#slides" data-slide-to="0" class="active"></li>
                <li data-target="#slides" data-slide-to="1" class="active"></li>
                <li data-target="#slides" data-slide-to="2" class="active"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100"src="img/slide0.jpg">
                    <div class="carousel-caption">
                        <h1 class="display-2">My Agenda</h1>
                        <h3>Rejoins tes amis sur My Agenda</h3>
                        <a href="join.php"><button type="button" class="btn btn-warning btn-lg">S'enregister</button></a>
                        <a href="login.php"><button type="button" class="btn btn-success btn-lg">Se Connecter</button></a>
                    </div>
                </div>
                
                <div class="carousel-item">
                <img class="d-block w-100" src="img/slide2.jpg">
                        <div class="carousel-caption">
                        <h1 class="display-2">My Agenda</h1>
                        <h3>Crée un compte et reçoit ton propre agenda !</h3>
                        <a href="join.php"><button type="button" class="btn btn-warning btn-lg">S'enregister</button></a>
                        <a href="login.php"><button type="button" class="btn btn-success btn-lg">Se Connecter</button></a>
                    </div>
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="img/slide1.jpg">
                        <div class="carousel-caption">
                        <h1 class="display-2">My Agenda</h1>
                        <h3>Commence à publier tes messages sur les agendas de tes amis !</h3>
                        <a href="join.php"><button type="button" class="btn btn-warning btn-lg">S'enregister</button></a>
                        <a href="login.php"><button type="button" class="btn btn-success btn-lg">Se Connecter</button></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer>
        <div class="container-fluid padding">
            <div class="row text-center">
                <div class="col-md-4">
                    <hr class="light">
                    <h3  style="color : orange;">My Agenda</h3>
                    <hr class="light">
                    <p>+212-700029411</p>
                    <p>nextgendevelopement@gmail.com</p>
                    <p>ENSA Kenitra</p>
                    <p>MAROC</p>
                </div>
                <div class="col-md-4">
                <hr class="light">
                    <h5>About us:</h5>
                    <hr class="light">
                    <p>Ensa Kenitra</p>
                    <p>Projet d'études</p>
                    <p>Module Base de Données</p>
                    <p>Encadré par Mme.CHAOUI</p>
                </div>
                <div class="col-md-4">
                <hr class="light">
                    <h5>Follow us on :</h5>
                    <hr class="light">
                    <a href="#" class="btn-floating btn-lg btn-fb" type="button" role="button"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn-floating btn-lg btn-gplus" type="button" role="button"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="btn-floating btn-lg btn-ins" type="button" role="button"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn-floating btn-lg btn-yt" type="button" role="button" ><i class="fab fa-youtube" ></i></a>
                    <a href="#" class="btn-floating btn-lg btn-tw" type="button" role="button" ><i class="fab fa-twitter" ></i></a>
                </div>
                <div class="col-12">
                <hr class="light">
                    <p>&copy;All Rights reserved to PauseTech !</p>
                </div>
            </div>
            </div>
        </footer>
    </body>
</html>