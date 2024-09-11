<?php
// relatorio.php
require_once 'db.php';
require_once 'movimento.php';

$database = new Database();
$db = $database->getConnection();

$movimento = new Movimento($db);

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    $movimentos = $movimento->read($start_date, $end_date);
    $saldo = $movimento->calculateBalance($start_date, $end_date);

    echo "<h4>Saldo: " . number_format($saldo, 2, ',', '.') . "</h4>";

    echo "<table class='table table-bordered mt-3'>
            <thead>
                <tr>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>";

    foreach ($movimentos as $row) {
        echo "<tr>
                <td>{$row['tipo']}</td>
                <td>{$row['data']}</td>
                <td>{$row['categoria']}</td>
                <td>{$row['descricao']}</td>
                <td>" . number_format($row['valor'], 2, ',', '.') . "</td>
            </tr>";
    }

    echo "</tbody>
        </table>";
}
