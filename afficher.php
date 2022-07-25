<?php require_once("db.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("sessions.php"); ?>
<?php

  if (isset($_POST["val"])) {

$observe=$_POST["observation"];
$reqId= $_GET["reqId"];

if (empty($observe)) {

   $_SESSION["ErrorMessage"] = "veullez  donner une decision !";
            Redirect_to("afficher.php?reqId=".$reqId );
}
else  {
    $Connection;
    $query="UPDATE req SET observ='$observe' , etat='valide' WHERE id= $reqId ";
    $Execute=mysqli_query($Connection,$query);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "requete traitée avec succes";
        Redirect_to("afficher.php?reqId=".$reqId);
}  
    else {
   $_SESSION["ErrorMessage"] = "une erreur c'est produite !";
            Redirect_to("afficher.php?reqId=".$reqId );

    }
 }
}

  if (isset($_POST["rej"])) {

$observe=$_POST["observation"];
$reqId= $_GET["reqId"];

if (empty($observe)) {

   $_SESSION["ErrorMessage"] = "veullez  donner une decision !";
            Redirect_to("afficher.php?reqId=".$reqId );
}
else  {
    $Connection;
    $query="UPDATE req SET observ='$observe' , etat='non valide' WHERE id= $reqId ";
    $Execute=mysqli_query($Connection,$query);
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "requete traitée avec succes";
        Redirect_to("afficher.php?reqId=".$reqId);
}  
    else {
   $_SESSION["ErrorMessage"] = "une erreur c'est produite  !";
            Redirect_to("afficher.php?reqId=".$reqId );

    }
 }



}

