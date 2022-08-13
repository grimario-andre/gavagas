<?php
//MENSAGEM DE CABECALHO
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'error':
            $mensagem = '<div class="alert alert-danger">Acao nao Executada!</div>';
            break;

        default:
            $mensagem = '<div class="alert alert-success">Acao Executada!</div>';
            break;
    }
}

//EXIBIR LISTA VAGAS
$resultados = '';

foreach ($vagas as $vaga) {

    $resultados .= '
            <tr>
                <td>' . $vaga->id . '</td>
                <td>' . $vaga->titulo . '</td>
                <td>' . $vaga->descricao . '</td>
                <td>' . ($vaga->ativo == 's' ? ' Ativo ' : ' Inativo ') . '</td>
                <td>' . date('d/m/Y a\s H:i:s', strtotime($vaga->data)) . '</td>
                <td>
                    <a href="editar.php?id=' . $vaga->id . ' ">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>

                    <a href="excluir.php?id=' . $vaga->id . ' ">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                </td>    
            </tr>
        ';
}

$resultados = strlen($resultados) ? $resultados : '
    <tr> 
        <td colspan="6" class="text-center"><p><strong>Nenhuma Vaga Encontrada</strong></p></td>
    </tr>    ';

?>

<main>
    <!-- Exibir msn Cabecalho -->
    <?= $mensagem ?>

    <!-- Sessao Cadastrar -->
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">
                Nova Vaga
            </button>
        </a>
    </section>

    <!-- Busca -->
    <section class="">
        <form method="get" class="">
            <!-- GRID -->
            <div class="row my-4">
                <div class="col">
                    <label for="busca">
                        Buscar por Titulo
                    </label>
                    <input class="form-control" type="text" name="busca" id="busca" value="<?= $busca ?>">
                </div>

                <! -- Buscar Opcoes -->
                <div class="col">
                    <label>Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Ativa/Inativa</option>
                        <option value="s" <?=$filtroStatus == 's' ? 'selected' : '' ?> >Ativa</option>
                        <option value="n" <?=$filtroStatus == 'n' ? 'selected' : '' ?> >Inativa</option>
                    </select>
                </div>

                <div class="col d-flex align-items-end">
                    <button class="btn btn-primary" type="submit">Filtrar</button>
                </div>
            </div>
        </form>
    </section>

    <!-- Tabela Vagas -->
    <section>
        <!-- HEAD -->
        <table class="table bg-light mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITULO</th>
                    <th>DESCRICAO</th>
                    <th>STATUS</th>
                    <th>DATA</th>
                    <th>ACOES</th>
                </tr>
            </thead>
            <!-- BODY -->
            <tbody>
                <?= $resultados ?>
            </tbody>
        </table>
    </section>
</main>