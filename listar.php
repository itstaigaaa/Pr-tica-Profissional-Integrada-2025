<?php
include 'header.php';
include 'conexao.php';

// 1. Define as colunas permitidas para ordenação (Segurança contra SQL Injection)
$colunas_permitidas = ['id_produto', 'descricao', 'nome_categoria'];

// define a coluna e a direção padrão
$sort_coluna = 'descricao';
$sort_direcao = 'asc';

// verifica se os parâmetros foram enviados e se são válidos
if (isset($_GET['sort']) && in_array($_GET['sort'], $colunas_permitidas)) {
    $sort_coluna = $_GET['sort'];
}

if (isset($_GET['dir']) && in_array($_GET['dir'], ['asc', 'desc'])) {
    $sort_direcao = $_GET['dir'];
}

// inverter a direção na próxima vez que clicar no mesmo link
$proxima_direcao = ($sort_direcao == 'asc') ? 'desc' : 'asc';

// --- FIM DA LÓGICA DE ORDENAÇÃO ---

?>

<div class="card">
<div class="card-header">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Gerenciar Produtos</h3>
        
        <div class="d-flex align-items-center">
            <div class="dropdown me-2">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Ordenar por: <?= ucwords(str_replace('_', ' ', $sort_coluna)) ?>
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="?sort=id_produto&dir=asc">ID</a></li>
                    <li><a class="dropdown-item" href="?sort=descricao&dir=asc">Descrição</a></li>
                    <li><a class="dropdown-item" href="?sort=nome_categoria&dir=asc">Categoria</a></li>
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

            <a href="formulario.php" class="btn btn-primary ms-3">
                <i class="fa fa-plus"></i> Novo Produto
            </a>
        </div>
    </div>
</div>
    <div class="card-body">
        <table class="table table-striped table-hover table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th width="200px">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT p.id_produto, p.codigo, p.descricao, c.descricao AS nome_categoria 
                FROM produto p 
                INNER JOIN categoria c ON p.id_categoria = c.id_categoria"; // Remova o ORDER BY daqui

                $sql .= " ORDER BY $sort_coluna $sort_direcao"; // O "ponto e igual" ( .= ) adiciona ao final da string            
                
                $stm = $pdo->prepare($sql);
                $stm->execute();
                $dados = $stm->fetchAll(PDO::FETCH_OBJ);

                foreach ($dados as $produto) :
                ?>
                    <tr>
                        <td><?= htmlspecialchars($produto->id_produto) ?></td>
                        <td><?= htmlspecialchars($produto->codigo) ?></td>
                        <td><?= htmlspecialchars($produto->descricao) ?></td>
                        <td><?= htmlspecialchars($produto->nome_categoria) ?></td>
                        <td>
                            <a href="editar.php?id_produto=<?= $produto->id_produto ?>" class="btn btn-sm btn-warning me-2">
                                <i class="fa fa-pencil"></i> Editar
                            </a>
                            <a href="excluir.php?id_produto=<?= $produto->id_produto ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir?');">
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