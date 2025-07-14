<?php
include 'header.php';
include 'conexao.php';

// Recebe os dados do formulário via POST
$sigla = $_POST['sigla'];
$descricao = $_POST['descricao'];

try {
    $sql = 'INSERT INTO categoria (sigla, descricao) VALUES (:sigla, :descricao)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':sigla', $sigla);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->execute();

    echo '<div class="alert alert-success" role="alert">
            Categoria cadastrada com sucesso!
          </div>';

} catch (PDOException $e) {
    echo '<div class="alert alert-danger" role="alert">
            Erro ao cadastrar categoria: ' . $e->getMessage() . '
          </div>';
}

echo '<a href="listar_categoria.php" class="btn btn-primary">Voltar para a Listagem</a>';
include 'footer.php';
?>