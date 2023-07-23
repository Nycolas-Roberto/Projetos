<?php
require_once("../../Login/php/db.php");

if (isset($_POST['curso_id'])) {
    $curso_id = $_POST['curso_id'];

    // Consulta SQL para buscar os alunos da turma selecionada
    $sqlAlunos = "SELECT * FROM aluno WHERE curso_idcurso = $curso_id";
    $resultAlunos = $connection->query($sqlAlunos);

    $alunos = array();
    if ($resultAlunos->num_rows > 0) {
        while ($rowAluno = $resultAlunos->fetch_assoc()) {
            $alunos[] = array('id' => $rowAluno['idaluno'], 'nome' => $rowAluno['nomeAluno']);
        }
    }

    echo json_encode($alunos);
}
?>
