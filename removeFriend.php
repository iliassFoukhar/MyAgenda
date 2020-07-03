<?php 
    session_start();
    include("connectBdd.php");
    $sql = "SELECT max(agenda) a FROM utilisateur";
    $nbUsersResult = mysqli_query($link,$sql);
    $var = mysqli_fetch_array($nbUsersResult);
    $nbUsers = $var['a'];
    for($i = 0; $i < $nbUsers + 1;$i++)
    {
        if(isset($_POST["remove".$i]))
        {
            $sqlDelete = "DELETE FROM amitie WHERE idAgenda1 = '$i' OR idAgenda2 = '$i'";
            $resultat = mysqli_query($link,$sqlDelete);
            header('location: user.php?id='.$_SESSION["agenda"]);
        }
    }

//agenda to remove khasha tgad mzyan
?>
