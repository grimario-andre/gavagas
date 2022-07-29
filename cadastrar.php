<?php 

require_once __DIR__.'/vendor/autoload.php';

//Validar Form Post cadastrar.

if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    die('cadastrar');
}

require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/formulario.php';
require_once __DIR__.'/includes/footer.php';