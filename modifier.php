<?php require_once("db.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("sessions.php"); ?>
<?php Login_Confirm() ?>
 <?php

  global $Connection;
 $modid = $_GET["id"];
  $ViewQuery = " SELECT * FROM req WHERE id = '$modid' ";
$Execute = mysqli_query($Connection, $ViewQuery);
while ($DataRows = mysqli_fetch_array($Execute)) {
 $id = $DataRows["id"];
 $Date = $DataRows["date"];
 $Dest = $DataRows["dest"];
$Obj = $DataRows["obj"];
 $Statut = $DataRows["statut"];
 $contenu = $DataRows["contenu"];
   $etat = $DataRows["etat"];
   $justif=$DataRows["justif"];
   $matiere=$DataRows["matiere"];

}
?>
<?php
if (isset($_POST["modifier"])) {
    $NomE = $_SESSION["NomE"] . " " . $_SESSION["PrenomE"];
    $ClasseE = $_SESSION["ClasseE"];
    $AdrE = $_SESSION["AdresseE"];
    $EmailE = $_SESSION["EmailE"];
    $TelE = $_SESSION["TelE"];
    $matiere = mysqli_real_escape_string($Connection, $_POST["matiere"]);
    $Destinataire = mysqli_real_escape_string($Connection, $_POST["Destinataire"]);
    $Objet = mysqli_real_escape_string($Connection, $_POST["Objet"]);
    $Contenu = mysqli_real_escape_string($Connection, $_POST["Contenu"]);
    date_default_timezone_set("Africa/Douala");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    $DateTime;
    $Statut = "requete envoyee";
    $idE = $_SESSION["User_Id"];
    $Target = "TD/" . basename($_FILES["Justif"]["name"]);
    $TD = $_FILES["Justif"]["name"];
    $modid = $_GET["id"];
    if (empty($Objet) or empty($Contenu)) {
        $_SESSION["ErrorMessage"] = "Tous les champs doivent être remplis!";
        Redirect_to("modifier.php?id=".$modid);
    }
   
     else {
        global $Connection;
        $Query = " UPDATE  req  SET  obj='$Objet', justif='$TD', contenu='$Contenu',matiere='$matiere'   WHERE  id= $modid";
        $Execute = mysqli_query($Connection, $Query);
        move_uploaded_file($_FILES["Justif"]["tmp_name"], $Target);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "requete  modifier  avec succes!";
            Redirect_to("modifier.php?id=$modid " );
        } else {
            $_SESSION["ErrorMessage"] = "Une erreur est survenue !";
            Redirect_to("modifier.php?id=$modid ");
        }
    }
    



}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Modifier une requête</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/font.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion " id="o">
            <div class="container-fluid d-flex flex-column p-0"> <br>
                     <span class="badge badge-success   " style="margin-right:115px;"><?php echo $_SESSION["NomE"] . " " . $_SESSION["PrenomE"]; ?></span>  </br>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar" >
                <li class="nav-item" role="presentation"><a class="nav-link " href="acceuille.php" > <i class="fas fa-home"></i><span>Acceuille</span></a>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="effectuerRequete.php"><i class="fas fa-edit"></i><span>Effectuer une requête</span></a>
                    <a class="nav-link "  href="requetes.php" style="margin-right:100px;" ><i class="fas fa-list"></i><span>Mes requêtes</span>
                                               <?php global $Connection;
                                                 $idE = $_SESSION["User_Id"];
            
                                                $TRQuery = "SELECT COUNT(etat) FROM req WHERE etat!='valide' and etat!='non valide' AND idE=$idE  ";
                                                $TRExecute = mysqli_query($Connection, $TRQuery);
                                                $RR = mysqli_fetch_array($TRExecute);
                                                $TR = array_shift($RR);
                                        
                                                if($TR>0){ 

                                                echo '<span class="badge badge-primary">' . $TR . '</span>';
                                                }

                                                ?>
                                                 <?php
                                                 global $Connection;
                                                    $idE = $_SESSION["User_Id"];
                                                $TRQuery = "SELECT COUNT(etat) FROM req WHERE etat!='pas encore traiter' AND idE=$idE  ";
                                                $TRExecute = mysqli_query($Connection, $TRQuery);
                                                $RR = mysqli_fetch_array($TRExecute);
                                                $T = array_shift($RR);
                                                if($T>0){ 

                                                echo '<span  id="dis" class="badge badge-warning">' .$T. '</span>';
                                                }
                                                ?></span>  
                                                </span>   </a> 
                    <a class="nav-link" href="infos.php"><i class="fas fa-user"></i><span>Mes informations</span></a> <br>
                      <span class="badge badge-secondary "><a  href="logout" class="text-light"><i class="fas fa-sign-out-alt fa-sm fa-fw  "></i>&nbsp;Déconnexion</a></span>
                    
                    </li>
                   
                </ul>

            </div>
        </nav>
        
                  
       <div class="d-flex flex-column  bg-white" id="content-wrapper">
          <?php  require_once('image.php'); ?> 
            <div id="content">
                <nav class="navbar navbar-light navbar-expand   static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                          
                            <li class="nav-item dropdown no-arrow" role="presentation">
                               
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-1">Modifier une Requête</h3>
                </div>

                <div class="container">
                    <div> <?php echo ErrorMessage(); ?></div>
                    <div><?php echo SuccessMessage(); ?></div>
                </div>


    
                <form class="bootstrap-form-with-validation" action="modifier.php?id=<?php echo  $id; ?>" method="POST" enctype="multipart/form-data">


                    <h2 class="text-center"></h2>
                    <div class="form-group"><label for="text-input">Nom de l'Etudiant</label><input class="form-control" type="text" id="text-input" name="NomE" value='<?Php echo $_SESSION["NomE"] ?>' disabled></div>
                    <div class="form-group"><label for="text-input">Prenom de l'Etudiant</label><input class="form-control" type="text" id="text-input" name="PrenomE" value='<?php echo $_SESSION["PrenomE"] ?>' disabled></div>
                    <div class="form-group"><label for="text-input">Classe</label><input class="form-control" type="text" id="text-input" name="ClasseE" value='<?php echo $_SESSION["ClasseE"] ?>' disabled></div>
                    <div class="form-group"><label for="text-input">Adresse de l'Etudiant</label><input class="form-control" type="text" id="text-input" name="AdrE" value='<?php echo $_SESSION["AdresseE"] ?>' disabled></div>
                    <div class="form-group"><label for="text-input">Telephone de l'Etudiant</label><input class="form-control" type="text" id="text-input" name="TelE" value='<?php echo $_SESSION["TelE"] ?>' disabled></div>
                    
                       <?php 
                              $Connection;
                            //  $classe=$_SESSION["ClasseE"];
                         
                              $Query= "SELECT  * FROM req WHERE idE = '$idE'";
                                $Execute = mysqli_query($Connection, $Query);
                           $DataRows = mysqli_fetch_array($Execute);
                              // $chefd=$DataRows["nom_user"];
                              $class=$DataRows['classeE'];
                            
                          
                             ?>
                               <?php
                                 if($class=='CS2I3 A'  or $class=='cs2i4' or $class=='cs2i5') { 
                                     
                               ?>
                         
                          <div class="form-group"><label for="text-input">Destinataire</label><input class="form-control" type="text" id="text-input" name="Destinataire"   value="M TEKOUDJOU FRANCOIS-XAVIER" disabled >
                      
                            <?php } 
                            
                            elseif($class=='3IL3'  or $class=='3il4' or $class=='3il5')
                             {  
                                 ?>
                            
                             <div class="form-group"><label for="text-input">Destinataire</label><input class="form-control" type="text" id="text-input" name="Destinataire"   value="M Tchouta Alain" disabled >
                      
                             <?php } 
                             else {  
                                 ?>

                                <div class="form-group"><label for="text-input">Destinataire</label><input class="form-control" type="text" id="text-input" name="Destinataire"   value="Dr Azeufack ulrich"  disabled  >
                        <?php } 
                        
                        ?>
                 

                 </div>
                    <div class="form-group"><label for="text-input">Objet de la requête</label><input class="form-control" type="text" id="text-input" name="Objet" value="<?Php echo $Obj ;?> "></div>
                      <div class="form-group"><label for="text-input">Matiere</label><input class="form-control" type="text" id="text-input" name="matiere" value="<?Php echo $matiere ;?>" > </div>
                    <div class="form-group"><label for="textarea-input">Saisissez le contenu de votre requête</label><textarea class="form-control" id="textarea-input" name="Contenu"> <?Php echo  $contenu; ?></textarea></div>
                    <div class="form-group">
                        <span class="text-warning "> justif existant </span>
                        <img src="TD/<?php  echo $justif; ?> " width="170ph"; height=50px>
                        <label for="file-input">
                    modifier le   Justificatif (Si plusieurs, insérer dans un seul fichier pdf)&nbsp; &nbsp;</label><input type="file" id="file-input" name="Justif"></div>
                    <div class="form-group"><button class="btn btn-success" type="submit" name="modifier">Modifier  la Requête</button></div>
                </form>
            </div>
             <?php    require_once("footer.php")  ;     ?>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflar
            

y            e.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
            <script src="assets/js/script.min.js"></script>
</body>

</html>