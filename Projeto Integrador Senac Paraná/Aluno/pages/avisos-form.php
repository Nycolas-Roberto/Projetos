<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/avisos.css">
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Link FontAwesome -->
    <script src="https://kit.fontawesome.com/1c0bdfefed.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- JQuery Validation -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>





    <section class="content">
        <header>
            <div class="botao_perfil">
                <ul class="retratil">
                    <li>
                        <input type="checkbox" name="botao" id="botao">
                        <label for="botao"><i class="fa-solid fa-user" style="color:white;"></i></label>
                        <div class="conteudo">
                            <ul>
                                <li>
                                    <p>João Lucas</p>
                                </li>
                                <li>
                                    <p>Téc. Informática</p>
                                </li>
                                <li>
                                    <p>202100076</p>
                                </li>
                                <li>
                                   <p><a id="sair" href="../../Login/html/seletor.html"><i class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a></p>
                                </li>
                            </ul>
                        </div><!-- Conteudo -->
                    </li>
                </ul><!-- Retratil -->
            </div><!-- Botão Perfil -->
        </header>
        <main>
            <div class="title">
                <h1>Avisos </h1>
            </div><!-- Title -->
            <form action="" id="myform">
                <div class="select-curso">
                    <select name="curso" id="curso">
                        <option value="">Selecione o curso:</option>
                        <option value="1">Técnico em Informática</option>
                        <option value="2">Técnico em Administração</option>
                        <option value="3">Técnico em Óptica</option>
                    </select>
                    <span></span>
                </div><!-- select-curso -->
                <div class="select-turma">
                    <select name="turma" id="turma">
                        <option value="">Selecione a turma:</option>
                        <option value="202100076">202100076</option>
                        <option value="202100053">202100053</option>
                        <option value="202200010">202200010</option>
                    </select>
                    <span></span>
                </div><!-- select-turma -->
                <div class="txt">
                    <textarea name="msg" id="msg" cols="30" rows="14" maxlength="380"></textarea>
                    <span></span>
                </div>

        </main>

        <footer>
            <div class="home">
                <button type="submit"><i class="fa-solid fa-check" style="color: #ffffff;"> Pronto</i></button>
            </div><!-- Home -->
        </footer>

        </form>
        <!-- Link bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    </section>
    <!-- Validação -->
    <script src="../js/script.js"></script>
</body>

</html>