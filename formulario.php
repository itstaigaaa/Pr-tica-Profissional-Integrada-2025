<?php
include 'header.php';
include 'conexao.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Cadastro de Produto</h3>
            </div>
            <div class="card-body">
                <form method="post" action="salvar_produto.php">
                    <div class="form-group row mb-3">
                        <label for="codigo" class="col-sm-3 col-form-label">Código</label>
                        <div class="col-sm-9">
                            <input id="codigo" name="codigo" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="descricao" class="col-sm-3 col-form-label">Descrição</label>
                        <div class="col-sm-9">
                            <input id="descricao" name="descricao" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="cod_barras" class="col-sm-3 col-form-label">Cód. Barras</label>
                        <div class="col-sm-9">
                            <input id="cod_barras" name="cod_barras" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="prateleira" class="col-sm-3 col-form-label">Prateleira</label>
                        <div class="col-sm-9">
                            <input id="prateleira" name="prateleira" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="id_categoria" class="col-sm-3 col-form-label">Categoria</label>
                        <div class="col-sm-9">
                            <select id="id_categoria" name="id_categoria" class="form-select" required>
                                <option value="">Selecione uma categoria</option>
                                <?php
                                $sql = "SELECT * FROM categoria ORDER BY descricao ASC";
                                $stm = $pdo->prepare($sql);
                                $stm->execute();
                                $categorias = $stm->fetchAll(PDO::FETCH_OBJ);
                                foreach ($categorias as $categoria) {
                                    echo '<option value="' . $categoria->id_categoria . '">' . htmlspecialchars($categoria->descricao) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button name="submit" type="submit" class="btn btn-primary">Salvar Produto</button>
                            <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>