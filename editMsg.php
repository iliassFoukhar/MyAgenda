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
    <body style="background-color : #3a3a3a;">
    <!-- NavBar -->
        
        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
            <div class="container-fluid">
                <?php 
                ob_start();
                session_start();
                echo '<a class="navbar-brand" href="user.php?id="'.$_SESSION["agenda"].' style="color : orange; font-family : "Varela Round";">My Agenda</a>';
                ?>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <?php 
                            echo "<a class="."nav-link"." href="."user.php?id=".$_SESSION["agenda"].">Home</a>";
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about_Logged.php">About</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link active" href="about_Logged.php">Journal</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- TO EDIT A MSG -->
        <?php
        //     <!--  Publish a msg  -->
                    include("connectBdd.php");
                    $pseudo = $_SESSION["pseudo"];
                    $agenda = $_SESSION["agenda"]; // to be taken care of
                    $msg = $_GET["id"];
                    $sql ="SELECT * FROM message WHERE idMessage =".$msg;
                    $result = mysqli_query($link,$sql);
                    $var = mysqli_fetch_array($result);
                    if($_SESSION["pseudo"] == $var[4])
                    {
                    echo '
                    <form method ="post" action = "traitModifMsg.php?id='.$msg.'">
                    <div class="form-group shadow-textarea w-75">
                    <label align="center" style ="color : black; text-shadow : 1px 1px 1px grey; border : solid 2px black;background-color : orange; border-radius : 20px; padding : 5px 10px;margin : 10px 33%;"for="pub">Modifier un message sur l\'agenda de : '.'<span style="color : white;font-weight: 300;text-shadow : 1px 1px 2px black;font-size : 19px;">'.$pseudo.'</span>'.'</label>
                    <textarea style="margin : 0 5%;"class="form-control z-depth-1" name="message" rows="3" placeholder='.$var[1].'></textarea>
                   
                    <a href="traitModifMsg.php?id='.$msg.'"><button type="submit" name='."add".' class="float-right btn btn-success btn-sm" style="position :relative; left : 10px; top : 4px;">Modifier</button></a></div>
                    </form> <br>';
                    }
                else{
                    echo "<p align=\"center\"style=\"font-size: 20px; color  : white;\">C'est impossible de modifier un message que vous n'avez pas écrit ! </p>";
                }
                ob_end_flush();
                ?>
            
        

        <br>
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
                    <p>&copy;All Rights reserved to Musketeers !</p>
                </div>
            </div>
            </div>
        </footer>
    </body>
</html>