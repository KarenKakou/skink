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