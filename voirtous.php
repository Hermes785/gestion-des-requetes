<?php require_once("db.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("sessions.php"); 
$nom_user=  $_SESSION["User"] ;
?>
<?php Login_ConfirmE() ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Consulter requêtes</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/font.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion " id="o">
            <div class="container-fluid d-flex flex-column p-0">
                <hr class="sidebar-divider my-0"> <br> 
                  <span class="badge badge-success"><?php echo $_SESSION["Nom"] . " " . $_SESSION["PrenomE"]; ?></span>  </br>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    
                 <li>   <a class="nav-link active" href="voirtous.php"><i class="fas fa-table"></i><span>Consulter Requêtes</span></a></li> </br>
                      <li> <span class="badge badge-secondary "> <a  href="logout" class="text-light"><i class="fas fa-sign-out-alt fa-sm fa-fw  "></i>&nbsp;Déconnexion</a></span></li>
                 


                </ul>

            </div>
        </nav>
      <div class="d-flex flex-column  bg-white" id="content-wrapper">
      
            <div id="content">
                <nav class="navbar navbar-light navbar-expand   static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                              
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                               
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                  <?php require_once('image.php'); ?> <br>
                    <h3 class="text-dark mb-4">Consulter  toutes les Requêtes</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-success m-0 font-weight-bold">Historique des requêtes</p>
                        </div>

                        
                     <form action="pdf.php">
                         <div class="card-body">

                       
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Etudiant</th>
                                            <th>Classe</th>
                                            <th>Objet de la requête</th>
                                            <th>Session</th>
                                            <th>Matiere</th>
                                            <th>Statut</th>
                                            <th>Decision</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $statut1 = "valide";
                                        $statut2 = " non valide";
                                        global $Connection;

                                        $ViewQuery = " SELECT * FROM req  WHERE  etat!='pas encore traiter' and etat!='en cours de traitement' ORDER BY id asc ";
                                        $Execute = mysqli_query($Connection, $ViewQuery);

                                        while ($DataRows = mysqli_fetch_array($Execute)) {
                                            $Date = $DataRows["date"];
                                            $NomE = $DataRows["nomE"];
                                            $ClasseE = $DataRows["classeE"];
                                            $Obj = $DataRows["obj"];
                                            $Statut = $DataRows["statut"];
                                            $Observ = $DataRows["observ"];
                                            $etat = $DataRows["etat"];
                                            $matiere=$DataRows['matiere'];
                                            $session=$DataRows["session"]
                                        ?>
                                            <tr>
                                                <td><?php echo $Date; ?></td>
                                                <td><?php echo $NomE; ?></td>
                                                <td><?php echo $ClasseE; ?></td>
                                                <td><?php echo $Obj; ?></td>
                                                  <td><?php echo $session; ?></td>
                                                <td><?php  echo $matiere ;?></td>
                                                <td><?php
                                                    if ($etat == "pas encore traiter") {
                                                        echo '<span class="badge badge-secondary">' . $Statut . '</span>';
                                                    }
                                                    if ($etat == "valide") {
                                                        echo '<span class="badge badge-success">' . $statut1 . '</span>';
                                                    }
                                                    if ($etat == "non valide") {
                                                        echo '<span class="badge badge-danger">' . $statut2 . '</span>';
                                                    }
                                                    ?></td>
                                                <td><?php

                                                    if (is_null($Observ)) {

                                                        echo "  pas encore traitée";
                                                    } else {

                                                        echo   $Observ;
                                                    } ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>

                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <button ><span class="badge badge-primary">generer un pdf</span>  </button>
                        </form>
                    </div>
                </div>
            </div>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
            <script src="assets/js/script.min.js"></script>

              <?php    require_once("footer.php")  ;     ?>
</body>

</html>