<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Cadastro de Categoria</h3>
            </div>
            <div class="card-body">
                <form method="post" action="salvar_categoria.php">
                    <div class="form-group row mb-3">
                        <label for="sigla" class="col-sm-3 col-form-label">Sigla</label>
                        <div class="col-sm-9">
                            <input id="sigla" name="sigla" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="descricao" class="col-sm-3 col-form-label">Descrição</label>
                        <div class="col-sm-9">
                            <input id="descricao" name="descricao" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button name="submit" type="submit" class="btn btn-primary">Salvar Categoria</button>
                            <a href="listar_categoria.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>