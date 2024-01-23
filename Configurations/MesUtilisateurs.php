<?php
require('MaConnexion.php');
require('MaSession.php');
$con=new Connexion();
$sess=new Session();
	class Utilisateurs{
		var $iduser;
		var $statut;
		var $login;
		var $motpasse;

		function setLogin($valeur){
			$this->login=$valeur;
		}
		function setMotpasse($valeur){
			$this->motpasse=$valeur;
		}
		function getLogin(){
			return $this->login;
		}
		function getMotpasse(){
			return $this->motpasse;
		}
		function Verif_Utilisateur($con,$sess){
			$nouvelle_connexion=$con->EtablirUneConnexion();
			if($nouvelle_connexion!=false){
				$req_recherche=$nouvelle_connexion->prepare("select agent.Id_Agent, agent.Matricule, agent.Prenom_Agent, 
				agent.Nom_Agent, agent.telephone, agent.Email_Agent,  compte_utilisateur.Statut , compte_utilisateur.Login from agent, 
				compte_utilisateur where compte_utilisateur.Id_Agent=agent.Id_Agent and 
				 compte_utilisateur.Login='".$this->login."' and compte_utilisateur.Password='".$this->motpasse."'");
				$req_recherche->execute();
				if($req_recherche->rowCount()>0){
					$resultat=$req_recherche->fetch();
					$sess->SauvegardeInformations('iduser',$resultat['id_Agent']);
					$sess->SauvegardeInformations('prenom',$resultat['Prenom_Agent']);
					$sess->SauvegardeInformations('nom',$resultat['Nom_Agent']);
					$sess->SauvegardeInformations('telephone',$resultat['telephone']);
					$sess->SauvegardeInformations('email',$resultat['Email_Agent']);
					$sess->SauvegardeInformations('statut',$resultat['Statut']);
					$sess->SauvegardeInformations('login',$resultat['Login']);
					return true;
				}else{
					return false;
				}

			}
		}
	}
?>