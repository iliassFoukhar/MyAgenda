<?php 
session_start();
include("connectBdd.php");
$agenda= $_SESSION["agenda"];
$sqlMax = "SELECT MAX(agenda) a FROM utilisateur;";
$resultatMax = mysqli_query($link,$sqlMax);
$var = mysqli_fetch_assoc($resultatMax);
$max = $var["a"];

for($i = 0; $i < $max + 1;$i++)
{
    echo "$i"."<br>";
    if(isset($_POST["add".$i]))
    { 
        $sql = "INSERT INTO `agenda`.`amitie` (`idAgenda1`, `idAgenda2`) VALUES ('$i', '$agenda')";
        $sql2 = "DELETE FROM demande WHERE requested = '$i' AND requester = '$agenda' ;";
        break;
    }
}
    $result = mysqli_query($link, $sql);
    $result2 = mysqli_query($link, $sql2);
    header('location: user.php?id='.$agenda);
   
?>