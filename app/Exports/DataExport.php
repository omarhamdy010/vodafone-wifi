<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataExport implements FromCollection, WithHeadings
{

    protected $type;

    // Constructor to accept export type
    public function __construct($type)
    {
        $this->type = $type;
    }
    
    public function collection()
    {
        return User::where('type',$this->type)->select('name','mobile')->get();
    }
    public function headings(): array
    {
        return [
            'Name',
            'Phone Number',
            // 'score'
        ];
    }
}
