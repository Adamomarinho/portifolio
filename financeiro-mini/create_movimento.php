<?php
// create_movimento.php
require_once 'db.php';
require_once 'Movimento.php';
require_once 'Categoria.php';

$database = new Database();
$db = $database->getConnection();

$categoria = new Categoria($db);
$categorias = $categoria->read();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $movimento = new Movimento($db);
    $movimento->tipo = $_POST['tipo'];
    $movimento->data = $_POST['data'];
    $movimento->categoria = $_POST['categoria'];
    $movimento->descricao = $_POST['descricao'];
    $movimento->valor = $_POST['valor'];
    
    if ($movimento->create()) {
        echo "<script>alert('Movimentação criada com sucesso!'); window.location.href='list_movimentos.php';</script>";
    } else {
        echo "Não foi possível criar a movimentação.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Movimentação</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Criar Movimentação</h2>
        <form action="create_movimento.php" method="post">
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <select class="form-control" aria-label="Tipo de Movimentação" id="tipo" name="tipo" required>
                    <option selected>Tipo de Movimentação</option>
                    <option value="entrada">Entrada de dinheiro</option>
                    <option value="saida">Saida de dinheiro</option>
                </select>
            </div>
            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <select class="form-control" id="categoria" name="categoria" required>
                    <option value="">Selecione</option>
                    <?php foreach ($categorias as $cat) : ?>
                    <option value="<?php echo htmlspecialchars($cat['id']); ?>"><?php echo htmlspecialchars($cat['nome']); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea class="form-control" id="descricao" name="descricao"></textarea>
            </div>
            <div class="form-group">
                <label for="valor">Valor:</label>
                <input type="number" step="0.01" class="form-control" id="valor" name="valor" required>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
