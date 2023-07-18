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
// JSON
try {
    include_once "../../Login/php/db.php";
    // Executar a consulta
    $sqlCurso = "SELECT * FROM semana";
    $result = $connection->query($sqlCurso);

    // Verificar se a consulta retornou algum resultado
    if ($result->num_rows > 0) {
        // Array para armazenar os dados
        $dados = array();

        // Processar os dados retornados
        while ($linha = $result->fetch_assoc()) {
            // Acessar os valores de cada coluna
            $campoID = $linha['idconteudos'];
            $campoSeg = $linha['segunda'];
            $campoTer = $linha['terca'];
            $campoQua = $linha['quarta'];
            $campoQui = $linha['quinta'];
            $campoSex = $linha['sexta'];

            // Adicionar cada linha como um item no array de dados
            $dados[] = array(
                'ID' => $campoID,
                'Segunda' => $campoSeg,
                'Terca' => $campoTer,
                'Quarta' => $campoQua,
                'Quinta' => $campoQui,
                'Sexta' => $campoSex
            );
        }

        // Converter o array em formato JSON com codificação Unicode correta
        $json = json_encode($dados, JSON_UNESCAPED_UNICODE);

        // Verificar se a conversão foi bem-sucedida
        if ($json === false) {
            die("Erro ao converter em JSON.");
        }

        // Escrever o JSON em um arquivo
        $arquivo = 'dados.json';
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
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Link CSS -->
    <link rel="stylesheet" href="../css/calendario.css">
    <!-- Link Font awesome -->
    <script src="https://kit.fontawesome.com/acc0f57857.js" crossorigin="anonymous"></script>
    <!-- Link Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário</title>
</head>
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
    <section class="principal">
        <header>
            <div class="botao_perfil">
                <ul class="retratil">
                    <li>
                        <input type="checkbox" name="botao" id="botao">
                        <label for="botao"><i class="fa-solid fa-user" style="color:white;"></i></label>
                        <div class="conteudo1">
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
            <div class="icone">
                <img src="../img/calendario.png" alt="Ícone de calendário">
            </div><!-- Icone -->

            <p id="titulo">Calendário</p>


            <div class="select-turma">
                <select name="turma" id="turma">
                    <option value="">Selecione a turma:</option>
                    <?php
                    try {
                        require_once("../../Login/php/db.php");
                        $sqlQtdTurma = "SELECT * FROM `turma`";
                        $respQtdTurma = $connection->query($sqlQtdTurma);

                        while ($dataQtdTurma = mysqli_fetch_assoc($respQtdTurma)) {
                            $idTurma = $dataQtdTurma['idturma'];
                            echo "<option value='$idTurma'>$idTurma</option>";
                        }

                    } catch (Exception $e) {
                        die();
                    }
                    ?>
                </select>
            </div><!-- select-turma -->

            </div>
            <div class="semana">
                <ul class="gaveta">
                    <li>
                        <input type="radio" name="btn-dia" id="dia1" class="btndia" value="1" onclick="verify()">
                        <input type="radio" name="btn-dia" id="dia2" class="btndia" value="2" onclick="verify()">
                        <input type="radio" name="btn-dia" id="dia3" class="btndia" value="3" onclick="verify()">
                        <input type="radio" name="btn-dia" id="dia4" class="btndia" value="4" onclick="verify()">
                        <input type="radio" name="btn-dia" id="dia5" class="btndia" value="5" onclick="verify()">
                        <div class="botoes">
                            <div class="botao1">
                                <label for="dia1" class="botaodia">
                                    <p>Seg</p>
                                    <b>01</b>
                                </label>
                            </div><!-- Botao 1 -->
                            <div class="botao2">
                                <label for="dia2" class="botaodia" id="botao2">
                                    <p>Ter</p>
                                    <b>02</b>
                                </label>
                            </div><!-- Botao 2 -->
                            <div class="botao3">
                                <label for="dia3" class="botaodia" id="botao3">
                                    <p>Qua</p>
                                    <b>03</b>
                                </label>
                            </div><!-- Botao 3 -->
                            <div class="botao4">
                                <label for="dia4" class="botaodia" id="botao4">
                                    <p>Qui</p>
                                    <b>04</b>
                                </label>
                            </div><!-- Botao 4 -->
                            <div class="botao5">
                                <label for="dia5" class="botaodia" id="botao5">
                                    <p>Sex</p>
                                    <b>05</b>
                                </label>
                            </div>
                        </div><!-- Botões -->
                        <div class="avisos">
                            <p>Programação do dia</p>
                            <i class="fa-solid fa-arrow-down" style="color: #ffffff;"></i>
                        </div>
                        <div class="espaco">
                            <div class="conteudo">
                                <p id='conteudododia'>

                                </p>
                            </div><!-- Conteudo -->
                        </div>
                    </li>
                </ul><!-- Gaveta -->
            </div>
        </main>
        <footer>
            <div class="home">
                <ul>
                    <li>
                        <a href="inicial.php"><i class="fa-sharp fa-solid fa-house" style="color: #ffffff;"></i></a>
                    </li>
                    <li id="editar">
                        <br>
                        <a href="calendario-form.php"><i class="fa-solid fa-pencil" style="color: #ffffff;"></i></i></a>
                    </li>
                </ul>
            </div><!-- Home -->
        </footer>
    </section><!-- Principal -->
</body>

<script>
    let data; // Variável para armazenar os dados do arquivo JSON

    fetch('dados.json')
        .then(response => response.json())
        .then(responseData => {
            data = responseData; // Atribuição dos dados à variável data
            const btnDia = document.querySelectorAll(".btndia");
            btnDia.forEach(btn => {
                btn.addEventListener('click', verify);
            });
        })
        .catch(error => {
            console.error('Erro:', error);
        });

    const turmaSelect = document.querySelector("#turma");
    turmaSelect.addEventListener('change', exibirValorTurma);

    function exibirValorTurma() {
        const valorturma = turmaSelect.value;
        verify(); // Chama a função verify para atualizar o conteúdo exibido
    }

    function verify() {
        // Obter todos os radio buttons
        const radioButtons = document.getElementsByName('btn-dia');

        // Interar sobre os radio buttons para encontrar o selecionado
        let valorSelecionado;
        for (let i = 0; i < radioButtons.length; i++) {
            if (radioButtons[i].checked) {
                valorSelecionado = radioButtons[i].value;
                break;
            }
        }

        let output = '';
        for (let i = 0; i < data.length; i++) {
            let item = data[i];
            
            // Verifica se o ID da turma é igual ao valor selecionado
            if (item.ID === turmaSelect.value) {
                switch (valorSelecionado) {
                    case '1':
                        output += "Conteúdo: " + item.Segunda;
                        break;
                    case '2':
                        output += "Conteúdo: " + item.Terca;
                        break;
                    case '3':
                        output += "Conteúdo: " + item.Quarta;
                        break;
                    case '4':
                        output += "Conteúdo: " + item.Quinta;
                        break;
                    case '5':
                        output += "Conteúdo: " + item.Sexta;
                        break;
                    default:
                        output = "Sem conteúdo definido";
                }
            }
        }

        const conteudododia = document.getElementById('conteudododia');
        conteudododia.innerHTML = output;
    }
</script>



</html>