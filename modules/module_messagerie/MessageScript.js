$(document).ready(function () {

    $('#envoi').click(function (e) {
        e.preventDefault();
        //On récupère le message dans l'input
        var message =$('#Message').val();
        var idConv = $('#idConv').val();

        //On efface l'input après l'envoie
        var input = document.getElementById('Message');
        input.value = "";

        if(message != "") {
            $.ajax({
                url : "Envoyer_Message.php",
                method : 'POST',
                data : "messageconv="+ message+"&idConv="+idConv
            });

            var p = document.createElement('p');
            p.innerHTML = message;

            var sent = document.createElement('div');
            sent.append(p);
            sent.className = 'sent_msg';

            var outgoing = document.createElement('div');
            outgoing.append(sent);
            outgoing.className = 'outgoing_msg';

            document.getElementById('Messagerie').appendChild(outgoing);

            var n = $('#Messagerie').height();
            $('#Messagerie').animate({ scrollTop:n*compteNode(document.getElementById('Messagerie')) }, 50);
        }
    });
});

function compteNode(parent){
    var relevantChildren = 0;
    var children = parent.childNodes.length;
    for(var i=0; i < children; i++){
        if(parent.childNodes[i].nodeType != 3){
            relevantChildren++;
        }
    }
    return relevantChildren;
}