<?php

require_once __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Vaga');

use App\Entity\Vaga;

//Validar Form 

if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $obVaga = new Vaga;
    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo     = $_POST['ativo'];
    $obVaga->cadastrar();

    //CABECALHO
    header('location: index.php?status=success');
    exit;
}

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/formulario1.php';
require_once __DIR__ . '/includes/footer.php';
