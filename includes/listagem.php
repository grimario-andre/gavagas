<?php
    $resultados = '';

    foreach ($vagas as $vaga) {
     
        $resultados .= '
            <tr>
                <td>'. $vaga->id .'</td>
                <td>'. $vaga->titulo .'</td>
                <td>'. $vaga->descricao .'</td>
                <td>'. ($vaga->ativo == 's' ? ' Ativo ' : ' Inativo ') .'</td>
                <td>'. date('d/m/Y a\s H:i:s', strtotime($vaga->data) ) .'</td>
                <td>
                    <a href="editar.php?id='. $vaga->id .' ">
                        <button type="button" class="btn btn-primary">Editar</button>
                    </a>

                    <a href="excluir.php?id='. $vaga->id .' ">
                        <button type="button" class="btn btn-danger">Excluir</button>
                    </a>
                </td>    
            </tr>
        ';
    }

?>

<main>
    <!-- Sessao Cadastrar -->
    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">
                Nova Vaga
            </button>
        </a>
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
                <?=$resultados?>
            </tbody>
        </table>
    </section>
</main>