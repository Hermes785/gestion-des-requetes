<?php require_once("db.php"); ?>
<?php require_once("functions.php"); ?>
<?php require_once("sessions.php"); ?>
<?php Login_Confirm() ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Mes requêtes</title>
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
                    <li class="nav-item" role="presentation"><a class="nav-link" href="effectuerRequete.php"><i class="fas fa-edit"></i><span>Effectuer une requête</span></a>
                    <a class="nav-link active"  href="requetes.php" ><i class="fas fa-list"></i>
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
          

            <div id="content">
             
            
                <div class="container-fluid ">
                    <?php  require_once('image.php'); ?>   <br> 
                    <h3 class="text-dark mb-4">Mes Requêtes</h3>
                    <div class="card">
                        <div class="card-header py-3">
                            <p class="text-danger m-0 font-weight-bold">Historique des requêtes</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" >
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                        <th> No </th>
                                            <th>Date</th>
                                            <th>Destinataire</th>
                                            <th>Objet de la requête</th>
                                            <th>Session</th>
                                             <th>Matiere</th>
                                            <th>Statut</th>
                                            <th>Decision</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody><?php
                                           $num=1;
                                            $statut1 = "valide";
                                            $statut2 = "invalide";
                                            $statut3='en cours de traitement';
                                            global $Connection;
                                            $idE = $_SESSION["User_Id"];
                                            $ViewQuery = " SELECT * FROM req WHERE idE = '$idE' ORDER BY  date  asc ";
                                            $Execute = mysqli_query($Connection, $ViewQuery);
                                            while ($DataRows = mysqli_fetch_array($Execute)) {
                                                $id = $DataRows["id"];
                                                $Date = $DataRows["date"];
                                                $Dest = $DataRows["dest"];
                                                $Obj = $DataRows["obj"];
                                                $Statut = $DataRows["statut"];
                                                $Observ = $DataRows["observ"];
                                                $etat = $DataRows["etat"];
                                                 $matiere = $DataRows["matiere"];
                                                 $sessions= $DataRows["session"];
                                              
                                            ?>
                                            <tr>
                                            <td><?php echo $num++; ?></td>
                                                <td><?php echo $Date; ?></td>
                                                <td><?php echo $Dest; ?></td>
                                                <td><?php echo $Obj; ?></td>
                                                   <td><?php echo $sessions; ?></td>
                                                    <td><?php echo $matiere; ?></td>
                                                <td><?php
                                                    if ($etat == "pas encore traiter") {
                                                        echo '<span class="badge badge-secondary">' . $Statut . '</span>';
                                                    } else if ($etat == "valide") {
                                                        echo '<span class="badge badge-success">' . $statut1 . '</span>';
                                                    } else if ($etat == "non valide") {
                                                        echo '<span class="badge badge-danger">' . $statut2 . '</span>';
                                                    } elseif($etat=='en cours de traitement'){
                                                            echo '<span class="badge badge-secondary">' . $statut3 . '</span>';
                                                    }
                                                    ?></td>
                                                <td><?php

                                                    if($etat=='en cours de traitement')
                                                    {
                                                        echo '.....';
                                                    }

                                                    elseif (is_null($Observ)) {
                                                        echo "pas encore traiter";
                                                        # code...
                                                    } 
                                                    
                                                    else {
                                                        echo $Observ;
                                                    } ?></td>
                                                      <td>

                                                     <?php     
                                                    
                                                     if ($etat !='pas encore traiter' ) {

                                                          ?>
    

                                             <?php 
                                                     }
                                                     else {
                                                            ?>  
                                                    
                                            <button class="btn btn-warning" type="submit" name="modif" > <a id="a" class="text-white" href="modifier.php?id=<?php echo $id; ?>"> Modifier</a></button>
                                                 <button class="btn btn-danger" type="submit" name="modif" > <a id="a" class="text-white" href="suprimer.php?id= <?php echo $id; ?>"> Supprimer</a></button>
                                             <?php }  ?>  
                                            
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <?php    require_once("footer.php")  ;     ?>

          
            <script src="assets/js/jquery.min.js"></script>
               <script src="assets/js/dis.js"></script>
            <script src="assets/bootstrap/js/bootstrap.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
            <script src="assets/js/script.min.js"></script>
</body>

</html>