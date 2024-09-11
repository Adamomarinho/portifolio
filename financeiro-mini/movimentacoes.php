<?php
// list_movimentos.php
require_once 'db.php';
require_once 'movimento.php';
require_once 'categoria.php';

$database = new Database();
$db = $database->getConnection();

$movimento = new Movimento($db);
$categoria = new Categoria($db);
$categorias = $categoria->read();

$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : date('Y-m-01');
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : date('Y-m-t');

$movimentos = $movimento->read($start_date, $end_date);
$saldo = $movimento->calculateBalance($start_date, $end_date);

// Determinar a classe para o saldo com base no valor
$saldo_class = $saldo >= 0 ? 'text-success' : 'text-danger';

// Determinar a classe para a linha com base no tipo de movimentação
function getRowClass($tipo) 
{
    return $tipo == 'entrada' ? 'table-success' : 'table-danger';
}

// Calcular o saldo
$saldos = array_map(function($mov) 
{
    return $mov['tipo'] === 'entrada' ? $mov['valor'] : -$mov['valor'];
}, $movimentos);

$saldo_final = array_sum($saldos);

// Dados para o gráfico
$tipos = ['entrada' => 0, 'saida' => 0];
foreach ($movimentos as $mov) {
    $tipos[$mov['tipo']] += $mov['valor'];
}

$grafico_tipos = json_encode(array_keys($tipos));
$grafico_valores = json_encode(array_values($tipos));

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Movimentações</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .saldo {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .table-success {
            background-color: #d4edda !important;
        }
        .table-danger {
            background-color: #f8d7da !important;
        }
        .saldo-positivo {
            color: green;
            font-weight: bold;
        }
        .saldo-negativo {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
	<br>&nbsp;<a href="index.php" class="btn btn-success">Voltar</a><br>
        <h2 class="text-center">Lista de Movimentações</h2>
        
        <form action="list_movimentos.php" method="post" class="mb-3">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="start_date">Data Inicial:</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo htmlspecialchars($start_date); ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="end_date">Data Final:</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo htmlspecialchars($end_date); ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary mt-4">Pesquisar</button>
                </div>
            </div>
        </form>

        <h4>Saldo Final: <span class="<?php echo $saldo_final >= 0 ? 'saldo-positivo' : 'saldo-negativo'; ?>">
            <?php echo number_format($saldo_final, 2, ',', '.'); ?>
        </span></h4>

        <a href="generate_pdf.php?start_date=<?php echo urlencode($start_date); ?>&end_date=<?php echo urlencode($end_date); ?>" class="btn btn-danger mb-3">Exportar para PDF</a>
        <a href="generate_excel.php?start_date=<?php echo urlencode($start_date); ?>&end_date=<?php echo urlencode($end_date); ?>" class="btn btn-success mb-3">Exportar para Excel</a>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($movimentos as $row) : ?>
                <tr class="<?php echo getRowClass($row['tipo']); ?>">
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['tipo']); ?></td>
                    <td><?php echo htmlspecialchars($row['data']); ?></td>
                    <td><?php echo htmlspecialchars($row['categoria']); ?></td>
                    <td><?php echo htmlspecialchars($row['descricao']); ?></td>
                    <td><?php echo number_format($row['valor'], 2, ',', '.'); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <h3 class="mt-4">Gráfico de Movimentos</h3>
        <canvas id="movimentoChart" width="400" height="200"></canvas>
        <script>
            var ctx = document.getElementById('movimentoChart').getContext('2d');
            var movimentoChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo $grafico_tipos; ?>,
                    datasets: [{
                        label: 'Valor',
                        data: <?php echo $grafico_valores; ?>,
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.2)', // Cor para entrada
                            'rgba(255, 99, 132, 0.2)'  // Cor para saída
                        ],
                        borderColor: [
                            'rgba(75, 192, 192, 1)',  // Cor da borda para entrada
                            'rgba(255, 99, 132, 1)'   // Cor da borda para saída
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
