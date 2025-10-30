<?php

namespace App\Exports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AttendancesSheetExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize, WithStyles
{
    protected $attendances;

    public function __construct($attendances)
    {
        $this->attendances = $attendances;
    }

    public function collection()
    {
        return Attendance::with('karyawan')
            ->get()
            ->map(function ($attendance) {
                return [
                    'id' => $attendance->id,
                    'nama_lengkap' => $attendance->karyawan->nama_lengkap,
                    'tanggal' => \Carbon\Carbon::parse($attendance->tanggal)->format('d-m-Y'),
                    'waktu_masuk' => $attendance->waktu_masuk ? \Carbon\Carbon::parse($attendance->waktu_masuk)->format('H:i') : '-',
                    'waktu_keluar' => $attendance->waktu_keluar ? \Carbon\Carbon::parse($attendance->waktu_keluar)->format('H:i') : '-',
                    'status_absensi' => $attendance->status_absensi,
                ];
            });
    }

    public function title(): string
    {
        return 'Absensi';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Lengkap',
            'Tanggal',
            'Waktu Masuk',
            'Waktu Keluar',
            'Status Absensi',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Tambahkan border ke semua cell yang terisi
        $lastRow = $sheet->getHighestRow();
        $lastCol = $sheet->getHighestColumn();

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
