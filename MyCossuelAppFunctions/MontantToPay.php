<?php
	function CalculMontant($typeDemande, $NbreVisite, $Puissance){
		$montant=0;
		if($NbreVisite==0){
			if($typeDemande=='dom'){
				if($Puissance<=6){
					$montant=10000;
				}else if($Puissance>6 && $Puissance<=17){
					$montant=30000;
				}else{
					$montant=100000;
				}
			}else if ($typeDemande=='n_dom'){
				if($Puissance<=6){
					$montant=12000;
				}else if ($Puissance>6 && $Puissance<=17){
					$montant=150000;
				}else{
					$montant=250000;
				}
			}
		}else{
			if($typeDemande=='dom'){
				if($Puissance<=6){
					$montant=8000;
				}else if($Puissance>6 && $Puissance<=17){
					$montant=24000;
				}else{
					$montant=80000;
				}
			}else if ($typeDemande=='n_dom'){
				if($Puissance<=6){
					$montant=9600;
				}else if($Puissance>6 && $Puissance<=17){
					$montant=120000;
				}else{
					$montant=200000;
				}
			}
		}
		//return number_format($montant,0,","," ");
		return $montant;
	}
?>