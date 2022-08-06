<main>
    <h2 class="mt-3">Excluir Vaga</h2>

    <!-- Inicio Form -->
    <form action="" method="post">
        <!-- Paragrafo -->
        <div class="form-group mt-2">
            <p>Tem certeza que vai excluir a vaga <strong><?= $obVaga->titulo ?></strong> ?</p>
        </div>

        <!-- Botao Submit -->
        <div class="form-group mt-3">
            <a href="index.php">
                <button class="btn btn-warning" type="submit" >Voltar</button>
            </a>

            <button class="btn btn-danger" type="submit" name="excluir">Excluir</button>
        </div>
    </form>
</main>