<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferramenta de Buscas</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../../favicon.ico" type="image/x-icon">

    <!-- Css -->
    <link rel="stylesheet" href="../../style/index.css" media="all">
    <link rel="stylesheet" href="../../style/index-cnpj.css">
</head>

<body>
    <section id="mobile-v">
        <header class="d-flex">
            <img src="../../img/logo.png" alt="logo" class="logo">
            <h1 class="title-header">SHERLOCK</h1>
        </header> <!-- HEADER -->
        <main>
            <form action="#" method="post" class="was-validated">
                <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="Informe o CNPJ" required>
                <div class="mt-3">
                    <button type="submit" class="btn-consultar">Consultar</button>
                </div>
            </form>

            <section class="mt-5 relatorio">
                <section class="d-flex">
                    <h2>RELATÓRIO</h2>
                    <div class="copy">
                        COPIAR
                    </div>
                </section>
<!--                 <section class="informacoes mt-4 text-center">
                    <section class="campo mb-4">
                        <h3>DATA DE ABERTURA</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>SITUAÇÃO</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>NOME</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>NOME FANTASIA</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>PORTE</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>NATUREZA JURÍDICA</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>ATIVIDADE PRINCIPAL</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>ATIVIDADE(s) SECUNDÁRIA(s)</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>QSA</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>LOGRADOURA</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>MUNICÍPIO</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>BAIRRO</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>NÚMERO</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>UF</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>CEP</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>TELEFONE (s)</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>DATA DA SITUAÇÃO</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>STATUS</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>ÚLTIMA ATUALIZAÇÃO</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>COMPLEMENTO</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>UFR</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>MOTIVO DA SITUAÇÃO</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>SITUAÇÃO ESPECIAL</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>DATA DA SITUAÇÃO ESPECIAL</h3>
                        <input type="text" class="input-campo">
                    </section>
                    <section class="campo mb-4">
                        <h3>CAPITAL SOCIAL</h3>
                        <input type="text" class="input-campo">
                    </section>
                </section> -->
            </section>
        </main> <!-- MAIN -->
        <footer>
            <a href="../home/" class="voltar">Voltar</a>
        </footer>
    </section> <!-- MOBILE-V -->



    <!-- Aviso para +768px -->
    <section id="large-screen">
        <h1>Aviso</h1>
        <p>Aplicação disponível apenas para dispositivos Mobile.</p>
    </section>
</body>

</html>