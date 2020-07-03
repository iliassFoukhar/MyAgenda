<?php 
    include("connectBdd.php");
    session_start();
    $requester = $_GET["id"];
    $requested = $_SESSION["agenda"];
    $sql = "INSERT INTO demande VALUES('$requested','$requester');";
    $result = mysqli_query($link,$sql);
    header("location: otheruser.php?id=".$requester);
?>