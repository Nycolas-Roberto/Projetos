<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doyona - Account</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> <!-- BoxIcons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> <!-- Bootstrap -->
    <link rel="stylesheet" href="../style/manageAcc.css">
    <link rel="stylesheet" href="../style/index.css">


    <!-- JQUERY -->
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
<div class="espacoI"></div>
    <header class="navbar position-fixed-navbar" id="cabecalho" style='background-color: rgba(46, 46, 46, .6);'>
        <h1 class="slide-in-left-h1"><a href="../../index.php" style='text-decoration: none; color: rgb(201, 40, 40);'>Doyona</a></h1>
        <h2>Oficina</h2>
        <nav class="nav me-3" type="none">
            <li>
                <a href="../../index.php" class="nav-link text-white links-nav-bar">Home</a>
            </li>
            <?php
                session_start();
                if(isset($_SESSION['login']) && isset($_SESSION['senha']) || isset($_SESSION['loginFunc']) && isset($_SESSION['senhaFunc'])) {
                    echo "";
                } else {
                    header("Location: ../../index.php#login-cliente");
                }
            ?>
        </nav>
    </header>
    <hr class="border border-4 opacity-100 separar">
    <main>
        <section class="perfil">
            <h1 class="text-center">Seu perfil</h1>
            <hr class="border border-dark opacity-100">
            <br>
            <section class="d-flex align-items-center">
                <?php
                    if(isset($_SESSION['loginFunc']) && isset($_SESSION['senhaFunc'])) {
                        $sqlNome = "SELECT * FROM funcionarios WHERE fun_nome = '$_SESSION[loginFunc]'";
                        require_once('../php/db.php');
                        $respNome = $connection->query($sqlNome);
                        while($dataNome = mysqli_fetch_assoc($respNome)) {
                            echo "<h2 class='ms-3'> Seja bem vindo ".strtoupper($dataNome['fun_nome'])."</h2> <span class='text-danger p-2 rounded ms-2 bg-dark'>#$dataNome[fun_id]</span>";
                        }
                    } else if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
                        $sqlNome = "SELECT * FROM clientes WHERE cli_nome = '$_SESSION[login]'";
                        require_once('../php/db.php');
                        $respNome = $connection->query($sqlNome);
                        while($dataNome = mysqli_fetch_assoc($respNome)) {
                            echo "<h2 class='ms-3'> Seja bem vindo ".strtoupper($dataNome['cli_nome'])."</h2> <span class='text-danger p-2 rounded ms-2 bg-dark'>#$dataNome[cli_id]</span>";
                        }
                    }
                ?>
                
            </section>
            
            <section class="infoContaPerfil bg-dark text-white mt-5">
                    <h3>Informações da Conta <button class='btn btn-outline-warning'><i class='bx bxs-edit-alt'></i></button></h3>
                    
                    <section class="infosConta" name='infosConta' id='delInfos'>
                        <?php
                            if(isset($_SESSION['loginFunc']) && isset($_SESSION['senhaFunc'])) {
                                $sqlEmail = "SELECT * FROM funcionarios WHERE fun_nome = '$_SESSION[loginFunc]'";
                                require_once('../php/db.php');
                                $respEmail = $connection->query($sqlEmail);
                                while($data = mysqli_fetch_assoc($respEmail)){
                                    echo "
                                    <p>E-mail: "
                                    .$data['fun_email'].
                                    "</p><p> Senha: "
                                    .
                                    "<span id='senha' style='display: none;'>"
                                    .$_SESSION['senhaFunc'].
                                    "</span>"
                                    .
                                    "<button class='btn btn-success ms-1' onclick='exibirSenha()'>Exibir Senha</button> </p><p>Nome: "
                                    .$data['fun_nome'].
                                    " </p>";
                                    echo "
                                    <script>
                                        function exibirSenha(){
                                            let campoSenha = document.querySelector('#senha');
                                            if(campoSenha.style.display == 'none') {
                                                campoSenha.style.display = 'inline';
                                            } else {
                                                campoSenha.style.display = 'none';
                                            }
                                        };
                        
                                    </script>";
                                }
                            } else if (isset($_SESSION['login']) && isset($_SESSION['senha'])) {
                                $sqlEmail = "SELECT * FROM clientes WHERE cli_nome = '$_SESSION[login]'";
                                require_once('../php/db.php');
                                $respEmail = $connection->query($sqlEmail);
                                while($data = mysqli_fetch_assoc($respEmail)){
                                    echo "
                                    <p>E-mail: "
                                    .$data['cli_email'].
                                    "</p><p> Senha: "
                                    .
                                    "<span id='senha' style='display: none;'>"
                                    .$_SESSION['senha'].
                                    "</span>"
                                    .
                                    "<button class='btn btn-success ms-1' onclick='exibirSenha()'>Exibir Senha</button> </p><p>Nome: "
                                    .$data['cli_nome'].
                                    " </p>";
                                    echo "
                                    <script>
                                        function exibirSenha(){
                                            let campoSenha = document.querySelector('#senha');
                                            if(campoSenha.style.display == 'none') {
                                                campoSenha.style.display = 'inline';
                                            } else {
                                                campoSenha.style.display = 'none';
                                            }
                                        };
                        
                                    </script>";
                                }
                            }

                        ?>
                        <form action="#" method="post">
                            <button type="submit" class='btn btn-outline-danger' name='sairConta'>Sair<i class='bx bxs-exit'></i></button>
                        </form>
                        <?php
                            if(isset($_POST['sairConta'])) {
                                unset($_SESSION['loginFunc']);
                                unset($_SESSION['senhaFunc']);
                                unset($_SESSION['login']);
                                unset($_SESSION['senha']);
                                header("Location: ../../index.php");
                            }
                        ?>
                </section>
            </section>
        </section>
    </main>
</body>
</html>