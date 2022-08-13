<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Entity\Vaga;

//BUSCA
$busca = filter_input(INPUT_GET, 'busca', FILTER_SANITIZE_STRING);

//FILTRO STATUS
$filtroStatus = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$filtroStatus = in_array($filtroStatus,['s','n']) ? $filtroStatus : '';

//CODICOES SQL
$condicoes = [
    strlen($busca) ? 'titulo LIKE "%'. str_replace('','%', $busca) .'%"' : null,
    strlen($filtroStatus) ? 'ativo = "'. $filtroStatus .'"' : null
];

//REMOVE POSICOES VAZIAS
$condicoes = array_filter($condicoes);

//CLAUSULA WHERE
$where = implode(' AND ', $condicoes);

$vagas = Vaga::getVagas($where);

require_once __DIR__.'/includes/header.php';
require_once __DIR__.'/includes/listagem.php';
require_once __DIR__.'/includes/footer.php';


