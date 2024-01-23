<?php
    require('../Configurations/MaConnexion.php');
    require('../Configurations/MaSession.php');
    $con=new Connexion();
    $sess=new Session();
    $connex=$con->EtablirUneConnexion();
    if(!isset($_SESSION['iduser'])){
      header('location:../login.php');
    }
	 if($_SESSION['privilege']!="superviseur"){
      header('location:..');
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
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            Message Start
            <div class="media">
              <img src="../templates/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../templates/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../templates/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>

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
      <!-- <div class="form-inline">
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
            <h1>Chef Agence</h1>
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
		  	<h5 class="mb-2 mt-4">Statistiques</h5>
        <div class="row">

           <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqNombre=$connex->prepare("select count(*) from affectations_agents where idAgence='".$_SESSION['idagence']."'");
              $reqNombre->execute();
              $info=$reqNombre->fetch();
            ?>
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $info[0]  ?></h3>

                <p>Nombre Agents</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="infosAgents.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqDemEnPaie=$connex->prepare("select count(*) from demandes, agents, affectations_agents, agences where demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."'and NOT EXISTS(select* from paiements where demandes.IdDemande=paiements.IdDemande)");
              $reqDemEnPaie->execute();
              $infoDemEnPaie=$reqDemEnPaie->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoDemEnPaie[0]  ?></h3>

                <p>Demandes en attente de Paiement</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="demandePasPayee.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqDemEnVal=$connex->prepare("select count(*) from paiements, demandes, agents, affectations_agents, agences where paiements.IdDemande=demandes.IdDemande and demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."' and demandes.EtatDemande!='valide'");
              $reqDemEnVal->execute();
              $infoDemEnVal=$reqDemEnVal->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoDemEnVal[0]  ?></h3>

                <p>Demande en attente de validation</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="demandesPasValidees.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqDossACreer=$connex->prepare("select count(*) from paiements, demandes, agents, affectations_agents, agences where paiements.IdDemande=demandes.IdDemande and demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."'and NOT EXISTS(select* from dossiers where dossiers.IdDemande=demandes.IdDemande)");
              $reqDossACreer->execute();
              $infoDossACreer=$reqDossACreer->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoDossACreer[0]  ?></h3>

                <p>Dossiers à  créer</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="DossiersACreer.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqDossEnAffectes=$connex->prepare("select count(*) from dossiers, demandes, agents, affectations_agents, agences where dossiers.IdDemande=demandes.IdDemande and demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."'and NOT EXISTS(select* from affectations_dossiers where dossiers.IdDossier=affectations_dossiers.IdDossier)");
              $reqDossEnAffectes->execute();
              $infoDossEnAffectes=$reqDossEnAffectes->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoDossEnAffectes[0]  ?></h3>

                <p>Dossiers en attente d'affectation</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="DossiersEnAttenteAffect.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->


           <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqDossEnPlanification=$connex->prepare("select count(*) from dossiers, demandes, agents, affectations_agents, agences, affectations_dossiers where affectations_dossiers.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and affectations_dossiers.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."'and NOT EXISTS(select* from visites where dossiers.IdDossier=visites.IdDossier)");
              $reqDossEnPlanification->execute();
              $infoDossEnPlanification=$reqDossEnPlanification->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoDossEnPlanification[0]  ?></h3>
                <p>Visites en attente de planification</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="DossiersEnAttentePlanification.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqVisitePlanifie=$connex->prepare("select count(*) from visites, dossiers, demandes, agents, affectations_agents, agences, affectations_dossiers where visites.IdDossier=dossiers.IdDossier and affectations_dossiers.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."' and visites.EtatVisite='Planifie'");
              $reqVisitePlanifie->execute();
              $infoVisitePlanifie=$reqVisitePlanifie->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoVisitePlanifie[0]  ?></h3>

                <p>Visites Planifiées</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="VisitesPlanifiees.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqVisiteTermine=$connex->prepare("select count(*) from visites, dossiers, demandes, agents, affectations_agents, agences, affectations_dossiers where visites.IdDossier=dossiers.IdDossier and affectations_dossiers.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and affectations_dossiers.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."' and visites.EtatVisite='Termine'");
              $reqVisiteTermine->execute();
              $infoVisiteTermine=$reqVisiteTermine->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoVisiteTermine[0]  ?></h3>

                <p>Visites Terminées</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="VisitesTerminees.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->


          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqDossConforme=$connex->prepare("select count(*) from visites, dossiers, agents, affectations_agents, agences, affectations_dossiers where visites.IdDossier=dossiers.IdDossier and affectations_dossiers.IdDossier=dossiers.IdDossier and affectations_dossiers.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."' and dossiers.EtatDossier='Conforme'");
              $reqDossConforme->execute();
              $infoDossConforme=$reqDossConforme->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoDossConforme[0]  ?></h3>

                <p>Dossiers Cloturés Conformes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="DossiersConformes.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqDossNonConforme=$connex->prepare("select count(*) from visites, dossiers, demandes, agents, affectations_agents, agences, affectations_dossiers where visites.IdDossier=dossiers.IdDossier and affectations_dossiers.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and affectations_dossiers.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."' and dossiers.EtatDossier='Non Conforme'");
              $reqDossNonConforme->execute();
              $infoDossNonConforme=$reqDossNonConforme->fetch();
            ?>
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $infoDossNonConforme[0]  ?></h3>

                <p>Dossiers Cloturés Non Conformes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="DossiersNonConformes.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqDossHorsLimite=$connex->prepare("select count(*) from affectations_dossiers, dossiers, demandes, agents, affectations_agents, agences where affectations_dossiers.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."' and dossiers.EtatDossier='Conforme' or dossiers.EtatDossier='Non Conforme' and DATEDIFF(dossiers.DateCreation, dossiers.DateCloture)>'5'");
              $reqDossHorsLimite->execute();
              $infoDossHorsLimite=$reqDossHorsLimite->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoDossHorsLimite[0]  ?></h3>

                <p>Demandes hors Limites (>5 jours) </p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="DossiersHorsLimites.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->


           <div class="col-lg-3 col-6">
            <!-- small card -->
            <?php
              $reqAttestation=$connex->prepare("select count(*) from attestations, dossiers, demandes, agents, affectations_agents, agences where attestations.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and agences.idAgence='".$_SESSION['idagence']."'");
              $reqAttestation->execute();
              $infoAttestation=$reqAttestation->fetch();
            ?>
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $infoAttestation[0]  ?></h3>

                <p>Attestations Délivrées</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="AttestationsDelivrees.php" class="small-box-footer">
                Afficher <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->


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
