<?php
    require('../Configurations/MaConnexion.php');
    require('../Configurations/MaSession.php');
    $con=new Connexion();
    $sess=new Session();
    $connex=$con->EtablirUneConnexion();
    if(!isset($_SESSION['iduser'])){
      header('location:../login.php');
    }
  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>Cossuel App</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../templates/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../templates/dist/css/adminlte.min.css">
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
       
      <!-- Notifications Dropdown Menu -->
      
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
      <!--<div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>-->

      <!-- Sidebar Menu -->
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
                  Nouvel Agent
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            </li>

            <li class="nav-item">
            <a href="ListeAgents.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Affectation Agents
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          </li>
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
            <h1>Liste des Agents</h1>
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

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <table cellpadding="3">
          <tr>
            <td width="150"><strong>Entrez le matricule</strong></td><td><input type="text" name="matrech"></td><td></td>
          </tr>
          <tr>
            <td width="150"><strong>Entrez le Prénom</strong></td><td><input type="text" name="prenrech" size="40"></td><td></td>
          </tr>
          <tr>
            <td width="150"><strong>Entrez le Nom</td></strong><td><input type="text" name="nomrech" size="40"></td><td><input type="submit" name="rech" value="Rechercher"></td>
          </tr>
        </table>
      </form>
      <br/><br/>
      <div class="row">
          <?php
            $req=$connex->prepare("select agents.IdAgent, agents.MatriculeAgent, agents.PrenomAgent, agents.NomAgent, agents.PhotoAgent, compteutilisateurs.Privilege, agences.IdAgence from agents, agences, affectations_agents, compteutilisateurs where agents.IdAgent=compteutilisateurs.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.IdAgence='".$sess->RecuperationInformations('idagence')."' order by agents.NomAgent, agents.PrenomAgent");
            $req->execute();
            while($result=$req->fetch()){
                ?>
                  <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                      <h3 class="widget-user-username"><?php echo '<strong>'.$result['PrenomAgent'].' '.$result['NomAgent'].'</strong>'   ?></h3>
                      <h5 class="widget-user-desc"><?php echo $result['Privilege'] ?></h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle elevation-2" src="../images/photos_agents/<?php echo $result['PhotoAgent'] ?>" alt="User Avatar">
                    </div>



                    <div class="card-footer">
                      <div class="row">
                        <?php
                          if($result['Privilege']=="Accueil"){
                        ?>
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <?php
                            $reqNbreDemandes=$connex->prepare("select count(*) from demandes, agents, affectations_agents, agences where demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agents.IdAgent='".$result['IdAgent']."' and agences.idAgence='".$_SESSION['idagence']."'");
                            $reqNbreDemandes->execute();
                            $infoNbreDemandes=$reqNbreDemandes->fetch();
                            ?>
                            <h5 class="description-header"><?php echo $infoNbreDemandes[0]  ?></h5>
                            <span class="description-text"><a href="DossiersACreer.php?idag=<?php echo $result['IdAgent']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Demandes crées</button></a></span>
                          </div>
                        </div>
                        <?php 
                          }else if($result['Privilege']=="Referent"){
                        ?>
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <?php
                            $reqNbreDossierCree=$connex->prepare("select count(*) from dossiers, demandes, agents, affectations_agents, agences where dossiers.IdDemande=demandes.IdDemande and dossiers.IdAgentCree=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agents.IdAgent='".$result['IdAgent']."' and agences.idAgence='".$_SESSION['idagence']."'");
                            $reqNbreDossierCree->execute();
                            $infoNbreDossier=$reqNbreDossierCree->fetch();
                            ?>
                            <h5 class="description-header"><?php echo $infoNbreDossier[0]  ?></h5>
                            <span class="description-text"><a href="DossiersEnAttenteAffect.php?idag=<?php echo $result['IdAgent']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Dossiers Crées</button></a></span>
                          </div>
                        </div>

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <?php
                            $reqNbreDossierAffect=$connex->prepare("select count(*) from affectations_dossiers, dossiers, demandes, agents, affectations_agents, agences where demandes.IdDemande=dossiers.IdDemande and dossiers.IdDossier=affectations_dossiers.IdDossier and affectations_dossiers.IdAgentAffectant=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and affectations_dossiers.IdAgentAffectant='".$result['IdAgent']."' and agences.idAgence='".$_SESSION['idagence']."'");
                            $reqNbreDossierAffect->execute();
                            $infoNbreDossierAffect=$reqNbreDossierAffect->fetch();
                            ?>
                            <h5 class="description-header"><?php echo $infoNbreDossierAffect[0]  ?></h5>
                            <span class="description-text"><a href="DossiersEnAttentePlanification.php?idag=<?php echo $result['IdAgent']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Dossiers Affectés</button></a></span>
                          </div>
                        </div>

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <?php
                            $reqNbreDossCloture=$connex->prepare("select count(*) from visites, affectations_dossiers, dossiers, demandes, agents, affectations_agents, agences where visites.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and dossiers.IdDossier=affectations_dossiers.IdDossier and affectations_dossiers.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and affectations_dossiers.IdAgentAffectant='".$result['IdAgent']."' and agences.idAgence='".$_SESSION['idagence']."' and dossiers.EtatDossier='Conforme' or 'Non Conforme'");
                            $reqNbreDossCloture->execute();
                            $infoNbreDossCloture=$reqNbreDossCloture->fetch();
                            ?>
                            <h5 class="description-header"><?php echo $infoNbreDossCloture[0]  ?></h5>
                            <span class="description-text"><a href="DossiersConformes.php?idag=<?php echo $result['IdAgent']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Dossiers Clôturés</button></a></span>
                          </div>
                        </div>
                        <?php  
                          }else if($result['Privilege']=="Controleur"){
                        ?>
                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <?php
                            $reqNbreDossAffect=$connex->prepare("select count(*) from dossiers, affectations_dossiers, agents, affectations_agents, agences where dossiers.IdDossier=affectations_dossiers.IdDossier and affectations_dossiers.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agents.IdAgent='".$result['IdAgent']."' and agences.idAgence='".$_SESSION['idagence']."' and NOT EXISTS(select * from visites where visites.IdDossier=dossiers.IdDossier)");
                            $reqNbreDossAffect->execute();
                            $infoNbreDossAffect=$reqNbreDossAffect->fetch();
                            ?>
                            <h5 class="description-header"><?php echo $infoNbreDossAffect[0]  ?></h5>
                            <span class="description-text"><a href="DossiersEnAttentePlanification.php?idag=<?php echo $result['IdAgent']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Dossiers affectés</button></a></span>
                          </div>
                        </div>

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <?php
                            $reqInspectionsPlanifiees=$connex->prepare("select count(*) from visites, dossiers, affectations_dossiers, agents, affectations_agents, agences where dossiers.IdDossier=affectations_dossiers.IdDossier and dossiers.IdDossier=visites.IdDossier and affectations_dossiers.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agents.IdAgent='".$result['IdAgent']."' and agences.idAgence='".$_SESSION['idagence']."' and visites.EtatVisite='Planifie'");
                            $reqInspectionsPlanifiees->execute();
                            $infoInspectionsPlanifiees=$reqInspectionsPlanifiees->fetch();
                            ?>
                            <h5 class="description-header"><?php echo $infoInspectionsPlanifiees[0]  ?></h5>
                            <span class="description-text"><a href="VisitesPlanifiees.php?idag=<?php echo $result['IdAgent']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Visites Planifiées</button></a></span>
                          </div>
                        </div>

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <?php
                            $reqInspectionsTerminees=$connex->prepare("select count(*) from visites, dossiers, affectations_dossiers, agents, affectations_agents, agences where dossiers.IdDossier=affectations_dossiers.IdDossier and dossiers.IdDossier=visites.IdDossier and affectations_dossiers.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agents.IdAgent='".$result['IdAgent']."' and agences.idAgence='".$_SESSION['idagence']."' and visites.EtatVisite='Termine'");
                            $reqInspectionsTerminees->execute();
                            $infoInspectionsTerminees=$reqInspectionsTerminees->fetch();
                            ?>
                            <h5 class="description-header"><?php echo $infoInspectionsTerminees[0]  ?></h5>
                            <span class="description-text"><a href="VisitesTerminees.php?idag=<?php echo $result['IdAgent']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Visites Terminées</button></a></span>
                          </div>
                        </div>
                        <?php  
                          }else if($result['Privilege']=="Superviseur"){
                        ?>
                        <!--<div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">0</h5>
                            <span class="description-text"><a href=""><button type="button" class="btn btn-block btn-outline-primary btn-xs">Agents crées</button></a></span>
                          </div>
                        </div>

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">0</h5>
                            <span class="description-text"><a href=""><button type="button" class="btn btn-block btn-outline-primary btn-xs">Comptes crées</button></a></span>
                          </div>
                        </div>

                        <div class="col-sm-4 border-right">
                          <div class="description-block">
                            <h5 class="description-header">0</h5>
                            <span class="description-text"><a href=""><button type="button" class="btn btn-block btn-outline-primary btn-xs">Affectations</button></a></span>
                          </div>
                        </div>-->
                        <?php 
                          }
                        ?>

                      </div>
                    </div>

                  </div>
                  <!-- /.widget-user -->
                </div>
          <!-- /.col -->

                <?php
            }
          ?>
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
