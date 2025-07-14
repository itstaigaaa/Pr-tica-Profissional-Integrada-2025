<?php
include 'header.php';
include 'conexao.php';

// Pega o ID da URL via GET
if (isset($_GET['id_produto'])) {
    $id_produto = $_GET['id_produto'];

    try {
        $sql = "DELETE FROM produto WHERE id_produto = :id_produto";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);
        $stmt->execute();

        echo '<div class="alert alert-success" role="alert">
                Produto excluído com sucesso!
              </div>';

    } catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">
                Erro ao excluir produto: ' . $e->getMessage() . '
              </div>';
    }
} else {
    echo '<div class="alert alert-warning" role="alert">
            Nenhum produto selecionado para exclusão.
          </div>';
}

echo '<a href="listar.php" class="btn btn-primary">Voltar para a Listagem</a>';
include 'footer.php';
?>