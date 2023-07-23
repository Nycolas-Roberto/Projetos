<?php
try {
    session_start();
    if (!(isset($_SESSION['login'])) && !(isset($_SESSION['senha']))) {
        header("Location: ../../Login/pages/seletor.php");
    } else {
        echo "";
    }
} catch (Exception $e) {
    die();
}

// Banco
try {
    require_once("../../Login/php/db.php");
    $sqlAluno01 = "SELECT * FROM aluno WHERE emailAluno = '$_SESSION[login]';";
    $respAluno01 = $connection->query($sqlAluno01);
    if (mysqli_num_rows($respAluno01) > 0) {
        while ($dataAluno01 = mysqli_fetch_assoc($respAluno01)) {
            $nomeDoAluno = $dataAluno01['nomeAluno'];
            $idDoAluno = $dataAluno01['idaluno'];
            $turmaDoAluno = $dataAluno01['turma_idturma'];
            $idCursoAluno = $dataAluno01['curso_idcurso'];
        }
    } else {
        header("Location: ../../Login/pages/seletor.php");
    }
} catch (Exception $e) {
    die();
}

// JSON
try {
    include_once "../../Login/php/db.php";
    // Executar a consulta
    $sqlCurso = "SELECT * FROM aluno_has_unidade WHERE aluno_idaluno = $idDoAluno";
    $result = $connection->query($sqlCurso);

    // Verificar se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Array para armazenar os dados
        $dadosunidades = array();

        // Processar os dados retornados
        while ($linha = $result->fetch_assoc()) {
            // Acessar os valores de cada coluna

            $campoUnidade = $linha['unidade_idunidade'];
            $campoCurso = $linha['unidade_curso_idcurso'];
            $campoFaltas = $linha['alunoFaltas'];
            $campoComent = $linha['comentarioProf'];
            $campoCarga = $linha['unidade_cargah'];

            // Adicionar cada linha como um item no array de dados
            $dadosunidades[] = array(

                'Unidade' => $campoUnidade,
                'Curso' => $campoCurso,
                'Faltas' => $campoFaltas,
                'Coment' => $campoComent,
                'Carga' => $campoCarga

            );
        }

        // Converter o array em formato JSON com codificação Unicode correta
        $json = json_encode($dadosunidades, JSON_UNESCAPED_UNICODE);

        // Verificar se a conversão foi bem-sucedida
        if ($json === false) {
            die("Erro ao converter em JSON.");
        }

        // Escrever o JSON em um arquivo
        $arquivo = 'dadosunidades.json';
        if (file_put_contents($arquivo, $json) !== false) {
        } else {
            echo "Falha ao criar o arquivo JSON.";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
} catch (Exception $e) {
    die();
}
?>

<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/cont-freq.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequência e Unidades</title>
    <!-- Link CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Link JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- Link Fontawesome -->
    <script src="https://kit.fontawesome.com/acc0f57857.js" crossorigin="anonymous"></script>

</head>

<body>
    <section class="fundo">
        <header>
            <div class="botao_perfil">
                <ul class="retratil">
                    <li>
                        <input type="checkbox" name="botao" id="botao">
                        <label for="botao"><i class="fa-solid fa-user" style="color:white;"></i></label>
                        <div class="conteudo">
                            <ul>
                                <li>
                                    <?php echo "<p>$nomeDoAluno</p>" ?>
                                </li>
                                <li>
                                    <?php
                                    $sqlCurso = "SELECT * FROM curso WHERE idcurso = $idCursoAluno";
                                    $respCurso = $connection->query($sqlCurso);
                                    if (mysqli_num_rows($respCurso) > 0) {
                                        while ($dataCurso = mysqli_fetch_assoc($respCurso)) {
                                            echo "<p>$dataCurso[nomeCurso]</p>";
                                        }
                                    }
                                    ?>
                                </li>
                                <li>
                                    <?php echo "<p>$turmaDoAluno</p>" ?>
                                </li>
                                <li>
                                    <p>
                                        <a id="sair" href="../../Login/php/logout.php?sair=1"><i
                                                class="fa-solid fa-right-from-bracket" style="color: #ffffff;"></i></a>
                                    </p>
                                </li>
                            </ul>
                        </div><!-- Conteudo -->
                    </li>
                </ul><!-- Retratil -->
            </div><!-- Botão Perfil -->
        </header>
        <main>
            <div class="img">
                <img src="../img/clock.png" alt="">
                <figcaption>Frequência & Unidades</figcaption>
            </div><!-- Img -->

            <div class="seletor">
                <form action="#" method="POST">
                    <select name="unidade-selecionar" onchange="consulta()" id="unidade_select">
                        <option>Selecione uma unidade</option>
                        <?php
                        try {
                            if (mysqli_num_rows($respAluno01) === 1) {
                                $sqlUni = "SELECT *, COUNT(idunidade) AS total_unidades FROM `unidade` WHERE curso_idcurso = $idCursoAluno";
                                $respUni = $connection->query($sqlUni);
                                if (mysqli_num_rows($respUni) > 0) {
                                    while ($dataUni = mysqli_fetch_assoc($respUni)) {
                                        $QtdUni = $dataUni['total_unidades'];
                                        for ($c = 1; $c <= $QtdUni; $c++) {
                                            echo "<option value='$c'>Unidade $c</option>";
                                        }
                                    }
                                } else {
                                    echo "<div class='alert'>Nenhuma unidade curricular encontrada</div>";
                                }
                            } else {
                                echo "<div class='alert'>Nenhum aluno encontrado</div>";
                            }
                        } catch (Exception $e) {
                            die("<div class='error'>Erro Crítico</div>");
                        }
                        ?>
                    </select>

                </form>

                <?php
                try {
                    if (isset($_POST['btn-unidade'])) {
                        $unidadeSelecionada = $_POST['unidade-selecionar'];
                    }
                } catch (Exception $e) {
                    die("<div class='error'>Erro Crítico</div>");
                }
                ?>
            </div><!-- Seletor -->

            <main>
                <div class="quadro">
                    <div class="principal">
                        <div class="corda"></div>
                        <p id="comentarios">


                        </p>
                    </div>
                </div><!-- Quadro -->
                <div class="dashboards">
                    <div class="faltas">
                        <h1>Faltas</h1>
                        <span id="faltas">

                        </span>
                    </div>
                    <div class="carga">
                        <h1>C. Horária</h1>
                        <span id="horaria">

                        </span>
                    </div>
                    <div class="maxima">
                        <h1>Faltas Max.</h1>
                        <span id="maxima">

                        </span>
                    </div>
                </div><!-- Dashboards -->
            </main>
        </main>
        <footer>
            <div class="home">
                <a href="index.php"><i class="fa-sharp fa-solid fa-house" style="color: #ffffff;"></i></a>
            </div><!-- Home -->
        </footer>
    </section><!-- Fundo -->
</body>

</html>
<script>
    function consulta() {
       var select = document.querySelector("#unidade_select").value

        fetch('dadosunidades.json')
            .then(response => response.json())
            .then(data => {
                // Acesso às informações do JSON
                 primeiroRegistro = data[select-1]; // Acessa o primeiro elemento do array
                 faltas = primeiroRegistro.Faltas;
                 comentario = primeiroRegistro.Coment;
                 unidade = primeiroRegistro.Unidade;
                 carga = primeiroRegistro.Carga;

  

                var intcarga = parseInt(carga);
                var maxima0 = intcarga * 0.25;
                var maxima = Math.floor(maxima0);
                const dashfaltas = document.querySelector("#faltas");
                const dashmax = document.querySelector("#maxima");
                const dashhoraria = document.querySelector("#horaria");
                const quadro = document.querySelector("#comentarios");
                

                

                quadro.innerHTML = comentario;
                dashfaltas.innerHTML = faltas;
                dashmax.innerHTML = maxima;
                dashhoraria.innerHTML = carga;
            })
            .catch(error => {
                console.log('Ocorreu um erro ao carregar o arquivo JSON:', error);
            });
    }
</script>