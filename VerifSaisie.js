function VerifSaisieLettres(evenement, type){
			charCode=evenement.keyCode;
			if(type==0){
				if((charCode>=57 && charCode<=90)||(charCode>=97 && charCode<=122)|| (charCode==32) || (charCode==233) || (charCode==232) || (charCode==234) || (charCode==203) || (charCode==238) || (charCode==207)|| (charCode==46)){
				}else{
					alert('Caractère '+evenement.key+' non autorisé sur ce champ');
					evenement.preventDefault();
				}
			}
		}

		function VerifSaisieChiffres(evenement, type){
			charCode=evenement.keyCode;
			if(type==0){
				if((charCode>=48 && charCode<=57)||(charCode==45)||(charCode==43)||(charCode==40) ||(charCode==41) ||(charCode==32) ){
				}else{
					alert('Caractère '+evenement.key+' non autorisé sur ce champ');
					evenement.preventDefault();
				}
			}
		}
		function VerifEmail(evenement, type){
			charCode=evenement.keyCode;
			if(type==0){
				if((charCode>=48 && charCode<=57)||(charCode>=97 && charCode<=122)||(charCode==46)||(charCode==64)){
				}else{
					alert('Caractère '+evenement.key+' non autorisé sur ce champ');
					evenement.preventDefault();
				}
			}
		}