<?php
// edit_categoria.php
require_once 'db.php';
require_once 'categoria.php';

$database = new Database();
$db = $database->getConnection();

$categoria = new Categoria($db);

if (isset($_GET['id'])) {
    $categoria->id = $_GET['id'];
    $stmt = $db->prepare("SELECT nome FROM categoria WHERE id = :id");
    $stmt->bindParam(':id', $categoria->id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $categoria->nome = $row['nome'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoria->nome = $_POST['nome'];
    
    if ($categoria->update()) {
        echo "<script>alert('Categoria atualizada com sucesso!'); window.location.href='list_categorias.php';</script>";
    } else {
        echo "Não foi possível atualizar a categoria.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoria</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Categoria</h2>
        <form action="edit_categoria.php?id=<?php echo htmlspecialchars($categoria->id); ?>" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo htmlspecialchars($categoria->nome); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
