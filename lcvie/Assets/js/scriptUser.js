$(document).ready(function(){

    const btn = $('#fa-eye');
    
    btn.on('click', function(){

        if($('#password')[0].type == "password"){

            $('#password')[0].type = "text";

        }else{

            $('#password')[0].type = "password";

        }

    })

});