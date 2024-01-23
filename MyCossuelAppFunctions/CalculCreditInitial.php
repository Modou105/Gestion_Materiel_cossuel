<?php
	function CreditInitial($dateref){
		$conn=new Connexion();
		$connexi=$conn->EtablirUneConnexion();
		$MontantDebit=0;
		$NombreVisite=0;
   		$reqDebit=$connexi->prepare("select * from paiements, demandes, installations where paiements.IdDemande=demandes.IdDemande and demandes.IdInstallation=installations.IdInstallation and paiements.LibellePaiement='Remboursement' and paiements.DatePaiement<'".$dateref."'");
         	$reqDebit->execute();
            while($infoDebit=$reqDebit->fetch()){
                $reqCompteVisite=$connexi->prepare("select count(*) from visites, dossiers, demandes, installations where visites.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and demandes.IdInstallation=installations.IdInstallation and installations.IdInstallation='".$infoDebit['IdInstallation']."' and dossiers.EtatDossier!='Conforme'");
                $reqCompteVisite->execute();
                $infoCompteVisite=$reqCompteVisite->fetch();
                $NombreVisite=$infoCompteVisite[0];
    			$MontantDebit=$MontantDebit+CalculMontant($infoDebit['TypeDemande'],$NombreVisite, $infoDebit['PuissanceDemandee']); 
        	}
      	//$connexi=NULL;   
      	return  $MontantDebit;
	}

  function CreditInitialParAgences($datedebut,$nomagence){
    $conn=new Connexion();
    $connexi=$conn->EtablirUneConnexion();
    $MontantCreditAgence=0;
    $NombreVisite=0;
      $reqDebit=$connexi->prepare("select * from paiements, demandes, installations, agents, affectations_agents, agences where paiements.IdDemande=demandes.IdDemande and demandes.IdInstallation=installations.IdInstallation and demandes.IdAgent=agents.IdAgent and agents.IdAgent=affectations_agents.IdAgent and affectations_agents.IdAgence=agences.IdAgence and  paiements.LibellePaiement='Remboursement' and paiements.DatePaiement<'".$datedebut."' and agences.NomAgence='".$nomagence."'");
          $reqDebit->execute();
            while($infoDebit=$reqDebit->fetch()){
                $reqCompteVisite=$connexi->prepare("select count(*) from visites, dossiers, demandes, installations where visites.IdDossier=dossiers.IdDossier and dossiers.IdDemande=demandes.IdDemande and demandes.IdInstallation=installations.IdInstallation and installations.IdInstallation='".$infoDebit['IdInstallation']."' and dossiers.EtatDossier!='Conforme'");
                $reqCompteVisite->execute();
                $infoCompteVisite=$reqCompteVisite->fetch();
                $NombreVisite=$infoCompteVisite[0];
          $MontantDebit=$MontantDebit+CalculMontant($infoDebit['TypeDemande'],$NombreVisite, $infoDebit['PuissanceDemandee']); 
          }
        //$connexi=NULL;   
        return  $MontantCreditAgence;
  }
?>