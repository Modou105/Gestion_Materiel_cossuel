<?php
    require('../Configurations/MaConnexion.php');
    require('../Configurations/MaSession.php');
    $con=new Connexion();
    $sess=new Session();
    $connex=$con->EtablirUneConnexion();
    include('../MyCossuelAppFunctions/MontantToPay.php');
    if(!isset($_SESSION['iduser'])){
      header('location:../login.php');
    }
  ?>
  <script type="text/javascript">
    function AfficherRembours(){
          document.getElementById('rj').style.visibility="hidden";
          document.getElementById('rb').style.visibility="visible";
          document.getElementById('chpmotifrej').style.visibility="hidden";
    }

    function AfficherRejet(){
          document.getElementById('rj').style.visibility="visible";
          document.getElementById('rb').style.visibility="hidden";
          document.getElementById('chpmotifrej').style.visibility="visible";
    }
    function CacheTout(){
          document.getElementById('rj').style.visibility="hidden";
          document.getElementById('rb').style.visibility="hidden";
          document.getElementById('chpmotifrej').style.visibility="hidden";
    }
  </script>
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
</head>
<body class="hold-transition sidebar-mini" onload="CacheTout()">
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

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Remboursement (D.A.F.)</h1>
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
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">REMBOURSEMENT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php
                if(isset($_GET['iddem'])){
                    $reqAfficheRemb=$connex->prepare("select * from paiements, demandes where paiements.IdDemande=demandes.IdDemande and demandes.IdDemande='".$_GET['iddem']."'");
                    $reqAfficheRemb->execute();
                    $recupInfosRemb=$reqAfficheRemb->fetch();
                }
              ?>
              <form action="valideModif.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Date Remboursement</label>
                    <input type="date"  name="dateremb" class="form-control" value=<?php echo $recupInfosRemb['DatePaiement']  ?> readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Heure Remboursement</label>
                    <input type="time" name="heureremb" class="form-control" value=<?php echo $recupInfosRemb['HeurePaiement'] ?> readonly>
                  </div>
                  <div class="form-group">
                    <label for="">Mode Remboursement</label>
                    <input type="text" name="moderemb" class="form-control" value=<?php echo $recupInfosRemb['ModePaiement'] ?> readonly>
                  </div>
                  <!--<div class="form-group">
                    <label for="exampleInputAdr">Référence Remboursement</label>
                    <input type="text" name="refremb" class="form-control" id="" placeholder="Précisez les référence de paiement si ce dernier n'est pas en espèce">
                  </div>-->
                  <div class="form-group">
                    <label for="">Motif Avancé</label>
                    <textarea rows="5"  name="motifav" class="form-control" id="motifav" readonly>
                      <?php echo $recupInfosRemb['MotifRemboursement'] ?>
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Décision prise</label>&nbsp;&nbsp;
                    <input type="radio" name="dec" id="accepter" onclick="AfficherRembours()">&nbsp; Accepter&nbsp;&nbsp;  
                    <input type="radio" name="dec" id="rejeter" onclick="AfficherRejet()">&nbsp;Rejeter 
                  </div>
                  <div class="form-group" id="chpmotifrej">
                    <label for="">Motif Rejet</label>
                    <textarea rows="5"  name="motifrej" class="form-control" id="motifrej">
                      
                    </textarea>
                  </div>
                  <div class="card-footer">
                  <button type="submit" name="enregRemboursement" id="rb" class="btn btn-primary">Rembourser</button>
                  <button type="submit" name="enregRejet" id="rj" class="btn btn-primary">Rejeter</button>
                </div>
                  <div class="form-group">
                    <label for=""></label>
                    <input type="hidden"  name="iddem" class="form-control" value=<?php echo $_GET['iddem'] ?> required>
                  </div>
                </div>
              </form>
                <!-- /.card-body -->
            </div>
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
