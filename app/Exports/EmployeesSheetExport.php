<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmployeesSheetExport implements FromCollection, WithHeadings, WithTitle, WithStyles, ShouldAutoSize
{
    protected $employees;

    public function __construct($employees)
    {
        $this->employees = $employees;
    }

    public function collection()
    {
        return $this->employees->map(function ($employee) {
            return [
                'no' => $employee->id,
                'nama_lengkap' => $employee->nama_lengkap,
                'jabatan' => $employee->jabatan->nama_jabatan,
                'departemen' => $employee->department->nama_departemen,
                'email' => $employee->email,
                'nomor_telepon' => $employee->nomor_telepon,
                'alamat' => $employee->alamat,
                'tanggal_lahir' => \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d-m-Y'),
                'tanggal_masuk' => \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d-m-Y'),
                'status' => $employee->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'Jabatan',
            'Departemen',
            'Email',
            'Nomor Telepon',
            'Alamat',
            'Tanggal Lahir',
            'Tanggal Masuk',
            'Status',
        ];
    }

    public function title(): string
    {
        return 'Data Karyawan';
    }

    public function styles(Worksheet $sheet)
    {
        // Tambahkan border ke semua cell yang terisi
        $lastCol = $sheet->getHighestColumn();
        $lastRow = $sheet->getHighestRow();

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
