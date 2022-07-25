<?php require_once("db.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("sessions.php"); ?>
<?php Login_Confirm() ?>
<?php
if (isset($_POST["Submit"])) {
    $Username = mysqli_real_escape_string($Connection, $_POST["User"]);
    $Email = mysqli_real_escape_string($Connection, $_POST["Email"]);
    $Adresse = mysqli_real_escape_string($Connection, $_POST["Adresse"]);

    if (empty($Username) or empty($Email) or empty($Adresse)) {
        $_SESSION["ErrorMessage"] = "Tous les champs doivent être remplis!";
        Redirect_to("infos.php");
    } else {
        global $Connection;
        $Query = "UPDATE etud SET nom_user='$Username',email='$Email',adresse='$Adresse'";
        $Execute = mysqli_query($Connection, $Query);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "Modification Effectuée!";
            Redirect_to("logout.php");
        } else {
            $_SESSION["ErrorMessage"] = " Une erreur est survenue !";
            Redirect_to("infos.php");
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Informations Etudiant</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/font.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php require_once("sidebare.php")?>
                <div class="container-f">
                    <h3 class="text-dark mb-4 text-center">Informations Etudiant</h3>
                    <div class="container">
                        <div> <?php echo ErrorMessage(); ?></div>
                        <div><?php echo SuccessMessage(); ?></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-12 offset-lg-3">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-danger m-0 font-weight-bold">Etudiant</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="infos.php" method="POST">
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Matricule</strong><br></label><input class="form-control" type="text" name="Matricule" value='<?php echo $_SESSION["Matricule"] ?>' disabled></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>Nom Utilisateur</strong><br></label><input class="form-control" type="text" name="User" value='<?php echo $_SESSION["User"] ?>'></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>Nom(s)</strong><br></label><input class="form-control" type="text" name="Nom" value='<?php echo $_SESSION["NomE"] ?>' disabled></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Prenom(s)</strong><br></label><input class="form-control" type="text" name="Prenom" value='<?php echo $_SESSION["PrenomE"] ?>' disabled></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>Classe</strong><br></label><input class="form-control" type="text" name="Classe" value='<?php echo $_SESSION["ClasseE"] ?>' disabled></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Email</strong><br></label><input class="form-control" type="email" name="Email" value='<?php echo $_SESSION["EmailE"] ?>'></div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><label for="address"><strong>Addresse</strong></label><input class="form-control" type="text" name="Adresse" value='<?php echo $_SESSION["AdresseE"] ?>'></div>

                                                <div class="form-group"><button class="btn btn-success btn-sm" type="Infos_Submit" name="Submit">Enregistrer</button></div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-5"></div>
                </div>
            </div>
             <?php    require_once("footer.php")  ;     ?>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
            <script src="assets/js/script.min.js"></script>
</body>

</html>