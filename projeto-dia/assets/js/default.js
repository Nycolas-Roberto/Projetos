/*
    background: url('../images/manhã.jpg') center center no-repeat local;
    background-size: cover;
*/
/*
    background: url('../images/tarde.jpg') center center no-repeat local;
    background-size: cover;
*/
/*
    background: url('../images/noite.jpg') center center no-repeat local;
    background-size: cover;
*/

let localDate = new Date();

let msg = window.document.getElementById('horas');
let img = window.document.getElementById('imgHoras');
let body = window.document.body
let main = window.document.getElementById('conteudo');
let footer = window.document.getElementById('rodape');

if (localDate.getHours() >= 0 && localDate.getHours() <= 5) { // Madrugada
    msg.innerText += ` ${localDate.getHours()}h da Madrugada`;
    body.style.backgroundColor = 'rgb(15, 15, 15)';
    main.style.backgroundColor = 'rgb(20, 20, 20)';
    main.style.color = 'rgb(233, 233, 233)';
    footer.style.color = 'rgb(233, 233, 233)';
    footer.style.backgroundColor = 'rgb(25, 25, 25)';
    img.style.backgroundImage = "url('./assets/images/noite.jpg')";
    img.style.backgroundPosition = 'center center';
    img.style.backgroundRepeat = 'no-repeat';
    img.style.backgroundAttachment = 'local';
    img.style.backgroundSize = 'cover';
} else if (localDate.getHours() >= 5 && localDate.getHours() < 12) { // Manhã
    msg.innerText += ` ${localDate.getHours()}h da Manhã`;
    body.style.backgroundColor = '#fce962';
    main.style.backgroundColor = 'rgb(0, 10, 40)';
    main.style.color = 'rgb(233, 233, 233)';
    footer.style.color = 'rgb(233, 233, 233)';
    footer.style.backgroundColor = 'rgb(25, 25, 25)';
    img.style.backgroundImage = "url('./assets/images/manhã.jpg')";
    img.style.backgroundPosition = 'center center';
    img.style.backgroundRepeat = 'no-repeat';
    img.style.backgroundAttachment = 'local';
    img.style.backgroundSize = 'cover';
} else if (localDate.getHours() >= 12 && localDate.getHours() < 18) { // Tarde
    msg.innerText += ` ${localDate.getHours()}h da Tarde`;
    body.style.backgroundColor = '#fce962';
    main.style.backgroundColor = 'rgb(0, 10, 40)';
    main.style.color = 'rgb(233, 233, 233)';
    footer.style.color = 'rgb(233, 233, 233)';
    footer.style.backgroundColor = 'rgb(25, 25, 25)';
    img.style.backgroundImage = "url('./assets/images/tarde.jpg')";
    img.style.backgroundPosition = 'center center';
    img.style.backgroundRepeat = 'no-repeat';
    img.style.backgroundAttachment = 'local';
    img.style.backgroundSize = 'cover';
} else if (localDate.getHours() >= 0 && localDate.getHours() <= 6) { // Noite
    msg.innerText += ` ${localDate.getHours()}h da Noite`;
    body.style.backgroundColor = 'rgb(15, 15, 15)';
    main.style.backgroundColor = 'rgb(20, 20, 20)';
    main.style.color = 'rgb(233, 233, 233)';
    footer.style.color = 'rgb(233, 233, 233)';
    footer.style.backgroundColor = 'rgb(25, 25, 25)';
    img.style.backgroundImage = "url('./assets/images/noite.jpg')";
    img.style.backgroundPosition = 'center center';
    img.style.backgroundRepeat = 'no-repeat';
    img.style.backgroundAttachment = 'local';
    img.style.backgroundSize = 'cover';
} else { // Noite
    msg.innerText += ` ${localDate.getHours()}h da Noite`;
    body.style.backgroundColor = 'rgb(15, 15, 15)';
    main.style.backgroundColor = 'rgb(20, 20, 20)';
    main.style.color = 'rgb(233, 233, 233)';
    footer.style.color = 'rgb(233, 233, 233)';
    footer.style.backgroundColor = 'rgb(25, 25, 25)';
    img.style.backgroundImage = "url('./assets/images/noite.jpg')";
    img.style.backgroundPosition = 'center center';
    img.style.backgroundRepeat = 'no-repeat';
    img.style.backgroundAttachment = 'local';
    img.style.backgroundSize = 'cover';
}
