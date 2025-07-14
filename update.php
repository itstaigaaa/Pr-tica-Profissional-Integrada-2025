<?php
include 'header.php';
include 'conexao.php';

// Recebe os dados do formulário de edição via POST
$id_produto = $_POST['id_produto'];
$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];
$cod_barras = $_POST['cod_barras'];
$prateleira = $_POST['prateleira'];
$id_categoria = $_POST['id_categoria'];

try {
    $sql = 'UPDATE produto SET codigo = :codigo, 
                               descricao = :descricao, 
                               cod_barras = :cod_barras,
                               prateleira = :prateleira,
                               id_categoria = :id_categoria
            WHERE id_produto = :id_produto';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_produto', $id_produto);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':cod_barras', $cod_barras);
    $stmt->bindParam(':prateleira', $prateleira);
    $stmt->bindParam(':id_categoria', $id_categoria);
    $stmt->execute();

    echo '<div class="alert alert-success" role="alert">
            Produto alterado com sucesso!
          </div>';

} catch (PDOException $e) {
    echo '<div class="alert alert-danger" role="alert">
            Erro ao alterar produto: ' . $e->getMessage() . '
          </div>';
}

echo '<a href="listar.php" class="btn btn-primary">Voltar para a Listagem</a>';
include 'footer.php';
?>