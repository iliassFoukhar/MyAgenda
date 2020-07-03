<?php 
session_start();
include('connectBdd.php');
$found = false;
if(!empty($_POST["searchBar"])){
    $searchedName = $_POST["searchBar"];
    $sql = "SELECT pseudo,agenda FROM utilisateur WHERE pseudo='$searchedName';";
    echo "!empty";
}
else{
    $sql = "SELECT nomUtilisateur,agenda FROM utilisateur WHERE nomUtilisateur ='nothingnonononononnononn';";    
    echo "hh else";
}
$result = mysqli_query($link, $sql);
while($var = mysqli_fetch_assoc($result))
{   
        $agendaLookingFor = $var["agenda"];
        $found=true;
        echo "found";
        header('location: otheruser.php?id='.$agendaLookingFor);
}
        echo "not";
        if($found == false)
        {
        setcookie("notFound", 1, time()+30);
        header('location: user.php?id="'.$_SESSION["agenda"].'"');
        }
?>