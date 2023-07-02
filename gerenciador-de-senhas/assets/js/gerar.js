function gerarSenha(tamanho, palavraChave) {
    var caracteres = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_-+=,.?/:";
    let senha = palavraChave + '=====' + '';
    for (var i = 0; i < tamanho; i++) {
        senha += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
    }
    return senha
}


function checarForcaSenha(senha) {
    let forca = 0;

    // verifica se a senha tem pelo menos 8 caracteres
    if (senha.length >= 1) {
        forca++;
    }

    // verifica se a senha tem letras maiúsculas e minúsculas
    if (/[a-z]/.test(senha) && /[A-Z]/.test(senha)) {
        forca++;
    }

    // verifica se a senha tem números
    if (/\d/.test(senha)) {
        forca++;
    }

    // verifica se a senha tem caracteres especiais
    if (/[@$!%*?&]/.test(senha)) {
        forca++;
    }

    // determina a força da senha com base nas regras
    if (forca === 4) {
        return 100
    } else if (forca >= 2) {
        return 50
    } else {
        return 25
    }
}


let btn = document.querySelector('#btn_generator');
btn.addEventListener("click", function () {
    let size = document.querySelector("#sizePass").value;
    let fonte = document.querySelector("#fonte").value;
    let palavraChave = document.querySelector('#palavraChave').value;
    if (size >= 1 && palavraChave.length >= 1 && fonte.length >= 1) {
        let outputPass = document.querySelector("#outputPass");
        senhaGerada = gerarSenha(size, palavraChave);
        outputPass.value = senhaGerada;

        let forte = checarForcaSenha(senhaGerada);


        let jsonSenha = {
            senha: senhaGerada,
            fonte: fonte,
            potencia: forte
        };
        let jsonSenhas = localStorage.getItem("jsonSenhas");
        if (jsonSenhas === null) {
            jsonSenhas = [];
        } else {
            jsonSenhas = JSON.parse(jsonSenhas);
        }
        jsonSenhas.push(jsonSenha);
        localStorage.setItem("jsonSenhas", JSON.stringify(jsonSenhas));

    }
});