<?php 
    include("connectBdd.php");
    $username = $_POST["username"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $pseudo = $_POST["pseudo"];
    $password = $_POST["pass"];
    $passConfirm = $_POST["pass2"];
    $agendaId=0;
    $noRobot = false;
    $passWrong = 0;

    //L'unicité du Username et Pseudo:
    $sqlUnique = "SELECT nomUtilisateur,pseudo FROM utilisateur WHERE nomUtilisateur = '$username' OR pseudo = '$pseudo';";
    $resultatUnique = mysqli_query($link, $sqlUnique);
    $var2 = mysqli_fetch_array($resultatUnique);
    if($var2){
        setcookie("notUnique", 0, time()+60);
        $notUnique = 0;
    }
    else{
        setcookie("notUnique", 1, time()+60);
        $notUnique = 1;
    }
    //si les mots de passe ne sont pas identiques
    if($password != $passConfirm){
        setcookie("passWrong",0,time()+60);
        $passWrong = 0;
    }
    else{
        setcookie("passWrong",1,time()+3600);
        $passWrong = 1;
    }
    if(isset($_POST["noRobot"]))
        $noRobot = true;
    //Agenda's id generation
    $sqlAgenda ="SELECT Max(agenda) a FROM utilisateur;";
    $resultatAgenda = mysqli_query($link,$sqlAgenda);
    $var = mysqli_fetch_array($resultatAgenda);
    $agendaId= (int)$resultatAgenda +1;
    if($var["a"] != NULL)
            $agendaId = $var["a"] + 1;
    else
            $agendaId=0;
    //Insert everything into the Data Base
     $sqlInsert ="INSERT INTO `agenda`.`utilisateur` (`nomUtilisateur`, `motDePasse`, `nom`, `prenom`, `pseudo`, `agenda`) VALUES ('$username', '$password', '$nom', '$prenom', '$pseudo', '$agendaId');";
    //Not do it until everything is set up :
    if($passWrong == 1 && $noRobot == true && $notUnique == 1)
    {
        $resultat = mysqli_query($link,$sqlInsert);
        header('location:successfulJoin.php');
    }
    else
        header('location:join.php');
?>