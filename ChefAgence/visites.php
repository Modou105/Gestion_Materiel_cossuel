 <?php
    include('../MyCossuelAppFunctions/CreerChamp.php');
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

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"></script>

<script>
    $(document).ready(() => {
        var canvasDiv = document.getElementById('canvasDiv');
        var canvas = document.createElement('canvas');
        canvas.setAttribute('id', 'canvas');
        canvasDiv.appendChild(canvas);
        $("#canvas").attr('height', $("#canvasDiv").outerHeight());
        $("#canvas").attr('width', $("#canvasDiv").width());
        if (typeof G_vmlCanvasManager != 'undefined') {
            canvas = G_vmlCanvasManager.initElement(canvas);
        }
        
        context = canvas.getContext("2d");
        $('#canvas').mousedown(function(e) {
            var offset = $(this).offset()
            var mouseX = e.pageX - this.offsetLeft;
            var mouseY = e.pageY - this.offsetTop;

            paint = true;
            addClick(e.pageX - offset.left, e.pageY - offset.top);
            redraw();
        });

        $('#canvas').mousemove(function(e) {
            if (paint) {
                var offset = $(this).offset()
                //addClick(e.pageX - this.offsetLeft, e.pageY - this.offsetTop, true);
                addClick(e.pageX - offset.left, e.pageY - offset.top, true);
                console.log(e.pageX, offset.left, e.pageY, offset.top);
                redraw();
            }
        });

        $('#canvas').mouseup(function(e) {
            paint = false;
        });

        $('#canvas').mouseleave(function(e) {
            paint = false;
        });

        var clickX = new Array();
        var clickY = new Array();
        var clickDrag = new Array();
        var paint;

        function addClick(x, y, dragging) {
            clickX.push(x);
            clickY.push(y);
            clickDrag.push(dragging);
        }

        $("#reset-btn").click(function() {
            context.clearRect(0, 0, window.innerWidth, window.innerWidth);
            clickX = [];
            clickY = [];
            clickDrag = [];
        });

        $(document).on('click', '#btn-save', function() {
            var mycanvas = document.getElementById('canvas');
            var img = mycanvas.toDataURL("image/png");
            anchor = $("#signature");
            anchor.val(img);
            $("#signatureform").submit();
        });

        var drawing = false;
        var mousePos = {
            x: 0,
            y: 0
        };
        var lastPos = mousePos;

        canvas.addEventListener("touchstart", function(e) {
            mousePos = getTouchPos(canvas, e);
            var touch = e.touches[0];
            var mouseEvent = new MouseEvent("mousedown", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchend", function(e) {
            var mouseEvent = new MouseEvent("mouseup", {});
            canvas.dispatchEvent(mouseEvent);
        }, false);


        canvas.addEventListener("touchmove", function(e) {

            var touch = e.touches[0];
            var offset = $('#canvas').offset();
            var mouseEvent = new MouseEvent("mousemove", {
                clientX: touch.clientX,
                clientY: touch.clientY
            });
            canvas.dispatchEvent(mouseEvent);
        }, false);



        // Get the position of a touch relative to the canvas
        function getTouchPos(canvasDiv, touchEvent) {
            var rect = canvasDiv.getBoundingClientRect();
            return {
                x: touchEvent.touches[0].clientX - rect.left,
                y: touchEvent.touches[0].clientY - rect.top
            };
        }


        var elem = document.getElementById("canvas");

        var defaultPrevent = function(e) {
            e.preventDefault();
        }
        elem.addEventListener("touchstart", defaultPrevent);
        elem.addEventListener("touchmove", defaultPrevent);


        function redraw() {
            //
            lastPos = mousePos;
            for (var i = 0; i < clickX.length; i++) {
                context.beginPath();
                if (clickDrag[i] && i) {
                    context.moveTo(clickX[i - 1], clickY[i - 1]);
                } else {
                    context.moveTo(clickX[i] - 1, clickY[i]);
                }
                context.lineTo(clickX[i], clickY[i]);
                context.closePath();
                context.stroke();
            }
        }
    })

</script>

<style>
  #canvasDiv{
    position: relative;
    border: 2px dashed grey;
    height:100px;
    width: 250px;
  }
