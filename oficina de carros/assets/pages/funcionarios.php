<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doyona - Funcionarios</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- BoxIcons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../style/funcionarios.css">
    <link rel="stylesheet" href="../style/index.css">

    <!-- JQUERY -->
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body>
    <div class="espacoI"></div>
    <header class="navbar position-fixed-navbar" id="cabecalho" style='background-color: rgba(46, 46, 46, .6);'>
        <h1 class="slide-in-left-h1"><a href="#" style='text-decoration: none; color: rgb(201, 40, 40);'>Doyona</a></h1>
        <h2>Oficina</h2>
        <nav class="nav me-3" type="none">
            <li>
                <a href="../../index.php" class="nav-link text-white links-nav-bar">Home</a>
            </li>
            <?php
            session_start();
            if (isset($_SESSION['loginFunc']) && isset($_SESSION['senhaFunc'])) {
                echo "
                        <li>
                            <a href='manageAcc.php' class='nav-link text-white links-nav-bar'>Gerenciar Conta</a>
                        </li>
                ";
                echo "<style>#login-funcionario {display: none;}</style>";
                echo "<style>#cadastrar-funcionario {display: block;}</style>";
                echo "<style>#cadastrar-carro {display: block;}</style>";
            } else {
                echo "
                    <li>
                        <a href='funcionarios.php#login-funcionario' class='nav-link text-white links-nav-bar'>Entrar</a>
                    </li>
                ";
                echo "<style>#login-funcionario {display: block;}</style>";
                echo "<style>#cadastrar-funcionario {display: none;}</style>";
            }
            ?>
        </nav>
    </header>
    <main>
        <section class="container mt-5" id="login-funcionario">
            <h1 class="text-white text-center mb-3">STAFF</h1>
            <form action="../php/signupFunc.php" method="post" id="login-cliente-form">
                <input type="text" name="nomeLogin" id="nomeLogin" placeholder="Nome ou E-mail"
                    title="Digite seu E-mail ou Nome" class="d-block mb-3 p-3"
                    style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                <input type="password" name="senhaLogin" id="senhaLogin" placeholder="Senha" title="Digite sua senha"
                    class="d-block mb-3 p-3"
                    style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                <input type="submit" class="btn btn-outline-success" style="display: flex; margin: 0 auto;"
                    value="Logar" name="logar">
            </form>
        </section>

        <section id='cadastrar-funcionario' class='container mt-5 bg-dark'>
            <section class="container" id="registrar-cliente" autocomplete="off">
                <form action="#registrar-cliente" method="post" id="registrar-cliente-form" class="p-5">
                    <h1 class='text-white text-center mb-3'>Cadastrar um novo funcionário</h1>
                    <input type="text" name="nome" id="nome" placeholder="Nome" title="Digite seu Nome"
                        class="d-block mb-3 p-3"
                        style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                    <input type="text" name="email" id="email" placeholder="E-mail" title="Digite seu E-mail"
                        class="d-block mb-3 p-3"
                        style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                    <input type="password" name="senha" id="senha" placeholder="Senha" title="Digite sua senha"
                        class="d-block mb-3 p-3"
                        style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                    <input type="submit" class="btn btn-outline-success" style="display: flex; margin: 0 auto;"
                        value="Cadastrar" name="registrar">

                    <?php
                    try {
                        if (isset($_POST['registrar'])) {
                            if (isset($_SESSION['loginFunc']) && isset($_SESSION['senhaFunc'])) {
                                $nome = htmlspecialchars(strtolower($_POST['nome']));
                                $email = htmlspecialchars(strtolower($_POST['email']));
                                $senha = htmlspecialchars(strtolower($_POST['senha']));
                                $cripto = password_hash($senha, PASSWORD_DEFAULT);
                                if (strlen($nome) <= 50 && strlen($email) <= 50 && strlen($senha) <= 50) {
                                    $SqlSignup = "INSERT INTO funcionarios VALUES (default, '$nome', '$email', '$cripto');";
                                    require_once('../php/db.php');
                                    $respSignup = $connection->query($SqlSignup);
                                    if ($respSignup) {
                                        echo "<div class='text-white m-3 text-center'>Conta registrada com sucesso <br> Seu login: $nome ou $email <br> Senha: $senha</div>";
                                    } else {
                                        echo "<div class='error text-white m-3 text-center'><i class='bx bxs-message-alt-error'></i>Erro ao tentar registrar a conta do novo funcionário.</div>";
                                    }
                                }
                            } else {
                                echo "<div class='error text-white m-3 text-center'><i class='bx bxs-message-alt-error'></i>Erro ao tentar registrar a conta do novo funcionário, você não está logado com uma conta de funcionário.</div>";
                            }
                        }
                    } catch (Exception $e) {
                        echo "<div class='error text-white m-3 text-center'><i class='bx bxs-message-alt-error'></i>ERRO</div>";
                    }
                    ?>
                </form>
            </section>
        </section>


        <section class='container bg-dark text-white p-5' id='cadastrar-carro'>
            <h1 class='text-center pb-2'>Carros</h1>
            <div class="accordion accordion-flush">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Registrar um carro
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <form action="#" method="post" class='needs-validation was-validated' novalidate
                                enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="marca-carro" class="form-label">Marca do Carro</label>
                                    <input type="text" class="form-control" id="marca-carro"
                                        placeholder="Digite a marca do carro" maxlength="50" minlength="3" name="marca_carro" required>
                                </div>
                                <div class="mb-3">
                                    <label for="modelo-carro" class="form-label">Modelo do Carro</label>
                                    <input type="text" class="form-control" id="modelo-carro"
                                        placeholder="Digite a modelo do carro" maxlength="50" minlength="3" name='modelo_carro' required>
                                </div>
                                <div class="mb-3">
                                    <label for="placa-carro" class="form-label">Placa do Carro</label>
                                    <input type="text" class="form-control" id="modelo-carro"
                                        placeholder="Digite a placa do carro" maxlength="50" minlength="3" name='placa_carro' required>
                                </div>
                                <div class="mb-3">
                                    <label for="descricao-carro" class="form-label">Descrição do Carro</label>
                                    <textarea type="text" class="form-control" id="descricao-carro"
                                        placeholder="Digite a descricao do carro" maxlength="50" minlength="5"
                                        name="descricao" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="estado-carro" class="form-label">Qual oficina se encontra?</label>
                                    <select name="estado" id="estado" class="form-select" id="floatingSelect"
                                        aria-label="Floating label select example" required>
                                        <option value="1">Oficina Doyona - Paraná</option>
                                        <option value="2">Oficina Doyona - Rio de Janeiro</option>
                                        <option value="3" selected>Oficina Doyona - Santa Catarina</option>
                                    </select>
                                </div>
                                <button class="btn btn-success" type="submit" name='cadastrar_carro'>Cadastrar</button>
                                <?php
                                    /* PHP INCOMPLETO */
                                    if(isset($_POST['cadastrar_carro'])) {
                                        $marcaCarro = $_POST['marca_carro'];
                                        $marcaCarro = $_POST['modelo_carro'];
                                        $estado = $_POST['estado'];
                                        $descricao = $_POST['descricao'];
                                        $placa = $_POST['placa_carro'];
                                    }
                                ?>
                            </form>
                        </div>
                    </div>
                </div> <!-- ITEM -->



                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Consultar carro
                        </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">

                        </div>
                    </div>
                </div> <!-- ITEM -->
            </div>
        </section>



    </main>

    <script src="../javascript/validates.js"></script>
    <script src="../javascript/validatesLogin.js"></script>
</body>

</html>