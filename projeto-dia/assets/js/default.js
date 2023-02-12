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
//localDate.getHours();
let hours = 6
let msg = window.document.getElementById('horas');
let img = window.document.getElementById('imgHoras');
let body = window.document.body
let main = window.document.getElementById('conteudo');
let footer = window.document.getElementById('rodape');

if (hours >= 18 && hours <= 24) { // Noite
    console.log('NOITE')
} else if (hours >= 12 && hours <= 18) { // Tarde
    console.log('TARDE')
} else if (hours >= 6 && hours <= 12) { // Manhã
    msg.innerText += ` ${hours}h da Manhã`;
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
} else if (hours >= 1 && hours <= 6) { // Madrugada
    msg.innerText += ` ${hours}h da Madrugada`;
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
} else {
    body.innerHTML = 'ERRO DE CÓDIGO ou HORÁRIO INVÁLIDO' // Caso o horário seja inválido
}
