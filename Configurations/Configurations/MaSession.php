<?php
		class Session{

			function __construct(){
				session_start();
			}

			function SauvegardeInformations($nom,$valeur){
				$_SESSION[$nom]=$valeur;
			}

			function RecuperationInformations($nom){
				return $_SESSION[$nom];
			}

			function DestructionInformations(){
				session_destroy();
			}
		}
?>