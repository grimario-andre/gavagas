<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Entity\Vaga;

//Validacao ID 
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//CONSULTA VAGA
$obVaga = Vaga::getVaga($_GET['id']);

//Validacao vaga
if (!$obVaga instanceof Vaga) {
    header('location: index.php?status=error');
    exit;
}

//Validar Form Post

if (isset($_POST['excluir'])) {

    $obVaga->excluir();
    //CABECALHO
    header('location: index.php?status=success');
    exit;
}



require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/confirmarexclusao.php';
require_once __DIR__ . '/includes/footer.php';
