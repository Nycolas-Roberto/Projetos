/*
 * O script abaixo faz com que todos os botões com a classe "btn-exibir-popup" adicione um evento de click, pois no momento em que eu clicar será exibido uma POPUP dizendo "Produto comprado com sucesso".
*/

// Adicionar evento aos botões de exibir popup
var exibirPopups = document.querySelectorAll(".btn-exibir-popup");
exibirPopups.forEach(function(botao) { // For each para adicionar o evento de clique para todos os botões que contém a classe btn-exibir-popup
    botao.addEventListener("click", function() { // Evento de click
        document.querySelector(".comprar").style.display = "block"; // Manipular o estilo para exibir a popup
    });
});

// Adicionar evento aos botões de fechar popup
var fecharPopups = document.querySelectorAll(".fecharPopup");
fecharPopups.forEach(function(botao) { // For each para adicionar o evento de clique para todos os botões que contém a classe fecharPopup.
    botao.addEventListener("click", function() { // Evento de click
        document.querySelector(".comprar").style.display = "none"; // Manipular o estilo para esconder a popup.
    });
});
