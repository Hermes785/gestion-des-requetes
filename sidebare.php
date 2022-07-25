  <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion " id="o">
               
            <div class="container-fluid d-flex flex-column p-0"> <br>
                  <span class="badge badge-success   " ><?php echo $_SESSION["NomE"] . " " . $_SESSION["PrenomE"]; ?></span>  </br>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar" >
                 <li class="nav-item" role="presentation"><a class="nav-link" href="acceuille.php" > <i class="fas fa-home"></i><span>Acceuille</span></a>   </li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="effectuerRequete.php"><i class="fas fa-edit"></i><span>Effectuer une requête</span></a>
                    <a class="nav-link "  href="requetes.php" ><i class="fas fa-list"></i>
                    <span>Mes requêtes</span> 
                                                   <?php require_once('noti.php');
                                                ?></span>  
                                                </span>   </a> 
                    <a class="nav-link active" href="infos.php"><i class="fas fa-user"></i><span>Mes informations</span></a>
                      <span class="badge badge-secondary "><a  href="logout" class="text-light"><i class="fas fa-sign-out-alt fa-sm fa-fw  "></i>&nbsp;Déconnexion</a></span>
                    
                    </li>
                   
                </ul>
            
            </div>
        </nav>
       <div class="d-flex flex-column  bg-white" id="content-wrapper">
        

            <div id="content">
             
                    <?php  require_once('image.php'); ?>     <br>