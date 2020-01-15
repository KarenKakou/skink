$("#addFormProjet").click(function () {
    this.remove();
    $.ajax({
        url: 'index.php?module=projet&actionProjet=formProjet',
        method :'GET',
        type:'GET',
        dataType: 'text',
        success: function (data) {
            var section = document.getElementById("vue_messagerie");
            var div = document.createElement('div');
            div.innerHTML+=data;
            section.appendChild(div);
        }
    });
});
