<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StoQ - Sistema de Estoque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background-color: #f0f2f5; 
        }
        .container-central {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start; 
            align-items: center;
            padding-top: 32vh; 
        }
    </style>
</head>
<body>
    <div class="container-central text-center">
        <h1 class="display-1 fw-bold mb-2">StoQ</h1>
        <h3 class="display-5 mb-5">Seja Bem-vindo!</h3>

        <div class="mt-5">
            <a href="listar.php" class="btn btn-primary btn-lg px-5 py-3 me-3">
                Gerenciar Produtos
            </a>
            <a href="listar_categoria.php" class="btn btn-secondary btn-lg px-5 py-3">
                Gerenciar Categorias
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>