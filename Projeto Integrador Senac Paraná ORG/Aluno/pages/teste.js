var conteudo = document.querySelector('#conteudododia')
var radios = document.querySelectorAll('input[type="radio"]');
radios.forEach(radio => {
    radio.addEventListener('change', () => {
        var valor = parseInt(radio.value); // Converter para número usando parseInt
        alert (valor)

        switch (valor) {
            case 1:
                mensagem = "<?php echo 'segunda feira'?>";
                break;
            case 2:
                mensagem = "Hoje é terça-feira";
                break;
            case 3:
                mensagem = "Hoje é quarta-feira";
                break;
            case 4:
                mensagem = "Hoje é quinta-feira";
                break;
            case 5:
                mensagem = "Hoje é sexta-feira";
                break;
            default:
                mensagem = "Dia inválido";
                break;
        }
        console.log(mensagem);
        conteudo.innerHTML = mensagem;


    });




});
