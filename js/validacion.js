$(function(){
    var mayus = new RegExp("^(?=.*[A-Z])");
    var special = new RegExp("^(?=.*[!@#$%&*].*[!@#$%&*])");
    var numbers = new RegExp("^(?=.*[0-9])");
    var lower = new RegExp("^(?=.*[a-z])");
    //condicion excluida porque nunca se valida
    //var len = new RegExp("^(?=.{,}])");

    var regExp = [mayus, special, numbers, lower];
    var elementos = [$("mayus"), $("special"), $("numbers"), $("lower")];
    $("#password").on("keyup", function(){
        var pass = $("#password").val();
        var check = 0;

        for(var i = 0; i < 4; i++){
            if(regExp[i].test(pass)){
                //no esconde los elementos ya validados 
                elementos[i].hide();
                check++;
            }else{
                elementos[i].show();
            }    
        }
        if(check >= 0 && check <= 1){
                $("#mensaje").text("Muy insegura").css("color", "red");
            }else if(check >= 2 && check <= 3){
                $("#mensaje").text("Insegura").css("color", "orange");
            }else if(check == 4){
                $("#mensaje").text("Segura").css("color", "green");
            }
    });
});