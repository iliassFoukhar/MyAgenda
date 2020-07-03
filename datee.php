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
    <body style="background-color : #cac3c3;">
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
        <!-- The whole body -->
        <div class="container" style="margin-top : 30px; margin-bottom : 30px;">
        <div class="row text-center">
            <!-- Messages -->
            <div class ="col-md-12" style="border : double black 3px;border-radius : 5px;background-color:#343a40; padding : 0 0 10px 0;">
                <h3 style="color : white;text-shadow : 1px 1px 2px #343a40;font-weight : 100;background-color : black;padding : 20px 0;"><?php echo "Journal du : ".$_GET["date"];  ?></h3>
                <?php 
                    include("connectBdd.php");
                    echo "<img class='aboutIcons' src='img/agenda.png'>"."<br><br>";
                    //     <!--  Publish a msg  -->
                    // remove your messages and modify them
                    
                    if($_SESSION["agenda"] == $_SESSION["agendaToPost"])
                    {  
                        $x = $_SESSION["agendaToPost"];
                        $sqlPseudoToPost = "SELECT * FROM utilisateur WHERE agenda = '$x';";
                        $resulii = mysqli_query($link, $sqlPseudoToPost);
                        $rowii = mysqli_fetch_array($resulii);
                        $hisAgenda = $_SESSION["agenda"];
                        $pseudo = $rowii[4];
                    }
                    else if($_SESSION["agenda"] != $_SESSION["agendaToPost"])
                    {
                        $pseudo = $_SESSION["pseudo"];
                        $hisAgenda = $_SESSION["agendaToPost"];
                    }
                    $agenda = $_SESSION["agenda"]; // to be taken care of
                    echo '
                    <form method ="post" action = "sendMsg.php?id='.$hisAgenda.'">
                    <div class="form-group shadow-textarea">
                    <label style ="color : black; text-shadow : 1px 1px 1px grey; border : solid 2px black;background-color : #77b3d4; border-radius : 20px; padding : 5px 10px;"for="pub">Publier un message sur l\'agenda N° : '.'<span style="color : white;font-weight: 300;text-shadow : 1px 1px 2px black;font-size : 19px;">'.$hisAgenda.'</span>'.'</label>
                    <textarea class="form-control z-depth-1" name="message" rows="3" placeholder="Message..."></textarea>
                    
                    <a href="sendMsg.php"><button type="submit" name='."add".' class="float-right btn btn-success btn-sm" style="position :relative; right : 10px; top : 4px;">Publier</button></a></div>
                    </form> <br>';
                
                    //show mesages
                    $user = $_SESSION["agenda"];
                    $msgExist = false;
                    $actualDate = $_GET["date"];
                    $agendaToShare = $_SESSION["agendaToPost"];
                    $sqlMsg = "SELECT * FROM message WHERE agendaId = '$agendaToShare'  AND date = '$actualDate';";
                    $resultMsg = mysqli_query($link,$sqlMsg);
                    //error emptyness
                    if(mysqli_num_rows($resultMsg) == 0)
                    {
                        echo "<p style=\"color : orange; font-size : 12px; border-top : white solid 2px;position : relative; top : 10px; padding : 3px;\">Vous n'avez pas de messages.</p>";
                    }
                    //affichage
                    while($row = mysqli_fetch_array($resultMsg))
                    {
                        echo "<div style='border-top : solid 2px white; padding : 15px 10px 8px 10px; border-radius : 0 ;'>";
                        //affichage du pseudo d'auteur
                        echo "<p align='center' style='color : white; text-shadow : 1px 1px 2px black;background-color : brown;padding : 3px 7px 3px 7px;border-radius: 30px;border : 1px solid black; font-size : 15px;margin : 0 40%;'>".$row[4]." </p>";
                        //affichage du message lui même
                        echo "<p align='center' style='color : white; text-shadow : 1px 1px 2px black;padding : 30px 0;font-size : 18px; padding : 15px 20px;'>".$row[1]."</p>";
                        //Edit And remove buttons  
                        if($agenda == $_SESSION["agendaToPost"])
                        {
                            echo '<form method="post" action="removeMsg.php?id='.$row[0].'"><a href="removeMsg.php?id='.$row[0].'"><button type="submit" name='."removeMsg.php?id=".$row[0].' class="float-right btn btn-alert btn-sm" style="position :relative; right : 0;color:white;bottom : 25px;background-color : brown;">x</button></a></form>';
                        }

                        if($pseudo == $row[4])
                        {
                            echo '<form method="post" action="removeMsg.php?id='.$row[0].'"><a href="removeMsg.php?id='.$row[0].'"><button type="submit" name='."removeMsg.php?id=".$row[0].' class="float-right btn btn-alert btn-sm" style="position :relative; right : 0;color:white;bottom : 25px;background-color : brown;">x</button></a></form>';
                            echo '<form method="post" action="editMsg.php?id='.$row[0].'"><a href="editMsg.php?id='.$row[0].'"><button type="submit" name='."editMsg.php?id=".$row[0].' class="float-right btn btn-alert btn-sm" style="position :relative; right : 5px;bottom : 25px;background-color : gold;">Modifier</button></a></form>';
                        }

                        
                        echo "</div>";
                    }
                //spacing from bottom
                echo "<p></p><br>";
                ?>
            </div></div></div>                
                <?php
                ob_end_flush();
                ?>
        <br>
            <!-- 2 -->
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