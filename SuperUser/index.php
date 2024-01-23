<?php
    require('../Configurations/MaConnexion.php');
    require('../Configurations/MaSession.php');
    $con=new Connexion();
    $sess=new Session();
    $connex=$con->EtablirUneConnexion();
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

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
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Superviseurs
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Superviseurs.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nouveau Superviseur</p>
                </a>
              </li>
            </ul>
      <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="ListeSuperviseurs.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Affectation Superviseur</p>
                </a>
              </li>
        
        </ul>

            <li class="nav-item">
            <a href="" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Rapports
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="Rapports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Nouveau Rapport</p>
                </a>
              </li>
            </ul>
      <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="infosRapports.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste des Rapports</p>
                </a>
              </li>
            </ul> 
				
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
            <h1>Super Utilisateurs</h1>
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
		  	        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">INFORMATIONS SUR LES AGENCES IMPLANTEES</h3>
              </div>
              <!-- ./card-header -->
              <div class="card-body p-0">
                <table class="table table-hover">
                  <tbody>
                    <?php
                      $reqRegion=$connex->prepare("select* from regions order by NomRegion");
                      $reqRegion->execute();
                      while($result=$reqRegion->fetch()){
                    ?>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                        <?php echo '<font size="5"><strong>'.$result['NomRegion'].'</strong></font>' ?>
                        <table>
                          <tr>
                            <td><a href="regions.php?idreg=<?php echo $result['IdRegion'] ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Afficher</button></a></td>
                            <td><a href="departements.php?idreg=<?php echo $result['IdRegion'] ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Nouveau département</button></a></td>
                          </tr>
                        </table>
                            <tr class="expandable-body">
                              <td>
                                <div class="p-0">
                                  <table class="table table-hover">
                                    <tbody>
                                      <?php
                                        $reqDepartement=$connex->prepare("select departements.IdDepartement, departements.NomDepartement from departements, regions where departements.IdRegion=regions.IdRegion and regions.IdRegion='".$result['IdRegion']."' order by NomDepartement");
                                        $reqDepartement->execute();
                                        while($resultDep=$reqDepartement->fetch()){
                                      ?>
                                      <tr data-widget="expandable-table" aria-expanded="false">
                                        <td>
                                          <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                            <?php echo '<font size="4"><strong><i>'.$resultDep['NomDepartement'].'</i></strong></font>' ?>
                                          <table>
                                            <tr>
                                              <td><a href="departements.php?iddep=<?php echo $resultDep['IdDepartement'] ?>"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Afficher</button></a></td>
                                              <td><a href="localites.php?iddep=<?php echo $resultDep['IdDepartement'] ?>"><button type="button" class="btn btn-block bg-gradient-primary btn-xs">Nouvelle Localité</button></a></td>
                                            </tr>
                                          </table>
                                          <tr class="expandable-body">
                                            <td>
                                              <div class="p-0">
                                                <table class="table table-hover">
                                                  <tbody>
                                                    <?php
                                                      $reqLocalite=$connex->prepare("select localites.IdLocalite, localites.NomLocalite from departements, localites where departements.IdDepartement=localites.IdDepartement and departements.IdDepartement='".$resultDep['IdDepartement']."' order by NomLocalite");
                                                      $reqLocalite->execute();
                                                      while($resultLoc=$reqLocalite->fetch()){
                                                    ?>
                                                    <tr data-widget="expandable-table" aria-expanded="false">
                                                      <td>
                                                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                                                        <?php echo '<font size="4"><strong><i>'.$resultLoc['NomLocalite'].'</i></strong></font>' ?>
                                                          <table>
                                                            <tr>
                                                              <td><a href="localites.php?idloc=<?php echo $resultLoc['IdLocalite'] ?>"><button type="button" class="btn btn-block btn-secondary btn-xs">Afficher</button></a></td>
                                                              <td><a href="agences.php?idloc=<?php echo $resultLoc['IdLocalite']  ?>"><button type="button" class="btn btn-block btn-secondary btn-xs">Nouvelle Agence</button></a></td>
                                                            </tr>
                                                          </table>
                                                          <tr class="expandable-body">
                                                            <td>
                                                              <div class="p-0">
                                                                <table class="table table-hover">
                                                                  <tbody>

                                                                  </tbody>
                                                                </table>
                                                              </div>
                                                                <table id="example1" class="table table-bordered table-striped">
                                                                  <thead>
                                                                    <tr>
                                                                      <th>Nom Agence</th>
                                                                      <th></th>
                                                                      <th></th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    <?php
                                                                    $reqAgence=$connex->prepare("select agences.IdAgence, agences.NomAgence from agences, localites where localites.IdLocalite=agences.IdLocalite and localites.IdLocalite='".$resultLoc['IdLocalite']."' order by NomAgence");
                                                                    $reqAgence->execute();
                                                                    while($resultAg=$reqAgence->fetch()){
                                                                    ?>
                                                                      <tr>
                                                                        <td><?php echo $resultAg['NomAgence']  ?></td>
                                                                        <td><a href="agences.php?idagenc=<?php echo $resultAg['IdAgence']  ?>"><button type="button" class="btn btn-block btn-outline-primary btn-xs">Afficher</button></a></td>
                                                                        <td><a href=" "><button type="button" class="btn btn-block btn-outline-primary btn-xs">Informations Agence</button></a></td>
                                                                      </tr>
                                                                    <?php
                                                                      }
                                                                    ?>
                                                                  </tbody>
                                                                </table>
                                                              </td>
                                                            </tr>
                                                          </td>
                                                        </tr>
                                                        <?php
                                                          }
                                                        ?>
                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </td>
                                              </tr>
                                            </td>                     
                                          </tr>
                                          <?php
                                            }
                                          ?> 
                                        </tbody>
                                      </table>
                                    </div>
                                  </td>
                                </tr>
                              </td>
                            </tr>
                            <?php
                              }
                              $connex=NULL;
                            ?>
                          </tbody>
                        </table>
                      </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
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
