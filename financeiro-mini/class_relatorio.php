<?php

require 'vendor/autoload.php'; // Autoload do Composer
require_once 'db.php';
require_once 'movimento.php';
require_once 'categoria.php';


use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Relatorio {
    private $db;
    private $movimento;
    private $categoria;

    public function __construct($db) {
        $this->db = $db;
        $this->movimento = new Movimento($db);
        $this->categoria = new Categoria($db);
    }

    public function gerarPDF($start_date, $end_date) {
        $movimentos = $this->movimento->read($start_date, $end_date);
        $saldo = $this->movimento->calculateBalance($start_date, $end_date);

        // Calcular o saldo
        $saldo = array_map(function($mov) {
            return $mov['tipo'] === 'entrada' ? $mov['valor'] : -$mov['valor'];
        }, $movimentos);
        $saldo_final = array_sum($saldo);

        // Criar o conteúdo HTML para o PDF
        $html = '<html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; }
                table { width: 100%; border-collapse: collapse; }
                th, td { border: 1px solid #ddd; padding: 8px; }
                th { background-color: #f2f2f2; }
                h1 { text-align: center; }
                .header { margin-bottom: 20px; }
            </style>
        </head>
        <body>
            <div class="header">
                <h1>Lista de Movimentações</h1>
                <p>Data Inicial: ' . htmlspecialchars($start_date) . '</p>
                <p>Data Final: ' . htmlspecialchars($end_date) . '</p>
                <p>Saldo: ' . htmlspecialchars(number_format($saldo_final, 2, ',', '.')) . '</p>
            </div>
            <table>
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
                <tbody>';

        foreach ($movimentos as $row) {
            $html .= '<tr>
                <td>' . htmlspecialchars($row['id']) . '</td>
                <td>' . htmlspecialchars($row['tipo']) . '</td>
                <td>' . htmlspecialchars($row['data']) . '</td>
                <td>' . htmlspecialchars($row['categoria']) . '</td>
                <td>' . htmlspecialchars($row['descricao']) . '</td>
                <td>' . htmlspecialchars(number_format($row['valor'], 2, ',', '.')) . '</td>
            </tr>';
        }

        $html .= '</tbody>
            </table>
        </body>
        </html>';

        // Instanciar e configurar o dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream('movimentacoes.pdf', ['Attachment' => 0]);
    }

    public function gerarExcel($start_date, $end_date) {
        $movimentos = $this->movimento->read($start_date, $end_date);
        $saldo = $this->movimento->calculateBalance($start_date, $end_date);
                // Calcular o saldo
                $saldo = array_map(function($mov) 
                {
                    return $mov['tipo'] === 'entrada' ? $mov['valor'] : -$mov['valor'];
                }, $movimentos);
                $saldo_final = 0;
                $saldo_final = array_sum($saldo);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Cabeçalho
        $sheet->setCellValue('A1', 'Lista de Movimentações');
        $sheet->setCellValue('A2', 'Data Inicial: ' . $start_date);
        $sheet->setCellValue('A3', 'Data Final: ' . $end_date);
        $sheet->setCellValue('A4', 'Saldo: ' . number_format($saldo_final, 2, ',', '.'));

        // Tabela
        $sheet->setCellValue('A5', 'ID');
        $sheet->setCellValue('B5', 'Tipo');
        $sheet->setCellValue('C5', 'Data');
        $sheet->setCellValue('D5', 'Categoria');
        $sheet->setCellValue('E5', 'Descrição');
        $sheet->setCellValue('F5', 'Valor');

        $row = 6;
        foreach ($movimentos as $data) {
            $sheet->setCellValue('A' . $row, $data['id']);
            $sheet->setCellValue('B' . $row, $data['tipo']);
            $sheet->setCellValue('C' . $row, $data['data']);
            $sheet->setCellValue('D' . $row, $data['categoria']);
            $sheet->setCellValue('E' . $row, $data['descricao']);
            $sheet->setCellValue('F' . $row, number_format($data['valor'], 2, ',', '.'));
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('movimentacoes.xlsx');
    }
}
