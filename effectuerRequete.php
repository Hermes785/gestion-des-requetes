<?php require_once("db.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("sessions.php"); ?>
<?php Login_Confirm() ?>

<?php
if (isset($_POST["Submit"])) {
    $NomE = $_SESSION["NomE"] . " " . $_SESSION["PrenomE"];
    $ClasseE = $_SESSION["ClasseE"];
    $AdrE = $_SESSION["AdresseE"];
    $EmailE = $_SESSION["EmailE"];
    $TelE = $_SESSION["TelE"];
    $Destinataire = mysqli_real_escape_string($Connection, $_POST["Destinataire"]);
   
    
    $Objet = mysqli_real_escape_string($Connection, $_POST["Objet"]);
    
    $Contenu = mysqli_real_escape_string($Connection, $_POST["Contenu"]);
    var_dump( $Contenu);
     $matiere = mysqli_real_escape_string($Connection, $_POST["matiere"]);
     
     $sessions = mysqli_real_escape_string($Connection, $_POST["session"]);
    date_default_timezone_set("Africa/Douala");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    $DateTime;
    $Statut = "requete envoyee";
    $idE = $_SESSION["User_Id"];
    $Target = "TD/".basename($_FILES["Justif"]["name"]);
    $TD = $_FILES["Justif"]["name"];
    if (empty($matiere) or empty($Objet) or empty($Contenu)) {
        $_SESSION["ErrorMessage"] = "Tous les champs doivent être remplis!";
        Redirect_to("effectuerRequete.php");
    } else {
        global $Connection;
        $Query = "INSERT INTO req(date, nomE, classeE, adresseE, emailE, telE, dest, obj, justif,statut,idE, contenu,matiere,session)
        VALUES('$DateTime','$NomE','$ClasseE','$AdrE','$EmailE','$TelE','$Destinataire','$Objet','$TD','$Statut', '$idE', '$Contenu','$matiere','$sessions')";
        var_dump('$sessions');
        $Execute = mysqli_query($Connection, $Query);
       
        move_uploaded_file($_FILES["Justif"]["tmp_name"], $Target);
        if ($Execute) {
            $_SESSION["SuccessMessage"] = "requete  effectuée avec succes!";
            Redirect_to("effectuerRequete.php");
         } else {
            $_SESSION["ErrorMessage"] = "Une erreur est survenue !";
            Redirect_to("effectuerRequete.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Effectuer une requête</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/font.css">
</head>

<body id="page-top">
 

    <div id="wrapper">
         <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion " id="o">
               
            <div class="container-fluid d-flex flex-column p-0"> <br>
                  <span class="badge badge-success   " ><?php echo $_SESSION["NomE"] . " " . $_SESSION["PrenomE"]; ?></span>  </br>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar" >
                 <li class="nav-item" role="presentation"><a class="nav-link" href="acceuille.php" > <i class="fas fa-home"></i><span>Acceuille</span></a>   </li>
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="effectuerRequete.php"><i class="fas fa-edit"></i><span>Effectuer une requête</span></a>
                    <a class="nav-link "  href="requetes.php" ><i class="fas fa-list"></i>
                    <span>Mes requêtes</span> 
                                                   <?php require_once('noti.php');
                                                ?></span>  
                                                </span>   </a> 
                    <a class="nav-link" href="infos.php"><i class="fas fa-user"></i><span>Mes informations</span></a>
                      <span class="badge badge-secondary "><a  href="logout" class="text-light"><i class="fas fa-sign-out-alt fa-sm fa-fw  "></i>&nbsp;Déconnexion</a></span>
                    
                    </li>
                   
                </ul>
            
            </div>
        </nav>
        
                  
       <div class="d-flex flex-column  bg-white" id="content-wrapper">
       
               
          

           <div class="container">
                    <div> <?php echo ErrorMessage(); ?></div>
                    <div><?php echo SuccessMessage(); ?></div>
                </div>


         <div id="content">

                
                
              
               <?php  require_once('image.php'); ?>  <br>

            <div class="container-fluid mb-8" >
                    <h3 class="text-dark ">Effectuer une Requête</h3>
                </div>   
                <form class="bootstrap-form-with-validation" action="effectuerRequete.php" method="POST" enctype="multipart/form-data" >
                    <h2 class="text-center"></h2>
                     
                     
                    <div class="form-group"><label for="text-input">Nom de l'Etudiant</label><input class="form-control" type="text" id="text-input" name="NomE" value='<?Php echo $_SESSION["NomE"] ?>' disabled></div>
                    <div class="form-group"><label for="text-input">Prenom de l'Etudiant</label><input class="form-control" type="text" id="text-input" name="PrenomE" value='<?php echo $_SESSION["PrenomE"] ?>' disabled></div>
                    <div class="form-group"><label for="text-input">Classe</label><input class="form-control" type="text" id="text-input" name="ClasseE" value='<?php echo $_SESSION["ClasseE"] ?>' disabled></div>
                    <div class="form-group"><label for="text-input">Adresse de l'Etudiant</label><input class="form-control" type="text" id="text-input" name="AdrE" value='<?php echo $_SESSION["AdresseE"] ?>' disabled></div>
                    <div class="form-group"><label for="text-input">Telephone de l'Etudiant</label><input class="form-control" type="text" id="text-input" name="TelE" value='<?php echo $_SESSION["TelE"] ?>' disabled></div>
                     <?php 
                              $Connection;
                            //  $classe=$_SESSION["ClasseE"];
                            $idE = $_SESSION["User_Id"];
                         
                              $Query= "SELECT  * FROM etud WHERE id = $idE";
                                $Execut = mysqli_query($Connection, $Query);
                           $DataRows = mysqli_fetch_array($Execut);
                          
                            
                              // $chefd=$DataRows["nom_user"];
                              $class=$DataRows['classe'];
                              var_dump($class);
                          
                              ?>
                               <?php
                                 if($class=='CS2I3 A'  or $class=='cs2i4' or $class=='cs2i5') { 
                                     
                               ?>
                         
                          <div class="form-group"><label for="text-input">Destinataire</label><input class="form-control" type="text" id="text-input" name="Destinataire"   value="M TEKOUDJOU FRANCOIS-XAVIER"  >
                      
                            <?php } 
                            
                            elseif($class=='3IL3'  or $class=='3il4' or $class=='3il5')
                             {  
                                 ?>
                            
                             <div class="form-group"><label for="text-input">Destinataire</label><input class="form-control" type="text" id="text-input" name="Destinataire"   value="M Tchouta Alain"  >
                      
                             <?php } 
                             else {  
                                 ?>

                                <div class="form-group"><label for="text-input">Destinataire</label><input class="form-control" type="text" id="text-input" name="Destinataire"   value="M KAZE"   >
                        <?php } 
                        
                        ?>
                           
                   
                      
                 

                 </div>
                    <div class="form-group"><label for="text-input">Objet de la requête</label><input class="form-control" type="text" id="text-input" name="Objet"></div>

                          <div class="form-group"><label for="text-input">Session</label>
                     <select class="form-control" type="text" id="text-input" name="session">
                      <option value="cc1"> cc1  </option>
                      <option value="cc2"> cc2  </option>
                      
                      <option value="normale">normale</option>
                      <option value="rattrapage">rattrapage</option>
                        
                       
                     </select>
                 

                 </div>
                      <div class="form-group"><label for="text-input">Matiere</label><input class="form-control" type="text" id="text-input" name="matiere"></div>
                    <div class="form-group"><label for="textarea-input">Saisissez le contenu de votre requête</label><textarea class="form-control" id="textarea-input" name="Contenu"></textarea></div>
                    <div class="form-group"><label for="file-input">Ajouter un Justificatif (Si plusieurs, insérer dans un seul fichier pdf)&nbsp; &nbsp;</label><input type="file" id="file-input" name="Justif"></div>
                    <div class="form-group"><button class="btn btn-success" type="submit" name="Submit">Envoyer la Requête</button>
                      <button class="btn btn-danger" type="resett" style="margin-left:0px"  name="reset">Annuler</button></div>

                      <h5 class="alert alert-danger"> Attention  bien vouloir  reverifier les informations avant de les envoyées  merci!</h5>
                </form>
            </div>
             <?php    require_once("footer.php")  ;     ?>

            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/dis.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
         </div>   <script src="assets/js/script.min.js"></script>
</body>

</html>