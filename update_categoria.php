<?php
include 'header.php';
include 'conexao.php';

// Recebe os dados do formulário de edição via POST
$id_categoria = $_POST['id_categoria'];
$sigla = $_POST['sigla'];
$descricao = $_POST['descricao'];

try {
    $sql = 'UPDATE categoria SET sigla = :sigla, 
                                 descricao = :descricao
            WHERE id_categoria = :id_categoria';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_categoria', $id_categoria);
    $stmt->bindParam(':sigla', $sigla);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->execute();

    echo '<div class="alert alert-success" role="alert">
            Categoria alterada com sucesso!
          </div>';

} catch (PDOException $e) {
    echo '<div class="alert alert-danger" role="alert">
            Erro ao alterar categoria: ' . $e->getMessage() . '
          </div>';
}

echo '<a href="listar_categoria.php" class="btn btn-primary">Voltar para a Listagem</a>';
include 'footer.php';
?>