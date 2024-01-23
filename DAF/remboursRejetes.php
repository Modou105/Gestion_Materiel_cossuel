<?php
    require('../Configurations/MaConnexion.php');
    require('../Configurations/MaSession.php');
    $con=new Connexion();
    $sess=new Session();
    $connex=$con->EtablirUneConnexion();
    include('../MyCossuelAppFunctions/MontantToPay.php');
    include('../MyCossuelAppFunctions/CalculDebitInitial.php');
    include('../MyCossuelAppFunctions/CalculCreditInitial.php');
    include('../MyCossuelAppFunctions/CalculSoldeInitial.php');
    include('../MyCossuelAppFunctions/AfficheDateFrancais.php');
    if(!isset($_SESSION['iduser'])){
      header('location:../login.php');
    }
    $total=0;
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
    function verifIntervallaDate(date1,date2){
      var firstdate=date1;
      var secondeDate=date2;
      if(firstdate=="" || secondeDate==""){
          alert("Assurez-vous que les deux dates soient saisies");
          window.location.href="demandesARembourser.php";
      }else{
        if(firstdate>secondeDate){
          alert("la date de fin ne doit pas être antérieure à celle du début");
          window.location.href="demandesARembourser.php";
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
         //echo '<strong>'.strtoupper($sess->RecuperationInformations('nomagence')).'</strong>';  
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

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Demandes à Rembourser(D.A.F.)</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
              <li class="breadcrumb-item active"></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php
            if(!isset($_POST['rech'])){
          ?>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numero Demande</th>
                    <th>Type Demande</th>
                    <th>Date Paiement</th>
                    <th>Installeur</th>
                    <th>Propriètaire</th>
                    <th>Puissance</th>
                    <th>Objet</th>
                    <th>Montant</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $reqDemandeAPayee=$connex->prepare("select* from paiements, demandes, installations, electriciens, proprietaires where paiements.IdDemande=demandes.IdDemande and demandes.IdElectricien=electriciens.IdElectricien and demandes.IdProprietaire=proprietaires.IdProprietaire and demandes.IdInstallation=installations.IdInstallation and paiements.LibellePaiement='Remboursement' and paiements.EtatRemboursement='Instance'");
                      $reqDemandeAPayee->execute();
                      $Nombre=0;
                      while($infoDemandeAPayee=$reqDemandeAPayee->fetch()){
                    ?>
                  <tr>
                    <td><?php echo $infoDemandeAPayee['NumeroDemande'] ?></td>
                    <td>
                      <?php
                        if($infoDemandeAPayee['TypeDemande']=='dom') {
                          echo 'Domestique';
                        }else{
                          echo 'Non Domestique';
                        }
                      ?>
                    </td>
                    <td><?php echo Datefr($infoDemandeAPayee['DatePaiement']) ?></td>
                    <td><?php echo $infoDemandeAPayee['PrenomElectricien'].' '.$infoDemandeAPayee['NomElectricien'] ?></td>
                    <td><?php echo $infoDemandeAPayee['PrenomProprietaire'].' '.$infoDemandeAPayee['NomProprietaire'] ?></td>
                    <td><?php echo $infoDemandeAPayee['PuissanceDemandee'] ?></td>
                    <td>
                    <?php
                      $reqCompteVisite=$connex->prepare("select count(idVisite) from visites, dossiers, demandes, installations where visites.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and demandes.IdInstallation=installations.IdInstallation and installations.IdInstallation='".$infoDemandeAPayee['IdInstallation']."' and dossiers.EtatDossier!='Conforme'");
                      $reqCompteVisite->execute();
                      $infoCompteVisite=$reqCompteVisite->fetch();
                      $Nombre=$infoCompteVisite[0];
                      if($Nombre==0){
                        echo '1 <sup>ère</sup> Visite';
                      }else{
                        echo ($infoCompteVisite[0]+1).' <sup>ème</sup> Visite';
                      }
                    ?>
                    </td>
                    <td align="right">
                    <?php
                      echo '<strong>'.CalculMontant($infoDemandeAPayee['TypeDemande'], $Nombre, $infoDemandeAPayee['PuissanceDemandee']).'</strong>';
                    ?>

                    </td>
                    <td align="center"><a href="Remboursements.php?iddem=<?php echo $infoDemandeAPayee['IdDemande']  ?>"><img src="../images/remboursement.png" width="30" height="30"></a></td>
                    </tr>
                    <?php
                      }
                      $connex=NULL;
                    ?>
                  </tbody>
                </table>

                <?php
                  }else{

                  ?>
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Numero Demande</th>
                    <th>Type Demande</th>
                    <th>Date Demande</th>
                    <th>Installeur</th>
                    <th>Propriètaire</th>
                    <th>Puissance</th>
                    <th>Objet</th>
                    <th>Montant</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                      $reqDemandeAPayee=$connex->prepare("select* from demandes, installations, electriciens, proprietaires where demandes.IdElectricien=electriciens.IdElectricien and demandes.IdProprietaire=proprietaires.IdProprietaire and demandes.IdInstallation=installations.IdInstallation and demandes.NumeroDemande='".$_POST['numdem']."' and demandes.EtatDemande='soumise' and NOT EXISTS(select* from paiements where paiements.IdDemande=demandes.IdDemande)");
                      $reqDemandeAPayee->execute();
                      $Nombre=0;
                      if($reqDemandeAPayee->rowCount()==0){
                        ?>
                          <script type="text/javascript">
                              alert("Cette demande est déjà payée ou n'existe pas");
                          </script>
                        <?php
                      }else{
                      while($infoDemandeAPayee=$reqDemandeAPayee->fetch()){
                    ?>
                  <tr>
                    <td><?php echo $infoDemandeAPayee['NumeroDemande'] ?></td>
                    <td>
                      <?php
                        if($infoDemandeAPayee['TypeDemande']=='dom') {
                          echo 'Domestique';
                        }else{
                          echo 'Non Domestique';
                        }
                      ?>
                    </td>
                    <td><?php echo $infoDemandeAPayee['DateDemande'] ?></td>
                    <td><?php echo $infoDemandeAPayee['PrenomElectricien'].' '.$infoDemandeAPayee['NomElectricien'] ?></td>
                    <td><?php echo $infoDemandeAPayee['PrenomProprietaire'].' '.$infoDemandeAPayee['NomProprietaire'] ?></td>
                    <td><?php echo $infoDemandeAPayee['PuissanceDemandee'] ?></td>
                    <td>
                    <?php
                      $reqCompteVisite=$connex->prepare("select count(idVisite) from visites, dossiers, demandes, installations where visites.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and demandes.IdInstallation=installations.IdInstallation and installations.IdInstallation='".$infoDemandeAPayee['IdInstallation']."'");
                      $reqCompteVisite->execute();
                      $infoCompteVisite=$reqCompteVisite->fetch();
                      $Nombre=$infoCompteVisite[0];
                      if($Nombre==0){
                        echo '1 <sup>ère</sup> Visite';
                      }else{
                        echo ($infoCompteVisite[0]+1).' <sup>ème</sup> Visite';
                      }
                    ?>
                    </td>
                    <td align="right">
                    <?php
                      echo '<strong>'.CalculMontant($infoDemandeAPayee['TypeDemande'], $Nombre, $infoDemandeAPayee['PuissanceDemandee']).'</strong>';
                    ?>

                    </td>
                    <td align="center"><a href="Paiements.php?iddem=<?php echo $infoDemandeAPayee['IdDemande']  ?>"><img src="../images/paiements.png" width="30" height="30"></a></td>
                    </tr>
                    <?php
                      }
                    }
                      $connex=NULL;
                    ?>
                  </tbody>
                </table>
                <?php
                  }
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
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