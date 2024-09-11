<?php
// delete_categoria.php
require_once 'db.php';
require_once 'categoria.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();
    
    $categoria = new Categoria($db);
    $categoria->id = $_GET['id'];
    
    if ($categoria->delete()) {
        echo "<script>alert('Categoria excluída com sucesso!'); window.location.href='list_categorias.php';</script>";
    } else {
        echo "Não foi possível excluir a categoria.";
    }
}
?>
