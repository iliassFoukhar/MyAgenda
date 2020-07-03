<?php 
    include("connectBdd.php");
   
    if(!empty($_POST["message"]))
    {
    $msg = $_POST["message"];
    $id = $_GET["id"];
    $sql = "UPDATE `agenda`.`message` SET `message` ='$msg' WHERE `message`.`idMessage` = '$id';";
    $result = mysqli_query($link, $sql);
    header("location: user.php?id=".$_SESSION["agenda"]);
    }
?>