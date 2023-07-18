<?php
require_once("../../Login/php/db.php");

if (isset($_POST['curso_id'])) {
    $curso_id = $_POST['curso_id'];

    $sqlTurmas = "SELECT * FROM `turma` WHERE curso_idcurso = $curso_id";
    $respTurmas = $connection->query($sqlTurmas);

    $turmas = array();
    if (mysqli_num_rows($respTurmas) > 0) {
        while ($dataTurma = mysqli_fetch_assoc($respTurmas)) {
            $turmas[] = array('id' => $dataTurma['idturma'], 'nome' => $dataTurma['idturma']);
        }
    }

    echo json_encode($turmas);
}
?>