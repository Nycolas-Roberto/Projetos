// Adicionar evento aos botões de exibir popup
var exibirPopups = document.querySelectorAll(".btn-exibir-popup");
exibirPopups.forEach(function(botao) {
    botao.addEventListener("click", function() {
        document.querySelector(".comprar").style.display = "block";
    });
});

// Adicionar evento aos botões de fechar popup
var fecharPopups = document.querySelectorAll(".fecharPopup");
fecharPopups.forEach(function(botao) {
    botao.addEventListener("click", function() {
        document.querySelector(".comprar").style.display = "none";
    });
});
