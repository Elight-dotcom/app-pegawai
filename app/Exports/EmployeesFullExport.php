<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class EmployeesFullExport implements WithMultipleSheets
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function sheets(): array
    {
        $sheets = [];

        if (in_array($this->data['report_type'], ['all', 'employees'])) {
            $sheets[] = new EmployeesSheetExport($this->data['employees']);
        }

        if (in_array($this->data['report_type'], ['all', 'salaries'])) {
            $sheets[] = new SalariesSheetExport($this->data['salaries']);
        }

        if (in_array($this->data['report_type'], ['all', 'attendances'])) {
            $sheets[] = new AttendancesSheetExport($this->data['attendances']);
        }

        return $sheets;
    }
}
