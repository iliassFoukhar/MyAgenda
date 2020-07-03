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
    <body style="background-image : url('img/slide2.jpg');background-repeat : no-repeat;  background-size: 130% 130%;background-position: right 30% top 10%;">
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
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="join.php">Join</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Connect</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        
        
           <!-- FORM -->
        <h2 style ="background-color:rgba(0,0,0,0.7); text-decoration : none; color:white; margin : 80px 33% 12px 33%;padding: 10px 10px; border-radius: 3px; border : solid 2px black;"align="center">Se connecter :</h2>
        
    <form id="loginForm" method="post" action="traitementLogin.php">
    <div class="form-group" align="center">
    <label for="username">Nom d'utilisateur :</label><br>
    <input type="text" class="form-control-md" placeholder="Iliass1999" name="username">
  </div>
    
    <div class="form-group" align="center">
    <label for="password">Mot de passe :</label><br>
    <input type="password" class="form-control-md" name="pass">
    <?php    if(isset($_COOKIE["loginWrong"])&&$_COOKIE["loginWrong"] == 0)
                {
            echo '<small id="passHelp" style="color:red" class="form-text text-alert">Mot de passe ou nom d\'utilisateur faux</small>';
                }
    ?>
  </div>
            <div class="form-row text-center">
    <div class="col-12">
        <button type="submit" class="btn btn-warning">Submit</button>
    </div>       
 </div>
</form>
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
                    <a href="#" class="btn-floating btn-lg btn-yt" type="button" role="button"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="btn-floating btn-lg btn-tw" type="button" role="button"><i class="fab fa-twitter"></i></a>
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