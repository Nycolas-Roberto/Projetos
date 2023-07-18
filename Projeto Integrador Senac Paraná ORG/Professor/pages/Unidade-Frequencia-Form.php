<?php
try {
    session_start();
    if (!(isset($_SESSION['loginProf'])) && !(isset($_SESSION['senhaProf']))) {
        header("Location: ../../Login/pages/seletor.php");
    } else {
        echo "";
    }
} catch (Exception $e) {
    die();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/Unidade-Frequencia-Form.css">
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteudo e Frequência Form</title>
</head>

<body>


    <?php
    try {
        require_once("../../Login/php/db.php");
        $sqlAluno01 = "SELECT * FROM professor WHERE emailProf = '$_SESSION[loginProf]';";
        $respAluno01 = $connection->query($sqlAluno01);
        if (mysqli_num_rows($respAluno01) > 0) {
            while ($dataAluno01 = mysqli_fetch_assoc($respAluno01)) {
                $nomeDoProf = $dataAluno01['nomeProf'];
                $idCursoProf = $dataAluno01['idprofessor'];
            }
        } else {
            header("Location: ../../Login/pages/seletor.php");
        }
    } catch (Exception $e) {
        die();
    }
    ?>

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
                                        <?php echo "<p>$nomeDoProf</p>" ?>
                                    </li>
                                    <li>
                                        <?php echo "<p>$idCursoProf</p>" ?>
                                    </li>
                                    <li>
                                        <p>
                                            <a id="sair" href="../../Login/php/logout.php?sair=1"><i
                                                    class="fa-solid fa-right-from-bracket"
                                                    style="color: #ffffff;"></i></a>
                                        </p>
                                    </li>
                                </ul>
                            </div><!-- Conteudo -->
                        </li>
                    </ul><!-- Retratil -->
                </div><!-- Botão Perfil -->
            </header>
            <main>
                <div class="title">
                    <h1>Conteúdo e Frequência</h1>
                </div><!-- Title -->
                <form action="" id="myform" method="POST">
                    <div class="select-curso">
                        <select name="curso" id="curso">
                            <option value="">Selecione o curso:</option>
                            <option value="1">Técnico em Informática</option>
                            <option value="2">Técnico em Administração</option>
                            <option value="3">Técnico em Óptica</option>
                        </select>
                    </div><!-- select-curso -->


                    <div class="select-unidade">
                        <select name="unidade" id="unidade">
                            <option value="un-01" active>Selecione a unidade</option>
                        </select>
                    </div><!-- select-unidade -->



                    <div class="select-aluno">
                        <select name="aluno" id="aluno">
                            <option value="" active>Selecione o aluno:</option>
                        </select>
                    </div>



                    <div class="faltas">
                        <input type="number" name="inp_faltas" id="inp_faltas" placeholder="Faltas do aluno" min="0">
                    </div><!-- Inserir as faltas -->
                    <div class="txt">
                        <textarea name="msg" id="msg" cols="30" rows="9"
                            placeholder="Comentários sobre o aluno nessa unidade" maxlength="259"></textarea>
                        <span></span>
                    </div><!-- Text Area -->
                    <footer>
                        <div id="home">
                            <button type="submit" name='editar_faltas_aluno'><i class="fa-solid fa-check"
                                    style="color: #ffffff;"> Pronto</i></button>
                        </div><!-- Home -->
                        <div id="home">
                            <ul>
                                <li>
                                    <a href="inicial.php"><i class="fa-sharp fa-solid fa-house"
                                            style="color: #ffffff;"></i></a>
                                </li>
                            </ul>
                        </div><!-- Home -->
                    </footer>
                </form>

            </main>


            <?php
            try {
                if (isset($_POST['editar_faltas_aluno'])) {
                    require_once("../../Login/php/db.php");
                    $cursoSelecionado = $_POST['curso'];
                    $unidadeSelecionada = $_POST['unidade'];
                    $faltasAluno = $_POST['inp_faltas'];
                    $comentarioProf = $_POST['msg'];
                    $alunoSelecionado = $_POST['aluno'];

                    $sqlEditarAlunoUni = "UPDATE `aluno_has_unidade` SET `alunoFaltas`=$faltasAluno,`comentarioProf`='$comentarioProf' WHERE aluno_idaluno = $alunoSelecionado AND unidade_idunidade = $unidadeSelecionada";
                    $respEditarAlunoUni = $connection->query($sqlEditarAlunoUni);
                }
            } catch (Exception $e) {
                die();
            }
            ?>
            <!-- Link bootstrap -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
                crossorigin="anonymous"></script>
        </section>
        <!-- Link Script -->
        <script src="../js/val-conteudo.js"></script>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cursoSelect = document.getElementById('curso');
        const unidadeSelect = document.getElementById('unidade');

        // Função para atualizar as unidades com base no curso selecionado
        function updateUnidades(cursoId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/get_unidades.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const unidades = JSON.parse(xhr.responseText);
                    unidadeSelect.innerHTML = ''; // Limpa as opções existentes

                    // Adiciona as opções das unidades retornadas
                    unidades.forEach(function (unidade) {
                        const option = document.createElement('option');
                        option.value = unidade.id;
                        option.textContent = unidade.nome;
                        unidadeSelect.appendChild(option);
                    });
                }
            };
            xhr.send('curso_id=' + cursoId);
        }

        // Evento de mudança no curso selecionado
        cursoSelect.addEventListener('change', function () {
            const cursoId = cursoSelect.value;
            updateUnidades(cursoId);
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cursoSelect = document.getElementById('curso');
        const turmaSelect = document.getElementById('turma');

        // Função para atualizar as turmas com base no curso selecionado
        function updateTurmas(cursoId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/get_turmas.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const turmas = JSON.parse(xhr.responseText);
                    turmaSelect.innerHTML = ''; // Limpa as opções existentes

                    // Adiciona as opções das turmas retornadas
                    turmas.forEach(function (turma) {
                        const option = document.createElement('option');
                        option.value = turma.id;
                        option.textContent = turma.nome;
                        turmaSelect.appendChild(option);
                    });
                }
            };
            xhr.send('curso_id=' + cursoId);
        }

        // Evento de mudança no curso selecionado
        cursoSelect.addEventListener('change', function () {
            const cursoId = cursoSelect.value;
            updateTurmas(cursoId);
        });
    });
</script>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cursoSelect = document.getElementById('curso');
        const alunoSelect = document.getElementById('aluno');

        // Função para atualizar as turmas com base no curso selecionado
        function updateAlunos(cursoId) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../php/get_alunos.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const alunos = JSON.parse(xhr.responseText);
                    alunoSelect.innerHTML = ''; // Limpa as opções existentes

                    // Adiciona as opções das turmas retornadas
                    alunos.forEach(function (aluno) {
                        const option = document.createElement('option');
                        option.value = aluno.id;
                        option.textContent = aluno.nome;
                        alunoSelect.appendChild(option);
                    });
                }
            };
            xhr.send('curso_id=' + cursoId);
        }

        // Evento de mudança no curso selecionado
        cursoSelect.addEventListener('change', function () {
            const cursoId = cursoSelect.value;
            updateAlunos(cursoId);
        });
    });
</script>


</body>