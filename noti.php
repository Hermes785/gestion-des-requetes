
                                                   <?php global $Connection;
                                                  $idE = $_SESSION["User_Id"];
                                                
                                                 $TRQuery = "SELECT COUNT(etat) FROM req WHERE etat!='valide' and etat!='non valide' AND idE=$idE ";
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
                                                      
                                                $TRQuery = "SELECT COUNT(etat) FROM req WHERE etat!='pas encore traiter' and etat!='en cours de traitement' AND idE=$idE  ";
                                                $TRExecute = mysqli_query($Connection, $TRQuery);
                                                $RR = mysqli_fetch_array($TRExecute);
                                                $T = array_shift($RR);
                                                if($T>0){ 

                                                echo '<span  id="dis" class="badge badge-warning">' . $T . '</span>';
                                                }
                                                ?>