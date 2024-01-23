<?php
   class Connexion{
		var $NomServeur='localhost';
		var $User='vloc_sgcc';
		//var $MotdePasse='sgcc_1@1_coss';
		var $MotdePasse='sgcc_1@1_coss';
		var $BaseDeDonnees='vloc_sgcc';
		function EtablirUneConnexion(){
			$connect=new PDO('mysql:host='.$this->NomServeur.';dbname='.$this->BaseDeDonnees,$this->User,$this->MotdePasse);
			if($connect){
				return $connect;
			}else{
				return false;
			}
		}
 
	} 
?>