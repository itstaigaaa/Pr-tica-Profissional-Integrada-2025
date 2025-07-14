<?php
include 'header.php';
include 'conexao.php'; 

if (isset($_GET['id_categoria'])) {
    $id_categoria = $_GET['id_categoria'];

    try {
        // Verifica se existem produtos usando esta categoria
        $sql_check = "SELECT COUNT(*) FROM produto WHERE id_categoria = :id_categoria";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        $stmt_check->execute();
        $product_count = $stmt_check->fetchColumn();

        // Se a contagem for maior que 0, exibe erro e não exclui
        if ($product_count > 0) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<strong>Erro!</strong> Não é possível excluir esta categoria, pois <strong>' . htmlspecialchars($product_count) . ' produto(s)</strong> estão associados a ela.';
            echo '</div>';
        } else {
            // Se a contagem for 0, prossegue com a exclusão
            $sql_delete = "DELETE FROM categoria WHERE id_categoria = :id_categoria";
            $stmt_delete = $pdo->prepare($sql_delete);
            $stmt_delete->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
            $stmt_delete->execute();

            echo '<div class="alert alert-success" role="alert">';
            echo 'Categoria excluída com sucesso!';
            echo '</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">';
        echo 'Erro ao processar a solicitação: ' . $e->getMessage();
        echo '</div>';
    }
} else {
    echo '<div class="alert alert-warning" role="alert">';
    echo 'Nenhuma categoria selecionada para exclusão.';
    echo '</div>';
}

echo '<a href="listar_categoria.php" class="btn btn-primary">Voltar para a Listagem</a>';
include 'footer.php';
?>