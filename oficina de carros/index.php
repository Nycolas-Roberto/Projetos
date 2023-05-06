<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doyona</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- BoxIcons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/style/index.css">


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
                <a href="#" class="nav-link text-white links-nav-bar">Home</a>
            </li>
            <li>
                <a href="#container-cliente" class="nav-link text-white links-nav-bar">Área Cliente</a>
            </li>
            <?php
                session_start();
                if(isset($_SESSION['login']) && isset($_SESSION['senha']) || isset($_SESSION['loginFunc']) && isset($_SESSION['senhaFunc'])) {
                    echo "
                        <li>
                            <a href='./assets/pages/manageAcc.php' class='nav-link text-white links-nav-bar'>Gerenciar Conta</a>
                        </li>
                    ";
                    echo "<style>#relacao-contas {display: none;}</style>";
                } else {
                    echo "
                        <li>
                            <a href='#login-cliente' class='nav-link text-white links-nav-bar'>Entrar</a>
                        </li>   
                    ";
                }
            ?>
        </nav>
    </header>
    <hr class="border border-4 opacity-100 separar">
    <main>
        <section class="about">
            <section class="img-about"></section>
            <section class="desc-about">
                <h2><i class='bx bx-chevron-right'></i>Sobre Nós</h2>
                <p>Somos uma empresa de automobilismo focado no sport Drifting, onde pegamos carros usados e realizamos uma breve reforma para adicionar mais um automóvel para Drifting em uma pista dos seguintes estados (Paraná, Santa Catarina e Rio de Janeiro).</p>
            </section>
        </section>


        <section class="pages slide-right">
            <h3><i class='bx bxs-user icones-pages'></i><span class="titulo-pages">CLIENTE</span></h3>
            <p>Área destinada para visualizações e compras de nossos carros além de você conhecer nossa oficina.</p>
        </section>
        <section class="pages slide-right">
            <h3><i class='bx bxs-briefcase-alt-2 icones-pages'></i><span class="titulo-pages">FUNCIONÁRIOS</span></h3>
            <p>Acesse está página caso você trabalhe conosco, Assim você pode ter um acesso parcial ao nosso sistema.</p>
        </section>

        <hr class="border border-light opacity-100 ">


        <section class="container-cliente" id="container-cliente">
            <h3 class="text-white text-center">CONSULTE UM CARRO</h3>


            <form action="#container-cliente" method="post" autocomplete="off">
                <p class="desc-estado">Consulte o estoque de veículos disponíveis nas oficinas Autorizadas Doyona dos seguintes estados (Rio de Janeiro, Paraná e Santa Catarina) Pronto para encontrar o Doyona que mais combina com você? Ou <abbr title="Criar conta Doyona" style="text-decoration: none;"><a href="#registrar-cliente">crie uma nova conta</a></abbr> para mais benefícios.</p>
                <select name="estado" id="estado" class="form-select selecionarEstado" id="floatingSelect" aria-label="Floating label select example" required>
                    <option value="1">Oficina Doyona - Paraná</option>
                    <option value="2">Oficina Doyona - Rio de Janeiro</option>
                    <option value="3" selected>Oficina Doyona - Santa Catarina</option>
                </select>
                <div class="btn-pesquisa"><button type="submit" class="btn btn-outline-danger btn-pesquisar" name="btn-pesquisar-carro">Pesquisar</button></div>
            </form>

            <br>

            <section class="respQuery" style="display: flex; flex-wrap: wrap; justify-content: center;">
                <?php 
                    if(isset($_POST['btn-pesquisar-carro'])){
                        try {
                            $estado = htmlspecialchars($_POST['estado']);
                            if($estado == 1 || $estado == 2 || $estado == 3) {
                                require_once('assets/php/db.php');
                                $pesquisar_carro = "SELECT * FROM carros WHERE car_estado = $estado";
                                $resp_pesquisar_carro = $connection->query($pesquisar_carro);
                                if(mysqli_num_rows($resp_pesquisar_carro) > 0) {
                                    while($data = mysqli_fetch_assoc($resp_pesquisar_carro)){
                                        echo "
                                            <div class='card border-0 m-3 bg-dark text-white' style='width: 18rem;'>
                                                <img src='".htmlspecialchars($data['car_img'])."' class='card-img-top' alt='carro'>
                                                <div class='card-body'>
                                                    <h5 class='card-title text-center'>".htmlspecialchars($data['car_modelo'])."</h5>
                                                    <p class='card-text'>".htmlspecialchars($data['car_descricao'])."</p>
                                                    <a href='#' class='btn btn-success'>Comprar</a>
                                                    <a href='#' class='btn btn-outline-danger float-end'>Agendar</a>
                                                </div>
                                            </div>
                                        ";
                                    }
                                } else {
                                    echo "<div class='error text-white m-auto text-center'><i class='bx bxs-message-alt-error'></i>Nenhum carro encontrado!</div>";
                                }
                            } else {
                                echo "<div class='error text-white m-auto text-center'><i class='bx bxs-message-alt-error'></i>Nenum carro encontrado.</div>";
                            }
                        } catch (Exception $e) {
                            echo "<div class='error text-white m-auto text-center'><i class='bx bxs-message-alt-error'></i>ERRO</div>";
                        }

                    }
                ?>
            </section>


            <section class='bg-dark p-3 m-auto mt-4' id='relacao-contas'>
                <section class="container" id="registrar-cliente" autocomplete="off">
                    <form action="#registrar-cliente" method="post" id="registrar-cliente-form" class="p-5">
                        <h1 class="text-white text-center mb-3">REGISTRAR-SE</h1>
                        <input type="text" name="nome" id="nome" placeholder="Nome" title="Digite seu Nome" class="d-block mb-3 p-3" style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                        <input type="text" name="email" id="email" placeholder="E-mail" title="Digite seu E-mail" class="d-block mb-3 p-3" style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                        <input type="password" name="senha" id="senha" placeholder="Senha" title="Digite sua senha" class="d-block mb-3 p-3" style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                        <input type="submit" class="btn btn-outline-success" style="display: flex; margin: 0 auto;" value="Cadastrar-se" name="registrar">

                        <?php
                            try {
                                if(isset($_POST['registrar'])) {
                                    $nome = htmlspecialchars(strtolower($_POST['nome']));
                                    $email = htmlspecialchars(strtolower($_POST['email']));
                                    $senha = htmlspecialchars(strtolower($_POST['senha']));
                                    $cripto = password_hash($senha, PASSWORD_DEFAULT);
                                    if(strlen($nome) <= 50 && strlen($email) <= 50 && strlen($senha) <= 50) {
                                        $SqlSignup = "INSERT INTO clientes VALUES (default, '$nome', '$email', '$cripto', '0');";
                                        require_once('assets/php/db.php');
                                        $respSignup = $connection->query($SqlSignup);
                                        if($respSignup) {
                                            echo "<div class='text-white m-3 text-center'>Conta registrada com sucesso, utilize <a href='#logar'>Logar</a>.</div>";
                                        } else {
                                            echo "<div class='error text-white m-3 text-center'><i class='bx bxs-message-alt-error'></i>Erro ao tentar registrar sua conta.</div>";
                                        }
                                    }
                
                
                                }
                            } catch (Exception $e) {
                                echo "<div class='error text-white m-3 text-center'><i class='bx bxs-message-alt-error'></i>ERRO</div>";
                            }
                        ?>
                    </form>
                </section>
                <section class="container mt-5" id="login-cliente">
                    <h1 class="text-white text-center mb-3">LOGAR</h1>
                    <form action="assets/php/signup.php" method="post" id="login-cliente-form">
                        <input type="text" name="nomeLogin" id="nomeLogin" placeholder="Nome ou E-mail" title="Digite seu E-mail ou Nome" class="d-block mb-3 p-3" style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                        <input type="password" name="senhaLogin" id="senhaLogin" placeholder="Senha" title="Digite sua senha" class="d-block mb-3 p-3" style="width: 30vw; outline: none; border: none; border-radius: 10px; justify-content: center; margin: 0 auto;">
                        <input type="submit" class="btn btn-outline-success" style="display: flex; margin: 0 auto;" value="Logar" name="logar">
                    </form>
                </section>
            </section>


        </section>
    </main>

    <div class="espacoF"></div>
    <footer style='background-color: rgba(46, 46, 46);'>
        <p><a href="#" class='text-white'>Precisa de Ajuda<i class='bx bx-help-circle'></i></a></p>
        <p><a href="assets/pages/funcionarios.php" class='text-white'>Por acaso você é um funcionário<i class='bx bx-help-circle'></i></a></p>
    </footer>
</body>
</html>
<script src="assets/javascript/validates.js"></script>
<script src="assets/javascript/validatesLogin.js"></script>