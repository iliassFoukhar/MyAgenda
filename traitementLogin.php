<?php 
    include("connectBdd.php");
    $username = $_POST["username"];
    $password = $_POST["pass"];
    $pseudo = "";
    $agenda=0;
    $sql = "SELECT nomUtilisateur,motDePasse,pseudo,agenda FROM utilisateur WHERE nomUtilisateur = '$username' AND motDePasse = '$password';";
    if(isset($_POST["username"]) && isset($_POST["pass"]))
    {
        $result = mysqli_query($link,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row == 0)
        {            
            echo "MotDePasse ou login faux";
            setcookie("loginWrong", 0, time() + 60);
            header('location:login.php');
        }
        else
        {
            session_start();
            $_SESSION["username"] = $username;
            $pseudo = $row["pseudo"];
            $agenda = $row["agenda"];
            $_SESSION["pseudo"] = $pseudo;
            $_SESSION["agenda"] = $agenda;
            echo "loginApproved \n";
            echo "pseudo : \n".$_SESSION["pseudo"];
            echo "username : \n".$_SESSION["username"];
            setcookie("loginWrong", 1, time() + 3600);
            header("location: user.php?id=".$agenda);
        }
    }
?>