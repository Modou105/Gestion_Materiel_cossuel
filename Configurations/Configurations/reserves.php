<?php
	require('Configurations/MesUtilisateurs.php');
		$user=new Utilisateurs();
		if(isset($_POST['connexion'])){
			$user->setLogin($_POST['login']);
			$user->setMotpasse($_POST['pass']);
			if($user->Verif_Utilisateur($con,$sess)){
				if($sess->RecuperationInformations('statut')=="accueil"){
					/*$cnx=$con->EtablirUneConnexion();
						if($cnx!=false){
							$req=$cnx->prepare("select agences.IdAgence, agences.NomAgence from agents, agences, affectations_agents where agences.IdAgence=affectations_agents.IdAgence and affectations_agents.IdAgent=agents.IdAgent and agents.IdAgent='".$sess->RecuperationInformations('iduser')."'");
								$req->execute();
								$info=$req->fetch();
								$sess->SauvegardeInformations('idagence',$info['IdAgence']);
								$sess->SauvegardeInformations('nomagence',$info['NomAgence']);
								$cnx=NULL;
								header('location:index.php');
						}*/
				}else if ($sess->RecuperationInformations('privilege')=="referent"){
						/*$cnx=$con->EtablirUneConnexion();
						if($cnx!=false){
							$req=$cnx->prepare("select agences.IdAgence, agences.NomAgence from agents, agences, affectations_agents where agences.IdAgence=affectations_agents.IdAgence and affectations_agents.IdAgent=agents.IdAgent and agents.IdAgent='".$sess->RecuperationInformations('iduser')."'");
								$req->execute();
								$info=$req->fetch();
								$sess->SauvegardeInformations('idagence',$info['IdAgence']);
								$sess->SauvegardeInformations('nomagence',$info['NomAgence']);
								$cnx=NULL;
								header('location:Referents/index.php');
							}*/							
				}else if ($sess->RecuperationInformations('statut')=="administrateur"){
								header('location:SuperUser/index.php');
				}else if ($sess->RecuperationInformations('statut')=="superviseur"){
						/*$cnx=$con->EtablirUneConnexion();
						if($cnx!=false){
							$req=$cnx->prepare("select agences.IdAgence, agences.NomAgence from agents, agences, affectations_agents where agences.IdAgence=affectations_agents.IdAgence and affectations_agents.IdAgent=agents.IdAgent and agents.IdAgent='".$sess->RecuperationInformations('iduser')."'");
								$req->execute();
								$info=$req->fetch();
								$sess->SauvegardeInformations('idagence',$info['IdAgence']);
								$sess->SauvegardeInformations('nomagence',$info['NomAgence']);
								$cnx=NULL;
								header('location:ChefAgence/index.php');
						}*/
				}else if($sess->RecuperationInformations('privilege')=="daf"){
							/*$cnx=$con->EtablirUneConnexion();
					if($cnx!=false){
						$req=$cnx->prepare("select agences.IdAgence, agences.NomAgence from agents, agences, affectations_agents where agences.IdAgence=affectations_agents.IdAgence and affectations_agents.IdAgent=agents.IdAgent and agents.IdAgent='".$sess->RecuperationInformations('iduser')."'");
							$req->execute();
							$info=$req->fetch();
							$sess->SauvegardeInformations('idagence',$info['IdAgence']);
							$sess->SauvegardeInformations('nomagence',$info['NomAgence']);
							$cnx=NULL;
							header('location:DAF/index.php');
					}*/
				}else if ($sess->RecuperationInformations('privilege')=="coordonnateur"){
								header('location:Coordonnateur/index.php');
				}else if ($sess->RecuperationInformations('privilege')=="caissier"){
								/*$cnx=$con->EtablirUneConnexion();
					if($cnx!=false){
						$req=$cnx->prepare("select agences.IdAgence, agences.NomAgence from agents, agences, affectations_agents where agences.IdAgence=affectations_agents.IdAgence and affectations_agents.IdAgent=agents.IdAgent and agents.IdAgent='".$sess->RecuperationInformations('iduser')."'");
							$req->execute();
							$info=$req->fetch();
							$sess->SauvegardeInformations('idagence',$info['IdAgence']);
							$sess->SauvegardeInformations('nomagence',$info['NomAgence']);
							$cnx=NULL;
							header('location:Caissier/index.php');
					}*/
				}else if ($sess->RecuperationInformations('privilege')=="comptable"){
					/*$cnx=$con->EtablirUneConnexion();
					if($cnx!=false){
						$req=$cnx->prepare("select agences.IdAgence, agences.NomAgence from agents, agences, affectations_agents where agences.IdAgence=affectations_agents.IdAgence and affectations_agents.IdAgent=agents.IdAgent and agents.IdAgent='".$sess->RecuperationInformations('iduser')."'");
							$req->execute();
							$info=$req->fetch();
							$sess->SauvegardeInformations('idagence',$info['IdAgence']);
							$sess->SauvegardeInformations('nomagence',$info['NomAgence']);
							$cnx=NULL;
							header('location:Comptable/index.php');
					}*/
				}else if ($sess->RecuperationInformations('privilege')=="controleur"){
					/*$cnx=$con->EtablirUneConnexion();
					if($cnx!=false){
						$req=$cnx->prepare("select agences.IdAgence, agences.NomAgence from agents, agences, affectations_agents where agences.IdAgence=affectations_agents.IdAgence and affectations_agents.IdAgent=agents.IdAgent and agents.IdAgent='".$sess->RecuperationInformations('iduser')."'");
							$req->execute();
							$info=$req->fetch();
							$sess->SauvegardeInformations('idagence',$info['IdAgence']);
							$sess->SauvegardeInformations('nomagence',$info['NomAgence']);
							$cnx=NULL;
							header('location:Controleurs/index.php');
					}*/
				}else if ($sess->RecuperationInformations('privilege')=="backoffice"){
					/*$cnx=$con->EtablirUneConnexion();
					if($cnx!=false){
						$req=$cnx->prepare("select agences.IdAgence, agences.NomAgence from agents, agences, affectations_agents where agences.IdAgence=affectations_agents.IdAgence and affectations_agents.IdAgent=agents.IdAgent and agents.IdAgent='".$sess->RecuperationInformations('iduser')."'");
							$req->execute();
							$info=$req->fetch();
							$sess->SauvegardeInformations('idagence',$info['IdAgence']);
							$sess->SauvegardeInformations('nomagence',$info['NomAgence']);
							$cnx=NULL;
							header('location:index.php');
					}*/						
				}else if ($sess->RecuperationInformations('privilege')=="electricien"){
					$cnx=$con->EtablirUneConnexion();
					if($cnx!=false){
					
							header('location:indexclient.php');
					}						
				}else if ($sess->RecuperationInformations('privilege')=="proprietaire"){
							$cnx=$con->EtablirUneConnexion();
					if($cnx!=false){
						header('location:indexclient.php');
					}							
				}
				}else{
							header('location:login.php?erreur=Login ou mot de passe incorrect');							
						}
					}
				?>
</body>
</html>