</style>
<?php
  if(isset($_GET['idvisite'])){
    echo '<script type="text/javascript">';
      echo 'function AfficheSignatureElec(){';
        echo 'window.open("../signElectriciens/index.php?idvisite='.$_GET['idvisite'].'","MaFenetre","height=400, width=320,menubar=no,location=no,resizable=no,scrollbars=no,status=yes");';
          echo '}';

    echo 'function AfficheSignatureContr(){';
      echo 'window.open("../signControleurs/index.php?idvisite='.$_GET['idvisite'].'","MaFenetre","height=400, width=320,menubar=no,location=no,resizable=no,scrollbars=no,status=yes");';
          echo '}';
    echo '</script>';
}
?>
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
        
       
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        
        
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
            <h1>Contrôleurs</h1>
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
		  	<h5 class="mb-2 mt-4">Rapports</h5>


           <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h1 class="card-title"><strong>VISITE DU SITE</strong></h1>
              </div>
              <!-- ./card-header -->
              <div class="card-body p-0">
                <table class="table table-hover">
                  <tbody>
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                        <strong>COORDONNES INSTALLATEURS ET PROPRIETAIRES</strong>
                      </td>
                    </tr>

			     <tr class="expandable-body">
                      <td>
                        <div class="p-0">
                          <table class="table table-hover">
                            <tbody>
                              <tr>
                                <td>
                                	<div class="row">
                                    <?php
                                      $req=$connex->prepare("select electriciens.PrenomElectricien, electriciens.NomElectricien, electriciens.AdresseElectricien, electriciens.TelephoneElectricien, proprietaires.PrenomProprietaire, proprietaires.NomProprietaire, proprietaires.AdresseProprietaire, proprietaires.TelephoneProprietaire  from electriciens, proprietaires, demandes where demandes.IdDemande='".$_GET['iddem']."'");
                                      $req->execute();
                                      $recupInfo=$req->fetch();
                                    ?>
	                                	<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
	              							        <div class="card bg-light d-flex flex-fill">
	                							        <div class="card-header text-muted border-bottom-0">
	                  								     <strong>INFORMATIONS INSTALLEURS </strong>
	                							        </div>
	                							        <div class="card-body pt-0">
	                  								       <div class="row">
	                    								       <div class="col-7">
	                      									    <h2 class="lead"><b><?php echo $recupInfo['PrenomElectricien'].' '.strtoupper($recupInfo['NomElectricien']) ?></b></h2>
	                      									    <ul class="ml-4 mb-0 fa-ul text-muted">
	                        									    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><?php echo $recupInfo['AdresseElectricien'] ?></li>
	                        									    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><?php echo $recupInfo['TelephoneElectricien'] ?></li>
	                      									    </ul>
	                    								       </div>
      	                    								<div class="col-5 text-center">
      	                      									<img src="../images/silhouette.png" alt="user-avatar" class="img-circle img-fluid">
      	                    								</div>
	                  								       </div>
	                							        </div>
	              							        </div>
	            						         </div>

	            						         <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
	              							        <div class="card bg-light d-flex flex-fill">
	                							        <div class="card-header text-muted border-bottom-0">
	                  								     <strong>SITES VISITES (Coordonnés) </strong>
	                							        </div>
	                							<div class="card-body pt-0">
	                  								<div class="row">
	                    								<div class="col-7">
	                      									<h2 class="lead"><b><?php echo $recupInfo['PrenomProprietaire'].' '.strtoupper($recupInfo['NomProprietaire']) ?></b></h2>
	                      									<ul class="ml-4 mb-0 fa-ul text-muted">
	                        									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span><?php echo $recupInfo['AdresseProprietaire'] ?></li>
	                        									<li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span><?php echo $recupInfo['TelephoneProprietaire'] ?></li>
	                      									</ul>
	                    								</div>
	                    								<div class="col-5 text-center">
	                      									<img src="../images/silhouette.png" alt="user-avatar" class="img-circle img-fluid">
	                    								</div>
	                  								</div>
	                							</div>
	              							</div>
	            						</div>	
            						</div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>

               
                    <tr data-widget="expandable-table" aria-expanded="false">
                      <td>
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                        <strong>CARACTERISTIQUES DE LA VISITE</strong>
                      </td>
                    </tr>
                    	<tr class="expandable-body">
                      <td>
                        <div class="p-0">
                          <table class="table table-hover">
                            <tbody>
                              <?php
                                $reqInfoDemande=$connex->prepare("select* from demandes, naturebatiment, naturetravaux, typeconstruction, installations where demandes.IdInstallation=installations.IdInstallation and installations.IdNatureBatiment=naturebatiment.IdNatureBatiment and installations.IdNatureTravaux=naturetravaux.IdNatureTravaux and installations.IdTypeConstruction=typeconstruction.IdTypeConstruction and  demandes.IdDemande='".$_GET['iddem']."'");
                                  $reqInfoDemande->execute();
                                  $recupInfoDemande=$reqInfoDemande->fetch();
                                ?>
                              <tr>
                                <td>
                                	Type de Visite
                                </td>
                                <td>
                                	<strong>
                                    <?php
                                    $reqCompteVisite=$connex->prepare("select count(idVisite) from visites, dossiers, demandes, installations where visites.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and demandes.IdInstallation=installations.IdInstallation and installations.IdInstallation='".$recupInfoDemande['IdInstallation']."' and dossiers.EtatDossier!='Conforme'");
                                    $reqCompteVisite->execute();
                                    $infoCompteVisite=$reqCompteVisite->fetch();
                                    $Nombre=$infoCompteVisite[0];
                                    if($Nombre==0){
                                      echo '1 <sup>ère</sup> Visite';
                                    }else{
                                      echo ($infoCompteVisite[0]+1).' <sup>ème</sup> Visite';
                                    }
                                  ?>
                                  </strong>
                                </td>
                              </tr>

                              <tr>
                                <td>
                                	Local
                                </td>
                                <td>
                                	<strong><?php echo $recupInfoDemande['LibelleTypeConstruction']  ?></strong>
                                </td>
                              </tr>

                              <tr>
                                <td>
                                	Type de Travaux
                                </td>
                                <td>
                                	<strong><?php echo utf8_decode($recupInfoDemande['LibelleNatureTravaux'])  ?></strong>
                                </td>
                              </tr>

                              <tr>
                                <td>
                                	Référenciel: (Normes NS 001-001 de 2009)
                                </td>
                                <td>
                                	<div class="form-group">
                    					<div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      						<input type="checkbox" class="custom-control-input" id="customSwitch3">
                      						<label class="custom-control-label" for="customSwitch3"></label>
                    					</div>
                  					</div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </td>
                    </tr>



					         <tr data-widget="expandable-table" aria-expanded="false">
                      <td>
                        <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
                        <strong>RESULTATS DE LA VISITE</strong>
                      </td>
                    </tr>
                    	

                  <tr class="expandable-body">
                    <td>
                      <div class="p-0">
                        <table class="table table-hover">
                          <?php
                            $reqRubriques=$connex->prepare("select* from rubriques where IdRapport='".$_GET['idrapp']."'");
                            $reqRubriques->execute();
                            while($infosRubriques=$reqRubriques->fetch()){
                              $reqDetail=$connex->prepare("select* from detailsverification where IdRubriques='".utf8_encode($infosRubriques['IdRubriques'])."'");
                              $reqDetail->execute();
                          ?>
                          <tr>
                            <?php
                            $reqCompte=$connex->prepare("select count(IdDetailVerification) from detailsverification where IdRubriques='".$infosRubriques['IdRubriques']."'");
                            $reqCompte->execute();
                            $recupNombre=$reqCompte->fetch();
                            if($recupNombre[0]==1){
                              $recupInfoDetails=$reqDetail->fetch();
                            ?>
                            <td><font size="2"><?php echo utf8_encode($recupInfoDetails['ObjetVerification'])  ?></font><td><?php echo $recupInfoDetails['Numero']  ?></td><td> </td>
                              <td>
                                <?php
                                  $reqInfosVisite=$connex->prepare("select verifications.EtatVerification from verifications,visites, detailsverification where verifications.IdVisite=visites.IdVisite and verifications.IdDetailVerification=detailsverification.IdDetailVerification and  visites.IdVisite='".$_GET['idvisite']."' and detailsverification.ObjetVerification='".utf8_encode($recupInfoDetails['ObjetVerification'])."'");
                                    $reqInfosVisite->execute();
                                    if($reqInfosVisite->rowCount()>0){
                                      $infosVisite=$reqInfosVisite->fetch();
                                      echo utf8_encode($infosVisite['EtatVerification']);
                                    }
                                ?> 
                              </td>

                              <td>

                              <?php
                              $reqInfosVisite=$connex->prepare("select verifications.Commentaire from verifications,visites, detailsverification where verifications.IdVisite=visites.IdVisite and verifications.IdDetailVerification=detailsverification.IdDetailVerification and  visites.IdVisite='".$_GET['idvisite']."' and detailsverification.ObjetVerification='".utf8_encode($recupInfoDetails['ObjetVerification'])."'");
                                $reqInfosVisite->execute();
                                  if($reqInfosVisite->rowCount()>0){
                                    $infosVisite=$reqInfosVisite->fetch();
                                      echo utf8_encode($infosVisite['Commentaire']);
                                  }
                              ?>
                              </td>

                              <td><a href="ValideVisites.php?iddem=<?php echo $_GET['iddem'] ?>&idrapp=<?php echo $_GET['idrapp'] ?>&idvisite=<?php echo $_GET['idvisite'] ?>&idobjver=<?php echo $recupInfoDetails['IdDetailVerification'] ?>"><img src="../images/ecrire.png" width="30" height="30"></a></td></td>
                              <?php
                                }else{
                                  $nbre=$recupNombre[0]+1;
                                  ?>
                                  <td rowspan="<?php echo $nbre ?>"><font size="2"><?php echo utf8_encode($infosRubriques['LibelleRubrique'])  ?></font></td></tr>
                                  <?php
                                      while($recupInfoDetails=$reqDetail->fetch()){
                                  ?>
                                  <td><?php echo $recupInfoDetails['Numero']  ?></td><td><font size="2"><?php echo utf8_encode($recupInfoDetails['ObjetVerification'])  ?></font></td>
                                    <td>
                                    <?php
                                      $reqInfosVisite=$connex->prepare("select verifications.EtatVerification from verifications,visites, detailsverification where verifications.IdVisite=visites.IdVisite and verifications.IdDetailVerification=detailsverification.IdDetailVerification and  visites.IdVisite='".$_GET['idvisite']."' and detailsverification.ObjetVerification='".utf8_encode($recupInfoDetails['ObjetVerification'])."'");
                                      $reqInfosVisite->execute();
                                      if($reqInfosVisite->rowCount()>0){
                                        $infosVisite=$reqInfosVisite->fetch();
                                        echo $infosVisite['EtatVerification'];
                                      }
                                    ?>


                                    </td>
                                    <td>
                                    <?php
                                      $reqInfosVisite=$connex->prepare("select verifications.Commentaire from verifications,visites, detailsverification where verifications.IdVisite=visites.IdVisite and verifications.IdDetailVerification=detailsverification.IdDetailVerification and  visites.IdVisite='".$_GET['idvisite']."' and detailsverification.ObjetVerification='".utf8_encode($recupInfoDetails['ObjetVerification'])."'");
                                      $reqInfosVisite->execute();
                                      if($reqInfosVisite->rowCount()>0){
                                        $infosVisite=$reqInfosVisite->fetch();
                                        echo utf8_encode($infosVisite['Commentaire']);
                                      }
                                    ?>
                                      </td>
									  <td><a href="ValideVisites.php?iddem=<?php echo $_GET['iddem'] ?>&idrapp=<?php echo $_GET['idrapp'] ?>&idvisite=<?php echo $_GET['idvisite'] ?>&idobjver=<?php echo $recupInfoDetails['IdDetailVerification'] ?>"><img src="../images/ecrire.png" width="30" height="30"></a></td></td>
                                  </tr>
                                <?php
                                  }
                                }
                              }
                              $connex=NULL;
                            ?>
                            <tr>
                              <td colspan="3">
                                <br/>
                                <strong><a href="" onclick="AfficheSignatureElec()">Signature Eléctricien</a></strong>
                                <br/>
                                <?php
                                  if(isset($_GET['idvisite'])){
                                    echo "<img src='../signElectriciens/Signatures/SignElectriciens".$_GET['idvisite'].".png' width='250' height='150' >";
                                  }
                                ?>
                              </td>

                              <td colspan="3">
                                <br/>
                                <strong><a href="" onclick="AfficheSignatureContr()">Signature Controleur</a></strong>
                                <br/>
                                <?php
                                  if(isset($_GET['idvisite'])){
                                    echo "<img src='../signControleurs/Signatures/SignControleurs".$_GET['idvisite'].".png' width='250' height='150' >";
                                  }
                                ?>
                              </td>
                            </tr>
                            <tr>
                              <?php
                                if(!isset($_GET['etat'])){
                              ?>
                              <td colspan="6" align="right">
                                <form action="valideEnreg.php" method="post">
                                  <input type="hidden" name="idvisite" value="<?php echo $_GET['idvisite'] ?>">
                                  <button type="submit" name="valideVisite" class="btn btn-primary">Terminer la Visite</button>
                                </form>
                              </td>
                              <?php
                                }
                              ?>
                            </tr>
                          </table>
                        </div>
                      </td>
                    </tr>
                    
                              
                              
                        </tbody>
                      </table>
                    </div>
                  </td>
                </tr>




              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
