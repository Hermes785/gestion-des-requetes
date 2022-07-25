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
    date_default_timezone_set("Africa/Douala");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S", $CurrentTime);
    $DateTime;
    $Statut = "requete envoyee";
    $idE = $_SESSION["User_Id"];
    $Target = "TD/".basename($_FILES["Justif"]["name"]);
    $TD = $_FILES["Justif"]["name"];
    if (empty($Destinataire) or empty($Objet) or empty($Contenu)) {
        $_SESSION["ErrorMessage"] = "Tous les champs doivent être remplis!";
        Redirect_to("effectuerRequete.php");
    } else {
        global $Connection;
        $Query = "INSERT INTO req(date, nomE, classeE, adresseE, emailE, telE, dest, obj, justif,statut,idE, contenu)
        VALUES('$DateTime','$NomE','$ClasseE','$AdrE','$EmailE','$TelE','$Destinataire','$Objet','$TD','$Statut', '$idE', '$Contenu')";
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
                 <li class="nav-item" role="presentation"><a class="nav-link active" href="acceuille.php" > <i class="fas fa-home"></i><span>Acceuille</span></a>   </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="effectuerRequete.php"><i class="fas fa-edit"></i><span>Effectuer une requête</span></a>
                    <a class="nav-link"  href="requetes.php" ><i class="fas fa-list"></i>
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
          <?php  require_once('image.php'); ?>   </br> </br> </br>
           
           <div id="content">

               
                
                
              

                  <hr   class="bg-succes">
                   <h1    class="text-center text-success">  <?php echo $_SESSION["NomE"] . " " . $_SESSION["PrenomE"]; ?>  Bienvenu sur Myiuc-request-3iac </h1>
                   <hr   class="bg-succes"> </br> 


                    <div class=" "  style="margin-left:50px" >
                     <section>
                         
                   <h5>
                    Myiuc-request-3iac est logiciel web vous permettant d'effectué vos requettes en ligne,.il est simple et facile a utilisé et surtout tres intuitif.
                    
                     </h5>
                      </section>
                    </div> 

                     <div class=" ">
                     <section style="margin-left:50px">
                   <h5>  
                     Pour efectuer une requetes, il suffit juste de cliquer sur <span class="text-success">Effectuer une requete</span> puis, remplir les different champs a remplir a savoir :<br>
                   <i class="text-success"> - </i>le destinataire: Ici il faut juste  choisir le nom de votre chef de departement <br>
                      <i class="text-success"> - </i> Saisir l'objet de votre requete <br>
                       <i class="text-success"> - </i> Puis la matiere <br>
                     <i class="text-success"> - </i>Ensuite   saisisez le contenu de votre requete  <br>
                       <i class="text-success"> - </i> Si vous avez un document a ajouté vous pouvez l'ajouté, si plusieur veuillez les mettres dans un seul document pdf avant de l'ajouté <br>
                       <i class="text-success"> - </i> Apres avoir fini de remplir(et bien verifier les informations saisies) les differents champs cliquez sur le boutton <span class="text-success"> Envoyer la requete</span><br> 

                         
                    </h5>    
                    <div>  <h5>    vous pouvez aussi consulter l'ensemble de vos requetes ainsi que l'etat d'avancement de votre requete en temps reel en cliquant  sur <span class="text text-success">Mes requetes</span> </h5></div>
                       
                     </section>
                    </div> <br> <br>

    
            </div>
             <?php    require_once("footer.php")  ;     ?>

         

            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/dis.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
            
            <script src="assets/js/script.min.js"></script>
        </div>    
     </div>   
 </body>

</html>