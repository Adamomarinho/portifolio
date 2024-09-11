<?php
// list_categorias.php
require_once 'db.php';
require_once 'categoria.php';

$database = new Database();
$db = $database->getConnection();

$categoria = new Categoria($db);
$categories = $categoria->read();

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Categorias</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Lista de Categorias</h2>
        <a href="create_categoria.php" class="btn btn-primary mb-3">Criar Nova Categoria</a>&nbsp;&nbsp;
	<a href="index.php" class="btn btn-success mb-3">Voltar</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $row) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td>
                        <a href="edit_categoria.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete_categoria.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta categoria?');">Excluir</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
