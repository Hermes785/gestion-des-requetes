<?php require_once("db.php"); ?>
<?php require_once("sessions.php"); ?>
<?php require_once("functions.php"); ?>
<?php
if (isset($_POST["Submit"])) {
    $Username = mysqli_real_escape_string($Connection, $_POST["NomUser"]);
    $Password = mysqli_real_escape_string($Connection, $_POST["Password"]);

    $FoundAccount = Login_AttemptE($Username, $Password);
    if ($FoundAccount) {
        $_SESSION["User_Id"] = $FoundAccount["id"];
        $_SESSION["User"] = $FoundAccount["nom_user"];
        $_SESSION["Nom"] = $FoundAccount["nom"];
        $_SESSION["PrenomE"] = $FoundAccount["prenom"];
        $_SESSION["email"] = $FoundAccount["email"];
        $_SESSION["password"] = $FoundAccount["password"];
     

        if ($Username=='noubankamanuela@myiuc.com' and $Password==012) {
            Redirect_to("voirtous.php");
        } 
        else {
            $_SESSION["SuccessMessage"] = "Bienvenue {$_SESSION["User"]} !";

            Redirect_to("dashboard.php");
        }
    
       
    }
    
    else {
        $_SESSION["ErrorMessage"] = "E-mail et/ou mot de passe incorrect!";
        Redirect_to("connexionEns.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/font.css">
</head>

<body id="o">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3">
                                <div class="p-5">
                                <span>
                                       <img src="i.PNG" width="100px" style=" margin-left: 40px">
                                       <img src="3.PNG" alt="jjj" width="100px" style=" margin-left: 100px">
                                    </span>
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Compte Enseignant</h4>
                                    </div>
                                    <div class="container">
                                        <div> <?php echo ErrorMessage(); ?></div>
                                        <div><?php echo SuccessMessage(); ?></div>
                                    </div>
                                    <form class="user" action="connexionEns.php" method="POST">
                                        <div class="form-group"><input class="form-control form-control-user" type="text" placeholder="Nom d'utilisateur" name="NomUser"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" placeholder="Mot de Passe" name="Password"></div><button class="btn btn-danger btn-block text-white btn-user" type="submit" name="Submit">Connexion</button>
                                        <hr>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="connexionEtd.php">&lt;&lt; Retour vers espace Etudiant</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php    require_once("footer.php")  ;     ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>