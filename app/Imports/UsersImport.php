<?php

namespace App\Imports;

use App\Models\Gift;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * Map the Excel row to the Gift model.
     *
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
         if ($this->isValid($row)) {
             return new Gift([
                'name'   => $row['name'],
                'mobile' => $row['phone_number'],
                'gift'   => $row['gift'],
            ]);
        }

        // Return null to skip invalid rows
        return null;
    }

    /**
     * Validate the row data.
     *
     * @param array $row
     * @return bool
     */
    private function isValid(array $row): bool
    {
         return isset($row['name'], $row['phone_number'], $row['gift']) &&
            is_string($row['name']) &&
             is_string($row['gift']);
    }
}