<?php
session_start();
$_SESSION["queid"]=$_GET["queid"];
$_SESSION["ansid"]=$_GET["ansid"];
    if(isset($_POST["ansins"]))
    {
        header('location :');
    }
    if(isset($_POST["like"]))
    {
        header('location:postanswer.php');
    }
?>