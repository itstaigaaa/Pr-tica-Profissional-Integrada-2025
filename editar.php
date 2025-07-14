<?php
include 'header.php';
include 'conexao.php';

// Pega o ID do produto da URL (GET)
$id_produto = $_GET['id_produto'];

// Busca os dados do produto a ser editado
$sql_produto = "SELECT * FROM produto WHERE id_produto = :id_produto";
$stm_produto = $pdo->prepare($sql_produto);
$stm_produto->bindParam(':id_produto', $id_produto);
$stm_produto->execute();
$produto = $stm_produto->fetch(PDO::FETCH_OBJ);

// Busca todas as categorias para preencher o select
$sql_categorias = "SELECT * FROM categoria ORDER BY descricao ASC";
$stm_categorias = $pdo->prepare($sql_categorias);
$stm_categorias->execute();
$categorias = $stm_categorias->fetchAll(PDO::FETCH_OBJ);
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Editar Produto</h3>
            </div>
            <div class="card-body">
                <form method="post" action="update.php">
                    <input type="hidden" name="id_produto" value="<?= $produto->id_produto ?>">

                    <div class="form-group row mb-3">
                        <label for="codigo" class="col-sm-3 col-form-label">Código</label>
                        <div class="col-sm-9">
                            <input id="codigo" name="codigo" type="text" class="form-control" value="<?= htmlspecialchars($produto->codigo) ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="descricao" class="col-sm-3 col-form-label">Descrição</label>
                        <div class="col-sm-9">
                            <input id="descricao" name="descricao" type="text" class="form-control" required value="<?= htmlspecialchars($produto->descricao) ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="cod_barras" class="col-sm-3 col-form-label">Cód. Barras</label>
                        <div class="col-sm-9">
                            <input id="cod_barras" name="cod_barras" type="text" class="form-control" value="<?= htmlspecialchars($produto->cod_barras) ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="prateleira" class="col-sm-3 col-form-label">Prateleira</label>
                        <div class="col-sm-9">
                            <input id="prateleira" name="prateleira" type="text" class="form-control" value="<?= htmlspecialchars($produto->prateleira) ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="id_categoria" class="col-sm-3 col-form-label">Categoria</label>
                        <div class="col-sm-9">
                            <select id="id_categoria" name="id_categoria" class="form-select" required>
                                <option value="">Selecione uma categoria</option>
                                <?php
                                foreach ($categorias as $categoria) {
                                    $selected = ($produto->id_categoria == $categoria->id_categoria) ? 'selected' : '';
                                    echo '<option value="' . $categoria->id_categoria . '" ' . $selected . '>' . htmlspecialchars($categoria->descricao) . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button name="submit" type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <a href="listar.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>