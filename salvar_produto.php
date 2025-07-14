<?php
include 'header.php';
include 'conexao.php';

// Recebe os dados do formulário via POST
$codigo = $_POST['codigo'];
$descricao = $_POST['descricao'];
$cod_barras = $_POST['cod_barras'];
$prateleira = $_POST['prateleira'];
$id_categoria = $_POST['id_categoria'];

try {
    $sql = 'INSERT INTO produto (codigo, descricao, cod_barras,prateleira,id_categoria) 
            VALUES (:codigo, :descricao, :cod_barras,:prateleira,:id_categoria)';

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':codigo', $codigo);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':cod_barras', $cod_barras);
    $stmt->bindParam(':prateleira', $prateleira);
    $stmt->bindParam(':id_categoria', $id_categoria);
    $stmt->execute();

    echo '<div class="alert alert-success" role="alert">
            Produto cadastrado com sucesso!
          </div>';

} catch (PDOException $e) {
    echo '<div class="alert alert-danger" role="alert">
            Erro ao cadastrar produto: ' . $e->getMessage() . '
          </div>';
}

echo '<a href="listar.php" class="btn btn-primary">Voltar para a Listagem</a>';
include 'footer.php';
?>