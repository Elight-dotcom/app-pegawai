<?php

namespace App\Exports;

use App\Models\Position;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class PositionsSheetExport implements FromCollection, WithHeadings, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Position::all();
    }

    public function title(): string
    {
        return 'Data Jabatan';
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Jabatan',
            'Gaji Pokok',
        ];
    }
}
