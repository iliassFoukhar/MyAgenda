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
                        <li class="nav-item active">
                            <?php 
                            echo "<a class="."nav-link"." href="."user.php?id=".$_SESSION["agenda"].">Home</a>";
                            ?>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about_Logged.php">About</a>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- The whole body -->
        <div class="container" style="margin-top : 30px; margin-bottom : 30px;">
        <div class="row text-center">
            <!-- Personal Info And Disconnection -->
            <div class ="col-md-3 h-50" style="border : double black 3px;border-radius : 5px;background-color:#343a40; padding : 0 0 10px 0;position :relative; right : 50px; height : 100%;">

                <h3 style="color : white;text-shadow : 1px 1px 2px #343a40;font-weight : 100;background-color : black;padding : 20px 0;">Son Compte</h3>
                <?php 
                    include("connectBdd.php");
                    $sql = "SELECT * FROM utilisateur WHERE agenda =".$_GET["id"];
                    $result = mysqli_query($link,$sql);
                    $roww = mysqli_fetch_assoc($result);
                    $hisPseudo = $roww["pseudo"];
                    echo "<img class='aboutIcons' src='img/userAgenda.png'>"."<br>";
                    echo "<h5 style='color:orange;text-shadow : 1px 1px 2px black;'>Pseudo : </h5>"."<h4 class='infoText'>".$hisPseudo."</h4><br>";
                    echo "<h5 style='color : orange;text-shadow : 1px 1px 2px black;'>Agenda N°:</h5>"."<h4 class='infoText'>".$_GET["id"]."</h4><br>";
                ?>
                <?php 
                //check if friends already or not !
                include("connectBdd.php");
                $hissAgenda = $_GET["id"];
                $agenda = $_SESSION["agenda"];
                $sqlFriends = "SELECT * FROM amitie WHERE (idAgenda1= '$agenda' AND idAgenda2 = '$hissAgenda' )OR(idAgenda1 = '$hissAgenda' AND idAgenda2 = '$agenda');";
                $resultFriends = mysqli_query($link, $sqlFriends);
                if(mysqli_num_rows($resultFriends)==0)
                {
                    echo '<a href="sendRequest.php?id='.$_GET["id"].'"><button type="button" class="btn btn-warning btn-lg">Ajouter</button></a>';  
                    $_SESSION["friends"] = 0;                
                }

                else if(mysqli_num_rows($resultFriends)>0)
                {
                    echo "<p style =\"font-size : 20px; color : orange;text-shadow : 1px 1px 2px black;\">C'est déja ton ami</p>";
                    $_SESSION["friends"] = 1;
                }
                echo "<p></p>";
                ?>
                 <!-- Demande d'amis -->
        <div class="text-center" style="margin-top : 30px; margin-bottom : 30px;">
            
            <div class ="col-md-12" style="border : double black 3px;border-radius : 5px;background-color:#343a40; padding : 0 0 10px 0;position : relative; top : 40px;">

                <h3 style="color : white;text-shadow : 1px 1px 2px #343a40;font-weight : 100;background-color : black;padding : 20px 0;">Demande d'amis</h3>
                <?php 
                    include("connectBDD.php");
                    echo "<img class='aboutIcons' src='img/demande.png'>"."<br>";
                    $agenda = $_SESSION["agenda"];
                    //querries to pull requests
                    $sqlQuerry = "SELECT requested FROM demande WHERE '$agenda' = requester";
                    //results of querries to pull friendships
                    $result = mysqli_query($link, $sqlQuerry);
                    //result of friends names from agenda ID
                    if(mysqli_num_rows($result) == 0)
                    {
                        echo "<p style=\"color : gold; font-size : 12px;\">Vous n'avez pas d'invitations</p>";
                    }
                    while($var = mysqli_fetch_array($result))
                    {
                        $requester = $var["requested"];
                        $sqlQuerry2 = "SELECT * FROM utilisateur WHERE agenda = '$requester'";
                        $resultat2 = mysqli_query($link,$sqlQuerry2);
                        while($var2 = mysqli_fetch_array($resultat2))
                        {
                            $agendaToAdd=$var2["agenda"];
                            //buttons
                            echo '
                            <form method="post" action="removeRequest.php">
                            <a href="removeRequest.php"><button type="submit" name='."remove".$agendaToAdd.' class="float-right btn btn-danger btn-sm" style="position :relative; right : 5px;">X</button></a></form>';
                            echo'<form method="post" action="acceptRequest.php"><a href="acceptRequest.php"><button type="submit" name='."add".$agendaToAdd.' class="float-right btn btn-success btn-sm" style="position :relative; right : 10px;">+</button></a></form>'
                            ;
                            //user filter
                            echo "<a class =\"userButton\" style =\"text-decoration : none;\"href=\"otheruser.php?id=".$agendaToAdd."\"><h3 style ='color : white; text-shadow : 1px 1px 2px black;'onMouseOver=\"this.style.color='orange'\"onMouseOut=\"this.style.color='white'\">".$var2['pseudo']."</h3></a>";
                        }
                    }
                     
                    
                //spacing from search bar
                echo "<p></p><br>";
                ?>
                </div>                
        </div>                
                </div>
                   

            <!-- Messages -->
            <div class ="col-md-6" style="border : double black 3px;border-radius : 5px;background-color:#343a40; padding : 0 0 10px 0;">
                <h3 style="color : white;text-shadow : 1px 1px 2px #343a40;font-weight : 100;background-color : black;padding : 20px 0;">Messages</h3>
                <?php 
                    include("connectBdd.php");
                
                    //access the agenda from pseudo
                    $sqlHisAgenda= "SELECT * FROM utilisateur WHERE pseudo ='$hisPseudo';";
                    $resultHisAgenda = mysqli_query($link,$sqlHisAgenda);
                    $rowww = mysqli_fetch_array($resultHisAgenda);
                    $hisAgenda = $rowww[5];
                    //show mesages
                    $user = $_SESSION["agenda"];
                    $msgExist = false;
                    $sqlMsg = "SELECT * FROM message WHERE agendaId = '$hisAgenda' ORDER BY date DESC;";
                    $resultMsg = mysqli_query($link,$sqlMsg);
                    echo "<img class='aboutIcons' src='img/agenda.png'>"."<br><br>";
                    //     <!--  Publish a msg  -->
                    $pseudo = $_SESSION["pseudo"];
                    $agenda = $hisAgenda; 
                    $_SESSION["agendaToPost"] = $hisAgenda;
                    //show messages and publish them if friends
                    if(isset($_SESSION["friends"]) && $_SESSION["friends"] == 1)
                    {
                    echo '
                    <form method ="post" action = "sendMsg.php?id='.$hisAgenda.'">
                    <div class="form-group shadow-textarea">
                    <label style ="color : black; text-shadow : 1px 1px 1px grey; border : solid 2px black;background-color : #77b3d4; border-radius : 20px; padding : 5px 10px;"for="pub">Publier un message sur l\'agenda de : '.'<span style="color : white;font-weight: 300;text-shadow : 1px 1px 2px black;font-size : 19px;">'.$hisPseudo.'</span>'.'</label>
                    <textarea class="form-control z-depth-1" name="message" rows="3" placeholder="Message..."></textarea>
                    
                    <a href="sendMsg.php?id='.$hisAgenda.'"><button type="submit" name='."add".' class="float-right btn btn-success btn-sm" style="position :relative; right : 10px; top : 4px;">Publier</button></a></div>
                    </form> <br>';
                    
                    //error emptyness
                    if(mysqli_num_rows($resultMsg) == 0)
                    {
                        echo "<p style=\"color : orange; font-size : 12px; border-top : white solid 2px;position : relative; top : 10px; padding : 3px;\">Il n'a pas de messages.</p>";
                    }
                    //affichage
                    while($row = mysqli_fetch_array($resultMsg))
                    {
                        echo "<div style='border-top : solid 2px white; padding : 15px 10px 8px 10px; border-radius : 0 ;'>";
                        //affichage du pseudo d'auteur
                        echo "<p align='center' style='color : white; text-shadow : 1px 1px 2px black;background-color : brown;padding : 3px 7px 3px 7px;border-radius: 30px;border : 1px solid black; font-size : 15px;margin : 0 40%;'>".$row[4]." </p>";
                        //affichage du message lui même
                        echo "<a href="."datee.php?date=".$row[2]."><p align='center' style='color : white; text-shadow : 1px 1px 2px black;padding : 30px 0;font-size : 18px; padding : 15px 20px;'>".$row[1]."</p></a>";
                        //affichage de la date et accès à la page du date
                        echo "<p align='right' id='datee' style=\"color : orange; font-size : 11px; text-shadow: 1px 1px 2px black; background-color : #3a3a3a;padding : 3px 0 3px 3px; border-radius : 20px; margin : 0 0 0 87%;border : 1px solid orange;\">".$row[2]."&nbsp;&nbsp</p>";
                        echo "</div>";
                    }
                    }
                else
                    echo "<p style =\"color : orange; font-size: 22px; text-shadow : 1px 1px 2px black;\">Vous n'avez pas le droit de figurer son agenda, invitez ce profil à être votre ami.</p>";
                //spacing from bottom
                echo "<p></p><br>";
                ?>
            </div>
            <!-- Friends -->
            <div class ="col-md-3" style="border : double black 3px;border-radius : 5px;background-color:#343a40; padding : 0 0 10px 0;position :relative; left : 50px;">
                <h3 style="color : white;text-shadow : 1px 1px 2px #343a40;font-weight : 100;background-color : black;padding : 20px 0;">Amis</h3>
                <?php 
                    include("connectBDD.php");
                
                
                    echo "<img class='aboutIcons' src='img/agenda1.png'>"."<br>";
                
                //<!---SEARCH BAR--->
                echo'<form method="post" action="traitSearch.php"><div class="input-group xs-form form-xs form-1 pl-0" style=""><div class="input-group-prepend"><span class="input-group-text cyan lighten-2" style=" background-color : orange; border : 1px solid orange;"><i class="fas fa-search text-blue"aria-hidden="true"></i></span></div><input name="searchBar" class="form-control my-0 py-1" type="text" placeholder="Retrouvez un ami" aria-label="Search"></div></form><br>';
                    //notfound !
                    if(isset($_COOKIE["notFound"]))
                    {
                        if($_COOKIE["notFound"] == 1)
                        {
                            echo "<p style=\"color : orange; font-size : 12px;\">Pas d'utilisateur avec le nom recherché !</p>";
                        }
                    }
                    setcookie("notFound", 0, time()+100);
                    //agenda
                    $agenda = $_SESSION["agenda"];
                    //querries to pull friendships
                    $sqlQuerry1 = "SELECT idAgenda1 FROM amitie WHERE '$agenda' = idAgenda2";
                    $sqlQuerry2 = "SELECT idAgenda2 FROM amitie WHERE '$agenda' = idAgenda1";
                    //results of querries to pull friendships
                    $result1 = mysqli_query($link, $sqlQuerry1);
                    $result2 = mysqli_query($link,$sqlQuerry2);
                    //error msg
                    if(mysqli_num_rows($result1) == 0 && mysqli_num_rows($result2)==0)
                    {
                        echo "<p style=\"color : gold; font-size : 12px;\">Vous n'avez pas d'amis. Pensez à inviter des uns.</p>";
                    }
                    //result of friends names from agenda ID
                    while($var1 = mysqli_fetch_array($result1))
                    {
                        $currentAgenda1 = $var1["idAgenda1"];
                        $sqlQuerry3 = "SELECT * FROM utilisateur WHERE agenda = '$currentAgenda1'";
                        $resultat3 = mysqli_query($link,$sqlQuerry3);
                        while($var3 = mysqli_fetch_array($resultat3))
                        {
                            $agendaToRemove=$var3["agenda"];
                            echo '<form method="post" action="removeFriend.php"><a href="removeFriend.php"><button type="submit" name='."remove".$agendaToRemove.' class="float-right btn btn-alert btn-sm" style="position :relative; right : 10px;background-color : orange;">x</button></a></form>';
                            echo "<a class =\"userButton\" style =\"text-decoration : none;\"href=\"otheruser.php?id=".$agendaToRemove."\"><h3 style ='color : white; text-shadow : 1px 1px 2px black;'onMouseOver=\"this.style.color='orange'\"onMouseOut=\"this.style.color='white'\">".$var3['pseudo']."</h3></a>";
                        }
                    }
                    while($var2 = mysqli_fetch_array($result2))
                    {
                        $currentAgenda2 = $var2["idAgenda2"];
                        $sqlQuerry4 = "SELECT * FROM utilisateur WHERE agenda = '$currentAgenda2'";
                        $resultat4 = mysqli_query($link,$sqlQuerry4);
                        while($var4 = mysqli_fetch_array($resultat4))
                        {
                            $agendaToRemove=$var4["agenda"];
                            echo '<form method="post" action="removeFriend.php"><a href="removeFriend.php"><button type="submit" name='."remove".$agendaToRemove.' class="float-right btn btn-alert btn-sm" style="position :relative; right : 10px;background-color : red;">x</button></a></form>';
                            echo "<a style =\"text-decoration : none;\"href=\"otheruser.php?id=".$agendaToRemove."\"><h3 style ='color : white; text-shadow : 1px 1px 2px black;'onMouseOver=\"this.style.color='orange'\"
   onMouseOut=\"this.style.color='white'\">".$var4['pseudo']."</h3></a>";
                        }
                    }        
                    
                //spacing from search bar
                echo "<p></p><br>";
                ob_end_flush();
                ?>
                
        </div>
        </div>
        </div>

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