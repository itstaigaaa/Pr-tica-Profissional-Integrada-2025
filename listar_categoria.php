<?php
include 'header.php';
include 'conexao.php';

// definição das colunas permitidas para esta tabela
$colunas_permitidas = ['id_categoria', 'sigla', 'descricao'];

// definição da coluna e a direção padrão
$sort_coluna = 'descricao';
$sort_direcao = 'asc';

// verificação dos parâmetros, se foram enviados e se são válidos
if (isset($_GET['sort']) && in_array($_GET['sort'], $colunas_permitidas)) {
    $sort_coluna = $_GET['sort'];
}

if (isset($_GET['dir']) && in_array($_GET['dir'], ['asc', 'desc'])) {
    $sort_direcao = $_GET['dir'];
}

// lógica para inverter a direção no próximo clique
$proxima_direcao = ($sort_direcao == 'asc') ? 'desc' : 'asc';

?>

<div class="card">
<div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Gerenciar Categorias</h3>
        
        <div class="d-flex align-items-center">
            <div class="dropdown me-2">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ordenar por: <?= ucwords(str_replace('_', ' ', $sort_coluna)) ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?sort=id_categoria&dir=asc">ID</a></li>
                    <li><a class="dropdown-item" href="?sort=sigla&dir=asc">Sigla</a></li>
                    <li><a class="dropdown-item" href="?sort=descricao&dir=asc">Descrição</a></li>
                </ul>
            </div>

            <div class="btn-group" role="group">
                <a href="?sort=<?= $sort_coluna ?>&dir=asc" class="btn btn-outline-secondary <?= ($sort_direcao == 'asc') ? 'active' : '' ?>">
                    <i class="fa fa-arrow-up"></i> ASC
                </a>
                <a href="?sort=<?= $sort_coluna ?>&dir=desc" class="btn btn-outline-secondary <?= ($sort_direcao == 'desc') ? 'active' : '' ?>">
                    <i class="fa fa-arrow-down"></i> DESC
                </a>
            </div>

            <a href="formulario_categoria.php" class="btn btn-primary ms-3">
                <i class="fa fa-plus"></i> Nova Categoria
            </a>
        </div>
    </div>
</div>  
    <div class="card-body">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Sigla</th>
                    <th>Descrição</th>
                    <th width="200px">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM categoria";
                $sql .= " ORDER BY $sort_coluna $sort_direcao";
                $stm = $pdo->prepare($sql);
                $stm->execute();
                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                foreach ($dados as $categoria) :
                ?>
                    <tr>
                        <td><?= htmlspecialchars($categoria->id_categoria) ?></td>
                        <td><?= htmlspecialchars($categoria->sigla) ?></td>
                        <td><?= htmlspecialchars($categoria->descricao) ?></td>
                        <td>
                            <a href="editar_categoria.php?id_categoria=<?= $categoria->id_categoria ?>" class="btn btn-sm btn-warning me-2">
                                <i class="fa fa-pencil"></i> Editar
                            </a>
                            <a href="excluir_categoria.php?id_categoria=<?= $categoria->id_categoria ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este item?');">
                                <i class="fa fa-trash"></i> Excluir
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'footer.php';
?>