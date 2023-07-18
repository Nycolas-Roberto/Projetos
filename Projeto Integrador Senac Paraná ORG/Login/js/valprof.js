$(document).ready(function () {
    $("form").validate({
        rules: {
            email: {


                required: true,
                minlength: 3,
                maxlength: 40,
            },
            senha: {
                required: true,
                minlength: 3,
                maxlength: 100,
            },
            codigo: {
                required: true,
                minlength: 3,
                maxlength: 100,
            }
            /* Criar uma mensagem personalizada */

        },
        messages: {
            email: {
                required: "Preencha este campo!",
                email: "Digite um email válido!",
            },
            senha: {
                required: "Preencha este campo!",
                minlength: "Senha muito curta!",
                maxlength: "Senha muito longa!",
            },
            codigo: {
                required: "Preencha este campo!",
                minlength: "Código muito curto!",
                maxlength: "Código muito longo!",
            },
        },


    })/* Validação */
    $("#email").blur(function(){
        if($(this).valid()){
            $(this).removeClass("error")
            $(this).addClass("success")
        }else{
            $(this).addClass("error")
            $(this).removeClass("success")
        }
        
       })
    $("#senha").blur(function () {
        if ($(this).valid()) {
            $(this).removeClass("error")
            $(this).addClass("success")
        } else {
            $(this).addClass("error")
            $(this).removeClass("success")
        }

    })
    $("#codigo").blur(function () {
        if ($(this).valid()) {
            $(this).removeClass("error")
            $(this).addClass("success")
        } else {
            $(this).addClass("error")
            $(this).removeClass("success")
        }

    })
})