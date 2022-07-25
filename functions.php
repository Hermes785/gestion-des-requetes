<?php require_once("db.php"); ?>
<?php require_once("sessions.php"); ?>
<?php

function Redirect_to($NewLocation)
{
    header("Location:" . $NewLocation);
    exit;
}

function Login_Attempt($Username, $Password)
{
    global $Connection;
    $Query = "SELECT * FROM etud WHERE email='$Username' and matricule='$Password'";
    $Execute = mysqli_query($Connection, $Query);
    if ($admin = mysqli_fetch_assoc($Execute)) {
        return $admin;
    } else {
        return null;
    }
}

function Login_AttemptE($Username, $Password)
{
    global $Connection;
    $Query = "SELECT * FROM chefd WHERE email='$Username' and password='$Password'";
    $Execute = mysqli_query($Connection, $Query);

    if ($admin = mysqli_fetch_assoc($Execute)) {
        return $admin;
    } else {
        return null;
    }
}

function Login()
{
    if (isset($_SESSION["User_Id"])) {
        return true;
    }
}

function Login_Confirm()
{
    if (!login()) {
        $_SESSION["ErrorMessage"] = "Connexion nécessaire";
        Redirect_to("connexionEtd.php");
    }
}

function Login_ConfirmE()
{
    if (!login()) {
        $_SESSION["ErrorMessage"] = "Connexion nécessaire";
        Redirect_to("connexionEns.php");
    }
}

?>