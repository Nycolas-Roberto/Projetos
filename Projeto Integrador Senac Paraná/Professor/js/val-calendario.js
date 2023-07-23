/* Quando a página estiver pronta (carregada) ele vai exibir esse aviso */
/* Tudo ocm o Jquery é referenciado pelo $ */
$(document).ready(
    function () {
        /* Inicializa o plugin do jquery de validação do formulario */
        $("form").validate({
            /* Criar as rergas de validação */
            rules: {
                msg: {
                    rangelength: [0, 383],
                },
                dia:{
                    required: true,
                },
                curso:{
                    required: true,
                },
                turma:{
                    required: true,
                },

            },
            /* Criar uma mensagem personalizada */
            messages: {
                msg: {
                    rangelength: "A mensagem está muito longa"
                },
                dia: {
                    required: "Este campo é obrigatório!"
                },
                turma: {
                    required: "Este campo é obrigatório!"
                },
                curso: {
                    required: "Este campo é obrigatório!"
                },

            },
        })
        $("#msg").blur(function () {
            if ($(this).valid()) {
                $(this).removeClass("error")
                $(this).addClass("success")
            } else {
                $(this).addClass("error")
                $(this).removeClass("success")
            }
            

        })
        $("#dia").blur(function () {
            if ($(this).valid()) {
                $(this).removeClass("error")
                $(this).addClass("success")
            } else {
                $(this).addClass("error")
                $(this).removeClass("success")
            }
            

        })
        $("#curso").blur(function () {
            if ($(this).valid()) {
                $(this).removeClass("error")
                $(this).addClass("success")
            } else {
                $(this).addClass("error")
                $(this).removeClass("success")
            }
            

        })
        $("#turma").blur(function () {
            if ($(this).valid()) {
                $(this).removeClass("error")
                $(this).addClass("success")
            } else {
                $(this).addClass("error")
                $(this).removeClass("success")
            }
            

        })
    })