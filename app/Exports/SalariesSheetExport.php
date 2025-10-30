<?php

namespace App\Exports;

use App\Models\Salary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SalariesSheetExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithStyles
{
    protected $salaries;

    public function __construct($salaries)
    {
        $this->salaries = $salaries;
    }

    public function collection()
    {
        return $this->salaries->map(function ($salary) {
            return [
                'id' => $salary->id,
                'nama_lengkap' => $salary->employee->nama_lengkap,
                'bulan' => $salary->bulan,
                'gaji_pokok' => $salary->gaji_pokok,
                'tunjangan' => $salary->tunjangan,
                'potongan' => $salary->potongan,
                'total_gaji' => $salary->total_gaji,
            ];
        });
    }

    public function title(): string
    {
        return 'Gaji Karyawan';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Karyawan',
            'Bulan',
            'Gaji Pokok',
            'Tunjangan',
            'Potongan',
            'Total Gaji',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Tambahkan border ke semua cell yang terisi
        $lastRow = $sheet->getHighestRow();
        $lastCol = $sheet->getHighestColumn();

        // Buat heading tebal dan tengah
        $sheet->getStyle("A1:{$lastCol}1")->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
            ],
            'fill' => [
                'fillType' => 'solid',
                'color' => ['rgb' => '4F81BD'],
            ],
            'alignment' => [
                'horizontal' => 'center',
                'vertical' => 'center',
            ],
        ]);

        $sheet->getStyle("A1:{$lastCol}{$lastRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => 'thin',
                    'color' => ['rgb' => 'CCCCCC'],
                ],
            ],
        ]);

        // Buat tinggi baris heading sedikit lebih besar
        $sheet->getRowDimension(1)->setRowHeight(22);
    }
}
