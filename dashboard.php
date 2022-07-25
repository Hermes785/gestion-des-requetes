<?php require_once("db.php"); ?>
<?php require_once("sessions.php"); ?>
<?php require_once("functions.php");
$nom_user=$_SESSION["User"] ;
;
 ?>
<?php Login_ConfirmE() ?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tableau de Bord</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="dashboard.php"><i class="fas fa-th-large"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="traiter.php"><i class="fas fa-edit"></i><span>Traiter Requêtes</span></a>
                    <a class="nav-link" href="consulter.php"><i class="fas fa-table"></i><span>Consulter Requêtes</span></a></li>
                     <li> <span class="badge badge-secondary "> <a  href="logout" class="text-light"><i class="fas fa-sign-out-alt fa-sm fa-fw  "></i>&nbsp;Déconnexion</a></span></li>
                 
                </ul>

            </div>
        </nav>
      <div class="d-flex flex-column  bg-white" id="content-wrapper">
         
            <div id="content">
               
                <div class="container-fluid">
                        <div class="container">
                        <div> <?php echo ErrorMessage(); ?></div>
                        <div><?php echo SuccessMessage(); ?></div>
                    </div>
                                  <?php  require_once('image.php'); ?> <br>
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Tableau de bord</h3>
                    </div>
                  
                    <div class="row align-items-center">
                        <div class="col-md-6 col-xl-4 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>requêtes reçues</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0">
                                                <?php
                                                global $Connection;
                                                $TRQuery = "SELECT COUNT(etat) FROM req WHERE etat!=' ' AND dest='$nom_user'  ";
                                                $TRExecute = mysqli_query($Connection, $TRQuery);
                                                $RR = mysqli_fetch_array($TRExecute);
                                                $TR = array_shift($RR);

                                                echo '<span>' . $TR . '</span></div>';
                                                ?>
                                            </div>
                                            <div class="col-auto"><i class="far fa-calendar-alt fa-2x text-gray-300"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4 mb-4">
                                <div class="card shadow border-left-success py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>requêtes traitees</span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0">
                                                    <?php
                                                    global $Connection;
                                                    $TTQuery = "SELECT COUNT(etat) FROM req WHERE etat!='pas encore traiter' and etat!='en cours de traitement'  AND dest='$nom_user'";
                                                    $TTExecute = mysqli_query($Connection, $TTQuery);
                                                    $RT = mysqli_fetch_array($TTExecute);
                                                    $TT = array_shift($RT);

                                                    echo '<span>' . $TT . '</span></div>';
                                                    ?>

                                                </div>
                                                <div class="col-auto"><i class="far fa-calendar-check fa-2x text-gray-300"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-md-6 col-xl-4 mb-4">
                                <div class="card shadow border-left-danger py-2">
                                    <div class="card-body">
                                        <div class="row align-items-center no-gutters">
                                            <div class="col mr-2">
                                                <div class="text-uppercase text-danger font-weight-bold text-xs mb-1"><span>requêtes non traitees</span></div>
                                                <div class="text-dark font-weight-bold h5 mb-0">
                                                    <?php
                                                    echo '<span>' . ($TR - $TT) . '</span>';
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-auto"><i class="far fa-calendar-times fa-2x text-gray-300"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></br></br>
                      
                    </div>
                </div>
            </div>
            <footer class=" sticky-footer" id="o">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © IUC 2020 Tous droit reserve pour plus d'info contacter nous au 656410452</span></div>
                </div>
            </footer>
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
            <script src="assets/js/script.min.js"></script>
</body>

</html>