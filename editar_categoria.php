<?php
include 'header.php';
include 'conexao.php';

// Pega o ID da categoria da URL (GET)
$id_categoria = $_GET['id_categoria'];

// Busca os dados da categoria a ser editada
$sql = "SELECT * FROM categoria WHERE id_categoria = :id_categoria";
$stm = $pdo->prepare($sql);
$stm->bindParam(':id_categoria', $id_categoria);
$stm->execute();
$categoria = $stm->fetch(PDO::FETCH_OBJ);
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Editar Categoria</h3>
            </div>
            <div class="card-body">
                <form method="post" action="update_categoria.php">
                    <input type="hidden" name="id_categoria" value="<?= $categoria->id_categoria ?>">
                    <div class="form-group row mb-3">
                        <label for="sigla" class="col-sm-3 col-form-label">Sigla</label>
                        <div class="col-sm-9">
                            <input id="sigla" name="sigla" type="text" class="form-control" required value="<?= htmlspecialchars($categoria->sigla) ?>">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="descricao" class="col-sm-3 col-form-label">Descrição</label>
                        <div class="col-sm-9">
                            <input id="descricao" name="descricao" type="text" class="form-control" required value="<?= htmlspecialchars($categoria->descricao) ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-9 offset-sm-3">
                            <button name="submit" type="submit" class="btn btn-primary">Salvar Alterações</button>
                            <a href="listar_categoria.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>