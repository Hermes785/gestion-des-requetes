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
    <title>Traiter une requête</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="traiter.php"><i class="fas fa-edit"></i><span>Traiter Requêtes</span></a>
                    <a class="nav-link" href="consulter.php"><i class="fas fa-table"></i><span>Consulter Requêtes</span></a></li>
                     <li> <span class="badge badge-secondary "> <a  href="logout" class="text-light"><i class="fas fa-sign-out-alt fa-sm fa-fw  "></i>&nbsp;Déconnexion</a></span></li>
                    
                </ul>

            </div>
        </nav>
    <div class="d-flex flex-column  bg-white" id="content-wrapper">
     
            <div id="content">
              
                <div class="container-fluid">
                  <?php require_once('image.php'); ?> <br>
                    <h3 class="text-dark mb-4">Traiter les Requêtes</h3> <br>
                    <!--  debut premier boutton de recherche par session --->
                 <div  class="d-flex" >
                     <h5> recherche par session </h5>
                     <div class=" dropdown-menu-right" style="margin-left:10px;" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100" action="traiter.php">
                                        <div class="input-group"><select class="bg-light form-control border-0 small" name="search" type="text" placeholder="Search for ...">
                                          <option value="cc1"> cc1 </option>
                                          <option value="cc2">cc2 </option>
                                          <option value="normal"> normal</option>
                                           <option value="rattrapage"> rattrapage2</option>
                                        
                                        
                                         </select>
                                            <div class="input-group-append"><button class="btn btn-primary py-0"  name="searchB" type="submit"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                         </div>  
                                     <!--  fin bouton--->

                                  <!--  debut premier boutton de recherche par classe--->
                          <h5 style="margin-left:30px;"> recherche par classe : </h5>
                          
                           <?php  if($nom_user=='M TEKOUDJOU FRANCOIS-XAVIER') {   ?>
                     <div class=" dropdown-menu-right " style="margin-left:10px;" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100" action="traiter.php">
                                        <div class="input-group"><select class="bg-light form-control border-0 small" name="class" type="text" placeholder="Search for ...">
                                          <option value="cs2i3 A"> cs2i3 A  </option>
                                          <option value="cs2i3 B">cs2i3 B </option>
                                          <option value="cs2i4"> cs2i4</option>
                                          <option value="cs2i5"> cs2i5</option>
                                         </select>
                                            <div class="input-group-append"><button class="btn btn-primary py-0"  name="classB" type="submit"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                         </div>
                         <?php   } elseif($nom_user=='M Tchouta Alain')    { ?>
                            <div class=" dropdown-menu-right " style="margin-left:10px;" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100" action="traiter.php">
                                        <div class="input-group"><select class="bg-light form-control border-0 small" name="class" type="text" placeholder="Search for ...">
                                          <option value="3il3"> 3il3  </option>
                                           <option value="3il4"> 3il4  </option>
                                            <option value="3il5"> 3il5  </option>
                                         
                                         </select>
                                            <div class="input-group-append"><button class="btn btn-primary py-0"  name="classB" type="submit"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                         </div>
                         <?php } elseif($nom_user=='M KAZE')  { ?>
                           <div class=" dropdown-menu-right " style="margin-left:10px;" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100" action="traiter.php">
                                        <div class="input-group"><select class="bg-light form-control border-0 small" name="class" type="text" placeholder="Search for ...">
                                           <option value="prepa 3il1A"> prepa 3il1A </option>
                                           <option value="prepa 3il1B"> prepa 3il1B </option>
                                             <option value="prepa 3il1C"> prepa 3il1C </option>
                                               <option value="prepa 3il2B"> prepa 3il2B </option>
                                                 <option value="prepa 3il2A"> prepa 3il2A </option>
                                                                                        
                                         
                                         </select>
                                            <div class="input-group-append"><button class="btn btn-primary py-0"  name="classB" type="submit"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>

                         </div>
                      
                    <?php } ?>
                       <!--  fin boutton de recherche par classe--->

                          <!--  debut bouton recherche par session et classe--->

                          <h5 style="margin-left:20px;">recherche par session et classe:</h5>
                    <div class=" dropdown-menu-right" role="menu" aria-labelledby="searchDropdown" >
                                    <form class="form-inline mr-auto navbar-search w-100" action="traiter.php">
                                        <div class="input-group">
                                        <select class="bg-light form-control border-0 small" name="session" type="text" placeholder="Search for ...">
                                          <option value="cc1"> cc1 </option>
                                          <option value="cc2">cc2 </option>
                                          <option value="normal"> normale</option>
                                        
                                          <option value="rattrapage"> rattrapage</option>
                                         </select>

                                       
                                           <div class="input-group" style="margin-left:40px;">

                                                <?php  if($nom_user=='M TEKOUDJOU FRANCOIS-XAVIER') {   ?>
                                        <select class="bg-light form-control border-0 small" name="recherche" type="text" placeholder="Search for ...">
                                          <option value="cs2i3 A"> cs2i3 A </option>
                                          <option value="cs2i3 B">cs2i3 B </option>
                                          <option value="cs2i4"> cs2i4</option>
                                          <option value="cs2i5"> cs2i5</option>
                                         </select>
                                        <?php   } elseif($nom_user=='M Tchouta Alain')    { ?>

                                                <select class="bg-light form-control border-0 small" name="recherche" type="text" placeholder="Search for ...">
                                          <option value="3il3"> 3il3  </option>
                                           <option value="3il4"> 3il4  </option>
                                            <option value="3il5"> 3il5  </option>
                                         
                                         </select>

                                        
                               <?php } elseif($nom_user=='M KAZE')  { ?>
                                <select class="bg-light form-control border-0 small" name="recherche" type="text" placeholder="Search for ...">
                                           <option value="prepa 3il 1A"> prepa 3il 1A </option>
                                           <option value="prepa 3il 1B"> prepa 3il 1B </option>
                                             <option value="prepa 3il 1C"> prepa 3il 1C </option>
                                               <option value="prepa 3il 2B"> prepa 3il 2B </option>
                                                 <option value="prepa 3il 2A"> prepa 3il 2A </option>
                                                   <option value="prepa 3il 2C"> prepa 3il 2C </option>
                                               </select>
                                                <?php }?>
                                            <div class="input-group-append"><button class="btn btn-primary py-0"  name="rech" type="submit"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                           </div> 
             

                        </div>  
                    </div>      </br>          
                            <!--  fin--->

                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-danger m-0 font-weight-bold">Liste des requêtes</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th> No </th>
                                            <th>Date</th>
                                            <th>Etudiant</th>
                                            <th>Classe</th>
                                            <th>Objet</th>
                                            <th> Session </th>
                                            <th>Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            global $Connection;
                                           $num=1;
                                        $statut1 = "valide";
                                        $statut2 = " non valide";
                                          if(isset($_GET['searchB'])){

                                              $search=$_GET["search"];
                                              $ViewQuery="SELECT * FROM req WHERE  session LIKE  '$search%' AND dest='$nom_user' AND etat!='pas encore traiter' ORDER BY  date  ";
                                              var_dump($ViewQuery);

                                          }
                                           elseif(isset($_GET['classB'])){

                                              $class=$_GET["class"];
                                              $ViewQuery="SELECT * FROM req WHERE  classeE LIKE  '$class%' AND dest='$nom_user'    ";
                                              var_dump($ViewQuery);
                                              var_dump($nom_user);

                                          }
                                      
                                        else{
                                            $ViewQuery = " SELECT * FROM req  WHERE dest='$nom_user'   ORDER BY date  ";
                                             var_dump($ViewQuery);
                                        }

                                        // bouton
                                        if(isset($_GET['rech'])){

                                            $recherche=$_GET['recherche'];
                                            $session=$_GET['session'];
                                              $ViewQuery="SELECT * FROM req WHERE session LIKE '$session%' AND classeE LIKE '$recherche%' AND dest='$nom_user' AND etat!='pas encore traiter' and etat!='en cours de traitement' ";
                                              var_dump($ViewQuery);
                                        }
                                        $Execute = mysqli_query($Connection, $ViewQuery);
                                        
                                          
                                            while ($DataRows = mysqli_fetch_array($Execute)) {
                                                $Id = $DataRows["id"];
                                                $Date = $DataRows["date"];
                                                $NomE = $DataRows["nomE"];
                                                $ClasseE = $DataRows["classeE"];
                                                 $objet = $DataRows["obj"];
                                                 $sessions = $DataRows["session"];
                                                $etat = $DataRows["etat"];
                                             

                                            ?>
                                        <tr>
                                        <td> <?php  echo $num++ ;?> </td>
                                            <td><?php echo $Date; ?></td>
                                            <td><?php echo $NomE; ?></td>
                                            <td><?php echo $ClasseE; ?></td>
                                           <td><?php echo $objet; ?></td>
                                           <td><?php echo $sessions ;?> </td>
                                            <td><a class="btn btn-success btn-icon-split" role="button" href="afficher.php?reqId=<?php echo $Id; ?>"><span class="text-white-50 icon"><i class="fas fa-arrow-right"></i></span><span class="text-white text">Afficher la requête</span> </a>
                                            <span class="text-right"> <span> <?php if ($etat == 'valide' or $etat=='non valide'  ) {
                                            echo '<span class="badge badge-danger">' . " requete deja trairée" . '</span>';
                                            
                                             }   elseif($etat=='en cours de traitement'){  echo '<span class="badge badge-secondary">' . " en cours de traitement" . '</span>';  }?></span></td>

                                        </tr> <?php } ?>
                                    </tr>
                                    </tbody>
                                   

                                </table>
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