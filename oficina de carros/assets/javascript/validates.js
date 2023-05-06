$(document).ready(function(){
    // Inicaliza o plugin do Jquery de validação do form com id 'formulario'
    $('#registrar-cliente-form').validate({
        // Criar regras de validação
        rules:{
            nome:{
                required:true,
                rangelength: [3, 50]
            },
            email:{
                required:true,
                rangelength: [3, 50]
            },
            senha:{
                required:true,
                rangelength: [3, 50]
            },
        },

        // Modificar mensagens de cada regra de validação de acordo com o ID.
        messages:{
            nome:{
                required:"Digite seu nome.",
                rangelength: "Digite entre 3 e 50 caracteres."
            },
            email:{
                required: "Digite seu email@dominio.com",
                rangelength: "Digite entre 3 e 50 caracteres."
            },
            senha:{
                required: "Digite sua senha",
                rangelength: "Digite entre 3 e 50 caracteres."
            },
        },
    });

    $('#nome').blur(function(){
        if($(this).valid()){
            $(this).removeClass("error");
        } else {
            $(this).addClass("error")
        }
    });

    $('#email').blur(function(){
        if($(this).valid()){
            $(this).removeClass("error");
        } else {
            $(this).addClass("error")
        }
    });


    $('#senha').blur(function(){
        if($(this).valid()){
            $(this).removeClass("error");
        } else {
            $(this).addClass("error")
        }
    });
});