<?php
require_once("../../Login/php/db.php");

if (isset($_POST['curso_id'])) {
    $curso_id = $_POST['curso_id'];
    
    $sqlUnidades = "SELECT * FROM `unidade` WHERE curso_idcurso = $curso_id";
    $respUnidade = $connection->query($sqlUnidades);

    $unidades = array();
    if (mysqli_num_rows($respUnidade) > 0) {
        while ($dataUnidade = mysqli_fetch_assoc($respUnidade)) {
            $unidades[] = array('id' => $dataUnidade['idunidade'], 'nome' => "Unidade ".$dataUnidade['idunidade']);
        }
    }

    echo json_encode($unidades);
}
?>