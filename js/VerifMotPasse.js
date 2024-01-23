function VerifPwd(mp,confmp){
	var mpasss=mp;
	var cmpass=confmp;
	if(mpasss!=cmpass){
		alert("Les deux mots de passe saisis ne sont pas identiques !");
		window.location.href="detailsAgents.php";
	}
}