<?php
require 'vendor/autoload.php';
require 'servicocnpj.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$cnpjData = null;
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cnpj'])) {
    $cnpjService = new CONSULTACNPJ();
    $cnpjData = $cnpjService->getCNPJData($_POST['cnpj']);
    
    // Verificar se a consulta foi bem-sucedida
    if (isset($cnpjData['status']) && $cnpjData['status'] === 'ERROR') {
        $errorMessage = $cnpjData['message'];
        $cnpjData = null; // Limpa os dados se houve erro
    }

    // Exportar para Excel
    if (isset($_POST['export'])) {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        
        // Cabeçalhos
        $sheet->setCellValue('A1', 'Razão Social');
        $sheet->setCellValue('B1', 'Nome Fantasia');
        $sheet->setCellValue('C1', 'CNPJ');
        $sheet->setCellValue('D1', 'Endereço');
        $sheet->setCellValue('E1', 'Número');
        $sheet->setCellValue('F1', 'Bairro');
        $sheet->setCellValue('G1', 'Cidade');
        $sheet->setCellValue('H1', 'Estado');
        $sheet->setCellValue('I1', 'Situação');

        // Dados
        if ($cnpjData) {
            $sheet->setCellValue('A2', $cnpjData['razao_social'] ?? 'N/A');
            $sheet->setCellValue('B2', $cnpjData['fantasia'] ?? 'N/A');
            $sheet->setCellValue('C2', $cnpjData['cnpj'] ?? 'N/A');
            $sheet->setCellValue('D2', $cnpjData['logradouro'] ?? 'N/A');
            $sheet->setCellValue('E2', $cnpjData['numero'] ?? 'N/A');
            $sheet->setCellValue('F2', $cnpjData['bairro'] ?? 'N/A');
            $sheet->setCellValue('G2', $cnpjData['municipio'] ?? 'N/A');
            $sheet->setCellValue('H2', $cnpjData['uf'] ?? 'N/A');
            $sheet->setCellValue('I2', $cnpjData['situacao'] ?? 'N/A');
        }

        // Salvar o arquivo
        $writer = new Xlsx($spreadsheet);
        $fileName = 'CNPJ_' . ($_POST['cnpj']) . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        $writer->save('php://output');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta CNPJ</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Consulta CNPJ</h1>
    <form method="POST" class="mt-4">
        <div class="form-group">
            <label for="cnpj">Digite o CNPJ:</label>
            <input type="text" class="form-control" id="cnpj" name="cnpj" required>
        </div>
        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>

    <?php if ($errorMessage): ?>
        <div class="alert alert-danger mt-4"><?php echo $errorMessage; ?></div>
    <?php elseif ($cnpjData): ?>
        <h4 class="mt-5">Informações do CNPJ</h4>
        <table class="table">
            <tr>
                <th>Razão Social</th>
                <td><?php echo $cnpjData['razao_social'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Nome Fantasia</th>
                <td><?php echo $cnpjData['fantasia'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <th>CNPJ</th>
                <td><?php echo $cnpjData['cnpj'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Endereço</th>
                <td><?php echo $cnpjData['logradouro'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Número</th>
                <td><?php echo $cnpjData['numero'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Bairro</th>
                <td><?php echo $cnpjData['bairro'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Cidade</th>
                <td><?php echo $cnpjData['municipio'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Estado</th>
                <td><?php echo $cnpjData['uf'] ?? 'N/A'; ?></td>
            </tr>
            <tr>
                <th>Situação</th>
                <td><?php echo $cnpjData['situacao'] ?? 'N/A'; ?></td>
            </tr>
        </table>
        <form method="POST">
            <input type="hidden" name="cnpj" value="<?php echo $_POST['cnpj']; ?>">
            <button type="submit" name="export" class="btn btn-success">Exportar para Excel</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