if (isset($_POST["cours"])) {


$reqId= $_GET["reqId"];
    $Connection;
    $query="UPDATE req SET  etat='en cours de traitement' WHERE id= $reqId ";
    $Execute=mysqli_query($Connection,$query);
   
    if ($Execute) {
        $_SESSION["SuccessMessage"] = "requete  en cours de traitement";
      
        Redirect_to("afficher.php?reqId=".$reqId);
}  
    else {
   $_SESSION["ErrorMessage"] = "une erreur c'est produite !";
            Redirect_to("afficher.php?reqId=".$reqId );  
 }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Afficher une requête</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/font.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion " id="o">
            <div class="container-fluid d-flex flex-column p-0">
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="traiter.php"><i class="fas fa-reply-all"></i><span></span></a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>

            </div>
        </nav>
   <div class="d-flex flex-column  bg-white" id="content-wrapper">
        <?php require_once('image.php'); ?>
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-1">Afficher Requête</h3>
                </div>
                <div> <?php echo ErrorMessage(); ?></div>
                        <div><?php echo SuccessMessage(); ?></div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    
                        <h6 class="text-primary m-0 font-weight-bold">Informations Etudiant</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        global $Connection;
                        $reqId = $_GET["reqId"];
                        $ViewQuery = " SELECT * FROM req WHERE id = '$reqId' ";
                        $Execute = mysqli_query($Connection, $ViewQuery);
                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $NomE = $DataRows["nomE"];
                            $ClasseE = $DataRows["classeE"];
                            $AdresseE = $DataRows["adresseE"];
                            $EmailE = $DataRows["emailE"];
                            $TelE = $DataRows["telE"];
                         ?>
                            <p class="m-0">
                                <?php echo $NomE; ?><br>
                                <?php echo $ClasseE; ?><br>
                                <?php echo $AdresseE; ?><br>
                                <?php echo $EmailE; ?><br>
                                <?php echo $TelE; ?>
                            </p>
                        <?php } ?>
                    </div>
                </div>
                <div class="shadow card"><a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">Objet</a>
                    <div class="collapse show" id="collapse-4"></div>
                    <div class="card-body">
                        <?php
                        global $Connection;
                        $reqId = $_GET["reqId"];
                        $ViewQuery = " SELECT * FROM req WHERE id = '$reqId' ";
                        $Execute = mysqli_query($Connection, $ViewQuery);
                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $Obj = $DataRows["obj"];
                        ?>
                            <p class="m-0">
                                <?php echo $Obj; ?>
                            </p>
                        <?php } ?>
                    </div>
                     <div class="shadow card"><a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">Session</a>
                    <div class="collapse show" id="collapse-4"></div>
                    <div class="card-body">
                        <?php
                        global $Connection;
                        $reqId = $_GET["reqId"];
                        $ViewQuery = " SELECT * FROM req WHERE id = '$reqId' ";
                        $Execute = mysqli_query($Connection, $ViewQuery);
                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $session = $DataRows["session"];
                        ?>
                            <p class="m-0">
                                <?php echo $session; ?>
                            </p>
                        <?php } ?>
                    </div>
                      <div class="shadow card"><a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">Matiere</a>
                    <div class="collapse show" id="collapse-4"></div>
                    <div class="card-body">
                        <?php
                        global $Connection;
                        $reqId = $_GET["reqId"];
                        $ViewQuery = " SELECT * FROM req WHERE id = '$reqId' ";
                        $Execute = mysqli_query($Connection, $ViewQuery);
                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $matiere = $DataRows["matiere"];
                        ?>
                            <p class="m-0">
                                <?php echo $matiere; ?>
                            </p>
                        <?php } ?>
                    </div>
                </div>
                <div class="shadow card"><a class="btn btn-link text-left card-header font-weight-bold" data-toggle="collapse" aria-expanded="true" aria-controls="collapse-4" href="#collapse-4" role="button">Contenu</a>
                    <div class="collapse show" id="collapse-4">
                        <div class="card-body">
                            <?php
                            global $Connection;
                            $reqId = $_GET["reqId"];
                            $ViewQuery = " SELECT * FROM req WHERE id = '$reqId' ";
                            $Execute = mysqli_query($Connection, $ViewQuery);
                            while ($DataRows = mysqli_fetch_array($Execute)) {
                                $Contenu = $DataRows["contenu"];
                            ?>
                                <p class="m-">
                                    <?php
                                 //   nl2br \n \r
                                      if (strlen($Contenu) > 50){
                                         
                                          echo nl2br($Contenu);
                                    

                                      }
                                    
                                   else{ 
                                    echo  $Contenu; }

                                      
                                      ?> 
                                </p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="text-primary m-0 font-weight-bold">Justificatif</h6>
                    </div>
                    <div class="card-body">
                        <?php
                        global $Connection;
                        $reqId = $_GET["reqId"];
                        $ViewQuery = " SELECT * FROM req WHERE id = '$reqId' ";
                        $Execute = mysqli_query($Connection, $ViewQuery);
                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $Justif = $DataRows["justif"];
                        ?>
                        <?php  if(empty($Justif))   {   ?>
                            <p class="m-0">  
                                   <span class="">aucun justificatif</span>
                            </p>
                     <?php }  
                        
                        else { 
                     
                     
                     ?>
                           <p class="m-0">  
                                   <a href="<?php    echo 'TD/'.$Justif; ?>" disabled  target="_blank">Voir le justificatif</a>
                            </p>
                     <?php }?>




                        <?php } ?>
                    </div>
                </div>
                <form class="bootstrap-form-with-validation"  method="POST" >
                    <h2 class="text-center"></h2>
                    <div class="form-group"><label for="text-input" class="text-primary">Décision</label><input class="form-control" type="text" id="text-input" name="observation"></div>
 
                    <button  type="submit" name="val" class="btn btn-success btn-icon-split" role="button"><span class="text-white-50 icon"><i class="fas fa-check"></i></span><span class="text-white text">Valider</span></button>


                     <button  type="submit" name="rej" class="btn btn-danger btn-icon-split" role="button"><span class="text-white-50 icon"><i class="fas fa-trash"></i></span><span class="text-white text">Rejeter</span></button>

                      <button  type="submit" name="cours" class="btn btn-warning btn-icon-split" role="button"><span class="text-white-50 icon"><i class="fas fa-"></i></span><span class="text-white text">En cours</span></button>
                     </form>
            </div>
               <?php    require_once("footer.php")  ;     ?>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
            <script src="assets/js/script.min.js"></script>
</body>

</html>