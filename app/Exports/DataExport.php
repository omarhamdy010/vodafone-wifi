<?php

namespace App\Exports;

use App\Models\Gift;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Gift::select('name','mobile','gift')->get();
    }
    public function headings(): array
    {
        return [
            'Name',
            'Phone Number',
            'Gift'
        ];
    }
}
