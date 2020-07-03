<?php 
session_start();
include("connectBdd.php");
$agenda= $_SESSION["agenda"];
$msgId = $_GET["id"];
$sql = "DELETE FROM message WHERE idMessage = ".$msgId.";";
$result  = mysqli_query($link, $sql);
if($result)
header('location: user.php?id='.$agenda);
?>