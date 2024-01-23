<?php
    require('../Configurations/MaConnexion.php');
    require('../Configurations/MaSession.php');
    $con=new Connexion();
    $sess=new Session();
    $cnx=$con->EtablirUneConnexion();
    include('../scriptVerification.html');
    if(!isset($_SESSION['iduser'])){
      header('location:../login.php');
    }
  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8" />
  <title>Cossuel App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../templates/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../templates/dist/css/adminlte.min.css">
  <script type="text/javascript">
  function VerifPwd(mp,confmp){
    if(mp.value!='' && confmp.value!=''){
      if(mp.value!=confmp.value){
        alert("Les deux mots de passe saisis ne sont pas identiques !");
        mp.value='';
        confmp.value='';
        mp.focus();
      }
      else{
        alert("Vous devez saisir et confirmer votre mot de passe");
      }
    }
  }
</script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!--<a href="../index3.html" class="nav-link">Home</a>-->
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <!--<a href="#" class="nav-link">Contact</a>-->
      </li>
    </ul>
    <?php 
          echo '<strong>'.strtoupper($sess->RecuperationInformations('nomagence')).'</strong>';  
    ?>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <li class="nav-item">
        <a  href="../deconnexion.php" role="button">
          <i><strong>Déconnexion</strong></i>
        </a>
      </li>
        
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="../images/logocossuel.png" alt="AdminLTE Logo" width="100%" height="100" >
      <!--<span class="brand-text font-weight-light">AdminLTE 3</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <img src="../images/photos_agents/<?php echo $sess->RecuperationInformations('photo') ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo ucfirst($sess->RecuperationInformations('prenom')).'<br/> '. strtoupper($sess->RecuperationInformations('nom')) ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
      
      <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Accueil
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
      
      <li class="nav-item">
            <a href="Agents.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Nouveau Comptable
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="ListeAgents.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Affectation Agences
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Remboursements
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="demandesARembourser.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demandes de remboursements</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="demandesRemboursees.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Demandes Remboursées</p>
                </a>
              </li>
            </ul> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="remboursRejetes.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Remboursements Rejetés</p>
                </a>
              </li>
            </ul> 
          </li>

        <li class="nav-item">
            <a href="ServicesVendus.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Services Vendus
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
      <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Journal de Caisse
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="BilanPeriodiquesGlobal.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Global</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="BilanPeriodiquesEspece.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paiements par Espèce</p>
                </a>
              </li>
            </ul> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="BilanPeriodiquesCheques.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paiements par Chèque</p>
                </a>
              </li>
            </ul> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="BilanPeriodiquesElectroniques.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Paiements Electroniques</p>
                </a>
              </li>
            </ul> 
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Infos demandes
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="demandesAnnulees.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Annulées</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Widgets</li>-->
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <?php
        if(isset($_GET['idagent'])){
          $req=$cnx->prepare("select* from agents where IdAgent='".$_GET['idagent']."'order by NomAgent");
        }else{
          $req=$cnx->prepare("select* from agents where IdAgent='".$_POST['idagent']."'order by NomAgent");
        }
        $req->execute();
        $result=$req->fetch();
        ?>
        <div class="row">
          <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../images/photos_agents/<?php echo $result['PhotoAgent']  ?>" alt="User profile picture">
                </div>

                <p class="text-muted text-center"><?php echo $result['PrenomAgent']  ?></p>
                <h3 class="profile-username text-center"><?php echo $result['NomAgent']  ?></h3>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Adresse: </b> <a class="float-right"><?php echo $result['AdresseAgent']  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Téléphone:</b> <a class="float-right"><?php echo $result['TelephoneAgent']  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>E-Mail :</b> <a class="float-right"><?php echo $result['EmailAgent']  ?></a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#newcompte" data-toggle="tab"><strong>Création Compte</strong></a></li>
                  <li class="nav-item"><a class="nav-link active" href="#affect" data-toggle="tab"><strong>Affectation Agence</strong></a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab"><strong>Timeline</strong></a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="affect">

                <form action="detailsAgents.php" method="post">
                  <table>
                    <tr>
                      <td width="200">Entrez le nom de l'agence</td><td><input type="text" name="agrech" required></td><td><input type="submit"  name="rech" value="Rechercher"></td>
                    </tr>
                    <tr>
                      <?php
                        if(isset($_GET['idagent'])){
                          ?>
                            <td width="200"></td><td><input type="hidden" name="idagent" value="<?php echo $_GET['idagent'] ?>"></td><td></td>
                          <?php
                        }else if (isset($_POST['idagent'])){
                          ?>
                            <td width="200"></td><td><input type="hidden" name="idagent" value="<?php echo $_POST['idagent'] ?>"></td><td></td>
                          <?php
                        }
                      ?>
                      
                    </tr>
                  </table>
                  <br/>
                </form>

                <?php
                if(!isset($_POST['rech'])){
                    ?>
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Code Agence</th>
                    <th>Nom Agence</th>
                    <th>Adresse Agence</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $req=$cnx->prepare("select* from agences order by NomAgence limit 10");
                    $req->execute();
                    while($resultAg=$req->fetch()){
                        ?>
                  <tr>
                    <td><?php echo $resultAg['CodeAgence'] ?></td>
                    <td><?php echo $resultAg['NomAgence'] ?></td>
                    <td><?php echo $resultAg['AdresseAgence'] ?></td>
                    <td><a href="detailsAgents.php?idagent=<?php echo $_GET['idagent'] ?>&idagence=<?php echo $resultAg['IdAgence'] ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Séléctionner</button></a></td>
                  </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
                    <?php
                  }else{
                      ?>

                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Code Agence</th>
                    <th>Nom Agence</th>
                    <th>Adresse Agence</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $req=$cnx->prepare("select* from agences where NomAgence like '%".$_POST['agrech']."%'");
                    $req->execute();
                    while($resultAg=$req->fetch()){
                        ?>
                  <tr>
                    <td><?php echo $resultAg['CodeAgence'] ?></td>
                    <td><?php echo $resultAg['NomAgence'] ?></td>
                    <td><?php echo $resultAg['AdresseAgence'] ?></td>
                    <td><a href="detailsAgents.php?idagent=<?php echo $_POST['idagent'] ?>&idagence=<?php echo $resultAg['IdAgence'] ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Séléctionner</button></a></td>
                  </tr>
                    <?php
                      }
                    ?>
                  </tbody>
                </table>
                    <?php
                  }
                ?>
                
                  <?php
                    if (isset($_GET['idagent']) && isset($_GET['idagence'])){
                      $reqAgent=$cnx->prepare("select* from agents where IdAgent = '".$_GET['idagent']."'");
                      $reqAgence=$cnx->prepare("select* from agences where IdAgence = '".$_GET['idagence']."'");
                      $reqAgent->execute();
                      $reqAgence->execute();
                      $infosAgent=$reqAgent->fetch();
                      $infosAgence=$reqAgence->fetch();
                      echo'<br/><br/>';
                      echo "<strong>Confirmez-vous l'affectation de l'agent:  ".$infosAgent['MatriculeAgent']."  " .$infosAgent['PrenomAgent']."  ".$infosAgent['NomAgent']."</strong>";
                      echo'<br/>';
                      echo "<strong>à l'agence de: ".$infosAgence['NomAgence']."  comme comptable ? </strong>";
                      ?>
                        <form action="valideEnreg.php" method="post">
                          <table>
                          <tr>
                            <td><input type="hidden" name="id_agent" value="<?php echo $_GET['idagent']  ?>"></td>
                            <td><input type="hidden" name="id_agence" value="<?php echo $_GET['idagence']  ?>"></td>
                          </tr>
                          <tr>
                            <td><button type="submit" name="oui" class="btn btn-danger">OUI</button></td>
                            <td><button type="submit" name="non" class="btn btn-danger">NON</button></td>
                          </tr>
                        </table>
                        </form>
                      <?php
                    }
					$cnx=NULL;
					
					
					
                  ?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="newcompte">
                    <form class="form-horizontal" action="valideEnreg.php" method="post" name="frmCompte">
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Date Création</label>
                        <div class="col-sm-10">
                          <input type="date" name="datecompte" class="form-control"  placeholder="Date Création" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Heure Création</label>
                        <div class="col-sm-10">
                          <input type="time" name="heurecompte" class="form-control" placeholder="Heure Création" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Login</label>
                        <div class="col-sm-10">
                          <input type="text" name="login" maxlength="50" class="form-control"  placeholder="Entrez votre login" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Mot de Passe</label>
                        <div class="col-sm-10">
                          <input type="password" name="pwd" maxlength="100" class="form-control"  placeholder="Entrez votre mot de passe" onblur="VerifPwd(frmCompte.pwd, frmCompte.confpwd)" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Confirmation</label>
                        <div class="col-sm-10">
                          <input type="password" name="confpwd" class="form-control"  placeholder="Confirmez votre mot de passe" onblur="VerifPwd(frmCompte.pwd, frmCompte.confpwd)" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <?php
                            if(isset($_GET['idagent'])){
                              ?>
                                <input type="hidden" name="idag" class="form-control"  value="<?php echo $_GET['idagent']  ?>">
                              <?php
                            }else{
                              ?>
                                <input type="hidden" name="idag" class="form-control"  value="<?php echo $_POST['idagent']  ?>">
                              <?php
                            }
                          ?>
                          
                        </div>
                      </div>
                
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="create" class="btn btn-danger">Créer compte</button>
                        </div>
                      </div>
                    </form>


                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



        



              
      </div>
    </section>
    <!-- /.content -->

    <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0-rc
    </div>
    <strong>Copyright &copy; 2021 <a href="https://cossuel.sn">Cossuel</a>.</strong> Tous droits réservés.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../templates/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../templates/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../templates/dist/js/demo.js"></script>
</body>
</html>




















          