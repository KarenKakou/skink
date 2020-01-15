function redirectionConv(idConv) {
    $.redirect('index.php?module=messagerie&actionMessagerie=lireConv', {'idConvMessagerie':idConv});
}

function redirectionFormRdv() {
	$.redirect('index.php?module=rdv&actionRDV=formRDV', {});
}

function redirectionAfficheRdv(id){
	$.redirect('index.php?module=rdv&actionRDV=listeRdv', {'id':id});
}

function redirectionAjoutProjet(){
	$.redirect('index.php?module=projet&actionProjet=formProjet', {});
}

function redirectionIncremente(idProjet){
	$.post('index.php?module=paiement&action=incEcheances', {'idProjet':idProjet});
	$.redirect('index.php?module=paiement&action=voirProjet', {'idProjet':idProjet});
}

function redirectionMajArrhesProjet(idProjet){
	$.post('index.php?module=paiement&action=majArrhes', {'idProjet':idProjet});
	$.redirect('index.php?module=paiement&action=voirProjet', {'idProjet':idProjet});
}
