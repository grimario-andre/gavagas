<main>

    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3">Cadastrar vaga</h2>

    <!-- Inicio Form -->
    <form action="" method="post">
        <!-- Titulo -->
        <div class="form-group">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" placeholder="Ex: Desenvolvedor Jr. PHP" class="form-control" name="titulo" id="titulo">
        </div>

        <!-- Descrição -->
        <div class="form-group">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" placeholder="Ex: Desenvolvedor Jr. PHP" name="descricao" id="descricao" cols="30" rows="10"></textarea>
        </div>

        <!-- Status  -->
        <div class="form-group">
            <label class="form-label">Status</label>
            
            <div>
                <!-- Ativo -->
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="s"> Ativo
                    </label>
                </div>

                <!-- Inativo -->
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="inativo" value="n"> Inativo
                    </label>
                </div>
            </div>
        </div>

        <!-- Botao Submit -->
        <div class="form-group mt-3">
            <button class="btn btn-success" type="submit">Enviar</button>
        </div>
    </form>
</main>