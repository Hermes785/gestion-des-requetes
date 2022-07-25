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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="dashboard.php"><i class="fas fa-th-large"></i><span>Dashboard</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="traiter.php"><i class="fas fa-edit"></i><span>Traiter Requêtes</span></a> 
                    <a class="nav-link active" href="consulter.php"><i class="fas fa-table"></i><span>Consulter Requêtes</span></a></li>
                      <li> <span class="badge badge-secondary "> <a  href="logout" class="text-light"><i class="fas fa-sign-out-alt fa-sm fa-fw  "></i>&nbsp;Déconnexion</a></span></li>
                 


                </ul>

            </div>
        </nav>
      <div class="d-flex flex-column  bg-white" id="content-wrapper">
      
            <div id="content">
                
                <div class="container-fluid">
                  
                  <?php require_once('image.php'); ?> <br>
                         <h3 class="text-dark mb-4">Consulter  toutes les Requêtes</h3>

                   <div class=" dropdown-menu-right" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100" action="consulter.php">
                                        <div class="input-group">
                                        <select class="bg-light form-control border-0 small" name="search" type="text" placeholder="Search for ...">
                                          <option value="cc1"> cc1 </option>
                                          <option value="cc2">cc2 </option>
                                          <option value="semestre1"> semestre1</option>
                                          <option value="semestre2"> semestre2</option>
                                          <option value="rattrapage"> rattrapage</option>
                                         </select>

                                       
                                           <div class="input-group" style="margin-left:40px;">

                                                <?php  if($nom_user=='M Fonke Eric') {   ?>
                                        <select class="bg-light form-control border-0 small" name="class" type="text" placeholder="Search for ...">
                                          <option value="cs2i3 A"> cs2i3 A </option>
                                          <option value="cs2i3 B">cs2i3 B </option>
                                          <option value="cs2i4"> cs2i4</option>
                                          <option value="cs2i5"> cs2i5</option>
                                         </select>
                                        <?php   } elseif($nom_user=='M Tchouta Alain')    { ?>

                                                <select class="bg-light form-control border-0 small" name="class" type="text" placeholder="Search for ...">
                                          <option value="3il3"> 3il3  </option>
                                           <option value="3il4"> 3il4  </option>
                                            <option value="3il5"> 3il5  </option>
                                         
                                         </select>

                                        
                               <?php } elseif($nom_user=='Dr Azeufack ulrich')  { ?>
                                <select class="bg-light form-control border-0 small" name="class" type="text" placeholder="Search for ...">
                                           <option value="prepa 3il 1A"> prepa 3il 1A </option>
                                           <option value="prepa 3il 1B"> prepa 3il 1B </option>
                                             <option value="prepa 3il 1C"> prepa 3il 1C </option>
                                               <option value="prepa 3il 2B"> prepa 3il 2B </option>
                                                 <option value="prepa 3il 2A"> prepa 3il 2A </option>
                                                   <option value="prepa 3il 2C"> prepa 3il 2C </option>
                                               </select>
                                                <?php }?>
                                            <div class="input-group-append"><button class="btn btn-primary py-0"  name="searchB" type="submit"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                    </div> </br>
             
                  
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
                                          <th>No</th>
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
                                         global $Connection;
                                           $num=1;
                                        $statut1 = "valide";
                                        $statut2 = " non valide";
                                          if(isset($_GET['searchB'])){
                                              $search=$_GET["search"];
                                             // $class=$_GET["class"];
                                              $ViewQuery="SELECT * FROM req WHERE session LIKE '$search%'  AND dest='$nom_user' AND etat!='pas encore traiter' and etat!='en cours de traitement' ";
                                              var_dump($ViewQuery);

                                          }
                                      
                                        else{
                                            $ViewQuery = " SELECT * FROM req  WHERE dest='$nom_user' AND etat!='pas encore traiter' and etat!='en cours de traitement' ORDER BY id asc ";
                                        }
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
                                            $session=$DataRows["session"];
                                               $num= $num++;
                                        ?>
                                            <tr>
                                            <td><?php echo $num++; ?> </td>
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