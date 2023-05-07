// Recupera a lista de senhas do localStorage
let senhasUsuario = JSON.parse(localStorage.getItem("jsonSenhas"));

// Seleciona o elemento HTML onde as senhas serão exibidas
let carouselInner = document.querySelector(".carousel-inner");

// Itera sobre cada item da lista de senhas e cria a estrutura HTML correspondente
senhasUsuario.forEach(function (item) {
    // Cria um novo elemento HTML com os valores recuperados
    let novaSenha = document.createElement("div");
    novaSenha.className = "carousel-item";
    if (item === senhasUsuario[0]) {
        novaSenha.classList.add("active");
    }

    let card = document.createElement("div");
    card.className = "card";
    card.style = "width: 60vw; margin: auto;";

    let cardBody = document.createElement("div");
    cardBody.className = "card-body";

    let cardTitle = document.createElement("h5");
    cardTitle.className = "card-title";
    let cardTitleText = document.createTextNode(item.senha);
    cardTitle.appendChild(cardTitleText);

    let cardSubtitle = document.createElement("h6");
    cardSubtitle.className = "mb-2";
    let cardSubtitleLink = document.createElement("a");
    cardSubtitleLink.href = item.fonte;
    cardSubtitleLink.style.textDecoration = "none";
    let cardSubtitleLinkText = document.createTextNode(item.fonte);
    cardSubtitleLink.appendChild(cardSubtitleLinkText);
    cardSubtitle.appendChild(cardSubtitleLink);

    let mt4 = document.createElement("div");
    mt4.className = "mt-4";
    let mt4Subtitle = document.createElement("h6");
    mt4Subtitle.className = "card-subtitle mb-2 text-body-secondary";
    let mt4SubtitleText = document.createTextNode(`Quão forte a senha é?`);
    mt4Subtitle.appendChild(mt4SubtitleText);
    let progress = document.createElement("div");
    progress.className = "progress";
    progress.setAttribute("role", "progressbar");
    progress.setAttribute("aria-label", "Basic example");
    progress.setAttribute("aria-valuenow", item.potencia);
    progress.setAttribute("aria-valuemin", "0");
    progress.setAttribute("aria-valuemax", "100");
    let progressBar = document.createElement("div");
    progressBar.className = "progress-bar";
    progressBar.style.width = `${item.potencia}%`;
    progress.appendChild(progressBar);
    mt4.appendChild(mt4Subtitle);
    mt4.appendChild(progress);

    cardBody.appendChild(cardTitle);
    cardBody.appendChild(cardSubtitle);
    cardBody.appendChild(mt4);

    card.appendChild(cardBody);
    novaSenha.appendChild(card);

    // Adiciona o novo elemento HTML ao seu documento
    carouselInner.appendChild(novaSenha);
});