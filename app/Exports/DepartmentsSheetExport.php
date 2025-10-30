<?php

namespace App\Exports;

use App\Models\Department;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class DepartmentsSheetExport implements FromCollection, WithHeadings, WithTitle
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Department::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Departemen',
        ];
    }

    public function title(): string
    {
        return 'Data Departemen';
    }
}
