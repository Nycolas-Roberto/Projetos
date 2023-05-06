$(document).ready(function(){
    // Inicaliza o plugin do Jquery de validação do form com id 'formulario'
    $('#login-cliente-form').validate({
        // Criar regras de validação
        rules:{
            nomeLogin:{
                required:true,
                rangelength: [3, 50]
            },
            senhaLogin:{
                required:true,
                rangelength: [3, 50]
            },
        },

        // Modificar mensagens de cada regra de validação de acordo com o ID.
        messages:{
            nomeLogin:{
                required:"Digite seu nome.",
                rangelength: "Digite entre 3 e 50 caracteres."
            },
            senhaLogin:{
                required: "Digite sua senha",
                rangelength: "Digite entre 3 e 50 caracteres."
            },
        },
    });

    $('#nomeLogin').blur(function(){
        if($(this).valid()){
            $(this).removeClass("error");
        } else {
            $(this).addClass("error")
        }
    });


    $('#senhaLogin').blur(function(){
        if($(this).valid()){
            $(this).removeClass("error");
        } else {
            $(this).addClass("error")
        }
    });
});