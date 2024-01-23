<?php
	function CreeChamp($nature,$libelle){
		if($nature=="TEXTUELLE"){
			echo '<input type="text" name="etatverification">';
		}else if($nature=="MONO OPTIONNELLE"){
			$tab=explode(' ',$libelle);
			echo '<select name="etatverification">';
			for($i=0; $i<=count($tab)-1; $i++){
				echo '<option>'.$tab[$i].'</option>';
			}
			echo '</select>';
		}

	}
?>