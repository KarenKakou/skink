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

function redirectionConvTatoueur(idCompte){
	$.redirect('index.php?module=messagerie&actionMessagerie=creatConv', {'CompteTatoueurNewMessage':idCompte});
}

function redirectionInscription(){
	$.redirect('index.php?module=connexion', {});
}

function redirectionIncremente(idProjet){
	$.post('index.php?module=paiement&action=incEcheances', {'idProjet':idProjet});
	$.redirect('index.php?module=paiement&action=voirProjet', {'idProjet':idProjet});
}

function redirectionMajArrhesProjet(idProjet){
	$.post('index.php?module=paiement&action=majArrhes', {'idProjet':idProjet});
	$.redirect('index.php?module=paiement&action=voirProjet', {'idProjet':idProjet});
}

function redirectionMessage(){
	$.redirect('index.php?module=messagerie&actionMessagerie=lireConv', {});
}

function redirectionDeconnexion(){
	$.post('index.php?module=connexion&actionConnexion=deconnexion', {});
	redirectionAcceuil()
}

function redirectionAcceuil() {
	$.redirect('index.php?module=acceuil', {});
}



