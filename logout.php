<?php require_once("Sessions.php"); ?>
<?php require_once("Functions.php"); ?>
<?php
$_SESSION["User_id"] = null;
session_destroy();
Redirect_to("connexionEtd.php")
?>