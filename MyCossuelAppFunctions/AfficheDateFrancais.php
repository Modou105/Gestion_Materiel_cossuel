<?php
	function DateFr($ladate){
		$resultConvert=explode("-", $ladate);
		return $resultConvert[2].'-'.$resultConvert[1].'-'.$resultConvert[0];
	}
	function DateEn($ladate){
		$resultConvert=explode("-", $ladate);
		return $resultConvert[2].'-'.$resultConvert[1].'-'.$resultConvert[0];
	}
?>