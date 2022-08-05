<?php

require_once __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar Vaga');

use App\Entity\Vaga;

//Validacao ID 
if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$obVaga = Vaga::getVaga($_GET['id']);

echo '<pre>';
print_r($obVaga);
echo '</pre>';
exit;


//Validar Form Post

if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $obVaga->titulo    = $_POST['titulo'];
    $obVaga->descricao = $_POST['descricao'];
    $obVaga->ativo     = $_POST['ativo'];
    $obVaga->atualizar();

    //CABECALHO
    header('location: index.php?status=success');
    exit;
}



require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/formulario.php';
require_once __DIR__ . '/includes/footer.php';
