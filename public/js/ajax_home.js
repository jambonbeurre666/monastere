console.log('script home_view.js chargé');

$(".btn-loggin").click(function(e){
    e.preventDefault();     
    $.ajax({
       url : '/connexion/',
       type : 'POST',
       dataType : 'json',
       data : {
        mail : $("input[name='mail']").val(),
        pass : $("input[name='pass']").val(),
       },
       success : function(code_html, statut){ 
        window.location.replace("/liste-clients/1/");
       },

       error : function(xhr, statut, erreur){
            let resp = JSON.parse(xhr.responseText);
            console.log(erreur + ' ' + xhr.status + ' : ' + resp.message);
       }
    });
});