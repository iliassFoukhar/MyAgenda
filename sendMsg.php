<?php 
    session_start();
    include("connectBdd.php");
    $msg = $_POST["message"];
    $sqlMaxIdMsg = "SELECT Max(idMessage) a FROM message";
    $agenda= $_SESSION["agenda"];
    $resultMax = mysqli_query($link, $sqlMaxIdMsg);
    while($var = mysqli_fetch_array($resultMax))
    $maxId = $var[0];
    $maxId = $maxId + 1;
    $pseudo = $_SESSION["pseudo"];
    $date = date("y-m-d");
    
    if($_GET["id"] == $_SESSION["agenda"])
    {
        $agendaToPostTo = $agenda;
        $direction = "user.php?id=".$agendaToPostTo;
    }
    else if($_GET["id"] == $_SESSION["agendaToPost"])
    {
        $agendaToPostTo = $_SESSION["agendaToPost"];
        $direction = "otheruser.php?id=".$agendaToPostTo;
    }
    $sql = "INSERT INTO message VALUES ('$maxId', '$msg', '$date', '$agendaToPostTo','$pseudo' )";
    if(!empty($_POST["message"]))
        $result = mysqli_query($link, $sql);
    //if user if other
    header('location: '.$direction);
?>